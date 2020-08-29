@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }

        .contactus-form .form-control {
            color: black;
            font-weight: 800;
        }
    </style>
@endpush
@section('main-section')
    <div id="#contact-us">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Contact us</h3>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact us</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid no-padding contactus-section">
            <div class="container">
                <div class="section-padding"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="map animated rotateInDownLeft">
                            <div id="map-canvas-contact" class="map-canvas" data-lat="47.6087581" data-lng="-122.296424"
                                 data-string="2901 Marmora road, Glassgow,  Seattle, WA 98122" data-zoom="10"
                                 style="position: relative; overflow: hidden;">
                                <div
                                    style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                    <div class="gm-style"
                                         style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                        <div tabindex="0"
                                             style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                                            <div
                                                style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                                                <div
                                                    style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                        <div
                                                            style="position: absolute; z-index: 990; transform: matrix(1, 0, 0, 1, -34, -157);">
                                                            <div
                                                                style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 256px; top: 512px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: 512px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -256px; top: 512px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -512px; top: 512px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                            <div
                                                                style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                                <div style="width: 256px; height: 256px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                                <div
                                                    style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                                <div
                                                    style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                    <div
                                                        style="width: 30px; height: 44px; overflow: hidden; position: absolute; left: -15px; top: -44px; z-index: 0;">
                                                        <img alt="" src="images/marker.png" draggable="false"
                                                             style="position: absolute; left: 0px; top: 0px; user-select: none; width: 30px; height: 44px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                    </div>
                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                                        <div
                                                            style="position: absolute; z-index: 990; transform: matrix(1, 0, 0, 1, -34, -157);">
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 512px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 512px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 512px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 512px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 0px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: -256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div>
                                                            <div
                                                                style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                    <div
                                                        style="position: absolute; z-index: 990; transform: matrix(1, 0, 0, 1, -34, -157);">
                                                        <div
                                                            style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i162!3i356!4i256!2m3!1e0!2sm!3i520236684!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=95193"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i162!3i358!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=105520"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -512px; top: 512px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i162!3i359!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=75292"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -256px; top: 512px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i163!3i359!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=29579"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i164!3i358!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=14094"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 256px; top: 512px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i165!3i359!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=69224"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i164!3i356!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=74550"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i163!3i356!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=120263"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 0px; top: 512px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i164!3i359!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=114937"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i165!3i357!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=129680"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i165!3i358!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=99452"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i163!3i357!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=90035"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i162!3i357!4i256!2m3!1e0!2sm!3i520236684!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=64965"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i163!3i358!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=59807"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i165!3i356!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=28837"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div
                                                            style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                                                            <img draggable="false" alt="" role="presentation"
                                                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i10!2i164!3i357!4i256!2m3!1e0!2sm!3i520236696!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyBg0VrLjLvDLSQdS7hw6OfZJmvHhtEV_sE&amp;token=44322"
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gm-style-pbc"
                                                 style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
                                                <p class="gm-style-pbt"></p></div>
                                            <div
                                                style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                                <div
                                                    style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                                                    <div
                                                        style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                                    <div
                                                        style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                                    <div
                                                        style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                                        <div title=""
                                                             style="width: 30px; height: 44px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -15px; top: -44px; z-index: 0;">
                                                            <img alt="" src="images/marker.png" draggable="false"
                                                                 style="position: absolute; left: 0px; top: 0px; user-select: none; width: 30px; height: 44px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                    </div>
                                                    <div
                                                        style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <iframe aria-hidden="true" frameborder="0" tabindex="-1"
                                                style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>
                                        <div
                                            style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                            <a target="_blank" rel="noopener"
                                               href="https://maps.google.com/maps?ll=47.608758,-122.296424&amp;z=10&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3"
                                               title="Open this area in Google Maps (opens a new window)"
                                               style="position: static; overflow: visible; float: none; display: inline;">
                                                <div style="width: 66px; height: 26px; cursor: pointer;"><img alt=""
                                                                                                              src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png"
                                                                                                              draggable="false"
                                                                                                              style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                </div>
                                            </a></div>
                                        <div
                                            style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 135px; top: 200px;">
                                            <div
                                                style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">
                                                Map Data
                                            </div>
                                            <div style="font-size: 13px;">Map data ©2020 Google</div>
                                            <button draggable="false" title="Close" aria-label="Close" type="button"
                                                    class="gm-ui-hover-effect"
                                                    style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;">
                                                <img
                                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                    style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;">
                                            </button>
                                        </div>
                                        <div class="gmnoprint"
                                             style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 121px;">
                                            <div draggable="false" class="gm-style-cc"
                                                 style="user-select: none; height: 14px; line-height: 14px;">
                                                <div
                                                    style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                    <div style="width: 1px;"></div>
                                                    <div
                                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                </div>
                                                <div
                                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                    <a style="text-decoration: none; cursor: pointer; display: none;">Map
                                                        Data</a><span>Map data ©2020 Google</span></div>
                                            </div>
                                        </div>
                                        <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
                                            <div
                                                style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                Map data ©2020 Google
                                            </div>
                                        </div>
                                        <div class="gmnoprint gm-style-cc" draggable="false"
                                             style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div
                                                    style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div
                                                style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html"
                                                   target="_blank" rel="noopener"
                                                   style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms
                                                    of Use</a></div>
                                        </div>
                                        <button draggable="false" title="Toggle fullscreen view"
                                                aria-label="Toggle fullscreen view" type="button"
                                                class="gm-control-active gm-fullscreen-control"
                                                style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; display: none; top: 0px; right: 0px;">
                                            <img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                style="height: 18px; width: 18px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                style="height: 18px; width: 18px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                                style="height: 18px; width: 18px;"></button>
                                        <div draggable="false" class="gm-style-cc"
                                             style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div
                                                    style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div
                                                style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                <a target="_blank" rel="noopener"
                                                   title="Report errors in the road map or imagery to Google"
                                                   href="https://www.google.com/maps/@47.6087581,-122.296424,10z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                                   style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report
                                                    a map error</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;">
                                    <div><img alt=""
                                              src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg"
                                              draggable="false"
                                              style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;">
                                    </div>
                                    <div style="line-height: 20px; margin: 15px 0px;"><span
                                            style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span>
                                    </div>
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="line-height: 16px; vertical-align: middle;"><a
                                                    href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors"
                                                    target="_blank" rel="noopener"
                                                    style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this
                                                    website?</a></td>
                                            <td style="text-align: right;">
                                                <button class="dismissButton">OK</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="getintouch animated rotateInUpLeft">
                            <h3>Get in touch </h3>
                            <p>Please, Provide your feedback. Let us know your expericence. If you have any query or suggestion feel free to put it here.</p>
                            <form class="contactus-form" id="contact-form" method="post" action="{{route('feedback')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" required="" placeholder="Name" id="input_name"
                                                   class="form-control" name="name"
                                                   value="{{old('name')??auth()->user()?auth()->user()->name:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Mobile No." id="mobile_no"
                                                   class="form-control"
                                                   name="mobile_no"
                                                   value="{{old('mobile_no')??auth()->user()?auth()->user()->mobile_no:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" required="" placeholder="Email" id="input_email"
                                                   class="form-control" name="email"
                                                   value="{{old('email')??auth()->user()?auth()->user()->email:''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" required="" placeholder="Feedback Title" id="title"
                                                   class="form-control" name="title"
                                                   value="{{old('title')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <textarea placeholder="Message" id="message" class="form-control"
                                                      name="message" rows="5" required>{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="submit" name="post" title="Send" id="btn_submit"
                                                   value="Submit">
                                        </div>
                                    </div>
                                    <div class="alert-msg" id="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-padding"></div>
            </div>
            <div class="contactdetail-block animated slideInLeft">
                <div class="container">
                    <div class="col-md-3 col-sm-3 col-xs-6 contactinfo-box">
                        <span class="icon icon-Pointer"></span>
                        <h3>Where We Are?</h3>
                        <p>2901 Marmora road, Glassgow, Seattle, WA 98122</p>
                        <a href="#" title="MORE ABOUT US ">MORE ABOUT US </a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 contactinfo-box">
                        <span class="icon icon-Phone2"></span>
                        <h3>Give us a Call</h3>
                        <p>Consectetuer ux adipis cing elit sed dolor sit amet.</p>
                        <a href="tel:+4301234321243" title="+4301234321243">+43 (0) 123 432 12 43</a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 contactinfo-box">
                        <span class="icon icon-Printer"></span>
                        <h3>Vist Our Office</h3>
                        <p>Consectetuer ux adipis cing elit sed dolor sit amet.</p>
                        <a href="#" title="Get Direction">Get Direction</a>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 contactinfo-box">
                        <span class="icon icon-Imbox"></span>
                        <h3>Drop us a Line</h3>
                        <p>Consectetuer ux adipis cing elit sed dolor sit amet.</p>
                        <a href="mailto:Support@EduMax.Com" title="Support@EduMax.Com">Support@EduMax.Com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#contact-us',
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
