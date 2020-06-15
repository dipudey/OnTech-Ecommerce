@extends('layouts.frontend_master')
@section('title')
  {{ $product->product_name }}
@endsection
@section('add_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_styles.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/product_responsive.css">
@endsection
@section('frontend_content')

  <!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}"><img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" alt=""></li>
            @foreach($multi_pictures as $multi_picture)
              <li data-image="{{ asset('uploads/multipale_product_picture') }}/{{ $multi_picture->multipale_product_picture }}"><img src="{{ asset('uploads/multipale_product_picture') }}/{{ $multi_picture->multipale_product_picture }}" alt=""></li>
            @endforeach
          </ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->category_name }}</div>
						@if ($product->brand_id)
              <div class="product_category">{{ $product->brand->brand_name }}</div>
            @endif
						<div class="product_name">{{ $product->product_name }}</div>
						<div class="rating_r rating_r_4 product_rating">
              <i></i>
              <i></i>
              <i></i>
              <i></i>
              <i class="fa fa-start"></i>
            </div>
						<div class="product_text">
              {{-- {!! $product->product_details !!} --}}
            </div>
						<div class="order_info d-flex flex-row">
							<form action="{{ url('add/to/cart') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="row">
                  <div class="col-12">
									 	 <div class="form-group">
                       <div class="row">
                         <div class="col-4">
                           <label for="exampleFormControlSelect1">Color :</label>
                         </div>
                         <div class="col-7">
                           <select class="form-control input-lg" id="exampleFormControlSelect1" name="color">
                             @foreach(explode(',',$product->product_color) as $row)
                               <option value="{{ $row }}">{{ $row }}</option>
                             @endforeach
 											    </select>
                         </div>
                       </div>
										  </div>
									</div>
                </div>
                @if ($product->porduct_size)
                  <div class="row">
                    <div class="col-12">
  									 	 <div class="form-group">
                         <div class="row">
                           <div class="col-4">
                             <label for="exampleFormControlSelect1">Size :</label>
                           </div>
                           <div class="col-7">
                             <select class="form-control input-lg" id="exampleFormControlSelect1" name="size">
                               @foreach(explode(',',$product->porduct_size) as $row)
                                 <option value="{{ $row }}">{{ $row }}</option>
                               @endforeach
   											    </select>
                           </div>
                         </div>
  										  </div>
  									</div>
                  </div>
                @endif


                <div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" name="quantity" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>


								</div>

								<div class="product_price">$
                  @if ($product->discount_price)
                    {{ $product->selling_price - ($product->discount_price*$product->selling_price/100) }}
                  @else
                    {{ $product->selling_price }}
                  @endif
                </div>
								<div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav">dd<i class="fas fa-heart"></i></div>
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

  <div class="viewed">
  		<div class="container">
  			<div class="row">
  				<div class="col">
  					<div class="viewed_title_container">
  						<h3 class="viewed_title">Product Details</h3>

  					</div>

  					<div class="">
  							<ul class="nav nav-tabs" id="myTab" role="tablist">
  							  <li class="nav-item">
  							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
  							  </li>
  							  <li class="nav-item">
  							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video or Link</a>
  							  </li>
  							  <li class="nav-item">
  							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Product Review</a>
  							  </li>
  							</ul><br>
  							<div class="tab-content" id="myTabContent">
  							  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  							  		{!! $product->product_details !!}
  							  </div>
  							  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  							  	 {{-- Product Videos : {!! $product->video_link !!} --}}
  							  </div>
  							  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  							  	<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8">

                      @forelse($reviews as $review)
                          <div class="review-wrap">
                              <ul>
                                  <li class="review-items">
                                      <div class="review-img">
                                          <img src="{{ asset('uploads/products/') }}" alt="">
                                      </div>
                                      <div class="review-content">
                                          <h3><a href="#">{{ $review->user->name }}</a></h3>
                                          <span>{{ $review->created_at->format('d M Y') }} At {{ $review->created_at->format('h:i:sA') }}</span>
                                          <p>{{ $review->message }}</p>
                                          <ul class="rating">
                                            @for($i = 0;$i < $review->start;$i++)
                                              <li><i class="fa fa-star"></i></li>
                                            @endfor
                                          </ul>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      @empty
                        <span class="text-danger text-center my-5">No Reviews Available</span>
                      @endforelse
                          <div class="add-review">
                              <h4>Add A Review</h4>
                              <form action="{{ url('review') }}" method="post">
                                @csrf
                                  <div class="ratting-wrap">
                                      <table>
                                          <thead>
                                              <tr>
                                                  <th>task</th>
                                                  <th>1 Star</th>
                                                  <th>2 Star</th>
                                                  <th>3 Star</th>
                                                  <th>4 Star</th>
                                                  <th>5 Star</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>How Many Stars?</td>
                                                  <td>
                                                      <input type="radio" value="1" name="start" required />
                                                  </td>
                                                  <td>
                                                      <input type="radio" value="2" name="start" required />
                                                  </td>
                                                  <td>
                                                      <input type="radio" value="3" name="start" required />
                                                  </td>
                                                  <td>
                                                      <input type="radio" value="4" name="start" required />
                                                  </td>
                                                  <td>
                                                      <input type="radio" value="5" name="start" required />
                                                  </td>
                                              </tr>
                                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="row">
                                      <div class="col-12">
                                          <h4>Your Review:</h4>
                                          <textarea name="massage" id="massage" required cols="30" rows="10" placeholder="Your review here..."></textarea>
                                      </div>
                                      <div class="col-12">
                                          <button class="btn-style" type="submit">Submit</button>
                                      </div>
                                  </div>
                              </form>
                          </div>




                    </div>

  							  </div>
  							</div>
  					</div>
  				</div>
  			</div>
  		</div>
  </div>

    <!-- Related Product -->

    <div class="viewed">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="viewed_title_container">
              <h3 class="viewed_title">Related Product</h3>
              <div class="viewed_nav_container">
                <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
              </div>
            </div>

            <div class="viewed_slider_container">

              <!-- Recently Viewed Slider -->

              <div class="owl-carousel owl-theme viewed_slider">
                @foreach ($related_products as $related_product)
                    <!-- Recently Viewed Item -->
                    <div class="owl-item">
                      <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="viewed_image"><img src="{{ asset('uploads/products') }}/{{ $related_product->thambnail_picture }}" alt=""></div>
                        <div class="viewed_content text-center">
                          <div class="viewed_price">
                            @if ($related_product->discount_price)
                              @php
                                $current_price = $related_product->discount_price*$related_product->selling_price/100;
                              @endphp
    												  <div class="product_price discount">${{ $related_product->selling_price - $current_price }}</div>
                            @else
                              <div class="product_price">${{ $related_product->selling_price }}</div>
                            @endif
                          </div>
                          <div class="viewed_name"><a href="{{ url('product/details/'.$related_product->id) }}">{{ $related_product->product_name }}...</a></div>
                        </div>
                      </div>
                    </div>
                @endforeach

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
@section('js_script')
<script src="{{ asset('frontend_assets') }}/js/product_custom.js"></script>
@endsection
