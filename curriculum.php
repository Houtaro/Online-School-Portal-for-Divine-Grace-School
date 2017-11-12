<!DOCTYPE html>
<html>
<head>
	<title>Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Manage - <small>Curriculum</small></h1>
			</section>
			<section class="content">
				<?php 
				$query = mysqli_query($con, "SELECT * from curriculumtbl order by curname asc")or die(mysqli_error($con));
				$cnt = mysqli_num_rows($query);
				?>
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<?php if ($cnt > 0) { ?>
								<div class="btn-group">
									<button type="button" data-toggle="tooltip" title="Check All" class="btn btn-default checkbox-toggle"><i class="fa fa-square-o"></i>
									</button>
									<button type="button" data-toggle="tooltip" title="Delete" onclick="del_curriculum()" class="btn btn-default"><i class="fa fa-trash-o"></i></button>
								</div>
								<?php } ?>
							</div>
							<div class="box-body">
								<?php if ($cnt > 0) { ?>
								<form action="function/del_function" method="post">
									<div class="mailbox-messages table-responsive">
										<table class="table table-bordered" id="example">
											<thead>
												<tr class="header-table">
													<th></th>
													<th>Curriculum</th>
													<th>Program Code</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php while ($row = mysqli_fetch_array($query)) { ?>
												<tr>
													<td class="text-center"><input type="checkbox" name="Selector[]" value="<?php echo $row['id']; ?>"></td>
													<td><?php echo $row['curname']; ?></td>
													<td><?php echo $row['gradelevel']; ?></td>
													<td><button type="button" id="btnedit" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</form>
								<?php } else { ?>
								<div class="alert alert-danger">No curriculum added.</div>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-plus-circle"> Add curriculum</i></h3>
							</div>
							<form id="validate_curriculum" action="crud_function.php" method="post">
								<input type="hidden" name="txtcumid" id="txtcumid">
								<div class="box-body table-responsive">
									<div class="form-group">
										<label>Curriculum Name:</label>
										<input type="text" id="txtcurriculum" name="txtcurriculum" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Grade Level</label>
										<select name="txtprogram" id="txtprogram" class="form-control" required>
											<?php
											$query_class = "SELECT * from tblyearlevel";
											$result = mysqli_query($con,$query_class);
											while($row = mysqli_fetch_array($result)){
												?>
												<option value="<?php echo $row['yearlevel']; ?>"><?php echo $row['yearlevel']; ?></option>
												<?php } ?>
											</select>  
										</div>
										<button type="submit" id="add_curriculum" name="add_curriculum" class="btn btn-primary">Add curriculum</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="edit_curriculum" style="display:none;" name="edit_curriculum" class="btn btn-success">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/sidebar.php"; ?>
			<?php include "inc/script.php"; ?>
		</div>
		<script type="text/javascript">
			$('table #btnedit').click(function() {
				var tr = $(this).closest('tr');
				var cumid = tr.find('input:checkbox').val();
				var curriculum = tr.children('td:eq(1)').text();
				var program = tr.children('td:eq(2)').text();
				var unit = tr.children('td:eq(3)').text();

				$("#txtcumid").val(cumid);
				$("#txtcurriculum").val(curriculum);
				$("#txtprogram").val(program);
				$("#txtunit").val(unit);
				$("#btn_back").show();
				$("#edit_curriculum").show();
				$("#add_curriculum").hide();
			});

			$("#btn_back").click(function(){
				$("#txtcumid").val("");
				$("#txtcurriculum").val("");
				$("#txtprogram").val("");
				$("#txtunit").val("");
				$("#btn_back").hide();
				$("#edit_curriculum").hide();
				$("#add_curriculum").show();
			})
		</script>
	</body>
	</html>
