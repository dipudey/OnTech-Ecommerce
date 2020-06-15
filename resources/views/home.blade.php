@extends('layouts.frontend_master')
@section('title')
    Profile
@endsection
@section('frontend_content')

<div class="container my-5">
    <div class="card">

        <div class="row">
          <div class="col-9">
            <div class="card" style="border:0px !important">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card bg-info text-light" style="height: 120px">
                      <div class="card-header tex-center">
                        <div class="card-title">
                          <h4>Total Order</h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <h6>{{ $total_order }}</h6>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card bg-success text-light" style="height: 120px">
                      <div class="card-header tex-center">
                        <div class="card-title">
                          <h4>Total wishlist</h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <h6>{{ $total_wishlist }}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card" style="">
              <div class="card-body" >
                <div class="row">

                  <div class="col-5 m-auto">
                    @if (Auth::user()->picture == "")
                      <img class="img-fluid" src="{{ asset('uploads/users/default.jpg') }}" alt="Default Picture" style="height:100px;border-radius:60%">
                    @else
                      <img class="img-fluid" src="{{ asset('uploads/users') }}/{{ Auth::user()->picture }}" alt="Default Picture" style="height:100px;border-radius:60%">
                    @endif
                    <h4 class="mt-2">{{ Auth::user()->name }}</h4>
                  </div>
                </div>
              </div>

                  <div class="m-auto">
                    @if (!Auth::user()->provider)
                      <a href="{{ url('user/change/password') }}" class="p-2">Change Password</a><br><br>
                    @endif
                    <a href="{{ url('user/profile/edit') }}" class="p-2">Edit Profile</a><br><br>
                    {{-- <a href="#" class="p-2">Return Order</a><br><br> --}}
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
