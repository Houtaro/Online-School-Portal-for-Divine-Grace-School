<!DOCTYPE html>
<html>
<head>
  <title>Student Grades - Online School Portal </title>
  <?php include "inc/navbar.php"; ?>
  <style type="text/css">
    tbody tr:nth-child(odd){
      background-color: #5bc0de;
      border-color: #46b8da;
    }
    tbody tr:nth-child(odd) td{
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #fff;
    }
  </style>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
  <div class="wrapper">
    <?php include "inc/emp_navbar.php"; ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1> Student Grades</h1>
      </section>
      <section class="content">
        <?php 
        if(!empty($_GET['classid']) && !empty($_GET['subid'])){
          $classid = validate($_GET['classid']);
          $subid = validate($_GET['subid']);
          ?>
          <div class="nav-tabs-custom">
            <ul style="border-bottom:3px solid #3c8dbc;" class="nav nav-tabs responsive" id="profileTab">
              <li class="emp_info active" id="personal-tab" onclick="setmodule('Teacher Info')">
                <a href="#topstud" data-toggle="tab">
                  <i class="fa fa-graduation-caps"></i> Top Students
                </a>
              </li>

              <li class="emp_credential" id="logincred-tab" onclick="setmodule('Teacher Credentials')">
                <a href="#studgrade" data-toggle="tab">
                  <i class="fa fa-book"></i> Student Grades 
                </a>
              </li>
            </ul>

            <div id='content' class="tab-content responsive" style="border-bottom: 3px solid #3c8dbc;">
              <div class="tab-pane active" id="topstud">
                <div class="row">
                  <div class="col-sm-7">
                    <form id="submit_topstudents" action="crud_function.php" method="post">
                      <input type="hidden" name="classid" value="<?php echo $classid; ?>">
                      <input type="hidden" name="subid" value="<?php echo $subid; ?>">
                      <button type="button" id="del_topstudents" class="btn btn-danger">Delete</button>
                      <hr style="margin-top:4px;">
                      <input type="hidden" name="del_topstudents" value="1">

                      <div class="form-group">
                      <label style="padding-top:10px;font-size:20px;">List of students in this grading period:</label>
                        <select style="width:30%;padding:8px;margin-bottom:10px;" id="grading_period" onchange="gettopstudents()" class="form-control pull-right">
                          <option>Prelim</option>
                          <option>Midterm</option>
                          <option>Pre Final</option>
                          <option>Final</option>
                        </select>
                      </div>
                      <div id="show_topstudents"></div>
                    </form>
                  </div>

                  <div class="col-sm-5">
                    <div class="box box-success">
                    <div class="box-body">
                      <form action="crud_function.php" method="post">
                        <input type="hidden" name="cboclass" id="cboclass" value="<?php echo $classid; ?>">
                        <input type="hidden" name="cbosubjectid" id="cbosubjectid" value="<?php echo $subid; ?>">
                        <div class="form-group">
                          <label>Student:</label>
                          <select class="form-control" style="padding:8px;" name="cbostudent"  id="cbostudent" onchange="show_subj()" required>
                            <?php 
                            $stud = mysqli_query($con,"SELECT *,s.id as studID from tblstudentclass sc left join usertbl s on sc.studentid = s.id where sc.classid = '$classid' and sc.subjectid = '$subid' group by sc.studentid");
                            while($rowstud = mysqli_fetch_array($stud))
                            {
                              echo '<option value="'.$rowstud['studID'].'">'.$rowstud['lname'].', '.$rowstud['fname'].' '.$rowstud['mname'].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Period:</label>
                          <select class="form-control" style="padding:8px;" name="cboperiod"  id="cboperiod" required>
                            <option>Prelim</option>
                            <option>Midterm</option>
                            <option>Pre Final</option>
                            <option>Final</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Grade</label>
                          <input type="text" class="form-control" name="grade" id="grade" maxlength="3" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="add_topstudent" class="btn btn-primary pull-right">Save</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="studgrade">
                <form action="crud_function.php" method="post">
                  <button style="padding:6px;" type="button" name="add_studgrade" data-toggle="modal" data-target="#studentgrade" class="btn btn-primary">Add Student Grades</button>
                  <button style="padding:6px;" type="button" name="importgrade" data-toggle="modal" data-target="#importgrade" class="btn btn-warning">Import Student Grades</button>
                  <?php
                  $result = mysqli_query($con, "SELECT *,sg.id as sgid, sb.id as subid, c.id as clasid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
                    FROM tblstudentgrade sg
                    LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
                    AND sg.studentid = sc.studentid
                    AND sg.subjectid = sc.subjectid
                    LEFT JOIN usertbl s ON sg.studentid = s.id
                    LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
                    LEFT JOIN usertbl t ON sg.adviserid = t.id
                    LEFT JOIN tblclass c ON sg.classid = c.id
                    LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
                    where sg.adviserid = '".$sessionid."' and sg.subjectid='".$subid."' and sg.classid='".$classid."' group by sgid")or die(mysqli_error($con));
                  if(mysqli_num_rows($result) > 0){
                    ?>
                    <input type="hidden" name="cboclass" value="<?php echo $classid; ?>">
                    <input type="hidden" name="cbosubjectid" value="<?php echo $subid; ?>">
                    <button style="padding:6px;" type="button" data-toggle="modal" data-target="#del_studgrade" class="btn btn-danger">Delete</button>
                    <a style="padding:6px;" href="print.php<?php echo '?subid='.$subid.'&classid='.$classid; ?>" class="btn btn-info">Print Grades</a>
                    <hr style="margin-top:4px;">
                    <table class="table table-bordered" id="example"> 
                     <thead> 
                      <tr>
                        <th><input type="checkbox" name="id" id="checkall"></th> 
                        <th>Student</th>
                        <th>First Grading</th> 
                        <th>Second Grading</th> 
                        <th>Third Grading</th>
                        <th>Fourth Grading</th>
                        <th>Final Grade</th>
                        <th>Remarks</th>
                        <th>Adviser</th>
                        <th></th>
                      </tr> 
                    </thead>
                    <tbody style="color:black;"> 
                      <?php
                      while($row = mysqli_fetch_array($result)) {  
                       ?>
                       <tr> 
                        <th class="text-center" scope="row"><input type="checkbox" id="record" name="sgid[]" value="<?php echo $row['sgid']; ?>"></th>
                        <td><?php echo $row['sname']; ?></td> 
                        <td><?php echo $row['prelim']; ?></td> 
                        <td><?php echo $row['midterm']; ?></td> 
                        <td><?php echo $row['prefi']; ?></td> 
                        <td><?php echo $row['final']; ?></td> 
                        <td><?php echo $row['gradeaverage']; ?></td> 
                        <td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
                        <td><?php echo $row['tname']; ?></td> 
                        <td width="40"><button type="button" class="btn btn-success btn-sm" onclick="editgrade('<?php echo $row['sgid']; ?>')" data-target="<?php echo $row['sgid'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                      </tr> 
                      <?php  } ?>
                    </tbody> 
                  </table>
                  <?php }else{ ?>
                  <div class="alert alert-danger">No data found.</div>
                  <?php } ?>
                  <div class="modal fade" id="del_studgrade" role="dialog">
                   <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <i class="fa fa-question"> Delete Student Grade</i>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">Are you sure you want to delete the selected student grades?</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" name="del_studgrade" class="btn btn-danger pull-right">Yes</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php }else{ ?><div class="alert alert-danger">No data found.</div><?php } ?>
    </section>
  </div>
  <?php include "inc/script.php"; ?>
  <div class="modal fade" id="studentgrade" role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Student Grade</h4>
    </div>
    <form action="crud_function.php" method="post">
      <div class="modal-body">
       <?php 
       $query = "SELECT * FROM tblschoolyear where status=0";
       $result = mysqli_query($con, $query)or die(mysqli_error($con));
       $rowsy = mysqli_fetch_array($result);
       ?>
       <input type="hidden" name="cboSchoolYear" id="cboSchoolYear" value="<?php echo $rowsy['id']; ?>">
       <input type="hidden" name="cboclass" id="cboclass" value="<?php echo $classid; ?>">
       <input type="hidden" name="cbosubjectid" id="cbosubjectid" value="<?php echo $subid; ?>">
       <div class="form-group">
        <label>Student:</label>
        <select class="form-control" style="padding:8px;" name="cbostudent"  id="cbostudent" onchange="show_subj()" required>
          <?php 
          $stud = mysqli_query($con,"SELECT *,s.id as studID from tblstudentclass sc left join usertbl s on sc.studentid = s.id where sc.classid = '$classid' and sc.subjectid = '$subid' group by sc.studentid");
          while($rowstud = mysqli_fetch_array($stud))
          {
            echo '<option value="'.$rowstud['studID'].'">'.$rowstud['lname'].', '.$rowstud['fname'].' '.$rowstud['mname'].'</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
       <label>Prelim</label>
       <input type="text" class="form-control" name="prelim" id="prelim" maxlength="3" required>
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
   <input type="hidden" name="cboSchoolYear" id="cboSchoolYear" value="<?php echo $rowsy['id']; ?>">
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
<div id="editModal" class="modal fade"></div>
<script>
  $("#del_topstudents").click(function(){
    var conf = confirm("Are you sure you want to delete the selected top 10 students?");
    if(conf == true){
      $("#submit_topstudents").submit();
    }
  })
  function editgrade(id){
    $.ajax({
      type : "POST",
      url : "editModal.php",
      data : { sgid:id },
      success: function(res){
        $("#editModal").html(res);
      }
    })
    $("#editModal").modal("show");
  }
  $("#checkalls").click(function()
  {
    if ($("#checkalls").is(':checked')) {
      $("input#records").prop("checked", true);
    } else {
      $("input#records").prop("checked", false);
    }
  })

  $("#checkall").click(function()
  {
    if ($("#checkall").is(':checked')) {
      $("input#record").prop("checked", true);
    } else {
      $("input#record").prop("checked", false);
    }
  })
  $(document).ready(function(){ gettopstudents(); });
  function gettopstudents(){
    var period = $("#grading_period").val();
    $.ajax({
      type:'POST',
      url:'crud_function.php',
      data: { period, get_top_students:'1', classid:'<?php echo $classid; ?>', subid:'<?php echo $subid; ?>' },
      success:function(res){
        $('#show_topstudents').html(res);
      }
    }); 
  }
</script>
</div>
</body>
</html>

