@extends(auth()->user()->type==4?'layouts.frontend.master':'layouts.dashboard.dashboard-layout')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">

    </style>
@endpush
@section(auth()->user()->type==4?'main-section':'main-content')
    <div class="container-fluid" style="min-height: 500px;">
        <div class="{{auth()->user()->type==4?'panel panel-info':'card'}}">
            <div class="{{auth()->user()->type==4?'panel-heading':'card-header'}}">
                Merit List for {{ $examInfo->title }}
            </div>

            <div class="{{auth()->user()->type==4?'panel-body':'card-body'}}">
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
