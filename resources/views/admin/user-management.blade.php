@extends('layouts.dashboard.dashboard-layout')
@section('title',$title??'User Management')
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
    <div class="container-fluid" id="userManagement">
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
                                            <label for="title">Name</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="text" class="form-control" id="name"
                                                       placeholder="Enter Name"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="userManagement.name">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mini_test">Email</label>
                                            <validation-provider rules="required"
                                                                 v-slot="{ errors }">
                                                <input type="email" class="form-control" id="email"
                                                       placeholder="Enter email address"
                                                       v-bind:class="errors[0]?'border-danger':''"
                                                       v-model="userManagement.email">
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile_no">Mobile No.</label>
                                            <input type="text" class="form-control" id="mobile_no"
                                                   placeholder="Enter mobile number"
                                                   v-model="userManagement.mobile_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                   placeholder="Enter address"
                                                   v-model="userManagement.address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="from_date">User Type</label>

                                            <select type="text" class="form-control" id="type"
                                                    v-model="userManagement.type">
                                                <option value="">Select Type</option>
                                                @foreach($userTypes as $key=>$userType)
                                                    <option value="{{$key}}">{{$userType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                                   v-model="userManagement.status">
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
                        <h3 class="card-title">User List</h3>
                        <button class="btn btn-info float-right" @click="addExamTest"><i class="fa fa-plus"></i>Add
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" style="width:100%">
                            <table id="userManagement-table" class="table table-bordered table-striped" width="100%">
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
        <div class="modal fade" id="balance_adjustment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block">
                        <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true"><i class="fa fa-times-circle text-danger"></i></span></button>
                        <h4 class="modal-title"
                            id="exampleModalLabel">Adjust Balance
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" v-if="userManagement">
                            <label for="recipient-name" class="control-label">Name</label>
                            <input type="text" readonly class="form-control" id="name_b_a" :value="userManagement.name">
                        </div>
                        <div class="form-group" v-if="userManagement">
                            <label for="recipient-name" class="control-label">Email</label>
                            <input type="email" readonly class="form-control" id="email_b_a"
                                   :value="userManagement.email">
                        </div>
                        <div class="form-group">

                            <label for="recipient-name" class="control-label">Amount(BDT)</label>
                            <input type="text" class="form-control" id="adjust_amount"
                                   oninput="document.getElementById('adjust_amount').value=document.getElementById('adjust_amount').value.replace(/[^\d]*/g,'')">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Reason</label>
                            <textarea class="form-control" id="balance_adjust_reason"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" @click="balanceAdjustment(-1)">Reduce</button>
                        <button type="button" class="btn btn-primary" @click="balanceAdjustment(1)">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="password_reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <validation-observer v-slot="{ handleSubmit }">
                        <form @submit.prevent="handleSubmit(passwordReset)">
                            <div class="modal-header d-block">
                                <button type="button" class="close border-0" data-dismiss="modal"
                                        aria-label="Close"><span
                                        aria-hidden="true"><i class="fa fa-times-circle text-danger"></i></span>
                                </button>
                                <h4 class="modal-title"
                                    id="exampleModalLabel">Password Reset
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" v-if="userManagement">
                                    <label for="name_b_a" class="control-label">Name</label>
                                    <input type="text" readonly class="form-control" id="name_b_a"
                                           :value="userManagement.name">
                                </div>
                                <div class="form-group" v-if="userManagement">
                                    <label for="email_b_a" class="control-label">Email</label>
                                    <input type="email" readonly class="form-control" id="email_b_a"
                                           :value="userManagement.email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <validation-provider rules="required" vid="password"
                                                         v-slot="{ errors }">
                                        <input type="password" class="form-control"
                                               v-model="reset_password.password"
                                               v-bind:class="errors[0]?'border-danger':''" ref="password">
                                        <span class="text-danger"
                                              v-if="errors[0]">Password should at-least 6 characters</span>
                                    </validation-provider>

                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="control-label">Confirm Password</label>
                                    <validation-provider rules="required"
                                                         v-slot="{ errors }">
                                        <input type="password" class="form-control"
                                               v-model="reset_password.password_confirmation"
                                               v-bind:class="errors[0]?'border-danger':''">
                                        <span class="text-danger" v-if="errors[0]">Password and confirm password doesn't match</span>
                                    </validation-provider>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-primary">Reset</button>
                            </div>
                        </form>
                    </validation-observer>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script-lib')

@endsection
@push('custom-js')
    <script defer type="text/javascript">
        new Vue({
            el: '#userManagement',
            data: {
                dataTableData: [],
                dataTable: {},
                userManagement: {
                    "name": undefined,
                    "email": undefined,
                    "balance": undefined,
                    "mobile_no": undefined,
                    "address": undefined,
                    "type": '',
                    "status": true,
                },
                reset_password: {
                    password: '',
                    password_confirmation: '',
                },
                mode: undefined,
                error: undefined,
                formData: undefined,
                selectedIndex: undefined,
            },
            methods: {
                dataTableInit(data) {
                    this.dataTable = $('#userManagement-table').DataTable({
                        processing: true,
                        serverSide: true,
                        pagingType: "full_numbers",

                        ajax: {
                            url: 'user-management{{isset($from_date)?'?from_date='.$from_date:(isset($status)?'?status='.$status:'')}}',
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
                                title: 'Full Name'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'email',
                                name: 'email',
                                defaultContent: '',
                                title: 'email'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'balance',
                                name: 'balance',
                                defaultContent: '',
                                title: 'balance'
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
                                data: 'address',
                                name: 'address',
                                defaultContent: '',
                                title: 'Address'
                            }, {
                                className: 'details-control',
                                orderable: true,
                                data: 'type',
                                name: 'type',
                                defaultContent: '',
                                title: 'Account Type'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'status', render(data, row, type) {
                                    return data ? `<span class='badge badge-info fa-lock'>Active</span>` : `<span class='badge badge-danger'>Inactive</span>`;
                                },
                                name: 'status',
                                defaultContent: '',
                                title: 'Status'
                            }, {
                                className: 'all',
                                orderable: true,
                                data: 'id', render(data, row, type) {
                                    return `<div class='btn btn-group'><button class='badge badge-info btn btn-info edit_discount'> <i class="fa fa-edit"></i>Edit</button>
                                            <button class='badge badge-danger btn btn-danger delete_discount'> <i class="fa fa-trash"> </i>Delete</button>
                                              @if(auth()->user()->type==1)
                                    <button class='badge badge-warning btn btn-warning balance_adjustment'> <i class="fa fa-gift"></i> Refund</button>
                                    <button class='badge badge-danger btn btn-danger password_reset'> <i class="fa fa-key"></i> Reset</button>
@endif
                                    </div>`;
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
                    let url = 'user-management';
                    let method = 'post';
                    if (this.mode === 'edit') {
                        url += '/' + this.dataTableData[+this.selectedIndex].id;
                        method = 'put';
                    }

                    this.ajaxCall(url, this.userManagement, method, (data, code) => {
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
                    this.userManagement = {
                        "name": undefined,
                        "email": undefined,
                        "balance": undefined,
                        "mobile_no": undefined,
                        "address": undefined,
                        "type": '',
                        "status": true,
                        "password": undefined,
                    };
                    this.reset_password = {
                        password: '',
                        password_confirmation: '',
                    }
                },
                addExamTest() {
                    this.reset();
                    this.mode = 'create';
                },
                closeEditor() {
                    this.mode = undefined;
                },
                balanceAdjustment(sign = 1) {
                    const amount = document.getElementById('adjust_amount').value * sign;
                    const reason = document.getElementById('balance_adjust_reason').value;
                    if (!document.getElementById('adjust_amount').value || (reason || '').length < 5) {
                        swal('Fail!', 'Write a valid amount and reason', 'error');
                        return;
                    }
                    this.ajaxCall('user-management/balance-adjust/' + this.dataTableData[this.selectedIndex].id, {
                        amount,
                        reason
                    }, 'post', (data, code) => {
                        if (code === 200) {
                            $("#balance_adjustment").modal('hide');
                            document.getElementById('adjust_amount').value = '';
                            document.getElementById('balance_adjust_reason').value = '';
                        }
                    }, true);
                },
                passwordReset() {
                    this.ajaxCall('user-management/password-reset/' + this.userManagement.id, {...this.reset_password}, 'put', (data, code) => {
                        $("#password_reset").modal('hide');
                    }, true);
                }
            },
            mounted() {
                const that = this;
                this.dataTableInit({});
                $('#userManagement-table thead tr').clone(true).appendTo('#userManagement-table thead');
                $('#userManagement-table thead tr:eq(1) th').each(function (i) {
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
                $('#userManagement-table tbody').on('click', '.edit_discount', function () {
                    that.reset();
                    that.mode = 'edit';
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.userManagement = that.dataTableData[that.selectedIndex];
                });

                $('#userManagement-table tbody').on('click', '.delete_discount', function () {
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
                            that.ajaxCall('user-management/' + that.dataTableData[that.selectedIndex].id, {}, 'delete', (data, code) => {
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
                $('#userManagement-table tbody').on('click', '.balance_adjustment', function () {
                    that.reset();
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.userManagement = that.dataTableData[that.selectedIndex];
                    $("#balance_adjustment").modal('show');
                });
                $('#userManagement-table tbody').on('click', '.password_reset', function () {
                    that.reset();
                    that.dataTableData = that.dataTable.rows().data();
                    that.selectedIndex = that.dataTable.row($(this).parent().parent()).index();
                    that.userManagement = that.dataTableData[that.selectedIndex];
                    $("#password_reset").modal('show');
                });
            },
        })
    </script>
@endpush
