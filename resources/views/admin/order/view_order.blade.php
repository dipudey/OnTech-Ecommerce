@extends('layouts.dashboard_master')
@section('title')
  Order
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
                <h2>Order</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item">Order</li>
                    <li class="breadcrumb-item active">Order Details</li>
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

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
              <div class="header">
                  <h2><strong>Order</strong> Details </h2>
              </div>
              <div class="card-body">
                  <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Name:
                      <span class="text-primary">{{ $order_details->user->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      E-mail:
                      <span class="text-primary">{{ $order_details->user->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Payment Type:
                      <span class="text-primary">{{ $order_details->payment_type }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Payment Id:
                      <span class="text-primary">{{ $order_details->payment_id }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Paying Ammount:
                      <span class="text-primary">{{ $order_details->paying_amount }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Transection Id:
                      <span class="text-primary">{{ $order_details->blnc_transection }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Order Id:
                      <span class="text-primary">{{ $order_details->product_order_id }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Subtotal:
                      <span class="text-primary">{{ $order_details->subtotal }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Shipping Charge:
                      <span class="text-primary">{{ $order_details->shipping }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total:
                      <span class="text-primary">{{ $order_details->total }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Order Time:
                      <span class="text-primary">{{ $order_details->created_at->format("h-i-s d/m/Y") }}</span>
                    </li>

                  </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">

            <div class="card">
              <div class="header">
                  <h2><strong>Shipping</strong> Address </h2>
              </div>
              <div class="card-body">

                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Name
                      <span class="">{{ $shipping_details->ship_name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      E-mail
                      <span class="">{{ $shipping_details->ship_email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Country
                      <span class="">{{ $shipping_details->ship_country }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Address
                      <span class="">{{ $shipping_details->ship_address }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      PostCode
                      <span class="">{{ $shipping_details->ship_postcode }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      City
                      <span class="">{{ $shipping_details->ship_city }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Status
                      @if ($order_details->status == 0)
                        <span class="badge badge-danger badge-pill">Panding</span>
                      @elseif ($order_details->status == 1)
                        <span class="badge badge-primary badge-pill">Payment Accept</span>
                      @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Notes
                      <span class="">{{ $shipping_details->ship_notes }}</span>
                    </li>
                  </ul>

              </div>
            </div>

          </div>

          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="header">
                  <h2><strong>Product</strong> List </h2>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Picture</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Untill Price</th>
                        <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($order_products as $order_product)
                      <tr>
                        <td>{{ $order_product->product->product_code }}</td>
                        <td>{{ $order_product->product_name }}</td>
                        <td>
                          <img src="{{ asset('uploads/products') }}/{{ $order_product->product->thambnail_picture }}" alt="thambnail_picture" height="70" width="auto">
                        </td>
                        <td>{{ $order_product->color }}</td>
                        <td>{{ $order_product->size }}</td>
                        <td>{{ $order_product->quantity }}</td>
                        <td>{{ $order_product->singleprice }}</td>
                        <td>{{ $order_product->totalprice }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @if ($order_details->status == 0)
              <a href="{{ url('admin/order/payment/accept/'.$order_details->id) }}" class="btn btn-primary btn-block">Payment Accept</a>
              <a href="{{ url('admin/order/cancel/'.$order_details->id) }}" class="btn btn-danger btn-block mt-2">Cancel</a>
            @elseif ($order_details->status == 1)
              <a href="{{ url('admin/order/delevery/process/'.$order_details->id) }}" class="btn btn-info btn-block mt-2">Delevery Process</a>
            @elseif ($order_details->status == 2)
              <a href="{{ url('admin/order/delevery/done/'.$order_details->id) }}" class="btn btn-success btn-block mt-2">Order Delevery Done</a>
            @elseif ($order_details->status == 3)
              <span class="text-success">This Order Has Been Successfully</span>
            @endif
          </div>

        </div>
    </div>
</section>

@endsection
