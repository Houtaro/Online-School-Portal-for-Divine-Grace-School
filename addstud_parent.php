<!DOCTYPE html>
<html>
<head>
	<title>Add Student Parent - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Student Parent</small> </h1>
			</section>
			<section class="content">
				<?php 
				$studid = addslashes($_GET['id']);
				$parent = mysqli_query($con, "SELECT * FROM parentstudtbl where studid='$studid'");
				$rowparent = mysqli_fetch_array($parent);
				$parentid = $rowparent['parentid'];

				$parentstud = mysqli_query($con, "SELECT * FROM usertbl where id='$parentid'");
				$row = mysqli_fetch_array($parentstud);
				?>
				<div class="row">
					<div class="col-sm-6">
						<div class="box box-primary">
							<div class="box-header with-border">
								<a href="student.php" class="btn btn-default btn-sm pull-right">Back</a>
								<h3 class="box-title"><i class="fa fa-plus-circle"> Student Parent</i></h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<input type="hidden" name="parentid" value="<?php echo $row['id']; ?>">
									<input type="hidden" name="studid" value="<?php echo $studid; ?>">
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="txtuname" id="txtuname" value="<?php echo $row['username']; ?>" required>
									</div>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="txtfname" id="txtfname" value="<?php echo $row['fname']; ?>" required>
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="txtlname" id="txtlname" value="<?php echo $row['lname']; ?>" required>
									</div>
									<div class="form-group">
										<label>Contact</label>
										<input type="text" class="form-control" name="txtcontact" id="txtcontact" value="<?php echo $row['contact']; ?>" required>
									</div>
									<button type="submit" name="add_studparent" class="btn btn-primary pull-right">Save</button>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
	</body>
	</html>