<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use Carbon\Carbon;
use DB;
use Auth;

class ReportController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function todayReport(){
      $sales = Order::where('date',Carbon::now()->format("Y-m-d"))->where('status','!=',4)->get();
      $total_sales = 0;
      foreach ($sales as $sale) {
        $total_sales = $total_sales + $sale->total;
      }
      return view('admin.report.report_tody',[
        'total_order' => Order::where('date',Carbon::now()->format("Y-m-d"))->count(),
        'total_sales' => $total_sales,
        'delever_order' => Order::where('date',Carbon::now()->format("Y-m-d"))->where('status',3)->count(),
        'today_orders_list' => Order::where('date',Carbon::now()->format("Y-m-d"))->get()
      ]);
    }

    public function monthReport(){
      return view('admin.report.report_month');
    }
}
