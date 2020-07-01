<!-- Change Password Modal -->
<div class="modal fade" id="change_password" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Change Password?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="model/change_password.php">
          <div class="form-group">
              <label class="small mb-1" for="Username">Username</label>
                <input class="form-control py-4" id="Username" type="text" placeholder="Enter username" name="username" readonly value="<?php echo $_SESSION['username'];?>" />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword">Enter New Password</label>
              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="new_pass" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword1">Confirm Password</label>
              <input class="form-control py-4" id="inputPassword1" type="password" placeholder="Enter password" name="conf_pass" required />
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="changepass">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->

<!-- Add user Modal -->
<div class="modal fade" id="new_user" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="model/add_new_user.php">
          <div class="form-group">
              <label class="small mb-1" for="Username">Username</label>
                <input class="form-control py-4" id="Username" type="text" placeholder="Enter username" name="username" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="inputPassword">Enter New Password</label>
              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="new_pass" required />
          </div>
          <div class="form-group">
              <label class="small mb-1" for="usertype">User Type</label>
              <select class="form-control" id="usertype" name="user_type" required >
                <option disabled>Select...</option>
                <option value="admin">Admin</option>
                <option value="guest">Guest</option>
              </select>
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- End of modal -->