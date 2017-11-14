<!DOCTYPE html>
<html>
<head>
	<title>View Clearance- Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php include "inc/emp_navbar.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>View Student Clearance</h1>
			</section>
			<section class="content">
				<div class="box box-success" style="width: 70%">
					<form name="active_inactiveform" method="post" action="crud_function.php">
						<?php 
						if(isset($_GET['subid']) && isset($_GET['classid']))
						{
							$classid = addslashes($_GET['subid']);
							$subid = addslashes($_GET['classid']);
							$result = mysqli_query($con, "SELECT *,sg.id as sgid, sb.id as subid, c.id as clasid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
								FROM tblstudentgrade sg
								LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
								AND sg.studentid = sc.studentid
								AND sg.subjectid = sc.subjectid
								LEFT JOIN usertbl s ON sg.studentid = s.id
								LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
								LEFT JOIN usertbl t ON sg.adviserid = t.id
								LEFT JOIN tblclass c ON sg.classid = c.id
								LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
								where sg.adviserid = '".$sessionid."' and sg.subjectid='".$subid."' and sg.classid='".$classid."' group by sgid")or die(mysqli_error($con));
								?>
								<div class="box-body">
									<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
									<table class="table table-bordered"> 
										<thead> 
											<tr>
												<th class="text-center" width="40">#</th> 
												<th>Student Name</th> 
												<th>Subject</th>
												<th></th> 
											</tr> 
										</thead>
										<tbody> 
											<?php
											while($row = mysqli_fetch_array($result)) {  
												?>
												<tr> 
													<td class="text-center" width="40"><?php echo $counter = $counter + 1; ?></td>
													<td><?php echo $row['sname']; ?></td>
													<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>
													<td width="130" class="text-center"><?php if($row['clearance_status'] == 0) { ?>
													<button name="statusclearance" onclick='activeInactive("<?php echo $row['sgid']; ?>")' class='btn btn-success'>Cleared</button>
													<?php } else { ?>
													<button name="statusclearance" onclick='activeInactive("<?php echo $row['sgid']; ?>")' class='btn btn-danger'>Not Cleared</button>
													<?php } ?> 
												</td>
											</tr> 
											<?php } ?>
										</tbody> 
										<input type="hidden" name="subid" value="<?php echo $subid; ?>">
										<input type="hidden" name="classid" value="<?php echo $classid; ?>">
										<input type="hidden" id="clearanceid" name="clearanceid">
									</table>
									<?php }else{ ?>
									<div class="alert alert-danger">No data found.</div>
									<?php } ?>
								</div>
								<?php } ?>
							</form>
						</div>
					</section>
				</div>
				<?php include "inc/script.php"; ?>
				<script>
					function activeInactive(id)
					{
						$("#clearanceid").val(id);
						document.active_inactiveform.submit();
					}
				</script>
			</div>
		</body>
		</html>