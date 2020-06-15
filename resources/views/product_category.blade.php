@extends('layouts.frontend_master')
@section('title')
  {{ $category_name }}
@endsection
@section('add_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/shop_styles.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/shop_responsive.css">
@endsection
@section('frontend_content')

  <!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('fronend_assets') }}/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{ $category_name }}</h2>
		</div>
	</div>

  <!-- Shop -->

  <div class="shop">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">

          <!-- Shop Sidebar -->
          <div class="shop_sidebar">
            <div class="sidebar_section">
              <div class="sidebar_title">Categories</div>
              <ul class="sidebar_categories">
                @foreach ($categories as $category)
                  <li><a href="{{ url('category/'.$category->id) }}">{{ $category->category_name }}</a></li>
                @endforeach


              </ul>
            </div>

            <div class="sidebar_section filter_by_section">
              <div class="sidebar_title">Filter By</div>
              <div class="sidebar_subtitle">Price</div>
              <div class="filter_price">
                <div id="slider-range" class="slider_range"></div>
                <p>Range: </p>
                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
              </div>
            </div>

            <div class="sidebar_section">
              <div class="sidebar_subtitle brands_subtitle">Brands</div>
              <ul class="brands_list">
                @foreach($brands as $brand)
                  <li class="brand"><a href="#">{{ $brand->brand_name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>

        </div>

        <div class="col-lg-9">

          <!-- Shop Content -->

          <div class="shop_content">
            <div class="shop_bar clearfix">
              <div class="shop_product_count"><span>{{ $total_product }}</span> products Available</div>
              <div class="shop_sorting">
                <span>Sort by:</span>
                <ul>
                  <li>
                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                    <ul>
                      <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                      <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                      <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>



            <div class="product_grid">
              <div class="product_grid_border"></div>

                @foreach ($products as $product)
                  <!-- Product Item -->
                  <div class="product_item is_new">
                    <div class="product_border"></div>
                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" alt="" height="100"></div>
                    <div class="product_content">
                      <div class="product_price">${{ $product->selling_price }}</div>
                      <div class="product_name"><div><a href="{{ url('product/details/'.$product->id) }}" tabindex="0">{{ $product->product_name }}</a></div></div>
                    </div>

                    <div class="product_extras">
                      <button id="add_to_cart" data-id="{{ $product->id }}" class="btn btn-outline-primary btn-block product_cart_button">Add to Cart</button>
                    </div>

                    <div class="product_fav" id="wishlist" data-id="{{ $product->id }}"><i class="fas fa-heart"></i></div>
                    <ul class="product_marks">
                      <li class="product_mark product_discount">-25%</li>
                      <li class="product_mark product_discount">new</li>
                    </ul>
                  </div>


                @endforeach




            </div>



          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- News Latter -->
  @include('layouts.frontend_newslatter')

@endsection
@section('js_script')
  <script src="{{ asset('frontend_assets') }}/plugins/Isotope/isotope.pkgd.min.js"></script>
  <script src="{{ asset('frontend_assets') }}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <script src="{{ asset('frontend_assets') }}/plugins/parallax-js-master/parallax.min.js"></script>
  <script src="{{ asset('frontend_assets') }}/js/shop_custom.js"></script>
@endsection
