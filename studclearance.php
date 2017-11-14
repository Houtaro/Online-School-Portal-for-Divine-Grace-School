<!DOCTYPE html>
<html>
<head>
  <title>Student Clearance - Online School Portal </title>
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
        <h1>Student Clearance</h1>
      </section>
      <section class="content">
        <div class="box box-success">
          <div class="box-body">
            <?php
            $result = mysqli_query($con, "SELECT * FROM tblteacheradvisory ts
            LEFT JOIN tblclass c ON ts.classid = c.id 
            LEFT JOIN tblsubjects sb on ts.subjectid = sb.id
            where ts.teacherid = '".$sessionid."'")or die(mysqli_error($con));
            if(mysqli_num_rows($result) > 0){
            $color = ['blue','orange','yellow','green','aqua','red'];
            ?>
            <?php while($row = mysqli_fetch_array($result)) { 
            $random = rand(0,5);
            ?>
            <div class="col-lg-3 col-xs-6" style="margin-top:14px;">
              <div class="small-box bg-<?php echo $color[$random]; ?>">
                <div class="inner">
                  <h3><?php echo $row['subjectname']; ?></h3>
                  <p><?php echo $row['classname']; ?></p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="viewstud_clearance.php<?php echo '?subid='.$row['subjectid'].'&classid='.$row['classid']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php } }else{ ?>
            <div class="alert alert-danger">No data found.</div>
            <?php } ?>
          </div>
        </div>
      </section>
    </div>
    <?php include "inc/script.php"; ?>
    <?php include "inc/modal.php"; ?>
  </div>
</body>
</html>