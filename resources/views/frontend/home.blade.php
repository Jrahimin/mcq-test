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
    <div id="#home">
        <!-- Welcome Section -->
        <div class="container welcome-section">
            <div class="section-padding"></div>
            <div class="section-header-block">
                <div class="section-header">
                    <h3>Popular <span>Packages</span></h3>
                    <p>Packages to meet your need
                    <p>
                </div>
                <a href="{{ route('packages') }}" title="View All">View All</a>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="welcome-box">
                            <img src="{{asset('frontend/user-end/images/welcome3.jpg')}}" alt="welcome3" width="370"
                                 height="440"/>
                            <div class="welcome-title">
                                <h3>{{ $package->title }}</h3>
                            </div>
                            <div class="welcome-content">
                                <ul class="course-detail">
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                        Package Validity : <span>{{ $package->from_date }} to {{ $package->to_date }}</span>
                                    </li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>
                                        Price : <span>{{ $package->price }} BDT</span>
                                    </li>
                                    <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Package Details :
                                        <br/><span>Model Test : {{ $package->model_test_count }} | Mini Test : {{ $package->mini_test_count }} | Mock Test : {{ $package->mock_test_count }}</span>
                                    </li>
                                </ul>
                                <a href="coursesdetails-page.html" title="Apply now">Buy now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Welcome Section /- -->

    {{--<!-- Parallax Section -->--}}
    {{--<div class="container-fluid no-padding parallax-section">--}}
    {{--    <div class="parallax-carousel">--}}
    {{--        <div class="parallax-block">--}}
    {{--            <div class="parallax-box">--}}
    {{--                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>--}}
    {{--            </div>--}}
    {{--            <div class="parallax-content">--}}
    {{--                <h3>Learn Online Courses</h3>--}}
    {{--                <h3>Only patience & persistence give <span>Good Result</span></h3>--}}
    {{--                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>--}}
    {{--                <a href="#" title="Find More About Us">Find More About Us</a>--}}
    {{--                <ul>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="parallax-block">--}}
    {{--            <div class="parallax-box">--}}
    {{--                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>--}}
    {{--            </div>--}}
    {{--            <div class="parallax-content">--}}
    {{--                <h3>Learn Online</h3>--}}
    {{--                <h3>Only patience & persistence give <span>Good Result 2</span></h3>--}}
    {{--                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>--}}
    {{--                <a href="#" title="Find More About Us">Find More About Us</a>--}}
    {{--                <ul>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="parallax-block">--}}
    {{--            <div class="parallax-box">--}}
    {{--                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>--}}
    {{--            </div>--}}
    {{--            <div class="parallax-content">--}}
    {{--                <h3>Learn Courses</h3>--}}
    {{--                <h3>Only patience & persistence give <span>Good Result 3</span></h3>--}}
    {{--                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>--}}
    {{--                <a href="#" title="Find More About Us">Find More About Us</a>--}}
    {{--                <ul>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="parallax-block">--}}
    {{--            <div class="parallax-box">--}}
    {{--                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>--}}
    {{--            </div>--}}
    {{--            <div class="parallax-content">--}}
    {{--                <h3>Learn Online Courses</h3>--}}
    {{--                <h3>Only patience & persistence give <span>Good Result 4</span></h3>--}}
    {{--                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>--}}
    {{--                <a href="#" title="Find More About Us">Find More About Us</a>--}}
    {{--                <ul>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>--}}
    {{--                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div><!-- Parallax Section /- -->--}}

    <!-- Event Section -->
        <div class="container event-section">
            <div class="section-padding"></div>
            <div class="section-header-block">
                <div class="section-header">
                    <h3>Upcoming <span>Exams</span></h3>
                    <p>Upcoming Exams to feed your brain
                    <p>
                </div>
                <a href="{{ route('exam-schedule') }}" title="View All">View All</a>
            </div>
            <div class="event-block">
                @foreach($exams as $exam)
                    <div class="event-box">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-5">
                                <img src="{{asset('frontend/user-end/images/event1.jpg')}}" alt="event1" width="260"
                                     height="160"/>
                            </div>
                            <div class="col-md-7 col-sm-6 col-xs-7">
                                <h3><a href="#" title="">{{ $exam->title }}</a></h3>
                                <div class="event-meta">
                                    <span><i aria-hidden="true" class="fa fa-clock-o"></i>{{ $exam->examTimeFrom }} to {{ $exam->examTimeTo }}</span>
                                    <span><i aria-hidden="true" class="fa fa-clock-o"></i>Exam Time : {{ $exam->duration_minutes }} Minutes</span>
                                </div>
                                <div class="event-meta">
                                    <span><i aria-hidden="true" class="fa fa-anchor"></i>Total Mark : {{ $exam->totalMark }}</span>
                                    <span><i aria-hidden="true" class="fa fa-money"></i> Price : {{ $exam->price }} BDT</span>
                                </div>
                                {{--<p>On the other hand, we denounce with righteous indignation and dislike men who are so
                                    beguiled and demoralized by the charms of pleasure of the moment.</p>--}}
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <a href="#" class="readmore" title="Read More">Buy now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="section-padding"></div>
        </div><!-- Event Section /- -->

        <!-- Search Courses -->
        <div class="container-fluid no-padding searchcourses">
            <div class="container">
                <div class="search-content">
                    <div class="searchcourses-block">
                        <h3>Over 3,000+ students trust us world wide. Get free online courses tips, Subscribe us</h3>
                    </div>
                    <div class="course-search-block">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <select class="selectpicker">
                                <option>All Categories</option>
                                <option>Categories 1</option>
                                <option>Categories 2</option>
                                <option>Categories 3</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <select class="selectpicker">
                                <option>Course Level</option>
                                <option>Level 1</option>
                                <option>Level 2</option>
                                <option>Level 3</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6  col-xs-12 search_box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Course Keyword . . . ">
                                <span class="input-group-btn">
								<button class="btn" type="button" title="Search courses">Search courses</button>
							</span>
                            </div>
                        </div>
                    </div>
                    <div class="search-categories">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Over 500 students Enrolled Learn Skills</span>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <p><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span>More than 300+ Online Courses Available</span>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <p><i class="fa fa-tencent-weibo" aria-hidden="true"></i><span>Learn Skills on any Devices anytime</span>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <p><i class="fa fa-user-md"
                                  aria-hidden="true"></i><span>More than 320 Instructors Available</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Search Courses /- -->
    </div>
@endsection
@section('script-lib')

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
