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
                <h3>More about <span> {{ config('app.name') }}</span></h3>
                <p>Achieving the desired success requires patience and persistence your goals need time</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="video-block animated fadeInLeft">
                        <a title="Paly Video" class="popup-youtube" href="https://www.youtube.com/watch?v=IirKKe1fFDQ" target="_blank"><i class="fa fa-play" aria-hidden="true"></i></a>
                        <img src="{{asset('frontend/user-end/images/video2.jpg')}}" width="400" height="300" alt="Video Poster">
                        <div class="video-content">
                            <h3>Your can achieve what you desire</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 accordion-section animated fadeInRight">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_1">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="collapsed">About Us</a>
                                </h4>
                            </div>
                            <div id="accordion1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_1" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Our mission is to provide solid & virtual contents, exam tests, guidelines etc to job seekers that needed for job exams’ preparation at few of cost. As our name is A2B Publications, it clears our vision in itself. A2B means Access to BCS; A2B means Access to Bank; A2B means Access to Best indeed. Our team is here to provide you books, all information, study materials, suggestions, sample papers and many more at very one place.  </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion2" aria-expanded="false" aria-controls="accordion2">TERMS OF SERVICE</a>
                                </h4>
                            </div>
                            <div id="accordion2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_2" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <b style="color: royalblue">1. ACCEPTANCE OF TERMS</b>
                                    <p>
                                        We offer our service to you, subject to the following Terms of Service. These policies may be updated by us from time to time without any notice for the wellness of our service and you. You can always read and check our terms and policies on this page.  For registered user they will get a notification regarding the update of terms and conditions.
                                    </p>
                                    <b style="color: royalblue">2. USAGE</b>
                                    <p>All trademarks and company names published in this site are subjected to their respected owners and companies. We respect our users and love their inputs as comment or question submission or in any other mean. However; we find the you are abusing or posting foul or unwanted content, then in this case we have right to terminate your account.</p>
                                    <b style="color: royalblue">3. REGISTRATION INTO SITE</b>
                                    <p>A2B Publications has registration services on the site which is mandatory. The commenting and posting are restricted only to our registered user. The personal data that we take from users are safe with us and it never will be redistributed and shared to anyone. However, you may get newsletter time to time.</p>
                                    <b style="color: royalblue">4. ANTI-SPAM POLICY</b>
                                    <p>A2B Publications is against in sending spam, unsolicited emails. You are totally prohibited to unauthorized use of our referral and email services for any personal and commercial purpose. To use these services you need to agree with our terms and condition. Violating these terms, conditions and policies in any manner subject to violation of respected laws and necessary action will be initiated against the defaulters.</p>
                                    <b style="color: royalblue">5. COPYRIGHT POLICY</b>
                                    <p>All contents, data and graphics presented on this website are the property of A2B Publications. In this site, if you find any information that is owned by you or any content that violates your intellectual property rights, please contact to us with all necessary documents/information that authenticate your authority on your property.</p>
                                    <b style="color: royalblue">6. PRIVACY POLICY</b>
                                    <p>The personal information, emails that are submitted while registering to the site, will NOT be distributed, and shared with any other third-parties. We only use this data for our information, for research, to improve our services and for contacting you purposes. Any significant changes will be notified to you by sending an email to your email address that you have provided while registering with us or by placing a notice on our site.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="accordion_3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion3" aria-expanded="false" aria-controls="accordion3">Management Team & Consultants</a>
                                </h4>
                            </div>
                            <div id="accordion3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="accordion_3" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <b style="color: royalblue">Founder & Honorary Co-ordinator</b>
                                    <ul>
                                        <li>Mr. Md. Mahfuzul Alam – Assistant Teacher [35th BCS]</li>
                                    </ul>

                                    <b style="color: royalblue">Honorary Consultants</b>
                                    <ul>
                                        <li>Mr. Manna Dey – ASP, Bangladesh Police [34th BCS (Police)]</li>
                                        <li>Mr. Yousuf Hasan – Assistant Commissioner & Executive Magistrate [37th BCS (Admin)]</li>
                                        <li>Mr. Md. Amir Hossain – Assistant Post Master General [36th BCS (Postal)]</li>
                                        <li>Mr. Mohammad Mahmodul Hasan – Principal Officer, Sonali Bank Ltd.</li>
                                        <li>Mrs. Rinky Gunjan – Senior Officer, Janata Bank Ltd.</li>
                                        <li>Mr. Rezwanul Haque Palash – Senior Officer, Janata Bank Ltd.</li>
                                        <li>Mr. Mohammad Mostofa Rashed – Officer, Sonali Bank Ltd.</li>
                                    </ul>

                                    <b style="color: royalblue">Tech Consultants</b>
                                    <ul>
                                        <li>Mr. Macbah Uddin Sazzad</li>
                                        <li>Mr. Robiul Islam</li>
                                        <li>Md. Junayed Bin Rafiq</li>
                                        <li>Md. Rana Hossain</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
        {{--<div class="container-fluid no-padding team-section animated fadeInLeft">
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
        </div>--}}
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
