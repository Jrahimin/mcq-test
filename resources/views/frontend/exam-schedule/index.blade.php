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
    <div id="#exam-schedule">
        <div class="container-fluid no-padding pagebanner" width="50%;">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Exam Schedule</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Exam Schedule</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container event-section">
            <div class="section-padding"></div>
            {{--<div class="search-result">
                <span>Showing {{($examList->currentPage()*$examList->perPage())-1}} - {{($examList->currentPage()*$examList->perPage()-1)+$examList->count()-1}} of total {{$examList->total()}} packages</span>
                <div class="input-group col-md-2">
                    <form action="{{route('exam-buy')}}">
                        <input type="text" class="form-control" name="search" placeholder="Search packages">
                        <span class="input-group-btn">
					        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                </div>
            </div>--}}
            <div class="event-block">
                @foreach($examList as $exam)
                    <div class="event-box animated fadeInRight">
                        @include('frontend.exam-schedule.exam-view')
                    </div>
                @endforeach
            </div>
            @php echo $examList->render(); @endphp
            <div class="section-padding"></div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#exam-schedule',
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
