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
        <a href="#" class="readmore" title="Read More">Buy now</a>
    </div>
</div>
