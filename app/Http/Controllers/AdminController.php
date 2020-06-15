<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Model\Order;
use App\Model\Product;
use App\Model\Brand;
use App\Model\Blog_post;
use Carbon\Carbon;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home',[
          'today_order' => Order::where('date',Carbon::now()->format('Y-m-d'))->count(),
          'today_sales' => Order::where('date',Carbon::now()->format("Y-m-d"))->where('status','!=',4)->sum('total'),
          'today_deleverd' => Order::where('date',Carbon::now()->format("Y-m-d"))->where('status',3)->count(),
          'today_cancel' => Order::where('date',Carbon::now()->format("Y-m-d"))->where('status',4)->count(),
          'total_user' => Admin::count(),
          'total_brand' => Brand::count(),
          'total_product' => Product::count(),
          'total_blog_posts' => Blog_post::count(),
        ]);
    }

    
}
