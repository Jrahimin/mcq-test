@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">

    </style>
@endpush
@section('main-section')
    <div class="container-fluid" style="min-height: 500px;">
        <div class="panel panel-info">
            <div class="panel-heading">
                Merit List for {{ $examInfo->title }}
            </div>

            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Examinee</th>
                            <th>Score</th>
                            <th>Correct Answer</th>
                            <th>Wrong Answer</th>
                            <th>Exam Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($userRank as $position=>$user)
                            <tr>
                                <td>{{ ++$position }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->pivot->score.' out of '.$examInfo->totalMark }}</td>
                                <td>{{ $user->pivot->total_correct }}</td>
                                <td>{{ $user->pivot->total_wrong }}</td>
                                <td>{{ $examInfo->exam_schedule }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
