<!-- Header -->
<header class="header-main container-fluid no-padding">
@include('layouts.frontend.header-top')
<!-- Menu Block -->
    <div class="menu-block container-fluid no-padding">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Navigation -->
                <nav class="navbar ow-navigation">
                    <div class="col-md-3">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                    data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a title="{{config('app.name')}}" href="{{route('user-home')}}" class="navbar-brand">
                                <img width="60px;" src="{{asset('frontend/user-end/images/logo.png')}}" alt="{{config('app.name')}}"/>
                                {{config('app.name')}} <span>Education of Best</span></a>
                            <a href="{{route('user-home')}}" class="mobile-logo" title="{{config('app.name')}}">
                                <h3>{{config('app.name')}}</h3></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav menubar">
                                <li><a title="Home" href="{{route('user-home')}}">Home</a></li>
                                <li><a title="Packages" href="{{route('packages')}}">Packages</a></li>
                                <li><a title="Event" href="{{route('exam-schedule')}}">Exam Schedule</a></li>
                                @if(auth()->check())
                                    <li><a title="Payment" href="{{route('make-payment')}}">Recharge</a></li>
                                @endif
                                <li><a title="About" href="{{route('about')}}">About</a></li>
                                <li><a title="Contact" href="{{route('contact-us')}}">Contact</a></li>
                                {{--                                <li class="dropdown active">--}}
                                {{--                                    <a aria-expanded="false" aria-haspopup="true" href="index-2.html" role="button" class="dropdown-toggle" title="Home">Home</a>--}}
                                {{--                                    <i class="ddl-switch fa fa-angle-down"></i>--}}
                                {{--                                    <ul class="dropdown-menu">--}}
                                {{--                                        <li><a title="Home 2" href="home2.html">Home 2</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                                @if(auth()->user())
                                    <li class="dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" href="javascript:void(0)"
                                           role="button"
                                           class="dropdown-toggle" title="User Profile">
                                            <img src="{{ secure_asset('frontend/image/admin.png')}}"
                                                 class="img-circle elevation-2" alt="User Image" height="24px"
                                                 width="24px"> <span
                                                class="text-warning">{{auth()->user()->name}}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a title="User Profile" href="{{route('user-profile')}}"><i
                                                        class="fa fa-edit"></i> Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                        {{--                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
                                        {{--                                        <div class="dropdown-divider"></div>--}}
                                        {{--                                        <a href="#" class="dropdown-item">--}}
                                        {{--                                            <i class="fas fa-user-edit mr-2"></i> Profile Update--}}
                                        {{--                                        </a>--}}
                                        {{--                                        <div class="dropdown-divider"></div>--}}
                                        {{--                                        <a href="#" class="dropdown-item">--}}
                                        {{--                                            <i class="fas fa-key mr-2"></i> Password Change--}}
                                        {{--                                        </a>--}}
                                        {{--                                        <div class="dropdown-divider"></div>--}}
                                        {{--                                        --}}{{-- <a href="{{ route('logout') }}" class="dropdown-item">--}}
                                        {{--                                            <i class="fas fa-power-off mr-2"></i> Logout--}}
                                        {{--                                        </a> --}}
                                        {{--                                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
                                        {{--                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                                        {{--                                            {{ __('Logout') }}--}}
                                        {{--                                        </a>--}}
                                        {{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                                        {{--                                              style="display: none;">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                        </form>--}}

                                        {{--                                    </div>--}}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav><!-- Navigation /- -->
            </div>
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
</header><!-- Header /- -->
