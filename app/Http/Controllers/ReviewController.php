<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Review;
use App\Model\Order;
use App\Model\Order_details;
use Carbon\Carbon;
use Auth;


class ReviewController extends Controller
{
    public function storeReview(Request $request){
      //Check user login
      if (Auth::check()) {
        //if user order any product then this user order_ids
        $order_id = Order::where('user_id',Auth::id())->get();
        $return = 0; //if this product exits then return 1
        foreach ($order_id as $item) {
          if (Order_details::where('order_id',$item->id)->where('product_id',$request->product_id)->exists()) {
              $return = 1;
          }
        }

        if ($return) {
          if (Review::where('user_id',Auth::id())->where('product_id',$request->product_id)->exists()) {
            return back()->with([
              'type' => 'info',
              'message' => "You are already review this product"
            ]);
          }
          else {
            Review::insert([
              'user_id' => Auth::id(),
              'product_id' => $request->product_id,
              'start' => $request->start,
              'message' => $request->massage,
              'created_at' => Carbon::now()
            ]);
            return back()->with('message',"Thanks for reviw this product");
          }
        }
        else {
          return back()->with([
            'type' => 'error',
            'message' => "You don't buye this product so you can't any review in this product"
          ]);
        }


      }
      else {
        return redirect('login')->with([
          'type' => 'warning',
          'message' => 'Login First'
        ]);
      }
    }
}
