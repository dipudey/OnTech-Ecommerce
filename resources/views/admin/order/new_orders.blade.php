@extends('layouts.dashboard_master')
@section('title')
  New Orders
@endsection
@section('order')
  active
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>New Orders</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item">Order</li>
                    <li class="breadcrumb-item active">New Orders</li>
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
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card mt-3">
                <div class="header">
                    <h2><strong>New Orders</strong> List </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                  <th>Order Id</th>
                                  <th>Payment Type</th>
                                  <th>Payment Id</th>
                                  <th>Subtotal</th>
                                  <th>Total</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <th>Order Id</th>
                                  <th>Payment Type</th>
                                  <th>Payment Id</th>
                                  <th>Subtotal</th>
                                  <th>Total</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($order_list as $order)
                                  <tr>
                                    <td>{{ $order->product_order_id }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>
                                      <span class="badge badge-danger">Panding</span>
                                    </td>
                                    <td>
                                      <a class="btn btn-info" href="{{ url('admin/order/view/'.$order->id) }}">View</a>
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
    </div>
</section>

@endsection
