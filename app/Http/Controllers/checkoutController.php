<?php

namespace App\Http\Controllers;

use App\Customer;
use App\shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
//use Illuminate\Support\Str;


class checkoutController extends Controller
{
   public function index(){
       return view('front.checkout.checkout');
   }
   public function saveCustomerInfo(Request $request){
       $this->validate($request, [
           'first_name' =>  'required|regex:/^[\pL\s\-]+$/u|max:30',
           'last_name' =>    'required|regex:/^[\pL\s\-]+$/u|max:20',
           'email' => 'required|email|unique:customers,email',
           'password' => 'required',
           'phone_number' => 'required|size:11|regex:/(01)[0-9]{9}/',
           'address' => 'required'

           ]);
       $customers=new Customer();
       $customers->first_name=$request->first_name;
       $customers->last_name=$request->last_name;
       $customers->email=$request->email;
       $customers->password=bcrypt($request->password);
       $customers->phone_number=$request->phone_number;
       $customers->address=$request->address;
//       $customers->token=Str::random(10);
       $customers->save();

       Session::put('customerID',$customers->id);
       Session::put('customername',$customers->first_name);

       $data=$customers->toArray();
       Mail::send('front.mail.confirmation-mail',$data, function ($message) use ($data){
               $message->to($data['email']);
               $message->subject('Congratulations mail');
       });
       return redirect('/shipping-info');

   }

//   public function signUpConfirmation($token){
//       $customer=Customer::find($token);
//       $customer->status=1;
//       $customer->token='';
//       $customer->save();
//   }

   public function shippingCustomerInfo(){
       $customer=Customer::find(Session::get('customerID'));
       return view('front.checkout.shipping-info',['customer'=>$customer]);
   }

   public function customerLogout(){
       Session::forget('customerID');
       Session::forget('customername');
      return redirect('/');
   }
   public function loginCustomer(Request $request){
       $customer=Customer::where('email',$request->email)->first();
     if ($customer){
         if (password_verify($request->password, $customer->password)){
             Session::put('customerID',$customer->id);
             Session::put('customername',$customer->first_name);
             return redirect('/shipping-info');
         }else{
             return redirect('/checkout')->with('message','Please Enter Your Correct Password');
         }
     }else{
         return redirect('/checkout')->with('message','Please Enter Your Correct Email');
     }
   }

   public function saveShipping(Request $request){
       $shipping=new shipping();
       $shipping->full_name=$request->full_name;
       $shipping->email=$request->email;
       $shipping->phone_number=$request->phone_number;
       $shipping->address=$request->address;
       $shipping->save();

       Session::put('shippingId',$shipping->Id);
       return redirect('/payment-info');
   }
   public function showpaymentForm(){
       return view('front.checkout.payment-form');
   }
}
