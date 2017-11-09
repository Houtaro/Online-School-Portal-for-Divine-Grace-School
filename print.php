<!DOCTYPE html>
<html>
<?php include "inc/navbar.php"; ?>
<body>
	<div class="print-box">
		<div id="logo-print"><img src="images/logo.jpg" height="50" width="50"></div>
		<h5 id="title-print">DATAMEX COLLEGE OF ST. ADELINE</h5>
		<h5 id="address-print">address</h5>
		<h5 id="contact-print">contact</h5>
		<button id="print" class="btn btn-default" onclick="window.history.back()">Back</button>
		<?php 
		if(!empty($_GET['classid']) && !empty($_GET['subid']) || $userType == 'student'){
			$classid = ""; $subid = "";
			if(!empty($_GET['classid']) && !empty($_GET['subid'])){
				$classid = validate(addslashes($_GET['classid']));
				$subid = validate(addslashes($_GET['subid']));
			}
			?>
			<button id="print" class="btn btn-primary" onclick="window.print()">Print</button>
			<br><br>
			<?php
			if($userType == 'teacher'){
				$result = mysqli_query($con, "SELECT *,sg.id as sgid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname 
					FROM tblstudentgrade sg 
					LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid AND sg.studentid = sc.studentid AND sg.subjectid = sc.subjectid 
					LEFT JOIN usertbl s ON sg.studentid = s.id 
					LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid 
					LEFT JOIN usertbl t ON sg.adviserid = t.id 
					LEFT JOIN tblclass c ON sg.classid = c.id 
					LEFT JOIN tblschoolyear sy ON sg.schoolyearid = sy.id 
					LEFT JOIN tblsubjects sb on sg.subjectid = sb.id 
					where (sg.adviserid = '".$sessionid."') and (sg.subjectid='".$subid."' and sg.classid='".$classid."') group by sgid")or die(mysqli_error($con));
			}else{
				$result = mysqli_query($con, "SELECT *,sg.id as sgid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname 
					FROM tblstudentgrade sg 
					LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid AND sg.studentid = sc.studentid AND sg.subjectid = sc.subjectid 
					LEFT JOIN usertbl s ON sg.studentid = s.id 
					LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid 
					LEFT JOIN usertbl t ON sg.adviserid = t.id 
					LEFT JOIN tblclass c ON sg.classid = c.id 
					LEFT JOIN tblschoolyear sy ON sg.schoolyearid = sy.id 
					LEFT JOIN tblsubjects sb on sg.subjectid = sb.id 
					where sg.studentid = '".$sessionid."' group by sgid")or die(mysqli_error($con));
			}
			?>
			<table class="table table-bordered"> 
				<thead> 
					<tr>
						<th>Subject</th> 
						<?php if($userType == "teacher"){ ?><th>Class</th>
						<th>Student</th><?php } ?>
						<th>Prelim</th> 
						<th>Midterm</th> 
						<th>Pre Final</th>
						<th>Final</th>
						<th>Average</th>
						<th>Remarks</th>
						<th>Adviser</th>
					</tr> 
				</thead>
				<tbody> 
					<?php
					while($row = mysqli_fetch_array($result)) {  
						?>
						<tr> 
							<td><?php echo $row['subjectname']." - ".$row['description']; ?></td> 
							<?php if($userType == "teacher"){ ?><td><?php echo $row['classname']; ?></td> 
							<td><?php echo $row['sname']; ?></td> <?php } ?>
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
				<?php } else { ?><div class="alert alert-danger">No data found.</div><?php } ?>
				<div class="pull-right" style="margin-top:20px;">
					<h4 align="center" style="margin-bottom:36px;">Prepared By:</h4>
					<div align="center"><?php echo $name; ?></div>
					<div style="margin-bottom:20px;">________________________________</div>
				</div>
			</div>
		</body>
		</html>