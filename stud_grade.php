<!DOCTYPE html>
<html>
<head>
	<title>Student Grade - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php include "inc/registrar_navbar.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Student Grade</h1>
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
									<a style="margin-left: 10px;" class="btn btn-default btn-sm pull-right" href="allgrade.php">Back</a>
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
										<a class="btn btn-primary btn-sm pull-right" href="print_grades.php<?php echo '?studid='.$rowuser['studid']; ?>">Print Grades</a>
										<?php } ?>
										<h3 class="box-title"><i class="fa fa-book"> Grades</i></h3>
									</div>
									<div class="box-body">
										<?php if(mysqli_num_rows($result) > 0){ ?>
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
													<th></th>
												</tr> 
											</thead>
											<tbody style="color:black;"> 
												<?php while($row = mysqli_fetch_array($result)) { ?>
												<tr> 
													<td><?php echo $row['subjectname']." - ". $row['description'] ?></td>
													<td class="text-center"><?php if($row['prelim'] == 0){ echo "-"; }else{ echo $row['prelim']; } ?></td> 
													<td class="text-center"><?php if($row['midterm'] == 0){ echo "-"; }else{ echo $row['midterm']; } ?></td> 
													<td class="text-center"><?php if($row['prefi'] == 0){ echo "-"; }else{ echo $row['prefi']; } ?></td> 
													<td class="text-center"><?php if($row['final'] == 0){ echo "-"; }else{ echo $row['final']; } ?></td> 
													<td class="text-center"><?php echo $row['gradeaverage']; ?></td> 
													<td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
													<td><?php echo $row['tname']; ?></td> 
													<td width="40"><button type="button" class="btn btn-success btn-sm" onclick="editgrade('<?php echo $row['sgid']; ?>')" data-target="<?php echo $row['sgid'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
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
						</div>
						<?php }else{ ?><div class="alert alert-danger">No data found.</div><?php } ?>
					</section>
				</div>
				<?php include "inc/script.php"; ?>
				<div id="editModal" class="modal fade"></div>
				<script>
					function editgrade(id){
						$.ajax({
							type : "POST",
							url : "editModal.php",
							data : { sgid:id },
							success: function(res){
								$("#editModal").html(res);
							}
						})
						$("#editModal").modal("show");
					}
				</script>
			</div>
		</body>
		</html>