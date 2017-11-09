<div class="modal fade" id="loginmodal" role="dialog">
  <div class="modal-dialog" style="width:30%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">
          <i class="fa fa-key fa-lg"></i> Login Page</h4>
        </div>
        <div class="modal-body">
          <form action="validate.php" method="post">
            <div class="form-group">
              <label style="font-size: 18px;">Username</label>
              <input type="text" class="form-control" name="txtUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label style="font-size: 18px;">Password</label>
              <input type="password" class="form-control" name="txtPassword"  placeholder="Password" required>
            </div>
            <input type="submit" style="width:100%;height: 44px;background-color: #014786;margin-top: 10px;" class="btn btn-primary" name="btnSubmit"  value="Login" >
          </form>
        </div>
      </div>
    </div>
  </div>