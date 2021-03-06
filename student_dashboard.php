<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php include "inc/stud_navbar.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Dashboard - <small>Student</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-3">
						<div class="box box-success">
							<div class="box-body">
								<img class="center-block profile-img img-responsive img-circle" src="<?php echo $profile_pic; ?>" alt="User profile picture">
								<h2 class="profile-username text-center"><b><?php echo $name; ?></b></h2>
								<h4 class="text-center">Student</h4>
								<center>
									<button style="margin-bottom:8px;" class="btn btn-primary" data-toggle="modal" data-target="#changepicmodal">Change Profile Picture</button><br>
								</center>
								<?php					
								$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
								$rowsy = mysqli_fetch_array($sy);
								$schoolyearid = $rowsy['id'];

								$user = mysqli_query($con, "SELECT * from tblstudentclass sc
									LEFT JOIN usertbl s ON sc.studentid = s.id
									LEFT JOIN tblyearlevel y ON sc.gradelevel = y.id
									LEFT JOIN tblclass c ON sc.classid = c.id
									where s.id='$sessionid' and sc.schoolyearid='$schoolyearid' group by s.id");
								$rowuser = mysqli_fetch_array($user);
								?>
								<br>
								<h3 style="margin:10px 0px 10px 0px;">Section: <?php echo $rowuser['yearlevel']; ?></h3>
								<h3 style="margin:10px 0px 10px 0px;">Grade Level: <?php echo $rowuser['classname']; ?></h3>

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
								<h3 class="box-title"><img src="images/chat.png" width="24" height="24"> <b>Compose post</b></h3>
							</div>
							<div class="box-body">
								<form action="crud_function.php" method="post">
									<div class="input-group">
										<textarea name="txtpost" class="form-control" placeholder="What's on your mind, <?php echo $user_rows['fname']; ?>?" required></textarea>
										<span class="input-group-btn">
											<button style="height:50px;" type="submit" name="btn_post" id="btn_post" class="btn btn-primary btn-flat">Post</button>
										</span>
									</div>
								</form>
							</div>
						</div>
						<?php 
						$qpost = mysqli_query($con, "SELECT * FROM posttbl order by id desc")or die (mysqli_error($con));
						while ($rowpost = mysqli_fetch_array($qpost)) {
							$quser = mysqli_query($con, "SELECT * FROM usertbl where id='".$rowpost['postby']."'")or die (mysqli_error($con));
							$rowu = mysqli_fetch_array($quser);
							?>
							<div class="box box-success">
								<form id="formpost" action="crud_function.php" method="post">
									<input type="hidden" name="delpost" value="1">
									<input type="hidden" name="postid" id="postid">
									<div class="box-header with-border">
										<?php  if ($sessionid == $rowu['id']) { ?>
										<button type="button" onclick="deletepost('<?php echo $rowpost['id']; ?>')" id="btn_delpost" name="btn_delpost" class="btn btn-danger pull-right">Delete</button>
										<?php } ?>
										<div class="user-block">
											<img class="img-circle" src="<?php echo $rowu['profile_pic']; ?>" alt="User Image">
											<span class="username"><a> <?php echo $rowu['fname']." ".$rowu['lname']; ?></a></span>
											<span class="description"><?php echo $rowpost['dateupload']; ?></span>
										</div>
									</div>
								</form>
								<div class="box-body">
									<h4><?php echo $rowpost['message']; ?></h4>
								</div>
							</div>
							<?php } ?>
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
																<?php echo $rowa['description']; ?>
															</span>
														</div>
													</li>
													<?php } else { echo "<div class='alert alert-danger'>No announcement added.</div>"; } } ?>
												</ul>
												<?php } else { echo "<div class='alert alert-danger'>No announcement added.</div>"; } ?>
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
									<?php include "inc/script.php"; include "inc/modal.php"; ?>
									<script>
										function deletepost(id){
											var conf = confirm("Are you sure you want to delete this post?");
											if (conf == true) {
												$("#postid").val(id);
												$("#formpost").submit();
											}
										}
									</script>
								</div>
							</body>
							</html>
