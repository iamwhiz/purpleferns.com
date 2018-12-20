@extends('layouts.main')


@section('content')
        <section class="login_page">
    <div class="container">
        <div class="login_inner">
            <div class="col-xs-12 col-sm-7 login_left padding_0">
          <div class="login_outer">
              <div class="login_left_inner">
                <div class="login_heading">Don’t have an <b>Account</b></div>
                <span>Register Here</span>
                <div class="down_img"><img src="{{url('/')}}/public/assets/images/login_arrow.png"></div>
                <a href="{{ route('register')}}" class="btn_new">Register Now</a>
                <div class="or"><i>OR</i></div>
                <div class="social_media">
                    <i>Login With <b>Social media </b></i>
                    <ul>
                      <li><a href="{{ url('facebook/facebook') }}"><img src="{{url('/')}}/public/assets/images/fb_login.png"></a></li>
                      <li><a href="{{ url('/twitter') }}"><img src="{{url('/')}}/public/assets/images/twitter_login.png"></a></li>
                      <li><a href="{{ url('google/google') }}"><img src="{{url('/')}}/public/assets/images/google_login.png"></a></li>
                    </ul>
                </div>
                </div>
            </div>

            </div>
            <div class="col-xs-12 col-sm-5 login_right padding_0">
                
                <form method="POST" action="{{ route('login') }}">
                     {{ csrf_field() }}

                        <input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect_url'])){ echo $_GET['redirect_url']; } ?>">
                    <div class="log_heading">Login</div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/email_login.png"></span>  
                        <input id="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" autofocus="" type="email">
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif              
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/lock_login.png"></span>                            
                        <input id="password" placeholder="Password" class="form-control" name="password" type="password">
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>  

                    <div class="form-group remember_me">
                        <div class="checkbox">                                    
                            <label>                                        
                            <input class="wh_check" name="remember"  type="checkbox" {{ old('remember') ? 'checked' : '' }}>  <span class="checkmark"></span>Remember Me                                    
                            </label>                                
                        </div>  
                    </div>
                      
                    <div class="form-group text-center">                            
                    <button type="submit">Sign in</button>
                    </div>  

                    <div class="col-sm-12 col-xs-12 padding_0 forget_pass">                              
                        <a class="forget_btn " href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>  


                </form>
            </div>
        </div>
    </div>
</section>
@endsection
