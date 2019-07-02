<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    //ajouter un produit au panier
    public function addToCart(){
        $product = Product::findOrFail(request()->product_id);
        $item = Cart::add([
            'id'=>$product->id,
            'name'=>$product->title,
            'qty'=>request()->qte,
            'price'=>$product->price,
            'weight'=>0

        ]);
        Cart::associate($item->rowId,'App\Product');
        return redirect()->route('cart.index');
    }
    //afficher le panier
    public function cart(){
        return view('products.cart');
     }
     //retirer un produit du  panier
     public function deleteCart($id){
       Cart::remove($id);
       return redirect()->back();
     }
     //décrementer la qté
     public function cartDec($id,$qte){
         Cart::update($id,$qte - 1);
         return redirect()->back();
     }
     //incrémenter la qté
     public function cartInc($id,$qte){
        Cart::update($id,$qte + 1);
        return redirect()->back();
         
     }
}
