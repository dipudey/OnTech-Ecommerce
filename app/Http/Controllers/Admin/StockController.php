<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Brand;
use App\Model\Multiple_product_picture;
use Carbon\Carbon;
use Image;

class StockController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function stock(){
      return view('admin.stock.index',[
        'products' => Product::with('category')->latest()->get(),
      ]);
    }

    public function editQuantity($product_id){
      return response()->json([
        'quantity' => Product::find($product_id)
      ]);
    }

    public function updateQuantity(Request $request){
      Product::find($request->id)->update([
        'product_quantity' => $request->product_quantity
      ]);
      return back()->with('message',"Product Quantity Updated Successfully");
    }
}
