<!DOCTYPE html>
<html>
<head>
	<title>Subject - Online Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Manage - <small>Subject</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-primary">
							<div class="box-body">
								<form id="submit_subject" action="crud_function.php" method="post">
									<?php 
									$query = "SELECT * FROM tblsubjects";
									$result = mysqli_query($con, $query)or die(mysqli_error($con));
									if(mysqli_num_rows($result) > 0){
										?>
										<button type="button" id="del_subject" class="btn btn-danger">Delete</button>
										<input type="hidden" name="del_subject" value="1">
										<div class="tables">
											<table class="table table-bordered"> 
												<thead> 
													<tr>
														<th><input type="checkbox" id="checkall"></th> 
														<th>Subject Name</th> 
														<th>Description</th> 
														<th>Grade Level</th>
														<th>Curriculum</th>
														<th></th>
													</tr> 
												</thead>
												<tbody> 
													<?php while($row = mysqli_fetch_array($result)) { 
														$yearlevel = mysqli_query($con,"SELECT * FROM tblyearlevel where id='".$row['yearlevelid']."'");
														$row_ylevel = mysqli_fetch_array($yearlevel);


														?>
														<tr> 
															<th scope="row"><input type="checkbox" id="record" name="subid[]" value="<?php echo $row['id']; ?>"></th>
															<td><?php echo $row['subjectname']; ?></td> 
															<td><?php echo $row['description']; ?></td> 
															<td><?php echo $row_ylevel['yearlevel']; ?></td> 
															<td>
																<?php
																	$query = "SELECT * FROM curriculumtbl WHERE id = " . $row['cur_id'];
																	$res = mysqli_query($con, $query);

																	$curname = "";
																	while($rows = mysqli_fetch_array($res))
																	{
																		$curname = $rows['curname'];
																	}
																	echo $curname;
																?>
															</td>
															<td width="50">

																<button 
																	type="button" 
																	id="editsub" 
																	data-id="<?php echo $row_ylevel['id']; ?>"
																	data-curid="<?php echo $row['cur_id']; ?>"
																	class="btn btn-success">
																	Edit
																</button>

															</td> 

														</tr> 
														<?php } ?>
													</tbody> 
												</table>
											</div>
											<?php }else{ ?>
												<div class="alert alert-danger">No data found.</div>
												<?php } ?>
											</form>
										</div>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="box box-primary">
										<div class="box-header with-border">
											<h3 class="box-title"><i class="fa fa-plus-circle"> Add Subject</i></h3>
										</div>
										<div class="box-body">
											<form action="crud_function.php" method="post">
												<input type="hidden" id="subid" name="subid">
												<div class="form-group">
													<label>Subject Name:</label>
													<input type="text" class="form-control" id="subjectname" name="subjectname" required>
												</div>
												<div class="form-group">
													<label>Description:</label>
													<input type="text" class="form-control" id="desc" name="desc" required>
												</div>
												<div class="form-group">
														<label>Curriculum</label>
														<select class="form-control" id="cboCurriculum" style="height:44px;" name="cboCurriculum" required>
															<option></option>
															<?php 
															$query = "SELECT * FROM curriculumtbl";
															$result = mysqli_query($con, $query);

															while($row = mysqli_fetch_array($result)) {
																?>
																<option value="<?php echo $row['id']; ?>"><?php echo $row['curname']; ?></option>
																<?php } ?>
															</select>
														</div>
												<div class="form-group">
													<label>Year Level</label>
													<select class="form-control" id="cboYearLevel" style="height:44px;" name="cboYearLevel" required>
														<option></option>
														<?php 
														$query = "SELECT * FROM tblyearlevel";
														$result = mysqli_query($con, $query);

														while($row = mysqli_fetch_array($result)) {
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
															<?php } ?>
														</select>
													</div>
														<button type="submit" name="btnAddSubjects" id="btnAddSubjects" class="btn btn-primary">Create</button>
														<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Cancel</button>
														<button type="submit" id="btn_edit" style="display:none;" name="edit_subject" class="btn btn-success">Update</button>
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
							$("#del_subject").click(function(){
								var conf = confirm("Are you sure you want to delete the selected Subjects?");
								if(conf == true){
									$("#submit_subject").submit();
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

							$('table #editsub').click(function() {
								var tr = $(this).closest('tr');
								var subid = tr.find('input:checkbox').val();
								var subname = tr.children('td:eq(0)').text();
								var desc = tr.children('td:eq(1)').text();
								var cur = $(this).data("curid");
								var ylevel = $(this).data("id");

								$("#subid").val(subid);
								$("#desc").val(desc);
								$("#subjectname").val(subname);

								$("#cboCurriculum").val(cur);
								$("#cboYearLevel").val(ylevel);
								$("#btn_back").show();
								$("#btn_edit").show();
								$("#btnAddSubjects").hide();
							});

							$("#btn_back").click(function(){
								$("#subid").val("");
								$("#desc").val("");
								$("#subjectname").val("");
								$("#cboYearLevel").val("");
								$(this).hide();
								$("#btn_edit").hide();
								$("#btnAddSubjects").show();
							});

						</script>
					</body>
					</html>