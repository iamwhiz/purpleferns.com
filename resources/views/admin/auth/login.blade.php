@extends('admin.layouts.login-app')

@section('title', 'Admin Login')


@section('content')

			<form class="form-horizontal" method="POST" action="{{ route('admin.auth.loginAdmin') }}">
			{{ csrf_field() }}
			<div class="logo"><a href="http://www.purpleferns.com"><img src="http://www.purpleferns.com/public/assets/images/logo.png"></a></div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="label">Email</label>
                  <div class="input-group">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
                    </div>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
					<input id="password" type="password" class="form-control" name="password" required>

                                
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in
                    </label>
                  </div>
                  <!-- <a href="{{ route('password.request') }}" class="text-small forgot-password text-black">Forgot Password</a> -->
                </div>
                <!--div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                </div-->
              </form>

<style>
.logo {width: 100%; float: left; text-align: center; margin-bottom: 20px; margin-top: -20px;}
.logo  img {width:170px;}
.auth  .submit-btn {background:#00B050; border-color:#00B050;}
</style>











@endsection