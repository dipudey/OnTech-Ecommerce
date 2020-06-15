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
              <div class="card-header" style="margin-right:-35px">
                <h4 class="text-center">Change Password</h4>
              </div>
              <div class="card-body">
                <div class="col-md-6 col-sm-12 m-auto">
                  <form class="mt-4" action="{{ route("change.password.post") }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="old">Old Password</label>
                        <input type="password" name="old_password" id="old_password" class="form-control">
                        @error ('old_password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (Session::get('error_message'))
                          <span class="text-danger">{{ Session::get('error_message') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="old">New Password</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter New password">
                        @error('password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="old">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                        @error('password_confirmation')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-outline-primary"> Change </button>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card" style="">
              <div class="card-body" >
                <div class="row">

                  <div class="col-5 m-auto">
                    @if (Auth::user()->picture == '')
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
