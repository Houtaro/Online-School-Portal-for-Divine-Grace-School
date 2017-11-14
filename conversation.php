<!DOCTYPE html>
<html>
<head>
	<title>Conversation - Online School Portal </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body class="hold-transition fixed skin-green layout-top-nav">
	<div class="wrapper">
		<?php 
		if($userType == "student"){ include "inc/stud_navbar.php"; } else if($userType == "teacher"){ include "inc/emp_navbar.php"; }else if($userType == "registrar"){ include "inc/registrar_navbar.php"; } 
		else if($userType == "parent"){ include "inc/parent_navbar.php"; }else { include "inc/header.php"; } ?>
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-success direct-chat direct-chat-success">
					<form action="crud_function.php" method="post">
						<?php
						if (!empty($_GET['rid']) && !empty($_GET['cid'])) 
						{
							$userid = validate(addslashes($_GET['rid']));
							$c_id = validate(addslashes($_GET['cid']));

							$select_mes = mysqli_query($con, "SELECT * from conversation_tbl where (user_one='$sessionid' AND user_two='$userid') OR (user_one='$userid' AND user_two='$sessionid')")or die(mysqli_error($con));
							$row_mes = mysqli_fetch_array($select_mes);

							$select_reply = mysqli_query($con, "SELECT U.*,R.* FROM conversation_reply R, usertbl U where R.user_id_fk=U.id and R.c_id_fk='$c_id' ORDER BY R.CR_ID")or die(mysqli_error($con));
							$cnt_row = mysqli_num_rows($select_reply);

							$select_user = mysqli_query($con, "SELECT profile_pic,fname,lname from usertbl where id='$userid'")or die(mysqli_error($con));
							$row_user = mysqli_fetch_array($select_user);
							?>
							<div class="box-header with-border">
								<a href="inbox.php" class="btn btn-default btn-sm pull-right">Back</a>
								<h3 class="box-title"> <?php echo $row_user['fname']." ".$row_user['lname'] ?> </h3>
							</div>
							<div class="box-body" style="height: 400px;">
								<div class="direct-chat-messages" style="height: 390px;">
									<input type="hidden" name="c_id" id="c_id" value="<?php echo $c_id; ?>">
									<input type="hidden" name="txtreciever" id="user_id" value="<?php echo $userid; ?>">
									<?php 
									while ($row_reply = mysqli_fetch_array($select_reply)) { 
										$timestamp = $row_reply['time'];
										if ($row_reply['user_id_fk'] != $sessionid)  {
											?>	
											<div class="direct-chat-msg" data-id="<?php echo $row_reply["CR_ID"]; ?>">
												<div class="direct-chat-info clearfix">
													<small><time class="direct-chat-timestamp pull-right timeago" datetime="<?php echo $timestamp; ?>"><?php echo date('M d, Y', strtotime($timestamp)) ?></time></small>
												</div>
												<img class="direct-chat-img" src="<?php echo $row_reply['profile_pic'] ?>" alt="Message User Image" />
												<div class="direct-chat-text">
													<?php echo $row_reply['reply'] ?>
												</div>
											</div>
											<?php } else { ?>
											<div class="direct-chat-msg right" data-id="<?php echo $row_reply["CR_ID"]; ?>">
												<div class="direct-chat-info clearfix">
													<small><time class="direct-chat-timestamp pull-left timeago" datetime="<?php echo $timestamp; ?>"><?php echo date('M d, Y', strtotime($timestamp)) ?></time></small>
												</div>
												<img class="direct-chat-img" src="<?php echo $row_reply['profile_pic'] ?>" alt="Message User Image" />
												<div class="direct-chat-text">
													<?php echo $row_reply['reply'] ?>
												</div>
											</div>
											<?php } } ?>
										</div>
									</div>
									<div class="box-footer">
										<div class="input-group">
											<textarea style="height: 36px;" name="txtmessage" placeholder="Type Message ..." class="form-control"></textarea>
											<span class="input-group-btn">
												<button type="submit" name="btnsendmessage" class="btn btn-success btn-flat">Send</button>
											</span>
										</div>
									</div>
									<?php } ?>
								</form>
							</div>
						</section>
					</div>
				</div>
				<?php include "inc/script.php"; include "inc/modal.php"; ?>
				<script>
					$('.direct-chat-messages').scrollTop($('.direct-chat-messages').height());
				</script>
			</body>
			</html>