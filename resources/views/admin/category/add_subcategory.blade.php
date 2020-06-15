@extends('layouts.dashboard_master')
@section('title')
  Subcategory
@endsection
@section('category')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Dashboard</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/subcategory') }}">Subcategory</a></li>
                      <li class="breadcrumb-item active">Add Subcategory</li>
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
                        <form action="{{ url('admin/subcategory/store') }}" method="post">
                          @csrf
                            <label for="subcategory">Subcategory Name</label>
                            <div class="form-group">
                                <input type="text" name="subcategory_name" id="subcategory" class="form-control" placeholder="Enter Subcantegory Name">
                                @error ('subcategory_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="category_picture">Select Category</label>
                            <div class="form-group">
                              <select class="form-control show-tick" name="category_id">
                                  <option value="">-- Please select --</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                              </select>
                              @error ('category_id')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Add Subcategory</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
