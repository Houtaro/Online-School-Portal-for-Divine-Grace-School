<!DOCTYPE html>
<html>
<head>
	<title>Events - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php 
		if($userType == "student"){ include "inc/stud_navbar.php"; }
		else if($userType == "teacher"){ include "inc/emp_navbar.php"; }else if($userType == "registrar"){ include "inc/registrar_navbar.php"; }
		else if($userType == "parent"){ include "inc/emp_navbar.php"; }else { include "inc/header.php"; } ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> View - <small>Events</small> </h1>
			</section>
			<section class="content">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><img src="images/Calendar.png" width="24" height="24"> <b>Events</b></h3>
					</div>
					<div class="box-body">
						<?php 
						$query = mysqli_query($con, "SELECT * FROM event_tbl")or die(mysqli_error($con));
						if(mysqli_num_rows($query) > 0){
							?>
							<ul class="products-list product-list-in-box">
								<?php while ($rowa = mysqli_fetch_array($query)) { ?>
								<li class="item">
									<div class="product-img">
										<img src="images/<?php echo $rowa['image']; ?>" alt="Product Image">
									</div>
									<div class="product-info">
										<a class="product-title"><?php echo $rowa['title']; ?></a>
										<span class="product-description">
											<?php echo $rowa['descript']; ?>
										</span>
										<small><?php echo $rowa['dateupload']; ?></small>
									</div>
								</li>
								<?php } ?>
							</ul>
							<?php }else { echo "<div class='alert alert-'>No event added.</div>"; } ?>
						</div>
					</div>
				</section>
			</div>
		</div>
		<?php include "inc/script.php"; include "inc/modal.php"; ?>
	</body>
	</html>