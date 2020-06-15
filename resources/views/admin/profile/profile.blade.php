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

            <div class="col-lg-10 col-md-10 m-auto">
                <div class="card mcard_3">
                    <div class="body">
                        <a href="">
                          @if ($data->picture == "")
                            <img src="{{ asset('uploads/admin') }}/default.jpg" height="180" width="180" class="rounded-circle shadow " alt="profile-image">
                          @else
                            <img src="{{ asset('uploads/admin') }}/{{ $data->picture }}" height="180" width="180" class="rounded-circle shadow " alt="profile-image">
                          @endif
                        </a>
                        <h4 class="m-t-10">{{ $data->name }}</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    @if ($data->category)
                                      <li><span class="badge badge-success">category</span></li>
                                    @endif
                                    @if ($data->brand)
                                      <li><span class="badge badge-warning">Brand</span></li>
                                    @endif
                                    @if ($data->cupon)
                                      <li><span class="badge badge-info">Cupon</span></li>
                                    @endif
                                    @if ($data->product)
                                      <li><span class="badge badge-danger">Product</span></li>
                                    @endif
                                    @if ($data->blog)
                                      <li><span class="badge bg-teal">blog</span></li>
                                    @endif
                                    @if ($data->order)
                                      <li><span class="badge bg-pink">order</span></li>
                                    @endif
                                    @if ($data->stock)
                                      <li><span class="badge bg-amber">stock</span></li>
                                    @endif
                                    @if ($data->report)
                                      <li><span class="badge bg-brown">report</span></li>
                                    @endif
                                    @if ($data->user)
                                      <li><span class="badge bg-grey">user</span></li>
                                    @endif
                                    @if ($data->contact)
                                      <li><span class="badge bg-orange">contact</span></li>
                                    @endif
                                    @if ($data->subscriber)
                                      <li><span class="badge bg-deep-orange">subscriber</span></li>
                                    @endif
                                    @if ($data->others)
                                      <li><span class="badge bg-lime">others</span></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="col-8 m-auto">
                              <ul class="list-group mt-3">

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Name:
                                  <span class="text-primary">{{ $data->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Email:
                                  <span class="text-primary">{{ $data->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  Phone:
                                  <span class="text-primary">{{ $data->phone??"" }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  <a href="{{ url('admin/profile/edit') }}" class="btn btn-raised btn-primary btn-round waves-effect btn-block">Update Profile</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  <a href="{{ url('admin/change/password') }}" class="btn btn-raised btn-info btn-round waves-effect btn-block">Change Password</a>
                                </li>

                              </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

          </div>
      </div>
  </section>

@endsection
