@extends('layouts.frontend_master')
@section('title')
  Order Tracking
@endsection
@section('frontend_content')

  <div class="my-5" id="login_page">
    <div class="container">
      <div class="row">
        <div class="col-5 ml-5 mr-3" style="border: 1px solid grey;overflow:hidden" width="100%">
          <h3 class="text-center my-4">Your Order Status</h3>
          <div class="mt-3 ml-2">


            <span>
              <div class="bg-warning" style="height:100px;height: 13px;width: 12px;display: inline flow-root list-item"></div>Your Order are under review
            </span><br>
            <span>
              <div class="bg-primary" style="height:100px;height: 13px;width: 12px;display: inline flow-root list-item"></div>Your payment Accept
            </span><br>
            <span>
              <div class="bg-info" style="height:100px;height: 13px;width: 12px;display: inline flow-root list-item"></div>Packing Done Handover Progress
            </span><br>
            <span>
              <div class="bg-success" style="height:100px;height: 13px;width: 12px;display: inline flow-root list-item"></div>Packing Done Handover Progress
            </span><br>
            <span>
              <div class="bg-danger" style="height:100px;height: 13px;width: 12px;display: inline flow-root list-item"></div>Yout Order Has Been Canceled
            </span>



          </div>
          <div class="my-5">
            @if ($order->status == 0)
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              {{-- <small class="text-danger"><b>Your Order are under review <b></small> --}}
            @elseif ($order->status == 1)
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              {{-- <small class="text-danger"><b>Your payment Accept <b></small> --}}
            @elseif($order->status == 2)
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              {{-- <small class="text-success"><b>Packing Done Handover Progress<b></small> --}}
            @elseif($order->status == 3)
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
  							<div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              {{-- <small class="text-success"><b>Product Delevered Successfully<b></small> --}}
            @else
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              {{-- <div class="text-danger"><b>Yout Order Has Been Canceled<b></div> --}}
            @endif
          </div>

        </div>

        <div class="col-5 ml-5" style="border: 1px solid grey;overflow:hidden" width="100%">
          <h3 class="text-center my-4">Your Order Details</h3>

          <ul class="list-group my-3">

            <li class="list-group-item d-flex justify-content-between align-items-center">
              Name:
              <span class="text-primary">{{ $order->user->name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              E-mail:
              <span class="text-primary">{{ $order->user->email }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Payment Type:
              <span class="text-primary">{{ $order->payment_type }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Payment Id:
              <span class="text-primary">{{ $order->payment_id }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Paying Ammount:
              <span class="text-primary">{{ $order->paying_amount }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Transection Id:
              <span class="text-primary">{{ $order->blnc_transection }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Order Id:
              <span class="text-primary">{{ $order->product_order_id }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Subtotal:
              <span class="text-primary">{{ $order->subtotal }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Shipping Charge:
              <span class="text-primary">{{ $order->shipping }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Total:
              <span class="text-primary">{{ $order->total }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Order Time:
              <span class="text-primary">{{ $order->created_at->format("h-i-s d/m/Y") }}</span>
            </li>

          </ul>


        </div>
      </div>
    </div>
  </div>

@endsection
