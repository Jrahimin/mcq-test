@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
    <style>

        /*.welcome-box {*/
        /*    position: relative !important;*/
        /*    margin-bottom: 30px !important;*/
        /*    transition: none !important;*/
        /*    -webkit-transition: none !important;*/
        /*    -moz-transition: none !important;*/
        /*    -o-transition: none !important;*/
        /*    overflow: hidden !important;*/
        /*}*/

        /*.fadeInRight {*/
        /*    -webkit-animation-name: none !important;*/
        /*}*/

        /*.animated {*/
        /*    -webkit-animation-duration: 1s;*/
        /*    animation-duration: 1s;*/
        /*    -webkit-animation-fill-mode: both;*/
        /*    animation-fill-mode: both;*/
        /*}*/
        /*.welcome-content {*/
        /*     opacity: 1 !important;*/
        /*     transition: none !important;*/
        /*     -webkit-transition: none;*/
        /*!important*/
        /*    -moz-transition: none !important;*/
        /*    -o-transition: none !important;*/
        /*}*/
    </style>
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
    <div id="packages">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Packages</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Packages</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container welcome-section welcome2">
            <div class="section-padding"></div>
            <div class="search-result">
                <span>Showing {{(($examPacks->currentPage()-1)*$examPacks->perPage())+1}} - {{(($examPacks->currentPage()-1)*$examPacks->perPage()+1)+$examPacks->count()-1}} of total {{$examPacks->total()}} packages</span>
                <div class="input-group col-md-2">
                    <form action="{{route('packages')}}">
                        <input type="text" class="form-control" name="search" placeholder="Search packages">
                        <span class="input-group-btn">
					        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($examPacks as $examPack)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="welcome-box animated fadeInRight">
                            <img src="{{asset('frontend/user-end/images/welcome6.jpg')}}" alt="welcome1" width="370"
                                 height="440">
                            <div class="welcome-title">
                                <h3>{{$examPack->title}}</h3>
                            </div>
                            <div class="welcome-content">
                                @if($examPack->dateForm && $examPack->dateTo)
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        <strong>{{ $examPack->dateForm }} to {{ $examPack->dateTo }}</strong>
                                    </span>
                                @endif
                                @if($examPack->details)
                                    <p>{{$examPack->details}}</p>
                                @endif
                                <ul class="course-detail">
                                    @if($examPack->price)
                                        <li>
                                            <span><i class="fa fa-money"
                                                     aria-hidden="true"></i> Price: <strong>{{$examPack->price}}</strong> BDT</span>
                                        </li>
                                    @endif
                                    <span style="color: white;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Package Details</span><br>
                                    @if($examPack->mini_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->mini_test_count}} Mini Test</span>
                                        </li>
                                    @endif
                                    @if($examPack->mock_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->mock_test_count}} Mock Test</span>
                                        </li>
                                    @endif
                                    @if($examPack->model_test_count)
                                        <li><i class="fa fa-book" aria-hidden="true"></i>
                                            <span>{{$examPack->model_test_count}} Model Test</span>
                                        </li>
                                    @endif
                                </ul>
                                <form action="{{route('buy-package')}}" method="POST" style="display: inline-block">
                                    @csrf
                                    <input type="text" hidden name="exam_pack_id" value="{{$examPack->id}}">
                                    <button class="btn btn-warning" type="submit">Buy Now</button>
                                </form>
                                <div style="display: inline-block" class="d-inline-block m-0 p-0">
                                    <a class="btn btn-info"
                                       href="{{route('exam-schedule')}}?exam_pack_id={{$examPack->id}}"> Exam List </a>
                                </div>
                                <div class="mb-3"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $examPacks->appends(request()->query())->links() }}

            <div class="section-padding"></div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        /*(function () {
            @if(session()->has('success_message'))
        Swal.fire('Success!', "{{session()->get('success_message')}}", 'success');
            @endif
        @if(session()->has('error_message'))
        Swal.fire('Fail!', "{{session()->get('error_message')}}", 'error');
            @endif
        })();*/
        new Vue({
            el: '#packages',
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
