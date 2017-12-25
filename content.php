<!DOCTYPE html>
<html>
<head>
	<title>Content - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Contents</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-plus-circle"> About Us</i></h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<?php
									$q = mysqli_query($con, "SELECT * FROM aboutus limit 1");
									$row = mysqli_fetch_array($q);
									?>
									<div class="form-group">
										<label>Mission:</label>
										<textarea name="txtmission" class="form-control" required><?php echo $row['mission']; ?></textarea>
									</div>
									<div class="form-group">
										<label>Vision:</label>
										<textarea name="txtvision" class="form-control" required><?php echo $row['vision']; ?></textarea>
									</div>
									<div class="form-group">
										<label>Goal:</label>
										<textarea name="txtgoal" class="form-control" required><?php echo $row['goal']; ?></textarea>
									</div>
									<input type="hidden" name="aboutid" value="<?php echo $row['id']; ?>">
									<button type="submit" name="updateaboutus" id="updateaboutus" class="btn btn-primary">Save</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-plus-circle"> Contact Us</i></h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<?php
									$q = mysqli_query($con, "SELECT * FROM contactus limit 1");
									$row = mysqli_fetch_array($q);
									?>
									<div class="form-group">
										<label>Email:</label>
										<input type="text" class="form-control" name="txtemail" value="<?php echo $row['email']; ?>" id="txtemail" required>
									</div>
									<div class="form-group">
										<label>Telephone:</label>
										<input type="text" class="form-control" name="txttel" value="<?php echo $row['telephone']; ?>" id="txttel" required>
									</div>
									<div class="form-group">
										<label>Phone:</label>
										<input type="text" class="form-control" name="txtphone" value="<?php echo $row['phone']; ?>" id="txtphone" required>
									</div>
									<div class="form-group">
										<label>Address:</label>
										<textarea name="txtaddress" class="form-control" required><?php echo $row['address']; ?></textarea>
									</div>
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
									<button type="submit" name="updatecontactus" id="updatecontactus" class="btn btn-primary">Save</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-plus-circle"> Links</i></h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<label>Links:</label>
									<div class="input-group">
										<input type="text" class="form-control" name="txtlink" id="txtlink" required>
										<span class="input-group-btn">
											<button type="submit" name="btnlinks" id="btnlinks" class="btn btn-primary btn-flat">Save</button>
										</span>
									</div>
								</form>
								<br>
								<table class="table table-bordered">
									<tr>
										<th>Links</th>
									</tr>
									<?php
									$q = mysqli_query($con, "SELECT * FROM links order by id desc");
									while($row = mysqli_fetch_array($q)){
										?>
										<tr>
											<td><?php echo $row['link']; ?></td>
										</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Logo</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post" enctype="multipart/form-data">
										<?php
										$q = mysqli_query($con, "SELECT * FROM logotbl limit 1");
										$row = mysqli_fetch_array($q);
										?>
										<div class="form-group">
											<label>Logo:</label>
											<input type="file" class="form-control" name="image" required>
										</div>
										<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<button type="submit" name="updatelogo" id="updatelogo" class="btn btn-primary">Save</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/sidebar.php"; ?>
			<?php include "inc/script.php"; ?>
		</div>
	</body>
	</html>