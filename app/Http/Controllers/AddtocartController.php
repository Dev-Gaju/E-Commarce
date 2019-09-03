<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class AddtocartController extends Controller
{
   public function addtoCart(Request $request){
       $product=Product::find($request->product_id);
       Cart::add([
           'id'=>$product->id,
           'name'=>$product->product_name,
           'price'=>$product->product_price,
           'qty'=>$request->qty,
           'options'=>[
               'image'=>$product->main_image,
           ]

       ]);

   return redirect('/show-cart');
   }

   public function showCart(){
       $cartproducts=Cart::content();
       return view('front.addtoCart.show-cart',['cartproducts'=>$cartproducts]);
   }
   public function updateCart(Request $request){
       Cart::update($request->rowId,$request->qty);
       return redirect('/show-cart');

   }
   public function DeleteCart($id){
       Cart::remove($id);
       return redirect('/show-cart');
   }
}
