<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Orderdetail;
use App\Payment;
use App\shipping;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
use Illuminate\Http\Request;
use App\Product;


class OrderController extends Controller
{
    public function manageOrderInfo(){
//        $order=Order::all();
        $orders=DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.id')
            ->join('payments','payments.order_id','=','orders.id')
            ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
            ->orderBy('orders.id','desc')
            ->get();

//        return $order;
        return view('admin.order.manage-order',['orders'=>$orders]);
    }

    public function ViewOrderInfo($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $shipping=shipping::find($order->shipping_id);
        $products=Orderdetail::where('order_id', $id)->get();
        return view('admin.order.view-order',
            [
                'customer'=>$customer,
                'shipping'=>$shipping,
                'products'=>$products,
            ]);
    }
    public function ViewOrderInvoice($id){
        return view('admin.order.order-invoice');
    }

    public function invoiceDownload($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $products=Orderdetail::where('order_id', $id)->get();
        $pdf = PDF::loadView('admin.order.demo',[
            'customer'=>$customer,
            'products'=>$products
        ]);
//        return $pdf->stream('invoice.pdf');
      return $pdf->download('invoice.pdf');
    }
    public function editOrderInfo($id){
        $orderinfo=Order::find($id);
        return view('admin.order.edit-order',[
            'orderinfo'=>$orderinfo
        ]);
    }
    public function updatenewOrderInfo(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->update();


        $payment = Payment::where('order_id', $id)->first();
        $payment->payment_status = $request->payment_status;
        $payment->update();

        $orderDetails = Orderdetail::where('order_id', $id)->get();
        if ($order->order_status == 'successful' && $payment->payment_status == 'successful;') {

        foreach ($orderDetails as $orderDetail) {
            $product = Product::find($orderDetail->product_id);
            $product->product_quanity = $product->product_quanity - $orderDetail->product_quanity;
            $product->update();
        }
    } else{
            return redirect('/manage-order')->with('message','Order and payment status Updated');
        }

        return redirect('/manage-order')->with('message','Order and payment status Updated');
    }
    public function deleteOrderInfo($id){
           $order=Order::find($id);
           $$order->delete();
        return redirect('/manage-order')->with('message','Order Deleted!!');

    }
}
