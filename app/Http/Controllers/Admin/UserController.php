<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\PasswordMail;
use Carbon\Carbon;
use App\Admin;
use Auth;
use Hash;
use Mail;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware("auth:admin");
    }

    public function index(){
      return view('admin.users.index',[
        'users' => Admin::all()
      ]);
    }

    public function create(){
      return view('admin.users.create');
    }

    public function store(Request $request){
      $generate_password = substr(md5(uniqid()),1,8);
      $password = Hash::make($generate_password);
      Admin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $password,
        'phone' => $request->phone,
        'category' => $request->category,
        'brand' => $request->brand,
        'cupon' => $request->cupon,
        'product' => $request->product,
        'blog' => $request->blog,
        'order' => $request->order,
        'stock' => $request->stock,
        'report' => $request->report,
        'user' => $request->user,
        'contact' => $request->contact,
        'subscriber' => $request->subscriber,
        'others' => $request->others,
      ]);
      Mail::to($request->email)->send(new PasswordMail($generate_password));
      return redirect('admin/user')->with('message',"User Created Successfully");
    }

    public function edit($id){
      return view('admin.users.edit',[
        'user' => Admin::find($id)
      ]);
    }

    public function updateUser(Request $request){
      Admin::find($request->id)->update([
        'phone' => $request->phone,
        'category' => $request->category,
        'brand' => $request->brand
      ]);
      echo "ok";
    }

    public function deleteUser($id){
      Admin::find($id)->delete();
      return back()->with('message','User Deleted Successfully');
    }
}
