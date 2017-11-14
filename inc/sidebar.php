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
 <li>
  <a href="admin_dashboard.php">
   <i class="fa fa-dashboard"></i> <span>Dashboard</span>
 </a>
</li>
<li class="treeview slesson" onclick="setmodule('Student Lesson')">
  <a href="#">
   <i class="fa fa-wrench"></i>
   <span>Maintenance</span>
   <span class="pull-right-container">
    <span class="fa fa-angle-left pull-right"></span>
  </span>
</a>
<ul class="treeview-menu">
 <li><a href="school_year.php"> <span>School Year</span></a></li>
 <li><a href="year_level.php"> <span>Grade Level</span></a></li>
 <li><a href="curriculum.php"> <span>Curriculum</span></a></li>
 <li><a href="subject.php"> <span>Subject</span></a></li>
 <li><a href="class.php"> <span>Class</span></a></li>
 <li><a href="admin_user.php"> <span>Administrator Users</span></a></li>
 <li><a href="registrar.php"> <span>Registar</span></a></li>
 <li><a href="student.php"> <span>Students</span></a></li>
 <li><a href="teacher.php"> <span>Teacher</span></a></li>
 <li><a href="announcement.php"> <span>Announcement</span></a></li>
 <li><a href="events.php"> <span>Events</span></a></li>
 <li><a href="slideshow.php"> <span>Slide Show</span></a></li>
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
 <li><a href="student_class.php"> <span>Enroll Student</span></a></li>
 <li><a href="teacher_advisory.php"> <span>Teacher Advisory</span></a></li>
</ul>
</li>
<li class="treeview slesson" onclick="setmodule('Student Lesson')">
  <a href="#">
   <i class="fa fa-file"></i>
   <span>Report</span>
   <span class="pull-right-container">
    <span class="fa fa-angle-left pull-right"></span>
  </span>
</a>
<ul class="treeview-menu">
 <li><a href="student_class.php"> <span>Clearance</span></a></li>
 <li><a href="teacher_advisory.php"> <span>Grades</span></a></li>
</ul>
</li>
<li class="treeview slesson" onclick="setmodule('Student Lesson')">
  <a href="#">
   <i class="fa fa-cog"></i>
   <span>Utilities</span>
   <span class="pull-right-container">
    <span class="fa fa-angle-left pull-right"></span>
  </span>
</a>
<ul class="treeview-menu">
 <li><a href="activitylog.php"><i class="fa fa-archive"></i> <span>Activity Log</span></a></li>
</ul>
</li>
</ul>
</section>
</aside>
<!-- END OF THE Sidebar -->
<div class="control-sidebar-bg"></div>