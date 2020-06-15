
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<link href="{{ asset('frontend_assets') }}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/bootstrap4/bootstrap.min.css">
@if (url()->current() != url('/'))
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/cart_styles.css">
@endif
@yield('add_css')
@if (url()->current() != url('shop') && url()->current() != url('search/'.Request::route('name')) && url()->current() != url('category/'.Request::route('id')) && url()->current() != url('subcategory/'.Request::route('subcategory_id')))
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/responsive.css">
@endif

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->
@php
	$setting = App\Model\Setting::find(1);
@endphp
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend_assets') }}/images/phone.png" alt=""></div>{{ $setting->phone }}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend_assets') }}/images/mail.png" alt=""></div><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										@if (Session::has('lang'))
											<a href="{{ url('change/language/english') }}">English<i class="fas fa-chevron-down"></i></a>
										@else
											<a href="{{ url('change/language/bangla') }}">Bangla<i class="fas fa-chevron-down"></i></a>
										@endif
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#exampleModal">Order Tracking<i class="fas fa-chevron-down"></i></a>

									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								@guest
									{{-- <div class="user_icon"><img src="{{ asset('frontend_assets') }}/images/user.svg" alt=""></div> --}}
									<div><a href="{{ url('login') }}">Register | Sign in</a></div>
								@else
									<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="#"><div class="user_icon"><img src="{{ asset('frontend_assets') }}/images/user.svg" alt=""></div><i class="fas fa-chevron-down"></i>{{ Auth::user()->name }}</a>
											<ul>
												<li><a href="{{ url('/home') }}">Profile</a></li>
												<li>
														<a href="{{ route('logout') }}" onclick="event.preventDefault();
									                    document.getElementById('logout-form').submit();">Logout</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													      @csrf
													  </form>
												</li>
											</ul>
										</li>
									</ul>
								@endguest

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{ url('/') }}">OneTech</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									{{-- <form action="{{ url('search') }}" method="post" class="header_search_form clearfix"> --}}
										{{-- @csrf --}}
										<input type="search" id="search-item" name="search" required="required" class="header_search_input" placeholder="Search for products..." value="{{ Request::route('name')??Request::route('name') }}">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													@foreach (App\Model\Category::all() as $category)
														<li><a class="clc" href="#">{{ $category->category_name }}</a></li>
													@endforeach
												</ul>
											</div>
										</div>
										<button id="searching" class="header_search_button trans_300" value="Submit"><img src="{{ asset('frontend_assets') }}/images/search.png" alt=""></button>
									{{-- </form> --}}
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<!-- Wishlist -->
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							@auth
								<div class="wishlist d-flex flex-row align-items-center justify-content-end">
									<div class="wishlist_icon"><img src="{{ asset('frontend_assets') }}/images/heart.png" alt=""></div>
									<div class="wishlist_content">
										<div class="wishlist_text"><a href="{{ url('wishlist') }}">Wishlist</a></div>
										<div class="wishlist_count">
											{{ App\Model\Wishlist::where('user_id',Auth::id())->count() }}
										</div>
									</div>
								</div>
							@endauth

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{ asset('frontend_assets') }}/images/cart.png" alt="">
										<div class="cart_count"><span>{{ Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ url('cart') }}">Cart</a></div>
										<div class="cart_price">${{ Cart::Subtotal() }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
		  <div class="container">
		    <div class="row">
		      <div class="col">

		        <div class="main_nav_content d-flex flex-row">

		          <!-- Categories Menu -->

		          <div class="cat_menu_container">
		            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
		              <div class="cat_burger"><span></span><span></span><span></span></div>
		              <div class="cat_menu_text">categories</div>
		            </div>

		            <ul class="cat_menu">
		              @foreach (App\Model\Category::all() as 	$category)
		                <li class="hassubs">
		                <a href="{{ url('category') }}/{{ $category->id }}">{{ $category->category_name }}
		                  @if (App\Model\Subcategory::where('category_id',$category->id)->exists())
		                    <i class="fas fa-chevron-right"></i>
		                  @endif
		                </a>
		                <ul>
		                  @foreach (App\Model\Subcategory::where('category_id',$category->id)->get() as $subcategory)
		                    <li><a href="{{ url('subcategory') }}/{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}<i class="fas fa-chevron-right"></i></a></li>
		                  @endforeach
		                </ul>
		              </li>
		              @endforeach



		            </ul>
		          </div>

		          <!-- Main Nav Menu -->

		          <div class="main_nav_menu ml-auto">
		            <ul class="standard_dropdown main_nav_dropdown">
		              <li><a href="{{ url('/') }}">Home<i class="fas fa-chevron-down"></i></a></li>
		              <li><a href="{{ url('shop') }}">Shop<i class="fas fa-chevron-down"></i></a></li>

		              <li><a href="{{ url('blog') }}">Blog<i class="fas fa-chevron-down"></i></a></li>
		              <li><a href="{{ url('contact') }}">Contact<i class="fas fa-chevron-down"></i></a></li>
		              <li><a href="">Help<i class="fas fa-chevron-down"></i></a></li>
		            </ul>
		          </div>

		          <!-- Menu Trigger -->

		          <div class="menu_trigger_container ml-auto">
		            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
		              <div class="menu_burger">
		                <div class="menu_trigger_text">menu</div>
		                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
		              </div>
		            </div>
		          </div>

		        </div>

		      </div>
		    </div>
		  </div>
		</nav>


		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">

						<div class="page_menu_content">

							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">

								<li class="page_menu_item">
									<a href="{{ url('/') }}">Home<i class="fa fa-angle-down"></i></a>
								</li>

								<li class="page_menu_item"><a href="{{ url('shop') }}">Shop<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="{{ url('blog') }}">Blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="{{ url('contact') }}">contact<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="">Help<i class="fa fa-angle-down"></i></a></li>
							</ul>

							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('frontend_assets') }}/images/phone_white.png" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('frontend_assets') }}/images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>


