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
    <div class="container-fluid" id="about">
        <div class="row" v-if="mode">
            <div class="col-12">
                <div class="card">
                    <div class="alert alert-danger alert-dismissible" v-if="error">
                        <button type="button" class="close" data-dismiss="alert" @click="error=undefined">&times;
                        </button>
                        <strong>Warning!</strong>@{{ error }}
                    </div>
                    <div class="card-header">
                        <h5>@{{mode.toUpperCase()}}</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="javascript:void(0)" class="float-right bg-dark" @click="closeEditor"><i
                                class="fa fa-window-close"></i></a>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#english">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#bangla">Bangla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#other">File/Others</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="english" class="tab-pane active"><br>
                                <div class="form-group">
                                    <label for="title_en">Description</label>
                                    <div class="mb-3">
                                        <textarea id="description_en" class="textarea form-control"
                                                  placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px;
                                        line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="bangla" class="tab-pane fade"><br>
                                <div class="form-group">
                                    <label for="title_bn">Description</label>
                                    <div class="mb-3">
                                        <textarea id="description_bn" class="textarea form-control"
                                                  placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px;
                                        line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div id="other" class="tab-pane fade"><br>
                                <div class="form-group">
                                    <label for="menu">Select Menu</label>
                                    <select class="form-control" id="menu" v-model="about.menu_id">
                                        <option></option>
{{--                                        @foreach(SubMenuHelper::SubMenu('pages.dynamic') as $key => $sm)--}}
{{--                                            <option--}}
{{--                                                value="{{$sm->id}}">{{$sm->title_en.' ('.($sm->parent_id==0?'Parent':$sm->childMenus->title_en).':'.$sm->id.')'}}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                               v-model="about.status">
                                        <label class="form-check-label" for="exampleCheck1">Is Active</label>
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
                        <button class="btn btn-info float-right" @click="addAbout"><i class="fa fa-plus"></i>Add
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="about-table" class="table table-bordered table-striped" width="100%">
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
            el: '#about',
            data: {
                dataTableData: [],
                dataTable: {},
                about: {
                    "description_en": undefined,
                    "description_bn": undefined,
                    "status": false,
                    "menu_id": undefined,
                },
                mode: undefined,
                error: undefined,
                formData: undefined,
                selectedIndex: undefined,
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#about-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: '/dynamic',
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
                                data: 'description_en',
                                name: 'description_en', render(data, type, row) {
                                    return data;
                                },
                                defaultContent: '',
                                title: 'Description English'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'description_bn',
                                name: 'description_bn',
                                defaultContent: '',
                                title: 'Description Bangla'
                            },  {
                                className: 'all',
                                orderable: true,
                                data: 'menu_id', render(data, row, type) {
                                    return data ? `<span class='badge badge-info'>${data}</span>` : `<span class='badge badge-danger'>No Menu ID</span>`;
                                },
                                name: 'menu_id',
                                defaultContent: '',
                                title: 'Menu ID'
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
                ajaxCall(url, data, method = 'POST', callback, alert = true) {
                    (async () => {
                        const rawResponse = await fetch(url, {
                            method: method,
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            body: data,
                        });
                        const content = await rawResponse.json();
                        if (content.status === 'success' || content.code === 200) {
                            callback(content.data, 200);
                        } else {
                            callback([], content.code);
                        }
                        if (alert)
                            sweetAlert(content.status.toUpperCase(), content.message);
                    })();
                },
                submit() {
                    this.about.description_en = $('#description_en').summernote('code');
                    this.about.description_bn = $("#description_bn").summernote('code');

                    if (!this.about.description_en) {
                        this.error = 'English description is missing';
                        return;
                    }
                    if (!this.about.description_bn) {
                        this.error = 'Bangla description is missing';
                        return;
                    }
                    this.formData.append('description_en', this.about.description_en);
                    this.formData.append('description_bn', this.about.description_bn);
                    this.formData.append('status', this.about.status);
                    this.formData.append('menu_id', this.about.menu_id);
                    this.error = undefined;
                    let url = '/dynamic';
                    if (this.mode === 'edit') {
                        this.formData.append('id', this.dataTableData[+this.selectedIndex].id);
                        this.formData.append('_method', 'PUT');
                        url += '/' + this.dataTableData[+this.selectedIndex].id;
                    }

                    this.ajaxCall(url, this.formData, 'POST', (data, code) => {
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
                    this.formData = new FormData();
                    this.about = {
                        "description_en": undefined,
                        "description_bn": undefined,
                        "status": true,
                        "menu_id": undefined,
                    };
                    setTimeout(() => $('.textarea').summernote('reset'), 100);
                    $('#file').val('');
                },
                addAbout() {
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
                $('#about-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.about = that.dataTableData[that.selectedIndex];
                    setTimeout(() => {
                        $("#description_en").summernote('code', that.dataTableData[that.selectedIndex].description_en);
                        $("#description_bn").summernote('code', that.dataTableData[that.selectedIndex].description_bn);
                    }, 500);
                });

                $('#about-table tbody').on('click', '.delete_discount', function () {
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
                            that.ajaxCall('dynamic/' + that.dataTableData[that.selectedIndex].id, {}, 'DELETE', (data, code) => {
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
