@extends('layouts.frontend.master')
@section('title',$title??'Dynamic')
@section('style-lib')
@endsection
@push('custom-css')
    <style type="text/css">
        #qid {
            padding: 10px 15px;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 20px;
        }

        label.btn {
            padding: 18px 60px;
            white-space: normal;
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -o-transform: scale(1.0);
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -o-transition-duration: .3s
        }

        label.btn:hover {
            text-shadow: 0 3px 2px rgba(0, 0, 0, 0.4);
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1)
        }

        label.btn-block {
            text-align: left;
            position: relative
        }

        label .btn-label {
            position: absolute;
            left: 0;
            top: 0;
            display: inline-block;
            padding: 0 10px;
            background: rgba(0, 0, 0, .15);
            height: 100%
        }

        label .glyphicon {
            top: 34%
        }

        .element-animation1 {
            animation: animationFrames ease .8s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease .8s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease .8s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation2 {
            animation: animationFrames ease 1s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation3 {
            animation: animationFrames ease 1.2s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.2s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.2s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation4 {
            animation: animationFrames ease 1.4s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.4s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.4s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        @keyframes animationFrames {
            0% {
                opacity: 0;
                transform: translate(-1500px, 0px)
            }

            60% {
                opacity: 1;
                transform: translate(30px, 0px)
            }

            80% {
                transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                transform: translate(0px, 0px)
            }
        }

        @-webkit-keyframes animationFrames {
            0% {
                opacity: 0;
                -webkit-transform: translate(-1500px, 0px)
            }
            60% {
                opacity: 1;
                -webkit-transform: translate(30px, 0px)
            }

            80% {
                -webkit-transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                -webkit-transform: translate(0px, 0px)
            }
        }

        @-ms-keyframes animationFrames {
            0% {
                opacity: 0;
                -ms-transform: translate(-1500px, 0px)
            }

            60% {
                opacity: 1;
                -ms-transform: translate(30px, 0px)
            }
            80% {
                -ms-transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                -ms-transform: translate(0px, 0px)
            }
        }

        .modal-header {
            background-color: transparent;
            color: inherit
        }

        .modal-body {
            min-height: 205px
        }

        #loadbar {
            position: absolute;
            width: 62px;
            height: 77px;
            top: 2em
        }

        .blockG {
            position: absolute;
            background-color: #FFF;
            width: 10px;
            height: 24px;
            -moz-border-radius: 8px 8px 0 0;
            -moz-transform: scale(0.4);
            -moz-animation-name: fadeG;
            -moz-animation-duration: .8800000000000001s;
            -moz-animation-iteration-count: infinite;
            -moz-animation-direction: linear;
            -webkit-border-radius: 8px 8px 0 0;
            -webkit-transform: scale(0.4);
            -webkit-animation-name: fadeG;
            -webkit-animation-duration: .8800000000000001s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: linear;
            -ms-border-radius: 8px 8px 0 0;
            -ms-transform: scale(0.4);
            -ms-animation-name: fadeG;
            -ms-animation-duration: .8800000000000001s;
            -ms-animation-iteration-count: infinite;
            -ms-animation-direction: linear;
            -o-border-radius: 8px 8px 0 0;
            -o-transform: scale(0.4);
            -o-animation-name: fadeG;
            -o-animation-duration: .8800000000000001s;
            -o-animation-iteration-count: infinite;
            -o-animation-direction: linear;
            border-radius: 8px 8px 0 0;
            transform: scale(0.4);
            animation-name: fadeG;
            animation-duration: .8800000000000001s;
            animation-iteration-count: infinite;
            animation-direction: linear
        }

        #rotateG_01 {
            left: 0;
            top: 28px;
            -moz-animation-delay: .33s;
            -moz-transform: rotate(-90deg);
            -webkit-animation-delay: .33s;
            -webkit-transform: rotate(-90deg);
            -ms-animation-delay: .33s;
            -ms-transform: rotate(-90deg);
            -o-animation-delay: .33s;
            -o-transform: rotate(-90deg);
            animation-delay: .33s;
            transform: rotate(-90deg)
        }

        #rotateG_02 {
            left: 8px;
            top: 10px;
            -moz-animation-delay: .44000000000000006s;
            -moz-transform: rotate(-45deg);
            -webkit-animation-delay: .44000000000000006s;
            -webkit-transform: rotate(-45deg);
            -ms-animation-delay: .44000000000000006s;
            -ms-transform: rotate(-45deg);
            -o-animation-delay: .44000000000000006s;
            -o-transform: rotate(-45deg);
            animation-delay: .44000000000000006s;
            transform: rotate(-45deg)
        }

        #rotateG_03 {
            left: 26px;
            top: 3px;
            -moz-animation-delay: .55s;
            -moz-transform: rotate(0deg);
            -webkit-animation-delay: .55s;
            -webkit-transform: rotate(0deg);
            -ms-animation-delay: .55s;
            -ms-transform: rotate(0deg);
            -o-animation-delay: .55s;
            -o-transform: rotate(0deg);
            animation-delay: .55s;
            transform: rotate(0deg)
        }

        #rotateG_04 {
            right: 8px;
            top: 10px;
            -moz-animation-delay: .66s;
            -moz-transform: rotate(45deg);
            -webkit-animation-delay: .66s;
            -webkit-transform: rotate(45deg);
            -ms-animation-delay: .66s;
            -ms-transform: rotate(45deg);
            -o-animation-delay: .66s;
            -o-transform: rotate(45deg);
            animation-delay: .66s;
            transform: rotate(45deg)
        }

        #rotateG_05 {
            right: 0;
            top: 28px;
            -moz-animation-delay: .7700000000000001s;
            -moz-transform: rotate(90deg);
            -webkit-animation-delay: .7700000000000001s;
            -webkit-transform: rotate(90deg);
            -ms-animation-delay: .7700000000000001s;
            -ms-transform: rotate(90deg);
            -o-animation-delay: .7700000000000001s;
            -o-transform: rotate(90deg);
            animation-delay: .7700000000000001s;
            transform: rotate(90deg)
        }

        #rotateG_06 {
            right: 8px;
            bottom: 7px;
            -moz-animation-delay: .8800000000000001s;
            -moz-transform: rotate(135deg);
            -webkit-animation-delay: .8800000000000001s;
            -webkit-transform: rotate(135deg);
            -ms-animation-delay: .8800000000000001s;
            -ms-transform: rotate(135deg);
            -o-animation-delay: .8800000000000001s;
            -o-transform: rotate(135deg);
            animation-delay: .8800000000000001s;
            transform: rotate(135deg)
        }

        #rotateG_07 {
            bottom: 0;
            left: 26px;
            -moz-animation-delay: .99s;
            -moz-transform: rotate(180deg);
            -webkit-animation-delay: .99s;
            -webkit-transform: rotate(180deg);
            -ms-animation-delay: .99s;
            -ms-transform: rotate(180deg);
            -o-animation-delay: .99s;
            -o-transform: rotate(180deg);
            animation-delay: .99s;
            transform: rotate(180deg)
        }

        #rotateG_08 {
            left: 8px;
            bottom: 7px;
            -moz-animation-delay: 1.1s;
            -moz-transform: rotate(-135deg);
            -webkit-animation-delay: 1.1s;
            -webkit-transform: rotate(-135deg);
            -ms-animation-delay: 1.1s;
            -ms-transform: rotate(-135deg);
            -o-animation-delay: 1.1s;
            -o-transform: rotate(-135deg);
            animation-delay: 1.1s;
            transform: rotate(-135deg)
        }

        @-moz-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-webkit-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-ms-keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        @-o-keyframes fadeG {
            0% {
                background-color: #000
            }
            100% {
                background-color: #FFF
            }
        }

        @keyframes fadeG {
            0% {
                background-color: #000
            }

            100% {
                background-color: #FFF
            }
        }

        .element-animation1 .active {
            background-color: red;
        }

        .btn-primary.active:hover, .btn-primary:active, .open > .dropdown-toggle.btn-primary
        .btn-primary:hover, .btn-primary:active, .open > .dropdown-toggle.btn-primary,
        .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {
            background-color: #04a973;
        }

        .btn-primary, .btn-primary:active, .open > .dropdown-toggle.btn-primary {
            background-color: #5b636ba8;
        }
    </style>
