@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/user-end/css/user_profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chart.js/Chart.min.css') }}">
    <link rel="stylesheet" href="{{secure_asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
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
{{--                    <div class="panel">--}}
{{--                        <div class="panel-heading">--}}
{{--                              <span class="panel-icon">--}}
{{--                                <i class="fa fa-pencil"></i>--}}
{{--                              </span>--}}
{{--                            <span class="panel-title">Exam Packs</span>--}}
{{--                        </div>--}}
{{--                        <div class="panel-body pb5">--}}

{{--                            <h6>Experience</h6>--}}

{{--                            <h4>Facebook Internship</h4>--}}
{{--                            <p class="text-muted"> University of Missouri, Columbia--}}
{{--                                <br> Student Health Center, June 2010 - 2012--}}
{{--                            </p>--}}

{{--                            <hr class="short br-lighter">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-8">
                    <div class="tab-block">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li>
                                <a href="#up-coming-exam" data-toggle="tab">Exams & Pack</a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="#tab3" data-toggle="tab">Media</a>--}}
{{--                            </li>--}}
                        </ul>
                        <div class="tab-content p30" style="height: 730px;">
                            <div id="activity" class="tab-pane active">
                                <div class="panel panel-primary">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">My Progress (exam score)</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <canvas class="chart chartjs-render-monitor" id="main-chart" height="300"
                                                width="1549" style="display: block;"></canvas>
                                    </div>

                                </div>
                                <div class="panel panel-primary">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Participated Exams</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <table class="table table-bordered table-striped" id="participated_exam_table">
                                            <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Score</th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="exam of user_exam_list">
                                                <th>@{{ exam.title }}</th>
                                                <th>@{{ exam.exam_schedule }}</th>
                                                <th>@{{ exam.examTimeFrom+' - '+exam.examTimeTo }}</th>
                                                <th>@{{ exam.userScore+'/'+exam.totalMark }}</th>
                                                <th>@{{ exam.position+'/'+exam.totalExminee }}</th>
                                                <th>@{{ exam.typeName }}</th>
                                                <th>
                                                    <div class="btn-group">
                                                        <a class="btn btn-info btn-sm" :href="'/'+exam.id"><i class="fa fa-eye"></i> Preview</a>
                                                        <a class="btn btn-info btn-sm" :href="exam_rank_route+'?exam_id='+exam.id"><i class="fa fa-list"></i> Rank List</a>
                                                    </div>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div id="up-coming-exam" class="tab-pane">
                                <div class="panel panel-primary">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Upcoming Exams</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <table class="table table-bordered table-striped" id="upcoming-exam-table">
                                            <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Date</th>
                                                <th>Duration</th>
                                                <th>Type</th>
                                                <th>Price (BDT)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="exam of user_up_coming_exam_list">
                                                <th>@{{ exam.title }}</th>
                                                <th>@{{ exam.exam_schedule }}</th>
                                                <th>@{{ exam.examTimeFrom+' - '+exam.examTimeTo }}</th>
                                                <th>@{{ exam.typeName }}</th>
                                                <th>@{{ exam.price }}</th>
                                            </tr>
                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>

                                </div>
                                <div class="panel panel-primary">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Packages</div>
                                    <div class="panel-body">
                                        <!-- Table -->
                                        <table class="table table-bordered table-striped" id="packages-table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Valid From</th>
                                                <th>Valid Till</th>
                                                <th>Mock Test</th>
                                                <th>Model Test</th>
                                                <th>Mini Test</th>
                                                <th>Price (BDT)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="exam of user_exam_packages">
                                                <th>@{{ exam.title }}</th>
                                                <th>@{{ exam.dateFrom }}</th>
                                                <th>@{{ exam.dateTo }}</th>
                                                <th>@{{ exam.mock_test_count }}</th>
                                                <th>@{{ exam.model_test_count }}</th>
                                                <th>@{{ exam.mini_test_count }}</th>
                                                <th>@{{ exam.price }}</th>
                                            </tr>
                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
{{--                            <div id="tab3" class="tab-pane"></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script-lib')
    <script src="{{secure_asset('plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{secure_asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{secure_asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection
@push('custom-js')
    <script>
        new Vue({
            el: '#user_profile',
            data: {
                user_exam_list: [],
                user_up_coming_exam_list: [],
                user_exam_packages: [],
                exam_rank_route : '{{ route('exam-ranking') }}'
            },
            methods: {
                ajaxCall: window.ajaxCall,
                responseProcess: window.responseProcess,
            },
            mounted() {
                this.ajaxCall('{{ route('user-pack-list') }}', {}, 'post', (data, code) => {
                    if (code === 200) {
                        this.user_exam_packages = data;
                        setTimeout(() => {
                            $("#packages-table").DataTable({
                                processing: true,
                                pagingType: "full_numbers",
                                pageLength: 5,
                                lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
                            });
                        }, 1000);
                    }
                }, false);
                this.ajaxCall('{{ route('user-exam-list') }}', {is_participated: true}, 'post', (data, code) => {
                    if (code === 200) {
                        this.user_exam_list = data;
                        setTimeout(() => {
                            $("#participated_exam_table").DataTable({
                                processing: true,
                                pagingType: "full_numbers",
                                pageLength: 5,
                                lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
                            });
                        }, 1000);
                    }
                }, false);
                this.ajaxCall('{{ route('user-exam-list') }}', {}, 'post', (data, code) => {
                    if (code === 200) {
                        this.user_up_coming_exam_list = data || [];
                        setTimeout(() => {
                            $("#upcoming-exam-table").DataTable({
                                processing: true,
                                pagingType: "full_numbers",
                                pageLength: 5,
                                lengthMenu: [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
                            });
                        }, 1000);
                    }
                }, false);
                this.ajaxCall('{{ route('user-score-chart') }}', {}, 'post', (data, code) => {
                    if (code === 200) {
                        // Sales graph chart
                        var salesGraphChartCanvas = $('#main-chart').get(0).getContext('2d');
                        //$('#revenue-chart').get(0).getContext('2d');

                        var salesGraphChartData = {
                            labels: data.examTitles || [],
                            datasets: [
                                {
                                    label: 'Score',
                                    fill: true,
                                    borderWidth: 1,
                                    // lineTension: 0,
                                    // spanGaps: true,
                                    borderColor: '#e5d0d0',
                                    // pointRadius: 3,
                                    // pointHoverRadius: 7,
                                    // pointColor: '#efefef',
                                    // pointBackgroundColor: ['#dc4c4c', '#1d4aad'],
                                    backgroundColor: data.colors || [],
                                    data: data.scores || []
                                }
                            ]
                        }

                        var salesGraphChartOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        fontColor: '#74abef',
                                        beginAtZero: true,
                                        precision: 0
                                    },
                                    gridLines: {
                                        display: false,
                                        color: 'rgba(180,223,251,0.77)',
                                        drawBorder: true,
                                    },
                                }]
                            }
                        }

                        // This will get the first returned node in the jQuery collection.
                        var salesGraphChart = new Chart(salesGraphChartCanvas, {
                                type: 'bar',
                                data: salesGraphChartData,
                                options: salesGraphChartOptions
                            }
                        )
                    }
                }, false);
            }
        });
    </script>
@endpush
