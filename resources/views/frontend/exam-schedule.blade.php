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
    <div id="#exam-schedule">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Exam Schedules</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Exam Schedules</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container event-section">
            <div class="section-padding"></div>
            <div class="event-block">
                <div class="event-box animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            <img src="{{asset('frontend/user-end/images/event1.jpg')}}" alt="event1" width="260" height="160">
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-7">
                            <h3><a href="#" title="Science In The New Era">Science In The New Era</a></h3>
                            <div class="event-meta">
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
                                <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
                            </div>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <a href="#" class="readmore" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="event-box animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            <img src="{{asset('frontend/user-end/images/event2.jpg')}}" alt="event2" width="260" height="160">
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-7">
                            <h3><a href="#" title="Student Exchange Program Information Sessions">Student Exchange Program Information Sessions</a></h3>
                            <div class="event-meta">
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
                                <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
                            </div>
                            <p>Business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <a href="#" class="readmore" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="event-box animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            <img src="{{asset('frontend/user-end/images/event3.jpg')}}" alt="event3" width="260" height="160">
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-7">
                            <h3><a href="#" title="Chicago Architecture Foundation River Cruise">Chicago Architecture Foundation River Cruise</a></h3>
                            <div class="event-meta">
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
                                <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
                            </div>
                            <p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <a href="#" class="readmore" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="event-box animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            <img src="{{asset('frontend/user-end/images/event4.jpg')}}" alt="event4" width="260" height="160">
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-7">
                            <h3><a href="#" title="Good Intentions or Good Results?">Good Intentions or Good Results?</a></h3>
                            <div class="event-meta">
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
                                <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
                            </div>
                            <p>Business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <a href="#" class="readmore" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="event-box animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            <img src="{{asset('frontend/user-end/images/event5.jpg')}}" alt="event5" width="260" height="160">
                        </div>
                        <div class="col-md-7 col-sm-6 col-xs-7">
                            <h3><a href="#" title="Vegie Garden Wednesday Workshops">Vegie Garden Wednesday Workshops</a></h3>
                            <div class="event-meta">
                                <span><i aria-hidden="true" class="fa fa-clock-o"></i>8:00 Am - 5:00 Pm</span>
                                <span><i aria-hidden="true" class="fa fa-map-marker"></i>London, UK</span>
                            </div>
                            <p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <a href="#" class="readmore" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="ow-pagination">
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </nav>
            <div class="section-padding"></div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#exam-schedule',
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
