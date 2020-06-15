<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      return view('admin.cupon.index',[
        'cupons' => Cupon::all(),
      ]);
    }

    public function addCupon(){
      return view('admin.cupon.add_cupon');
    }

    public function cuponStore(Request $request){
      $request->validate([
        'cupon' => 'required',
        'discount' => 'required|numeric',
        'validity_till' => 'required'
      ]);

      Cupon::insert([
        'cupon' => $request->cupon,
        'discount' => $request->discount,
        'validity_till' => $request->validity_till,
        'created_at' => Carbon::now()
      ]);
      return redirect('admin/cupon')->with('message','Cupon Added Successfully');
    }

    public function editCupon($id){
      return view('admin.cupon.edit_cupon',[
        'cupon' => Cupon::find($id)
      ]);
    }

    public function updateCupon(Request $request){
      $request->validate([
        'cupon' => 'required',
        'discount' => 'required|numeric',
        'validity_till' => 'required'
      ]);

      Cupon::find($request->id)->update([
        'cupon' => $request->cupon,
        'discount' => $request->discount,
        'validity_till' => $request->validity_till,
        'updated_at' => Carbon::now()
      ]);
      return redirect('admin/cupon')->with('message','Cupon Updated Successfully');
    }

    public function deleteCupon($id){
      Cupon::find($id)->delete();
      return back()->with('message','Cupon Deleted Successfully');
    }
}
