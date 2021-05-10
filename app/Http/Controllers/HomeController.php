<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Tag;
use App\Models\Cart;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {   
        $auto = Auto::with('tags')->paginate(6);

        return view('Frontend.index', compact('auto'));
    }

    public function show($id)
    {   
        $auto = Auto::find($id);

        $tags = DB::table('tags')->get();

        return view('Frontend.detail',compact('auto'))->with('tags', $tags);
    }

    public function addToCart(Request $request, $id)
    {
        $auto = Auto::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($auto, $auto->id);

        $request->session()->put('cart',$cart);
        
        return redirect()->route('home');
    }

    public function cart()
    {   
        if(!Session::has('cart')){

          return view('Frontend.cart');  
        }
        $oldCart =Session::get('cart');
      
        $cart = new Cart($oldCart);
        
        return view('Frontend.cart',['autos' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

   public function search(Request $request) 
    {  
        $search = $request->input('search');

        $auto = Auto::query()->where('model','LIKE', "%{$search}%")->paginate(5);
                 
        $auto->appends(['search' => $search]);
        
        return view('Frontend.search', compact('auto'));
    }
}