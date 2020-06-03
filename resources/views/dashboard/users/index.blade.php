@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newuser" style="float: right">New User</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table id="userstbl" width="100%" class="table table-bordered table-striped responsive nowrap">
                        <thead>
                        <tr>
                            <th width="2%">Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th width="8%">Status</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.users.users_models')
@endsection

@section('sub-scripts')
    <script>
        $(function () {
            var table = $('#userstbl').DataTable({
                order: [[ 0, "desc" ]],
                processing: true,
                serverSide: true,
                lengthMenu: [[10, 25, 50, -1], [25, 50, 100, "All"]],
                dom: 'lfBrtip',
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'copy',
                            'excel',
                            'csv',
                            'pdf',
                            'print'
                        ]
                    }
                ],
                ajax: '{{ URL::to('dashboard/users/serverside') }}',
                columns: [
                    { data: 'user_id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'mobile' },
                    {
                        data: 'status',
                        render: function (data) {
                            var bedget = 'badge badge-';
                            if(data === 'enabled'){
                                bedget += 'success';
                            } else {
                                bedget += 'danger';
                            }
                            return '<span style="cursor: pointer" id="btnstatus" class="'+bedget+'">'+data+'</span>';
                        }
                    },
                    {
                        targets: 5,
                        data: null,
                        defaultContent: '<button id="btnedit" title="Edit" type="button" class="btn btn-primary btn-sm">' +
                            '<i class="fa fa-edit" aria-hidden="true"></i></button>&nbsp;&nbsp;' +
                            '<button id="btndelete" type="button" title="Delete" class="btn btn-danger btn-sm">' +
                            '<i class="fa fa-trash" aria-hidden="true"></i>' +
                            '</button>'
                    }
                ]
            });

            $('#userstbl tbody').on( 'click', '#btnstatus', function () {
                //var data = table.row($(this).parents('tr')).data();
                var current_row = $(this).parents('tr');
                if (current_row.hasClass('child')) {
                    current_row = current_row.prev();
                }
                var data = table.row(current_row).data();
                editStatus(data.user_id,data.status);
            });

            $('#userstbl tbody').on( 'click', '#btnedit', function () {
                var current_row = $(this).parents('tr');
                if (current_row.hasClass('child')) {
                    current_row = current_row.prev();
                }
                var data = table.row(current_row).data();
                Edit(data.user_id);
            });

            $('#userstbl tbody').on( 'click', '#btndelete', function () {
                var current_row = $(this).parents('tr');
                if (current_row.hasClass('child')) {
                    current_row = current_row.prev();
                }
                var data = table.row(current_row).data();
                Delete(data.user_id,data.name);
            });
        });

        function editStatus(id,status) {
            $.post(
                "{{ URL::to('dashboard/users/editstatus') }}",
                {id: id, status: status, "_token": "{{ csrf_token() }}"},
                function (data) {
                    window.location.reload();
                }
            );
        }

        function Edit(id) {
            $.post(
                "{{ URL::to('dashboard/users/edit') }}",
                {id: id, "_token": "{{ csrf_token() }}"},
                function (data) {
                   var json = data[0];
                   $('#edit_user_id').val(json.user_id);
                   $('#edit_name').val(json.name);
                   $('#edit_email').val(json.email);
                   $('#edit_mobile').val(json.mobile);
                   $('#edituser').modal('show');
                }
            );
        }


        function Delete(id,name) {

            var con = confirm('Are you want Delete  : ' +name);
            if(con === true){
                $.ajax({
                    url: "{{ URL::to('/dashboard/users/delete') }}",
                    type: "POST",
                    data: {id: id, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        if(data === '1'){
                            window.location.reload();
                        }
                    }
                });
            }
        }
    </script>
@endsection
