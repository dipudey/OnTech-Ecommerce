@extends('layouts.frontend_master')
@section('title')
    Profile
@endsection
@section('frontend_content')

<div class="container my-5">
    <div class="card">

        <div class="row">
          <div class="col-8">
            <div class="card" style="border:0px !important">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td>Picture</td>
                      <td>Product Name</td>
                      <td>Product Code</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                      <tr>
                        <td>
                          <img src="{{ asset('uploads/products/'.$item->product->thambnail_picture) }}" alt="thambnail_picture" height="100" width="60%">
                        </td>
                        <td>
                          <a href="{{ url('product/details/'.$item->product_id) }}">{{ $item->product->product_name }}</a>
                        </td>
                        <td>{{ $item->product->product_code }}</td>
                        <td>
                          <a href="{{ url('wishlist/remove/'.$item->id) }}" class="btn btn-danger btn-sm">remove</a>
                        </td>
                      </tr>
                      @empty
                        <tr>
                          <td  colspan="40" class="text-danger text-center">No Product Available show Wishlist</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="card" style="">
              <div class="card-body" >
                <div class="row">

                  <div class="col-5 m-auto">
                    @if (Auth::user()->picture == '')
                      <img class="img-fluid" src="{{ asset('uploads/users/default.jpg') }}" alt="Default Picture" style="height:100px;border-radius:60%">
                    @else
                      <img class="img-fluid" src="{{ asset('uploads/users') }}/{{ Auth::user()->picture }}" alt="Default Picture" style="height:100px;border-radius:60%">
                    @endif
                    <h4 class="ml-2 mt-2">{{ Auth::user()->name }}</h4>
                  </div>
                </div>
              </div>

              <div class="m-auto">
                @if (!Auth::user()->provider)
                  <a href="{{ url('user/change/password') }}" class="p-2">Change Password</a><br><br>
                @endif
                <a href="{{ url('user/profile/edit') }}" class="p-2">Edit Profile</a><br><br>
                <a href="#" class="p-2">Return Order</a><br><br>
                <a href="{{ url('wishlist') }}" class="p-2">wishlist</a><br><br>
                <a href="{{ route('logout') }}" class="p-2" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a><br><br>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>


              </div>
            </div>
          </div>

        </div>

      </div>
</div>


@endsection
