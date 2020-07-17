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
    <div id="#packages">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Packages</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Packages</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container welcome-section welcome2">
            <div class="section-padding"></div>
            <div class="search-result">
                <span>Showing 1-9 of total 18 courses</span>
                <div class="input-group col-md-2">
                    <input type="text" class="form-control" placeholder="Search courses">
                    <span class="input-group-btn">
					<button class="btn" type="button"><i class="fa fa-search"></i></button>
				  </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome1.jpg')}}" alt="welcome1" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Political science</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome2.jpg')}}" alt="welcome2" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Micro Biology</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome3.jpg')}}" alt="welcome3" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Computer Science</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome4.jpg')}}" alt="welcome4" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Global Economics</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome5.jpg')}}" alt="welcome5" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Advance Mathematics</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome6.jpg')}}" alt="welcome6" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Literature</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome7.jpg')}}" alt="welcome7" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Photography Courses</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome8.jpg')}}" alt="welcome8" width="370" height="440">
                        <div class="welcome-title">
                            <h3>History Of Art</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="welcome-box animated fadeInRight">
                        <img src="{{asset('frontend/user-end/images/welcome9.jpg')}}" alt="welcome9" width="370" height="440">
                        <div class="welcome-title">
                            <h3>Tourism Courses</h3>
                        </div>
                        <div class="welcome-content">
                            <span>(Peter Parker)</span>
                            <p>Then one day he was shootinsome  When the against him bubblin</p>
                            <ul class="course-detail">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>Course duration : <span>3 Yr</span></li>
                                <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>Degree Level : <span>Master’s Degree</span></li>
                            </ul>
                            <ul class="course-rating">
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="coursesdetails-page.html" title="Apply now">Apply now</a>
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
