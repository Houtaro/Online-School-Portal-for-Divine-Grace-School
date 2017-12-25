<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Dashboard - <small>Administrator</small></h1>
			</section>
			<section class="content">
				<div class="row">
					<?php 
					$query_stud = "SELECT * from usertbl where status='0' and usertype='student'";
					$rst_stud = mysqli_query($con, $query_stud)or die(mysqli_error($con));
					$count = mysqli_num_rows($rst_stud);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Students</p>
							</div>
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
						</div>
					</div>
					<?php 
					$query_stud = "SELECT * from usertbl where status='0' and usertype='registrar'";
					$rst_stud = mysqli_query($con, $query_stud)or die(mysqli_error($con));
					$count = mysqli_num_rows($rst_stud);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Registrar</p>
							</div>
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
					<?php 
					$query_teacher = "SELECT * from usertbl where status='0' and usertype='teacher'";
					$rst_teacher = mysqli_query($con,$query_teacher);
					$count = mysqli_num_rows($rst_teacher);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Teachers</p>
							</div>
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
						</div>
					</div>
					<?php 
					$query_teacher = "SELECT * from usertbl where status='0' and usertype='admin'";
					$rst_teacher = mysqli_query($con,$query_teacher);
					$count = mysqli_num_rows($rst_teacher);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-red">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Administrator</p>
							</div>
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
					<?php 
					$slide = "SELECT * from slide_tbl";
					$rst_slide = mysqli_query($con,$slide);
					$count = mysqli_num_rows($rst_slide);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-blue">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Slide Show</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
						</div>
					</div>
					<?php 
					$slide = "SELECT * from tblclass";
					$rst_slide = mysqli_query($con,$slide);
					$count = mysqli_num_rows($rst_slide);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-orange">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Section</p>
							</div>
							<div class="icon">
								<i class="fa fa-file"></i>
							</div>
						</div>
					</div>
					<?php 
					$slide = "SELECT * from tblsubjects";
					$rst_slide = mysqli_query($con,$slide);
					$count = mysqli_num_rows($rst_slide);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-purple">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Subjects</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
						</div>
					</div>

					<?php 
					$slide = "SELECT * from usertbl where usertype='parent'";
					$rst_slide = mysqli_query($con,$slide);
					$count = mysqli_num_rows($rst_slide);
					?>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-fuchsia">
							<div class="inner">
								<h3><?php echo $count; ?></h3>
								<p>Parents</p>
							</div>
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include "inc/sidebar.php"; ?>
		<?php include "inc/script.php"; ?>
		<?php include "inc/modal.php"; ?>
	</div>
</body>
</html>