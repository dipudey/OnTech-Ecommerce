@extends('layouts.dashboard_master')
@section('title')
  Blog Category
@endsection
@section('blog')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Blog Category</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/blog/category') }}">Category</a></li>
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
                        <h2><strong>Blog Category</strong> Add</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/blog/category/add/post') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <label for="category">Category Name English</label>
                            <div class="form-group">
                                <input type="text" name="category_name_en" id="category" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('category_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="category_name_bn">Category Name Bangla</label>
                            <div class="form-group">
                                <input type="text" name="category_name_bn" id="category" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('category_name_bn')
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
