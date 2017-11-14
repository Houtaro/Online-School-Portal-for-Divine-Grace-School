<!DOCTYPE html>
<html>
<title>Messages - Online School Portal</title>
<?php include "inc/navbar.php"; ?>
<style type="text/css">
.img-circle{ margin-top: -4px; margin-bottom: -7px; }
.textsize{ font-size: 14px; font-family: 'Quicksand', sans-serif; padding-left: 8px; }
.elipsis{ display:inline-block; width:300px; white-space: nowrap; overflow:hidden !important; text-overflow: ellipsis; color:#25373D; }
.dataTables_filter { position: absolute; right: 20px; top: 0px; }
select { -webkit-appearance: none; -moz-appearance: none; text-indent: 1px; text-overflow: ''; }
</style>
<body class="hold-transition fixed skin-green layout-top-nav">
  <div class="wrapper">
    <?php 
    if ($userType == "student") { include 'inc/stud_navbar.php'; } 
    else if ($userType == "teacher") { include 'inc/emp_navbar.php'; }else { include "inc/parent_navbar.php"; }
    ?>
    <div class="content-wrapper"> 
      <section class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
              </div>
              <div class="box-body">
                <form action="function/delete_function" method="post">
                  <?php 
                  $query = "SELECT U.*,U.id as uid,C.*,C_R.* from conversation_tbl C, usertbl U, conversation_reply C_R 
                  LEFT JOIN conversation_reply C_R2 ON (C_R.c_id_fk = C_R2.c_id_fk AND C_R.CR_ID < C_R2.CR_ID)
                  where CASE 
                  WHEN C.user_one = '$sessionid'
                  THEN C.user_two = U.id 
                  WHEN C.user_two = '$sessionid'
                  THEN C.user_one = U.id 
                  END AND C.C_ID = C_R.c_id_fk
                  AND (C.user_one='$sessionid' OR C.user_two='$sessionid') AND C_R2.CR_ID IS NULL Order by C_R.CR_ID DESC limit 10";
                  $result = mysqli_query($con, $query)or die(mysqli_error($con));
                  $count = mysqli_num_rows($result);
                  ?>
                  <div class="btn-group">
                    <?php if ($count > 0) { ?>
                    <button type="submit" data-toggle="tooltip" title="Mark as read" class="btn btn-default btn-sm" name="mark_read_mes"><i class="fa fa-check fa-lg"></i></button>
                    <button type="button" data-toggle="tooltip" title="Delete" onclick="showModal()" class="btn btn-default btn-sm"><i class="fa fa-trash-o fa-lg"></i></button>
                    <?php } ?>
                    <button type="button" class="btn btn-primary btn-sm" name="newmessage" data-toggle="modal" data-target="#createconvo">Create New Message</button>
                  </div>
                  <?php if ($count > 0) { ?>
                  <table class="table table-hover table-bordered table-responsive" id="mes_example">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="id" id="checkall"></th>
                        <th>From</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Read?</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      while ($row = mysqli_fetch_array($result)) { 
                        $c_id = $row['C_ID'];
                        ?>
                        <tr>
                          <td align="center" scope="col" width="18"><input type="checkbox" id="record" name="Selector[]" value="<?php echo $row['C_ID']; ?>"></td>
                          <td><img class="img-circle img-sm" src="<?php echo $row['profile_pic']; ?>"> &nbsp;<a><?php echo $row['fname'].' '.$row['lname']; ?></a></td>
                          <td><div class="elipsis"><a href="conversation.php<?php echo '?rid='.$row['uid']."&&cid=".$row['C_ID']; ?>"><?php echo $row['reply']; ?></a></div></td>
                          <td width="170"><?php echo $row['date_time']; ?></td>
                          <td width="40" class="text-center"><?php  
                          if ($sessionid == $row['user_one'] && $row['user1_mes_status'] == 0 || $sessionid == $row['user_two'] && $row['user2_mes_status'] == 0) 
                            { echo "<i style='color:green; font-size:20px;' class='fa fa-check'></i>"; 
                        } else { echo "<i style='color:red; font-size:20px;' class='fa fa-times'></i>"; }
                        ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php  } else { ?>
                  <br><br>
                  <div class="alert alert-danger">Your inbox is Empty</div>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include "inc/script.php"; ?>
    <?php include "inc/modal.php"; ?>
    <script type="text/javascript">
      $('#mes_example').dataTable({
        "oLanguage": { "sSearch": '<span class="glyphicon glyphicon-search form-control-feedback"></span>' }
      });

      $("#checkall").click(function()
      {
        if ($("#checkall").is(':checked')) {
          $("input#record").prop("checked", true);
        } else {
          $("input#record").prop("checked", false);
        }
      })
    </script>
  </div>
</body>
</html>
