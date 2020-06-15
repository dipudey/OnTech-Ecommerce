<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Brand;
use App\Model\Wishlist;
use App\Model\Blog_post;
use App\Model\Order;
use App\Model\Review;
use App\Model\Contact;
use App\Model\Setting;
use Carbon\Carbon;
use Auth;
use Session;

class FrontendController extends Controller
{
    public function index(){
      return view('index',[
        'banner' => Product::with('brand')->where('main_slider',1)->latest()->first(),
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'mide_sliders' => Product::where('mid_slider',1)->latest()->limit(3)->get(),
        'featured_products' => Product::where('status',1)->latest()->get(),
        'trend_products' => Product::where('trend',1)->where('status',1)->latest()->get(),
        'best_rated_products' => Product::where('best_rated',1)->where('status',1)->latest()->get(),
        'hot_deal_products' => Product::where('hot_deal',1)->where('status',1)->latest()->limit(2)->get(),
        'latest_reviews' => Review::with('product')->latest()->limit(6)->get()
      ]);
    }

    public function shop(){
      return view('shop',[
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'products' => Product::where('status',1)->latest()->paginate(20),
        'total_product' => Product::where('status',1)->count()
      ]);
    }

    public function contact(){
      return view('contact',[
        'contact_info' => Setting::find(1)
      ]);
    }

    public function contactStore(Request $request){
      Contact::insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        'created_at' => Carbon::now()
      ]);
      return back()->with("message","Thanks For Contact Us");
    }

    public function blog(){
      return view('blog',[
        'posts' => Blog_post::paginate(6)
      ]);
    }

    public function blogPost($id){
      return view('blog_post',[
        'post' => Blog_post::find($id),
        'related_posts' => Blog_post::where('id','!=',$id)->limit(3)->get()
      ]);
    }

    public function orderTracking(Request $request){
      if (Order::where('product_order_id',$request->order_id)->exists()) {
        return view('order_tracking',[
          'order' => Order::where('product_order_id',$request->order_id)->first()
        ]);
      }
      else {
        return back()->with([
          'type' => 'error',
          'message' => "This Order is Not Available"
        ]);
      }
    }

    /*
    * Search Product
    */

    public function searchProduct($name){
      return view('search',[
        'products' => Product::where("product_name","LIKE","%{$name}%")->where('status',1)->get(),
        'total_product' => Product::where("product_name","LIKE","%{$name}%")->where('status',1)->count(),
        'categories' => Category::all(),
        'brands' => Brand::all(),
      ]);
    }

    /*
    * Product Show by Category
    */
    public function showProductByCategory($id){
      return view('product_category',[
        'products' => Product::where("category_id",$id)->where('status',1)->get(),
        'total_product' => Product::where("category_id",$id)->where('status',1)->count(),
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'category_name' => Category::find($id)->category_name
      ]);
    }

    /*
    * Product Show by Subcategory
    */
    public function showProductBySubcategory($subcateory_id){
      return view('product_category',[
        'products' => Product::where("subcategory_id",$subcateory_id)->where('status',1)->get(),
        'total_product' => Product::where("category_id",$subcateory_id)->where('status',1)->count(),
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'category_name' => Subcategory::find($subcateory_id)->subcategory_name
      ]);
    }

    /*
    * add wishlist in ajax request
    */
    public function addWishlist($id){
      if (Auth::check()) {
        if (Wishlist::where('product_id',$id)->where('user_id',Auth::id())->exists()) {
          return response()->json([
            'error' => "This Product Already Add Wishlist",
          ]);
        }
        else {
          Wishlist::insert([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'created_at' => Carbon::now()
          ]);
          return response()->json([
            'success' => "Add Wishlist Successfully"
          ]);
        }
      }
      else {
        return response()->json([
          'error' => "Please Login First"
        ]);
      }
    }


    /*
    * Product Details
    */
    public function productDetails($id){
      $category_id = Product::find($id)->category_id;
      return view('details_product',[
        'product' => Product::with('category','subcategory','brand')->where('id',$id)->first(),
        'multi_pictures' => Product::find($id)->muli_pictures,
        'related_products' => Product::where('category_id',$category_id)->where('id','!=',$id)->limit(8)->get(),
        'reviews' => Review::with('user')->where('product_id',$id)->get()
      ]);
    }

    /*
    * Product view by ajax request
    */
    public function productView($id){
      $data = Product::find($id);
      if ($data->subcategory_id) {
        $subcategory_name = $data->subcategory->subcategory_name;
      }
      else {
        $subcategory_name = null;
      }
      $category_name = $data->category->category_name;

      $color = $data->product_color;
      $product_color = explode(',', $color);

      $size = $data->porduct_size;
      $product_size = explode(',', $size);

      return response()->json([
        'product' => Product::find($id),
        'subcategory_name' => $subcategory_name,
        'category' => $category_name,
        'color' => $product_color,
        'size' => $product_size,
      ]);
    }

    /*
    * Change To language English To Bangla
    */
    public function changeBanglaLanguage(){
      Session::put('lang',[
        'lang_name' => 'bangla'
      ]);
      return back();
    }

    /*
    * Change To language Bangla To English
    */
    public function changeEnglishLanguage(){
      Session::forget('lang');
      return back();
    }


}
