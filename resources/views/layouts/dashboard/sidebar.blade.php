<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{secure_url('/')}}" class="brand-link">
        <img src="{{ secure_asset('frontend/image/')}}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">A2B Exam System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ secure_asset('frontend/image/admin.png')}}" class="img-circle elevation-2" alt="User">
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
                    <a href="{{secure_url(route('dashboard'))}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Dashboard
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link {{ request()->is(['exam-pack','exam-test','test-question']) ? 'active' : '' }}">
                        <i class="fa fa-copy nav-icon"></i>
                        <p>
                            Exam
                            <i class="fa fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{request()->is(['exam-pack','exam-test','test-question'])?'display:block;':''}}">
                        <li class="nav-item">
                            <a href="{{secure_url(route('exam-pack.index'))}}"
                               class="nav-link {{ request()->is('exam-pack') ? 'active' : '' }}">
                                <i class="far fa-question nav-icon"></i>
                                <p>Exam Package</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{secure_url(route('exam-test.index'))}}"
                               class="nav-link {{ request()->is('exam-test') ? 'active' : '' }}">
                                <i class="far fa-book-open nav-icon"></i>
                                <p>Exam-Test</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{secure_url(route('test-question.index'))}}"
                               class="nav-link {{ request()->is('test-question') ? 'active' : '' }}">
                                <i class="far fa-question nav-icon"></i>
                                <p>Test Question</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link {{ request()->is(['user-management']) ? 'active' : '' }}">
                        <i class="fa fa-copy nav-icon"></i>
                        <p>
                            User
                            <i class="fa fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{request()->is(['user-management'])?'display:block;':''}}">
                        <li class="nav-item">
                            <a href="{{secure_url(route('user-management.index'))}}"
                               class="nav-link {{ request()->is('user-management') ? 'active' : '' }}">
                                <i class="far fa-book-open nav-icon"></i>
                                <p>User Management</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{secure_url(route('payment-info.index'))}}" class="nav-link {{ request()->is('payment-info') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Payment Info
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
