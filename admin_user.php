<!DOCTYPE html>
<html>
<head>
	<title>Administrator - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Manage - <small>Administrator</small>
				</h1>
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
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th> 
												<th>Contact</th>
												<th>Username</th>
												<th colspan="2"><center>Action</center></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM usertbl WHERE usertype = 'admin'";
											$result = mysqli_query($con, $query);
											while($row = mysqli_fetch_array($result))
											{
												?>
												<tr> 
													<td><?php echo $row['fname']; ?></td> 
													<td><?php echo $row['lname']; ?></td> 
													<td><?php echo $row['mname']; ?></td> 
													<td><?php echo $row['contact']; ?></td> 
													<td><?php echo $row['username']; ?></td> 
													<?php
													if($row['status'] == 0)
													{
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn btn-success'>Active</button></td>";
													}
													else
													{
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn btn-danger'>Inactive</button></td>";
													}
													?>
													<td><button type="button" class="btn btn-success" onclick="editAdmin(<?php echo "'" . $row['id'] . "','" . $row['fname'] . "','" . $row['mname'] . "','" . $row['lname'] . "','" . $row['contact'] . "','" . $row['username'] . "'"; ?>)">Edit</button></td>
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
										<h3 class="box-title"><i class="fa fa-plus-circle"> Add Administrator</i></h3>
									</div>
									<div class="box-body">
										<form method="post" name="frmAddAdmin" action="crud_function.php">
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="txtUsername" id="txtUsername" required>
											</div>
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" name="txtFirstname" id="txtFirstname" required>
											</div>
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" name="txtLastname" id="txtLastname" required>
											</div>
											<div class="form-group">
												<label>Middle Name</label>
												<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename" required>
											</div>
											<div class="form-group">
												<label>Contact</label>
												<input type="text" class="form-control" name="txtContact" id="txtContact" required>
											</div>
											<input type="hidden" id="adminid" name="adminid" value="">
											<button type="submit" name="btnAddAdmin" id="btnAddAdmin" class="btn btn-primary">Add</button>
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
			<script type="text/javascript">
				$("#btn_back").click(function(){
					clean();
					$("#btn_back").hide();
					$("#updateAdmin").hide();
					$("#btnAddAdmin").show();
				})
				function clean()
				{
					$("#txtFirstname").val("");
					$("#txtMiddlename").val("");
					$("#txtLastname").val("");
					$("#txtUsername").val("");
					$("#txtContact").val("");
					$("#adminid").val("");
				}
				function editAdmin(id, fname, mname, lname, contact, username)
				{
					$("#txtUsername").val(username);
					$("#txtFirstname").val(fname);
					$("#txtMiddlename").val(mname);
					$("#txtLastname").val(lname);
					$("#txtContact").val(contact);
					$("#adminid").val(id);
					$("#btnAddAdmin").hide();
					$("#updateAdmin").show();
					$("#btn_back").show();
				}
				function activeInactiveAdmin(id)
				{
					$("#admin_id").val(id);
					document.frmActiveAdmin.submit();
				}
			</script>
		</body>
		</html>