<!-- START OF THE Sidebar -->
<aside class="main-sidebar">
 <section class="sidebar">
  <div class="user-panel">
   <div class="pull-left image">
    <img src="<?php echo $profile_pic; ?>" class="img-circle">
  </div>
  <div class="pull-left info">
    <p><?php echo $name; ?></p>
    <p><?php echo $username; ?></p>
  </div>
</div>
<ul class="sidebar-menu">
 <li class="header">MAIN NAVIGATION</li>
 <?php       
 $accessright = mysqli_query($con, "SELECT * FROM access_rights where userid='$sessionid'")or die(mysqli_error($con)); 
 while ($row_ulevel = mysqli_fetch_array($accessright)) { 
  if ($row_ulevel['privilege'] == "1") { ?>
  <li>
    <a href="admin_dashboard.php">
     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
   </a>
 </li>
 <?php } } ?>
 <li class="treeview slesson" onclick="setmodule('Student Lesson')">
  <a href="#">
   <i class="fa fa-wrench"></i>
   <span>Maintenance</span>
   <span class="pull-right-container">
    <span class="fa fa-angle-left pull-right"></span>
  </span>
</a>
<ul class="treeview-menu">
 <?php       
 $accessright = mysqli_query($con, "SELECT * FROM access_rights where userid='$sessionid'")or die(mysqli_error($con)); 
 while ($row_ulevel = mysqli_fetch_array($accessright)) { 
   if ($row_ulevel['privilege'] == "2") { ?><li><a href="school_year.php"> <span>School Year</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "3") { ?><li><a href="grade_level.php"> <span>Grade Level</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "4") { ?><li><a href="curriculum.php"> <span>Curriculum</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "5") { ?><li><a href="subject.php"> <span>Subject</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "6") { ?><li><a href="class.php"> <span>Class</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "7") { ?><li><a href="admin_user.php"> <span>Administrator Users</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "8") { ?><li><a href="registrar.php"> <span>Registar</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "9") { ?><li><a href="student.php"> <span>Students</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "10") { ?><li><a href="teacher.php"> <span>Teacher</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "11") { ?><li><a href="parent.php"> <span>Parent</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "12") { ?><li><a href="manage_clearance.php"> <span>Clearance</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "13") { ?><li><a href="announcement.php"> <span>Announcement</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "14") { ?><li><a href="events.php"> <span>Events</span></a></li><?php } ?>
   <?php if ($row_ulevel['privilege'] == "15") { ?><li><a href="slideshow.php"> <span>Slide Show</span></a></li><?php } } ?>
 </ul>
</li>
<li class="treeview slesson" onclick="setmodule('Student Lesson')">
  <a href="#">
   <i class="fa fa-exchange"></i>
   <span>Transaction</span>
   <span class="pull-right-container">
    <span class="fa fa-angle-left pull-right"></span>
  </span>
</a>
<ul class="treeview-menu"> 
 <?php       
 $accessright = mysqli_query($con, "SELECT * FROM access_rights where userid='$sessionid'")or die(mysqli_error($con)); 
 while ($row_ulevel = mysqli_fetch_array($accessright)) { 
  if ($row_ulevel['privilege'] == "16") { ?><li><a href="student_class.php"> <span>Enroll Student</span></a></li><?php } ?>
  <?php if ($row_ulevel['privilege'] == "17") { ?><li><a href="teacher_advisory.php"> <span>Teacher Advisory</span></a></li><?php } } ?>
</ul>
</li>
<?php       
$accessright = mysqli_query($con, "SELECT * FROM access_rights where userid='$sessionid'")or die(mysqli_error($con)); 
while ($row_ulevel = mysqli_fetch_array($accessright)) { 
  if ($row_ulevel['privilege'] == "18") { ?>
  <li class="treeview slesson" onclick="">
    <a href="reports.php">
     <i class="fa fa-file"></i>
     <span>Report</span>
   </a>
 </li>
 <?php } } ?>
 <?php       
 $accessright = mysqli_query($con, "SELECT * FROM access_rights where userid='$sessionid'")or die(mysqli_error($con)); 
 while ($row_ulevel = mysqli_fetch_array($accessright)) { 
  if ($row_ulevel['privilege'] == "19") { ?>
  <li class="treeview slesson" onclick="">
    <a href="#">
     <i class="fa fa-cog"></i>
     <span>Utilities</span>
     <span class="pull-right-container">
      <span class="fa fa-angle-left pull-right"></span>
    </span>
  </a>
  <ul class="treeview-menu">
    <li><a href="content.php"><i class="fa fa-file"></i> <span>Content</span></a></li>
   <li><a href="activitylog.php"><i class="fa fa-archive"></i> <span>Activity Log</span></a></li>
 </ul>
</li>
<?php } } ?>
</ul>
</section>
</aside>
<!-- END OF THE Sidebar -->
<div class="control-sidebar-bg"></div>