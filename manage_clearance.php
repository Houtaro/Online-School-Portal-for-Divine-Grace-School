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
					<form id="submit_yearlevel" method="post" action="crud_function.php">
						<div class="col-sm-7">
							<div class="box box-success">
								<div class="box-header with-border">
									<button type="button" id="del_clearance" class="btn btn-danger">Delete</button>
								</div>
								<div class="box-body">
									<input type="hidden" name="del_clearance" value="1">
									<table class="table table-bordered table-striped"> 
										<thead> 
											<tr>
												<th><input type="checkbox" id="checkall"></th>
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
													<td width="20"><input type="checkbox" id="record" name="clearanceid[]" value="<?php echo $row['id']; ?>"></td>
													<td><?php echo $row['clearancename']; ?></td>
													<td width="40"><center><button type="button" style="margin:0px;" clearanceid="<?php echo $row['id']; ?>" clearance="<?php echo $row['clearancename']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></center></td> 
												</tr> 
												<?php } ?>
											</tbody> 
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
									<form method="post" action="crud_function.php">
										<div class="form-group">
											<label>Clearance</label>
											<input type="text" class="form-control" name="txtclearance" id="txtclearance" required>
										</div>
										<button type="submit" name="btnaddclearance" id="btnaddclearance" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Cancel</button>
										<button type="submit" id="btn_edit" style="display:none;" name="btneditclearance" class="btn btn-success">Update</button>
										<input type="hidden" name="clearanceid" id="clearanceid">
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
		$("#del_clearance").click(function(){
			var conf = confirm("Are you sure you want to delete the selected Clearance?");
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
			$("#clearanceid").val($(obj).attr("clearanceid"));
			$("#txtclearance").val($(obj).attr("clearance"));
			$("#btnaddclearance").hide();
			$("#btn_back").show();
			$("#btn_edit").show();
		}

		$("#btn_back").click(function(){
			$("#clearanceid").val("");
			$("#txtclearance").val("");
			$("#btn_back").hide();
			$("#btn_edit").hide();
			$("#btnaddclearance").show();
		})
	</script>

</body>
</html>