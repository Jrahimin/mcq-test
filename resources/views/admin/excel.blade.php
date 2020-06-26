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
    {!! Form::open(['action' => 'Admin\TestQuestionController@importQuestionFromExcel', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('image')}}
        <input type="submit" class="btn btn-success">
    </div>
    {!! Form::close() !!}

    @if(isset($errors))
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
