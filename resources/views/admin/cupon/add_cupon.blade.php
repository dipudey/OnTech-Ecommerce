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
                      <li class="breadcrumb-item"><a href="{{ url('admin/cupon') }}">Cupon</a></li>
                      <li class="breadcrumb-item active">Add Cupon</li>
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
                        <h2><strong>Cupon</strong> Add</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/cupon/add/post') }}" method="post">
                          @csrf
                            <label for="cupon">Cupon</label>
                            <div class="form-group">
                                <input type="text" name="cupon" id="cupon" class="form-control" placeholder="Enter Cantegory Name">
                                @error ('cupon')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="discount">Deiscount Ammount(%)</label>
                            <div class="form-group">
                                <input type="text" name="discount" id="discount" class="form-control" placeholder="Enter Discount Ammount (%)">
                                @error ('discount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label for="validity_till">Validity Till</label>
                            <div class="form-group">
                                <input type="date" name="validity_till" id="validity_till" class="form-control" placeholder="Enter Cupon Validity">
                                @error ('validity_till')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-success btn-round waves-effect">Add Cupon</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
