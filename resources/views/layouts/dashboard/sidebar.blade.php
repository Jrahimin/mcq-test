<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link">
        <img src="{{ asset('frontend/image/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ETI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('frontend/image/Dg picture.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Super Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('/dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Dashboard
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/menu')}}" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">
                        <i class="fa fa-info nav-icon"></i>
                        <p>Menu</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link {{ request()->is(['notice-category','important-link','internal-service','dg','header','breaking-news','notice']) ? 'active' : '' }}">
                        <i class="fa fa-copy nav-icon"></i>
                        <p>
                            Home Page
                            <i class="fa fa-angle-left right"></i>
                            {{--                            <span class="badge badge-info right"></span>--}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{request()->is(['notice-category','important-link','internal-service','dg','header','breaking-news','notice'])?'display:block;':''}}">
                        <li class="nav-item">
                            <a href="{{url('/header')}}" class="nav-link {{ request()->is('header') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/breaking-news')}}"
                               class="nav-link {{ request()->is('breaking-news') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Breaking News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/notice-category')}}"
                               class="nav-link {{ request()->is('notice-category') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Notice Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/notice')}}" class="nav-link {{ request()->is('notice') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Notice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/dg')}}" class="nav-link {{ request()->is('dg') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>DG</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/internal-service')}}"
                               class="nav-link {{ request()->is('internal-service') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Internal Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/important-link')}}"
                               class="nav-link {{ request()->is('important-link') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Important Link</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link {{ request()->is(['home-page-slider','video-link','research-and-development','integrity','training-calender','app','course-detail','course-category','event','event-type','dynamic','ex-dg','faculty','course','training','organogram','publication','previous-training']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{request()->is(['home-page-slider','video-link','research-and-development','integrity','training-calender','app','course-detail','course-category','event','event-type','dynamic','ex-dg','faculty','course','training','organogram','publication','previous-training'])?'display:block;':''}}">
                        <li class="nav-item">
                            <a href="{{url('/home-page-slider')}}"
                               class="nav-link {{ request()->is('home-page-slider') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Images</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/ex-dg')}}" class="nav-link {{ request()->is('ex-dg') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Ex DG</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/dynamic')}}" class="nav-link {{ request()->is('dynamic') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Dynamic</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/faculty')}}"
                               class="nav-link {{ request()->is('faculty') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Faculty</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/course-category')}}"
                               class="nav-link {{ request()->is('course-category') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Course Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/course')}}"
                               class="nav-link {{ request()->is('course') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/course-detail')}}"
                               class="nav-link {{ request()->is('course-detail') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Course Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/training-calender')}}"
                               class="nav-link {{ request()->is('training-calender') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Training Calender</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/integrity')}}"
                               class="nav-link {{ request()->is('integrity') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Integrity</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/organogram')}}"
                               class="nav-link {{ request()->is('organogram') ? 'active' : '' }}">
                                <i class="far fa-info nav-icon"></i>
                                <p>Organogram</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/publication')}}"
                               class="nav-link {{ request()->is('publication') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Publication</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/previous-training')}}"
                               class="nav-link {{ request()->is('previous-training') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Previous Training</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/event-type')}}"
                               class="nav-link {{ request()->is('event-type') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Event Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/event')}}"
                               class="nav-link {{ request()->is('event') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/app')}}"
                               class="nav-link {{ request()->is('app') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>APP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/research-and-development')}}"
                               class="nav-link {{ request()->is('research-and-development') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Research and Development</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/video-link')}}"
                               class="nav-link {{ request()->is('video-link') ? 'active' : '' }}">
                                <i class="far fa-adjust nav-icon"></i>
                                <p>Video Link</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
