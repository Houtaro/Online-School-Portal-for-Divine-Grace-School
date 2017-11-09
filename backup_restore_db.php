 <!DOCTYPE html>
 <html>
 <head>
 	<title>Online Grading System </title>
 	<?php include "inc/navbar.php"; ?>
 </head>
 <body>
 	<div class="page-container">
 		<div class="left-content">
 			<?php include "inc/header.php"; ?>
 			<?php
 			$host = 'localhost';
 			$user = 'root';
 			$pass = '';
 			$db = 'grading';

 			require_once('backup_restore_class.php');
 			 
 			$newImport = new backup_restore($host,$db,$user,$pass);

 			if(isset($_GET['process'])){
 				$process = $_GET['process'];
 				if($process == 'backup'){
 					$message = $newImport -> backup ();  
 					$crud->insert("backup_restore", array("message",'backupby','datebackup'), array("Database Successfully backup.", $name, date("M-d-Y h:i a"))); 
 				}else if($process == 'restore'){
 					$message = $newImport -> restore (); 
 					@unlink('backup_db/'.$db.'.sql');
 					$crud->insert("backup_restore", array("message",'backupby','datebackup'), array("Database Successfully restore.", $name, date("M-d-Y h:i a")));
 				}
 			}
 			if(isset($_POST['submit'])){        
 				$db = $db.'.sql';
 				$target_path = 'backup_db/'.$db;
 				move_uploaded_file($_FILES["file"]["tmp_name"], $target_path);    
 				$message = 'Successfully uploaded. You can now <a href=backup_restore_db.php?process=restore>restore</a> the database!';
 				$crud->insert("backup_restore", array("message",'backupby','datebackup'), array("Database Successfully uploaded.", $name, date("M-d-Y h:i a")));
 			}
 			?>
 			<div class="outter-wp">
 				<div class="sub-heard-part">
 					<ol class="breadcrumb m-b-0">
 						<li><h2 style="margin-top:0px;"><a>Backup and Restore Database</a></h2></li>
 					</ol>
 				</div>
 				<div class="graph-visual tables-main">
 					<div class="row">
 						<div class="col-sm-7">
 							<div class="graph" style="padding:10px;">
 								<form id="submit_yearlevel" action="crud_function.php" method="post">
 									<div class="tables">
 										<table class="table table-bordered"> 
 											<thead> 
 												<tr>
 													<th>Message</th> 
 													<th>Backup or Restore By</th> 
 													<th>Date Backup</th>
 												</tr> 
 											</thead>
 											<tbody> 
 												<?php
 												$query = "SELECT * FROM backup_restore";
 												$result = mysqli_query($con, $query);

 												while($row = mysqli_fetch_array($result))
 												{
 													?>
 													<tr> 
 														<td><?php echo $row['message']; ?></td> 
 														<td><?php echo $row['backupby']; ?></td>
 														<td><?php echo $row['datebackup']; ?></td> 
 													</tr> 
 													<?php } ?>
 												</tbody> 
 											</table>
 										</div>
 									</form>
 								</div>
 							</div>

 							<div class="col-sm-5">
 								<?php if(isset($_GET['process'])): ?>
 									<?php 
 									$msg = $_GET['process'];   
 									$class = 'text-center';
 									switch($msg){
 										case 'backup':
 										$msg = 'Backup successful!<br />Download THE <a href="'.'backup_db/'.$message.'" target=_blank >SQL FILE </a> OR RESTORE IT ANY TIME'; 
 										break;
 										case 'restore':
 										$msg = $message; 
 										break;
 										case 'upload':
 										$msg = $message; 
 										break;
 										default:
 										$class = 'hide';
 									}                                
 									?>
 									<div class="alert alert-info <?php echo $class;?>">
 										<strong><?php echo $msg; ?></strong>
 									</div>
 								<?php endif; ?>
 								<div class="graph" style="padding:6px;">
 									<a href="backup_restore_db.php?process=backup">
 										<button style="padding:6px;" type="button" class="btn btn-success btn-sm">BACKUP DATABASE</button>
 									</a>
 									<a href="backup_restore_db.php?process=restore">
 										<button style="padding:6px;" type="button" class="btn btn-info btn-sm">RESTORE DATABASE</button>
 									</a>
 									<br />
 									<div class="upload alert alert-warning">
 										<hr />
 										<form method="POST" enctype="multipart/form-data">
 											<label>Upload SQL File:</label>
 											<input type="file" name="file" class="form-control" required><br>
 											<input type="submit" name="submit" class="btn btn-success" value="Upload Database" />
 										</form>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 				<?php include "inc/sidebar.php"; ?>
 			</div>
 			<?php include "inc/script.php"; ?>
 		</body>
 		</html>