@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
@endsection
@push('custom-css')
@endpush
@section('main-section')
    <div id="mcq-test" style="min-height: 725px">
        <div class="container">
            <div class="col-md-3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-8"><p class="">Time Left 30:45</p></div>
                                <div class="col-md-4"><span>Total Question: 30</span></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="100"
                                     aria-valuemin="0" aria-valuemax="50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><span class="label label-warning" id="qid">2</span> THREE is CORRECT</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-xs-3 col-xs-offset-5">
                                <div id="loadbar" style="display: none;">
                                    <div class="blockG" id="rotateG_01"></div>
                                    <div class="blockG" id="rotateG_02"></div>
                                    <div class="blockG" id="rotateG_03"></div>
                                    <div class="blockG" id="rotateG_04"></div>
                                    <div class="blockG" id="rotateG_05"></div>
                                    <div class="blockG" id="rotateG_06"></div>
                                    <div class="blockG" id="rotateG_07"></div>
                                    <div class="blockG" id="rotateG_08"></div>
                                </div>
                            </div>
                            <div class="quiz" id="quiz" data-toggle="buttons">
                                <label class="element-animation1 btn btn-lg btn-info btn-block">
                                    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="q_answer" value="1">1 One
                                </label>
                                <label class="element-animation1 btn btn-lg btn-info btn-block">
                                    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="q_answer" value="1">1 One
                                </label>
                                <label class="element-animation1 btn btn-lg btn-info btn-block">
                                    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="q_answer" value="1">1 One
                                </label>
                                <label class="element-animation1 btn btn-lg btn-info btn-block">
                                    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                    <input type="radio" name="q_answer" value="1">1 One
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer text-muted">
                            <div class="row">
                                <div class="m-5 text-center">
                                    <button class="btn btn-primary"><i class="fa fa-backward"></i> Back</button>
                                    <button class="btn btn-primary"> Previous <i class="fa fa-forward"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script-lib')
@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#mcq-test',
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
