<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog_category;
use App\Model\Blog_post;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function __construct(){
      return $this->middleware('auth:admin');
    }

    /*
    * Show all Category
    */
    public function showCategories(){
      return view('admin.blog.category',[
        'blog_categories' => Blog_category::all()
      ]);
    }

    /*
    * add blog Category
    */
    public function addcategory(){
      return view('admin.blog.add_category');
    }

    /*
    * Store the blog Category
    */
    public function storeCategory(Request $request){
      $request->validate([
        'category_name_en' => 'required|unique:blog_categories,category_name_en',
        'category_name_bn' => 'required|unique:blog_categories,category_name_bn'
      ],[
        'category_name_en.required' => "The category name english field is required.",
        'category_name_bn.required' => "The category name Bangla field is required."
      ]);

      Blog_category::insert([
        'category_name_en' => $request->category_name_en,
        'category_name_bn' => $request->category_name_bn,
        'created_at' => Carbon::now()
      ]);

      return redirect('admin/blog/category')->with('message','Blog Category Add');
    }

    /*
    * Edit Specifque Cageory
    */
    public function editCategory($id){
      return view('admin.blog.edit_category',[
        'category' => Blog_category::find($id),
      ]);
    }

    /*
    * Update The Specifque category name
    */
    public function updateCategory(Request $request){
      $request->validate([
        'category_name_en' => 'required',
        'category_name_bn' => 'required'
      ],[
        'category_name_en.required' => "The category name english field is required.",
        'category_name_bn.required' => "The category name Bangla field is required."
      ]);

      Blog_category::find($request->id)->update([
        'category_name_en' => $request->category_name_en,
        'category_name_bn' => $request->category_name_bn,
        'updated_at' => Carbon::now()
      ]);
      return redirect('admin/blog/category')->with('message','Blog Category updated');
    }

    /*
    * Delete The Specique category
    */
    public function deleteCategory($id){
      Blog_category::find($id)->delete();
      return redirect('admin/blog/category')->with('message','Blog Category Deleted Successfully');
    }

    /*** Blog Post ***/

    /*
    * Show all Post
    */
    public function showPost(){
      return view('admin.blog.all_post',[
        'posts' => Blog_post::all(),
      ]);
    }

    /*
    * Created  Post
    */
    public function createPost(Request $request){
      return view('admin.blog.add_post',[
        'categories' => Blog_category::all(),
      ]);
    }

    /*
    * Store post
    */
    public function storePost(Request $request){

      $post_id = Blog_post::insertGetId([
        'blog_category_id' => $request->category_id,
        'post_title_en' => $request->post_title_en,
        'post_title_bn' => $request->post_title_bn,
        'post_details_en' => $request->post_details_en,
        'post_details_bn' => $request->post_details_bn,
        'created_at' => Carbon::now()
      ]);

      $picture = $request->file('post_picture');
      $new_name = $post_id.".".$picture->getClientOriginalExtension();
      $upload_location = base_path("public/uploads/posts/".$new_name);
      Image::make($picture)->resize(360,160)->save($upload_location);
      Blog_post::find($post_id)->update([
        'post_picture' => $new_name
      ]);

      return redirect('admin/blog/post')->with('message',"Blog Post Added Successfully");
    }

    public function viewPost($id){
      return view('admin.blog.blog_details',[
        'post' => Blog_post::find($id)
      ]);
    }

    public function editPost($id){
      return view('admin.blog.edit_post',[
        'post' => Blog_post::find($id),
        'categories' => Blog_category::all()
      ]);
    }

    public function deletePost($id){
      $delete_location = base_path("public/uploads/posts/".Blog_post::find($id)->post_picture);
      unlink($delete_location);

      Blog_post::find($id)->delete();
      return redirect('admin/blog/post')->with('message',"Post Deleted Successfully");
    }

    /*
    * Post Update
    */
    public function postUpdated(Request $request){

      if ($request->file('post_picture')) {
        $delete_location = base_path("public/uploads/posts/".Blog_post::find($request->id)->post_picture);
        unlink($delete_location);

        $picture = $request->file('post_picture');
        $new_name = $request->id.".".$picture->getClientOriginalExtension();
        $upload_location = base_path("public/uploads/posts/".$new_name);
        Image::make($picture)->resize(360,160)->save($upload_location);
        Blog_post::find($request->id)->update([
          'post_picture' => $new_name
        ]);
      }
      Blog_post::find($request->id)->update([
        'blog_category_id' => $request->category_id,
        'post_title_en' => $request->post_title_en,
        'post_title_bn' => $request->post_title_bn,
        'post_details_en' => $request->post_details_en,
        'post_details_bn' => $request->post_details_bn,
        'updated_at' => Carbon::now()
      ]);
      return redirect('admin/blog/post')->with('message',"Post Updated Successfully..");
    }
}
