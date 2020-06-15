@extends('layouts.dashboard_master')
@section('title')
  Today Report
@endsection
@section('report')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Today Report</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">Today Report</li>
                  </ul>
                  <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
              </div>
              <div class="col-lg-5 col-md-6 col-sm-12">
                  <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
              </div>
          </div>
      </div>
      <div class="container-fluid">
        <div class="row clearfix">

          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card w_data_1">
                 <div class="body">
                      <div class="w_icon green"><i class="zmdi zmdi-sort-amount-asc"></i></div>
                      <h4 class="mt-3">{{ $total_order }}</h4>
                      <span class="text-muted">Total Order</span>

                 </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card w_data_1">
                 <div class="body">
                      <div class="w_icon orange"><i class="zmdi zmdi-shopping-cart"></i></div>
                      <h4 class="mt-3">{{ $total_sales }}$</h4>
                      <span class="text-muted">Total Sales</span>

                 </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card w_data_1">
                 <div class="body">
                      <div class="w_icon blush"><i class="zmdi zmdi-bug"></i></div>
                      <h4 class="mt-3">{{ $delever_order }}</h4>
                      <span class="text-muted">Delevery Order</span>

                 </div>
              </div>
          </div>

          {{-- <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card w_data_1">
                 <div class="body">
                      <div class="w_icon blue"><i class="zmdi zmdi-account"></i></div>
                      <h4 class="mt-3">53.8k</h4>
                      <span class="text-muted">Total New Users</span>

                 </div>
              </div>
          </div> --}}

          <div class="col-sm-12">
              <div class="card">
                  <div class="header">
                      <h2><strong>Today Order</strong></h2>
                      <ul class="header-dropdown">
                          <li class="remove">
                              <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                          </li>
                      </ul>
                  </div>
                  <div class="table-responsive social_media_table">
                      <table class="table table-hover c_table">
                          <thead>
                              <tr>
                                  <th>Order Id</th>
                                  <th>SubTotal</th>
                                  <th>Total</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($today_orders_list as $today_order)
                              <tr>
                                  <td>{{ $today_order->product_order_id }}</td>
                                  <td>{{ $today_order->subtotal }}</td>
                                  <td>{{ $today_order->total }}</td>
                                  <td>
                                    @if ($today_order->status == 0)
                                      <span class="badge badge-warning">Panding</span>
                                    @elseif ($today_order->status == 1)
                                      <span class="badge badge-primary">Payment Accept</span>
                                    @elseif ($today_order->status == 2)
                                      <span class="badge badge-info">Delevery Process</span>
                                    @elseif ($today_order->status == 3)
                                      <span class="badge badge-success">Delevery Success</span>
                                    @else
                                      <span class="badge badge-danger">cancel</span>
                                    @endif
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

        </div>
      </div>
  </section>


@endsection
@section('script')


@endsection
