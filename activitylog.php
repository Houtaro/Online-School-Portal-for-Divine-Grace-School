<!DOCTYPE html>
<html>
<head>
	<title>Activity Log - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Activity Log</h1>
			</section>
			<section class="content">
				<div class="box box-success">
					<div class="box-body">
						<?php 
						$select = mysqli_query($con, "SELECT * FROM activity_log")or die(mysqli_error($con));
						if(mysqli_num_rows($select) > 0){
							$counter = 0;
							?>
							<table class="table table-bordered table-striped" id="example">
								<thead>
									<tr>
										<th>#</th>
										<th>Made By</th>
										<th>Description</th>
										<th>Date Made</th>
									</tr>
								</thead>

								<tbody>
									<?php while ($row = mysqli_fetch_array($select)) { ?>
									<tr>
										<td width="40" class="text-center"><?php echo $counter = $counter + 1; ?></td>
										<td><?php echo $row['madeby'] ?></td>
										<td><?php echo $row['description'] ?></td>
										<td><?php echo $row['datemade'] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php }else{ ?><div class="alert alert-danger">No data found.</div><?php } ?>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/sidebar.php"; ?>
			<?php include "inc/script.php"; include "inc/modal.php"; ?>
		</div>
	</body>
	</html>