<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddtocartController extends Controller
{
   public function showtoCart(){
     return view('front.addtoCart.show-cart');
   }
}
