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
                        <h2><strong>User</strong> List </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>User Name</th>
                                      <th>E-mail</th>
                                      <th>Permission</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Name</th>
                                      <th>E-mail</th>
                                      <th>Permission</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($users as $user)
                                    <tr>
                                      <td width="10%">{{ $user->name }}</td>
                                      <td width="15%">{{ $user->email }}</td>
                                      <td width="55%">
                                        @if ($user->category)
                                          <span class="badge badge-success">category</span>
                                        @endif
                                        @if ($user->brand)
                                          <span class="badge badge-warning">Brand</span>
                                        @endif
                                        @if ($user->cupon)
                                          <span class="badge badge-info">Cupon</span>
                                        @endif
                                        @if ($user->product)
                                          <span class="badge badge-danger">Product</span>
                                        @endif
                                        @if ($user->blog)
                                          <span class="badge bg-teal">blog</span>
                                        @endif
                                        @if ($user->order)
                                          <span class="badge bg-pink">order</span>
                                        @endif
                                        @if ($user->stock)
                                          <span class="badge bg-amber">stock</span>
                                        @endif
                                        @if ($user->report)
                                          <span class="badge bg-brown">report</span>
                                        @endif
                                        @if ($user->user)
                                          <span class="badge bg-grey">user</span>
                                        @endif
                                        @if ($user->contact)
                                          <span class="badge bg-orange">contact</span>
                                        @endif
                                        @if ($user->subscriber)
                                          <span class="badge bg-deep-orange">subscriber</span>
                                        @endif
                                        @if ($user->others)
                                          <span class="badge bg-lime">others</span>
                                        @endif
                                      </td>
                                      <td width="20%">
                                        <div class="btn-group">
                                          <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-info">Edit</a>
                                          <a href="{{ url('admin/user/delete/'.$user->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                        </div>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>

@endsection
