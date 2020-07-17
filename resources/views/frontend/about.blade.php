@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }
    </style>
@endpush
@section('main-section')
    <div id="#about">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>About US</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>About US</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container whychooseus-section">
            <div class="section-padding"></div>
            <div class="section-header">
                <h3>Why Choose <span> EduMax</span></h3>
                <p>Achieving the desired success requires patience and persistence your goals need time</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="video-block animated fadeInLeft">
                        <a title="Paly Video" class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fa fa-play" aria-hidden="true"></i></a>
                        <img src="{{asset('frontend/user-end/images/video-poster-2.jpg')}}" width="570" height="400" alt="Video Poster">
                        <div class="video-content">
                            <h3>Your Career Starts Here</h3>
                            <p>Achieving the desired success requires patience and persistence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 accordion-section animated fadeInRight">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_1">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="collapsed">Careers</a>
                                </h4>
                            </div>
                            <div id="accordion1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_1" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Perspiciatis unde omnis iste natus error sit voluptatem accu santiumuo doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illomas inventore veritatis et quasi architecto beatae vitae dicta sunt explicaon Nemo enim ipsam voluptatem quia voluptas</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion2" aria-expanded="false" aria-controls="accordion2">Clients Approch</a>
                                </h4>
                            </div>
                            <div id="accordion2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_2" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Perspiciatis unde omnis iste natus error sit voluptatem accu santiumuo doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illomas inventore veritatis et quasi architecto beatae vitae dicta sunt explicaon Nemo enim ipsam voluptatem quia voluptas</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion3" aria-expanded="false" aria-controls="accordion3">24/7 Professional Support</a>
                                </h4>
                            </div>
                            <div id="accordion3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_3" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Perspiciatis unde omnis iste natus error sit voluptatem accu santiumuo doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illomas inventore veritatis et quasi architecto beatae vitae dicta sunt explicaon Nemo enim ipsam voluptatem quia voluptas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
        <div class="container-fluid no-padding team-section animated fadeInLeft">
            <div class="section-padding"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 team-content-block">
                        <div class="section-header">
                            <h3>Meet <span> Our Staffs</span></h3>
                            <p>Our creative and professional staffs</p>
                        </div>
                        <div class="team-intro">
                            <p>World Largest books and library center is here where you can study the latest trends of the education.If you want to build a successful business online, watch the promo video to see why 13,000+ students are using this online entrepreneurship course to learn.</p>
                        </div>
                        <a class="left carousel-control" href="#team-carousel" role="button" data-slide="prev">Prev</a>
                        <a class="right carousel-control" href="#team-carousel" role="button" data-slide="next">Next</a>
                    </div>
                    <div class="col-md-6 col-sm-12 team-gallary">
                        <div id="team-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team1" src="{{asset('frontend/user-end/images/team1.jpg')}}" width="290" height="370">
                                                <div class="team-content">
                                                    <h3>Martin Phillips</h3>
                                                    <span>Executive Director</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team2" src="{{asset('frontend/user-end/images/team2.jpg')}}" width="290" height="370">
                                                <div class="team-content">
                                                    <h3>Thomas Wright</h3>
                                                    <span>Web Developer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team1" src="{{asset('frontend/user-end/images/team1.jpg')}}" width="290" height="370">
                                                <div class="team-content">
                                                    <h3>Martin Phillips</h3>
                                                    <span>Executive Director</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="team-box">
                                                <ul>
                                                    <li><a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a title="Twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a title="Google-Pluse" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a title="Behance" href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                                    <li><a title="Dribbble" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <img alt="team2" src="{{asset('frontend/user-end/images/team2.jpg')}}" width="290" height="370">
                                                <div class="team-content">
                                                    <h3>Thomas Wright</h3>
                                                    <span>Web Developer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#about',
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
