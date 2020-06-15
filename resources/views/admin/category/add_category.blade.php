@extends('layouts.dashboard_master')
@section('title')
  Category
@endsection
@section('category')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Category</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/category') }}">Category</a></li>
                      <li class="breadcrumb-item active">Add Category</li>
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
                        <h2><strong>Subcategory</strong> Add</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/category/add/post') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <label for="category">Category Name</label>
                            <div class="form-group">
                                <input type="text" name="category_name" id="category" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('category_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="category_picture">Category Picture</label>
                            <div class="form-group">
                                <input type="file" name="category_picture" id="category_picture" class="form-control dropify" placeholder="Enter a Cantegory Picture">
                                @error ('category_picture')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Add Category</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
