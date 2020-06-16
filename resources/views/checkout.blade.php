@extends('layouts.frontend_master')
@section('title')
  Checkout
@endsection
@section('add_css')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/cart_styles.css"> --}}
@endsection
@section('frontend_content')

<div class="container my-5">
  <form action="{{ route('add.payment') }}" method="post">
    @csrf
  <div class="row">
        <div class="col-md-8 col-sm-12">
          <h3>Billing Details</h3>
          <hr>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name">Full Name *</label>
                  <input type="text" name="name" id="name" placeholder="Enter Your Full Name" required class="form-control" value="{{ Auth::user()->name }}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="email">E-mail Address *</label>
                  <input type="text" name="email" id="email" placeholder="Enter Your Email Address" required class="form-control" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="country">Country *</label>
                  <input type="text" name="country" id="country" placeholder="Enter Your Country" required class="form-control" value="Bangladesh">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="phone">Phone Number *</label>
                  <input type="text" name="phone" id="phone" placeholder="Enter Your phone number" required class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="address">Your Address *</label>
                  <input type="text" name="address" id="address" placeholder="Enter Delivery Address" required class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="postcode">Postcode/ZIP *</label>
                  <input type="text" name="postcode" id="postcode" placeholder="Enter Postcode" required class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="city">Town/City *</label>
                  <input type="text" name="city" id="city" placeholder="Enter City" required class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="notes">Order Notes</label>
                  <textarea name="notes" id="notes" rows="4" class="form-control"></textarea>
                </div>
              </div>
            </div>

        </div>


        <!-- Add To Cart Product -->
        <div class="col-md-4 col-sm-12">
            <h3 class="">Your Order</h3>
            <hr>

            <div class="mt-4">
              <!-- order Product -->
              @foreach (Cart::content() as $cart_item)
                <div class="row">
                  <div class="col-6">{{ $cart_item->name }}</div>
                  <div class="col-6 text-right">{{ $cart_item->price }} X {{ $cart_item->qty }} = ${{ $cart_item->qty*$cart_item->price }}</div>
                </div>
                <hr>
              @endforeach

              <!-- Calculation  -->
              <div class="row">
                <div class="col-7">SubTotal</div>
                <div class="col-5 text-right"><strong>${{ Cart::Subtotal() }}</strong></div>
              </div>
              <hr>
              @if (Session::has('cupon'))
                <div class="row">
                  <div class="col-7">Discount</div>
                  <div class="col-5 text-right"><strong>{{ Session::get('cupon')['discount'] }}%</strong></div>
                </div>
                <hr>
              @endif
              <div class="row">
                <div class="col-7">Shipping </div>
                <div class="col-5 text-right"><strong>${{ $shipping_charge }}</strong></div>
              </div>
              <hr>
              @if (Session::has('cupon'))
                <div class="row">
                  <div class="col-7"><h3>Total<h3> </div>

                  @php
                    $discount = Session::get('cupon')['discount'];
                    $total = floatval(implode(explode(',',Cart::Subtotal())));
                    $discount_ammount = floatval($total*$discount/100);
                    $fn_total = $total - $discount_ammount;
                    $final_total_with_charge = $fn_total + $shipping_charge;
                    $final_total = number_format($final_total_with_charge, 2, '.', '');

                  @endphp
                  <div class="col-5 text-right"><h3>${{ $final_total }}</h3></div>
                  <input type="hidden" name="total" value="{{ $final_total }}">
                </div>
                <hr>
              @else
                <div class="row">
                  <div class="col-7"><h3>Total<h3> </div>
                    @php
                      $total = floatval(implode(explode(',',Cart::Subtotal())));
                      $final_total = $total + $shipping_charge;
                      $final_total = number_format($final_total, 2, '.', '');
                    @endphp
                  <div class="col-5 text-right"><h3>${{ $final_total }}</h3></div>
                  <input type="hidden" name="total" value="{{ $final_total }}">
                </div>
                <hr>
              @endif

              {{-- payment getway --}}

              <div class="mt-5 mb-5 ml-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="payment" id="payment1" value="stripe" checked>
                  <label class="form-check-label" for="payment1">
                    <img src="{{ asset('frontend_assets/images/logos_1.png') }}" alt="masert card">
                  </label>
                </div>
                <div class="form-check form-check-inline ml-4">
                  <input class="form-check-input" type="radio" name="payment" id="payment2" value="mollie">
                  <label class="form-check-label" for="payment2">
                    <img src="{{ asset('frontend_assets/images/mollie.png') }}" alt="masert card" height="16">
                  </label>
                </div>
                {{-- <div class="form-check form-check-inline ml-4">
                  <input class="form-check-input" id="payment3" type="radio" name="payment" value="paypal">
                  <label class="form-check-label" for="payment3">
                    <img src="{{ asset('frontend_assets/images/logos_3.png') }}" alt="masert card">
                  </label>
                </div> --}}

              </div>

              <div class="mt-5">
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block"> PLACE ORDER </button>
                </div>
              </div>

            </div>

        </div>
      </div>
  </form>
</div>

@endsection
