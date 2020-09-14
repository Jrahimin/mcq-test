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
                @foreach($packages as $examPack)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="welcome-box animated fadeInRight">
                            <img src="{{asset('frontend/user-end/images/welcome6.jpg')}}" alt="welcome1" width="370"
                                 height="440">
                            <div class="welcome-title">
                                <h3>{{$examPack->title}}</h3>
                            </div>
                            <div class="welcome-content">
                                @if($examPack->dateForm && $examPack->dateTo)
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        <strong>{{ $examPack->dateForm }} to {{ $examPack->dateTo }}</strong>
                                    </span>
                                @endif
                                @if($examPack->details)
                                    <p>{{$examPack->details}}</p>
                                @endif
                                <ul class="course-detail">
                                    @if($examPack->price)
                                        <li>
                                            <span><i class="fa fa-money"
                                                     aria-hidden="true"></i> Price: <strong>{{$examPack->price}}</strong> BDT</span>
                                        </li>
                                    @endif
                                    <span style="color: white;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Package Details</span><br>
                                    @if($examPack->mini_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->mini_test_count}} Mini Test</span>
                                        </li>
                                    @endif
                                    @if($examPack->mock_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->mock_test_count}} Mock Test</span>
                                        </li>
                                    @endif
                                    @if($examPack->model_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->model_test_count}} Model Test</span>
                                        </li>
                                    @endif
                                    {{--                                    <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span>--}}
                                    {{--                                    </li>--}}
                                </ul>
                                {{--                                <ul class="course-rating">--}}
                                {{--                                    <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a>--}}
                                {{--                                    </li>--}}
                                {{--                                </ul>--}}
                                <form action="{{route('buy-package')}}" method="POST" style="display: inline-block">
                                    @csrf
                                    <input type="text" hidden name="exam_pack_id" value="{{$examPack->id}}">
                                    <button class="btn btn-warning" type="submit">Buy Now</button>
                                </form>
                                <div style="display: inline-block"  class="d-inline-block m-0 p-0">
                                    <a class="btn btn-info" href="{{route('exam-schedule')}}?exam_pack_id={{$examPack->id}}">
                                        Exam List
                                    </a></div>
                                <div class="mb-3"></div>
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
                        @include('frontend.exam-schedule.exam-view')
                    </div>
                @endforeach
            </div>
            <div class="section-padding"></div>
        </div><!-- Event Section /- -->

        <!-- Search Courses -->
        <div class="container-fluid no-padding searchcourses">
            <div class="container">
                <form action="{{ route('exam-schedule') }}" method="GET">
                    <div class="search-content">
                        <div class="searchcourses-block">
                            <h3>Explore our Exam and Model Tests. Get prepared to achieve your future goal</h3>
                        </div>
                        <div class="course-search-block">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <select name="category_id" class="selectpicker">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <select name="type" class="selectpicker">
                                    <option value="">Select Exam Type</option>
                                    <option value="{{ \App\Enums\ExamTypes::MODELTEST }}">Model Test</option>
                                    <option value="{{ \App\Enums\ExamTypes::MOCKTEST }}">Mini Test</option>
                                    <option value="{{ \App\Enums\ExamTypes::MINITEST }}">Mock Test</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6  col-xs-12 search_box">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Course Keyword . . . ">
                                    <span class="input-group-btn">
								<button class="btn" type="submit" title="Search Exam" formtarget="_blank">Search Exam Tests</button>
							</span>
                                </div>
                            </div>
                        </div>
                        <div class="search-categories">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <p><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Students are getting Enrolled and Preparing</span></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <p><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span>Exclusive Online Tests Available</span></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <p><i class="fa fa-tencent-weibo" aria-hidden="true"></i><span>Participate through any Devices anytime</span></p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <p><i class="fa fa-user-md" aria-hidden="true"></i><span>Instructors are Available to provide guidance</span></p>
                            </div>
                        </div>
                    </div>
                </form>
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
