 <!DOCTYPE html>
 <html>
 <head>
 	<title>Class - Online School Portal </title>
 	<?php include "inc/navbar.php"; ?>
 </head>
 <body class="hold-transition fixed skin-green sidebar-mini">
 	<div class="wrapper">
 		<?php include "inc/header.php"; ?>
 		<div class="content-wrapper">
 			<section class="content-header">
 				<h1> Class </h1>
 			</section>
 			<section class="content">
 				<div class="row">
 					<div class="col-sm-7">
 						<div class="box box-primary">
 							<div class="box-body">
 								<form id="submit_yearlevel" action="crud_function.php" method="post">
 									<div class="tables">
 										<button type="button" id="del_yearlevel" class="btn btn-danger">Delete</button>
 										<input type="hidden" name="del_class" value="1">
 										<table class="table table-bordered"> 
 											<thead> 
 												<tr>
 													<th><input type="checkbox" id="checkall"></th>
 													<th>Class Name</th> 
 													<th>Grade Level</th>
 													<th>Curriculum</th>
 													<th></th>
 												</tr> 
 											</thead>
 											<tbody> 
 												<?php
 												$query = "SELECT * FROM tblclass";
 												$result = mysqli_query($con, $query);

 												while($row = mysqli_fetch_array($result))
 												{
 													?>
 													<tr> 
 														<td width="20"><input type="checkbox" id="record" name="classid[]" value="<?php echo $row['id']; ?>"></td>
 														<td><?php echo $row['classname']; ?></td> 
 														<?php 
 														$query3 = "SELECT yearlevel FROM tblyearlevel WHERE id = '" . $row['yearlevelid'] . "'";
 														$result3 = mysqli_query($con, $query3);
 														$yearlevel = "";

 														while($rows = mysqli_fetch_array($result3))
 														{
 															$yearlevel = $rows['yearlevel'];
 														}
 														?>
 														<td><?php echo $yearlevel; ?></td>
 														<td>
 															<?php
 																$query4 = "SELECT * FROM curriculumtbl WHERE id = " . $row['cur_id'];
 																$result4 = mysqli_query($con, $query4);
 																$curname = "";
 																while($rows = mysqli_fetch_array($result4))
 																{
 																	$curname = $rows['curname'];
 																}
 																echo $curname;
 															?>
 														</td>
 														<td width="50">
 															<button 
	 															type="button" 
	 															style="margin:0px;padding:8px;" 
	 															cl-na="<?php echo $row['classname']; ?>" 
	 															classid="<?php echo $row['id']; ?>" 
	 															yearlevelid="<?php echo $row['yearlevelid']; ?>" 
	 															yearlevel="<?php echo $yearlevel; ?>"
	 															cur-id="<?php echo $row['cur_id']; ?>" 
	 															onclick="edit(this)" 
	 															class="btn btn-success">Edit
	 														</button>
 														</td> 
 													</tr> 
 													<?php } ?>
 												</tbody> 
 											</table>
 										</div>
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
 										<div class="form-group">
 											<label>Class Name</label>
 											<input type="text" class="form-control" name="txtClassName" id="txtClassName" required>
 										</div>
 											<div class="form-group">
 												<label>Grade Level</label>
 												<select class="form-control" name="cboYearLevel"  id="cboYearLevel" required>
 													<option></option>
 													<?php 
 													$query = "SELECT * FROM tblyearlevel";
 													$result = mysqli_query($con, $query);
 													while($row = mysqli_fetch_array($result)){
 														?>
 														<option><?php echo $row['yearlevel']; ?></option>
 														<?php } ?>
 													</select>
 												</div>

 												<div class="form-group">
 													<label>Curriculum</label>
 													<select name="cboCurriculum" id="cboCurriculum" class="form-control">
 														<option></option>
 														<?php
 															$query = "SELECT * FROM curriculumtbl";
 															$result = mysqli_query($con, $query);
 															while($row = mysqli_fetch_array($result))
 															{
 																?>
 																<option value="<?php echo $row['id']; ?>"><?php echo $row['curname']; ?></option>
 																<?php
 															}
 														?>
 													</select>
 												</div>
 												<input type="hidden" name="schoolyearid" id="schoolyearid">
 												<input type="hidden" name="yearlevelid" id="yearlevelid">
 												<input type="hidden" name="classid" id="classid">

 												<button type="submit" name="btnAddClass" id="btnAddClass"  class="btn btn-primary">Add</button>
 												<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
 												<button type="submit" id="btn_edit" style="display:none;" name="edit_class" class="btn btn-success">Update</button>
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
 						var conf = confirm("Are you sure you want to delete the selected class?");
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
 						$("#txtClassName").val(obj.parentNode.parentNode.childNodes[3].innerHTML);
 						$("#cboYearLevel").val($(obj).attr("yearlevel"));

 						$("#classid").val($(obj).attr("classid"));
 						$("#cboCurriculum").val($(obj).attr("cur-id"));
 						$("#btnAddClass").hide();
 						$("#btn_back").show();
 						$("#btn_edit").show();
 					}
 					$("#btn_back").click(function(){
 						$("#txtClassName").val("");
 						$("#cboSchoolYear").val("");
 						$("#cboYearLevel").val("");
 						$("#btn_back").hide();
 						$("#btn_edit").hide();
 						$("#btnAddClass").show();
 					})
 				</script>
 			</body>
 			</html>