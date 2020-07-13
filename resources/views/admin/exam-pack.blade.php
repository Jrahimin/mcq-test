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
    <div class="container-fluid" id="examPack">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="text" class="form-control" id="title"
                                                       placeholder="Enter package title"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="examPack.title">
                                            </validation-provider>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mini_test">Mini Test</label>
                                            <input type="number" class="form-control" id="mini_test"
                                                   placeholder="Enter mini test number"
                                                   v-model="examPack.mini_test_count">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mock_test">Mock Test</label>
                                            <input type="number" class="form-control" id="mock_test"
                                                   placeholder="Enter mock test number"
                                                   v-model="examPack.mock_test_count">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="model_test">Model Test</label>
                                            <input type="number" class="form-control" id="model_test"
                                                   placeholder="Enter model test number"
                                                   v-model="examPack.model_test_count">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="number" class="form-control" id="price"
                                                       placeholder="Enter exam price"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="examPack.price">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="from_date">Active From</label>

                                            <input type="datetime-local"
                                                   class="form-control" id="from_date"
                                                   placeholder="Enter Activation From"
                                                   v-model="examPack.from_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="to_date">Active Till</label>

                                            <input type="datetime-local"
                                                   class="form-control" id="to_date"
                                                   placeholder="Enter Activation Till"
                                                   v-model="examPack.to_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   v-model="examPack.status">
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
                        <h3 class="card-title">Exam Pack List</h3>
                        <button class="btn btn-info float-right" @click="addExamTest"><i class="fa fa-plus"></i>Add
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="examPack-table" class="table table-bordered table-striped" width="100%">
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
            el: '#examPack',
            data: {
                dataTableData: [],
                dataTable: {},
                examPack: {
                    "title": undefined,
                    "mini_test_count": undefined,
                    "mock_test_count": undefined,
                    "model_test_count": undefined,
                    "price": undefined,
                    "from_date": undefined,
                    "to_date": undefined,
                    "status": true,
                },
                mode: undefined,
                error: undefined,
                formData: undefined,
                selectedIndex: undefined,
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#examPack-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'exam-pack',
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
                                data: 'title',
                                name: 'title',
                                defaultContent: '',
                                title: 'Title'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'mini_test_count',
                                name: 'mini_test_count',
                                defaultContent: '',
                                title: 'Mini Test Count'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'mock_test_count',
                                name: 'mock_test_count',
                                defaultContent: '',
                                title: 'Mock Test Count'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'price',
                                name: 'price',
                                defaultContent: '',
                                title: 'Price'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'from_date', render(data, row, type) {
                                    return (new Date(data)).toLocaleString();
                                },
                                name: 'from_date',
                                defaultContent: '',
                                title: 'Form Date'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'to_date', render(data, row, type) {
                                    return (new Date(data)).toLocaleString();
                                },
                                name: 'to_date',
                                defaultContent: '',
                                title: 'To Date'
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
                    let url = 'exam-pack';
                    let method = 'post';
                    this.examPack.from_date = new Date(this.examPack.from_date + ':00z');
                    this.examPack.to_date = new Date(this.examPack.to_date + ':00z');
                    if (this.mode === 'edit') {
                        url += '/' + this.dataTableData[+this.selectedIndex].id;
                        method = 'put';
                    }

                    this.ajaxCall(url, this.examPack, method, (data, code) => {
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
                    this.examPack = {
                        "title": undefined,
                        "mini_test_count": undefined,
                        "mock_test_count": undefined,
                        "model_test_count": undefined,
                        "price": undefined,
                        "from_date": undefined,
                        "to_date": undefined,
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
                const that = this;
                this.dataTableInit({});
                $('#examPack-table thead tr').clone(true).appendTo('#examPack-table thead');
                $('#examPack-table thead tr:eq(1) th').each(function (i) {
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
                $('#examPack-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.examPack = that.dataTableData[that.selectedIndex];
                    that.examPack.from_date = that.examPack.from_date.substr(0, 10) + "T" + that.examPack.from_date.substr(11, 5);
                    that.examPack.to_date = that.examPack.to_date.substr(0, 10) + "T" + that.examPack.to_date.substr(11, 5);
                });

                $('#examPack-table tbody').on('click', '.delete_discount', function () {
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
                            that.ajaxCall('exam-pack/' + that.dataTableData[that.selectedIndex].id, {}, 'delete', (data, code) => {
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
