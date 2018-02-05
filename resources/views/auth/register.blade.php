<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>TheJobs - Register</title>

    <!-- Styles -->
    <link href="/css/app.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="/img/favicon.ico">
  </head>

  <body class="login-page">


    <main>

      <div class="login-block">
        <img src="assets/img/logo.png" alt="">
        <h1>Log into your account</h1>
          
          
          

        <form method="POST"
            action="{{ url('/register') }}">
            {{ csrf_field() }}
            
            

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-user"></i></span>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                
                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif                
            </div>
          </div>
            
            
          
          <hr class="hr-xs">
            
            

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                {{--@if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif--}}
            </div>
          </div>
            
            
          
          <hr class="hr-xs">
            
            

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input id="password" type="password" class="form-control" name="password" required>

                {{--@if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif--}}
            </div>
          </div>
            
            
            <hr class="hr-xs">
            
            
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>            
            
            

          <button class="btn btn-primary btn-block" type="submit">Sign up</button>
            
            

          <div class="login-footer">
            <h6>Or register with</h6>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>

        </form>
      </div>

      <div class="login-links">
        <p class="text-center">Already have an account? <a class="txt-brand" href="{{ route('auth.login') }}">Login</a></p>
      </div>

    </main>


    <!-- Scripts -->
    <script src="/js/app.min.js"></script>
    <script src="/js/custom.js"></script>

  </body>
</html>
