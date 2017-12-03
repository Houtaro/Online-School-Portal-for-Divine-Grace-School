<!DOCTYPE html>
<html>
<head>
	<title>Announcement - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Manage - <small>Announcement</small>
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-primary">
							<form id="submit_announce" action="crud_function.php" method="post">
								<div class="box-header with-border">
									<button type="button" id="del_announce" class="btn btn-danger">Delete</button>
								</div>
								<div class="box-body">
									<input type="hidden" name="del_announce" value="1">
									<table class="table table-bordered"> 
										<thead> 
											<tr>
												<th><input type="checkbox" id="checkall"></th>
												<th>Title</th> 
												<th>Description</th> 
												<th>Image</th>
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 
											$query = "SELECT * FROM announcement";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result)){
												?>
												<tr> 
													<td width="20"><input type="checkbox" id="record" name="announceid[]" value="<?php echo $row['id']; ?>"></td>
													<td><?php echo $row['title']; ?></td> 
													<td><?php echo $row['description']; ?></td> 
													<td><img width="40" height="40" src="images/<?php echo $row['image']; ?>"></td>
													<td><center><button type="button" aid="<?php echo $row['id']; ?>" atitle="<?php echo $row['title']; ?>" adescription="<?php echo $row['description']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></center></td> 
												</tr> 
												<?php } ?>
											</tbody> 
										</table>
									</div>
								</form>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add Annoucement</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Title:</label>
											<input type="text" class="form-control" name="txtttile" id="txtttile" required>
										</div>
										<div class="form-group">
											<label>Description:</label>
											<textarea name="txtdesc" class="form-control" id="description" required></textarea>
										</div>
										<div class="form-group">
											<label>Image:</label>
											<input type="file" class="form-control" name="image" required>
										</div>
										<input type="hidden" name="announceid" id="announceid">
										<button type="submit" name="btnaddannounce" id="btnaddannounce" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="edit_announce" class="btn btn-success">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include "inc/sidebar.php"; ?>
			<?php include "inc/script.php"; ?>
			<script>
				$("#del_announce").click(function(){
					var conf = confirm("Are you sure you want to delete the selected announcement?");
					if(conf == true){
						$("#submit_announce").submit();
					}
				})
				$("#checkall").click(function()
				{
					if ($("#checkall").is(':checked')) {
						$("input#record").prop("checked", true);
					} else {
						$("input#record").prop("checked", false);
					}
				})
				function edit(obj)
				{
					$("#txtttile").val($(obj).attr("atitle"));
					$("#description").val($(obj).attr("adescription"));
					$("#announceid").val($(obj).attr("aid"));
					$("#btnaddannounce").hide();
					$("#btn_back").show();
					$("#btn_edit").show();
				}
				$("#btn_back").click(function(){
					$("#txtttile").val("");
					$("#description").val("");
					$("#announceid").val("");
					$("#btn_back").hide();
					$("#btn_edit").hide();
					$("#btnaddannounce").show();
				})
			</script>

		</body>
		</html>