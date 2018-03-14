<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/img/logo-fav.png">
        <title>Teaffani Catering | Login</title>
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
                            <div class="panel-heading"><img src="{{ asset('assets/img/logo.png') }}"><span class="splash-description">Reset Password</span></div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    {{ csrf_field() }}

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required autofocus autocomplete="off">
                                    </div>
                                    
                                    <div class="form-group login-submit">
                                        <button data-dismiss="modal" type="submit" class="btn btn-info btn-xl">Send Password Reset Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="splash-footer"><span>Don't have an account? <a href="/register">Register</a></span></div>
                        <div class="splash-footer"><span>Back To Login? <a href="/login">Login</a></span></div>
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