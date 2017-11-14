<!-- START OF THE HEADER -->
<header class="main-header">
	<a href="admin_dashboard.php" class="logo">
		<span class="logo-mini"><img src="images/logo.png" width="34" height="32"></span>
		<span class="logo-lg"><b><img src="images/logo.png" width="34" height="32"> D.G.S</b></span>
	</a>
	<nav class="navbar navbar-static-top">
		<a class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo $profile_pic; ?>" class="user-image" alt="User Image">
						<span class="hidden-xs"><?php echo $name; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="<?php echo $profile_pic; ?>" class="img-circle">
							<p>
								<?php echo $name; ?>
								<small><?php //echo $row['Email']; ?></small>
							</p>
						</li>
						<button style="margin:10px 0px 0px 4px;" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#changepicmodal">Change Profile</button>
						<a style="margin:10px 0px 0px 4px;" data-toggle="modal" data-target="#changepassmodal" class="btn btn-default btn-flat">Change Password</a>
						<li class="user-footer">
							<div class="pull-right">
								<a href="logout.php" class="btn btn-default btn-flat">Logout</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>