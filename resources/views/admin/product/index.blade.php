@extends('layouts.dashboard_master')
@section('title')
  Product
@endsection
@section('product')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Product</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">Product</li>
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
                <a href="{{ url('admin/product/add') }}" class="btn btn-success">Add Product</a>
              </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Product</strong> List </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Product Code</th>
                                      <th>Product Name</th>
                                      <th>Product picture</th>
                                      <th>Product Category</th>
                                      <th>Product Quantity</th>
                                      <th>Selling Price</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>Product Code</th>
                                      <th>Product Name</th>
                                      <th>Product picture</th>
                                      <th>Product Category</th>
                                      <th>Product Quantity</th>
                                      <th>Selling Price</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($products as $product)
                                    <tr>
                                      <td>{{ $product->product_code }}</td>
                                      <td>{{ $product->product_name }}</td>
                                      <td>
                                        <img src="{{ asset('uploads/products') }}/{{ $product->thambnail_picture }}" alt="Thumbnail Picture" height="80">
                                      </td>
                                      <td>{{ $product->category->category_name }}</td>
                                      <td>{{ $product->product_quantity }}</td>
                                      <td>{{ $product->selling_price }}</td>
                                      <td>
                                        @if ($product->status==1)
                                          <span class="badge badge-success">active</span>
                                        @else
                                          <span class="badge badge-danger">deactive</span>
                                        @endif
                                      </td>
                                      <td>
                                        <div class="btn-group">
                                          <a href="{{ url('admin/product/view/'.$product->id) }}" title="view" class="btn btn-info p-3"><i class="zmdi zmdi-eye"></i></a>
                                          <a href="{{ url('admin/product/edit/'.$product->id) }}" title="edit" class="btn btn-success p-3"><i class="zmdi zmdi-edit"></i></a>
                                          <a href="{{ url('admin/product/delete/'.$product->id) }}" title="delete" id="delete" class="btn btn-danger p-3"><i class="zmdi zmdi-delete"></i></a>
                                          @if($product->status == 1)
                                            <a href="{{ url('admin/product/deactive/'.$product->id) }}" title="deactive" class="btn btn-warning p-3"><i class="zmdi zmdi-thumb-down"></i></a>
                                          @else
                                            <a href="{{ url('admin/product/active/'.$product->id) }}" title="active" class="btn btn-warning p-3"><i class="zmdi zmdi-thumb-up"></i></a>
                                          @endif
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
