@extends('layouts.dashboard_master')
@section('title')
  Site Setting
@endsection
@section('other_setting')
  active
@endsection

@section('content')


    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Site Setting</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active">Site Setting</li>
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
                <div class="col-8 m-auto">
                  <div class="card mt-5">
                      <div class="header">
                          <h2><strong>Site</strong> Setting</h2>
                      </div>
                      <div class="body">
                          <form action="{{ url('admin/site/setting/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                              <label for="vat">Vat</label>
                              <div class="form-group">
                                  <input type="text" name="vat" value="{{ $setting->vat }}" id="vat" class="form-control" >
                                  @error ('vat')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="shipping_charge">Shipping Charge</label>
                              <div class="form-group">
                                  <input type="text" name="shipping_charge" value="{{ $setting->shipping_charge }}" id="shipping_charge" class="form-control"
                                  @error ('shipping_charge')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="shopname">Shop Name</label>
                              <div class="form-group">
                                  <input type="text" name="shopname" value="{{ $setting->shopname }}" id="shopname" class="form-control">
                                  @error ('shopname')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="email">Email</label>
                              <div class="form-group">
                                  <input type="text" name="email" value="{{ $setting->email }}" id="email" class="form-control">
                                  @error ('email')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="phone">Phone</label>
                              <div class="form-group">
                                  <input type="text" name="phone" value="{{ $setting->phone }}" id="phone" class="form-control">
                                  @error ('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="address">Address</label>
                              <div class="form-group">
                                  <input type="text" name="address" value="{{ $setting->address }}" id="address" class="form-control">
                                  @error ('address')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>

                              <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect btn-block">Update</button>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </section>


@endsection
