<!DOCTYPE html>
<html>
<head>
	<title>Student Clearance - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php include "inc/registrar_navbar.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Student Clearance</h1>
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
						<div class="col-md-3">
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

						<div class="col-md-9">
							<div class="box box-success">
								<div class="box-header with-border">
									<a style="margin-left: 10px;" class="btn btn-default btn-sm pull-right" href="allclearance.php">Back</a>
									<?php 
									$result = mysqli_query($con, "SELECT *, sg.id as sgid, sc.id as scid
										FROM tblstudentgrade sg
										LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
										AND sg.studentid = sc.studentid
										LEFT JOIN usertbl s ON sg.studentid = s.id
										LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
										LEFT JOIN usertbl t ON sg.adviserid = t.id
										LEFT JOIN tblclass c ON sg.classid = c.id
										LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
										where sg.studentid = '".$userid."' and sc.schoolyearid='$schoolyearid' group by sgid")or die(mysqli_error($con));
									if(mysqli_num_rows($result) > 0){
										?>
										<a class="btn btn-primary btn-sm pull-right" href="print_clearance.php<?php echo '?studid='.$rowuser['studid']; ?>">Print Clearance</a>
										<?php } ?>
										<h3 class="box-title"><i class="fa fa-book"> Clearance Report</i></h3>
									</div>
									<div class="box-body">
										<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
										<form name="activeinactivestatus" method="post" action="crud_function.php">
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
															<td width="130" class="text-center"><?php if($row['clearance_status'] == 0) { ?>
																<button name="statusclearance" onclick='changestatus("<?php echo $row['scid']; ?>")' class='btn btn-success'>Cleared</button>
																<?php } else { ?>
																<button name="statusclearance" onclick='changestatus("<?php echo $row['scid']; ?>")' class='btn btn-danger'>Not Cleared</button>
																<?php } ?> 
															</td>
														</tr> 
														<?php } ?>
													</tbody> 
													<input type="hidden" class="clearanceid" name="clearanceid">
													<input type="hidden" name="studid" value="<?php echo $userid; ?>">
												</table>
											</form>
										</div>
										<?php }else{ ?>
										<div class="alert alert-danger">No data found.</div>
										<?php } ?>
									</div>
								</div>

								<div class="col-md-9">
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
														<input type="hidden" class="clearanceid" name="clearanceid">
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
						<?php include "inc/script.php"; ?>
						<script>
							function changestatus(id)
							{
								$(".clearanceid").val(id);
								document.activeinactivestatus.submit();
							}
							function activeInactive(id)
							{
								$(".clearanceid").val(id);
								document.active_inactiveform.submit();
							}
						</script>
					</div>
				</body>
				</html>