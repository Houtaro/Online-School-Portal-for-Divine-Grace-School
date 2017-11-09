<!DOCTYPE html>
<html>
<head>
	<title>Teacher Advisory - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body>
	<body class="hold-transition fixed skin-green sidebar-mini">
		<div class="wrapper">
			<?php include "inc/header.php"; ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Teacher - <small>Advisory</small>
					</h1>
				</section>
				<section class="content">
					<div class="row">
						<div class="col-sm-7">
							<div class="box box-primary">
								<div class="box-body">
									<form id="submitclass" action="crud_function.php" method="post">
										<?php 
										$query = "SELECT tblteacheradvisory.id, usertbl.fname, usertbl.mname, usertbl.lname, tblclass.classname, tblsubjects.subjectname, tblsubjects.description FROM tblteacheradvisory 
										left join usertbl on usertbl.id = tblteacheradvisory.teacherid
										left join tblsubjects on tblsubjects.id = tblteacheradvisory.subjectid
										left join tblclass on tblclass.id = tblteacheradvisory.classid WHERE usertbl.usertype = 'teacher'";
										$result = mysqli_query($con, $query)or die(mysqli_error($con));
										if(mysqli_num_rows($result) > 0){
											?>
											<button type="button" id="del_emp_class" class="btn btn-danger">Delete</button>
											<input type="hidden" name="del_empclass" value="1">
											<div class="tables">
												<table class="table table-bordered"> 
													<thead> 
														<tr>
															<th><input type="checkbox" id="checkall"></th> 
															<th>Teacher Name</th> 
															<th>Class</th> 
															<th>Subject</th>
															<th></th>
														</tr> 
													</thead>
													<tbody> 
														<?php while($row = mysqli_fetch_array($result)) {  ?>
														<tr> 
															<th scope="row"><input type="checkbox" id="record" name="subid[]" value="<?php echo $row['id']; ?>"></th>
															<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
															<td><?php echo $row['classname']; ?></td> 
															<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>  
															<td><button type="button" onclick="editStudentClass(<?php echo $row['id']; ?>)" id="edit_studclass" class="btn btn-success">Edit</button></td>
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
										<h3 class="box-title"><i class="fa fa-plus-circle"> Add Student Class</i></h3>
									</div>
									<div class="box-body">
										<form action="crud_function.php" method="post">
											<input type="hidden" id="studclass_id" name="studclass_id">
											<div class="form-group">
												<label>Teacher:</label>
												<select class="form-control" style="padding:8px;"  name="cboempid" id="cboempid" required>
													<option></option>
													<?php 
													$query = "SELECT * FROM usertbl where usertype='teacher'";
													$result = mysqli_query($con, $query);
													while($row = mysqli_fetch_array($result)){
														?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
														<?php } ?>
													</select>
												</div>

												<div class="form-group">
													<label>Class:</label>
													<select class="form-control" style="padding:8px;" name="cboclass"  id="cboclass" required>
														<option></option>
														<?php 
														$query = "SELECT * FROM tblclass";
														$result = mysqli_query($con, $query);
														while($row = mysqli_fetch_array($result)){
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['classname']; ?></option>
															<?php } ?>
														</select>
													</div>

													<div class="form-group">
														<label>Subject:</label>
														<select class="form-control" style="padding:8px;" name="cbosubjectid"  id="cbosubjectid" required>
															<option></option>
															<?php 
															$query = "SELECT * FROM tblsubjects";
															$result = mysqli_query($con, $query);
															while($row = mysqli_fetch_array($result)){
																?>
																<option value="<?php echo $row['id']; ?>"><?php echo $row['subjectname']." - ".$row['description']; ?></option>
																<?php } ?>
															</select>
														</div>
														<button type="submit" id="add_empclass" name="add_empclass" class="btn btn-primary">Create</button>
														<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
														<button type="submit" id="btn_edit" style="display:none;" name="update_teacher_advisory" class="btn btn-success">Update</button>
														<input type="hidden" name="teacher_advisory_id" id="teacher_advisory_id">
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							<?php include "inc/sidebar.php"; ?>
						</div>
						<?php require "inc/script.php"; ?>
						<script type="text/javascript">
							$("#del_emp_class").click(function(){
								var conf = confirm("Are you sure you want to delete the selected student class?");
								if(conf == true){
									$("#submitclass").submit();
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

							$("#btn_back").click(function(){
								$("#cboempid").val("");
								$("#cboclass").val("");
								$("#cbosubjectid").val("");
								$("#btn_back").hide();
								$("#btn_edit").hide();
								$("#add_empclass").show();
							})

							function editStudentClass(id)
							{
								$("#btn_back").show();
								$("#btn_edit").show();
								$("#add_empclass").hide();
								$("#teacher_advisory_id").val(id);
								$.ajax({
									url: 'crud_function.php',
									type: 'post',
									data: { id : id, edit_empadvisory:'1' },
									success: function(result)
									{
										var data = result.split(",");
										$("#cboempid").val(data[0]);
										$("#cboclass").val(data[1]);
										$("#cbosubjectid").val(data[2]);
									}
								});
							}
						</script>
					</body>
					</html>