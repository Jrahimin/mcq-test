
@if(!auth()->user())
    <!-- Top Header -->
    <div class="top-header container-fluid no-padding">
        <div class="container">
            <div class="topheader-left">
                <a href="tel:01816804737" title="01816804737"><i class="fa fa-mobile" aria-hidden="true"></i>01816804737</a>
                <a href="mailto:admin@a2bpublications.com" title="admin@a2bpublications.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>admin@a2bpublications.com</a>
            </div>
            <div class="topheader-right">
                <a href="{{route('login')}}" title="Login"><i class="fa fa-sign-out"
                                                                   aria-hidden="true"></i>Login</a>
                <a href="{{route('register')}}" title="Register">Register</a>
            </div>
        </div>
    </div>
    <!-- Top Header /- -->
@endif
