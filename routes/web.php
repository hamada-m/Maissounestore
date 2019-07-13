<?php
use App\Category;
use App\Product;
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

Route::get('/', function () {
    return view('home')->with(['categories'=>Category::all(),'products'=>Product::all()]);
});
Route::resource('/products','ProductsController');
Route::resource('/users','UsersController');
Route::post('/user/auth',[
    'uses'=>'UsersController@auth',
    'as'=>'user.auth'
]);
Route::get('/login',[
    'uses'=>'UsersController@login',
    'as'=>'login'
]);
Route::get('/logout',[
    'uses'=>'UsersController@logout',
    'as'=>'user.logout'
]);
Route::post('/add/cart',[
    'uses'=>'ShoppingController@addToCart',
     'as'=>'cart.add'
]);  
Route::group(['middleware'=>'admin'],function(){
    
});

Route::get('/cart',[
    'uses'=>'ShoppingController@cart',
    'as'=>'cart.index'
]);


Route::get('/cart/decrease/{id}/{qte}',[
    'uses'=>'ShoppingController@cartDec',
     'as'=>'cart.decrease'
]);  
Route::get('/cart/increase/{id}/{qte}',[
    'uses'=>'ShoppingController@cartInc',
     'as'=>'cart.increase'
]);  
Route::get('/cart/{id}/delete',[
    'uses'=>'ShoppingController@cartDelete',
     'as'=>'cart.delete'
]);   
Route::post('/product/{id}/edit',[
    'uses'=>'ProductsController@update',
    'as'=>'product.update'
]); 
Route::post('/product/{id}/delete',[
    'uses'=>'ProductsController@destroy',
    'as'=>'product.delete'
]);  
Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'cart.checkout'
]);       
Route::post('/pay',[
    'uses'=>'CheckoutController@pay',
    'as'=>'cart.pay'
]);  
Route::post('/pro',[
    'uses'=>'CheckoutController@pay',
    'as'=>'cart.pay'
]);  
