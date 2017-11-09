<!DOCTYPE html>
<html>
<head>
	<title>Events - Online Portal</title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
	<div class="wrapper">
		<?php include "inc/header.php"; ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1> Manage - <small>Events</small> </h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-sm-7">
						<div class="box box-primary">
							<form id="submit_announce" action="crud_function.php" method="post">
								<div class="box-header with-border">
									<button type="button" id="del_event" class="btn btn-danger">Delete</button>
								</div>
								<div class="box-body">
									<input type="hidden" name="del_event" value="1">
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
											$query = "SELECT * FROM event_tbl";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result)){
												?>
												<tr> 
													<td width="20"><input type="checkbox" id="record" name="eventid[]" value="<?php echo $row['id']; ?>"></td>
													<td><?php echo $row['title']; ?></td> 
													<td><?php echo $row['descript']; ?></td> 
													<td><img width="40" height="40" src="images/<?php echo $row['image']; ?>"></td>
													<td><center><button type="button" aid="<?php echo $row['id']; ?>" atitle="<?php echo $row['title']; ?>" adescription="<?php echo $row['descript']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></center></td> 
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
									<h3 class="box-title"><i class="fa fa-plus-circle"> Add Events</i></h3>
								</div>
								<div class="box-body">
									<form action="crud_function.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Title:</label>
											<input type="text" class="form-control" name="txtttile" id="txtttile" required>
										</div>
										<div class="form-group">
											<label>Description:</label>
											<textarea name="txtdesc" class="form-control" id="description"></textarea>
										</div>
										<div class="form-group">
											<label>Image:</label>
											<input type="file" class="form-control" name="image" required>
										</div>
										<input type="hidden" name="eventid" id="eventid">
										<button type="submit" name="btnaddevent" id="btnaddevent" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="edit_event" class="btn btn-success">Update</button>
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
			$("#del_event").click(function(){
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
				$("#eventid").val($(obj).attr("aid"));
				$("#btnaddevent").hide();
				$("#btn_back").show();
				$("#btn_edit").show();
			}
			$("#btn_back").click(function(){
				$("#txtttile").val("");
				$("#description").val("");
				$("#eventid").val("");
				$("#btn_back").hide();
				$("#btn_edit").hide();
				$("#btnaddevent").show();
			})
		</script>

	</body>
	</html>