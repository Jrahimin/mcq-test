@extends('layouts.dashboard.dashboard-layout')
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
    {!! Form::open(['action' => 'Admin\TestQuestionController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('image')}}
        <input type="submit" class="btn btn-success">
    </div>
    {!! Form::close() !!}
@endsection
