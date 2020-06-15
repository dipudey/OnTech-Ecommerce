@extends('layouts.dashboard_master')
@section('title')
  Profile
@endsection
@section('content')

  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Profile</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i></a></li>
                      <li class="breadcrumb-item active">Profile</li>
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
                      <h2><strong>{{ $data->name }}</strong> Profile</h2>
                  </div>
                  <div class="body">
                      <form action="{{ url('admin/profile/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                          <label for="name">Name</label>
                          <div class="form-group">
                              <input type="text" name="name" value="{{ $data->name }}" id="name" class="form-control">
                              @error ('name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <label for="email">Email</label>
                          <div class="form-group">
                              <input type="text" readonly name="email" value="{{ $data->email }}" id="email" class="form-control">
                              @error ('email')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <label for="phone">Phone</label>
                          <div class="form-group">
                              <input type="text" name="phone" value="{{ $data->phone }}" id="phone" class="form-control">
                          </div>

                          <label for="picture">Profile Picture</label>
                          <div class="form-group">
                              <input type="file" name="picture" id="picture" class="form-control dropify" placeholder="Enter a Cantegory Picture">
                              @error ('picture')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Update</button>
                      </form>
                  </div>
              </div>
            </div>

          </div>
      </div>
  </section>

@endsection
