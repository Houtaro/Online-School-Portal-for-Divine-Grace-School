<!DOCTYPE html>
<html>
<head>
	<title>Teacher Advisory - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
	<link rel="stylesheet" href="select2/select2.min.css">
	<style type="text/css">
	.select2-results__option[aria-selected=true] { display: none; }
</style>
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
							<div class="box box-success">
								<div class="box-body">
									<form id="submitclass" action="crud_function.php" method="post">
										<?php 
										$query = "SELECT *,ta.id as taid, s.description as sub_description FROM tblteacheradvisory ta
										left join usertbl on usertbl.id = ta.teacherid
										left join tblyearlevel on ta.gradelvl = tblyearlevel.id 
										left join curriculumtbl cur on ta.curiculumid = cur.id
										left join tblclass on tblclass.id = ta.classid 
										left join tblsubjects s on ta.subjectid = s.id
										WHERE usertbl.usertype = 'teacher'";
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
															<th>Grade Level</th>
															<th>Class</th> 
															<th>Subject</th>
															<th></th>
														</tr> 
													</thead>
													<tbody> 
														<?php while($row = mysqli_fetch_array($result)) { ?>
														<tr> 
															<th scope="row"><input type="checkbox" id="record" name="ta[]" value="<?php echo $row['taid']; ?>"></th>
															<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
															<td><?php echo $row['yearlevel']; ?></td> 
															<td><?php echo $row['classname']; ?></td> 
															<td><?php echo $row['subjectname']." - ".$row['sub_description']; ?></td>
															<td><button type="button" title="Edit" data-toggle="tooltip" onclick="editStudentClass(<?php echo $row['taid']; ?>)" id="edit_studclass" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></td>
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
								<div class="box box-success">
									<div class="box-header with-border">
										<h3 class="box-title"><i class="fa fa-plus-circle"> Add Teacher Advisory</i></h3>
									</div>
									<div class="box-body">
										<form action="crud_function.php" method="post">
											<?php
											$sy = mysqli_query($con,"SELECT * FROM tblschoolyear where status='0'");
											$rowsy = mysqli_fetch_array($sy);
											?>
											<input type="hidden" id="studclass_id" name="studclass_id">
											<input type="hidden" name="txtschoolyear" value="<?php echo $rowsy['id']; ?>">
											<div class="form-group">
												<label>Curriculum Name:</label>
												<select class="form-control" style="padding:8px;" name="curid" onchange="getCurId(this)" id="curid" required>
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
													<select class="form-control" name="grdlvlid"  id="grdlvlid" onchange="generateClasses(this); generateSubjects(this)" required>
														<option selected disabled>--Select Grade Level--</option>
														<?php 
														$query = "SELECT * FROM tblyearlevel order by yearlevel asc";
														$result = mysqli_query($con, $query);
														while($row = mysqli_fetch_array($result)){
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
															<?php } ?>
														</select>
													</div>

													<div class="form-group">
														<label>Subject:</label>
														<select class="form-control" name="cbosubject" id="cbosubject" required>
															<option selected disabled>--Select Subject--</option>
														</select>
													</div>	

													<div class="form-group">
														<label>Class:</label>
														<select class="select_class" name="cboclass[]" id="cboclass" multiple required>
															<option disabled>-- Select Class --</option>
														</select>
													</div>	

													<div class="form-group">
														<label>Teacher:</label>
														<select class="form-control" style="padding:8px;"  name="cboempid" id="cboempid" required>
															<option selected disabled>-- Select Teacher --</option>
															<?php 
															$query = "SELECT * FROM usertbl where usertype='teacher'";
															$result = mysqli_query($con, $query);
															while($row = mysqli_fetch_array($result)){
																?>
																<option value="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
																<?php } ?>
															</select>
														</div>
														<button type="submit" id="add_empclass" name="add_empclass" class="btn btn-primary">Create</button>
														<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
														<button type="submit" id="btn_edit" style="display:none;" name="update_teacher_advisory" class="btn btn-success">Update</button>
														<input type="hidden" name="teacher_advisory_id" id="teacher_advisory_id">
														<input type="hidden" name="selectedCurriculum" id="selectedCurriculum">
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
						<script src="select2/select2.full.min.js"></script>

						<script>
							$(".select_class").select2({ width: 416, maximumSelectionLength: 30 });

							$("#del_emp_class").click(function(){
								var conf = confirm("Are you sure you want to delete the selected teacher class?");
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
								$(".select_class").val("");
								$("#cbosubject").val("");
								$("#curid").val("");
								$("#grdlvlid").val("");
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
										$("#curid").val(data[0]);
										$("#grdlvlid").val(data[1]);
										$("#cboclass").val(data[2]);
										$("#cboempid").val(parseInt(data[3]));
										$("#cbosubject").val(parseInt(data[4]));
										loadClass($("#curid").val(), $("#grdlvlid").val(), parseInt(data[2]));
										loadSubject($("#curid").val(), $("#grdlvlid").val(), parseInt(data[4]));
									}
								});
							}

							function getCurId(cbo)
							{
								$("#selectedCurriculum").val(cbo.value);
							}

							function loadSubject(curid, gradeid, curresubj)
							{
								$.ajax({
									url: 'crud_function.php',
									type: 'post',
									data:{ curid, gradeid, getsubject: '1' },
									success: function(res)
									{
										var cbosub = $("#cbosubject");
										$(".gotsubjects").remove();
										$.each(JSON.parse(res), function (index, datum) {
											$("<option value='" + datum.id + "' class='gotsubjects'>").appendTo(cbosub).text(datum.subjectname+" - "+datum.description);
										});
										$("#cbosubject").val(curresubj);
									}
								})
							}

							function loadClass(curid, gradeid, currentClass)
							{
								$.ajax({
									url: 'crud_function.php',
									type: 'post',
									data:{ curid, gradeid, btnedit: '1' },
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

							function generateSubjects(obj)
							{
								var gradelevelid = obj.value;
								$.ajax({
									url: 'crud_function.php',
									type: 'post',
									data:{
										getsubject: '1',
										curid: $("#selectedCurriculum").val(),
										gradeid: gradelevelid
									},
									success:function(result)
									{
										var cbosubject = $("#cbosubject");
										$(".gotsubjects").remove();
										if(result !== "no data")
										{
											$.each(JSON.parse(result), function (index, datum) {
												$("<option value='" + datum.id + "' class='gotsubjects'>").appendTo(cbosubject).text(datum.subjectname+" - "+datum.description);
											});
										}
										else
										{
											alert("No subject available in the selected curriculum and grade level.");
										}
									}
								});
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