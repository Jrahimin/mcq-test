<!-- PhotoSlider Section -->
<div class="photoslider-section container-fluid no-padding">
    <div id="home-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('frontend/user-end/images/ph-01.jpg')}}" alt="photoslider1" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-right no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To <span>{{ config('app.name') }}</span></h3>
                            <p data-animation="animated bounceInRight">We believe nothing is more important than education. Prepare yourself</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('frontend/user-end/images/ph-02.jpg')}}" alt="photoslider2" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To <span>{{ config('app.name') }}</span></h3>
                            <p data-animation="animated bounceInRight">We believe nothing is more important than education. Prepare yourself</p>
                            <a href="#" title="Learn More" data-animation="animated zoomInUp">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('frontend/user-end/images/ph-03.jpg')}}" alt="photoslider3" width="1920" height="801"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-8 col-xs-8 ow-pull-left no-padding">
                            <h4 data-animation="animated bounceInLeft">Welcome</h4>
                            <h3 data-animation="animated fadeInDown">To <span>{{ config('app.name') }}</span></h3>
                            <p data-animation="animated bounceInRight">We believe nothing is more important than education. Prepare yourself</p>
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
</div>
<!-- PhotoSlider Section /- -->
