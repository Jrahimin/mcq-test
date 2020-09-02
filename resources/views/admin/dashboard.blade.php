@extends('layouts.dashboard.dashboard-layout')
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
@section('main-content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-counter bg-warning">
                        <i class="fa fa-money-bill"></i>
                        <span class="count-numbers">{{ $waitPaymentApproval }}</span>
                        <span class="count-name">Awaiting Payment Approval</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('payment-info.index').'?status=0' }}" target="_blank">
                                <strong>Show</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">{{ $userCountTotal }}</span>
                        <span class="count-name">Registered Users</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('user-management.index') }}" target="_blank">
                                <strong>Show</strong>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-counter success">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">{{ $userCountToday }}</span>
                        <span class="count-name">Registered Users (Today)</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('user-management.index').'?from_date='.\Carbon\Carbon::now()->format('y-m-d') }}" target="_blank">
                                <strong>Show</strong>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card-counter bg-primary">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span class="count-numbers">{{ $examPackCount }}</span>
                        <span class="count-name">Exam Packs</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('exam-pack.index') }}" target="_blank">
                                <strong>Show</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-counter danger">
                        <i class="fa fa-pen-fancy"></i>
                        <span class="count-numbers">{{ $examCount }}</span>
                        <span class="count-name">Exam Test</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('exam-test.index') }}" target="_blank">
                                <strong>Show</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-counter success">
                        <i class="fa fa-money-bill"></i>
                        <span class="count-numbers">{{ $totalPayment }} BDT</span>
                        <span class="count-name">Total Paid Amount</span>
                        <hr>
                        <div>
                            <a class="count-link btn btn-sm btn-info" href="{{ route('payment-info.index') }}" target="_blank">
                                <strong>Show</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <br/><hr>
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading text-center font-weight-bold">Payment (Within 7 Days)</div>
                <div class="panel-body">
                    <!-- Table -->
                    <canvas class="chart chartjs-render-monitor" id="main-chart" height="300"
                            width="1549" style="display: block; margin-top: 2%;"></canvas>
                </div>

            </div>
        </div><!--col-->
    </div><!--row-->

    {{--    <br/><hr>
        <div class="row">
            <div class="col-md-6">
                <canvas id="trx_type_count" height="200"></canvas>
            </div>

            <div class="col-md-6">
                <canvas id="trx_type_amount" height="200"></canvas>
            </div>
        </div>--}}
    <br/>
@endsection

@section('script-lib')
    <script src="{{secure_asset('plugins/chart.js/Chart.min.js')}}"></script>
@endsection

@push('custom-js')
    <script>
        this.ajaxCall('{{ route('payment-chart') }}', {}, 'post', (data, code) => {
            if (code === 200) {
                // Sales graph chart
                var chartCanvas = $('#main-chart').get(0).getContext('2d');
                //$('#revenue-chart').get(0).getContext('2d');

                var chartData = {
                    labels: data.dates || [],
                    datasets: [
                        {
                            label: 'Amount',
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
                            data: data.amounts || []
                        }
                    ]
                }

                var chartDataOptions = {
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
                var chart = new Chart(chartCanvas, {
                        type: 'bar',
                        data: chartData,
                        options: chartDataOptions
                    }
                )
            }
        }, false);
    </script>
@endpush
