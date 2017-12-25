<!DOCTYPE html>
<html>
<title>Print Grades</title>
<?php include "inc/navbar.php"; ?>
<style type="text/css">
#title-print{ margin-top: 0px; text-align: center; font-weight: bold; color: #3D8EB9; font-size: 20pt; }
#address-print{ text-align: center; }
#contact-print{ text-align: center; color: #25373D; font-weight: bold; }
#logo-print{ position: absolute; left: 14%; top:34px; }
.print-box{ width: 100%; height: 960px; border: 1px solid #25373D; font-family: sans-serif; background: #fff; margin: 10px auto; padding: 20px; padding-top: 80px; }
table, tr, th, td {
	border: 2px solid black;
}
@media print{ #print { display:none; } }
</style>
<body>
	<div class="print-box">
		<div id="logo-print"><img src="images/logo.png" height="100" width="100"></div>
		<h4 id="contact-print" class="pull-right" style="margin-top: -60px;"><b>DepEd FORM 138</b></h4>
		<h5 id="contact-print" style="margin-top: -30px;">Republic of the Philippines</h5>
		<h5 id="contact-print">Department of Education</h5>
		<h5 id="contact-print">Region IV-A CALABARZON</h5>
		<h5 id="title-print">Divine Grace School</h5>
		<h5 id="address-print">Sampaguita Street Maligaya Park Subdivision Novaliches,<br> Novaliches Quezon City, 1118 Metro Manila</h5>
		<h5 id="contact-print">Tel No. 367-47-42</h5>
		<hr style="border: 1px solid #25373D; width: 50%;">
		<h3 style="margin-top: 20px;font-weight: bold;" class="text-center">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h3>
		<hr style="border: 1px solid #25373D; width: 50%;">
		<button id="print" class="btn btn-default pull-right" onclick="window.history.back()">Back</button>
		<?php if(!empty($_GET['studid'])){ 
			$studid = addslashes($_GET['studid']);
			$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
			$rowsy = mysqli_fetch_array($sy);
			$schoolyearid = $rowsy['id']; 

			$result = mysqli_query($con, "SELECT *,sg.id as sgid, sb.id as subid, c.id as clasid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname) as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as sname, s.id as studid
				FROM tblstudentgrade sg
				LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
				AND sg.studentid = sc.studentid
				LEFT JOIN usertbl s ON sg.studentid = s.id
				LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
				LEFT JOIN usertbl t ON sg.adviserid = t.id
				LEFT JOIN tblclass c ON sg.classid = c.id
				LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
				where s.id='$studid' and sc.schoolyearid='$schoolyearid' group by sgid")or die(mysqli_error($con));
			if(mysqli_num_rows($result) > 0){

				$user = mysqli_query($con, "SELECT *, CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as sname from tblstudentclass sc
					LEFT JOIN usertbl s ON sc.studentid = s.id
					LEFT JOIN tblyearlevel y ON sc.gradelevel = y.id
					LEFT JOIN tblclass c ON sc.classid = c.id
					where s.id='$studid' and sc.schoolyearid='$schoolyearid' group by s.id");
				$row = mysqli_fetch_array($user);
				?>
				<button id="print" class="btn btn-primary pull-right" onclick="window.print()">Print</button>
				<h3 style="margin:10px 0px 10px 0px;"><b>Name:</b> <?php echo $row['sname']; ?></h3>
				<h3 style="margin:10px 0px 10px 0px;"><b>Grade Level:</b> <?php echo $row['yearlevel']; ?></h3>
				<h3 style="margin:10px 0px 10px 0px;"><b>Section:</b> <?php echo $row['classname']; ?></h3>
				<h3 style="margin:10px 0px 10px 0px;"><b>School Year:</b> <?php echo $rowsy['schoolyear']; ?></h3>
				<table class="table"> 
					<tr>
						<th rowspan="2" style="padding:30px 0px 0px 0px;" class="text-center">Learning Area</th>
						<th class="text-center" colspan="4">Grading Period</th>
						<th rowspan="2" style="padding:30px 0px 0px 0px;" class="text-center">Final Grade</th>
						<th rowspan="2" style="padding:30px 0px 0px 0px;" class="text-center">Remarks</th>
					</tr>
					<tr>
						<th class="text-center">1ST</th> 
						<th class="text-center">2ND</th> 
						<th class="text-center">3RD</th>
						<th class="text-center">4TH</th>
						<!-- <th>Adviser</th> -->
					</tr> 
					<tbody> 
						<?php while($row = mysqli_fetch_array($result)) { ?>
						<tr> 
							<td class="text-center"><?php echo $row['subjectname']." - ". $row['description'] ?></td>
							<td class="text-center"><?php echo $row['prelim']; ?></td> 
							<td class="text-center"><?php echo $row['midterm']; ?></td> 
							<td class="text-center"><?php echo $row['prefi']; ?></td> 
							<td class="text-center"><?php echo $row['final']; ?></td>  
							<td class="text-center"><?php echo $row['gradeaverage']; ?></td> 
							<td class="text-center"><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
							<!-- <td><?php echo $row['tname']; ?></td> -->
						</tr> 
						<?php  } ?>
					</tbody> 
				</table>
				<?php }else{ ?><div class="alert alert-danger">No data found.</div> <?php } ?>
				<?php } else { ?><div class="alert alert-danger">No data found.</div><?php } ?>
				<br>
				<div class="pull-right">
					<div align="center" style="margin-bottom: -10px;"><?php echo $name; ?></div>
					<div style="margin-top:0px;">______________________________</div>
					<h4 align="center" style="margin-top:0px;"><b>Prepared By:</b></h4>
				</div>
			</div>
		</body>
		</html>