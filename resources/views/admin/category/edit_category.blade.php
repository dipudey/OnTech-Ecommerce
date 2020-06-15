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
                      <li class="breadcrumb-item active">{{ $category->category_name }}</li>
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
                        <h2><strong>Category</strong> Add</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/category/update') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <label for="category">Category Name</label>
                            <div class="form-group">
                                <input type="text" value="{{ $category->category_name }}" name="category_name" id="category" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('category_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="category">Category Old Picture</label>
                            <div class="form-group">
                              <img src="{{ asset('uploads/categories') }}/{{ $category->category_picture }}">
                            </div>

                            <label for="category_picture">Category Picture</label>
                            <div class="form-group">
                                <input type="file" name="category_picture" id="category_picture" class="form-control dropify">
                                @error ('category_picture')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update Category</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
