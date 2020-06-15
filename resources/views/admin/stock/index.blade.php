@extends('layouts.dashboard_master')
@section('title')
  Product Stock
@endsection
@section('stock')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Product Stock</h2>
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
                                        <a data-id="{{ $product->id }}" id="edit-id" class="btn btn-success text-light">Edit</a>
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

  <div class="modal fade" id="stock-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="title" id="defaultModalLabel">Update Product Quantity</h4>
              </div>
              <div class="modal-body">
                <form id="update-stock" action="{{ url('admin/stock/update') }}" method="post">
                  @csrf
                  <input id="product-id" type="hidden" name="id" value="">
                  <div class="form-group">
                    <label for="" class="form-label">Product Quantity</label>
                    <input type="text" id="quantity" name="product_quantity" value="" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-round waves-effect" onclick="event.preventDefault();
                            document.getElementById('update-stock').submit();">Update</button>
                  <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    $("body").on('click',"#edit-id",function () {
      $("#stock-modal").modal('show')
      var id = $(this).data('id')
      $.ajax({
        url: "/admin/stock/edit/"+id,
        method: "get",
        dataType: "json",
        success: function (data){
          $("#product-id").val(data.quantity.id)
          $("#quantity").val(data.quantity.product_quantity)
        }
      })
    })
  </script>
@endsection
