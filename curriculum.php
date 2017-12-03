<!DOCTYPE html>
<html>
<head>
	<title>Curriculum - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
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
						<div class="box box-success">
							<div class="box-header with-border">
								<?php if ($cnt > 0) { ?>
									<button type="button" data-toggle="tooltip" title="Delete"  onclick="del_curriculum()" class="btn btn-danger">Delete</button>
									<?php } ?>
								</div>
								<div class="box-body">
									<?php if ($cnt > 0) { ?>
										<form action="crud_function.php" method="post" id="delcur">
										<input type="hidden" name="del_curriculum" value="1" />
											<table class="table table-bordered table-responsive" id="example">
												<thead>
													<tr class="header-table">
														<th class="text-center"><input type="checkbox" id="checkall" ></th>
														<th>Curriculum</th>
														<th>Department</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php while ($row = mysqli_fetch_array($query)) { ?>
														<tr>
															<td width="40" class="text-center"><input type="checkbox" id="selcur" name="selcur[]" value="<?php echo $row['id']; ?>"></td>
															<td><?php echo $row['curname']; ?></td>
															<td><?php echo $row['gradelevel']; ?></td>
															<td width="40"><button type="button" id="btnedit" data-toggle="tooltip" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</form>
											<?php } else { ?>
												<div class="alert alert-danger">No curriculum added.</div>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="box box-success">
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
															<option>Elementary</option>
															<option>Junior High School</option>
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


						function del_curriculum()
						{
							var conf = confirm("Are you sure you want to delete the selected curriculum?");
							if(conf == true){
								$("#delcur").submit();
							}
						}

						$("#checkall").click(function()
						{
							if ($("#checkall").is(':checked')) {
								$("input#selcur").prop("checked", true);
							} else {
								$("input#selcur").prop("checked", false);
							}
						})

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
