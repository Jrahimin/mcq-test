<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-5">
        <img src="{{asset('frontend/user-end/images/event4.jpg')}}" alt="event1" width="260"
             height="160"/>
    </div>
    <div class="col-md-7 col-sm-6 col-xs-7">
        <h3><a href="#" title="">{{ $exam->title }}</a></h3>
        <div class="event-meta">
            <span><i aria-hidden="true" class="fa fa-clock-o"></i>{{ $exam->examTimeFrom }} to {{ $exam->examTimeTo }}</span>
            <span><i aria-hidden="true" class="fa fa-clock-o"></i>Duration : {{ $exam->duration_minutes }} Minutes</span>
        </div>
        <div class="event-meta">
            <span><i aria-hidden="true" class="fa fa-anchor"></i>Total Mark : {{ $exam->totalMark }}</span>
            <span><i aria-hidden="true" class="fa fa-money"></i> Price : {{ $exam->price }} BDT</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        @if($exam->is_bought && $exam->is_running)
            <form action="{{route('user-exam', ["exam_id" => $exam->id])}}" method="POST" style="display: inline-block">
                @csrf
                <input type="text" hidden name="exam_id" value="{{$exam->id}}">
                <button class="btn btn-lg btn-success readmore2" type="submit">Participate</button>
            </form>
        @elseif(!$exam->is_bought && $exam->is_expired)
            <form action="#" style="display: inline-block">
                <button class="btn btn-lg btn-danger readmore2">Expired</button>
            </form>
        @elseif(!$exam->is_bought)
            <form action="{{route('buy-exam')}}" method="POST" style="display: inline-block">
                @csrf
                <input type="text" hidden name="exam_id" value="{{$exam->id}}">
                <button class="btn btn-lg btn-warning readmore2" type="submit">Buy</button>
            </form>
        @else
            <form action="#" style="display: inline-block">
                <button class="btn btn-lg btn-info readmore2"><i class="fa fa-eye"></i> Details</button>
            </form>
        @endif
    </div>
</div>
