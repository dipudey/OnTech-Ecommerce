@extends('layouts.dashboard_master')
@section('title')
  Brand
@endsection
@section('brand')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Brand</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/brand') }}">Brand</a></li>
                      <li class="breadcrumb-item active">{{ $brand->brand_name }}</li>
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
              <div class="col-6 m-auto">
                <div class="card mt-5">
                    <div class="header">
                        <h2><strong>Brand</strong> Edit</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/brand/update') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="id" value="{{ $brand->id }}">
                            <label for="brand_name">Brand Name</label>
                            <div class="form-group">
                                <input type="text" value="{{ $brand->brand_name }}" name="brand_name" id="brand_name" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('brand_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="">Old Brand Picture</label>
                            <div class="form-group">
                                <img src="{{ asset('uploads/brands') }}/{{ $brand->brand_picture }}" alt="Brand Picture" height="20" width="80">
                            </div>

                            <label for="brand_picture">New Brand Picture</label>
                            <div class="form-group">
                                <input type="file" name="brand_picture" id="brand_picture" class="form-control dropify" placeholder="Enter a Cantegory Picture">
                                @error ('brand_picture')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update Brand</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
