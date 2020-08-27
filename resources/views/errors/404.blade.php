@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        .border_card {
            border: 1px solid #726f6f;
            box-shadow: #554d4d;
            border-radius: 10px;
        }

        .section-padding {
            padding-top: 30px;
            padding-bottom: 25px;
        }
    </style>
@endpush
@section('main-section')
    <div id="package">
        <div class="container coursesdetail-section">
            <div class="section-padding"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="text-align: center;padding: 200px;color: #0b0b0b">
                        <h1 class="text-center" style="text-align: center">Page Not Found</h1>
                        <h3 class="text-center" style="text-align: center">404</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
@endpush
