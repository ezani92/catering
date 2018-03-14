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
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            <div class="be-content">
                <div class="main-content container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <h1>International Buffet (Fusion)</h1>
                            <p style="font-size: 18px; line-height: 25px; font-weight: 200; color: #a0a0a0">
                                Because every event and taste preferences are unique, plan your own buffet spread from our wide range of local favourites and international craves. There’s definitely no shortage of options here!
                            </p>
                            <br />
                        </div>
                        <div class="col-md-3">
                            <br /><br /><br /><br />
                            <button class="btn btn-default">Download Menu In PDF</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default panel-package">
                                <span class="top-info">NOT AVAILABLE BETWEEN 15 FEB – 4 MAR 2018</span>
                                <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('assets/img/stock/food1.jpg') }}); background-size: cover; margin: 0 0px;">    <br /><br /><br /><br /><br /><br /><br />
                                </div>
                                <div class="panel-body text-center">
                                    <span style="font-size: 20px;">RM 30.90</span><sup> / pax</sup>
                                    <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                    <span style="font-size: 20px;">RM 32.75</span><sup> / GST</sup>
                                    <br />
                                    <span style="font-size: 15px;">8 Course | min 60 Pax</sup>
                                    <br />
                                    <span style="font-size: 15px;">Teaffani Value Package A</sup>
                                    <br /><br />
                                    <a href="{{ url('package/selection') }}" class="btn btn-default">Choose This Package</a>
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