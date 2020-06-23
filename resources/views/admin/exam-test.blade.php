@extends('layouts.dashboard.dashboard-layout')
@section('title',$title??'Dynamic')
@section('style-lib')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.css')}}">
    <!-- summernote style -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@push('custom-css')
    <style type="text/css">

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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="menu">Select Package</label>
                                    <select class="form-control" id="menu" v-model="examTest.exam_pack_id">
                                        <option></option>
                                        @foreach($packages as $key => $pack)
                                            <option
                                                value="{{$pack->id}}">{{$pack->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter exam title"
                                           v-model="examTest.title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exam_schedule">Exam Schedule</label>
                                    <input type="datetime-local" class="form-control" id="exam_schedule"
                                           placeholder="Enter exam schedule"
                                           v-model="examTest.exam_schedule">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="duration_minutes">Exam Duration in minutes</label>
                                    <input type="number" class="form-control" id="duration_minutes"
                                           placeholder="Enter exam duration"
                                           v-model="examTest.duration_minutes">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" placeholder="Enter exam price"
                                           v-model="examTest.price">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="menu">Mark Per Question</label>
                                    <input type="number" class="form-control" id="mark_per_question"
                                           placeholder="Enter mark per question"
                                           v-model="examTest.mark_per_question">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="negative_mark_per_question">Negative Mark Per Question</label>
                                    <input type="number" class="form-control" id="negative_mark_per_question"
                                           placeholder="Enter negative Mark per question"
                                           v-model="examTest.negative_mark_per_question">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Type</label>
                                    <input type="text" class="form-control" id="type" placeholder="Enter exam type"
                                           v-model="examTest.type">
                                </div>
                            </div>
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
                                <button
                                    :class="mode === 'create'?'btn btn-info bg-info':'btn btn-primary bg-primary'"
                                    @click="submit">
                                    @{{ mode==='create'?'Submit':'Update' }}
                                </button>
                            </div>
                        </div>
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
                        <h3 class="card-title">Dynamic Contents</h3>
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
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.js')}}"></script>

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#examTest',
            data: {
                dataTableData: [],
                dataTable: {},
                examTest: {
                    "exam_pack_id": undefined,
                    "title": undefined,
                    "exam_schedule": undefined,
                    "duration_minutes": undefined,
                    "price": undefined,
                    "mark_per_question": undefined,
                    "negative_mark_per_question": undefined,
                    "type": undefined,
                    "status": true,
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
                            url: '/exam-test',
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
                                data: 'exam_pack_id',
                                name: 'exam_pack_id',
                                defaultContent: '',
                                title: 'Exam Pack ID'
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
                                data: 'exam_schedule',
                                name: 'exam_schedule',
                                defaultContent: '',
                                title: 'Exam Schedule'
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
                                data: 'type',
                                name: 'type',
                                defaultContent: '',
                                title: 'Type'
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
                ajaxCall(api, data, method, callback, alert = false, base_url = '') {
                    (async () => {
                        await axios[method](base_url + api, {
                            ...data
                        })
                            .then(response => this.responseProcess(response.data, alert, (data, code) => callback(data, code)))
                            .catch(function (error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong! please try again later',
                                });
                            });
                    })();

                },
                responseProcess(response, alert, callback) {
                    {
                        if (response.status === 'success' || response.code === 200) {
                            if (alert)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Yahoo..',
                                    text: response.message || 'Form stored successfully',
                                });
                            callback(response.data, response.code);
                        } else {
                            if (alert)
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message || 'Something went wrong! please try again later',
                                });
                            callback(response.data, response.code);
                        }
                    }
                },
                submit() {
                    this.error = undefined;
                    let url = '/exam-test';
                    let method = 'post';
                    this.examTest.exam_schedule = new Date(this.examTest.exam_schedule);
                    if (this.mode === 'edit') {
                        this.formData.append('id', this.dataTableData[+this.selectedIndex].id);
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
                        "exam_pack_id": undefined,
                        "title": undefined,
                        "exam_schedule": undefined,
                        "duration_minutes": undefined,
                        "price": undefined,
                        "mark_per_question": undefined,
                        "negative_mark_per_question": undefined,
                        "type": undefined,
                        "status": true,
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
                this.dataTableInit({});
                const that = this;
                $('#examTest-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.examTest = that.dataTableData[that.selectedIndex];
                    that.examTest.exam_schedule = (new Date(that.dataTableData[that.selectedIndex].exam_schedule).toISOString() + '').substr(0, 16);
                    console.log(that.examTest.exam_schedule);
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