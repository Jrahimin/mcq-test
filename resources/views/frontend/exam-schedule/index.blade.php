@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        .ow-pagination .pagination > li:first-child > a, .ow-pagination .pagination > li:last-child > a {
            border: 1px solid #eaeaea;
            height: 36px;
            display: inline-block;
            width: 105px;
            padding: 0;
            border-radius: 30px;
            line-height: 34px;
            text-decoration: none;
        }
    </style>
@endpush
@section('main-section')
    <div id="#exam-schedule">
        <div class="container-fluid no-padding pagebanner" width="50%;">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Exam Schedule <span class="text-primary">{{ $examPackTitle ? "For $examPackTitle" : '' }}</span></h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Exam Schedule</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container welcome-section welcome2">
            <div class="section-padding"></div>
            <div class="search-result">
                <span>Showing {{(($examList->currentPage()-1)*$examList->perPage())+1}} - {{(($examList->currentPage()-1)*$examList->perPage()+1)+$examList->count()-1}} of total {{$examList->total()}} packages</span>
                <div class="input-group col-md-2">
                    <form action="{{route('exam-schedule')}}">
                        <input type="text" class="form-control" name="search" placeholder="Search packages">
                        <input type="hidden" class="form-control" name="exam_pack_id" value="{{ request()->input('exam_pack_id') ?? '' }}">
                        <span class="input-group-btn">
					        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                </div>
            </div>
            <div class="event-block">
                @foreach($examList as $exam)
                    <div class="event-box">
                        @include('frontend.exam-schedule.exam-view')
                    </div>
                @endforeach
            </div>
            <div class="section-padding"></div>

            {{ $examList->appends(request()->query())->links() }}

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
