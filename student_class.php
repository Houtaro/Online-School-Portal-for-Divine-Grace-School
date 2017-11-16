<!DOCTYPE html>
<html>
<head>
	<title>Assign Student Class - Online School Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard - <small>Student Class</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-primary">
							<div class="box-body">
								<form id="submit_studclass" action="crud_function.php" method="post">
									<?php 
									$query = "SELECT *,c.id as cid, st.id as stid,
									sc.id as sid,CONCAT(st.lname, ', ', st.fname, ' ',st.mname) as sname from tblstudentclass sc 
									left join tblclass c on sc.classid = c.id 
									left join tblyearlevel g on sc.gradelevel = g.id 
									left join usertbl st on sc.studentid = st.id";
									$result = mysqli_query($con, $query)or die(mysqli_error($con));
									if(mysqli_num_rows($result) > 0){
										?>
										<button type="button" id="del_stud_class" class="btn btn-danger">Delete</button>
										<input type="hidden" name="del_studclass" value="1">
										<div class="tables">
											<table class="table table-bordered"> 
												<thead> 
													<tr>
														<th><input type="checkbox" id="checkall"></th> 
														<th>Student Name</th> 
														<th>Grade Level</th>
														<th>Class</th> 
														<th></th>
													</tr> 
												</thead>
												<tbody> 
													<?php while($row = mysqli_fetch_array($result)) {  ?>
														<tr> 
															<td scope="row"><input type="checkbox" id="record" name="studclassid[]" value="<?php echo $row['sid']; ?>"></td>
															<td><?php echo $row['sname']; ?></td>
															<td><?php echo $row['yearlevel']; ?></td> 
															<td><?php echo $row['classname']; ?></td> 
															
															<td><button type="button" data-toggle="tooltip" title="Edit" onclick="editStudentClass(<?php echo $row['sid']; ?>)" id="edit_studclass" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></td> 
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
											<h3 class="box-title"><i class="fa fa-plus-circle"> Enroll Students</i></h3>
										</div>
										<div class="box-body">
											<form action="crud_function.php" method="post">
												<?php
												$sy = mysqli_query($con,"SELECT * FROM tblschoolyear where status='0'");
												$rowsy = mysqli_fetch_array($result);
												?>
												<input type="hidden" id="studclass_id" name="studclass_id">
												<input type="hidden" name="txtschoolyear" value="<?php echo $rowsy['id']; ?>">
												<div class="form-group">
													<label>Curriculum Name:</label>
													<select class="form-control" style="padding:8px;" name="cbocurriculum" onchange="getCurId(this)" id="cbocurriculum" required>
														<option selected disabled>--Select Curriculum--</option>
														<?php 
														$query = "SELECT * FROM curriculumtbl";
														$result = mysqli_query($con, $query);
														while($row = mysqli_fetch_array($result)){
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['curname']; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label>Grade Level:</label>
														<select class="form-control" name="cbogradelevel"  id="cbogradelevel" onchange="generateClasses(this)" required>
															<option selected disabled>--Select Grade Level--</option>
															<?php 
															$query = "SELECT * FROM tblyearlevel";
															$result = mysqli_query($con, $query);
															while($row = mysqli_fetch_array($result)){
																?>
																<option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group">
															<label>Class:</label>
															<select class="form-control" name="cboclass"  id="cboclass" required>
																<option selected disabled>--Select Class--</option>
															</select>
														</div>	

														<div id="showsubject"> </div>

														<div class="form-group">
															<label>Student:</label>
															<select class="form-control" name="cboStudent"  id="cboStudent" required>
																<option></option>
																<?php 
																$query = "SELECT * FROM usertbl where usertype='student'";
																$result = mysqli_query($con, $query);
																while($row = mysqli_fetch_array($result)){
																	?>
																	<option value="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
																	<?php } ?>
																</select>
															</div>
															<button type="submit" id="add_studclass" name="add_studclass" class="btn btn-primary">Enroll</button>
															<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
															<button type="submit" id="btn_edit" style="display:none;" name="edit_studclass" class="btn btn-success">Update</button>
															<input type="hidden" name="stud_class_id" id="stud_class_id">

															<!-- for generate class -->
															<input type="hidden" name="selectedCurriculum" id="selectedCurriculum">

														</form>

														<hr>
														<form action="crud_function.php" method="post">
															<div class="form-group">
																<label>Enroll students from master list: </label>
																<input type="file" name="fileenroll" class="form-control" required>
															</div>
															<button type="submit" id="enrollcsv" name="enrollcsv" class="btn btn-primary">Enroll</button>
														</form>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php include "inc/sidebar.php"; ?>
							</div>
							<?php include "inc/script.php"; ?>
							<script type="text/javascript">
								$("#del_stud_class").click(function(){
									var conf = confirm("Are you sure you want to delete the selected data?");
									if(conf == true){
										$("#submit_studclass").submit();
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

								$('table #edit_studclass').click(function() {
									$("#btn_back").show();
									$("#btn_edit").show();
									$("#add_studclass").hide();
								});

								$("#btn_back").click(function(){
									$("#cboStudent").val("");
									$("#cboclass").val("");
									$("#cbocurriculum").val("");
									$("#cbogradelevel").val("");
									$("#btn_back").hide();
									$("#btn_edit").hide();
									$("#add_studclass").show();
								})

								function editStudentClass(id)
								{
									$("#stud_class_id").val(id);
									$.ajax({
										url: 'crud_function.php',
										type: 'post',
										data: { id : id, edit_stud_class:'1' },
										success: function(result)
										{
											var cboClass = $("#cboclass");
											var data = result.split(",");
											$("#cbocurriculum").val(data[0]);
											$("#cbogradelevel").val(data[1]);
											$("#cboStudent").val(data[3]);

											//load class
											loadClass($("#cbocurriculum").val(), $("#cbogradelevel").val(), data[2]);

										}
									})
								}

								function loadClass(curid, gradeid, currentClass)
								{
									$.ajax({

										url: 'crud_function.php',
										type: 'post',
										data:{
											curid: curid,
											gradeid: gradeid,
											btnedit: '1'
										},
										success: function(res)
										{
											var cboClass = $("#cboclass");
											$(".gotclass").remove();
											$.each(JSON.parse(res), function (index, datum) {
													$("<option value='" + datum.id + "' class='gotclass'>").appendTo(cboClass).text(datum.classname);
												});
											$("#cboclass").val(currentClass);
										}

									})
								}

								function getCurId(cbo)
								{
									$("#selectedCurriculum").val(cbo.value);
								}

								function generateClasses(obj)
								{
									var gradelevelid = obj.value;
									$.ajax({

										url: 'generateClass.php',
										type: 'post',
										data:{
											curid: $("#selectedCurriculum").val(),
											gradeid: gradelevelid
										},
										success:function(result)
										{
											var cboClass = $("#cboclass");

											$(".gotclass").remove();

											if(result !== "no data")
											{
												$.each(JSON.parse(result), function (index, datum) {
													$("<option value='" + datum.id + "' class='gotclass'>").appendTo(cboClass).text(datum.classname);
												});
											}
											else
											{
												alert("No classes available in the selected curriculum and grade level.");
											}
										}
									});
								}


								


							</script>
						</body>
						</html>