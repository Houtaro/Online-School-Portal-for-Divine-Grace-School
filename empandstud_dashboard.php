				//Student
				<?php
				$result = mysqli_query($con, "SELECT * FROM tblstudentclass ts
					LEFT JOIN tblclass c ON ts.classid = c.id 
					LEFT JOIN tblsubjects sb on ts.subjectid = sb.id
					where ts.studentid = '".$sessionid."'")or die(mysqli_error($con));
				if(mysqli_num_rows($result) > 0){
					?>
					<div class="custom-widgets">
						<div class="row-one">
							<?php while($row = mysqli_fetch_array($result)) { ?>
							<div class="col-md-3 widget">
								<a href="top_students.php<?php echo '?subid='.$row['subjectid'].'&classid='.$row['classid']; ?>">
									<div class="stats-left ">
										<h5><?php echo $row['subjectname']; ?></h5>
										<h4> <?php echo $row['classname']; ?></h4>
									</div>	
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php }else{ ?>
					<div class="alert alert-danger">No data found.</div>
					<?php } ?>

					//teacher
