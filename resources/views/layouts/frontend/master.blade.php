<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->

<!-- Mirrored from premiumlayers.net/demo/html/edumax/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 16:25:14 GMT -->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home -Knowledge</title>
    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/user-end/images/favicon.ico')}}"/>

    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/user-end/images/apple-touch-icon-114x114-precomposed.png')}}">
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/user-end/images/apple-touch-icon-72x72-precomposed.png')}}">
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/user-end/images/apple-touch-icon-57x57-precomposed.png')}}">

    <!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/libraries/lib.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/libraries/Stroke-Gap-Icon/stroke-gap-icon.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css0dd4.css?family=Roboto:400,900,300,300italic,500,700" rel='stylesheet' type="text/css">
    <link href="https://fonts.googleapis.com/css83d9.css?family=Roboto+Slab:400,700" rel='stylesheet' type="text/css">
    <link href="https://fonts.googleapis.com/css591d.css?family=Niconne" rel="stylesheet" type="text/css">


    <!-- Custom - Common CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/navigation-menu.css')}}">

    <!-- Custom - Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/user-end/css/shortcode.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('frontend/user-end/js/html5/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
<!-- LOADER -->
<div id="site-loader" class="load-complete">
    <div class="loader">
        <div class="loader-inner ball-clip-rotate">
            <div></div>
        </div>
    </div>
</div><!-- Loader /- -->
@include('layouts.frontend.header')
<!-- PhotoSlider Section -->
<div class="photoslider-section container-fluid no-padding">
    <div id="home-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('frontend/user-end/images/photoslider1.jpg')}}" alt="photoslider1" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
                            <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('frontend/user-end/images/photoslider2.jpg')}}" alt="photoslider2" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To Our<span>University</span></h3>
                            <p data-animation="animated bounceInRight">We belive nothing is more important than education. The best learning institution</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!-- PhotoSlider Section /- -->
<!-- Welcome Section -->
<div class="container welcome-section">
    <div class="section-padding"></div>
    <div class="section-header">
        <h3>Popular <span>Courses</span></h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="welcome-box">
                <img src="{{asset('frontend/user-end/images/welcome1.jpg')}}" alt="welcome1" width="370" height="440"/>
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
            <div class="welcome-box">
                <img src="{{asset('frontend/user-end/images/welcome2.jpg')}}" alt="welcome2" width="370" height="440"/>
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
            <div class="welcome-box">
                <img src="{{asset('frontend/user-end/images/welcome3.jpg')}}" alt="welcome3" width="370" height="440"/>
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
    </div>
    <div class="section-padding"></div>
</div><!-- Welcome Section /- -->

<!-- Parallax Section -->
<div class="container-fluid no-padding parallax-section">
    <div class="parallax-carousel">
        <div class="parallax-block">
            <div class="parallax-box">
                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>
            </div>
            <div class="parallax-content">
                <h3>Learn Online Courses</h3>
                <h3>Only patience & persistence give <span>Good Result</span></h3>
                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                <a href="#" title="Find More About Us">Find More About Us</a>
                <ul>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>
                </ul>
            </div>
        </div>
        <div class="parallax-block">
            <div class="parallax-box">
                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>
            </div>
            <div class="parallax-content">
                <h3>Learn Online</h3>
                <h3>Only patience & persistence give <span>Good Result 2</span></h3>
                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                <a href="#" title="Find More About Us">Find More About Us</a>
                <ul>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>
                </ul>
            </div>
        </div>
        <div class="parallax-block">
            <div class="parallax-box">
                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>
            </div>
            <div class="parallax-content">
                <h3>Learn Courses</h3>
                <h3>Only patience & persistence give <span>Good Result 3</span></h3>
                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                <a href="#" title="Find More About Us">Find More About Us</a>
                <ul>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>
                </ul>
            </div>
        </div>
        <div class="parallax-block">
            <div class="parallax-box">
                <img src="{{asset('frontend/user-end/images/parallax-bg.jpg')}}" alt="parallax" width="1920" height="600"/>
            </div>
            <div class="parallax-content">
                <h3>Learn Online Courses</h3>
                <h3>Only patience & persistence give <span>Good Result 4</span></h3>
                <p>World Largest books and library center is here where you can study the latest trends of the education. Curabitur rutrum faucibus elitconvallis diam mattis eget. Nullam vulputate nibh at nisi consectetur.</p>
                <a href="#" title="Find More About Us">Find More About Us</a>
                <ul>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb1.jpg')}}" alt="parallax-thumb1" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb2.jpg')}}" alt="parallax-thumb2" width="100" height="80"/></li>
                    <li><img src="{{asset('frontend/user-end/images/parallax-thumb3.jpg')}}" alt="parallax-thumb3" width="100" height="80"/></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- Parallax Section /- -->

