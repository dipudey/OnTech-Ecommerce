@extends('layouts.dashboard_master')
@section('title')
  Contact List
@endsection
@section('contact')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Contact List</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/contact/list') }}">Contact List</a></li>
                      <li class="breadcrumb-item active">View</li>
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
            <div class="col-lg-8 m-auto">

                <div class="card">
                  <div class="header">
                      <h2><strong>Shipping</strong> Address </h2>
                  </div>
                  <div class="card-body">

                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Name
                          <span class="">{{ $contact->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          E-mail
                          <span class="">{{ $contact->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Phone
                          <span class="">{{ $contact->phone }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Status
                          @if ($contact->status == 0)
                            <span class="badge badge-warning badge-pill">Unseen</span>
                          @else
                            <span class="badge badge-success badge-pill">seen</span>
                          @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Message
                          <span class="">{{ $contact->message }}</span>
                        </li>
                      </ul>

                      <a href="{{ url('admin/contact/seen/'.$contact->id) }}" class="btn btn-info btn-block mt-3">Seen</a>
                  </div>
                </div>


            </div>
        </div>
      </div>
  </section>

@endsection
@section('script')

@endsection
