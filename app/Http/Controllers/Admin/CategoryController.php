<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Subcategory;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /*
    * Add Cateegory
    */
    public function index(){
      return view('admin.category.index',[
        'categories' => Category::all(),
      ]);
    }

    /*
    * Add Cateegory
    */
    public function addCategory(){
      return view('admin.category.add_category');
    }

    /*
    * Store category in database
    */
    public function storeCategory(Request $request){
      $request->validate([
        'category_name' => "required|unique:categories,category_name",
        'category_picture' => "required|mimes:jpg,jpeg,png,gif"
      ]);

      $category_id = Category::insertGetId([
        'category_name' => $request->category_name,
        'created_at' => Carbon::now()
      ]);

      //Picture Insert
      $picture = $request->file('category_picture');
      $new_name = $category_id.".".$picture->getClientOriginalExtension();
      $upload_location = base_path("public/uploads/categories/".$new_name);
      Image::make($picture)->resize(70,64)->save($upload_location);
      //picture insert into Database
      Category::find($category_id)->update([
        'category_picture' => $new_name
      ]);

      return redirect('admin/category')->with('message','Category Added Successfully..');
    }

    /*
    * Specific Category show
    */
    public function editCategory($id){
      return view('admin.category.edit_category',[
        'category' => Category::find($id),
      ]);
    }

    /*
    * Specific Category data update
    */
    public function updateCategory(Request $request){
      if ($request->file('category_picture')) {
        //delete old picture
        $delete_location = base_path('public/uploads/categories/'.Category::find($request->id)->category_picture);
        unlink($delete_location);

        $picture = $request->file('category_picture');
        $new_name = $request->id.".".$picture->getClientOriginalExtension();
        $upload_location = base_path('public/uploads/categories/'.$new_name);
        Image::make($picture)->resize(70,64)->save($upload_location);
        //update_image
        Category::find($request->id)->update([
          'category_picture' => $new_name,
          'updated_at' => Carbon::now()
        ]);
      }

      Category::find($request->id)->update([
        'category_name' => $request->category_name,
        'updated_at' => Carbon::now()
      ]);
      return redirect('admin/category')->with('message','Category Updated Successfully');

    }

    /*
    * Specific Category delete
    */
    public function deleteCategory($id){
      //delete old picture
      $delete_location = base_path('public/uploads/categories/'.Category::find($id)->category_picture);
      unlink($delete_location);
      Category::find($id)->delete();
      return back()->with('message','Category Deleted Successfully..');
    }

    /*
    * show The all SubCategory list
    */
    public function subcategoryList(){
      return view('admin.category.subcategory',[
        'subcategories' => Subcategory::with('category')->get()
      ]);
    }

    /*
    * Add a new Subcategory
    */
    public function subcategoryAdd(){
      return view('admin.category.add_subcategory',[
        'categories' => Category::all()
      ]);
    }

    /*
    * Add a new Subcategory
    */
    public function subcategoryStore(Request $request){
      $request->validate([
        'subcategory_name' => 'required',
        'category_id' => 'required'
      ],[
        'category_id.required' => "Select a Category"
      ]);

      Subcategory::insert([
        'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
        'created_at' => Carbon::now()
      ]);
      return redirect('admin/subcategory')->with('message','Subcategory added Successfully..');
    }

    /*
    * edit a Specific Subcategory
    */
    public function editSubcategory($id){
      return view('admin.category.edit_subcategory',[
        'subcategory' => Subcategory::find($id),
        'categories' => Category::all()
      ]);
    }

    /*
    * edit a Specific Subcategory
    */
    public function subcategoryUpdate(Request $request){
      $request->validate([
        'subcategory_name' => 'required',
        'category_id' => 'required'
      ],[
        'category_id.required' => "Select a Category"
      ]);

      Subcategory::find($request->id)->update([
        'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
        'updated_at' => Carbon::now()
      ]);

      return redirect('admin/subcategory')->with('message',"Subcateory added successfully..");
    }

    /*
    * edit a Specific Subcategory
    */
    public function deleteSubcategory($id){
      Subcategory::find($id)->delete();
      return back()->with('message','Subcategory Deleted');
    }
}
