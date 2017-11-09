<!DOCTYPE html>
<html>
<head>
	<title>Profile - Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>My Profile - <?php echo $name; ?></a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="row">
						<div class="col-sm-7">
							<div class="graph">
								<form method="post" action="crud_function.php">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="txtFirstname" id="txtFirstname" value="<?php echo $fname; ?>" required>
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="txtLastname" id="txtLastname" value="<?php echo $lname; ?>" required>
									</div>
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename" value="<?php echo $mname; ?>" required>
									</div>
									<div class="form-group">
										<label>Contact</label>
										<input type="number" class="form-control" name="txtContact" id="txtContact" value="<?php echo $contact; ?>" required>
									</div>
									<button type="submit" id="btn_edit" name="edit_userInfo" class="btn btn-success">Update</button>
								</form>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form method="post" action="crud_function.php">
									<div class="form-group">
										<label>New Password</label>
										<input type="password" class="form-control" name="txtnewpass" id="txtnewpass" required>
									</div>
									<div class="form-group">
										<label>Confirm New Password</label>
										<input type="password" class="form-control" name="txtconpass" id="txtconpass" required>
									</div>
									<button type="submit" id="btn_edit" name="edit_password" class="btn btn-success">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if($userType === "admin") {
			include "inc/sidebar.php";
		} else if($userType === "teacher") {
			include "inc/emp_sidebar.php";
		} else if($userType === "student") {
			include "inc/stud_sidebar.php";
		}
		?>
	</div>
	<?php include "inc/script.php"; ?>
</body>
</html>