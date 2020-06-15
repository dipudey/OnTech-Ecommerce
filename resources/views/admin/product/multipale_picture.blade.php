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
                      <li class="breadcrumb-item active">Change Multipale Product Picture</li>
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
          <div class="card">
            <div class="card-header">
              Change Multipale Picture
            </div>
            <div class="card-body">
              <div class="row clearfix">
                @foreach ($multipales as $picture)
                  <div class="col-4">
                    <img src="{{ asset('uploads/multipale_product_picture') }}/{{ $picture->multipale_product_picture }}" class="img-fluid" style="height:150px" alt="">
                  </div>
                @endforeach
              </div>
              <div class="row clearfix">
                <form action="" method="post">
                  @csrf
                  <div class="form-group">
                      <input type="file" name="multipale_picture[]" id="multipale_picture" class="form-control dropify" multiple>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
  </section>


@endsection
