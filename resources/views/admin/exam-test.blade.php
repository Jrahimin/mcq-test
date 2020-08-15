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
    <div class="container-fluid" id="examTest">
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
                                            <label for="menu">Select Package</label>
                                            <select class="form-control" id="menu" v-model="examTest.exam_pack_id">
                                                <option value="">Select Package</option>
                                                @foreach($packages as $key => $pack)
                                                    <option value="{{$pack->id}}">{{$pack->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Select Category</label>
                                            <select class="form-control" id="category_id"
                                                    v-model="examTest.category_id">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $key => $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
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
                                                       v-model="examTest.title"
                                                >
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exam_schedule">Exam Schedule From</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="datetime-local" v-bind:class="errors[0]?'border-danger':''"
                                                       class="form-control" id="exam_schedule"
                                                       placeholder="Enter exam schedule"
                                                       v-model="examTest.exam_schedule">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exam_schedule">Exam Schedule To</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="datetime-local" v-bind:class="errors[0]?'border-danger':''"
                                                       class="form-control" id="exam_schedule_to"
                                                       placeholder="Enter exam schedule"
                                                       v-model="examTest.exam_schedule_to">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="duration_minutes">Exam Duration in minutes</label>
                                            <input type="text" class="form-control"
                                                   id="duration_minutes"
                                                   placeholder="Enter exam duration"
                                                   v-model="examTest.duration_minutes"
                                                   oninput="document.getElementById('duration_minutes').value=document.getElementById('duration_minutes').value.replace(/[^-?\d+(.\d+)?]/g,'')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="text" class="form-control" id="price"
                                                       placeholder="Enter exam price"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="examTest.price"
                                                       oninput="document.getElementById('price').value=document.getElementById('price').value.replace(/[^-?\d+(.\d+)?]/g,'')">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="menu">Mark Per Question</label>
                                            <input type="text" class="form-control" id="mark_per_question"
                                                   placeholder="Enter mark per question"
                                                   v-model="examTest.mark_per_question"
                                                   oninput="document.getElementById('mark_per_question').value=document.getElementById('mark_per_question').value.replace(/[^-?\d+(.\d+)?]/g,'')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="negative_mark_per_question">Negative Mark Per Question</label>
                                            <input type="text" class="form-control"
                                                   id="negative_mark_per_question"
                                                   placeholder="Enter negative Mark per question"
                                                   v-model="examTest.negative_mark_per_question"
                                                   oninput="document.getElementById('negative_mark_per_question').value=document.getElementById('negative_mark_per_question').value.replace(/[^-?\d+(.\d+)?]/g,'')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Type</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <select type="text" class="form-control" id="type"
                                                        v-bind:class="errors[0]?'border-danger':''"
                                                        v-model="examTest.type">
                                                    <option value="">Select Type</option>
                                                    <option value="{{ \App\Enums\ExamTypes::MODELTEST }}">MODEL TEST
                                                    </option>
                                                    <option value="{{ \App\Enums\ExamTypes::MOCKTEST }}">MOCK TEST
                                                    </option>
                                                    <option value="{{ \App\Enums\ExamTypes::MINITEST }}">MINI TEST
                                                    </option>
                                                </select>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pass_mark">Pass Mark</label>
                                            <input type="text" class="form-control"
                                                   id="pass_mark"
                                                   placeholder="Enter Pass Mark"
                                                   v-model="examTest.pass_mark">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   v-model="examTest.status">
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
                        <h3 class="card-title">Exam Test List</h3>
                        <button class="btn btn-info float-right" @click="addExamTest"><i class="fa fa-plus"></i>Add
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="examTest-table" class="table table-bordered table-striped" width="100%">
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
            el: '#examTest',
            data: {
                dataTableData: [],
                dataTable: {},
                examTest: {
                    exam_pack_id: '',
                    title: undefined,
                    exam_schedule: undefined,
                    duration_minutes: undefined,
                    price: undefined,
                    mark_per_question: undefined,
                    negative_mark_per_question: undefined,
                    category_id: '',
                    pass_mark: undefined,
                    type: '',
                    status: true,
                },
                mode: undefined,
                error: undefined,
                formData: undefined,
                selectedIndex: undefined,
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#examTest-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'exam-test',
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
                                data: 'exam_pack_title',
                                name: 'exam_pack_title',
                                defaultContent: '',
                                title: 'Exam Pack'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'name',
                                name: 'name',
                                defaultContent: '',
                                title: 'Category'
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
                                data: 'exam_schedule', render(data, row, type) {
                                    return (new Date(data)).toLocaleString();
                                },
                                name: 'exam_schedule',
                                defaultContent: '',
                                title: 'Exam Schedule From'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'exam_schedule_to', render(data, row, type) {
                                    return (new Date(data)).toLocaleString();
                                },
                                name: 'exam_schedule_to',
                                defaultContent: '',
                                title: 'Exam Schedule To'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'duration_minutes',
                                name: 'duration_minutes',
                                defaultContent: '',
                                title: 'Duration (minutes)'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'price',
                                name: 'price',
                                defaultContent: '',
                                title: 'Price (BDT)'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'mark_per_question',
                                name: 'mark_per_question',
                                defaultContent: '',
                                title: 'Mark/Question'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'negative_mark_per_question',
                                name: 'negative_mark_per_question',
                                defaultContent: '',
                                title: '(-)Mark/Question'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'pass_mark',
                                name: 'pass_mark',
                                defaultContent: '',
                                title: 'Pass Mark'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'total_mark',
                                name: 'total_mark',
                                defaultContent: '',
                                title: 'Total Mark'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'type', render(data, row, type) {
                                    if (data == 1) return 'MODEL TEST';
                                    if (data == 2) return 'MOCK TEST';
                                    if (data == 3) return 'MINI TEST';
                                },
                                name: 'type',
                                defaultContent: '',
                                title: 'Type'
                            }, {
                                className: 'all',
                                orderable: false,
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
                                    return `<button class='badge badge-info btn btn-info edit_discount'> <i class="fa fa-edit"></i> Edit</button>
                                            <button class='badge badge-danger btn btn-danger delete_discount'> <i class="fa fa-trash"></i> Delete</button>
                                            <a href="/exam-ranking?exam_id=${data}" class='badge badge-info btn btn-primary'> <i class="fa fa-list"></i> Rank</a>
                                            <form method="post" action="{{url('exam-preview')}}"><input type="text" hidden name="exam_id" value="${data}"> @csrf <button type="submit" class='badge badge-info btn btn-primary'> <i class="fa fa-street-view"></i> Preview</button></form>
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
                    let url = 'exam-test';
                    let method = 'post';
                    this.examTest.exam_schedule = new Date(this.examTest.exam_schedule + ':00z');
                    this.examTest.exam_schedule_to = new Date(this.examTest.exam_schedule_to + ':00z');
                    if (this.mode === 'edit') {
                        url += '/' + this.dataTableData[+this.selectedIndex].id;
                        method = 'put';
                    }

                    this.ajaxCall(url, this.examTest, method, (data, code) => {
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
                    this.examTest = {
                        exam_pack_id: '',
                        title: undefined,
                        exam_schedule: undefined,
                        exam_schedule_to: undefined,
                        duration_minutes: undefined,
                        price: undefined,
                        mark_per_question: undefined,
                        negative_mark_per_question: undefined,
                        category_id: '',
                        pass_mark: undefined,
                        type: '',
                        status: true,
                    };
                },
                addExamTest() {
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
                $('#examTest-table thead tr').clone(true).appendTo('#examTest-table thead');
                $('#examTest-table thead tr:eq(1) th').each(function (i) {
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
                $('#examTest-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.examTest = that.dataTableData[that.selectedIndex];
                    that.examTest.exam_schedule = that.dataTableData[that.selectedIndex].exam_schedule.substr(0, 10) + "T" + that.dataTableData[that.selectedIndex].exam_schedule.substr(11, 5);
                    that.examTest.exam_schedule_to = that.dataTableData[that.selectedIndex].exam_schedule_to.substr(0, 10) + "T" + that.dataTableData[that.selectedIndex].exam_schedule_to.substr(11, 5);
                });

                $('#examTest-table tbody').on('click', '.delete_discount', function () {
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
                            that.ajaxCall('exam-test/' + that.dataTableData[that.selectedIndex].id, {}, 'delete', (data, code) => {
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
