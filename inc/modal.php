<div class="modal fade" id="changepassmodal" role="dialog">
  <div class="modal-dialog" style="width:30%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">
          <i class="fa fa-key fa-lg"></i> Change Password</h4>
        </div>
        <div class="modal-body">
          <form action="validate.php" method="post">
            <div class="form-group">
              <label style="font-size: 18px;">New Password</label>
              <input type="password" class="form-control" name="txtnewpass" required>
            </div>
            <div class="form-group">
              <label style="font-size: 18px;">Confirm Password</label>
              <input type="password" class="form-control" name="txtconpass" required>
            </div>
            <input type="submit" style="width:100%;height: 44px;background-color: #014786;margin-top: 10px;" class="btn btn-primary" name="btnchangepass"  value="Change Password" >
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="changepicmodal" role="dialog">
    <div class="modal-dialog" style="width:30%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">
            <i class="fa fa-picture-o fa-lg"></i> Change Profile Picture</h4>
          </div>
          <div class="modal-body">
            <form action="validate.php" method="post">
              <div class="form-group">
                <label style="font-size: 18px;">Image</label>
                <input type="file" class="form-control" name="txtprofilepic" required>
              </div>
              <input type="submit" style="width:100%;height: 44px;background-color: #014786;margin-top: 10px;" class="btn btn-primary" name="btnchangepic"  value="Change Profile Picture" >
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="studparentmodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Student Grade</h4>
          </div>
          <form action="crud_function.php" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="txtuname" id="txtuname" required>
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="txtfname" id="txtfname" required>
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="txtlname" id="txtlname" required>
              </div>
              <div class="form-group">
                <label>Contact</label>
                <input type="text" class="form-control" name="txtcontact" id="txtcontact" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" name="add_studparent" class="btn btn-primary pull-right">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

