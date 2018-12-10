<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Online Ordering System</title>
        <link href="https://fonts.googleapis.com/css?family=Cabin:100,200,300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/istvan-ujjmeszaros/bootstrap-touchspin/b87fa994/dist/jquery.bootstrap-touchspin.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.3/css/all.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}" type="text/css"/>
        <script src="{{ secure_asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFQno041-N6A1euP54uudO5hfqe1tmJlA&libraries=places"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/Logicify/jquery-locationpicker-plugin/fac86581/src/locationpicker.jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/ericjgagnon/wickedpicker/2a8950a7/dist/wickedpicker.min.css">
        <style type="text/css">
            
        </style>
    </head>
    <body ">
        <div class="be-wrapper be-nosidebar-left">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('/') }}" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            {{-- <a href="http://teaffani.naxpansion.com"><div class="page-title"><span class="btn btn-default">Home</span></div></a> --}}
                            @if(Auth::guest())
                                <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ secure_asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name">Guest</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">Guest</div>
                                            <div class="user-position online">Available</div>
                                        </div>
                                    </li>
                                    <li><a href="{{ url('login') }}"><span class="icon mdi mdi-power"></span> Login</a></li>
                                    <li><a href="{{ url('register') }}"><span class="icon mdi mdi-power"></span> Register</a></li>
                                </ul>
                            </li>
                            @else
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ secure_asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <li>
                                            <div class="user-info">
                                                <div class="user-name">{{ Auth::user()->name }}</div>
                                                <div class="user-position online">Available</div>
                                            </div>
                                        </li>
                                        <li><a href="{{ url('order/history') }}"><span class="icon mdi mdi-shopping-basket"></span> Order History</a></li>
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
                            @endif
                        </ul>
                        
                    </div>
                </div>
            </nav>