<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-5">
        <img src="{{asset('frontend/user-end/images/event4.jpg')}}" alt="event1" width="260"
             height="160"/>
    </div>
    <div class="col-md-7 col-sm-6 col-xs-7">
        <h3><a href="#" title="">{{ $exam->title }}</a></h3>
        <div class="event-meta">
            <span><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $exam->examScheduleDate }} | {{ $exam->examTimeFrom }} to {{ $exam->examTimeTo ? $exam->examTimeTo : 'undefined' }}</span>
            <span><i aria-hidden="true" class="fa fa-clock-o"></i>Duration : {{ $exam->duration_minutes ? $exam->duration_minutes : 'undefined' }} Minutes</span>
        </div>
        <div class="event-meta">
            <span><i aria-hidden="true" class="fa fa-anchor"></i>Total Mark : {{ $exam->totalMark }}</span>
            <span><i aria-hidden="true" class="fa fa-money"></i> Price : {{ $exam->price }} BDT</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        @if(auth()->check())
            @if($exam->is_bought)
                @if($exam->is_running)
                    <form action="{{route('user-exam', ["exam_id" => $exam->id])}}" method="POST" style="display: inline-block">
                        @csrf
                        <input type="text" hidden name="exam_id" value="{{$exam->id}}">
                        <button class="btn btn-lg btn-success readmore" type="submit">Participate</button>
                    </form>
                @elseif($exam->is_expired)
                    <form action="{{route('exam-preview')}}" method="POST" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <button class="btn btn-lg btn-info readmore"><i class="fa fa-eye"></i> Details</button>
                    </form>
                @else
                    <form action="#" style="display: inline-block">
                        <button class="btn btn-lg btn-warning readmore" disabled>Upcoming</button>
                    </form>
                @endif
            @else
                @if($exam->is_expired)
                    <button class="btn btn-lg btn-danger readmore" disabled>Expired</button>
                @else
                    <form action="{{route('buy-exam')}}" method="POST" style="display: inline-block">
                        @csrf
                        <input type="text" hidden name="exam_id" value="{{$exam->id}}">
                        <button class="btn btn-lg btn-warning readmore" type="submit">Buy</button>
                    </form>
                @endif
            @endif
        @else
            @if($exam->is_expired)
                <button class="btn btn-lg btn-danger readmore" disabled>Expired</button>
            @else
                <form action="{{route('buy-exam')}}" method="POST" style="display: inline-block">
                    @csrf
                    <input type="text" hidden name="exam_id" value="{{$exam->id}}">
                    <button class="btn btn-lg btn-warning readmore" type="submit">Buy</button>
                </form>
            @endif
        @endif
    </div>
</div>
