<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Wishlist;
use App\User;
use Hash;
use Auth;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home',[
          'total_order' => Order::where('user_id',Auth::id())->count(),
          'total_wishlist' => Wishlist::where('user_id',Auth::id())->count(),
        ]);
    }

    public function changePassword(){
      return view('user.changPassword');
    }

    public function changePasswordPost(Request $request){
      $request->validate([
          'old_password' => 'required',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required'
        ]);
        if (Hash::check($request->old_password,Auth::user()->password)) {
          User::find(Auth::id())->update([
            'password' => Hash::make($request->password)
          ]);
          return redirect('home')->with('message',"Password Change Successfully");
        }
        else {
          return back()->with('error_message',"Your Old Password Doesn't Match");
        }
    }

    /*
    * Profile Edit
    */
    public function profileEdit(){
      return view('user.profile_edit',[
        'data' => User::find(Auth::id())
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
        if (User::find(Auth::id())->picture) {
          $delete_location = base_path('public/uploads/users/'.User::find(Auth::id())->picture);
          unlink($delete_location);

          //update profile picture
          $picture = $request->file('picture');
          $picture_name = Auth::id().".".$picture->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/users/".$picture_name);
          Image::make($picture)->resize(100,100)->save($upload_location);
          User::find(Auth::id())->update([
            'picture' => $picture_name
          ]);
        }
        else {
          //upload profile picture
          $picture = $request->file('picture');
          $picture_name = Auth::id().".".$picture->getClientOriginalExtension();
          $upload_location = base_path("public/uploads/users/".$picture_name);
          Image::make($picture)->resize(100,100)->save($upload_location);
          User::find(Auth::id())->update([
            'picture' => $picture_name
          ]);
        }
      }

      User::find(Auth::id())->update([
        'name' => $request->name,
      ]);
      return redirect('home')->with('message',"Profile Updated");
    }

}
