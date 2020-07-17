
@if(!auth()->user())
    <!-- Top Header -->
    <div class="top-header container-fluid no-padding">
        <div class="container">
            <div class="topheader-left">
                <a href="tel:+5198759822" title="5198759822"><i class="fa fa-mobile" aria-hidden="true"></i>(519) - 875
                    -
                    9822 </a>
                <a href="mailto:Support@info.com" title="Support@info.com"><i class="fa fa-envelope-o"
                                                                              aria-hidden="true"></i>Emailus:
                    Support@info.com</a>
            </div>
            <div class="topheader-right">
                <a href="{{route('user-login')}}" title="Login"><i class="fa fa-sign-out"
                                                                   aria-hidden="true"></i>Login</a>
                <a href="{{route('user-registration')}}" title="Register">Register</a>
            </div>
        </div>
    </div>
    <!-- Top Header /- -->
@endif
