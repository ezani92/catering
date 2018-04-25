<body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('admin') }}" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ secure_asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">{{ Auth::user()->name }}</div>
                                            <div class="user-position online">Available</div>
                                        </div>
                                    </li>
                                    <li><a href="{{ url('admin/account') }}/{{ Auth::user()->id }}/edit"><span class="icon mdi mdi-face"></span> Account</a></li>
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
                        <ul class="nav navbar-nav navbar-right be-icons-nav">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                                <ul class="dropdown-menu be-notifications">
                                    <li>
                                        <div class="title">Notifications<span class="badge">3</span></div>
                                        <div class="list">
                                            <div class="be-scroller">
                                                <div class="content">
                                                    <ul>
                                                        @foreach(Auth::user()->unreadNotifications as $notification)
                                                        <li class="notification notification-unread">
                                                            <a href="#">
                                                                <div class="image"><img src="{{ secure_asset('assets/img/avatar3.png') }}" alt="Avatar"></div>
                                                                <div class="notification-info">
                                                                    <div class="text">
                                                                        <span class="user-name">
                                                                        {{ \App\User::find($notification->data['user_id'])->name }}
                                                                        </span>
                                                                        Just created an account on Teaffani
                                                                    </div>
                                                                    <span class="date">{{ Carbon\Carbon::parse($notification->data['register_time']['date'])->diffForHumans() }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer"> <a href="{{ url('admin/notification') }}">View all notifications</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper">
                    <a href="#" class="left-sidebar-toggle">Menu</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <ul class="sidebar-elements">
                                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                    	<a href="{{ url('admin') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="parent">
                                        <a href="#"><i class="icon mdi mdi-accounts"></i><span>User Management</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                                            	<a href="{{ url('admin/user') }}">All User</a>
                                            </li>
                                        	{{-- <li class="{{ Request::is('admin/user/add') ? 'active' : '' }}">
                                            	<a href="{{ url('admin/user/add') }}">Create New User</a>
                                            </li> --}}
                                        </ul>
                                    </li>
                                    <li class="parent {{ Request::is('admin/order*') ? 'active' : '' }}">
                                        <a href="#"><i class="icon mdi mdi-shopping-cart"></i><span>Manage Order</span></a>
                                        <ul class="sub-menu">
                                        	{{-- <li>
                                            	<a href="{{ url('admin/order') }}">Create Order</a>
                                            </li> --}}
                                            <li>
                                            	<a href="{{ url('admin/order') }}">All Orders</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="parent">
                                        <a href="#"><i class="icon mdi mdi-grid"></i><span>Manage Package</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('admin/package/create') ? 'active' : '' }}">
                                                <a href="{{ url('admin/package/create') }}">Create New Package</a>
                                            </li>
                                            <li class="{{ Request::is('admin/package*') ? 'active' : '' }}">
                                                <a href="{{ url('admin/package') }}">All Package</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="parent">
                                        <a href="#"><i class="icon mdi mdi-cake"></i><span>Manage Items</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('admin/item*') ? 'active' : '' }}">
                                                <a href="{{ url('admin/item/create') }}">Add New Item</a>
                                            </li>
                                            <li class="{{ Request::is('admin/item*') ? 'active' : '' }}">
                                                <a href="{{ url('admin/item') }}">Item List</a>
                                            </li>
                                            <li class="{{ Request::is('admin/item-category*') ? 'active' : '' }}">
                                                <a href="{{ url('admin/item-category') }}">Item Category</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('admin/shipping') ? 'active' : '' }}">
                                        <a href="{{ url('admin/shipping') }}"><i class="icon mdi mdi-truck"></i><span>Manage Shipping</span></a>
                                    </li>
                                    {{-- <li>
                                    	<a href="{{ url('admin/settings') }}"><i class="icon mdi mdi-wrench"></i><span>Settings</span></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>