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
									$query = "SELECT *,c.id as cid, st.id as stid, sb.id as sbid, sc.id as sid,CONCAT(st.lname, ', ', st.fname, ' ',st.mname) as sname from tblstudentclass sc left join tblclass c on sc.classid = c.id left join usertbl st on sc.studentid = st.id left join tblsubjects sb on sc.subjectid = sb.id";
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
														<th>Class</th> 
														<th>Student Name</th> 
														<th>Subject</th>
														<th></th>
													</tr> 
												</thead>
												<tbody> 
													<?php while($row = mysqli_fetch_array($result)) {  ?>
													<tr> 
														<th scope="row"><input type="checkbox" id="record" name="studclassid[]" value="<?php echo $row['sid']; ?>"></th>
														<td><input type="hidden" value="<?php echo $row['id'] ?>"><?php echo $row['classname']; ?></td> 
														<td><input type="hidden" value="<?php echo $row['id'] ?>"><?php echo $row['sname']; ?></td>
														<td><input type="hidden" value="<?php echo $row['id'] ?>"><?php echo $row['subjectname']." - ".$row['description']; ?></td>  
														<td><button type="button" style="margin:0px;padding:8px;" onclick="editStudentClass(<?php echo $row['sid']; ?>)" id="edit_studclass" class="btn btn-success">Edit</button></td> 
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
												<label>Student:</label>
												<select class="form-control" style="padding:8px;" name="cboStudent"  id="cboStudent" required>
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
													<button type="submit" id="add_studclass" name="add_studclass" class="btn btn-primary">Create</button>
													<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
													<button type="submit" id="btn_edit" style="display:none;" name="edit_studclass" class="btn btn-success">Update</button>
													<input type="hidden" name="stud_class_id" id="stud_class_id">
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
							var conf = confirm("Are you sure you want to delete the selected student class?");
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
							$("#cbosubjectid").val("");
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
									var data = result.split(",");
									$("#cboStudent").val(data[0]);
									$("#cboclass").val(data[1]);
									$("#cbosubjectid").val(data[2]);
								}
							})
						}
					</script>
				</body>
				</html>