<!DOCTYPE html>
<html>
<head>
	<title>Grade Level - Online Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Grade Level</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-primary">
							<form id="submit_yearlevel" action="crud_function.php" method="post">
								<div class="box-header with-border">
									<button type="button" id="del_yearlevel" class="btn btn-danger">Delete</button>
								</div>
								<div class="box-body">
									<input type="hidden" name="del_yearlevel" value="1">
									<table class="table table-bordered"> 
										<thead> 
											<tr>
												<th><input type="checkbox" id="checkall"></th>
												<th>Grade Level</th> 
												<th>Description</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM tblyearlevel";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result)){
												?>
												<tr> 
													<td width="20"><input type="checkbox" id="record" name="yearlvlid[]" value="<?php echo $row['id']; ?>"></td>
													<td><?php echo $row['yearlevel']; ?></td> 
													<td><?php echo $row['description']; ?></td> 
													<td><center><button type="button" style="margin:0px;padding:8px;" yearlevelid="<?php echo $row['id']; ?>" yearlevel="<?php echo $row['yearlevel']; ?>" description="<?php echo $row['description']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></center></td> 
												</tr> 
												<?php } ?>
											</tbody> 
										</table>
									</div>
								</form>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add Slide Show</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post">
										<div class="form-group">
											<label>Grade Level</label>
											<input type="text" class="form-control" name="yearlevel" id="txtYearLevel" required>
										</div>
										<div class="form-group">
											<label>Description</label>
											<input type="text" class="form-control" name="yearleveldesc" id="yearleveldesc" required>
										</div>
										<input type="hidden" name="year_level_id" id="year_level_id">
										<button type="submit" name="btnAddYearLevel" id="btnAddYearLevel" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="edit_yearlevel" class="btn btn-success">Update</button>
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
			$("#del_yearlevel").click(function(){
				var conf = confirm("Are you sure you want to delete the selected year level?");
				if(conf == true){
					$("#submit_yearlevel").submit();
				}
			})
			$("#checkall").click(function()
			{
				if ($("#checkall").is(':checked')) {
					$("input#record").prop("checked", true);
				} else {
					$("input#record").prop("checked", false);
				}
			})
			function edit(obj)
			{
				$("#txtYearLevel").val($(obj).attr("yearlevel"));
				$("#yearleveldesc").val($(obj).attr("description"));
				$("#year_level_id").val($(obj).attr("yearlevelid"));
				$("#btnAddYearLevel").hide();
				$("#btn_back").show();
				$("#btn_edit").show();
			}
			$("#btn_back").click(function(){
				$("#txtYearLevel").val("");
				$("#yearleveldesc").val("");
				$("#year_level_id").val("");
				$("#btn_back").hide();
				$("#btn_edit").hide();
				$("#btnAddYearLevel").show();
			})
		</script>

	</body>
	</html>