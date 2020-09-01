<!-- Footer Main -->
<footer class="footer-main container-fluid no-padding">
    <!-- Container -->
    <div class="container">
        <div class="footer-bottom col-md-12 col-sm-12 no-padding">
            <div class="copyright no-padding">
                <span>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }}. All Rights Reserved by {{ config('app.name') }}.</span>
            </div>
            <nav class="navbar ow-navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar2" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a title="Home" href="{{route('user-home')}}">Home</a></li>
                        <li><a title="Packages" href="{{route('packages')}}">Packages</a></li>
                        <li><a title="Event" href="{{route('exam-schedule')}}">Exam Schedule</a></li>
                        <li><a title="Contact" href="{{route('about')}}">About</a></li>
                        <li><a title="Contact" href="{{route('contact-us')}}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- Footer Bottom /- -->
    </div><!-- Container /- -->
</footer><!-- Footer /- -->
