<!DOCTYPE html>
<html>
<head>
	<title>Slide Show - Online Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Slide Show</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<form action="crud_function.php" method="post" name="del_slides" id="del_slides">
						<div class="col-sm-7">
							<div class="box box-primary">
								<div class="box-header with-border">
									<button type="button" id="del_slide" class="btn btn-danger" onclick="del_slideshow()">Delete</button>
								</div>
								<input type="hidden" name="del_slidepic" value="1">
								<div class="box-body">
									<table class="table table-bordered"> 
										<thead> 
											<tr> 
												<th class="text-center"><input type="checkbox" id="checkall"></th> 
												<th>Slide show image</th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$counter = 0;
											$query = "SELECT * FROM slide_tbl";
											$result = mysqli_query($con, $query);
											while($row = mysqli_fetch_array($result)) {
												?>
												<tr> 
													<td width="40" align="center"><input type="checkbox" id="record" name="slideid[]" value="<?php echo $row['id']; ?>"></td>
													<td><img width="70" height="70" src="images/<?php echo $row['image']; ?>"></td>
												</tr> 
												<?php } ?>
											</table>
										</div>
										<input type="hidden" name="admin_id" id="admin_id">
									</div>
								</div>
							</form>

							<div class="col-sm-5">
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title"><i class="fa fa-plus-circle"> Add Slide Show</i></h3>
									</div>
									<div class="box-body">
										<form method="post" action="crud_function.php" enctype="multipart/form-data">
											<div class="form-group">
												<label>Image</label>
												<input type="file" class="form-control" name="slideimg" required>
											</div>
											<input type="hidden" id="adminid" name="adminid" value="">
											<button type="submit" name="btnaddslides" id="btnaddslides" class="btn btn-primary">Add</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<?php include "inc/sidebar.php"; ?>
			</div>
			<?php include "inc/script.php"; ?>
			<script>

				function del_slideshow()
				{
					var conf = confirm("Are you sure you want to delete the selected slide/s?");
					if(conf == true){
						$("#del_slides").submit();
					}
				}

				$("#checkall").click(function()
				{
					if ($("#checkall").is(':checked')) {
						$("input#record").prop("checked", true);
					} else {
						$("input#record").prop("checked", false);
					}
				})
			</script>
		</body>
		</html>