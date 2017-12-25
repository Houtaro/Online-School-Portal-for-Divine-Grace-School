<!DOCTYPE html>
<html>
<head>
	<title>Parent - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
	<link rel="stylesheet" href="select2/select2.min.css">
	<style type="text/css">
	.select2-results__option[aria-selected=true] { display: none; }
</style>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Parent</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-success">
							<div class="box-body">
								<form name="activeInactiveParentForm" action="crud_function.php" method="post">
									<table class="table table-bordered" id="example"> 
										<thead> 
											<tr>
												<th>First Name</th> 
												<th>Last Name</th>
												<th>Username</th> 
												<th>Contact</th> 
												<th>Status</th>
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM usertbl WHERE usertype = 'parent'";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result)){
												?>
												<tr> 
													<td><?php echo $row['fname']; ?></td> 
													<td><?php echo $row['lname']; ?></td> 
													<td><?php echo $row['username']; ?></td> 
													<td><?php echo $row['contact']; ?></td>  
													<?php
													if($row['status'] == 0)
													{
														echo "<td><center><button name='activeParentBtn' parentid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-success btn-sm'>Active</button></center></td>";
													}
													else
													{
														echo "<td><button name='activeParentBtn' parentid='" . $row['id'] . "' onclick='activeInactive(this)' class='btn btn-danger btn-sm'>Inactive</button></center></td>";
													}
													?>
													<td><button type="button" style="margin:0px;" userid="<?php echo $row['id']; ?>" firstname="<?php echo $row['fname']; ?>" lastname="<?php echo $row['lname']; ?>" username="<?php echo $row['username']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit" onclick="edit(this)"> <i class="fa fa-edit"></i></button>
													</td> 
												</tr> 
												<?php } ?>
											</tbody> 
										</table>
										<input type="hidden" name="parentid" id="parentid">
									</form>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add Parent</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="txtUsername" id="txtUsername" required readonly>
										</div>
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" name="txtFirstname" onkeyup="getfname3()" id="txtFirstname" required>
										</div>
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" name="txtLastname" onkeyup="getlname3()" id="txtLastname">
										</div>
										<div class="form-group" >
											<label>Student:</label>
											<select class="form-control select_student" name="cboStudent[]" id="cboStudent" multiple required>
												<option disabled>-- Select Student --</option>
												<?php 
												$query = "SELECT * FROM usertbl where usertype='student'";
												$result = mysqli_query($con, $query);
												while($row = mysqli_fetch_array($result)){
													?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
													<?php } ?>
												</select>
											</div>
											<input type="hidden" id="id" name="id" value="">
											<button type="submit" name="add_studparent" id="add_studparent"  class="btn btn-primary">Add</button>
											<button type="submit" id="btn_edit" style="display:none;" name="edit_parent" class="btn btn-success">Update</button>
											<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										</form>
									</div>
								</div>
							</div>
						</section>
					</div>
					<?php include "inc/sidebar.php"; ?>
				</div>
				<?php include "inc/script.php"; ?>
				<script src="select2/select2.full.min.js"></script>
				<script>
					$(".select_student").select2({ width: 420 });
					function edit(obj)
					{
						var userid = $(obj).attr("userid");
						$("#txtFirstname").val($(obj).attr("firstname"));
						$("#txtLastname").val($(obj).attr("lastname"));
						$("#txtUsername").val($(obj).attr("username"));
						$("#id").val(userid);
						$("#add_studparent").hide();
						$("#btn_back").show();
						$("#btn_edit").show();

						$.post('crud_function.php', { userid, getstudid:'1' }, function(res){
							$(".select_student").val(parseInt(res));
							$(".select_student").trigger('change');
							console.log(parseInt(res))
						})
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
						$("#add_studparent").show();
					})

					function activeInactive(obj)
					{
						$("#parentid").val($(obj).attr("parentid"));
						document.activeInactiveParentForm.submit();
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