@extends('layouts.frontend_master')
@section('title')
  Login
@endsection
@section('frontend_content')

  <div class="my-5" id="login_page">
    <div class="container">
      <div class="row">
        <div class="col-5 ml-5 mr-3" style="border: 1px solid grey">
          <h3 class="text-center my-4">Login</h3>

          <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group">
                  <label for="email" class="form-label text-md-right">E-Mail Address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="password" class="form-label text-md-right">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-success">
                      Login
                  </button>

                  @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  @endif
              </div>
          </form>

          <div class="mt-5">
            <a href="" class="btn btn-info btn-block mt-4">Login With Facebook</a>
            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block mt-2">Login With Google</a>
          </div>
        </div>

        <div class="col-5 ml-5" style="border: 1px solid grey">
          <h3 class="text-center my-4">Registration</h3>
            <form method="POST" action="{{ route('register') }}" class="px-3">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label text-md-right">E-Mail Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label text-md-right">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label text-md-right">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
