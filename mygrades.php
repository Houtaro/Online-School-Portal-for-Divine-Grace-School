<!DOCTYPE html>
<html>
<head>
	<?php include "inc/navbar.php"; ?>
	<title><?php if ($userType == "student") { echo "My Grades"; }else{ echo "My Son/Daughter Grades"; } ?> - Online School Portal </title>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php if ($userType == "student") { include "inc/stud_navbar.php"; }else{ include "inc/parent_navbar.php"; } ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> My Grades</h1>
			</section>
			<section class="content">
				<div class="box box-success">
					<?php 
					$result = mysqli_query($con, "SELECT *,sg.id as sgid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
						FROM tblstudentgrade sg
						LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
						AND sg.studentid = sc.studentid
						AND sg.subjectid = sc.subjectid
						LEFT JOIN usertbl s ON sg.studentid = s.id
						LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
						LEFT JOIN usertbl t ON sg.adviserid = t.id
						LEFT JOIN tblclass c ON sg.classid = c.id
						LEFT JOIN parentstudtbl ps ON s.id = ps.studid
						LEFT JOIN tblschoolyear sy ON sg.schoolyearid = sy.id
						LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
						where (sg.studentid = '$sessionid') or (ps.parentid = '$sessionid') and sy.status='0' group by sgid")or die(mysqli_error($con));

					$child = mysqli_query($con, "SELECT * FROM usertbl left join parentstudtbl on parentstudtbl.studid = usertbl.id where parentid='$sessionid'");
					$rowp = mysqli_fetch_array($child);
					?>
					<div class="box-body">
						<?php if ($userType == "parent") { ?><h3>Your son/daughter, <a><?php echo $rowp['fname']." ".$rowp['lname']; ?></a> grades:</h3> <?php } ?>
						<?php if(mysqli_num_rows($result) > 0){ $counter = 0; ?>
						<table class="table table-bordered"> 
							<thead> 
								<tr>
									<th>#</th> 
									<th>Subject</th> 
									<th>First Grading</th> 
									<th>Second Grading</th> 
									<th>Third Grading</th>
									<th>Fourth Grading</th>
									<th>Final Grade</th>
									<th>Remarks</th>
									<th>Adviser</th>
								</tr> 
							</thead>
							<tbody> 
								<?php
								while($row = mysqli_fetch_array($result)) {  
									?>
									<tr> 
										<th scope="row"><?php echo $counter = $counter + 1; ?></th>
										<td><?php echo $row['subjectname']." - ".$row['description']; ?></td> 
										<td><?php echo $row['prelim']; ?></td> 
										<td><?php echo $row['midterm']; ?></td> 
										<td><?php echo $row['prefi']; ?></td> 
										<td><?php echo $row['final']; ?></td> 
										<td><?php echo $row['gradeaverage']; ?></td> 
										<td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
										<td><?php echo $row['tname']; ?></td> 
									</tr> 
									<?php } ?>
								</tbody> 
							</table>
							<?php }else{ ?>
							<div class="alert alert-danger">No data found.</div>
							<?php } ?>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/script.php"; ?>
		</div>
	</body>
	</html>