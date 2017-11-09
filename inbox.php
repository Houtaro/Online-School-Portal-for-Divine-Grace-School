<!DOCTYPE html>
<html>
<title>Messages - Online School Portal</title>
<?php include "inc/navbar.php"; ?>
<style type="text/css">
  .img-circle{ margin-top: -4px; margin-bottom: -7px; }
  .textsize{ font-size: 14px; font-family: 'Quicksand', sans-serif; padding-left: 8px; }
  .elipsis{ display:inline-block; width:300px; white-space: nowrap; overflow:hidden !important; text-overflow: ellipsis; color:#25373D; }
  .dataTables_filter { position: absolute; right: 20px; top: 0px; }
</style>
<body class="hold-transition fixed skin-green layout-top-nav">
  <div class="wrapper">
    <?php 
    if ($userType == "student") { include 'inc/stud_navbar.php'; } 
    else if ($userType == "teacher") { include 'inc/emp_navbar.php'; }
    ?>
    <div class="content-wrapper"> 
      <section class="content">
        <div class="row">
          <div class="col-sm-7">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
              </div>
              <div class="box-body">
                <form action="function/delete_function" method="post">
                  <?php 
                  $query = "SELECT U.*,C.*,C_R.* from conversation_tbl C, usertbl U, conversation_reply C_R 
                  LEFT JOIN conversation_reply C_R2 ON (C_R.c_id_fk = C_R2.c_id_fk AND C_R.CR_ID < C_R2.CR_ID)
                  where CASE 
                  WHEN C.user_one = '$username'
                  THEN C.user_two = U.username 
                  WHEN C.user_two = '$username'
                  THEN C.user_one = U.username 
                  END AND C.C_ID = C_R.c_id_fk
                  AND (C.user_one='$username' OR C.user_two='$username') AND C_R2.CR_ID IS NULL Order by C_R.CR_ID DESC limit 10";
                  $result = mysqli_query($con, $query)or die(mysqli_error($con));
                  $count = mysqli_num_rows($result);
                  ?>
                  <div class="mailbox-controls">
                    <div class="btn-group">
                      <?php if ($count > 0) { ?>
                      <button type="button" data-toggle="tooltip" title="Check All" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o fa-lg"></i>
                      </button>
                      <button type="submit" data-toggle="tooltip" title="Mark as read" class="btn btn-default btn-sm" name="mark_read_mes"><i class="fa fa-check fa-lg"></i></button>
                      <button type="button" data-toggle="tooltip" title="Delete" onclick="showModal()" class="btn btn-default btn-sm"><i class="fa fa-trash-o fa-lg"></i></button>
                      <?php } ?>
                    </div>
                  </div>
                  <?php if ($count > 0) { ?>
                  <div class="mailbox-messages table-responsive">
                    <table class="table table-hover table-bordered" id="mes_example">
                      <thead>
                        <tr class="header-table">
                          <th></th>
                          <th width='240'>From</th>
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
                            <td align="center" scope="col" width="18"><input type="checkbox" name="Selector[]" value="<?php echo $row['C_ID']; ?>"></td>
                            <td><img class="img-circle img-sm" src="<?php echo $row['profile_pic']; ?>"> <a class="textsize" href="view_profile/<?php echo md5($row['UserID']); ?>"><?php echo $row['FName'].' '.$row['LName']; ?></a></td>
                            <td class="mailbox-message" onclick="show_chat('<?php echo $row['UserID']; ?>')"><div class="elipsis"><?php echo $row['reply']; ?></div></td>
                            <td><?php echo $row['date_time']; ?></td>
                            <td width="40" class="text-center"><?php  
                              if ($username == $row['user_one'] && $row['user1_mes_read'] == 0 || $username == $row['user_two'] && $row['user2_mes_read'] == 0) 
                                { echo "<i style='color:green; font-size:20px;' class='fa fa-check'></i>"; 
                            } else { echo "<i style='color:red; font-size:20px;' class='fa fa-times'></i>"; }
                            ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php  } else {  ?>
                    <div class="alert alert-danger">Your inbox is Empty</div>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-sm-5">
              <div class="box box-success direct-chat direct-chat-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $name; ?></h3>
                </div>
                <div class="box-body">
                  <div class="direct-chat-messages">
                    <!-- Reciever -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      <img class="direct-chat-img" src="<?php echo $profile_pic; ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                    </div>

                    <!-- Sender -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      <img class="direct-chat-img" src="images/man-28.png" alt="Message User Image">
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                    </div>

                  </div>
                </div>
                <div class="box-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <textarea name="txtmessage" placeholder="Type Message ..." class="form-control"></textarea>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">Send</button>
                      </span>
                    </div>
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
      </script>
    </div>
  </body>
  </html>