<!-- Event Section -->
<div class="container event-section">
    <div class="section-padding"></div>
    <div class="section-header-block">
        <div class="section-header">
            <h3>Our <span>Events</span></h3>
            <p>Upcoming Education Events to feed your brain<p>
        </div>
        <a href="events-page.html" title="View All">View All</a>
    </div>
    <div class="event-block">
        <div class="event-box">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-5">
                    <img src="{{asset('frontend/user-end/images/event1.jpg')}}" alt="event1" width="260" height="160"/>
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
        <div class="event-box">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-5">
                    <img src="{{asset('frontend/user-end/images/event2.jpg')}}" alt="event2" width="260" height="160"/>
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
        <div class="event-box">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-5">
                    <img src="{{asset('frontend/user-end/images/event3.jpg')}}" alt="event3" width="260" height="160"/>
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
                    <p><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Over 500 students Enrolled Learn Skills</span></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <p><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span>More than 300+ Online Courses Available</span></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <p><i class="fa fa-tencent-weibo" aria-hidden="true"></i><span>Learn Skills on any Devices anytime</span></p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <p><i class="fa fa-user-md" aria-hidden="true"></i><span>More than 320 Instructors Available</span></p>
                </div>
            </div>
        </div>
    </div>
</div><!-- Search Courses /- -->

<!-- Video Testimonial Section -->
<div class="container-fluid no-padding video-testimonial-section">
    <div class="container">
        <div class="section-padding"></div>
        <div class="section-header">
            <h3>Our <span>Education Events</span></h3>
            <p>Achieving the desired success requires patience and persistence your goals need time</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="video-block video-block-lg">
                    <a title="Paly Video" class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fa fa-play" aria-hidden="true"></i></a>
                    <img src="{{asset('frontend/user-end/images/video-poster-1.jpg')}}" width="570" height="400" alt="Video Poster-1"/>
                    <div class="video-content">
                        <h3>Your Career Starts Here</h3>
                        <p>Achieving the desired success requires patience and persistence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="testimonial-block">
                    <div id="testimonial-slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonial-slider" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="testimonial-box">
                                    <div class="testimonial-content">
                                        <p>Credibly innovate granular internal or organic sources whereas high standards in web-readiness fully researched growth.</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="{{asset('frontend/user-end/images/testimonial-thumb-1.jpg')}}" alt="testimonial-thumb-1" width="96" height="96"/>
                                        <p>Darly Dixon, <span>Designing Staff</span></p>
                                    </div>
                                </div>
                                <div class="testimonial-box">
                                    <div class="testimonial-content">
                                        <p>Credibly innovate granular internal or organic sources whereas high standards in web-readiness fully researched growth.</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="{{asset('frontend/user-end/images/testimonial-thumb-2.jpg')}}" alt="testimonial-thumb-2" width="96" height="96"/>
                                        <p>Josh Austin,<span>Project Manager</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-box">
                                    <div class="testimonial-content">
                                        <p>Credibly innovate granular internal or organic sources whereas high standards in web-readiness fully researched growth.</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="{{asset('frontend/user-end/images/testimonial-thumb-1.jpg')}}" alt="testimonial-thumb-1" width="96" height="96"/>
                                        <p>Darly Dixon <span>Designing Staff</span></p>
                                    </div>
                                </div>
                                <div class="testimonial-box">
                                    <div class="testimonial-content">
                                        <p>Credibly innovate granular internal or organic sources whereas high standards in web-readiness fully researched growth.</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="{{asset('frontend/user-end/images/testimonial-thumb-2.jpg')}}" alt="testimonial-thumb-2" width="96" height="96"/>
                                        <p>Josh Austin ,<span>Project Manager</span></p>
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
</div><!-- Video Testimonial Section /- -->

