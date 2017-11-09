<!DOCTYPE html>
<html>
<head>
	<title>Slide Show - Online Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Slide Show</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<form action="crud_function.php" method="post" name="frmActiveAdmin">
						<div class="col-sm-8">
							<div class="box box-primary">
								<div class="box-body">
									<table class="table table-bordered"> 
										<thead> 
											<tr> 
												<th>#</th> 
												<th>Slide show image</th> 
												<th colspan="2"><center>Action</center></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$counter = 0;
											$query = "SELECT * FROM slide_tbl";
											$result = mysqli_query($con, $query);
											while($row = mysqli_fetch_array($result)) {
												?>
												<tr> 
													<td width="40" align="center"><?php echo $counter = $counter + 1; ?></td>
													<td><img width="70" height="70" src="images/<?php echo $row['image']; ?>"></td> 
													<td><button type="button" class="btn btn-success" onclick="editAdmin(<?php echo "'" . $row['id'] . "','" . $row['image'] . "','"; ?>)">Edit</button></td>
												</tr> 
												<?php } ?>
											</table>
										</div>
										<input type="hidden" name="admin_id" id="admin_id">
									</div>
								</div>
							</form>

							<div class="col-sm-4">
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title"><i class="fa fa-plus-circle"> Add Slide Show</i></h3>
									</div>
									<div class="box-body">
										<form method="post" action="crud_function.php" enctype="multipart/form-data">
											<div class="form-group">
												<label>Image</label>
												<input type="file" class="form-control" name="slideimg" required>
											</div>
											<input type="hidden" id="adminid" name="adminid" value="">
											<button type="submit" name="btnaddslides" id="btnaddslides" class="btn btn-primary">Add</button>
											<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
											<button type="submit" style="display:none;" name="updateAdmin" id="updateAdmin" class="btn btn-success">Update</button>
										</form>
									</div>
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