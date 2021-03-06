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
                      <li class="breadcrumb-item active">Edit {{ $product->product_name }} Product</li>
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
              <div class="col-12">
                <div class="card mt-5">
                    <div class="header">
                        <h2><strong>Product</strong> Update</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/product/update') }}" method="post" enctype="multipart/form-data">
                          @csrf

                          <div class="row clearfix">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="col-lg-4 col-md-6">
                                <label for="product_name">Product Name<span class="text-danger">*</span></label>
                                <div class="input-group masked-input">
                                  <input type="text" value="{{ $product->product_name }}" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name">

                                </div>
                                @error ('product_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label for="product_code">Product Code<span class="text-danger">*</span></label>
                                <div class="input-group masked-input">
                                  <input type="text" value="{{ $product->product_code }}" name="product_code" id="product_code" class="form-control" placeholder="Enter Product Code">

                                </div>
                                @error ('product_code')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label for="product_quantity">Product Quantity<span class="text-danger">*</span></label>
                                <div class="input-group masked-input">
                                  <input type="text" value="{{ $product->product_quantity }}" name="product_quantity" id="product_quantity" class="form-control" placeholder="Enter Product Quantity">

                                </div>
                                @error ('product_quantity')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                                <label for="">Category<span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control show-tick ms select2" data-placeholder="Select" id="category_id">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                      <option value="{{ $category->id }}" {{ $product->category_id == $category->id?"selected":'' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error ('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                                <label for="">Subcategory</label>
                                <select name="subcategory_id" class="form-control show-tick ms select2" id="add_subcategory">
                                  @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id?'selected':'' }}>{{ $subcategory->subcategory_name }}</option>
                                  @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                                <label for="">Brand</label>
                                <select name="brand_id" class="form-control show-tick ms select2">
                                    <option value="">--Select--</option>
                                    @foreach ($brands as $brand)
                                      <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id?'selected':'' }}>{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <label>Product Color <span class="text-danger">*</span></label>
                              <div class="form-group masked-input">
                                  <div class="form-line border p-1">
                                     <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="{{ $product->product_color }}">
                                      {{-- <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="dipu"> --}}
                                  </div>
                              </div>
                              @error ('product_color')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <label>Product Size</label>
                              <div class="form-group masked-input">
                                  <div class="form-line border p-1">
                                      <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="{{ $product->porduct_size }}">
                                  </div>
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <label for="selling_price">Selling Price<span class="text-danger">*</span></label>
                              <div class="form-group masked-input">
                                  <input type="text" value="{{ $product->selling_price }}" name="selling_price" id="selling_price" class="form-control" placeholder="Enter Selling Price">
                                  @error ('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <label for="video_link">Product Video Link</label>
                              <div class="form-group masked-input">
                                  <input type="text" value="{{ $product->video_link }}" name="video_link" id="video_link" class="form-control" placeholder="Enter Video Link">
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <label for="discount_price">Product Discount Price</label>
                              <div class="form-group masked-input">
                                  <input type="text" value="{{ $product->discount_price }}" name="discount_price" id="discount_price" class="form-control" placeholder="Enter Discount Price">
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                                <label for="">Status</label>
                                <select name="status" class="form-control show-tick ms select2">
                                    <option value="">--Select--</option>
                                    <option value="1" {{ $product->status == 1?'selected':'' }}>Active</option>
                                    <option value="2" {{ $product->status != 1?'selected':'' }}>Deactive</option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-md-12 mt-2">
                              <label for="product_details">Product Details<span class="text-danger">*</span></label>
                              <div class="border">
                                <textarea id="ckeditor" name="product_details">
                                  {{ $product->product_details }}
                                </textarea>
                              </div>
                              @error ('product_details')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>


                            <div class="col-4">
                              <label for="thambnail_picture">Old Product Thambnail Picture<span class="text-danger">*</span></label>
                              <div class="form-group">
                                <img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" class="form-control img-fluid" style="height:200px" alt="">
                              </div>
                            </div>

                            <div class="col-4">
                              <label for="thambnail_picture">New Product Thambnail Picture<span class="text-danger">*</span></label>
                              <div class="form-group">
                                  <input type="file" name="thambnail_picture" id="thambnail_picture" class="form-control dropify">
                                  @error ('thambnail_picture')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-4">
                              <label for="thambnail_picture">Change Product Multipale Picture<span class="text-danger">*</span></label>
                              <div class="mt-5">
                                <a href="{{ url('admin/product/change/multipale/picture') }}/{{ $product->id }}" class="btn btn-outline-info mt-3 text-white"> Change Multiple Picture </a>
                              </div>
                            </div>



                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="main_slider" name="main_slider" value="1" type="checkbox" {{ $product->main_slider == 1?'checked':'' }}>
                                  <label for="main_slider">
                                          Main Slider
                                  </label>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="hot_deal" name="hot_deal" value="1" type="checkbox" {{ $product->hot_deal == 1?'checked':'' }}>
                                  <label for="hot_deal">
                                        Hot Deal
                                  </label>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="best_rated" name="best_rated" value="1" type="checkbox" {{ $product->best_rated == 1?'checked':'' }}>
                                  <label for="best_rated">
                                      Best Rated
                                  </label>
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="trend" name="trend" value="1" type="checkbox" {{ $product->trend == 1?'checked':'' }}>
                                  <label for="trend">
                                          Trend Product
                                  </label>
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="mid_slider" name="mid_slider" value="1" type="checkbox" {{ $product->mid_slider == 1?'checked':'' }}>
                                  <label for="mid_slider">
                                        Mid Slider
                                  </label>
                              </div>
                            </div>

                            <div class="col-lg-4 col-md-4 mt-2">
                              <div class="checkbox">
                                  <input id="hot_new" name="hot_new" value="1" type="checkbox" {{ $product->hot_new == 1?'checked':'' }}>
                                  <label for="hot_new">
                                      Hot New
                                  </label>
                              </div>
                            </div>


                          </div>

                          <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect btn-block mt-3">Update Product</button>

                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>

@endsection

@section('script')
  <script>

    $(document).ready(function(){
      $("#category_id").on('change',function(){
        var cat_id = $(this).val();
        $.ajax({
          url: '/admin/product/subcategory/'+cat_id,
          method: 'get',
          dataType: 'json',
          success: function(data){
            var len = data.subcategories.length;
            var html="<option value=''>-------------</option>";
            for(var i = 0; i < len; i++){
              // html = html + "<option value='"+data.subcategories[i].id+"'>dd</option>";
              html = html + `<option value='${data.subcategories[i].id}'>${data.subcategories[i].subcategory_name}</option>`;
            }
            $("#add_subcategory").append(html);
          }
        });
      });
    });

  </script>
@endsection
