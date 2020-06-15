@extends('layouts.frontend_master')
@section('title')
  Cart
@endsection
@section('add_css')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/cart_styles.css">
@endsection
@section('frontend_content')
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>

            <div class="cart_items">
              <table class="table">
                <thead>
                    <tr>
                      <td class="cart_item_title">Picture</td>
                      <td class="cart_item_title">Name</td>
                      <td class="cart_item_title">Color</td>
                      <td class="cart_item_title">Size</td>
                      <td class="cart_item_title">Quantity</td>
                      <td class="cart_item_title">Price</td>
                      <td class="cart_item_title">SubTotal</td>
                      <td class="cart_item_title">Action</td>
                    </tr>
                </thead>
                <tbody class="mt-4">
                  @foreach($carts as $cart)
                      <tr>
                            <form action="{{ route('update.cart') }}" method="POST" style="display: none;">
                              @csrf
                              <input type="hidden" name="rowId" value="{{ $cart->rowId }}">
                                <td>
                                  <img src="{{ asset('uploads/products') }}/{{ App\Model\Product::find($cart->id)->thambnail_picture }}" height="80" width="90%" alt="">
                                </td>
                                <td class="cart_item_text">{{ $cart->name }}</td>
                                <td class="cart_item_text">{{ $cart->options->color?$cart->options->color:'Default' }}</td>
                                <td class="cart_item_text">{{ $cart->options->size?$cart->options->size:'null' }}</td>
                                <td class="">
                                      <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                          <input id="quantity_input" name="quantity" type="text" pattern="[0-9]*" value="{{ $cart->qty }}">
                                        <div class="quantity_buttons">
                                          <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                          <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                      </div>
                                </td>
                                <td class="cart_item_text">{{ $cart->price }}</td>
                                <td class="cart_item_text">{{ $cart->subtotal }}</td>
                                <td class="">
                                  <div class="btn btn-group">
                                    <button type="submit" class="btn btn-success btn-sm" >update</button>
                                    <a href="{{ url('cart/remove/'.$cart->rowId) }}" class="btn btn-danger btn-sm">remove</a>
                                  </div>
                                </td>
                            </form>
                      </tr>
                  @endforeach

                </tbody>
              </table>

						</div>

						<!-- Order Total -->
						<div class="row mt-4">

              <div class="col-8 mt-4">
                @if (!Session::has('cupon'))
                  <div class="row">
                    <div class="col-5">
                      <input type="text" name="cupon" id="cupon_name" placeholder="Apply Cupon Code" value="" class="form-control py-2" style="border: 1px solid black">
                    </div>
                    <div class="col-2 ml-0">
                      <a id="cupon_apply_link" style="margin-left:-18px;color:#fff" class="btn btn-primary">Apply Cupon</a>
                    </div>
                  </div>
                @endif

              </div>
              <div class="col-4 text-right">
                <div class="order_total_title">SubTotal Total:</div>
                <div class="order_total_amount">${{ Cart::Subtotal() }}</div><br>
                @isset($cupon_name)
                  @if (Session::has('cupon'))
                    <div class="order_total_title">Discount :</div>
                    <div class="order_total_amount">
                      {{ Session::get('cupon')['discount'] }}%
                    </div><br>
                    <div class="order_total_title">Total :</div>
                    <div class="order_total_amount">${{ Session::get('cupon')['total'] }}</div>
                  @endif
                @else
                  <div class="order_total_title">Total :</div>
                  <div class="order_total_amount">${{ Cart::Subtotal() }}</div>
                @endisset


              </div>

						</div>


						<div class="cart_buttons">
							<a href="{{ url('shop') }}" class="button cart_button_checkout">Continue Shoping</a>
							<a href="{{ url('checkout') }}" class="button1 cart_button_checkout">Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
@section('js_script')
<script src="{{ asset('frontend_assets') }}/js/product_custom.js"></script>
<script type="text/javascript">
  $("#cupon_apply_link").on("click",function () {
    var cupon_name = $("#cupon_name").val()
    var cart_url = "{{ url('cart') }}/"+cupon_name
    window.location.href = cart_url
  })
</script>
@endsection
