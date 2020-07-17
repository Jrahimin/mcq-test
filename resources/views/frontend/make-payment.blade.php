@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
       .border_card{
           border:1px solid #726f6f;
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
                    <div class="col-md-12">
                        <div class="col-md-6 col-md-offset-3 p-5 pb-7 border-dark border_card">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Payment</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
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
                                            <label for="transaction_no">Transaction Id</label>
                                            <input type="text" class="form-control" id="transaction_no" name="transaction_code"
                                                   placeholder="Enter Transaction Number" required
                                                   value="{{old('transaction_code')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                   placeholder="Enter Amount"
                                                   required pattern="[1-9][0-9]*" minlength="2" value="{{old('amount')}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px"><i class="fa fa-money"></i> Payment</button>
                                    </form>
                                </div>
                            </div>
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
