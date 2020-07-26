@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/user-end/css/user_profile.css') }}">
@endpush

@section('main-section')
    <div class="container-fluid" id="user_profile">
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
                                        <i class="text-danger pr10"></i>{{ $userInfo->totalPaid }} BDT
                                    </td>
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
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Participated Exams</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <table class="table">
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Score</th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr v-for="exam of user_exam_list">
                                                <th>@{{ exam.title }}</th>
                                                <th>@{{ exam.exam_schedule }}</th>
                                                <th>@{{ exam.examTimeFrom+' - '+exam.examTimeTo }}</th>
                                                <th>@{{ exam.userScore+'/'+exam.totalMark }}</th>
                                                <th>@{{ exam.position+'/'+exam.totalExminee }}</th>
                                                <th>@{{ exam.typeName }}</th>
                                                <th><a class="btn btn-info btn-sm" :href="'/'+exam.id"><i class="fa fa-eye"></i> Preview</a></th>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Participated Exams</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <table class="table">
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Score</th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr v-for="exam of user_exam_list">
                                                <th>@{{ exam.title }}</th>
                                                <th>@{{ exam.exam_schedule }}</th>
                                                <th>@{{ exam.examTimeFrom+' - '+exam.examTimeTo }}</th>
                                                <th>@{{ exam.userScore+'/'+exam.totalMark }}</th>
                                                <th>@{{ exam.position+'/'+exam.totalExminee }}</th>
                                                <th>@{{ exam.typeName }}</th>
                                                <th><a class="btn btn-info btn-sm" :href="'/'+exam.id"><i class="fa fa-eye"></i> Preview</a></th>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div id="tab2" class="tab-pane"></div>
                                <div id="tab3" class="tab-pane"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom-js')
    <script>
        new Vue({
            el: '#user_profile',
            data: {
                user_exam_list: [],
            },
            methods: {
                ajaxCall: window.ajaxCall,
                responseProcess: window.responseProcess,
            },
            mounted() {
                this.ajaxCall('{{ route('user-exam-list') }}', {is_participated: true}, 'post', (data, code) => {
                    if (code === 200) {
                        this.user_exam_list = data;
                        console.log(this.user_exam_list);
                    }
                }, false);
            }
        })
    </script>
@endpush
