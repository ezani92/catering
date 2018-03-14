<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/img/logo-fav.png">
        <title>Teaffani Catering | Register</title>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css"/>
    </head>
    <body class="be-splash-screen">
        <div class="be-wrapper be-login">
            <div class="be-content">
                <br /><br /><br />
                <div class="main-content container-fluid">
                    <div class="splash-container">
                        <div class="panel panel-default panel-border-color panel-border-color-default">
                            <div class="panel-heading"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}"></a><span class="splash-description">Please enter your user information.</span></div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name / Company Name">
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" required  placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password">
                                    </div>
                                    
                                    <div class="form-group login-submit">
                                        <button data-dismiss="modal" type="submit" class="btn btn-info btn-xl">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="splash-footer"><span>Already have an account? <a href="/login">Login Here</a></span></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ url('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('assets/js/main.js" type="text/javascript') }}"></script>
        <script src="{{ url('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //initialize the javascript
                App.init();
            });
            
        </script>
    </body>
</html>