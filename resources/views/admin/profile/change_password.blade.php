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
                      <h2><strong>Password</strong> Change</h2>
                  </div>
                  <div class="body">
                      <form action="{{ url('admin/password/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                          <label for="old_password">Old Password</label>
                          <div class="form-group">
                              <input type="password" name="old_password" id="old_password" class="form-control">
                              @error ('old_password')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                              @if (Session::get('error_message'))
                                <span class="text-danger">{{ Session::get('error_message') }}</span>
                              @endif
                          </div>
                          <label for="password">New Password</label>
                          <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter New password">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <label for="confirm_password">Confirm Password</label>
                          <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                            @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>


                          <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Change</button>
                      </form>
                  </div>
              </div>
            </div>

          </div>
      </div>
  </section>

@endsection
