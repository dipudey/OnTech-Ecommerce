<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Auth;
use Image;
use Hash;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    /*
    * Show the Profile
    */
    public function profile(){
      return view('admin.profile.profile',[
        'data' => Admin::find(Auth::id())
      ]);
    }

    /*
    * Edit the Profile
    */
    public function profileEdit(){
      return view('admin.profile.edit',[
        'data' => Admin::find(Auth::id())
      ]);
    }

    /*
    * Profile Update
    */
    public function profileUpdate(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'picture' => 'mimes:jpg,png,jpeg'
      ]);
      if ($request->file('picture')) {
        if (Admin::find(Auth::id())->picture) {
          $delete_location = base_path('public/uploads/admin/'.Admin::find(Auth::id())->picture);
          unlink($delete_location);

          //update profile picture
          $picture = $request->file('picture');
          $picture_name = Auth::id().".".$picture->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/admin/".$picture_name);
          Image::make($picture)->resize(180,180)->save($upload_location);
          Admin::find(Auth::id())->update([
            'picture' => $picture_name
          ]);
        }
        else {
          //upload profile picture
          $picture = $request->file('picture');
          $picture_name = Auth::id().".".$picture->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/admin/".$picture_name);
          Image::make($picture)->resize(180,180)->save($upload_location);
          Admin::find(Auth::id())->update([
            'picture' => $picture_name
          ]);
        }
      }

      Admin::find(Auth::id())->update([
        'name' => $request->name,
        'phone' => $request->phone
      ]);
      return redirect('admin/profile')->with('message',"Profile Updated");
    }

    /*
    * Admin changePassword
    */
    public function changePassword(){
      return view('admin.profile.change_password');
    }

    /*
    * Password Update
    */
    public function passwordUpdate(Request $request){
      $request->validate([
        'old_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
      ]);
      if (Hash::check($request->old_password,Auth::user()->password)) {
        Admin::find(Auth::id())->update([
          'password' => Hash::make($request->password)
        ]);
        return redirect('admin/profile')->with('message',"Password Change Successfully");
      }
      else {
        return back()->with('error_message',"Your Old Password Doesn't Match");
      }
    }
}
