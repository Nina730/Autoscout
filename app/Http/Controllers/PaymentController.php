<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\ItemList;
use PayPal\Rest\ApiContext;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Auto;
use App\Models\Product;
use Auth;
use DB;

class PaymentController extends Controller
{ 
    
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
         
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );

        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    
    public function payWithpaypal(Request $request)
    {   
        $payer = new Payer();
        
        $payer->setPaymentMethod('paypal');
      	
        $data = json_decode($request->autos[0], true);

        if(is_array($data)) {
  
            try {
  
                 foreach($data as $key=> $values){ 

                    $item_1 = new Item();
                    $item_1 ->setName('Item 1') /** item name **/
                            ->setCurrency('USD')
                            ->setQuantity($values['qty'])
                            ->setPrice($request->totalPrice); /** unit price **/
                }    
             } catch(\Exception $e) {
                //to do redirect or error msg
           }   
        }
        
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        
        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($request->totalPrice);
                
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');
                    
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('status'))->setCancelUrl(route('status'));
                        
        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
                    
        try {
                
            $order = new Order();

            $order->user_id = Auth::user()->id;

            $order->status = 'pending';

            $order->total_amount = $request->totalPrice;
            
            $order->save();
            
            foreach($data as $key => $element) {
                $order->auto()->attach($element['item']['id'], ['quantity' => $element['qty']]);
            }

            $payment->create($this->_api_context);
        
        } catch (\PayPal\Exception\PPConnectionException $ex) {

                if (\Config::get('app.debug')) {

                    Toastr::error('Connection timeout :(','Error');
                    return Redirect::route('home');
                
                } 
                  else {

                    Toastr::error('Some error occur, sorry for inconvenient :(','Error');
                    return Redirect::route('home');
                 }
        }
            foreach ($payment->getLinks() as $link) {

                if ($link->getRel() == 'approval_url') {
                     $redirect_url = $link->getHref();
                     break;
                }
            }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('order_id', $order->id);

        if (isset($redirect_url)) {
        
            return Redirect::away($redirect_url);
        }

        Toastr::error('Payment failed :(','Error');
        return Redirect::route('home');
    }
    
    public function getPaymentStatus(Request $request)
    { 
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');

        if (empty( $request->input('PayerID')) || empty( $request->input('token'))) {
            $order = Order::where('status','pending')->update(['status' => 'canceled']);

            Toastr::success('Payment canceled :)','Success');
            return Redirect::route('home');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId( $request->input('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
       
        /**Find order,update status **/
        $order = Order::where('status','pending')->update(['status' => $result->getState()]);
    
        Toastr::success('Payment done  successfully :)','Success');
        return Redirect::route('home');

        } 
            
    }
  
}
        