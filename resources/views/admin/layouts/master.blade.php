<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
        <title>@yield('title')</title>
        {{ Html::style('/bower/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('/bower/bootstrap-rating/bootstrap-rating.css') }}
        {{ Html::style('/bower/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('/bower/nprogress/nprogress.css') }}
        {{ Html::style('/bower/iCheck/skins/flat/green.css') }}
        {{ Html::style('/bower/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}
        {{ Html::style('/bower/jqvmap/dist/jqvmap.min.css') }}
        {{ Html::style('/bower/bootstrap-daterangepicker/daterangepicker.css') }}
        {{ Html::style('/bower/bower_food_delivery/build/css/custom.min.css') }}
        {{ Html::style('/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
        @stack('style')
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title">
                            <a href="{{ route('admin.home') }}" class="site_title"><i class="fa fa-paw"></i><span>Bep Me Un</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>{{ trans('welcome') }},</span>
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <br />
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>{{ trans('General') }}</h3>
                                <ul class="nav side-menu">
                                    <li><a href="{{ route('admin.home') }}"><i class="fa fa-tachometer"></i> {{ trans('Dashboard') }} <span class="fa fa-chevron-down"></span></a>
                                    </li>
                                    <li><a><i class="fa fa-bars"></i> {{ trans('Category') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.category.create') }}">{{ trans('admin_category.Add Category') }}</a></li>
                                            <li><a href="{{ route('admin.category.index') }}">{{ trans('admin_category.List Category') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-user-o"></i> {{ trans('User') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.user.create') }}">{{ trans('admin_user.Add User') }}</a></li>
                                            <li><a href="{{ route('admin.user.index') }}">{{ trans('admin_user.List User') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-cutlery"></i> {{ trans('Food') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.food.index') }}">{{ trans('List Food') }}</a></li>
                                            <li><a href="{{ route('admin.food.create') }}">{{ trans('Add Food') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> {{ trans('Order') }} <span class="fa fa-chevron-down"></span>
                                            @if(isset($pendingEventCount))
                                                <span class="badge bg-green">
                                                    {{ $pendingEventCount }}
                                                </span>
                                            @endif
                                        </a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.order.index') }}">{{ trans('List Order') }}
                                                @if(isset($pendingEventCount))
                                                    <span class="badge bg-green">
                                                        {{ $pendingEventCount }}
                                                    </span>
                                                @endif
                                                </a></li>
                                            <li><a href="#">{{ trans('Pending') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-clone"></i> {{ trans('Discount') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.discount.index') }}">{{ trans('Discount') }}</a></li>
                                            <li><a href="{{ route('admin.discount.create') }}">{{ trans('Add Discount') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-clone"></i> {{ trans('Review') }} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('admin.review.index') }}">{{ trans('Review') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu_section">
                                <h3>Live On</h3>
                                <ul class="nav side-menu">
                                    <li><a href="{{ route('index') }}"><i class="fa fa-bug"></i> {{ trans('Customer view') }}</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="English" href="#">Eng
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Vietnam" href="#">Vie
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset(Auth::user()->avatar) }}" alt="">{{ Auth::user()->name }}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="{{ route('admin.profile') }}"> {{ trans('Profile') }}</a></li>
                                        <li><a href="javascript:;">{{ trans('Help') }}</a></li>
                                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> {{ trans('Log Out') }}</a></li>
                                    </ul>
                                </li>
                                <li role="presentation" class="dropdown">
                                    <a href="{{ route('admin.order.index') }}" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        @if(isset($pendingEventCount))
                                            <span class="badge bg-green">
                                                {{ $pendingEventCount }}
                                            </span>
                                        @endif
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        @foreach($orderTime as $item)
                                            <li>
                                                <a href="{{ route('admin.order.detailOrder', $item->id) }}">
                                                    <span class="image">
                                                        <img src="{{ $item->user->avatar }}">
                                                    </span>
                                                    <span>
                                                        {{ $item->user->email }}
                                                    </span>
                                                    <span class="time message">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </span>                                            
                                                    <span class="message">
                                                        Have ordered
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <div class="text-center">
                                                <a href="{{ route('admin.order.index') }}">
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="right_col" role="main">
                    @yield('content')                    
                </div>
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
            </div>
        </div>
        {{ Html::script('/bower/bower_food_delivery/vendors/jquery/dist/jquery.js') }}
        {{ Html::script('/bower/bootstrap-rating/bootstrap-rating.js') }}
        {{ Html::script('/bower/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('/bower/fastclick/lib/fastclick.js') }}
        {{ Html::script('/bower/nprogress/nprogress.js') }}
        {{ Html::script('/bower/bower_food_delivery/vendors/Chart.js/dist/Chart.min.js') }}
        {{ Html::script('/bower/gauge.js/dist/gauge.min.js') }}
        {{ Html::script('/bower/bootstrap-progressbar/bootstrap-progressbar.min.js') }}
        {{ Html::script('/bower/iCheck/icheck.min.js') }}
        {{ Html::script('/bower/bower_food_delivery/vendors/skycons/skycons.js') }}
        {{ Html::script('/bower/Flot/jquery.flot.js') }}
        {{ Html::script('/bower/Flot/jquery.flot.pie.js') }}
        {{ Html::script('/bower/Flot/jquery.flot.time.js') }}
        {{ Html::script('/bower/Flot/jquery.flot.stack.js') }}
        {{ Html::script('/bower/Flot/jquery.flot.resize.js') }}
        {{ Html::script('/bower/bower_food_delivery/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}
        {{ Html::script('/bower/flot-spline/js/jquery.flot.spline.min.js') }}
        {{ Html::script('/bower/flot.curvedlines/curvedLines.js') }}
        {{ Html::script('/bower/DateJS/build/date.js') }}
        {{ Html::script('/bower/jqvmap/dist/jquery.vmap.js') }}
        {{ Html::script('/bower/jqvmap/dist/maps/jquery.vmap.world.js') }}
        {{ Html::script('/bower/jqvmap/examples/js/jquery.vmap.sampledata.js') }}
        {{ Html::script('/bower/moment/min/moment.min.js') }}
        {{ Html::script('/bower/bootstrap-daterangepicker/daterangepicker.js') }}
        {{ Html::script('/bower/bower_food_delivery/build/js/custom.min.js') }}
        {{ Html::script('/bower/sweetalert2/dist/sweetalert2.min.js') }}
        {{ Html::script('/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
        @stack('scripts')
  </body>
</html>
