<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>TheJobs - Login</title>

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


 {{--@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> @lang('global.app_there_were_problems_with_input'):
    <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif--}}        
          
          
          
          
          
          <form method="POST"
            action="{{ url('login') }}">
              
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}">            
            
            
            
            

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
                <input type="email"
                       class="form-control"
                       name="email"
                       value="{{ old('email') }}">
            </div>
          </div>
            
            
            
            
            
            
            
            
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
                <input type="password"
                       class="form-control"
                       name="password">
            </div>
          </div>
              
              
              
              

          <button class="btn btn-primary btn-block" type="submit">Login</button>

          <div class="login-footer">
            <h6>Or login with</h6>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>

        </form>
      </div>

      <div class="login-links">
        <a class="pull-left" href="{{ route('auth.password.reset') }}">Forget Password?</a>
        <a class="pull-right" href="{{ route('auth.register') }}">Register an account</a>
      </div>

    </main>


    <!-- Scripts -->
    <script src="/js/app.min.js"></script>
    <script src="/js/custom.js"></script>

  </body>
</html>
