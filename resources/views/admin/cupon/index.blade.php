@extends('layouts.dashboard_master')
@section('title')
  Cupon
@endsection
@section('cupon')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Cupon</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">Cupon</li>
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
              <div class="float-right mt-4">
                <a href="{{ url('admin/cupon/add') }}" class="btn btn-success">Add Cupon</a>
              </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Cupon</strong> List </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>SL No</th>
                                      <th>Cupon</th>
                                      <th>Discount Ammount</th>
                                      <th>Validity Till</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>SL No</th>
                                      <th>Cupon</th>
                                      <th>Discount Ammount</th>
                                      <th>Validity Till</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach($cupons as $cupon)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $cupon->cupon }}</td>
                                        <td>{{ $cupon->discount }}</td>
                                        <td>
                                          @if($cupon->validity_till > Carbon\Carbon::now())
                                            <span class="badge badge-success">active</span>
                                          @else
                                            <span class="badge badge-danger">deactive</span>
                                          @endif
                                        </td>
                                        <td>
                                          <div class="btn-group">
                                            <a href="{{ url('admin/cupon/edit') }}/{{ $cupon->id }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/cupon/delete') }}/{{ $cupon->id }}" class="btn btn-danger" id="delete">Delete</a>
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
