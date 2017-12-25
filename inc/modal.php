<div class="modal fade" id="changepassmodal" role="dialog">
  <div class="modal-dialog" style="width:30%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">
          <i class="fa fa-key fa-lg"></i> Change Password</h4>
        </div>
        <div class="modal-body">
          <form action="crud_function.php" method="post">
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

  <!-- start import student -->
  <div class="modal fade" id="import-student" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">
            <i style=" font-size: 24px;" class="fa fa-plus-circle"> Import Students</i>
          </h4>
        </div>
        <form id="import-student-form" action="crud_function.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="prog_id" value="<?php echo $get_id; ?>">
          <input type="hidden" name="program" value="<?php echo $prog_name; ?>">
          <div class="modal-body">
            <div class="form-group">
              <a style="font-size: 24px;" href="images/student_format.csv"><i class="fa fa-download"> Download format</i></a>
            </div>
            <label>
            Import(.csv file only):</label>
            <input type="file" name="import_stud" class="form-control" required>
          </div>
          <div class="box-footer">
            <button type="submit" name="btn-import-stud" class="btn btn-primary pull-right">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end import student -->

  <div class="modal fade" id="changepicmodal" role="dialog">
    <div class="modal-dialog" style="width:30%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">
            <i class="fa fa-picture-o fa-lg"></i> Change Profile Picture</h4>
          </div>
          <div class="modal-body">
            <form action="crud_function.php" method="post" enctype="multipart/form-data">
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

    <div class="modal fade" id="createconvo" role="dialog">
      <div class="modal-dialog" style="width:30%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">
              <i class="fa fa-envelope-o"></i> Create New Message</h4>
            </div>
            <div class="modal-body">
              <form action="crud_function.php" method="post">
                <div class="form-group">
                  <label style="font-size: 18px;">To:</label>
                  <?php  
                  $quser = mysqli_query($con, "SELECT * FROM usertbl where usertype='parent' or usertype='teacher' and id!='$sessionid'")or die(mysqli_error($con));
                  ?>
                  <select name="txtreciever" id="recieverid" class="select_student" onchange="getcid()">
                    <option selected disabled>-- Select User --</option>
                    <?php while($rowus = mysqli_fetch_array($quser)){ ?>
                    <option value="<?php echo $rowus['id']; ?>"><?php echo $rowus['fname']." ".$rowus['lname']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label style="font-size: 18px;">Message:</label>
                  <textarea style="height: 100px;" name="txtmessage" class="form-control"></textarea>
                </div>
                <input type="submit" style="width:100%;height: 44px;background-color: #014786;margin-top: 10px;" class="btn btn-primary" name="btnsendmessage"  value="Send Message" >
                <input type="hidden" name="c_id" id="conid">
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="importgrade" role="dialog">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Import Student Grade</h4>
        </div>
        <form action="crud_function.php" method="post" enctype="multipart/form-data">
         <?php 
         $query = "SELECT * FROM tblschoolyear where status=0";
         $result = mysqli_query($con, $query)or die(mysqli_error($con));
         $rowsy = mysqli_fetch_array($result);
         ?>
         <input type="hidden" name="cboclass" id="cboclass" value="<?php echo $classid; ?>">
         <input type="hidden" name="cbosubjectid" id="cbosubjectid" value="<?php echo $subid; ?>">
         <div class="modal-body">
          <div class="form-group">
            <label>Student Grade</label>
            <input type="file" class="form-control" name="studentgrade" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" name="import_studentgrade" class="btn btn-primary pull-right">Add Student Grade</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="studentgrade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Student Grade</h4>
  </div>
  <form action="crud_function.php" method="post">
    <div class="modal-body">
     <input type="hidden" name="cboclass" id="cboclass" value="<?php echo $classid; ?>">
     <input type="hidden" name="cbosubjectid" id="cbosubjectid" value="<?php echo $subid; ?>">
     <div class="form-group">
      <label>Student:</label>
      <select class="form-control student" name="cbostudent"  id="cbostudent" onchange="show_subj()" required>
        <?php 
        $stud = mysqli_query($con,"SELECT *,s.id as studID from tblstudentclass sc 
          left join usertbl s on sc.studentid = s.id 
          where sc.classid = '$classid' and sc.subjectid = '$subid' group by sc.studentid")or die(mysqli_error($con));

        while($rowstud = mysqli_fetch_array($stud))
        {
          echo '<option value="'.$rowstud['studID'].'">'.$rowstud['lname'].', '.$rowstud['fname'].' '.$rowstud['mname'].'</option>';
        }
        ?>
      </select>
    </div>
    <div class="form-group">
     <label>First Grading</label>
     <input type="number" class="form-control" name="prelim" id="prelim" maxlength="3" min="0" required>
   </div>
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="submit" name="add_studentgrade" class="btn btn-primary pull-right">Add Student Grade</button>
</div>
</form>
</div>
</div>
</div>

<script>
  $(".select_student").select2({ width: 380 });
  $(".student").select2({ width: 570 });
  function getcid(){
    $.ajax({
      type : "POST",
      url : "crud_function.php",
      data : { get_cid : "1", recieverid : $("#recieverid").val() },
      success : function(res){ $("#conid").val(res); }
    })
  }
</script>