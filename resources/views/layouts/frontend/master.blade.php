<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie6"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie7"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie8"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class=""><!--<![endif]-->

<!-- Mirrored from premiumlayers.net/demo/html/{{config('app.name')}}/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 16:25:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home -Knowledge</title>
    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/user-end/images/favicon.ico')}}"/>

    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('frontend/user-end/images/apple-touch-icon-114x114-precomposed.png')}}">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('frontend/user-end/images/apple-touch-icon-72x72-precomposed.png')}}">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed"
          href="{{asset('frontend/user-end/images/apple-touch-icon-57x57-precomposed.png')}}">

    <!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/libraries/lib.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/user-end/libraries/Stroke-Gap-Icon/stroke-gap-icon.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css0dd4.css?family=Roboto:400,900,300,300italic,500,700" rel='stylesheet'
          type="text/css">
    <link href="https://fonts.googleapis.com/css83d9.css?family=Roboto+Slab:400,700" rel='stylesheet' type="text/css">
    <link href="https://fonts.googleapis.com/css591d.css?family=Niconne" rel="stylesheet" type="text/css">


    <!-- Custom - Common CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/navigation-menu.css')}}">

    <!-- Custom - Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/shortcode.css')}}">

<!--[if lt IE 9]>
    <script src="{{asset('frontend/user-end/js/html5/respond.min.js')}}"></script>
    <![endif]-->
    @yield('style-lib')
    @stack('custom-css')

    <style>
        @media (min-width: 992px) {
            .ow-navigation .navbar-brand > img {
                position: absolute;
                left: 0;
                top: -8px;
                width: 53px;
            }
        }

        .pagebanner {
            min-height: 190px;
        }

        .footer-main {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin-bottom: 0;
        }

        .footer-bottom {
            border-top: 1px solid #343434;
            padding-top: 6px;
            padding-bottom: 4px;
        }
        body {
            margin-bottom:50px;
            /*min-height: 1150px;*/
        }

    </style>
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
<!-- LOADER -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="loader-inner ball-clip-rotate">
            <div></div>
        </div>
    </div>
</div><!-- Loader /- -->
@include('layouts.frontend.header')
@if(isset($slider_enable) && $slider_enable)
    @include('layouts.frontend.slider')
@endif
@yield('main-section')

@include('layouts.frontend.footer')

<!-- JQuery v1.11.3 -->
<script src="{{asset('frontend/user-end/js/jquery.min.js')}}"></script>
<!--script src="js/jquery.knob.js"></script-->

<!-- Library - Js -->
<script src="{{asset('frontend/user-end/libraries/lib.js')}}"></script><!-- Bootstrap JS File v3.3.5 -->
<!-- Library - Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- Library - Theme JS -->
<script src="{{asset('frontend/user-end/js/functions.js')}}"></script>
<!-- AdminLTE -->
<script src="{{secure_asset('dist/js/adminlte.js')}}"></script>
<script src="{{secure_asset('js/vuejs/vuejs-dev.js')}}"></script>
<script src="{{secure_asset('js/axios/axios.min.js')}}"></script>
<script src="{{secure_asset('js/vuejs/vee-validation.js')}}"></script>
<script src="{{secure_asset('js/sweet-alert.min.js')}}"></script>
<script>
    VeeValidate.extend('required', {
        validate(value, args) {
            return {
                required: true,
                valid: ['', null, undefined].indexOf(value) === -1
            };
        },
        computesRequired: true
    });
    // Vue.component('ValidationObserver', VeeValidate.ValidationObserver);
    Vue.component('validation-observer', VeeValidate.ValidationObserver);
    // Register the component globally.
    Vue.component('validation-provider', VeeValidate.ValidationProvider);
    window.$ = $;

    window.responseProcess = (response, alert, callback) => {
        {
            if (response.status == 'success' || response.code == 200) {
                if (alert)
                    Swal.fire({
                        icon: 'success',
                        title: 'Yahoo..',
                        text: response.message || 'Form stored successfully',
                    });
            } else {
                if (alert)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong! please try again later',
                    });
            }
            callback(response.data, response.code);
        }
    };
    window.ajaxCall = (api, data, method, callback, alert = false, base_url = '') => {
        (async () => {
            await axios[method](base_url + api, {
                ...data
            })
                .then(response => this.responseProcess(response.data, alert, (data, code) => callback(data, code)))
                .catch(function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! please try again later',
                    });
                });
        })();
    }

    (function () {
        @if(session()->has('success_message'))
        Swal.fire('Success!', "{{session()->get('success_message')}}", 'success');
        @endif
        @if(session()->has('error_message'))
        Swal.fire('Fail!', "{{session()->get('error_message')}}", 'error');
        @endif
    })();
</script>
<!-- DataTables -->
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{secure_asset('plugins/sweetalert2/sweetalert2.js')}}"></script>
@yield('script-lib')
@stack('custom-js')
</body>

<!-- Mirrored from premiumlayers.net/demo/html/{{config('app.name')}}/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 16:26:04 GMT -->
</html>
