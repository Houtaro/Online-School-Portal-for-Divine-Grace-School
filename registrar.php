<!DOCTYPE html>
<html>
<head>
	<title>Registrar - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Registrar</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-success">
							<div class="box-body">
								<form name="activeInactiveRegistrar" method="post" action="crud_function.php">
									<div class="tables">
										<table class="table table-bordered" id="example"> 
											<thead> 
												<tr>
													<th>First Name</th> 
													<th>Last Name</th> 
													<th>Middle Name</th>
													<th>Username</th> 
													<th>Contact</th> 
													<th>Status</th>
													<th></th>
												</tr> 
											</thead>
											<tbody> 
												<?php 

												$query = "SELECT * FROM usertbl WHERE usertype = 'registrar'";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{

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
															echo "<td><center><button  name='activeRegistrarBtn' teacherid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-success btn-sm'>Active</button></center></td>";
														}	
														else
														{
															echo "<td><center><button name='activeRegistrarBtn' teacherid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-danger btn-sm'>Inactive</button></center></td>";
														}

														?>	
														<td><button type="button"  userid="<?php echo $row['id']; ?>" firstname="<?php echo $row['fname']; ?>" middlename="<?php echo $row['mname']; ?>" lastname="<?php echo $row['lname']; ?>" username="<?php echo $row['username']; ?>" contact="<?php echo $row['contact']; ?>" class="btn btn-success btn-sm" onclick="edit(this)"> Edit</button></td> 
													</tr> 
													<?php } ?>
												</tbody> 
											</table>
										</div>
										<input type="hidden" name="teacherid" id="teacherid">
									</form>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add new registrar</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="txtUsername" id="txtUsername" readonly required>
										</div>
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" name="txtFirstname" id="txtFirstname" onkeyup="getfname3()" required>
										</div>
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" name="txtLastname" id="txtLastname" onkeyup="getlname3()" required>
										</div>
										<div class="form-group">
											<label>Middle Name</label>
											<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename" required>
										</div>
										<div class="form-group">
											<label>Contact</label>
											<input type="text" class="form-control" name="txtContact" id="txtContact" required>
										</div>
										<input type="hidden" id="id" name="id" value="">
										<button type="submit" name="btnAddRegistrar" id="btnAddRegistrar" class="btn btn-primary">Add</button>
										<button type="button" onclick="clean()" id="clear" class="btn btn-info">Clear</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="editregistrar" class="btn btn-success">Update</button>
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

		<script>

			function clean()
			{
				$("#txtFirstname").val("");
				$("#txtMiddlename").val("");
				$("#txtLastname").val("");
				$("#txtUsername").val("");
				$("#txtContact").val("");
				$("#id").val("");
			}

			function edit(obj)
			{
				$("#txtFirstname").val($(obj).attr("firstname"));
				$("#txtMiddlename").val($(obj).attr("middlename"));
				$("#txtLastname").val($(obj).attr("lastname"));
				$("#txtUsername").val($(obj).attr("username"));
				$("#txtContact").val($(obj).attr("contact"));
				$("#id").val($(obj).attr("userid"));
				$("#btnAddRegistrar").hide();
				$("#btn_back").show();
				$("#btn_edit").show();
			}

			$("#btn_back").click(function(){
				clean();
				$("#btn_back").hide();
				$("#btn_edit").hide();
				$("#btnAddRegistrar").show();
			})

			function activeInactive(obj)
			{
				$("#teacherid").val($(obj).attr("teacherid"));
				document.activeInactiveRegistrar.submit();
			}

			function activeInactive(obj)
			{
				$("#teacherid").val($(obj).attr("teacherid"));
				document.activeInactiveRegistrar.submit();
			}

			var fname_3 = null;
			var lname_3 = null;
			function getfname3(){
				fname_3 = $('#txtFirstname').val().substring(0, 3);
				$("#txtUsername").val(fname_3);
			}

			function getlname3(){
				lname_3 = $('#txtLastname').val().substring($('#txtLastname').val().length -3);
				var random = 1 + Math.floor(Math.random() * 6);
				$("#txtUsername").val(fname_3+lname_3+random);
			}
		</script>
	</body>
	</html>