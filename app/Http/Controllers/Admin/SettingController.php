<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Seo;
use App\Model\Setting;

class SettingController extends Controller
{

    public function __construct(){
      $this->middleware("auth:admin");
    }

    public function seo(){
      return view('admin.others.seo',[
        'seo' => Seo::find(1)
      ]);
    }

    public function seoUpdate(Request $request){
      $request->validate([
        'meta_title' => 'required',
        'meta_author' => 'required',
        'meta_tag' => 'required',
        'meta_description' => 'required',
        'google_analytics' => 'required',
        // 'bing_analytics' => 'required',
      ]);

      Seo::find(1)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_tag' => $request->meta_tag,
        'meta_description' => $request->meta_description,
        'google_analytics' => $request->google_analytics,
        'bing_analytics' => $request->bing_analytics,
      ]);

      return back()->with('message','Seo Updated Successfully');
    }

    public function siteSetting(){
      return view('admin.others.site_setting',[
        'setting' => Setting::find(1)
      ]);
    }

    public function settingUpdate(Request $request){
      $request->validate([
        'shopname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
      ]);

      Setting::find(1)->update([
        'vat' => $request->vat,
        'shipping_charge' => $request->shipping_charge,
        'shopname' => $request->shopname,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
      ]);

      return back()->with('message',"Site Setthing Updated");
    }
}
