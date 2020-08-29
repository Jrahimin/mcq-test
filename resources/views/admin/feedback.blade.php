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
    <div class="container-fluid" id="feedback">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Feedback Information</h3>
                        {{--                        <button class="btn btn-info float-right" @click="addExamTest"><i class="fa fa-plus"></i>Add--}}
                        {{--                        </button>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="feedback-table" class="table table-bordered table-striped" width="100%">
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
            el: '#feedback',
            data: {
                dataTableData: [],
                dataTable: {},
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#feedback-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'feedback-list',
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
                                data: 'name',
                                name: 'name',
                                defaultContent: '',
                                title: 'Name'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'mobile_no',
                                name: 'mobile_no',
                                defaultContent: '',
                                title: 'Mobile No.'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'email',
                                name: 'email',
                                defaultContent: '',
                                title: 'Email'
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
                                data: 'message',
                                name: 'message',
                                defaultContent: '',
                                title: 'Message'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'is_read', render(data, row, type) {
                                    return data ? `<span class='badge badge-info'>Read</span>` : `<button class='badge badge-danger btn btn-danger reply'> <i class="fa fa-remove"></i>Unread</button>`;
                                },
                                name: 'is_read',
                                defaultContent: '',
                                title: 'Status & Action'
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
            },
            mounted() {
                const that = this;
                this.dataTableInit({});
                $('#feedback-table thead tr').clone(true).appendTo('#feedback-table thead');
                $('#feedback-table thead tr:eq(1) th').each(function (i) {
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
                $('#feedback-table tbody').on('click', '.reply', function () {
                    that.dataTableData = that.dataTable.rows().data();
                    let selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "The payment amount is: ",
                        icon: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            that.state = undefined;
                            that.ajaxCall('feedback-read-status-update/' + that.dataTableData[selectedIndex].id, {}, 'post', (data, code) => {
                                if (code === 200) {
                                    that.dataTableData[selectedIndex] = data;
                                    that.dataTable.clear();
                                    that.dataTable.rows.add(that.dataTableData);
                                    that.dataTable.draw();
                                }
                            }, true);
                        }
                    });
                });
            },
        })
    </script>
@endpush
