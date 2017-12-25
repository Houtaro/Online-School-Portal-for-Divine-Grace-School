<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php if ($userType == "teacher") { include "inc/emp_navbar.php"; }else if ($userType == "registrar") { include "inc/registrar_navbar.php"; }else{ include "inc/parent_navbar.php"; } ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Dashboard - <small><?php if ($userType == "teacher") { echo "Teacher"; }else if ($userType == "registrar") { echo "Registrar"; }else if ($userType == "registrar") { echo "Parent"; } ?></small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-3">
						<div class="box box-success">
							<div class="box-body">
								<img class="center-block profile-img img-responsive img-circle" src="<?php echo $profile_pic; ?>" alt="User profile picture">
								<h2 class="profile-username text-center"><b><?php echo $name; ?></b></h2>
								<h4 class="text-center"><?php echo $userType; ?></h4>
								<center>
									<button style="margin-bottom:8px;" class="btn btn-primary" data-toggle="modal" data-target="#changepicmodal">Change Profile Picture</button>
								</center>
								<br>
								<form action="crud_function.php" method="post">
									<div class="form-group">
										<label>Middle Name:</label>
										<input type="text" class="form-control" name="txtMiddlename" value="<?php echo $mname; ?>" placeholder="Middle Name">
									</div>
									<div class="form-group">
										<label>Contact No.</label>
										<input type="text" class="form-control" name="txtContact" value="<?php echo $contact; ?>" placeholder="Contact No.">
									</div>
									<button type="submit" name="btnsaveinfo" class="btn btn-primary">Save</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Your Son(s) / Daugter</h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<?php 
									$stud = mysqli_query($con, "SELECT * FROM parentstudtbl 
										LEFT JOIN usertbl ON parentstudtbl.studid = usertbl.id
										where parentid='$sessionid'");

									if(mysqli_num_rows($stud) > 0){
										?>
										<table class="table table-bordered"> 
											<thead> 
												<tr>
													<th>#</th> 
													<th>Image</th>
													<th>Full Name</th> 
													<th></th>
												</tr> 
											</thead>
											<tbody style="color:black;"> 
												<?php
												$cnt = 0;
												while ($row = mysqli_fetch_array($stud)) {
													$userid = $row['studid']; 
													?>
													<tr> 
														<th class="text-center" width="40" scope="row"><?php echo $cnt = $cnt + 1; ?></th>
														<td width="40"><img class="img-circle img-sm" src="<?php echo $row['profile_pic'] ?>"></td>
														<td><?php echo $row['lname'].", ".$row['fname']." ". $row['mname']; ?></td>
														<td width="50" class="text-center"><a href="studgrade_clearance.php<?php echo '?uid='.$userid; ?>" class="btn btn-primary btn-sm">View</a></td> 
													</tr> 
													<?php  } ?>
												</tbody> 
											</table>
											<?php }else{ ?>
											<div class="alert alert-danger">No data found.</div>
											<?php } ?>
										</form>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="box box-success">
									<div class="box-header with-border">
										<h3 class="box-title"><img src="images/megaphone.png" width="24" height="24"> <b>Announcement</b></h3>
									</div>
									<div class="box-body">
										<?php 
										$query = mysqli_query($con, "SELECT * FROM announcement order by id desc limit 5")or die(mysqli_error($con));
										if(mysqli_num_rows($query) > 0){
											?>
											<ul class="products-list product-list-in-box">
												<?php 
												while ($rowa = mysqli_fetch_array($query)) { 
													$id = $rowa['id'];
													$q = mysqli_query($con, "SELECT * FROM announcement_privilege where announceid='$id'")or die(mysqli_error($con));
													$cnt = mysqli_fetch_array($q);
													if($cnt['user'] == $userType){
														?>
														<li class="item">
															<div class="product-img">
																<img src="images/<?php echo $rowa['image']; ?>" alt="Product Image">
															</div>
															<div class="product-info">
																<a class="product-title"><?php echo $rowa['title']; ?></a>
																<span class="product-description">
																	<?php echo $rowa['description']; ?>"
																</span>
															</div>
														</li>
														<?php } else { echo "<div class='alert alert-danger'>No announcement added.</div>"; } } ?>
													</ul>
													<?php }else { echo "<div class='alert alert-'>No announcement added.</div>"; } ?>
												</div>
												<div class="box-footer text-center">
													<a href="all_announcement.php" class="uppercase">View All Announcements</a>
												</div>
											</div>

											<div class="box box-success">
												<div class="box-header with-border">
													<h3 class="box-title"><img src="images/Calendar.png" width="24" height="24"> <b>Events</b></h3>
												</div>
												<div class="box-body">
													<?php 
													$query = mysqli_query($con, "SELECT * FROM event_tbl order by id desc limit 5")or die(mysqli_error($con));
													if(mysqli_num_rows($query) > 0){
														?>
														<ul class="products-list product-list-in-box">
															<?php
															$pcdate = date("m/d/Y");
															while ($rowa = mysqli_fetch_array($query)) { 
																if($rowa['datestart'] >= $pcdate){
																	?>
																	<li class="item">
																		<div class="product-img">
																			<img src="images/<?php echo $rowa['image']; ?>" alt="Product Image">
																		</div>
																		<div class="product-info">
																			<a class="product-title"><?php echo $rowa['title']; ?></a>
																			<span class="product-description">
																				<?php echo $rowa['descript']; ?>
																			</span>
																			<small><?php echo date("M d, Y", strtotime($rowa['datestart'])); ?></small>
																		</div>
																	</li>
																	<?php } } ?>
																</ul>
																<?php }else { echo "<div class='alert alert-'>No event added.</div>"; } ?>
															</div>
															<div class="box-footer text-center">
																<a href="all_events.php" class="uppercase">View All Events</a>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>

									</div>
									<?php include "inc/script.php"; ?>
									<?php include "inc/modal.php"; ?>
									<script>
										function deletepost(id){
											var conf = confirm("Are you sure you want to delete this post?");
											if (conf == true) {
												$("#postid").val(id);
												$("#formpost").submit();
											}
										}
									</script>
								</body>
								</html>