@endpush
@section('main-section')
    <div id="mcq-test" style="min-height: 725px">
        <div class="container-fluid no-padding pagebanner">
            <div class="container">
                <div class="pagebanner-content">
                    <h3>@{{ exam_info_response.title }}</h3>
                    <ol class="breadcrumb">
                        <li>Marks:</li>
                        <li><strong>@{{ exam_info_response.mark_per_question }}</strong>/question</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 3%">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3 class="text-center">Exam Review</h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">@{{ exam_info_response.question_count }}</span>
                            Number of Question
                        </li>
                        <li class="list-group-item">
                            <span class="badge">@{{ exam_info_response.total_mark }}</span>
                            Total Mark
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-primary" style="background-color: rgba(23,196,49,0.62)">@{{ exam_info_response.duration_sec/60 }} Min.</span>
                            Duration
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h4 class="text-center"><u>Answer Sheet</u></h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5 col-md-offset-1" style="padding: 2%; background-color: rgba(195,205,205,0.2)"
                     v-for="question_response of question_list_response">
                    <div class="accordion md-accordion accordion-blocks"
                         aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-1 mb-0" style="padding-left: 2%">
                                    @{{ question_response.question }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li v-for="option of question_response.options"
                                        :style="{'background':question_response.correct_option_id == option.option_id?'rgba(0,180,78,0.46)':'',margin:'1%'}">
                                        @{{ option.option }}
                                        <span v-if="question_response.correct_option_id == option.option_id"
                                              class="pull-right" style="padding-right: 1%;color: green"><i
                                                class="glyphicon glyphicon-ok"></i></span>
                                    </li>
                                </ul>
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
        new Vue({
            el: '#mcq-test',
            data: {
                exam_test_id: "{{$exam_test_id}}",
                question_list_response: [],
                exam_info_response: {
                    duration_sec: '',
                    mark_per_question: '',
                    question_count: '',
                    title: '',
                    total_mark: '',
                },
            },
            methods: {
                ajaxCall: window.ajaxCall,
                responseProcess: window.responseProcess,
                getRadioButtonClasses() {
                    return {
                        'element-animation1': true,
                        'btn btn-lg': true,
                        'btn-primary': true, 'btn-block': true,
                    }
                },
            },
            mounted() {
                this.ajaxCall('{{ route('exam-preview') }}', {exam_id: "{{$exam_test_id}}"}, 'post', (data, code) => {
                    if (code === 200) {
                        this.question_list_response = data.questionList;
                        this.exam_info_response = data.examInfo;
                    } else {
                        sweetAlert({
                            title: "Fail",
                            text: "Sorry! You have already participated in this exam.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then(() => window.location.href = '/exam-schedule');
                    }
                }, false);
            },
        })
    </script>
@endpush
