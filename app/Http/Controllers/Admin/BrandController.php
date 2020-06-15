<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Carbon\Carbon;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
      return view('admin.brand.index',[
        'brands' => Brand::all()
      ]);
    }

    public function create(){
      return view('admin.brand.add_brand');
    }

    public function storeBrand(Request $request){
      $request->validate([
        'brand_name' => 'required|unique:brands,brand_name',
        'brand_picture' => 'required|mimes:jpg,jpeg,png,gif'
      ]);

      $brand_id = Brand::insertGetId([
        'brand_name' => $request->brand_name,
        'created_at' => Carbon::now()
      ]);

      //Picture Insert
      $picture = $request->file('brand_picture');
      $new_name = $brand_id.".".$picture->getClientOriginalExtension();
      $upload_location = base_path("public/uploads/brands/".$new_name);
      Image::make($picture)->resize(200,200)->save($upload_location);
      //picture insert into Database
      Brand::find($brand_id)->update([
        'brand_picture' => $new_name
      ]);

      return redirect('admin/brand')->with('message','Brand Added Successfully..');

    }

    public function editBrand($id){
      return view('admin.brand.edit_brand',[
        'brand' => Brand::find($id)
      ]);
    }

    public function updateBrand(Request $request){
      if ($request->file('brand_picture')) {
        //delete old picture
        $delete_location = base_path('public/uploads/brands/'.Brand::find($request->id)->brand_picture);
        unlink($delete_location);

        $picture = $request->file('brand_picture');
        $new_name = $request->id.".".$picture->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/brands/'.$new_name);
        Image::make($picture)->resize(200,200)->save($upload_location);
        Brand::find($request->id)->update([
          'brand_picture' => $new_name,
          'updated_at' => Carbon::now()
        ]);
      }

      Brand::find($request->id)->update([
        'brand_name' => $request->brand_name,
        'updated_at' => Carbon::now()
      ]);
      return redirect('admin/brand')->with('message','Brand Updated Successfully');

    }


    public function deleteBrand($id){
      $delete_location = base_path('public/uploads/brands/'.Brand::find($id)->brand_picture);
      unlink($delete_location);
      Brand::find($id)->delete();
      return back()->with('message',"Brand Deleted Successfully");
    }
}