<!-- LatestBlog Section -->
<div class="container-fulid no-padding latestblog-section">
    <div class="section-padding"></div>
    <div class="container">
        <div class="section-header">
            <h3>Latest <span> Blog Post</span></h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <article class="type-post">
                    <div class="entry-cover">
                        <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="{{asset('frontend/user-end/images/latestblog1.jpg')}}"></a>
                    </div>
                    <div class="entry-block">
                        <div class="entry-contentblock">
                            <div class="entry-meta">
                                <span class="postdate">25th May 2016</span>
                                <span class="postby">Posted by <a href="#" title="Methov jos">Methov jos</a></span>
                            </div>
                            <div class="entry-block">
                                <div class="entry-title">
                                    <a title="Doloremque laudantium totam..." href="blogpost-page.html"><h3>Doloremque laudantium totam...</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-ic"><span class="icon icon-Pencil"></span></div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <article class="type-post">
                    <div class="entry-cover">
                        <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="{{asset('frontend/user-end/images/latestblog2.jpg')}}"></a>
                    </div>
                    <div class="entry-block">
                        <div class="entry-contentblock">
                            <div class="entry-meta">
                                <span class="postdate">25th May 2016</span>
                                <span class="postby">Posted by <a href="#" title="Methov jos">Jennu Doe</a></span>
                            </div>
                            <div class="entry-block">
                                <div class="entry-title">
                                    <a title="Minim veniam quis nostrud..." href="blogpost-page.html"><h3>Minim veniam quis nostrud...</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-ic"><span class="icon icon-MusicMixer"></span></div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">
                <article class="type-post">
                    <div class="entry-cover">
                        <a title="Cover" href="blogpost-page.html"><img width="363" height="261" alt="latestnews" src="{{asset('frontend/user-end/images/latestblog3.jpg')}}"></a>
                    </div>
                    <div class="entry-block">
                        <div class="entry-contentblock">
                            <div class="entry-meta">
                                <span class="postdate">25th May 2016</span>
                                <span class="postby">Posted by <a href="#" title="Methov jos">Steave Smith</a></span>
                            </div>
                            <div class="entry-block">
                                <div class="entry-title">
                                    <a title="Perspiciatis unde omnis iste..." href="blogpost-page.html"><h3>Perspiciatis unde omnis iste...</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-ic"><span class="icon icon-Starship"></span></div>
                    </div>
                </article>
            </div>
        </div>
        <div class="post-viewall">
            <a href="blog-page.html" title="View All post">View All post</a>
        </div>
    </div>
    <div class="section-padding"></div>
</div><!-- LatestBlog Section -->

@include('layouts.frontend.footer')

<!-- JQuery v1.11.3 -->
<script src="{{asset('frontend/user-end/js/jquery.min.js')}}"></script>
<!--script src="js/jquery.knob.js"></script-->

<!-- Library - Js -->
<script src="{{asset('frontend/user-end/libraries/lib.js')}}"></script><!-- Bootstrap JS File v3.3.5 -->
<!-- Library - Google Map API -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- Library - Theme JS -->
<script src="{{asset('frontend/user-end/js/functions.js')}}"></script>
<!-- AdminLTE -->
<script src="{{secure_asset('dist/js/adminlte.js')}}"></script>
<script src="{{secure_asset('js/vuejs/vuejs-dev.js')}}"></script>
<script src="{{secure_asset('js/axios/axios.min.js')}}"></script>
<script src="{{secure_asset('js/vuejs/vee-validation.js')}}"></script>
<script src="{{secure_asset('js/sweet-alert.min.js')}}"></script>
<script>
    VeeValidate.extend('required', {
        validate(value, args) {
            return {
                required: true,
                valid: ['', null, undefined].indexOf(value) === -1
            };
        },
        computesRequired: true
    });
    // Vue.component('ValidationObserver', VeeValidate.ValidationObserver);
    Vue.component('validation-observer', VeeValidate.ValidationObserver);
    // Register the component globally.
    Vue.component('validation-provider', VeeValidate.ValidationProvider);
    window.$ = $;

    window.responseProcess = (response, alert, callback) => {
        {
            if (response.status == 'success' || response.code == 200) {
                if (alert)
                    Swal.fire({
                        icon: 'success',
                        title: 'Yahoo..',
                        text: response.message || 'Form stored successfully',
                    });
            } else {
                if (alert)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong! please try again later',
                    });
            }
            callback(response.data, response.code);
        }
    };
    window.ajaxCall = (api, data, method, callback, alert = false, base_url = '') => {
        (async () => {
            await axios[method](base_url + api, {
                ...data
            })
                .then(response => this.responseProcess(response.data, alert, (data, code) => callback(data, code)))
                .catch(function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! please try again later',
                    });
                });
        })();

    }
</script>
<!-- DataTables -->
<script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{secure_asset('plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{secure_asset('plugins/sweetalert2/sweetalert2.js')}}"></script>
@yield('script-lib')
@stack('custom-js')
</body>

<!-- Mirrored from premiumlayers.net/demo/html/edumax/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 16:26:04 GMT -->
</html>
