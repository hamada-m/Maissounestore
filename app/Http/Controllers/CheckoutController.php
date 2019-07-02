<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    //
    public function index(){

        return view('products.checkout');
    }
    public function pay(){
 
Stripe::setApiKey("sk_test_1nuPDMWNoy09tQb5hSDzf3NB00CgQUpqw1");
$token = request()->stripeToken;
// Charge the user's card:
$somme = intval(str_replace(',', '', Cart::total())) * 10;
$charge = Charge::create(array(
    "amount" => $somme,
    "currency" => "usd",
    "description" => "Maissounestore site",
    "source" => $token,
));
Cart::destroy();
return redirect()->route('cart.index')->with(['success'=>'Commande payée avec succés!']);
 }

}
