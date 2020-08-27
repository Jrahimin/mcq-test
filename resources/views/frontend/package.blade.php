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
    <div id="package">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>{{$exam_pack->title}}</h3>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Package Details</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container coursesdetail-section">
            <div class="section-padding"></div>
            <div class="row">
                <div class="col-md-9 col-sm-8 event-contentarea animated fadeInLeft">
                    <div class="coursesdetail-block">
                        {{--                <img src="images/event-coursesdetail.jpg" alt="event-coursesdetail" width="860" height="500">--}}
                        <div class="course-description">
                            <h3 class="course-title">Package Description</h3>
                            <div>{!! $exam_pack->description !!}</div>
                        </div>
                        <div class="courses-review">
                            <h3 class="course-title">Courses Review</h3>
                            <div class="reviewbox">
                                <h3>Average Rating</h3>
                                <div class="average-review">
                                    <h2>4.9</h2>
                                    <ul>
                                        <li><a href="#" title="1 Star"><i class="fa fa-star-o"
                                                                          aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="2 Star"><i class="fa fa-star-o"
                                                                          aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="3 Star"><i class="fa fa-star-o"
                                                                          aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="4 Star"><i class="fa fa-star-o"
                                                                          aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="5 Star"><i class="fa fa-star-o"
                                                                          aria-hidden="true"></i></a></li>
                                    </ul>
                                    <span>5 Rating</span>
                                </div>
                            </div>
                            <div class="reviewbox">
                                <h3>Detailed Rating</h3>
                                <div class="detail-review">
                                    <ul>
                                        <li><a href="#" title="5 stars">5 stars</a><span>5</span></li>
                                        <li><a href="#" title="4 stars">4 stars</a><span>0</span></li>
                                        <li><a href="#" title="3 stars">3 stars</a><span>0</span></li>
                                        <li><a href="#" title="2 stars">2 stars</a><span>0</span></li>
                                        <li><a href="#" title="1 stars">1 stars</a><span>0</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 event-sidebar animated fadeInRight">
                    <div class="courses-features">
                        <h3>{{$exam_pack->title}}</h3>
                        <div class="featuresbox">
                        </div>
                        <div class="featuresbox">
                            <h3>MINI Test : </h3>
                            <span> {{$exam_pack->mini_test_count}}</span>
                        </div>
                        <div class="featuresbox">
                            <h3>MOCK Test : </h3>
                            <span> {{$exam_pack->mock_test_count}}</span>
                        </div>
                        <div class="featuresbox">
                            <h3>MODEL Test : </h3>
                            <span> {{$exam_pack->model_test_count}}</span>
                        </div>
                        <div class="featuresbox">
                            <h3>Price : </h3><span> {{$exam_pack->price}}</span></div>
                        <div class="featuresbox">
                            @php
                                $duration = \Carbon\Carbon::parse($exam_pack->from_date)->diffInDays(\Carbon\Carbon::parse($exam_pack->to_date));
                            @endphp
                            <h3>Duration : </h3><span> {{$duration}} day{{$duration>1?'s':''}}</span></div>
                        <div class="featuresbox">
                            <h3>Status : </h3><span> {{$exam_pack->status?'Active':'Inactive'}}</span></div>
                        <div class="featuresbox">
                            <h3>From : </h3><span> {{$exam_pack->from_date}}</span></div>
                        <div class="featuresbox">
                            <h3>To : </h3><span> {{$exam_pack->to_date}}</span></div>
                        <div class="featuresbox">
                            @if(!auth()->check() || !auth()->user()->examPack()->where('exam_pack_user.exam_pack_id', $exam_pack->id)->first())
                                <form action="{{route('buy-package')}}" method="POST" style="display: inline-block">
                                    @csrf
                                    <input type="text" hidden name="exam_pack_id" value="{{$exam_pack->id}}">
                                    <button class="btn btn-warning" type="submit">Buy Now</button>
                                </form>
                            @endif
                            <div style="display: inline-block" class="d-inline-block m-0 p-0">
                                <a class="btn btn-info"
                                   href="{{route('exam-schedule')}}?exam_pack_id={{$exam_pack->id}}"> Exam List </a>
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
            el: '#package',
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
