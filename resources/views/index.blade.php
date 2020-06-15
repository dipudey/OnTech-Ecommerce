@extends('layouts.frontend_master')
@section('title')
  OneTech
@endsection
@section('frontend_content')

	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="{{ asset('uploads/products') }}/{{ $banner->thambnail_picture }}" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of {{ $banner->product_name }}</h1>
						<div class="banner_price">
              @if($banner->discount_price == null)
                <h2>${{ $banner->selling_price }}</h2>
              @else
                <span>${{ $banner->selling_price }}</span>${{ $banner->selling_price - $banner->discount_price }}
              @endif
            </div>
						<div class="banner_product_name">
              @if ($banner->brand_id)
                {{ $banner->brand->brand_name }}
              @endif
            </div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend_assets') }}/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend_assets') }}/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend_assets') }}/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">

					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend_assets') }}/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Deals of the Week</div>
						<div class="deals_slider_container">

							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
                @foreach($hot_deal_products as $hot_deal_product)
  								<!-- Deals Item -->
  								<div class="owl-item deals_item">
  									<div class="deals_image"><img src="{{ asset('uploads/products') }}/{{ $hot_deal_product->thambnail_picture }}" alt=""></div>
  									<div class="deals_content">
  										<div class="deals_info_line d-flex flex-row justify-content-start">
  											<div class="deals_item_category"><a href="#">{{ $hot_deal_product->category->category_name }}</a></div>
  											<div class="deals_item_price_a ml-auto">${{ $hot_deal_product->selling_price }}</div>
  										</div>
  										<div class="deals_info_line d-flex flex-row justify-content-start">
  											<div class="deals_item_name">{{ $hot_deal_product->product_name }}</div>
  											<div class="deals_item_price ml-auto">
                          @php
                            $after_discount_current_price = $hot_deal_product->discount_price*$hot_deal_product->selling_price/100;
                          @endphp
                          {{ $hot_deal_product->selling_price - $after_discount_current_price }}$
                        </div>
  										</div>
  										<div class="available">
  											<div class="available_line d-flex flex-row justify-content-start">
  												<div class="available_title">Available: <span>{{ $hot_deal_product->product_quantity }}</span></div>
  												{{-- <div class="sold_title ml-auto">Already sold: <span>28</span></div> --}}
  											</div>
  											<div class="available_bar"><span style="width:17%"></span></div>
  										</div>
  										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
  											<div class="deals_timer_title_container">
  												<div class="deals_timer_title">Hurry Up</div>
  												<div class="deals_timer_subtitle">Offer ends in:</div>
  											</div>
  											<div class="deals_timer_content ml-auto">
  												<div class="deals_timer_box clearfix" data-target-time="">
  													<div class="deals_timer_unit">
  														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
  														<span>hours</span>
  													</div>
  													<div class="deals_timer_unit">
  														<div id="deals_timer1_min" class="deals_timer_min"></div>
  														<span>mins</span>
  													</div>
  													<div class="deals_timer_unit">
  														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
  														<span>secs</span>
  													</div>
  												</div>
  											</div>
  										</div>
  									</div>
  								</div>
                @endforeach

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>

					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Featured</li>
									<li>Trend</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
									@foreach($featured_products as $featured_product)
									   <!-- Slider Item -->
  									<div class="featured_slider_item">
  										<div class="border_active"></div>
  										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
  											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('uploads/products') }}/{{ $featured_product->thambnail_picture }}" alt="" height="100"></div>
  											<div class="product_content">
                          @if ($featured_product->discount_price)
                            @php
                              $current_price = $featured_product->discount_price*$featured_product->selling_price/100;
                            @endphp
  												  <div class="product_price discount">${{ $featured_product->selling_price - $current_price }}<span>${{ $featured_product->selling_price }}</span></div>
                          @else
                            <div class="product_price">${{ $featured_product->selling_price }}</div>
                          @endif
  												<div class="product_name" style=""><div><a href="{{ url('product/details/'.$featured_product->id) }}">{{ $featured_product->product_name }}...</a></div></div>
  												<div class="product_extras">

  													<button class="product_cart_button" id="add_to_cart" data-id={{ $featured_product->id }}>Add to Cart</button>

  												</div>
  											</div>

                          <div class="product_fav" id="wishlist" data-id="{{ $featured_product->id }}"><i class="fas fa-heart"></i></div>



  											<ul class="product_marks">
                          @if ($featured_product->discount_price)
                            <li class="product_mark product_discount">-{{ $featured_product->discount_price }}%</li>
                          @else
                            <li class="product_mark product_discount" style="background:#0e8ce4">New</li>
                          @endif
  											</ul>
  										</div>
  									</div>
                  @endforeach



								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">
                  @foreach($trend_products as $trend_product)
									    <!-- Slider Item -->
                      <div class="featured_slider_item">
                        <div class="border_active"></div>
                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                          <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('uploads/products') }}/{{ $trend_product->thambnail_picture }}" alt="" height="100"></div>
                          <div class="product_content">
                            @if ($trend_product->discount_price)
                              @php
                                $current_price = $trend_product->discount_price*$trend_product->selling_price/100;
                              @endphp
    												  <div class="product_price discount">${{ $trend_product->selling_price - $current_price }}<span>${{ $trend_product->selling_price }}</span></div>
                            @else
                              <div class="product_price">${{ $trend_product->selling_price }}</div>
                            @endif
                            <div class="product_name" style=""><div><a href="{{ url('product/details/'.$trend_product->id) }}">{{ $trend_product->product_name }}...</a></div></div>
                            <div class="product_extras">

                              <button class="product_cart_button" id="add_to_cart" data-id={{ $trend_product->id }}>Add to Cart</button>
                            </div>
                          </div>

                          <div class="product_fav" id="wishlist" data-id="{{ $trend_product->id }}"><i class="fas fa-heart"></i></div>

                          <ul class="product_marks">
                            @if ($trend_product->discount_price)
                              <li class="product_mark product_discount">-{{ $trend_product->discount_price }}%</li>
                            @else
                              <li class="product_mark product_discount" style="background:#0e8ce4">New</li>
                            @endif
                          </ul>
                        </div>
                      </div>
                  @endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>


						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Popular Categories</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">full catalog</a></div>
					</div>
				</div>

				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

              @foreach($categories as $category)
  							<!-- Popular Categories Item -->
  							<div class="owl-item">
  								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
  									<div class="popular_category_image"><img src="{{ asset('uploads/categories') }}/{{ $category->category_picture }}" alt=""></div>
  									<div class="popular_category_text">{{ $category->category_name }}</div>
  								</div>
  							</div>
              @endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

        @foreach($mide_sliders as $mide_slider)
    				<!-- Banner 2 Slider Item -->
    				<div class="owl-item">
    					<div class="banner_2_item">
    						<div class="container fill_height">
    							<div class="row fill_height">
    								<div class="col-lg-4 col-md-6 fill_height">
    									<div class="banner_2_content">
    										<div class="banner_2_category">{{ $mide_slider->category->category_name }}</div>
    										<div class="banner_2_title">{{ $mide_slider->product_name }}</div>
    										<div class="banner_2_text">{!! Str::limit($mide_slider->product_details,80) !!}</div>
    										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
    										<div class="button banner_2_button"><a href="{{ url('product/details/'.$mide_slider->id) }}">Explore</a></div>
    									</div>

    								</div>
    								<div class="col-lg-8 col-md-6 fill_height">
    									<div class="banner_2_image_container">
    										<div class="banner_2_image"><img src="{{ asset('uploads/products') }}/{{ $mide_slider->thambnail_picture }}" alt="" width="40" height="500"></div>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>

        @endforeach


			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">

				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Best Sellers</div>
							<ul class="clearfix">
								<li class="active"></li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{ asset('frontend_assets') }}/images/best_1.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{ asset('frontend_assets') }}/images/best_2.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item">
									<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image"><img src="{{ asset('frontend_assets') }}/images/best_3.png" alt=""></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#">Headphones</a></div>
											<div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
											<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="bestsellers_price discount">$225<span>$300</span></div>
										</div>
									</div>
									<div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount">-25%</li>
										<li class="bestsellers_mark bestsellers_new">new</li>
									</ul>
								</div>


							</div>
						</div>

          </div>

				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{ asset('frontend_assets') }}/images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{ asset('frontend_assets') }}/images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">

					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="{{ asset('frontend_assets') }}/images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="reviews_title_container">
						<h3 class="reviews_title">Latest Reviews</h3>
					</div>

					<div class="reviews_slider_container">

						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">

              @foreach($latest_reviews as $latest_review)
    							<!-- Reviews Slider Item -->
    							<div class="owl-item">
    								<div class="review d-flex flex-row align-items-start justify-content-start">
    									<div><div class="review_image"><img src="{{ asset('uploads/products') }}/{{ $latest_review->product->thambnail_picture }}" alt=""></div></div>
    									<div class="review_content">
    										<div class="review_name">{{ $latest_review->product->product_name }}</div>
    										<div class="review_rating_container">
    											<div class="rating_r rating_r_4 review_rating">
                            @for ($i=0; $i < $latest_review->start; $i++)
                              <i></i>
                            @endfor
                          </div>
    											<div class="review_time">{{ $latest_review->created_at->diffForHumans() }}</div>
    										</div>
    										<div class="review_text"><p>{{ Str::limit($latest_review->message,100) }}</p></div>
    									</div>
    								</div>
    							</div>
              @endforeach

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Best Rated</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">

						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
              @foreach($best_rated_products as $best_rated_product)
    							<!-- Recently Viewed Item -->
    							<div class="owl-item">
    								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
    									<div class="viewed_image"><img src="{{ asset('uploads/products') }}/{{ $best_rated_product->thambnail_picture }}" alt=""></div>
    									<div class="viewed_content text-center">
    										<div class="viewed_price">
                          @if ($best_rated_product->discount_price)
                            @php
                              $current_price = $best_rated_product->discount_price*$best_rated_product->selling_price/100;
                            @endphp
                            ${{ $best_rated_product->selling_price - $current_price }}<span>${{ $best_rated_product->selling_price }}</span>
                          @else
                            ${{ $best_rated_product->selling_price }}
                          @endif

                        </div>
    										<div class="viewed_name"><a href="{{ url('product/details/'.$best_rated_product->id) }}">{{ $best_rated_product->product_name }}</a></div>
    									</div>
    									<ul class="item_marks">
                        @if ($best_rated_product->discount_price)
                          <li class="item_mark item_discount">-{{ $best_rated_product->discount_price }}%</li>
                        @endif
    									</ul>
    								</div>
    							</div>
                @endforeach

          	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">

						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
              @foreach($brands as $brand)
							   <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('uploads/brands') }}/{{ $brand->brand_picture }}" alt=""></div></div>
              @endforeach
						</div>

						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

  <!-- News Latter -->

  @include('layouts.frontend_newslatter')


@endsection
