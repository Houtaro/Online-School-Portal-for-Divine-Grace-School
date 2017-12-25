<!-- START OF THE HEADER -->
<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<?php
				$q = mysqli_query($con, "SELECT * FROM logotbl limit 1");
				$row = mysqli_fetch_array($q);
				?>
				<a href="teacher_dashboard.php" class="navbar-brand"><span class="logo-lg"><b><img src="images/<?php echo $row['logo']; ?>" width="34" height="32"> Divine Grace School</b></span></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<form action="crud_function.php" method="post">
				<button type="submit" style="display:none;" id="seenmes" name="update_mes_status"></button>
			</form>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li><a href="teacher_dashboard.php"><i class="fa fa-home fa-lg"></i> Home</a></li>
					<?php 
					$select_mes = mysqli_query($con,"SELECT * from conversation_tbl where (user_one='$sessionid' and user1_mes_status='1') or (user_two='$sessionid' and user2_mes_status='1')")or die(mysqli_error($con));
					$cntmes = mysqli_num_rows($select_mes);
					?>
					<li><a onclick="checkstatus()" href="#"><i class="fa fa-envelope-o fa-lg"></i> &nbsp;Messages <span class="label label-primary"><?php if ($cntmes > 0){ echo $cntmes; } else { echo ""; } ?></span></a></li>
					<li><a href="myclass.php"><i class="fa fa-book fa-lg"></i> &nbsp;Grades</a></li>
					<li><a href="studclearance.php"><i class="fa fa-file fa-lg"></i> &nbsp;Clearance</a></li>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="hidden-xs"><i class="fa fa-cog fa-lg"></i> &nbsp;Settings</span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src="<?php echo $profile_pic; ?>" class="img-circle">
								<p>
									<?php echo $name; ?>
									<small><?php echo $contact; ?></small>
								</p>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<a data-toggle="modal" data-target="#changepassmodal" class="btn btn-default btn-flat">Change Password</a>
								</div>
								<div class="pull-right">
									<a href="logout.php" class="btn btn-default btn-flat">Logout</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<script>
	function checkstatus(){
		$("#seenmes").click();
	}
</script>