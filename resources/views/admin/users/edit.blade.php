@extends('layouts.dashboard_master')
@section('title')
  user
@endsection
@section('user')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>User</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">User</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Edit User</strong></h2>
                    </div>
                    <div class="body">

                          <form action="{!! route('user.update') !!}" method="post">
                            @csrf
                            <div class="row clearfix">
                              <input type="hidden" name="id" value="{{ $user->id }}">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="name" required>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email" class="form-label">E-mail</label>
                                  <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="email" required>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="phone" class="form-label">Phone</label>
                                  <input type="text" name="phone" value="{{ $user->phone??'' }}" class="form-control" id="phone">
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="category" name="category" value="1" type="checkbox" {{ $user->category==1?'checked':'' }}>
                                    <label for="category">
                                            Category
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input type="checkbox" id="brand" name="brand" value="2" {{ $user->brand==1?'checked':'' }}>
                                    <label for="brand">
                                            Brand
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="cupon" {{ $user->cupon==1?'checked':'' }} name="cupon" value="1" type="checkbox">
                                    <label for="cupon">
                                            Cupon
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="product" name="product" value="1" type="checkbox" {{ $user->product==1?'checked':'' }}>
                                    <label for="product">
                                            product
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="blog" name="blog" value="1" {{ $user->blog==1?'checked':'' }} type="checkbox">
                                    <label for="blog">
                                            blog
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="order" name="order" {{ $user->order==1?'checked':'' }} value="1" type="checkbox">
                                    <label for="order">
                                            Order
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="stock" name="stock" value="1" {{ $user->stock==1?'checked':'' }} type="checkbox">
                                    <label for="stock">
                                            Stock
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input type="checkbox" id="report" name="report" {{ $user->report==1?'checked':'' }} value="1">
                                    <label for="report">
                                            Report
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="user" name="user" value="1" {{ $user->user==1?'checked':'' }} type="checkbox">
                                    <label for="user">
                                            user
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="contact" name="contact" value="1" {{ $user->contact==1?'checked':'' }} type="checkbox">
                                    <label for="contact">
                                            Contact
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="subscriber" name="subscriber" value="1" {{ $user->subscriber==1?'checked':'' }} type="checkbox">
                                    <label for="subscriber">
                                            Subscriber
                                    </label>
                                </div>
                              </div>

                              <div class="col-lg-4 col-md-4 mt-2">
                                <div class="checkbox">
                                    <input id="others" name="others" value="1" {{ $user->others==1?'checked':'' }} type="checkbox">
                                    <label for="others">
                                            Others
                                    </label>
                                </div>
                              </div>
                              <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                              </div>
                            </div>
                          </form>

                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>

@endsection
