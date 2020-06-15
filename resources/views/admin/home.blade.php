@extends('layouts.dashboard_master')
@section('title')
  Dashboard
@endsection
@section('home')
  active
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2">
                  <div class="body bg-green">
                      <div class="icon col-12 m-t-10">
                          <div class="chart chart-bar">6,4,8,6,8,10,5,6,7,9,5</div>
                      </div>
                      <div class="content col-12">
                          <div class="text">Today Total Order</div>
                          <div class="number">{{ $today_order }}</div>
                      </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card info-box-2">
                  <div class="body bg-blue">
                      <div class="icon col-12 m-t-5">
                          <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                      </div>
                      <div class="content col-12">
                          <div class="text">TOTAL SALES</div>
                          <div class="number">${{ $today_sales }}</div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card info-box-2">
                    <div class="body bg-amber">
                        <div class="icon col-12 m-t-10">
                            <div class="chart chart-bar">4,6,-3,-1,2,-2,4,3,6,7,-2,3</div>
                        </div>
                        <div class="content col-12">
                            <div class="text">Today Delevered</div>
                            <div class="number">{{ $today_deleverd }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card info-box-2">
                    <div class="body bg-red">
                        <div class="icon col-12">
                            <div class="chart chart-pie">30, 35, 25, 8</div>
                        </div>
                        <div class="content col-12">
                            <div class="text">Today Cancel Order</div>
                            <div class="number">{{ $today_cancel }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon indigo"><i class="zmdi zmdi-accounts"></i></div>
                        <h4 class="mt-3">{{ $total_user }}</h4>
                        <span class="text-muted">Total Users</span>
                        <div class="w_description text-success">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span></span>
                        </div>
                   </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon pink"><i class="zmdi zmdi-bug"></i></div>
                        <h4 class="mt-3">{{ $total_brand }}</h4>
                        <span class="text-muted">Total Brands</span>
                        <div class="w_description text-success">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span></span>
                        </div>
                   </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon orange"><i class="zmdi zmdi-shopping-cart"></i></div>
                        <h4 class="mt-3">{{ $total_product }}</h4>
                        <span class="text-muted">Total Product</span>
                        <div class="w_description text-success">
                            <i class="zmdi zmdi-trending-up"></i>
                            <span></span>
                        </div>
                   </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card w_data_1">
                   <div class="body">
                        <div class="w_icon green"><i class="zmdi zmdi-blogger"></i></div>
                        <h4 class="mt-3">{{ $total_blog_posts }}</h4>
                        <span class="text-muted">Total Blog Post</span>
                        <div class="w_description text-danger">
                            <i class="zmdi zmdi-trending-down"></i>
                            <span></span>
                        </div>
                   </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@section('script')
  <script src="{{ asset('dashboard_assets') }}/bundles/countTo.bundle.js"></script>
  <script src="{{ asset('dashboard_assets') }}/bundles/knob.bundle.js"></script>
  <script src="{{ asset('dashboard_assets') }}/bundles/sparkline.bundle.js"></script>
  <script src="{{ asset('dashboard_assets') }}/bundles/mainscripts.bundle.js"></script>
  <script src="{{ asset('dashboard_assets') }}/js/pages/widgets/infobox/infobox-1.js"></script>
  <script src="{{ asset('dashboard_assets') }}/js/pages/charts/jquery-knob.js"></script>
  <script src="{{ asset('dashboard_assets') }}/js/pages/charts/sparkline.js"></script>
@endsection
