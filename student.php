<!DOCTYPE html>
<html>
<head>
	<title>Student - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Student</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-success">
							<div class="box-header with-border">
								<button type="button" data-toggle="modal" data-target="#import-student" class="btn btn-primary btn-sm">Import student</button>
							</div>
							<div class="box-body">
								<form name="activeInactiveStudentForm" action="crud_function.php" method="post">
									<table class="table table-bordered" id="example"> 
										<thead> 
											<tr>
												<th>First Name</th> 
												<th>Middle Name</th> 
												<th>Last Name</th>
												<th>Username</th> 
												<th>Contact</th> 
												<th>Status</th>
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM usertbl WHERE usertype = 'student'";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result)){
												?>
												<tr> 
													<td><?php echo $row['fname']; ?></td> 
													<td><?php echo $row['mname']; ?></td> 
													<td><?php echo $row['lname']; ?></td> 
													<td><?php echo $row['username']; ?></td> 
													<td><?php echo $row['contact']; ?></td>  


													<?php

													if($row['status'] == 0)
													{
														echo "<td><center><button name='activeStudentBtn' studid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-success btn-sm'>Active</button></center></td>";
													}
													else
													{
														echo "<td><button name='activeStudentBtn' studid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-danger btn-sm'>Inactive</button></center></td>";
													}


													?>
													<td><button type="button" style="margin:0px;" userid="<?php echo $row['id']; ?>" firstname="<?php echo $row['fname']; ?>" middlename="<?php echo $row['mname']; ?>" lastname="<?php echo $row['lname']; ?>" username="<?php echo $row['username']; ?>" contact="<?php echo $row['contact']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit" onclick="edit(this)"> <i class="fa fa-edit"></i></button>
													</td> 
												</tr> 
												<?php } ?>
											</tbody> 
										</table>
										<input type="hidden" name="studid" id="studid">
									</form>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add new student</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post">
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
											<input type="text" class="form-control" name="txtLastname" id="txtLastname">
										</div>
										<div class="form-group">
											<label>Middle Name</label>
											<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename">
										</div>
										<div class="form-group">
											<label>Contact</label>
											<input type="text" class="form-control" name="txtContact" id="txtContact">
										</div>
										<input type="hidden" id="id" name="id" value="">
										<button type="submit" name="btnAddStudent" id="btnAddStudent" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="edit_student" class="btn btn-success">Update</button>
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
		<?php include "inc/modal.php"; ?>
		<script>
			function edit(obj)
			{
				$("#txtFirstname").val($(obj).attr("firstname"));
				$("#txtMiddlename").val($(obj).attr("middlename"));
				$("#txtLastname").val($(obj).attr("lastname"));
				$("#txtUsername").val($(obj).attr("username"));
				$("#txtContact").val($(obj).attr("contact"));
				$("#id").val($(obj).attr("userid"));
				$("#btnAddStudent").hide();
				$("#btn_back").show();
				$("#btn_edit").show();
			}
			$("#btn_back").click(function(){
				$("#txtFirstname").val("");
				$("#txtMiddlename").val("");
				$("#txtLastname").val("");
				$("#txtUsername").val("");
				$("#txtContact").val();
				$("#id").val("");
				$("#btn_back").hide();
				$("#btn_edit").hide();
				$("#btnAddStudent").show();
			})
			
			function activeInactive(obj)
			{
				$("#studid").val($(obj).attr("studid"));
				document.activeInactiveStudentForm.submit();
			}
		</script>
	</body>
	</html>