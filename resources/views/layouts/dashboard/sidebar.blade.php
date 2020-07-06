<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link">
        <img src="{{ asset('frontend/image/')}}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">MCQ Exam System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('frontend/image/Dg picture.jpg')}}" class="img-circle elevation-2" alt="User">
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
                            <a href="{{url('/exam-test')}}"
                               class="nav-link {{ request()->is('exam-test') ? 'active' : '' }}">
                                <i class="far fa-book-open nav-icon"></i>
                                <p>Exam-Test</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/test-question')}}"
                               class="nav-link {{ request()->is('test-question') ? 'active' : '' }}">
                                <i class="far fa-question nav-icon"></i>
                                <p>Test Question</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/exam-pack')}}"
                               class="nav-link {{ request()->is('exam-pack') ? 'active' : '' }}">
                                <i class="far fa-question nav-icon"></i>
                                <p>Exam Package</p>
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
