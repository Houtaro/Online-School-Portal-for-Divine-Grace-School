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
							<div class="box box-success">
								<div class="box-body">
									<table class="table table-bordered" id="example"> 
										<thead> 
											<tr> 
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th> 
												<th>Contact</th>
												<th>Username</th>
												<th>Status</th>
												<th><center>Action</center></th>
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
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn btn-success btn-sm'>Active</button></td>";
													}
													else
													{
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn btn-danger btn-sm'>Inactive</button></td>";
													}
													?>
													<td><button type="button" class="btn btn-success btn-sm" onclick="editAdmin(<?php echo "'" . $row['id'] . "','" . $row['fname'] . "','" . $row['mname'] . "','" . $row['lname'] . "','" . $row['contact'] . "','" . $row['username'] . "'"; ?>)">Edit</button></td>
												</tr> 
												<?php } ?>
											</tbody>
										</table>
									</div>
									<input type="hidden" name="admin_id" id="admin_id">
								</div>
							</div>
						</form>

						<div class="col-sm-4">
							<div class="box box-success">
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
											<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename">
										</div>
										<div class="form-group">
											<label>Contact</label>
											<input type="text" class="form-control" name="txtContact" id="txtContact">
										</div>

										<h3>Access Rights</h3>
										<hr style="margin-top: 0px;margin-bottom: 10px;">
										<label><input type="checkbox" name="accessrights[]" value="1"> Dashboard</label>
										<br>
										<label style="margin-top: 14px;">Maintenance:</label>
										<hr style="margin-top: 0px;margin-bottom: 4px;">
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="2"> School Year</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="3"> Grade Level</label>
										<label><input type="checkbox" name="accessrights[]" value="4"> Curriculum</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="5"> Subject</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="6"> Class</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="7"> Administrator</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="8"> Registrar</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="9"> Teacher</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="10"> Student</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="11"> Announcement</label>
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="12"> Events</label>
										<label><input type="checkbox" name="accessrights[]" value="13"> Slide Show</label>
										<br>
										<label style="margin-top: 14px;">Transaction:</label>
										<hr style="margin-top: 0px;margin-bottom: 4px;">
										<label style="margin-right: 10px;"><input type="checkbox" name="accessrights[]" value="14"> Enroll Student</label>
										<label><input type="checkbox" name="accessrights[]" value="15"> Teacher Advisory</label>
										<br>
										<label style="margin-top: 14px;">Reports:</label>
										<hr style="margin-top: 0px;margin-bottom: 4px;">
										<label><input type="checkbox" name="accessrights[]" value="16"> Clearance and Grades Reports</label>
										<br>
										<label style="margin-top: 14px;">Utilities:</label>
										<hr style="margin-top: 0px;margin-bottom: 4px;">
										<label><input type="checkbox" name="accessrights[]" value="17"> Activity Log</label>

										<br><br>
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
			<?php include "inc/script.php"; ?>
		</div>
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