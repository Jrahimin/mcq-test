@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }

        .contactus-form .form-control {
            color: black;
            font-weight: 800;
        }
    </style>
@endpush
@section('main-section')
    <div id="#contact-us">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Contact us</h3>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact us</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid no-padding contactus-section">
            <div class="container">
                <div class="section-padding"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="getintouch animated rotateInUpLeft">
                            <h3>Get in touch </h3>
                            <p>Please, Provide your feedback. Let us know your expericence. If you have any query or suggestion feel free to put it here.</p>
                            <form class="contactus-form" id="contact-form" method="post" action="{{route('feedback')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" required="" placeholder="Name" id="input_name"
                                                   class="form-control" name="name"
                                                   value="{{old('name')??auth()->user()?auth()->user()->name:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Mobile No." id="mobile_no"
                                                   class="form-control"
                                                   name="mobile_no"
                                                   value="{{old('mobile_no')??auth()->user()?auth()->user()->mobile_no:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" required="" placeholder="Email" id="input_email"
                                                   class="form-control" name="email"
                                                   value="{{old('email')??auth()->user()?auth()->user()->email:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" required="" placeholder="Feedback Title" id="title"
                                                   class="form-control" name="title"
                                                   value="{{old('title')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <textarea placeholder="Message" id="message" class="form-control"
                                                      name="message" rows="5" required>{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="submit" name="post" title="Send" id="btn_submit" class="pull-right"
                                                   value="Submit">
                                        </div>
                                    </div>
                                    <div class="alert-msg" id="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-padding"></div>
            </div>
            <div class="contactdetail-block animated slideInLeft">
                <div class="container">
                    <div class="col-md-4 col-sm-4 col-xs-6 contactinfo-box">
                        <span class="icon icon-Pointer"></span>
                        <h3>Where We Are?</h3>
                        <p>Chittagong</p>
                        <a href="#" title="MORE ABOUT US ">MORE ABOUT US </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 contactinfo-box">
                        <span class="icon icon-Phone2"></span>
                        <h3>Give us a Call</h3>
                        <p>Feel free to Contact for asking any quer</p>
                        <a href="tel:01816804737" title="01816804737">01816804737</a>
                    </div>
                    {{--<div class="col-md-3 col-sm-3 col-xs-6 contactinfo-box">
                        <span class="icon icon-Printer"></span>
                        <h3>Vist Our Office</h3>
                        <p>Consectetuer ux adipis cing elit sed dolor sit amet.</p>
                        <a href="#" title="Get Direction">Get Direction</a>
                    </div>--}}
                    <div class="col-md-4 col-sm-4 col-xs-6 contactinfo-box">
                        <span class="icon icon-Imbox"></span>
                        <h3>Drop us a Line</h3>
                        <p>Email us and let us know your issues</p>
                        <a href="mailto:admin@a2bpublications.com" title="admin@a2bpublications.com">admin@a2bpublications.com</a>
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
        new Vue({
            el: '#contact-us',
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
