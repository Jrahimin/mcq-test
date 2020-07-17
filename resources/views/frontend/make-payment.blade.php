@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        .card {
            float: none; /* Added */
            margin: 0px 25% 0 25%;
        }

        .section-padding {
            padding-top: 30px;
            padding-bottom: 25px;
        }
    </style>
@endpush
@section('main-section')
    <div id="package">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>Payment</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{route('user-home')}}">Home</a></li>
                        <li>Payment</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container coursesdetail-section">
            <div class="section-padding"></div>
            <div class="row">
                <div class="card">
                    {{--                    <div class="card-header text-center">--}}
                    {{--                        <h3 class="card-title"><u>Make Payment</u></h3>--}}
                    {{--                    </div>--}}
                    <div class="card-body pl-10 pr-10">
                        <form action="{{route('payment-submit')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Payment Method</label>
                                <select class="form-control" required name="payment_channel">
                                    <option value="" selected>Select payment method</option>
                                    @foreach($payment_types as $key => $value)
                                        <option
                                            value="{{$key}}" {{old('payment_channel')==$value?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                       placeholder="Enter Amount"
                                       required pattern="[1-9][0-9]*" minlength="2" value="{{old('amount')}}">
                            </div>
                            <div class="form-group">
                                <label for="transaction_no">Transaction No.</label>
                                <input type="text" class="form-control" id="transaction_no" name="transaction_code"
                                       placeholder="Enter Transaction Number" required
                                       value="{{old('transaction_code')}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="section-padding"></div>
        </div>
    </div>
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        (function () {
            @if(session()->has('success_message'))
            Swal.fire('Success!', "{{session()->get('success_message')}}", 'success');
            @endif
            @if(session()->has('error_message'))
            Swal.fire('Fail!', "{{session()->get('error_message')}}", 'error');
            @endif
        })();
        new Vue({
            el: '#package',
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
