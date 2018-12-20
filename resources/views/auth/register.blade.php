@extends('layouts.main')


@section('content')
        <section class="login_page registor_page">
    <div class="container">
        <div class="login_inner">
            <div class="col-xs-12 col-sm-7 login_left padding_0">
              <div class="login_left_inner">
              <div class="login_left_new">
                <div class="login_heading">Already have an <b>Account</b></div>
                <span>Login Here</span>
                <div class="down_img"><img src="{{url('/')}}/public/assets/images/login_arrow.png"></div>
                <a href="{{ route('login')}}" class="btn_new">Login</a>
                
                </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-5 login_right padding_0">
                
                
        <form class="form-horizontal"  method="POST" action="{{ route('register') }}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="log_heading">Register</div>                     
                             
        <div class="form-group input-group width_half">                         
        <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/user_icon.png"></span>                         
        <input id="first_name" placeholder="First Name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus="">   
           @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif                        
                                
        </div>                                              
        <div class="form-group input-group width_half">                         
        <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/user_icon.png"></span>                         
        <input id="last_name" placeholder="Last Name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"  autofocus="">                                
                  @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif               
         </div>                                             
         <div class="form-group input-group padd">                          
         <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/email1.png"></span>                           
         <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" >         
         @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif                        
                                                            
         </div>                        
         <div class="form-group input-group width_half">                        
         <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/lock1.png"></span>                            
         <input id="password" placeholder="Password" type="password" class="form-control" name="password" >      
         @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif                          
                                
         </div>                                              
         <div class="form-group input-group width_half">                        
         <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/lock1.png"></span>                            
         <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" >                        
         </div>                                               
         <div class="form-group text-center">                           
         <button type="submit">Register</button>
         </div>
         </form>


        </div>
        </div>
    </div>
</section>
@endsection
