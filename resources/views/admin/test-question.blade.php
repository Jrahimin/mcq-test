@extends('layouts.dashboard.dashboard-layout')
@section('title',$title??'Dynamic')
@section('style-lib')

@endsection
@push('custom-css')
    <style type="text/css">
        thead input {
            width: 100% !important;
        }
    </style>
@endpush
@section('main-content')
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
                                                    <option></option>
                                                    @foreach($testQuestions as $key => $testQuestion)
                                                        <option
                                                            value="{{$testQuestion->id}}">{{$testQuestion->title}}</option>
                                                    @endforeach
                                                </select>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="text" class="form-control" id="title"
                                                       placeholder="Enter exam title"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="testQuestion.title">
                                            </validation-provider>
                                        </div>
                                    </div>

                                    attachment_url
                                    mark
                                    status
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exam_schedule">Exam Schedule</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="datetime-local" v-bind:class="errors[0]?'border-danger':''"
                                                       class="form-control" id="exam_schedule"
                                                       placeholder="Enter exam schedule"
                                                       v-model="testQuestion.exam_schedule">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exam_schedule">Exam Description</label>
                                            <input type="datetime-local"
                                                   class="form-control" id="exam_schedule"
                                                   placeholder="Enter description"
                                                   v-model="testQuestion.description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="duration_minutes">Exam Duration in minutes</label>
                                            <input type="number" class="form-control"
                                                   id="duration_minutes"
                                                   placeholder="Enter exam duration"
                                                   v-model="testQuestion.duration_minutes">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="number" class="form-control" id="price"
                                                       placeholder="Enter exam price"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="testQuestion.price">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="menu">Mark Per Question</label>
                                            <input type="number" class="form-control" id="mark_per_question"
                                                   placeholder="Enter mark per question"
                                                   v-model="testQuestion.mark_per_question">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="negative_mark_per_question">Negative Mark Per Question</label>
                                            <input type="number" class="form-control"
                                                   id="negative_mark_per_question"
                                                   placeholder="Enter negative Mark per question"
                                                   v-model="testQuestion.negative_mark_per_question">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Type</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="text" class="form-control" id="type"
                                                       placeholder="Enter exam type"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="testQuestion.type">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   v-model="testQuestion.status">
                                            <label class="form-check-label" for="exampleCheck1">Is Active</label>
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
                        <h3 class="card-title">Test Question List</h3>
                        <button class="btn btn-info float-right" @click="addTestQuestion"><i class="fa fa-plus"></i>Add
                        </button>
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
    <!-- /.container-fluid -->
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#testQuestion',
            data: {
                dataTableData: [],
                dataTable: {},
                testQuestion: {
                    exam_test_id: undefined,
                    title: undefined,
                    description: undefined,
                    attachment_url: undefined,
                    mark: undefined,
                    status: true,
                    answer: [
                        {
                            question_id: undefined,
                            answer: undefined,
                            image_url: undefined,
                            description: undefined,
                            is_correct: undefined,
                            status: true,
                        }
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
                            url: '/test-question',
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
                                data: 'exam_test_id',
                                name: 'exam_test_id',
                                defaultContent: '',
                                title: 'Exam Test ID'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'title',
                                name: 'title',
                                defaultContent: '',
                                title: 'Title'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'description',
                                name: 'description',
                                defaultContent: '',
                                title: 'Description'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'attachment_url',
                                name: 'attachment_url',
                                defaultContent: '',
                                title: 'Attachment URL'
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
                    this.error = undefined;
                    let url = '/test-question';
                    let method = 'post';
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
                    this.mode = undefined;
                    this.testQuestion = [{
                        exam_test_id: undefined,
                        title: undefined,
                        description: undefined,
                        attachment_url: undefined,
                        mark: undefined,
                        status: true,
                        answer: [
                            {
                                question_id: undefined,
                                answer: undefined,
                                image_url: undefined,
                                description: undefined,
                                is_correct: undefined,
                                status: true,
                            }
                        ]
                    }];
                },
                addTestQuestion() {
                    this.reset();
                    this.mode = 'create';
                },
                closeEditor() {
                    this.mode = undefined;
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
    </script>
@endpush
