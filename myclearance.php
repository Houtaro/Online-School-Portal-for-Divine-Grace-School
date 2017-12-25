<!DOCTYPE html>
<html>
<head>
	<title>My Grades - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php include "inc/stud_navbar.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> My Clearance</h1>
			</section>
			<section class="content">
				<div class="box box-success" style="width: 50%">
					<div class="box-body">
						<?php 
						$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
						$rowsy = mysqli_fetch_array($sy);
						$schoolyearid = $rowsy['id'];

						$result = mysqli_query($con, "SELECT *,sg.id as sgid, sb.id as subid, sc.gradelevel as lvlid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
							FROM tblstudentgrade sg
							LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid AND sg.studentid = sc.studentid
							LEFT JOIN usertbl s ON sg.studentid = s.id
							LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
							LEFT JOIN usertbl t ON sg.adviserid = t.id
							LEFT JOIN tblclass c ON sg.classid = c.id
							LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
							where sg.studentid = '$sessionid' and sc.schoolyearid='$schoolyearid' group by sgid")or die(mysqli_error($con));
							?>
							<div class="box-body">
								<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
								<table class="table table-bordered"> 
									<thead> 
										<tr>
											<th class="text-center" width="40">#</th>
											<th>Subject</th>
											<th>Status</th> 
										</tr> 
									</thead>
									<tbody> 
										<?php while($row = mysqli_fetch_array($result)) { ?>
										<tr> 
											<td class="text-center" width="40"><?php echo $counter = $counter + 1; ?></td>
											<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>
											<td width="130" class="text-center"><?php if($row['clearance_status'] == 0) { echo "<div style='color:green;font-size:20px;'><b>Cleared</b></div>"; } else { echo "<div style='color:red;font-size:20px;'><b>Not Cleared</b></div>"; } ?> 
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
				</section>
			</div>
			<?php include "inc/script.php"; include "inc/modal.php"; ?>
		</div>
	</body>
	</html>