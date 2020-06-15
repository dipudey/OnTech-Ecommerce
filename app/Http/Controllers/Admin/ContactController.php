<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;

class ContactController extends Controller
{
    public function __construct(){
      $this->middleware("auth:admin");
    }

    public function index(){
      return view("admin.contact.index",[
        'contacts' => Contact::latest()->where('status',0)->get(),
        'seen_contacts' => Contact::latest()->where('status',1)->get()
      ]);
    }

    public function view($id){
      return view('admin.contact.view',[
        'contact' => Contact::find($id)
      ]);
    }

    public function seen($id){
      Contact::find($id)->update([
        'status' => 1
      ]);
      return redirect('admin/contact/list')->with('message','Message Seen Successfully');
    }

    public function unseen($id){
      Contact::find($id)->update([
        'status' => 0
      ]);
      return redirect('admin/contact/list')->with('message','Message Unseen Successfully');
    }

    public function deleteContact($id){
      Contact::find($id)->delete();
      return back()->with('message',"Message Delete Successfully");
    }


}
