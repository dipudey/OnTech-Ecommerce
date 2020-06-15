<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Cupon;
use App\Model\Setting;
use Carbon\Carbon;
use Session;
use Cart;
use Auth;

class CartController extends Controller
{

    /*
    * Show Cart page
    */
    public function index($cupon_name = ''){

        if ($cupon_name) {
          if (Cupon::where('cupon',$cupon_name)->exists()) {
            if (Cupon::where('cupon',$cupon_name)->first()->validity_till >= Carbon::now()->format("Y-m-d")) {
              $cupon = Cupon::where('cupon',$cupon_name)->first();
              $subtotal = floatval(implode(explode(',',Cart::Subtotal())));
              Session::put('cupon',[
                'cupon_name' => $cupon_name,
                'discount' => $cupon->discount,
                'total' => $subtotal - ($subtotal*$cupon->discount/100)
              ]);
              return view('cart',[
                'carts' => Cart::content(),
                'cupon_name' => $cupon_name,
              ]);
            }
            else {
              return redirect('cart')->with([
                'type' => 'info',
                'message' => "This Cupon validity already exists."
              ]);
            }
          }
          else {
            return redirect('cart')->with([
              'type' => 'error',
              'message' => "This Cupon is not available."
            ]);
          }
        }
        else {
          return view('cart',[
            'carts' => Cart::content(),
          ]);
        }

    }



    /* Add product in cart in ajax request */
    public function addCart($id){
      $product = Product::find($id);
      if ($product->discount_price) {
        $amount = $product->selling_price - ($product->discount_price*$product->selling_price/100);
        Cart::add([
          'id' => $product->id,
          'name' => $product->product_name,
          'qty' => 1,
          'price' => $amount,
          'weight' => '1'
        ]);
        return response()->json([
          'result' => "Product Add To Cart Successfully"
        ]);
      }
      else {
        Cart::add([
          'id' => $product->id,
          'name' => $product->product_name,
          'qty' => 1,
          'price' => $product->selling_price,
          'weight' => '1'
        ]);
        return response()->json([
          'result' => "Product Add To Cart Successfully"
        ]);
      }

    }

    public function check(){
      return response()->json([
        'data' => Cart::content()
      ]);
    }

    public function store(Request $request){
      $product = Product::find($request->id);
      if ($product->discount_price) {
        $amount = $product->selling_price - ($product->discount_price*$product->selling_price/100);
        Cart::add([
          'id' => $product->id,
          'name' => $product->product_name,
          'qty' => $request->quantity,
          'price' => $amount,
          'weight' => '1',
          'options' => ['color' => $request->color,'size' => $request->size]
        ]);
        return redirect('/')->with('message',"Product Add To Cart Successfully");
      }
      else {
        Cart::add([
          'id' => $product->id,
          'name' => $product->product_name,
          'qty' => $request->quantity,
          'price' => $product->selling_price,
          'weight' => '1',
          'options' => ['color' => $request->color,'size' => $request->size]
        ]);
        return back()->with('message',"Product Add To Cart Successfully");
      }

    }


    public function update(Request $request){
      $rowId =$request->rowId;
      echo $rowId;
      $qty=$request->quantity;
      Cart::update($rowId, $qty);
      return back()->with('message',"Cart Updated");
    }

    public function removeCart($rowId){
      Cart::remove($rowId);
      return back()->with('message',"Cart removed");
    }

    //Redirect to checkout page
    public function checkout(){
      if (Auth::check()) {
        if (Cart::Subtotal() == 0) {
          return redirect('/')->with([
            'type' => 'error',
            'message' => "You have no product add in cart!!"
          ]);
        }
        else {
          return view('checkout',[
            'shipping_charge' => Setting::find(1)->shipping_charge,
          ]);
        }
      }
      else {
        return redirect('login');
      }
    }

}