@yield('frontend_content')


@include('layouts.product_view')

<!-- Order Tracking -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('order/tracking') }}" method="post">
        	@csrf
					<div class="from-group">
						<label for="order" class="form-label">Order Id</label>
						<input type="text" name="order_id" id="order_id" class="form-control" required placeholder="Enter Order Id">
					</div>
					<div class="from-group mt-3 float-right">
						<button type="submit" name="button" class="btn btn-outline-success">Submit</button>
					</div>

        </form>
      </div>

    </div>
  </div>
</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">{{ $setting->shopname }}</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{ $setting->phone }}</div>
						<div class="footer_contact_text">
							<p>{{ $setting->address }}</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							@foreach (App\Model\Category::limit(5)->get() as $category)
								<li><a href="#">{{ $category->category_name }}</a></li>
							@endforeach

						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">

				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							@auth
								<li><a href="{{ url('home') }}">My Account</a></li>
							@else
								<li><a href="{{ url('login') }}">Login|Register</a></li>
							@endauth
							<li><a href="#" data-toggle="modal" data-target="#exampleModal">Order Tracking</a></li>
							<li><a href="#">Helps</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Site is Develop <i class="fa fa-heart" aria-hidden="true"></i> by <a href="" target="_blank">Dipu Chandra Dey</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend_assets') }}/images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('frontend_assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('frontend_assets') }}/styles/bootstrap4/popper.js"></script>
<script src="{{ asset('frontend_assets') }}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/slick-1.8.0/slick.js"></script>
<script src="{{ asset('frontend_assets') }}/plugins/easing/easing.js"></script>

<script src="{{ asset('frontend_assets') }}/js/custom.js"></script>
<script src="{{ asset('frontend_assets') }}/js/product_view.js"></script>
@yield('js_script')
{{-- <script src="{{ asset('frontend_assets') }}/js/sweetalert.min.js"></script> --}}
<!--toastr Js file link -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script type="text/javascript">
	$("body").on("click","#wishlist",function(e){
		var id = $(this).data('id');
		// alert(id)
		if (id) {
			$.ajax({
				url: "/add/wishlist/"+id,
				type: "GET",
				dataType: "json",
				success: function(data){
					if ($.isEmptyObject(data.error)) {
						toastr.success(data.success)
					}
					else {
						toastr.warning(data.error)
					}
				}
			})
		}
	})

	$('body').on("click","#addToCart",function() {
		var id = $(this).data('id');
		// alert(id)
		$.ajax({
			url: "/add/cart/"+id,
			type: 'get',
			dataType: 'json',
			success: function(data){
				// console.log(data.result)
				toastr.success(data.result)
			}
		})
	})

	@if (session('message'))
      var alert = "{{ session('type') }}";
      var message = "{{ session('message') }}";
      switch (alert) {
        case "error":
          toastr.error(message)
          break;
        case "warning":
          toastr.warning(message)
          break;
        case "info":
          toastr.info(message)
          break;
        default:
          toastr.success(message)
          break;
      }
  @endif
</script>
<script type="text/javascript">
	$("#searching").on('click',function() {
		var item_name = $("#search-item").val()
		var searching_url = "{{ url('search') }}/"+ item_name
		// alert(searching_url)
		window.location = searching_url
	})
</script>

</body>

</html>
