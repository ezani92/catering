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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/>
        <link href="https://use.fontawesome.com/releases/v5.0.3/css/all.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css"/>
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
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name">Welcome Guest</span></a>
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
                        <div class="col-md-3 col-xs-12 affix affix-top">
                            <div id="accordion1" class="panel-group accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"><i style="color: #7f8c8d;" class="fas fa-utensils"></i>&nbsp;&nbsp;Your Selection </a></h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed vestibulum quam. Pellentesque non feugiat neque, non volutpat orci. Integer ligula lacus, ornare eget lobortis ut, molestie quis risus. </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo"><i style="color: #7f8c8d;" class="fas fa-users"></i>&nbsp;&nbsp;Number Of Pax </a></h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div style="padding-left: 16px; padding-right: 16px;">
                                            (Minimum 60 Pax) | 8 courses
                                            <br /><br />
                                            <input type="number" class="form-control" value="40" style="font-size:24px;">
                                            <br />
                                            NUMBER OF PAX SELECTED<br />
                                            <span style="font-size:24px; color: #7f8c8d;">40</span>
                                            <br />
                                            PRICE<br />
                                            <span style="font-size:24px; color: #7f8c8d;">RM 2300.90</span>
                                            <br />
                                            PRICE W/ GST<br />
                                            <span style="font-size:24px; color: #7f8c8d;">RM 2438.95</span>
                                            <br />
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>
                                                Rice / Noodles
                                            </h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check1" type="checkbox" checked="">
                                                    <label class="radio-label" for="check1">Yang Chow Fried Rice</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check2" type="checkbox">
                                                    <label class="radio-label" for="check2">Thai Pineapple Fried Rice</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check3" type="checkbox">
                                                    <label class="radio-label" for="check3">Sin Chow Mee Hoon</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check4" type="checkbox">
                                                    <label class="radio-label" for="check4">Vegetarian Mee Hoon</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check5" type="checkbox">
                                                    <label class="radio-label" for="check5">Mee Hoon Goreng</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>Vegetables / Beancurd</h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check6" type="checkbox" checked="">
                                                    <label class="radio-label" for="check6">Mixed Cabbage w Wolfberries</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check7" type="checkbox">
                                                    <label class="radio-label" for="check7">Loh Han Vegetable</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check8" type="checkbox">
                                                    <label class="radio-label" for="check8">Hong Kong Kai Lan</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check9" type="checkbox">
                                                    <label class="radio-label" for="check9">Beancurd w Crab Stick</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check10" type="checkbox">
                                                    <label class="radio-label" for="check10">Sambal Long Bean</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>Fish (White Dory)</h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check11" type="checkbox" checked="">
                                                    <label class="radio-label" for="check11">Sambal Fish</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check12" type="checkbox">
                                                    <label class="radio-label" for="check12">Cereal Fish</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check13" type="checkbox">
                                                    <label class="radio-label" for="check13">Sze Chuan Fish</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check14" type="checkbox">
                                                    <label class="radio-label" for="check14">Sweet & Sour Fish</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check15" type="checkbox">
                                                    <label class="radio-label" for="check15">Breaded Fish Fillet w Tartar</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>Chicken</h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check16" type="checkbox" checked="">
                                                    <label class="radio-label" for="check16">Honey Chicken</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check17" type="checkbox">
                                                    <label class="radio-label" for="check17">Sweet & Sour Chicken</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check18" type="checkbox">
                                                    <label class="radio-label" for="check18">Lemon Chicken Cutlet</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check19" type="checkbox">
                                                    <label class="radio-label" for="check19">Signature Curry Chicken (+ RM2.50)</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check20" type="checkbox">
                                                    <label class="radio-label" for="check20">Salt & Pepper Chicken</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>Dessert</h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check1" type="checkbox" checked="">
                                                    <label class="radio-label" for="check1">Chin Chow w Longan</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check2" type="checkbox">
                                                    <label class="radio-label" for="check2">Sea Coconut w Cocktail</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check3" type="checkbox">
                                                    <label class="radio-label" for="check3">Mini Custard Puff</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check4" type="checkbox">
                                                    <label class="radio-label" for="check4">Mini Chocolate Éclair (+ $0.30)</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check5" type="checkbox">
                                                    <label class="radio-label" for="check5">Honeydew Sago (+ $0.60)</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-default panel-package">
                                        <div class="panel-body">
                                            <h3>Drinks</h3>
                                            <hr />
                                            <div class="form-group">
                                                <div class="be-checkbox">
                                                    <input id="check1" type="checkbox" checked="">
                                                    <label class="radio-label" for="check1">Lychee</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check2" type="checkbox">
                                                    <label class="radio-label" for="check2">Orange</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check3" type="checkbox">
                                                    <label class="radio-label" for="check3">Drinks-mango</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check4" type="checkbox">
                                                    <label class="radio-label" for="check4">Fruit Punch</label>
                                                </div>
                                                <div class="be-checkbox">
                                                    <input id="check5" type="checkbox">
                                                    <label class="radio-label" for="check5">Blackcurrant</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary">NEXT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <script src="https://cdn.rawgit.com/garand/sticky/73b0fbe3/jquery.sticky.js" type="text/javascript"></script>
        <script src="{{ asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/lib/prettify/prettify.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //initialize the javascript
                App.init();
                
                //Runs prettify
                prettyPrint();

                 $("#sticker").sticky({topSpacing:0});

            });
        </script>
    </body>
</html>