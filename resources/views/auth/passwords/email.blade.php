<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
 <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/bootstrap.min.css')}}">
             <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
              <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/responsive.css')}}">
</head>
<body>
  <section class="login_page">
    <div class="container">
        <div class="login_inner">
   
            <div class="col-xs-12 col-sm-5 login_right padding_0">

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                          <div class="log_heading">Reset Password</div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><img src="{{url('/')}}/public/assets/images/email_login.png"></span>  
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Login Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </section>
</body>
</html>
