<!DOCTYPE html>
<html>
<title>Print Clearance</title>
<?php include "inc/navbar.php"; ?>
<style type="text/css">
#title-print{ margin-top: 0px; text-align: center; font-weight: bold; color: #3D8EB9; font-size: 20pt; }
#address-print{ text-align: center; }
#contact-print{ text-align: center; color: #25373D; font-weight: bold; }
#logo-print{ position: absolute; left: 14%; top:34px; }
.print-box{ width: 100%; height: 1020px; border: 1px solid #25373D; font-family: sans-serif; background: #fff; margin: 10px auto; padding: 20px; padding-top: 80px; }
.twobox { border: 2px solid #25373D; height: 400px; padding: 20px; }
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
		<h5 id="contact-print">367-47-42</h5>

		<hr style="border: 1px solid #25373D; width: 40%;">
		<h3 style="margin-top: 20px;font-weight: bold;" class="text-center">STUDENT CLEARANCE</h3>
		<hr style="border: 1px solid #25373D;width: 40%;">

		<button id="print" class="btn btn-default" onclick="window.history.back()">Back</button>
		<?php if(!empty($_GET['studid'])){ 
			$studid = addslashes($_GET['studid']);
			$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
			$rowsy = mysqli_fetch_array($sy);
			$schoolyearid = $rowsy['id']; 

			$result = mysqli_query($con, "SELECT *,sg.id as sgid
				FROM tblstudentgrade sg
				LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
				AND sg.studentid = sc.studentid
				LEFT JOIN usertbl s ON sg.studentid = s.id
				LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
				LEFT JOIN usertbl t ON sg.adviserid = t.id
				LEFT JOIN tblclass c ON sg.classid = c.id
				LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
				where sg.studentid = '".$studid."' and sc.schoolyearid='$schoolyearid' group by sgid")or die(mysqli_error($con));

			if(mysqli_num_rows($result) > 0){

				$user = mysqli_query($con, "SELECT *, CONCAT(s.fname, ' ', s.lname) as sname from tblstudentclass sc
					LEFT JOIN usertbl s ON sc.studentid = s.id
					LEFT JOIN tblyearlevel y ON sc.gradelevel = y.id
					LEFT JOIN tblclass c ON sc.classid = c.id
					where s.id='$studid' and sc.schoolyearid='$schoolyearid' group by s.id");
				$rowuser = mysqli_fetch_array($user);
				?>
				<button id="print" class="btn btn-primary" onclick="window.print()">Print</button><br><br>
				<div style="margin: 0px 0px -20px 314px;">_______________________________</div>
				<div style="margin: 0px 0px -49px 624px;">__________________</div>
				<h3 class="text-center"> This is to certify that Ms./Mr. <b style="padding: 0px 40px 0px 40px;"><?php echo $rowuser['sname']; ?></b> of Gr. <b style="padding: 0px 20px 0px 20px;"><?php echo $rowuser['yearlevel']; ?></b> has been cleared all of his/her requirements on the following subjects, tuition accounts, and other obligations here at Divine Grace School.</h3>
				<br><br>
				<div class="row">
					<div class="col-sm-5">
						<table class="table"> 
							<tr>
								<th>Subject</th>
								<th>Status</th> 
							</tr> 	
							<tbody> 
								<?php
								while($row = mysqli_fetch_array($result)) {  
									?>
									<tr> 
										<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>
										<td width="170" class="text-center"><?php if($row['clearance_status'] == 0) { echo "<div style='color:green;font-size:20px;font-weight: bold;'>Cleared</div>"; } else { echo "<div style='color:red;font-size:20px;font-weight: bold;'>Not Cleared</div>"; } ?> 
										</td>
									</tr> 
									<?php } ?>
								</tbody> 
							</table>
						</div>

						<div class="col-sm-5">
							<div class="twobox">
								<?php 
								$result = mysqli_query($con, "SELECT *,sc.id as sid FROM studclearance sc
									LEFT JOIN clearancetbl ct on sc.clearanceid = ct.id
									LEFT JOIN  tblstudentclass s on sc.syid = s.schoolyearid
									where sc.studid = '".$studid."' and s.schoolyearid='$schoolyearid' group by sid")or die(mysqli_error($con));

								while($row = mysqli_fetch_array($result)) {  
									?>
									<h4><b><?php echo $row['clearancename'].": "; ?></b> <hr style="margin: -3px 10px 10px 100px; border: 1px solid #25373D; width: 70%;"></h4>
									<?php if($row['status'] == 1) {
										echo "<div style='margin: -36px 10px 10px 220px;color:green;font-size:20px;font-weight: bold;'>Cleared</div>"; } else { echo "<div style='margin: -36px 10px 10px 220px;color:red;font-size:20px;font-weight: bold;'>Not Cleared</div>"; } ?> 
										<?php } ?>

										<br><br>
										<?php 
										$result = mysqli_query($con, "SELECT *,sg.id as sgid, CONCAT(t.fname, ' ', t.lname) as tname FROM tblstudentgrade sg
											LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid AND sg.studentid = sc.studentid
											LEFT JOIN usertbl s ON sg.studentid = s.id
											LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
											LEFT JOIN usertbl t ON sg.adviserid = t.id
											where s.id='$studid' group by sgid")or die(mysqli_error($con));
										$row = mysqli_fetch_array($result);
										?>
										<div class="text-center">
											<h3 style="margin-bottom:-12px;" align="center"><?php echo $row['tname']; ?></h3>
											<div>_________________________</div>
											<h4 align="center" style="margin-top:2px;"><b>Class Adviser</b></h4>
										</div>

										<div class="left-right" style="margin-top: 30px;">
											<h3 style="margin-bottom:-12px;margin-left: 20px;"><?php echo $name; ?></h3>
											<div>_________________________</div>
											<h4 style="margin-top:2px;margin-left: 47px;"><b>Registrar</b></h4>
										</div>

										<div style="margin-top: -90px;" class="pull-right">
											<h3 style="margin-bottom:-12px;" align="center"><?php echo $name; ?></h3>
											<div>_________________________</div>
											<h4 align="center" style="margin-top:2px;"><b>Prepared By</b></h4>
										</div>
									</div>
								</div>
							</div>
							<?php }else{ ?><div class="alert alert-danger">No data found.</div> <?php } ?>
							<?php } else { ?><div class="alert alert-danger">No data found.</div><?php } ?>
						</div>
					</body>
					</html>