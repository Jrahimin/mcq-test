<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>A2B Online Exam</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{secure_asset('plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{secure_asset('css/dashboard_box.css')}}">
    <!-- IonIcons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{secure_asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{secure_asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{secure_asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{secure_asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
    <!-- datatable fixed-header style -->
    <link rel="stylesheet" href="{{secure_asset('plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
            .form-check {
                padding-top: 10% !important;
            }
    </style>
    @yield('style-lib')
    @stack('custom-css')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('layouts.dashboard.navbar')
@include('layouts.dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('layouts.dashboard.page-header')
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('main-content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    @include('layouts.dashboard.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{secure_asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
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
</html>
