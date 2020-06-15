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

class ProductController extends Controller
{

    public function __construct(){
      $this->middleware('auth:admin');
      
    }

    public function index(){
      return view('admin.product.index',[
        'products' => Product::with('category')->latest()->get(),
      ]);
    }

    public function create(){
      return view('admin.product.add_product',[
        'categories' => Category::all(),
        'brands' => Brand::all(),
      ]);
    }

    public function findSubcategory($id){
      return response()->json([
        'subcategories' => Subcategory::where('category_id',$id)->get()
      ]);
    }


    public function store(Request $request){
      $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'product_code' => 'required|unique:products,product_code',
        'product_quantity' => "required",
        'selling_price' => 'required',
        'product_color' => 'required',
        'thambnail_picture' => 'required|mimes:jpg,jpeg,png,gif',
        'product_details' => 'required',
      ],[
        'category_id.required' => "Category Name Is Required"
      ]);

      $product_id = Product::insertGetId([
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'brand_id' => $request->brand_id,
        'product_code' => $request->product_code,
        'product_quantity' => $request->product_quantity,
        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'product_color' => $request->product_color,
        'porduct_size' => $request->product_size,
        'product_details' => $request->product_details,
        'video_link' => $request->video_link,
        'main_slider' => $request->main_slider,
        'hot_deal' => $request->hot_deal,
        'best_rated' => $request->best_rated,
        'mid_slider' => $request->mid_slider,
        'hot_new' => $request->hot_new,
        'trend' => $request->trend,
        'status' => 1,
        'created_at' => Carbon::now(),
      ]);

      /* Upload Product Thumbnail Picture */
      $thambnail_picture = $request->file('thambnail_picture');
      $new_name = $product_id.".".$thambnail_picture->getClientOriginalExtension();
      $upload_location = base_path('public/uploads/products/'.$new_name);
      Image::make($thambnail_picture)->resize(410,460)->save($upload_location);
      Product::find($product_id)->update([
        'thambnail_picture' => $new_name
      ]);

      /* Muliple Picture uploads */
      $flag = 1;
      foreach ($request->file('multipale_picture') as $multi_picture) {
        $multipale_picture = $multi_picture;
        $new_picture_name = $product_id."-".$flag.".".$multipale_picture->getClientOriginalExtension();
        $upload_location_picture = base_path('public/uploads/multipale_product_picture/'.$new_picture_name);
        Image::make($multipale_picture)->resize(410,460)->save($upload_location_picture);
        Multiple_product_picture::insert([
          'product_id' => $product_id,
          'multipale_product_picture' => $new_picture_name,
          'created_at' => Carbon::now()
        ]);
        $flag++;
      }
      return redirect('admin/product')->with('message',"Product Added Successfully..");

    }

    public function view($id){
      return view('admin.product.view',[
        'product' => Product::with('category','subcategory','brand')->where('id',$id)->first(),
        'multi_pictures' => Product::find($id)->muli_pictures,
      ]);
    }

    public function deactiveProduct($id){
      Product::find($id)->update([
        'status' => 2
      ]);
      return back()->with('message',"Product Deactived Successfully..");
    }

    public function activeProduct($id){
      Product::find($id)->update([
        'status' => 1
      ]);
      return back()->with('message',"Product Actived Successfully..");
    }

    public function editProduct($id){
      return view('admin.product.edit',[
        'product' => Product::find($id),
        'categories' => Category::all(),
        'brands' => Brand::all(),
        'subcategories' => Subcategory::all()
      ]);
    }

    public function updateProduct(Request $request){
      $request->validate([
        'product_name' => 'required',
        'category_id' => 'required',
        'product_code' => 'required',
        'product_quantity' => "required",
        'selling_price' => 'required',
        'product_color' => 'required',
        'thambnail_picture' => 'mimes:jpg,jpeg,png,gif',
        'product_details' => 'required',
      ],[
        'category_id.required' => "Category Name Is Required"
      ]);

      if ($request->file('thambnail_picture')) {
        //delete Old thambnail_picture picture
        $delete_location = base_path("public/uploads/products/".Product::find($request->id)->thambnail_picture);
        unlink($delete_location);
        /* Upload New Product Thumbnail Picture */
        $thambnail_picture = $request->file('thambnail_picture');
        $new_name = $request->id.".".$thambnail_picture->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/products/'.$new_name);
        Image::make($thambnail_picture)->resize(410,460)->save($upload_location);
        Product::find($request->id)->update([
          'thambnail_picture' => $new_name
        ]);

      }

      Product::find($request->id)->update([
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'brand_id' => $request->brand_id,
        'product_code' => $request->product_code,
        'product_quantity' => $request->product_quantity,
        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'product_color' => $request->product_color,
        'porduct_size' => $request->product_size,
        'product_details' => $request->product_details,
        'video_link' => $request->video_link,
        'main_slider' => $request->main_slider,
        'hot_deal' => $request->hot_deal,
        'best_rated' => $request->best_rated,
        'mid_slider' => $request->mid_slider,
        'hot_new' => $request->hot_new,
        'trend' => $request->trend,
        'status' => $request->status,
        'updated_at' => Carbon::now(),
      ]);

      return redirect('admin/product')->with('message',"product updated ...");

    }

    public function deleteProduct($id){
      /* Multipale Picture Delete */
      $name = Multiple_product_picture::where('product_id',$id)->get();
      foreach ($name as $n) {
        $delete_location = base_path('public/uploads/multipale_product_picture/'.$n->multipale_product_picture);
        unlink($delete_location);
        Multiple_product_picture::where('product_id',$id)->delete();
      }
      /* Thambnail Picture Delete */
      $thambnail_delete_location = base_path('public/uploads/products/'.Product::find($id)->thambnail_picture);
      unlink($thambnail_delete_location);
      /* Product Data Delete */
      Product::find($id)->delete();
      return back()->with('message','Product Deleted');
    }

    public function changeMultipalePicture($product_id){
      return view('admin.product.multipale_picture',[
        'multipales' => Multiple_product_picture::where('product_id',$product_id)->get(),
      ]);
    }


}
