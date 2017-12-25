<!DOCTYPE html>
<html>
<head>
	<title>View Report - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>View Report</h1>
			</section>
			<section class="content">
				<?php if(!empty($_GET['uid'])){ 
					$userid = addslashes($_GET['uid']);
					$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
					$rowsy = mysqli_fetch_array($sy);
					$schoolyearid = $rowsy['id'];

					$user = mysqli_query($con, "SELECT *, CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as sname, s.id as studid
						from tblstudentclass sc
						LEFT JOIN usertbl s ON sc.studentid = s.id
						LEFT JOIN tblyearlevel y ON sc.gradelevel = y.id
						LEFT JOIN tblclass c ON sc.classid = c.id
						where s.id='$userid' and sc.schoolyearid='$schoolyearid' group by s.id");
					$rowuser = mysqli_fetch_array($user);
					?>
					<div class="row">
						<div class="col-md-4">
							<div class="box box-success">
								<div class="box-body box-profile">
									<img class="profile-user-img img-responsive img-circle" src="<?php echo $rowuser['profile_pic']; ?>" alt="User profile picture">
									<h3 class="profile-username text-center"><?php echo $rowuser['sname']; ?></h3>
									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<b>Grade level: </b> <?php echo $rowuser['yearlevel'] ?>
										</li>
										<li class="list-group-item">
											<b>Section: </b> <?php echo $rowuser['classname'] ?>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8">
							<div class="box box-success">
								<div class="box-header with-border">
									<a class="btn btn-primary btn-sm pull-right" href="print_grades.php<?php echo '?studid='.$rowuser['studid']; ?>">Print Grades</a>
									<h3 class="box-title"><i class="fa fa-book"> Grade Report</i></h3>
								</div>
								<div class="box-body">
									<?php
									$result = mysqli_query($con, "SELECT *,sg.id as sgid, sb.id as subid, c.id as clasid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname) as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as sname, s.id as studid
										FROM tblstudentgrade sg
										LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid AND sg.studentid = sc.studentid
										LEFT JOIN usertbl s ON sg.studentid = s.id
										LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
										LEFT JOIN usertbl t ON sg.adviserid = t.id
										LEFT JOIN tblclass c ON sg.classid = c.id
										LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
										where s.id='$userid' group by sgid")or die(mysqli_error($con));
									if(mysqli_num_rows($result) > 0){
										?>
										<table class="table table-bordered"> 
											<thead> 
												<tr>
													<th>Subject</th>
													<th>1ST</th> 
													<th>2ND</th> 
													<th>3RD</th>
													<th>4TH</th>
													<th>Final Grade</th>
													<th>Remarks</th>
													<th>Adviser</th>
												</tr> 
											</thead>
											<tbody style="color:black;"> 
												<?php while($row = mysqli_fetch_array($result)) { ?>
												<tr> 
													<td><?php echo $row['subjectname']." - ". $row['description'] ?></td>
													<td><?php echo $row['prelim']; ?></td> 
													<td><?php echo $row['midterm']; ?></td> 
													<td><?php echo $row['prefi']; ?></td> 
													<td><?php echo $row['final']; ?></td> 
													<td><?php echo $row['gradeaverage']; ?></td> 
													<td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
													<td><?php echo $row['tname']; ?></td> 
												</tr> 
												<?php  } ?>
											</tbody> 
										</table>
										<?php }else{ ?>
										<div class="alert alert-danger">No data found.</div>
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="col-md-8">
								<div class="box box-success">
									<div class="box-header with-border">
										<a class="btn btn-primary btn-sm pull-right" href="print_clearance.php<?php echo '?studid='.$rowuser['studid']; ?>">Print Clearance</a>
										<h3 class="box-title"><i class="fa fa-book"> Clearance Report</i></h3>
									</div>
									<?php 
									$result = mysqli_query($con, "SELECT *,sg.id as sgid
										FROM tblstudentgrade sg
										LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
										AND sg.studentid = sc.studentid
										LEFT JOIN usertbl s ON sg.studentid = s.id
										LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
										LEFT JOIN usertbl t ON sg.adviserid = t.id
										LEFT JOIN tblclass c ON sg.classid = c.id
										LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
										where sg.studentid = '".$userid."' and sc.schoolyearid='$schoolyearid' group by sgid")or die(mysqli_error($con));
										?>
										<div class="box-body">
											<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
											<table class="table table-bordered"> 
												<tr>
													<th class="text-center" width="40">#</th>
													<th>Subject</th>
													<th>Status</th> 
												</tr> 	
												<tbody> 
													<?php
													while($row = mysqli_fetch_array($result)) {  
														?>
														<tr> 
															<td class="text-center" width="40"><?php echo $counter = $counter + 1; ?></td>
															<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>
															<td width="130" class="text-center"><?php if($row['clearance_status'] == 0) { echo "<div style='color:green;font-size:20px;font-weight: bold;'>Cleared</div>"; } else { echo "<div style='color:red;font-size:20px;font-weight: bold;'>Not Cleared</div>"; } ?> 
															</td>
														</tr> 
														<?php } ?>
													</tbody> 
												</table>
											</div>
											<?php }else{ ?>
											<div class="alert alert-danger">No data found.</div>
											<?php } ?>
										</div>
									</div>

									<div class="col-md-8 pull-right">
										<div class="box box-success">
											<div class="box-header with-border">
												<h3 class="box-title"><i class="fa fa-book"> Other Signatories</i></h3>
											</div>
											<?php 
											$result = mysqli_query($con, "SELECT *,sc.id as sid FROM studclearance sc
												LEFT JOIN clearancetbl ct on sc.clearanceid = ct.id
												LEFT JOIN  tblstudentclass s on sc.syid = s.schoolyearid
												where sc.studid = '".$userid."' and s.schoolyearid='$schoolyearid' group by sid")or die(mysqli_error($con));
												?>
												<div class="box-body">
													<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
													<form name="active_inactiveform" method="post" action="crud_function.php">
														<table class="table table-bordered"> 
															<tr>
																<th class="text-center" width="40">#</th>
																<th>Clearance</th>
																<th>Status</th> 
															</tr> 	
															<tbody> 
																<?php while($row = mysqli_fetch_array($result)) { ?>
																	<tr> 
																		<td class="text-center" width="40"><?php echo $counter = $counter + 1; ?></td>
																		<td><?php echo $row['clearancename']; ?></td>
																		<td width="130" class="text-center"><?php if($row['status'] == 1) { ?>
																			<button name="statussignatory" onclick='activeInactive("<?php echo $row['sid']; ?>")' class='btn btn-success'>Cleared</button>
																			<?php } else { ?>
																			<button name="statussignatory" onclick='activeInactive("<?php echo $row['sid']; ?>")' class='btn btn-danger'>Not Cleared</button>
																			<?php } ?> 
																		</td>
																	</tr> 
																	<?php } ?>
																</tbody> 
																<input type="hidden" name="studid" value="<?php echo $userid; ?>">
																<input type="hidden" id="clearanceid" name="clearanceid">
															</table>
														</form>
													</div>
													<?php }else{ ?>
													<div class="alert alert-danger">No data found.</div>
													<?php } ?>
												</div>
											</div>
										</div>
										<?php }else{ ?><div class="alert alert-danger">No data found.</div><?php } ?>
									</section>
								</div>
								<?php include "inc/sidebar.php"; ?>
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