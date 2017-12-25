<!DOCTYPE html>
<html>
<head>
	<title>Reports - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Reports</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-7">
						<div class="box box-success">
							<div class="box-body">
								<?php
								$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
								$rowsy = mysqli_fetch_array($sy);
								$schoolyearid = $rowsy['id'];

								$result = mysqli_query($con, "SELECT *, s.id as studid FROM tblstudentclass sc
									LEFT JOIN usertbl s ON sc.studentid = s.id
									where sc.schoolyearid='$schoolyearid' group by studid")or die(mysqli_error($con));
								if(mysqli_num_rows($result) > 0){
									?>
									<table class="table table-bordered" id="example"> 
										<thead> 
											<tr>
												<th>#</th> 
												<th>Student ID</th>
												<th>Image</th>
												<th>Full Name</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody style="color:black;"> 
											<?php
											$cnt = 0;
											while($row = mysqli_fetch_array($result)) { 
												$userid = $row['studid']; 
												?>
												<tr> 
													<th class="text-center" width="40" scope="row"><?php echo $cnt = $cnt + 1; ?></th>
													<td><?php echo $row['username']; ?></td> 
													<td width="40"><img class="img-circle img-sm" src="<?php echo $row['profile_pic'] ?>"></td>
													<td><?php echo $row['lname'].", ".$row['fname']." ". $row['mname']; ?></td>
													<td class="text-center"><a href="view_report.php<?php echo '?uid='.$userid; ?>" class="btn btn-primary btn-sm">View</a></td> 
												</tr> 
												<?php  } ?>
											</tbody> 
										</table>
										<?php }else{ ?>
										<div class="alert alert-danger">No data found.</div>
										<?php } ?>
									</div>
								</div>
							</section>
						</div>
						<?php include "inc/sidebar.php"; ?>
						<?php include "inc/script.php"; ?>
					</div>
				</body>
				</html>