<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_details;
use App\Model\Shipping;
use App\Model\Setting;
use Carbon\Carbon;
use Session;
use Stripe;
use Auth;
use Cart;

class PaymentController extends Controller
{
    public function addPayment(Request $request){
      if ($request->payment == 'stripe') {
        return view('payment.stripe',[
          'data' => $request->all()
        ]);
      }
      elseif ($request->payment == 'paypal') {
        echo "paypal";
      }
    }

  /**
   * success response method.
   *
   * @return \Illuminate\Http\Response
   */
    public function stripePost(Request $request)
    {
        $setting = Setting::find(1);
        if ($setting->vat) {
          $vat = $setting->vat;
        }
        else {
          $vat = 0;
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
            "amount" => $request->total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Dipu Ecommerce",
            "metadata" => ['order_id' => uniqid()],
        ]);

        if (Session::has('cupon')) {
          $subTotal = Session::get('cupon')['total'];
        }
        else {
          $subTotal = Cart::Subtotal();
        }

        /* Order Insert here */
        $order_id = Order::insertGetId([
          'user_id' => Auth::id(),
          'payment_type' => $request->payment,
          'payment_id' => $charge->payment_method,
          'paying_amount' => $charge->amount/100,
          'blnc_transection' => $charge->balance_transaction,
          'product_order_id' => $charge->metadata->order_id,
          'subtotal' => $subTotal,
          'shipping' => $setting->shipping_charge,
          'vat' => $vat,
          'total' => $request->total,
          'date' => Carbon::now()->format('Y-m-d'),
          'created_at' => Carbon::now()
        ]);

        /* Shipping Insert here */
        Shipping::insert([
          'order_id' => $order_id,
          'ship_name' => $request->name,
          'ship_email' => $request->email,
          'ship_country' => $request->country,
          'ship_address' => $request->address,
          'ship_postcode' => $request->postcode,
          'ship_city' => $request->city,
          'ship_notes' => $request->notes,
          'created_at' => Carbon::now()
        ]);

        /* Data Insert Into Order_details */
        foreach(Cart::content() as $product){
          Order_details::insert([
            'order_id' => $order_id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'color' => $product->options->color,
            'size' => $product->options->size,
            'quantity' => $product->qty,
            'singleprice' => $product->price,
            'totalprice' => $product->price*$product->qty,
            'created_at' => Carbon::now()
          ]);
        }

        Cart::destroy();
        if (Session::has('cupon')) {
          Session::forget('cupon');
        }

        return redirect('/')->with('message',"Your Payment Successfully Done");
    }

}
