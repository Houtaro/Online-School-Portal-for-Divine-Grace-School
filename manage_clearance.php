<!DOCTYPE html>
<html>
<head>
	<title>Clearance - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Manage - <small>Clearance</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<form name="active_inactive-form" method="post" action="crud_function.php">
						<div class="col-sm-7">
							<div class="box box-success">
								<div class="box-body">
									<table class="table table-bordered table-striped"> 
										<thead> 
											<tr>
												<th>Clearance Name</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM clearancetbl";
											$result = mysqli_query($con, $query);
											while($row = mysqli_fetch_array($result)) {
												?>
												<tr>
													<td><?php echo $row['clearancename']; ?></td>
													<td><center><button type="button" style="margin:0px;" schoolyearid="<?php echo $row['id']; ?>" schoolyear="<?php echo $row['schoolyear']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></center></td> 
												</tr> 
												<?php } ?>
											</tbody> 
											<input type="hidden" id="schoolyear_id" name="schoolyear_id">
										</table>
									</div>
								</div>
							</div>
						</form>

						<div class="col-sm-5">
							<div class="box box-success">
								<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-plus-circle"> Add Clearance</i></h3>
								</div>
								<div class="box-body">
									<form method="post" name="add_schoolyear_form" action="crud_function.php">
										<div class="form-group">
											<label>Clearance</label>
											<input type="text" class="form-control" name="txtSchoolYear" id="txtSchoolYear" required>
										</div>
										<input type="hidden" name="school_year_id" id="school_year_id">
										<button type="submit" name="btnAddSchoolYear" id="btnAddSchoolYear" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Cancel</button>
										<button type="submit" id="btn_edit" style="display:none;" name="btneditSchoolYear" class="btn btn-success">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php include "inc/sidebar.php"; ?>
	</div>
	<?php include "inc/script.php"; ?>

	<script>
		function edit(obj)
		{
			$("#school_year_id").val($(obj).attr("schoolyearid"));
			$("#txtSchoolYear").val($(obj).attr("schoolyear"));
			$("#btnAddSchoolYear").hide();
			$("#btn_back").show();
			$("#btn_edit").show();
		}

		$("#btn_back").click(function(){
			$("#school_year_id").val("");
			$("#txtSchoolYear").val("");
			$("#btn_back").hide();
			$("#btn_edit").hide();
			$("#btnAddSchoolYear").show();
		})


		function activeInactive(obj)
		{
			$("#schoolyear_id").val($(obj).attr("schoolyearid"));
			document.active_inactive-form.submit();
		}
	</script>

</body>
</html>