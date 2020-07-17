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
            <h3>Political Science</h3>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Courses Details</li>
            </ol>
        </div>
    </div>
</div>
<div class="container coursesdetail-section">
    <div class="section-padding"></div>
    <div class="row">
        <div class="col-md-9 col-sm-8 event-contentarea animated fadeInLeft">
            <div class="coursesdetail-block">
                <img src="images/event-coursesdetail.jpg" alt="event-coursesdetail" width="860" height="500">
                <div class="course-description">
                    <h3 class="course-title">Courses Description</h3>
                    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti.Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit.</p>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga.</p>
                </div>
                <div class="courses-summary">
                    <h3 class="course-title">Courses summary</h3>
                    <ul>
                        <li><a href="#" title="Over 94 lectures and 6 hours">Over 94 lectures and 6 hours</a></li>
                        <li><a href="#" title="Educated Staff">Educated Staff</a></li>
                        <li><a href="#" title="To teach real programming skills">To teach real programming skills</a></li>
                        <li><a href="#" title="Timesheets">Timesheets</a></li>
                        <li><a href="#" title="Build a solid understanding">Build a solid understanding</a></li>
                        <li><a href="#" title="Video Lessons">Video Lessons</a></li>
                    </ul>
                </div>
                <div class="courses-curriculum">
                    <h3 class="course-title">Courses curriculum</h3>
                    <div class="courses-sections-block">
                        <h3>Section 1: <span>Introduction</span></h3>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 1.1</span>
                            <span class="lecture-title">Introduction to Software Training</span>
                            <span class="lecture-time">00:40:00</span>
                        </div>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 1.2</span>
                            <span class="lecture-title">Software Training</span>
                            <span class="lecture-tag"><a href="#">Free</a></span>
                            <span class="lecture-time">00:50:00</span>
                        </div>
                    </div>
                    <div class="courses-sections-block">
                        <h3>Section 2: <span>Reference Material, Moodboards and Mind Mapping</span></h3>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 2.1</span>
                            <span class="lecture-title">Advanced Database Development</span>
                            <span class="lecture-time">00:40:00</span>
                        </div>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 2.2</span>
                            <span class="lecture-title">Multi Threading in Softwares</span>
                            <span class="lecture-tag"><a href="#">Free</a></span>
                            <span class="lecture-time">00:50:00</span>
                        </div>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 2.3</span>
                            <span class="lecture-title">Creating Configurable Shapes Using Minxins</span>
                            <span class="lecture-time">00:40:00</span>
                        </div>
                        <div class="courses-lecture-box">
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <span class="lecture-no">Lecture 2.4</span>
                            <span class="lecture-title">@import and Parent Reference</span>
                            <span class="lecture-tag"><a href="#">Free</a></span>
                            <span class="lecture-time">00:50:00</span>
                        </div>
                    </div>
                </div>
                <div class="courses-review">
                    <h3 class="course-title">Courses Review</h3>
                    <div class="reviewbox">
                        <h3>Average Rating</h3>
                        <div class="average-review">
                            <h2>4.8</h2>
                            <ul>
                                <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
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
            <nav class="ow-pagination">
                <ul class="pagination">
                    <li><span class="arrow_left" aria-hidden="true"></span><a href="#" title="Political Science">Political Science</a></li>
                    <li><a href="#" title="Micro Biology">Micro Biology</a><span class="arrow_right" aria-hidden="true"></span></li>
                </ul>
            </nav>
        </div>
        <div class="col-md-3 col-sm-4 event-sidebar animated fadeInRight">
            <div class="courses-features">
                <h3>Improve Your</h3><h3>CSS Workflow with SASS</h3>
                <ul>
                    <li><a href="#" title="1 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="2 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="3 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="4 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="5 Star"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                </ul>
                <span>( 0  Review )</span>
                <div class="featuresbox"><img src="images/codepen-ic.png" alt="codepen-ic" width="22" height="22"><h3>Course Code : </h3><span> ICA70112</span></div>
                <div class="featuresbox"><img src="images/dolar-ic.png" alt="dolar-ic" width="27" height="27"><h3>Price : </h3><span> Free</span></div>
                <div class="featuresbox"><img src="images/clock-ic.png" alt="clock-ic" width="24" height="24"><h3>Duration : </h3><span> 30 days</span></div>
                <div class="featuresbox"><img src="images/cup-ic.png" alt="cup-ic" width="24" height="23"><h3>Lectures : </h3><span> 10</span></div>
                <div class="featuresbox"><img src="images/user-ic.png" alt="user-ic" width="22" height="22"><h3>Students : </h3><span> 50</span></div>
                <div class="featuresbox"><img src="images/cap-ic.png" alt="cap-ic" width="24" height="20"><h3>Certificate of Completion</h3></div>
            </div>
            <div class="courses-staff">
                <img src="images/staff.jpg" alt="staff" width="275" height="288">
                <h3>Charlie Brown</h3>
                <span>Web Designer</span>
                <p>My name is Ruth. I grew up and studied in…</p>
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
