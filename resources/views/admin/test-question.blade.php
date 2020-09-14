@extends('layouts.dashboard.dashboard-layout')
@section('title',$title??'Dynamic')
@section('style-lib')
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote.css')}}">
@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }

        @media (max-width: 600px) {
            #exampleModal {
                width: 100vw;
                margin-left: 0 !important;
            }
        }

        .form-check {
            padding-top: 0 !important;
        }
    </style>
@endpush
@section('main-content')
    <div class="mt-15">
        <div class="container-fluid" id="testQuestion">
            <div class="row" v-if="mode">
                <div class="col-12">
                    <div class="card">
                        <div class="alert alert-danger alert-dismissible" v-if="error">
                            <button type="button" class="close" data-dismiss="alert" @click="error=undefined">&times;
                            </button>
                            <strong>Warning!</strong>@{{ error }}
                        </div>
                        <div class="card-header">
                            <h5 class="d-inline-block">@{{mode.toUpperCase()}}</h5>
                            <a href="javascript:void(0)" class="float-right text-danger" @click="closeEditor"><i
                                    class="fa fa-window-close"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <validation-observer v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(submit)">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="menu">Select Exam</label>
                                                <validation-provider rules="required"
                                                                     v-slot="{ errors }">
                                                    <select class="form-control"
                                                            v-bind:class="errors[0]?'border-danger':''"
                                                            id="menu" v-model="testQuestion.exam_test_id"
                                                    >
                                                        <option value="">Select Exam</option>
                                                        @foreach($examTests as $key => $testQuestion)
                                                            <option
                                                                value="{{$testQuestion->id}}">{{$testQuestion->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </validation-provider>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="menu">Select Subject</label>
                                                <select class="form-control"
                                                        id="subject_id" v-model="testQuestion.subject_id"
                                                >
                                                    <option value="">Select Subject</option>
                                                    @foreach($subjects as $key => $subject)
                                                        <option
                                                            value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exam_schedule">Question Mark</label>
                                                <validation-provider rules="required"
                                                                     v-slot="{ errors }">
                                                    <input type="text" v-bind:class="errors[0]?'border-danger':''"
                                                           class="form-control" id="mark"
                                                           placeholder="Enter question mark"
                                                           v-model="testQuestion.mark"
                                                           oninput="document.getElementById('mark').value=document.getElementById('mark').value.replace(/[^-?\d+(.\d+)?]/g,'')">
                                                </validation-provider>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <div class="mb-3">
                                                    <textarea id="question" class="textarea form-control"
                                                              placeholder="Place answer explanation" style="width: 100%; height: 200px; font-size: 14px;
                                                             line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="answer_explanation">Answer Explanation</label>
                                                <div class="mb-3">
                                                    <textarea id="answer_explanation" class="textarea form-control"
                                                              placeholder="Place answer explanation" style="width: 100%; height: 200px; font-size: 14px;
                                                             line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   v-model="testQuestion.status">
                                            <label class="form-check-label" for="exampleCheck1">Is Active</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-center"><u>Question Options</u></h4><br>
                                    <div class="row border-primary mb-2 p-2"
                                         v-for="(as,i) in testQuestion.answers"
                                         style="background-color:rgba(119,175,175,0.59)">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <validation-provider rules="required"
                                                                     v-slot="{ errors }">
                                                    <label for="answer">Option @{{ i+1 }}</label>
                                                    <input type="text" v-bind:class="errors[0]?'border-danger':''"
                                                           class="form-control" id="answer"
                                                           placeholder="Enter Answer"
                                                           v-model="as.answer">
                                                </validation-provider>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 2.50rem;">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                       class="form-check-input" id="is_correct"
                                                       v-model="as.is_correct">
                                                <label class="form-check-label" for="exam_schedule">IS Correct</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 2.50rem;">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                       class="form-check-input" id="status"
                                                       v-model="as.status">
                                                <label class="form-check-label" for="exam_schedule">IS Active</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="float-right">
                                                <a href="javascript:void(0)" class="badge badge-danger m-1" v-if="i>3"
                                                   @click="removeAnswer(i)"><i
                                                        class="fa fa-window-close"></i> Remove</a>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-primary btn-sm pull-right m-1"
                                                   v-if="i === testQuestion.answers.length-1"
                                                   @click="addAnswer()"><i
                                                        class="fa fa-plus"></i> Add Option</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="float-right">
                                            <button type="submit"
                                                    :class="mode === 'create'?'btn btn-info bg-info':'btn btn-primary bg-primary'">
                                                @{{ mode==='create'?'Submit':'Update' }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </validation-observer>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title d-inline-block">Test Question List</h3>
                            <div class="d-inline-block float-right">
                                <button class="btn btn-primary mr-1" @click="uploadQuestion"><i
                                        class="fa fa-upload"></i> Upload Question
                                </button>
                                <button class="btn btn-info" @click="addTestQuestion"><i class="fa fa-plus"></i>
                                    Question
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive" style="width:100%">
                                <table id="testQuestion-table" class="table table-bordered table-striped" width="100%">
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.col -->
        </div>

    </div>
    <div class="modal fade ml-5 mt-4" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('test-question-import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload an Excel File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" id="exam_test_id" name="exam_test_id">
                                        <option value="" selected>Select Exam</option>
                                        @foreach($examTests as $key => $testQuestion)
                                            <option
                                                value="{{$testQuestion->id}}">{{$testQuestion->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" id="subject_id" name="subject_id">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $key => $subject)
                                            <option
                                                value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mark" placeholder="Mark per question">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="question">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script-lib')
    <script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#testQuestion',
            data: {
                dataTableData: [],
                dataTable: {},
                testQuestion: {
                    exam_test_id: '',
                    subject_id: '',
                    title: undefined,
                    mark: undefined,
                    status: true,
                    answers: [
                        {
                            question_id: undefined,
                            answer: undefined,
                            is_correct: false,
                            status: true,
                        },
                        {
                            question_id: undefined,
                            answer: undefined,
                            is_correct: false,
                            status: true,
                        }, {
                            question_id: undefined,
                            answer: undefined,
                            is_correct: false,
                            status: true,
                        }, {
                            question_id: undefined,
                            answer: undefined,
                            is_correct: false,
                            status: true,
                        },
                    ]
                },
                mode: undefined,
                error: undefined,
                formData: undefined,
                selectedIndex: undefined,
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#testQuestion-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'test-question',
                            type: 'GET',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                ...data
                            },
                        },
                        columns: [
                            {
                                className: 'control',
                                orderable: false,
                                defaultContent: '',
                                targets: 0,
                                title: ''
                            },
                            {
                                className: 'details-control',
                                orderable: true,
                                data: 'exam_name',
                                name: 'exam_name',
                                defaultContent: '',
                                title: 'Exam Name'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'subject_name',
                                name: 'subject_name',
                                defaultContent: '',
                                title: 'Subject'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'title',
                                name: 'title',
                                defaultContent: '',
                                title: 'Title'
                            },
                            {
                                className: 'none',
                                orderable: false,
                                data: 'description',
                                name: 'description',
                                defaultContent: '',
                                title: 'Description'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'mark',
                                name: 'mark',
                                defaultContent: '',
                                title: 'Mark'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'status', render(data, row, type) {
                                    return data ? `<span class='badge badge-info'>Active</span>` : `<span class='badge badge-danger'>Inactive</span>`;
                                },
                                name: 'status',
                                defaultContent: '',
                                title: 'Status'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'id', render(data, row, type) {
                                    return `<button class='badge badge-info btn btn-info edit_discount'> <i class="fa fa-edit"></i>Edit</button>
                                            <button class='badge badge-danger btn btn-danger delete_discount'> <i class="fa fa-remove"></i>Delete</button>
                                            `;
                                },
                                defaultContent: 'Action',
                                title: 'Action'
                            }
                        ],
                        order: [[1, 'asc']],
                        bDestroy: true,
                        responsive: {
                            details: {
                                type: 'column',
                            }
                        },
                    });
                },
                ajaxCall: window.ajaxCall,
                responseProcess: window.responseProcess,
                submit() {
                    this.testQuestion.title = $("#question").summernote('code');
                    this.testQuestion.description = $('#answer_explanation').summernote('code');
                    this.error = undefined;
                    let url = 'test-question';
                    let method = 'post';
                    const answerCount = this.testQuestion.answers.reduce((previousValue, currentValue) => {
                        return previousValue + (!!currentValue.is_correct === true ? 1 : 0);
                    }, 0);
                    if (answerCount <= 0 || answerCount >= 2) {
                        swal({
                            title: "Are you sure?",
                            text: "For this question you set " + answerCount + " answer" + (answerCount > 1 ? "s" : "") + (answerCount > 1 ? " are" : " is") + " correct",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                this.submitS1(url, method)
                            }
                        });
                    } else {
                        this.submitS1(url, method)
                    }
                },
                submitS1(url, method) {
                    this.testQuestion.exam_schedule = new Date(this.testQuestion.exam_schedule + ':00z');
                    if (this.mode === 'edit') {
                        url += '/' + this.dataTableData[+this.selectedIndex].id;
                        method = 'put';
                    }

                    this.ajaxCall(url, this.testQuestion, method, (data, code) => {
                        if (code === 200) {
                            this.dataTableData = this.dataTable.rows().data();
                            this.reset();
                            if (this.mode === 'edit') {
                                this.dataTableData[this.selectedIndex] = data;
                                this.mode = 'edit';
                            } else {
                                this.dataTableData.push(data);
                                this.mode = 'create';
                            }
                            this.dataTable.clear();
                            this.dataTable.rows.add(this.dataTableData);
                            this.dataTable.draw();
                            this.reset();
                        }
                    }, true)
                },
                reset() {
                    setTimeout(() => $('.textarea').summernote('reset'), 100);
                    this.mode = undefined;
                    this.testQuestion = {
                        exam_test_id: '',
                        subject_id: '',
                        title: undefined,
                        description: undefined,
                        attachment_url: undefined,
                        mark: undefined,
                        status: true,
                        answers: [
                            {
                                question_id: undefined,
                                answer: undefined,
                                is_correct: false,
                                status: true,
                            },
                            {
                                question_id: undefined,
                                answer: undefined,
                                is_correct: false,
                                status: true,
                            }, {
                                question_id: undefined,
                                answer: undefined,
                                is_correct: false,
                                status: true,
                            }, {
                                question_id: undefined,
                                answer: undefined,
                                is_correct: false,
                                status: true,
                            },
                        ]
                    };
                },
                addAnswer() {
                    this.testQuestion.answers.push({
                        question_id: undefined,
                        answer: undefined,
                        is_correct: false,
                        status: true,
                    });
                },
                removeAnswer(i) {
                    this.testQuestion.answers.splice(i, 1);
                },
                addTestQuestion() {
                    this.reset();
                    this.mode = 'create';
                },
                closeEditor() {
                    this.mode = undefined;
                },
                uploadQuestion() {
                    $("#exampleModal").modal('show');
                },
            },
            mounted() {
                const that = this;
                this.dataTableInit({});
                $('#testQuestion-table thead tr').clone(true).appendTo('#testQuestion-table thead');
                $('#testQuestion-table thead tr:eq(1) th').each(function (i) {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="' + title + '" />');

                    $('input', this).on('keyup change', function () {
                        if (that.dataTable.column(i).search() !== this.value) {
                            that.dataTable
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });
                $('#testQuestion-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.testQuestion = that.dataTableData[that.selectedIndex];
                    setTimeout(() => {
                        $("#answer_explanation").summernote('code', that.dataTableData[that.selectedIndex].description);
                        $("#question").summernote('code', that.dataTableData[that.selectedIndex].title);
                    }, 500);
                });

                $('#testQuestion-table tbody').on('click', '.delete_discount', function () {
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            that.state = undefined;
                            that.dataTableData = that.dataTable.rows().data();
                            that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                            that.ajaxCall('test-question/' + that.dataTableData[that.selectedIndex].id, {}, 'delete', (data, code) => {
                                if (code === 200) {
                                    that.dataTableData.splice(that.selectedIndex, 1);
                                    that.dataTable.clear();
                                    that.dataTable.rows.add(that.dataTableData);
                                    that.dataTable.draw();
                                    that.reset();
                                }
                            }, true);
                        }
                    });
                });

            },
        })
        {{--        @if($errors->any())--}}
        {{--        swal({--}}
        {{--            title: "Fail!",--}}
        {{--            text: "{{$errors->first()}}",--}}
        {{--            icon: "warning",--}}
        {{--            dangerMode: true,--}}
        {{--        });--}}
        {{--        @endif--}}
    </script>
@endpush
