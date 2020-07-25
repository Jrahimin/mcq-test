@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/user-end/css/user_profile.css') }}">
@endpush

@section('main-section')
    <div class="container-fluid">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <section id="content" class="container">
            <!-- Begin .page-heading -->
            <div class="page-heading">
                <div class="media clearfix">
                    <div class="media-left pr30">
                        {{--<a href="#">
                            <img class="media-object mw150" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                        </a>--}}
                        <span class="fa fa-5x fa-user"></span>
                    </div>
                    <div class="media-body va-m">
                        <h2 class="media-heading">{{ $userInfo->name }}
                            <small> - Profile</small>
                        </h2>
                        <p class="lead">{{ $userInfo->address }} | {{ $userInfo->mobile_no }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-star"></i>
              </span>
                            <span class="panel-title"> Basic Info</span>
                        </div>
                        <div class="panel-body pn">
                            <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="fa fa-money text-warning"></span>
                                    </td>
                                    <td>Balance</td>
                                    <td>
                                        <i class="text-info pr10"></i>{{ $userInfo->balance }} BDT
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-money text-primary"></span>
                                    </td>
                                    <td>Total Paid</td>
                                    <td>
                                        <i class="text-danger pr10"></i>{{ $userInfo->totalPaid }} BDT</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-book text-info"></span>
                                    </td>
                                    <td>No of Exam Bought</td>
                                    <td>
                                        <i class="text-info pr10"></i>{{ $userInfo->userTotalExam }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa fa-shopping-bag text-info"></span>
                                    </td>
                                    <td>No of Exam Pack Bought</td>
                                    <td>
                                        <i class="text-info pr10"></i>{{ $userInfo->userTotalExamPack }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
                            <span class="panel-title">Exam Packs</span>
                        </div>
                        <div class="panel-body pb5">

                            <h6>Experience</h6>

                            <h4>Facebook Internship</h4>
                            <p class="text-muted"> University of Missouri, Columbia
                                <br> Student Health Center, June 2010 - 2012
                            </p>

                            <hr class="short br-lighter">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="tab-block">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">Activity</a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">Social</a>
                            </li>
                            <li>
                                <a href="#tab3" data-toggle="tab">Media</a>
                            </li>
                        </ul>
                        <div class="tab-content p30" style="height: 730px;">
                            <div id="tab1" class="tab-pane active">
                                <div class="media">
                                    <a class="pull-left" href="#"> <img class="media-object mn thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                                    <div class="media-body">
                                        <h5 class="media-heading mb20">Simon Rivers Posted
                                            <small> - 3 hours ago</small>
                                        </h5>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="mw140 mr25 mb20">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="mw140 mr25 mb20">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mw140 mb20">
                                        <div class="media-links">
                      <span class="text-light fs12 mr10">
                        <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-share text-primary mr5"></span> Share </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="media mt25">
                                    <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."> </a>
                                    <div class="media-body mb5">
                                        <h5 class="media-heading mbn">Simon Rivers Posted
                                            <small> - 3 hours ago</small>
                                        </h5>
                                        <p> Omg so freaking sweet dude.</p>
                                        <div class="media pb10">
                                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                                            <div class="media-body mb5">
                                                <h5 class="media-heading mbn">Jessica Wong
                                                    <small> - 3 hours ago</small>
                                                </h5>
                                                <p>Omgosh I'm in love</p>
                                            </div>
                                        </div>
                                        <div class="media mtn">
                                            <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                                            <div class="media-body mb5">
                                                <h5 class="media-heading mbn">Jessica Wong
                                                    <small> - 3 hours ago</small>
                                                </h5>
                                                <p>Omgosh I'm in love</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media mt25">
                                    <a class="pull-left" href="#"> <img class="media-object thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                                    <div class="media-body">
                                        <h5 class="media-heading mb20">Simon Rivers Posted
                                            <small> - 3 hours ago</small>
                                        </h5>
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="mw140 mr25 mb20">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mw140 mr25 mb20">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="mw140 mb20">
                                        <div class="media-links">
                      <span class="text-light fs12 mr10">
                        <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-share text-primary mr5"></span> Share </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                                            <span class="text-light fs12 mr10">
                        <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane"></div>
                            <div id="tab3" class="tab-pane"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

