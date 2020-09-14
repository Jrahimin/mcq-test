@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
    <style>
    </style>
@endsection
@push('custom-css')
    <style type="text/css">
        .ow-pagination .pagination > li:first-child > a, .ow-pagination .pagination > li:last-child > a {
            border: 1px solid #eaeaea;
            height: 36px;
            display: inline-block;
            width: 105px;
            padding: 0;
            border-radius: 30px;
            line-height: 34px;
            text-decoration: none;
        }

        .login_box_area {
            padding: 2%;
            border: 2px solid #99b6c7;
            box-shadow: #0c525d;
            margin-top: 2%;
        }

        .login_title {
            margin-bottom: 5%;
            font-size: 2em;
            text-align: center;
            text-decoration: underline;
        }

        .display-inline-block {
            display: inline-block;
        }

        .margin-left-10 {
            margin-left: 10%;
        }
    </style>
@endpush
@section('main-section')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2 login_box_area" style="background:#d0e6ec3d">
                <div class="card" style="background:  #d0e6ec0d">
                    <div class="card-header login_title">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender')??'Gender' }}</label>
                                <div class="col-md-6">
                                    <div class="form-check display-inline-block mr-2">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender"
                                                   value="m" {{ old('gender')=='m'?'checked':'' }}> Male
                                        </label>
                                    </div>
                                    <div class="form-check display-inline-block margin-left-10">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender"
                                                   value="f" {{ old('gender')=='f'?'checked':'' }}> Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        /*(function () {
            @if(session()->has('success_message'))
        Swal.fire('Success!', "{{session()->get('success_message')}}", 'success');
            @endif
        @if(session()->has('error_message'))
        Swal.fire('Fail!', "{{session()->get('error_message')}}", 'error');
            @endif
        })();*/
        new Vue({
            el: '#packages',
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
