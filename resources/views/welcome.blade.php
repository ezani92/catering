<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Teaffani Online Ordering System</title>
        <link href="https://fonts.googleapis.com/css?family=Cabin:100,200,300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    </head>
    <body ">
        <div class="be-wrapper be-nosidebar-left">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('/') }}" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar.png" alt="Avatar"><span class="user-name">Welcome Guest</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">Guest</div>
                                        </div>
                                    </li>
                                    <li><a href="#"><span class="icon mdi mdi-face"></span> Register</a></li>
                                    <li><a href="#"><span class="icon mdi mdi-power"></span> Login</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <span class="icon mdi mdi-power"></span> Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            <div class="be-content">
                <div class="main-content container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Design Your Menu</h1>
                            <p style="font-size: 18px; line-height: 25px; font-weight: 200; color: #a0a0a0">
                                Because every event and taste preferences are unique, plan your own buffet spread from our wide range of local favourites and international craves. There’s definitely no shortage of options here!
                            </p>
                            <br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default panel-package">
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/black-layer.png') }}), url({{ asset('assets/img/stock/food1.jpg') }}); margin: 0 0px;">    <span class="title">International Buffet (Fusion)</span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        start from
                                    </span>
                                    <br />
                                    <span style="font-size: 25px;">
                                        RM 30.00
                                    </span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        per pax
                                    </span>
                                    <br />
                                </div>
                                <div class="panel-body text-center">
                                    <p>Great for boisterous events of 30 guests and above. Buffet comes complete with food warmers, fully dressed table setups and full set of disposable cutleries and serviettes.
                                    </p>
                                    <a href="{{ url('package') }}" class="btn btn-default">Order Now</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default panel-package">
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/black-layer.png') }}), url({{ asset('assets/img/stock/food1.jpg') }}); margin: 0 0px;">    <span class="title">Noon Tea Break</span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        start from
                                    </span>
                                    <br />
                                    <span style="font-size: 25px;">
                                        RM 30.00
                                    </span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        per pax
                                    </span>
                                    <br />
                                </div>
                                <div class="panel-body text-center">
                                    <p>Great for boisterous events of 30 guests and above. Buffet comes complete with food warmers, fully dressed table setups and full set of disposable cutleries and serviettes.
                                    </p>
                                    <a href="{{ url('package') }}" class="btn btn-default">Order Now</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default panel-package">
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/black-layer.png') }}), url({{ asset('assets/img/stock/food1.jpg') }}); margin: 0 0px;">    <span class="title">Breakfast</span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        start from
                                    </span>
                                    <br />
                                    <span style="font-size: 25px;">
                                        RM 30.00
                                    </span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        per pax
                                    </span>
                                    <br />
                                </div>
                                <div class="panel-body text-center">
                                    <p>Great for boisterous events of 30 guests and above. Buffet comes complete with food warmers, fully dressed table setups and full set of disposable cutleries and serviettes.
                                    </p>
                                    <a href="{{ url('package') }}" class="btn btn-default">Order Now</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default panel-package">
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/black-layer.png') }}), url({{ asset('assets/img/stock/food1.jpg') }}); margin: 0 0px;">    <span class="title">Canape</span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        start from
                                    </span>
                                    <br />
                                    <span style="font-size: 25px;">
                                        RM 30.00
                                    </span>
                                    <br>
                                    <span style="font-size: 10px; color: grey;">
                                        per pax
                                    </span>
                                    <br />
                                </div>
                                <div class="panel-body text-center">
                                    <p>Great for boisterous events of 30 guests and above. Buffet comes complete with food warmers, fully dressed table setups and full set of disposable cutleries and serviettes.
                                    </p>
                                    <a href="{{ url('package') }}" class="btn btn-default">Order Now</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
        <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/lib/prettify/prettify.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //initialize the javascript
                App.init();
                
                //Runs prettify
                prettyPrint();
            });
        </script>
    </body>
</html>