@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/login-page/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/login-page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/login-page/vendor/animate/animate.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/login-page/vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/login-page/vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/login-page/vendor/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/login-page/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/login-page/css/main.css')}}">
@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }
    </style>
@endpush
@section('main-section')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(frontend/login-page/images/bg-01.jpg);">
                <span class="login100-form-title-1">
                Login In
                </span>
                </div>
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26 alert-validate"
                         data-validate="Email is required">
                        <span class="label-input100"><i class="fa fa-inbox"></i> {{ __('E-Mail') }} </span>
                        <input class="input100 @error('email') is-invalid @enderror" id="email" type="email"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        @error('email')
                        <span class="focus-input100">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input m-b-18 alert-validate"
                         data-validate="Password is required">
                        <span class="label-input100"><i class="fa fa-key"></i> Password</span>
                        <input class="input100 @error('password') is-invalid @enderror" id="password" type="password"
                               name="password" required
                               autocomplete="current-password">
                        <span class="focus-input100"></span>
                        @error('password')
                        <span class="focus-input100">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn pull-right" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script-lib')

    <script src="{{asset('frontend/login-page/vendor/animsition/js/animsition.min.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('frontend/login-page/vendor/bootstrap/js/popper.js')}}" type="text/javascript"></script>

    <script src="{{asset('frontend/login-page/vendor/select2/select2.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('frontend/login-page/vendor/daterangepicker/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('frontend/login-page/vendor/daterangepicker/daterangepicker.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('frontend/login-page/vendor/countdowntime/countdowntime.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('frontend/login-page/js/main.js')}}" type="text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
            type="text/javascript"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#home',
            data: {},
            methods: {
                ajaxCall: window.ajaxCall,
                responseProcess: window.responseProcess,
            },
            mounted() {
            },
        })
    </script>
@endpush
