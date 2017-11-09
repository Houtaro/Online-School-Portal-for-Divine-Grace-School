<!DOCTYPE html>
<html>
<head>
	<title>Top Students - Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<style type="text/css">
	tbody tr:nth-child(odd){
		background-color: #5bc0de;
		border-color: #46b8da;
	}
	tbody tr:nth-child(odd) td{
		color: #fff;
	}
	tr:nth-child(even) {
		background-color: #fff;
	}
</style>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>Top 10 Students</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<a href="student_dashboard.php" class="btn btn-primary">Back</a>
					<div class="row">
						<div class="col-sm-5">
							<div class="graph" style="padding:10px;">
								<?php 
								$classid = validate($_GET['classid']);
								$subid = validate($_GET['subid']);
								?>
								<div class="form-group">
									<label>List of students in this grading period:</label>
									<select style="width:30%;padding:8px;margin-bottom:10px;" id="grading_period" onchange="gettopstudents()" class="form-control pull-right">
										<option>Prelim</option>
										<option>Midterm</option>
										<option>Pre Final</option>
										<option>Final</option>
									</select>
								</div>
								<div id="show_topstudents"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include "inc/stud_sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
		<script type="text/javascript">
			$(document).ready(function(){ gettopstudents(); });
			function gettopstudents(){
				var period = $("#grading_period").val();
				$.ajax({
					type:'POST',
					url:'crud_function.php',
					data: { period, get_top_students:'1', classid:'<?php echo $classid; ?>', subid:'<?php echo $subid ?>' },
					success:function(res){
						$('#show_topstudents').html(res);
					}
				}); 
			}
		</script>
	</body>
	</html>