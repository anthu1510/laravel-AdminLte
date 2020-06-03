<!-- The Modal -->
<div class="modal" id="newuser">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ URL::to('dashboard/users/save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" id="cpass" name="cpass" class="form-control" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="upload">Image</label>
                        <input type="file" name="upload" id="upload" placeholder="Choose file">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="edituser">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ URL::to('dashboard/users/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="hidden" name="user_id" id="edit_user_id">
                        <input type="text" id="edit_name" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="text" id="edit_email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="edit_mobile">Mobile</label>
                        <input type="text" id="edit_mobile" name="mobile" class="form-control" placeholder="Enter Mobile">
                    </div>
                    <div class="form-group">
                        <label for="edit_pass">Password</label>
                        <input type="password" id="edit_pass" name="pass" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="edit_cpass">Confirm Password</label>
                        <input type="password" id="edit_cpass" name="cpass" class="form-control" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="edit_upload">Image</label>
                        <input type="file" name="upload" id="edit_upload" placeholder="Choose file">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
