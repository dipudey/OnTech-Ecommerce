@extends('layouts.dashboard_master')
@section('title')
  Product
@endsection
@section('product')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Product</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                      <li class="breadcrumb-item active">View Prodcut</li>
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
            <div class="col-12 mb-2">
              <a href="{{ url('admin/product') }}" class="float-right btn btn-success">Back</a>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-12">
                                <div class="preview preview-pic tab-content">
                                    <div class="tab-pane active" id="product_11"><img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" class="img-fluid" alt="" /></div>
                                  @foreach($multi_pictures as $picture)
                                    <div class="tab-pane" id="product_{{ $picture->id }}"><img src="{{ asset('uploads/multipale_product_picture') }}/{{ $picture->multipale_product_picture }}" class="img-fluid" alt=""/></div>
                                  @endforeach
                                </div>
                                <ul class="preview thumbnail nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product_11"><img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" alt=""/></a></li>
                                    @foreach($multi_pictures as $picture)
                                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product_{{ $picture->id }}"><img src="{{ asset('uploads/multipale_product_picture') }}/{{ $picture->multipale_product_picture }}" alt=""/></a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-12">
                                <div class="product details">
                                    <h3 class="product-title mb-0">{{ $product->product_name }}</h3>
                                    <h5 class="price mt-0">Current Price: <span class="col-amber">${{ $product->selling_price }}</span></h5>
                                    @if ($product->discount_price)
                                      <h5 class="price mt-1">Discount Price: <span class="col-amber">${{ $product->discount_price }}</span></h5>
                                    @endif

                                    <h5 class="price mt-0">Product Quantity: <span class="col-amber">{{ $product->product_quantity }}</span></h5>

                                    <h6 class="price mt-0">Category: <span class="text-warning">{{ $product->category->category_name }}</span></h6>

                                    @if ($product->subcategory)
                                      <h6 class="price mt-0">SubCategory: <span class="text-info">{{ $product->subcategory->subcategory_name }}</span></h6>
                                    @endif

                                    @if ($product->brand)
                                      <h6 class="price mt-0">Brand: <span class="text-success">{{ $product->brand->brand_name }}</span></h6>
                                    @endif

                                    {{-- <div class="rating">
                                        <div class="stars">
                                            <span class="zmdi zmdi-star col-amber"></span>
                                            <span class="zmdi zmdi-star col-amber"></span>
                                            <span class="zmdi zmdi-star col-amber"></span>
                                            <span class="zmdi zmdi-star col-amber"></span>
                                            <span class="zmdi zmdi-star-outline"></span>
                                        </div>
                                        <span class="m-l-10">41 reviews</span>
                                    </div> --}}

                                    {{-- <hr> --}}


                                    @if ($product->porduct_size)
                                      <h5 class="sizes">Sizes:
                                        @foreach(explode(',',$product->porduct_size) as $size)
                                          <span class="size" title="medium">{{ $size }}</span>
                                        @endforeach
                                      </h5>
                                    @endif

                                    <h5 class="colors">colors:
                                      @foreach(explode(',',$product->product_color) as $row)

                                        <span class="color bg-{{ $row }} border"></span>
                                      @endforeach
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="body">
                      <div class="row clearfix">
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Main Slider -
                            </label>
                              @if ($product->main_slider == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Hot Deal -
                            </label>
                              @if ($product->hot_deal == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Best Rated -
                            </label>
                              @if ($product->best_rated == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Mid Slider -
                            </label>
                              @if ($product->mid_slider == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Hot New -
                            </label>
                              @if ($product->hot_new == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Trend -
                            </label>
                              @if ($product->trend == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <label>
                              Status -
                            </label>
                              @if ($product->status == 1)
                                <span class="badge badge-success">active<span>
                              @else
                                <span class="badge badge-danger">deactive<span>
                              @endif
                          </div>

                      </div>
                    </body>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Product Description</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Video LInk</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                {!! $product->product_details !!}
                            </div>
                            <div class="tab-pane" id="review">
                              <iframe src="{{ $product->video_link }}" width="" height=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
      </div>
  </section>

@endsection
