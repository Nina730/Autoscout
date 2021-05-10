<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
  'uses' => 'HomeController@index',
  'as' => 'index'
]);


/*Login Routes*/ 
Route::namespace('Auth')->group(function () {

    Route::get('/login','LoginController@showLogin')->name('login');
    Route::post('/login','LoginController@process_login');
    Route::get('/register','LoginController@show_signup_form')->name('register');
    Route::post('/register','LoginController@process_signup');
    Route::post('/logout','LoginController@logout')->name('logout');
  });
  


/*Admin Routes */
Route::namespace('Backend')->group(function () {

  Route::group(['middleware' =>['auth','admin'], 'as' => 'admin.', 'prefix' => 'admin'],function (){

   Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
   /*Auto Routes */
   Route::group(['prefix' => 'autos', 'as' => 'autos.'], function() {
     
     Route::get('/index', 'AutoController@index')->name('index');
     Route::get('/create', 'AutoController@create')->name('create');
     Route::post('/store', 'AutoController@store')->name('store');
     Route::get('/edit{id}', 'AutoController@edit')->name('edit');
     Route::post('/update{id}', 'AutoController@update')->name('update');
     Route::get('/show{id}', 'AutoController@show')->name('show');
     Route::delete('/delete{id}', 'AutoController@destroy')->name('destroy');
     Route::get('/search','AutoController@search')->name('search');

  
     
});
Route::group(['prefix' => 'tags', 'as' => 'tags.'], function() {

  Route::get('/index', 'TagController@index')->name('index');
  Route::get('/create', 'TagController@create')->name('create');
  Route::post('/store', 'TagController@store')->name('store');
});

});   
});

/*Frontend Routes */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@show')->name('show');
Route::get('/addToCart/{id}','HomeController@addToCart')->name('addToCart');
Route::get('/cart','HomeController@cart')->name('cart');
Route::delete('/removeItem/{id}','HomeController@removeItem')->name('removeItem');
Route::get('/search', 'HomeController@search')->name('search');

/*PayPal Routes */
Route::group(['middleware' => 'auth'], function() {

  Route::get('/paypal','PaymentController@pay')->name('paypal');
  Route::post('/processPaypal','PaymentController@payWithpaypal')->name('processPaypal');
  Route::get('/status','PaymentController@getPaymentStatus')->name('status');

});