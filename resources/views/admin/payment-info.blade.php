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
    <div class="container-fluid" id="paymentInfo">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Information</h3>
                        {{--                        <button class="btn btn-info float-right" @click="addExamTest"><i class="fa fa-plus"></i>Add--}}
                        {{--                        </button>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="paymentInfo-table" class="table table-bordered table-striped" width="100%">
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
            el: '#paymentInfo',
            data: {
                dataTableData: [],
                dataTable: {},
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#paymentInfo-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'payment-info',
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
                                data: 'user_name',
                                name: 'user_name',
                                defaultContent: '',
                                title: 'User Name'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'transaction_code',
                                name: 'transaction_code',
                                defaultContent: '',
                                title: 'Transaction Code'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'amount',
                                name: 'amount',
                                defaultContent: '',
                                title: 'Amount'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'payment_channel',
                                name: 'payment_channel',
                                defaultContent: '',
                                title: 'Payment Channel'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'approved_by_id',
                                name: 'approved_by_id',
                                defaultContent: '',
                                title: 'Approved By'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'status', render(data, row, type) {
                                    return data ? `<span class='badge badge-info'>Approved</span>` : `<button class='badge badge-danger btn btn-danger delete_discount'> <i class="fa fa-remove"></i>Pending</button>`;
                                },
                                name: 'status',
                                defaultContent: '',
                                title: 'Status'
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
                $('#paymentInfo-table thead tr').clone(true).appendTo('#paymentInfo-table thead');
                $('#paymentInfo-table thead tr:eq(1) th').each(function (i) {
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
                $('#paymentInfo-table tbody').on('click', '.delete_discount', function () {
                    that.dataTableData = that.dataTable.rows().data();
                    let selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    Swal.fire({
                        title: "Are you sure?",
                        text: "The payment amount is: ",
                        type: "input",
                        input: 'number',
                        icon: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        animation: "slide-from-top",
                        inputPlaceholder: "Update the amount",
                        inputValue: that.dataTableData[selectedIndex].amount,
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete.isConfirmed && willDelete.value && +willDelete.value != NaN) {
                            that.state = undefined;
                            that.ajaxCall('payment-info/' + that.dataTableData[selectedIndex].id, {amount: willDelete.value}, 'put', (data, code) => {
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
