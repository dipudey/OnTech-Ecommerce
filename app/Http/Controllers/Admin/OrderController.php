<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Shipping;
use App\Model\Order_details;
use App\Model\Product;

class OrderController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function newOrders(){
      return view('admin.order.new_orders',[
        'order_list' => Order::where('status',0)->get(),
      ]);
    }

    public function acceptPayment (){
      return view('admin.order.accept_payment',[
        'order_list' => Order::where('status',1)->get(),
      ]);
    }

    public function progressDelevery (){
      return view('admin.order.progress_delevery',[
        'order_list' => Order::where('status',2)->get(),
      ]);
    }

    public function deleverySuccess (){
      return view('admin.order.delevery_success',[
        'order_list' => Order::where('status',3)->get(),
      ]);
    }

    public function cancelOrder (){
      return view('admin.order.cancel',[
        'order_list' => Order::where('status',4)->get(),
      ]);
    }


    /*
    * View Order
    */
    public function orderView($id){
      return view('admin.order.view_order',[
        'order_details' => Order::find($id),
        'shipping_details' => Shipping::where('order_id',$id)->first(),
        'order_products' => Order_details::with('product')->where('order_id',$id)->get(),
      ]);
    }

    public function paymentAccept($id){
      Order::find($id)->update([
        'status' => 1
      ]);
      return redirect('admin/order/new/orders')->with("message","Payment Accepted Done");
    }

    public function deleveryProcess($id){
      Order::find($id)->update([
        'status' => 2
      ]);
      return redirect('admin/order/accept/payment')->with("message","Add To Delevery Proccessing");
    }

    public function deleveryDone($id){
      foreach (Order_details::where('order_id',$id)->get() as $product) {
        Product::find($product->product_id)->decrement('product_quantity',$product->quantity);
      }
      Order::find($id)->update([
        'status' => 3
      ]);
      return redirect('admin/order/prosess/to/delevery')->with("message","Product Delevery Successfully");
    }

    public function paymentCancel($id){
      Order::find($id)->update([
        'status' => 4
      ]);
      return redirect('admin/order/new/orders')->with("message","Payment Cancel Done");
    }


}
