<?php
require "conn.php";
include "session.php";

if(isset($_POST['updatelogo']))
{
	$logo = $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $logo);
	$id = validate($_POST['id']);
	$crud->update("logotbl", array("id","logo"), array($id,$logo));
	echo "<script>alert('Logo saved.');</script>";
	echo "<script>(function(){ window.location.href='content.php'; })()</script>";
}

if(isset($_POST['btnlinks']))
{
	$link = validate($_POST['txtlink']);

	$select = mysqli_query($con, "SELECT * FROM links where link='$link'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Link Already Exist.'); window.location.href='content.php';</script> <?php
	}else{
		$crud->insert("links", array("link"), array($link));
		echo "<script>alert('Link added.');</script>";
		echo "<script>(function(){ window.location.href='content.php'; })()</script>";
	}
}

if(isset($_POST['updatecontactus']))
{
	$email = validate($_POST['txtemail']);
	$telephone = validate($_POST['txttel']);
	$phone = validate($_POST['txtphone']);
	$address = validate($_POST['txtaddress']);
	$id = validate($_POST['id']);
	$crud->update("contactus", array("id","email","telephone","phone","address"), array($id,$email,$telephone,$phone,$address));
	echo "<script>alert('Contact Us saved.');</script>";
	echo "<script>(function(){ window.location.href='content.php'; })()</script>";
}

if(isset($_POST['updateaboutus']))
{
	$mission = validate($_POST['txtmission']);
	$vision = validate($_POST['txtvision']);
	$goal = validate($_POST['txtgoal']);
	$id = validate($_POST['aboutid']);
	$crud->update("aboutus", array("id","mission","vision","goal"), array($id,$mission,$vision,$goal));
	echo "<script>alert('About Us saved.');</script>";
	echo "<script>(function(){ window.location.href='content.php'; })()</script>";
}

if(isset($_POST['getsubject']))
{
	$cur_id = $_POST['curid'];
	$gradeid = $_POST['gradeid'];

	$query = "SELECT * FROM tblsubjects WHERE cur_id = " . $cur_id . " AND yearlevelid = " . $gradeid;
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			$data[] = $row;
		} 
		print json_encode($data);
	}
	else
	{
		echo "no data";
	}
}

if(isset($_POST['btnsaveinfo'])){
	$mname = validate($_POST['txtMiddlename']);
	$con_no = validate($_POST['txtContact']);
	$crud->update("usertbl", array("id", "mname", "contact"), array($sessionid, $mname, $con_no));
	?>
	<script> alert('Successfully updated.'); 
	window.location.href='<?php if($userType == "student"){ echo 'student_dashboard.php'; }
	else if($userType == "teacher"){ echo 'teacher_dashboard.php'; }else if($userType == "registrar"){ echo 'teacher_dashboard.php'; }
	else if($userType == "parent"){ echo 'parent_dashboard.php'; }else { echo 'admin_dashboard.php'; } ?>'; </script>
	<?php
}

if(isset($_POST['btnaddclearance']))
{
	$clearance = validate($_POST['txtclearance']);
	$select = mysqli_query($con, "SELECT * FROM clearancetbl where clearancename='$clearance'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Clearance Already Exist.'); window.location.href='manage_clearance.php';</script> <?php
	}else{
		$crud->insert("clearancetbl", array("clearancename"), array($clearance));
		header("location:manage_clearance.php");
	}
}

if(isset($_POST['btneditclearance']))
{
	$id = validate($_POST['clearanceid']);
	$clearance = validate($_POST['txtclearance']);
	$crud->update("clearancetbl", array("id","clearancename"), array($id, $clearance));
	header("location:manage_clearance.php");
}

if(isset($_POST['del_clearance']))
{
	if (!empty($_POST['clearanceid'])) 
	{
		$clearanceid = $_POST['clearanceid'];
		$N = count($clearanceid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from clearancetbl where id = '$clearanceid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Clearance deleted.');</script>";
		echo "<script>(function(){ window.location.href='manage_clearance.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select clearance you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='manage_clearance.php'; })()</script>";
	}
}

if (isset($_POST['get_cid'])) 
{
	$recieverid = $_POST['recieverid'];
	$result = mysqli_query($con, "SELECT * FROM conversation_tbl WHERE (user_one='$sessionid' and user_two='$recieverid') or (user_one='$recieverid' and user_two='$sessionid')");
	$row = mysqli_fetch_array($result);
	echo $row['C_ID'];
}

if (isset($_POST['btn-import-stud'])) {
	$filename = $_FILES["import_stud"]["tmp_name"];
	$pass = "student123";
	if($_FILES["import_stud"]["size"] > 0)
	{
		$row = true;
		$ColNum = 3;
		$file = fopen($filename, "r");
		while (($stud_data = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			$countcols = count($stud_data);
			if ($countcols != $ColNum) 
			{
				echo "<script> alert('Please follow the format of importing students.'); window.location = 'student.php' </script>";
			} 
			else 
			{
				if($row) { $row = false; continue; }
				$Fname = validate($stud_data[0]);
				$Mname = validate($stud_data[1]);
				$Lname = validate($stud_data[2]);

				$fname_3 = substr($Fname, 0, 3);
				$lname_3 = substr($Lname , -3);
				$random = rand(0,5);
				$username = $fname_3.$lname_3.$random;

				$user = mysqli_query($con, "SELECT * FROM usertbl where fname = '$Fname' and lname = '$Lname'")or die(mysqli_error($con));

				if (mysqli_num_rows($user) > 0) 
				{
					?> <script> alert('Student Already Exist'); window.location = "student.php"; </script> <?php
				}
				else
				{ 
					mysqli_query($con,"INSERT into usertbl(username, fname,mname,lname,password,profile_pic,status,usertype)values('$username','$Fname','$Mname','$Lname','$pass','images/man-28.png','0','student')")or die(mysqli_error($con));
					?> <script> alert('Student Information Successfully Import!'); window.location = "student.php"; </script> <?php
				}
			}
		}
		fclose($file);
	}
	mysqli_close($con);
}

if (isset($_POST['update_mes_status'])) 
{
	$result = mysqli_query($con, "SELECT U.id,C.* from conversation_tbl C, usertbl U where CASE WHEN C.user_one = '$sessionid' THEN C.user_two = U.id  WHEN C.user_two = '$sessionid' THEN C.user_one = U.id  END AND (C.user_one='$sessionid' OR C.user_two='$sessionid')")or die(mysqli_error($con));
	while ($row = mysqli_fetch_array($result)) 
	{
		if ($sessionid == $row['user_one']) 
		{
			mysqli_query($con, "UPDATE conversation_tbl set user1_mes_status='0' where user_one='$sessionid' or user_two='$sessionid'")or die(mysqli_error($con));
		}
		elseif ($sessionid == $row['user_two']) 
		{
			mysqli_query($con, "UPDATE conversation_tbl set user2_mes_status='0' where user_one='$sessionid' or user_two='$sessionid'")or die(mysqli_error($con));
		}
	}
	header("location:inbox.php");
}

if (isset($_POST['btnchangepass'])) 
{
	$pass = validate(addslashes($_POST['txtconpass']));
	$crud->update("usertbl", array("id", "password"), array($sessionid, $pass));
	?>
	<script> alert('Successfully updated.'); 
	window.location.href='<?php if($userType == "student"){ echo 'student_dashboard.php'; }
	else if($userType == "teacher"){ echo 'teacher_dashboard.php'; }else if($userType == "registrar"){ echo 'teacher_dashboard.php'; }
	else if($userType == "parent"){ echo 'parent_dashboard.php'; }else { echo 'admin_dashboard.php'; } ?>'; </script>
	<?php
}

if (isset($_POST['btnchangepic'])) 
{
	$pic = validate($_FILES['txtprofilepic']['name']);
	move_uploaded_file($_FILES['txtprofilepic']['tmp_name'], "images/" . $pic);
	$crud->update("usertbl", array("id", "profile_pic"), array($sessionid, "images/".$pic));
	?>
	<script> alert('Successfully updated.'); 
	window.location.href='<?php if($userType == "student"){ echo 'student_dashboard.php'; }
	else if($userType == "teacher"){ echo 'teacher_dashboard.php'; }else if($userType == "registrar"){ echo 'teacher_dashboard.php'; }
	else if($userType == "parent"){ echo 'parent_dashboard.php'; }else { echo 'admin_dashboard.php'; } ?>'; </script>
	<?php
}

if(isset($_POST['btn_post']))
{
	$message = validate(addslashes($_POST['txtpost']));

	$crud->insert("posttbl", array("message", "postby", "dateupload"), array($message,$sessionid,date("M d, Y - h:i a")));
	?>
	<script> window.location.href='<?php if($userType == "student"){ echo 'student_dashboard.php'; }
	else if($userType == "teacher"){ echo 'teacher_dashboard.php'; }else if($userType == "registrar"){ echo 'teacher_dashboard.php'; }
	else if($userType == "parent"){ echo 'parent_dashboard.php'; }else { echo 'admin_dashboard.php'; } ?>'; </script>
	<?php
}

if(isset($_POST['delpost']))
{
	$postid = validate($_POST['postid']);
	mysqli_query($con, "DELETE from posttbl where id = '$postid'")or die(mysqli_error($con));
	?>
	<script> alert("Successfully deleted."); window.location.href='<?php if($userType == "student"){ echo 'student_dashboard.php'; }
	else if($userType == "teacher"){ echo 'teacher_dashboard.php'; }else if($userType == "registrar"){ echo 'teacher_dashboard.php'; }
	else if($userType == "parent"){ echo 'parent_dashboard.php'; }else { echo 'admin_dashboard.php'; } ?>'; </script>
	<?php
}

if (isset($_POST['btnsendmessage'])) 
{
	$userid = $_POST['txtreciever'];
	$date_now = date("M d, y h:i a");
	$reply = mysqli_real_escape_string($con, addslashes($_POST['txtmessage']));
	$select_user = "SELECT * FROM conversation_tbl WHERE (user_one='$sessionid' and user_two='$userid') or (user_one='$userid' and user_two='$sessionid')";
	$res = mysqli_query($con, $select_user)or die(mysqli_error($con));
	if(mysqli_num_rows($res) == 0) 
	{ 
		mysqli_query($con, "INSERT INTO conversation_tbl(user_one,user_two,user1_mes_status,user2_mes_status,date_time)VALUES('$sessionid','$userid','0','1','".date("M d, Y - h:i a")."')")or die(mysqli_error($con));
		$get_convo = mysqli_query($con,"SELECT * FROM conversation_tbl WHERE (user_one='$sessionid' and user_two='$userid') or (user_one='$userid' and user_two='$sessionid')")or die(mysqli_error($con));
		$row = mysqli_fetch_array($get_convo);
		$c_id = $row['C_ID'];
		mysqli_query($con, "INSERT INTO conversation_reply(user_id_fk,reply,c_id_fk)VALUES('$sessionid','$reply','$c_id')")or die(mysqli_error($con));
		?><script> window.location = "inbox.php" </script><?php
	}
	else
	{
		$cid = mysqli_real_escape_string($con, addslashes($_POST['c_id']));
		$select_con = mysqli_query($con, "SELECT * FROM conversation_tbl WHERE c_id='$cid'");
		$row_con = mysqli_fetch_array($select_con);

		if ($sessionid == $row_con['user_one']) 
		{
			mysqli_query($con, "UPDATE conversation_tbl set user2_mes_status='1',date_time='".date("M d, Y - h:i a")."' where c_id='$cid'")or die(mysqli_error($con));
		}
		elseif ($sessionid == $row_con['user_two']) 
		{
			mysqli_query($con, "UPDATE conversation_tbl set user1_mes_status='1',date_time='".date("M d, Y - h:i a")."' where c_id='$cid'")or die(mysqli_error($con));
		}
		mysqli_query($con, "INSERT INTO conversation_reply(user_id_fk,reply,c_id_fk)VALUES('$sessionid','$reply','$cid')")or die(mysqli_error($con));
		?><script> window.location = "conversation.php<?php echo '?rid='.$userid."&&cid=".$cid; ?>" </script><?php
	}
}

if(isset($_POST['btnAddSchoolYear']))
{
	$sy = validate($_POST['txtSchoolYear']);
	$school_year = $sy."-".($sy+1);
	$select = mysqli_query($con, "SELECT * FROM tblschoolyear where schoolyear='$school_year'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('School Year Already Exist.'); window.location.href='school_year.php';</script> <?php
	}else{
		$crud->insert("tblschoolyear", array("schoolyear", "status"), array($school_year, 1));
		echo "<script>alert('School Year added.');</script>";
		echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
	}
}

if(isset($_POST['btneditSchoolYear']))
{
	$id = $_POST['school_year_id'];
	$sy = validate($_POST['txtSchoolYear']);
	$school_year = $sy."-".($sy+1);
	$select = mysqli_query($con, "SELECT * FROM tblschoolyear where schoolyear='$school_year'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('School Year Already Exist.'); window.location.href='school_year.php';</script> <?php
	}else{
		$crud->update("tblschoolyear", array("id", "schoolyear"), array($id, $school_year));
		echo "<script>alert('Successfully updated.');</script>";
		echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
	}
}

if(isset($_POST['btnAddSubjects']))
{
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);
	$cur_id = validate($_POST['cboCurriculum']);
	$select = mysqli_query($con, "SELECT * FROM tblsubjects where subjectname='$subjectname' and description='$desc' and yearlevelid='$yearlevelid'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Subject Already Exist.'); window.location.href='subject.php';</script> <?php
	}else{
		$crud->insert("tblsubjects", array("subjectname", "description", "yearlevelid", "cur_id"), array($subjectname,$desc,$yearlevelid, $cur_id));
		echo "<script>alert('Subject added.');</script>";
		echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
	}
}

if(isset($_POST['edit_subject']))
{
	$subid = $_POST['subid'];
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);
	$cur_id = $_POST['cboCurriculum'];
	$crud->update("tblsubjects", array("id", "subjectname", "description", "yearlevelid", "cur_id"), array($subid,$subjectname,$desc,$yearlevelid, $cur_id));
	echo "<script>alert('Subject updated.');</script>";
	echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
}

if(isset($_POST['del_subject']))
{
	if (!empty($_POST['subid'])) 
	{
		$subid = $_POST['subid'];
		$N = count($subid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblsubjects where id = '$subid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Student Class deleted.');</script>";
		echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select subject you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
	}
}

if(isset($_POST['add_studclass']))
{
	$classid = validate($_POST['cboclass']);
	$gradelevel = validate($_POST['cbogradelevel']);
	$cur_id = validate($_POST['cbocurriculum']);
	$schoolyearid = validate($_POST['txtschoolyear']);
	if($_POST['enrolltype'] == "0")
	{
		$studentid = $_POST['students'];
		$cntid = count($studentid);
		for ($i=0; $i < $cntid; $i++) { 

			$querys_enroll = mysqli_query($con, "SELECT * from tblstudentclass where classid='$classid' and studentid = '$studentid[$i]' and gradelevel = '$gradelevel'")or die(mysqli_error($con));

			if (mysqli_num_rows($querys_enroll) > 0) 
			{
				?><script> alert('Students Already Enrolled.'); window.location = "student_class.php"; </script><?php
			}
			else
			{ 
				$subj = mysqli_query($con, "SELECT * FROM tblsubjects where yearlevelid = '$gradelevel'")or die(mysqli_error($con));
				while($rowlvl = mysqli_fetch_array($subj)){
					$lvlid = $rowlvl['id'];
					$crud->insert("tblstudentclass", array("classid", "subjectid", "studentid", "cur_id", "gradelevel", "schoolyearid"), array($classid, $lvlid, $studentid[$i], $cur_id, $gradelevel, $schoolyearid));
				}

				$clearance = mysqli_query($con, "SELECT * FROM clearancetbl")or die(mysqli_error($con));
				while($rowc = mysqli_fetch_array($clearance)){
					$clearanceid = $rowc['id'];
					$studclearance = mysqli_query($con, "SELECT * FROM studclearance where clearanceid='$clearanceid' and studid='$studentid[$i]'")or die(mysqli_error($con));
					if(mysqli_num_rows($studclearance) == 0){
						$crud->insert("studclearance", array("studid", "clearanceid", "status", "syid"), array($studentid[$i], $clearanceid, '0', $schoolyearid));
					}
				}
				?><script> alert('Student successfully enrolled.'); window.location = "student_class.php"; </script><?php
			}
		}
	}else{
		$stud_list = $_FILES['stud_list']['tmp_name'];
		if($_FILES["stud_list"]["size"] > 0) {
			$row = true;
			$ColNum = 3;
			$file = fopen($stud_list, "r");
			while (($stud_data = fgetcsv($file, 1000, ",")) !== FALSE) {
				$countcols = count($stud_data);
				if ($countcols != $ColNum) 
				{
					?><script>alert('Column did not match.'); window.location = "student_class.php"; </script><?php
				}else {
					if($row) { $row = false; continue; }
					$Fname = validate($stud_data[0]);
					$Mname = validate($stud_data[1]);
					$Lname = validate($stud_data[2]);

					$stud_exist = mysqli_query($con, "SELECT * FROM usertbl where fname = '$Fname' and lname = '$Lname'")or die(mysqli_error($con));
					if (mysqli_num_rows($stud_exist) > 0) 
					{ 
						$rowstud = mysqli_fetch_array($stud_exist);
						$stud_id = $rowstud['id'];

						$querys_enroll = mysqli_query($con, "SELECT * from tblstudentclass where classid='$classid' and studentid = '$stud_id' and gradelevel = '$gradelevel'")or die(mysqli_error($con));

						if (mysqli_num_rows($querys_enroll) > 0) 
						{
							?><script> alert('Students Already Enrolled.'); window.location = "student_class.php"; </script><?php
						}
						else
						{ 
							$subj = mysqli_query($con, "SELECT * FROM tblsubjects where yearlevelid = '$gradelevel'")or die(mysqli_error($con));
							while($rowsub = mysqli_fetch_array($subj)){
								$subid = $rowsub['id'];
								$crud->insert("tblstudentclass", array("classid", "subjectid", "studentid", "cur_id", "gradelevel", "txtschoolyear"), array($classid, $subid, $stud_id, $cur_id, $gradelevel,$schoolyearid));
							}

							$studclearance = mysqli_query($con, "SELECT * FROM studclearance where clearanceid='$clearanceid' and and studid='$stud_id'")or die(mysqli_error($con));
							if(mysqli_num_rows($studclearance) == 0){
								$crud->insert("studclearance", array("studid", "clearanceid", "status", "syid"), array($stud_id, $clearanceid, '0', $schoolyearid));
							}
							?><script> alert('Student successfully enrolled.'); window.location = "student_class.php"; </script><?php
						}
					}  else { 
						?><script> alert('Student not Exist.'); window.location = "student_class.php"; </script><?php
					}
				}
			}
			fclose($file);
		}
	}
}

if(isset($_POST['edit_studclass']))
{
	$studclass_id = validate($_POST['stud_class_id']);
	$classid = validate($_POST['cboclass']);
	$studentid = validate($_POST['cboStudent']);
	//$cur_id = validate($_POST['cbocurriculum']);
	//$gradeid = validate($_POST['cbogradelevel']);

	//echo $studclass_id . " 1 " . $classid . " 2 " . $studentid;
	$crud->update("tblstudentclass", array("id", "classid", "studentid"), array($studclass_id, $classid, $studentid));
	//$crud->getQuery();
	echo "<script>alert('Student Class updated.');</script>";
	echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
}
if(isset($_POST['del_studclass']))
{
	if(!empty($_POST['studclassid']))
	{
		$studclassid = $_POST['studclassid'];
		for($i = 0; $i < count($studclassid); $i++)
		{
			$crud->delete("tblstudentclass", "id", $studclassid[$i]);
		}
		echo "<script>alert('Deleted.');</script>";
		echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select student class you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
	}
}

if(isset($_POST['btnAddStudent']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);
	$select = mysqli_query($con, "SELECT * FROM usertbl where fname='$firstname' and lname='$lastname' and usertype='student' or username='$username'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Student Already Exist.'); window.location.href='student.php';</script> <?php
	}else{
		$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype", "profile_pic"), array($username, $username, $firstname, $middlename, $lastname, $contact, "student", "images/man-28.png"));		
		echo "<script>alert('Student added.');</script>";
		echo "<script>(function(){ window.location.href='student.php'; })()</script>";
	}
}

if(isset($_POST['edit_student']))
{
	$id = validate($_POST['id']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $middlename, $lastname, $contact));
	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";	
}

if(isset($_POST['edit_userInfo']))
{
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->update("usertbl", array("id", "fname", "mname", "lname", "contact"), array($sessionid, $firstname, $middlename, $lastname, $contact));		

	echo "<script>alert('User Info updated.');</script>";
	echo "<script>(function(){ window.location.href='profile.php'; })()</script>";
}

if(isset($_POST['del_studgrade']))
{
	$classid = $_POST['cboclass'];
	$subjectid = validate($_POST['cbosubjectid']);
	if (!empty($_POST['sgid'])) 
	{
		$sgid = $_POST['sgid'];
		$N = count($sgid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblstudentgrade where id = '$sgid[$i]'")or die(mysqli_error($con));
		}
		?><script> alert('Student Grade deleted.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}
	else
	{
		?><script> alert('Please select student grade you want to delete, Thank you!'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}
}

if(isset($_POST['edit_password']))
{
	$newpass = validate($_POST['txtnewpass']);
	$password = validate($_POST['txtconpass']);

	if($newpass == $password){
		$crud->update("usertbl", array("id", "password"), array($sessionid, $password));	
		echo "<script> alert('User password updated.'); (function(){ window.location.href='profile.php'; })()</script>";	
	}else{
		?> <script> alert("Password doesn't match."); (function(){ window.location.href='profile.php'; })();</script> <?php
	}
}

if(isset($_POST['add_studentgrade']))
{
	$adviserid = $sessionid;
	$classid = $_POST['cboclass'];
	$studid = $_POST['cbostudent']; 
	$subjectid = validate($_POST['cbosubjectid']);
	$prelim = $_POST['prelim'];
	$select = mysqli_query($con, "SELECT * FROM tblstudentgrade where studentid='$studid' and subjectid='$subjectid' and classid='$classid' and adviserid='$adviserid'")or die(mysqli_error($con));
	if(mysqli_num_rows($select) > 0){
		?><script> alert('Student Grade Already exist.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}else{
		$crud->insert("tblstudentgrade", array("studentid", "subjectid", "classid", "adviserid", "prelim"), array($studid,$subjectid,$classid,$adviserid,$prelim));
		?><script> alert('Successfully added.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}
}

if(isset($_POST['btnAddTeacher']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);
	$select = mysqli_query($con, "SELECT * FROM usertbl where fname='$firstname' and lname='$lastname' and usertype='teacher' or username='$username'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Teacher Already Exist.'); window.location.href='teacher.php';</script> <?php
	}else{
		$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype", "profile_pic"), array($username, "teacher123", $firstname, $middlename, $lastname, $contact, "teacher", "images/man-29.png"));		
		echo "<script>alert('Teacher added.');</script>";
		echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";
	}
}

if(isset($_POST['editTeacher']))
{
	$id = validate($_POST['id']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);
	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $middlename, $lastname, $contact));
	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";
}

if(isset($_POST['btnAddYearLevel']))
{
	$year_level = validate($_POST['yearlevel']);
	$year_level_desc = validate($_POST['yearleveldesc']);
	$select = mysqli_query($con, "SELECT * FROM tblyearlevel where yearlevel='$year_level' and description='$year_level_desc'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Grade Level Already Exist.'); window.location.href='grade_level.php';</script> <?php
	}else{
		$crud->insert("tblyearlevel", array("yearlevel", "description"), array($year_level, $year_level_desc));
		echo "<script>alert('Grade Level added.');</script>";
		echo "<script>(function(){ window.location.href='grade_level.php'; })()</script>";
	}
}

if(isset($_POST['del_yearlevel']))
{
	if (!empty($_POST['yearlvlid'])) 
	{
		$yearlvlid = $_POST['yearlvlid'];
		$N = count($yearlvlid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblyearlevel where id = '$yearlvlid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Grade Level deleted.');</script>";
		echo "<script>(function(){ window.location.href='grade_level.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select a year level you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='grade_level.php'; })()</script>";
	}
}


if(isset($_POST['del_curriculum']))
{
	if (!empty($_POST['selcur'])) 
	{
		$selcur = $_POST['selcur'];
		$N = count($selcur);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from curriculumtbl where id = '$selcur[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Curriculum deleted.');</script>";
		echo "<script>(function(){ window.location.href='curriculum.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select a curriculum you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='curriculum.php'; })()</script>";
	}
}



if(isset($_POST['edit_yearlevel']))
{
	$id = validate($_POST['year_level_id']);
	$year_level = validate($_POST['yearlevel']);
	$yearlevel_desc = validate($_POST['yearleveldesc']);

	$crud->update("tblyearlevel", array("id", "yearlevel", "description"), array($id, $year_level, $yearlevel_desc));

	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='grade_level.php'; })()</script>";
}

if(isset($_POST['btnAddClass']))
{
	$class_name = validate($_POST['txtClassName']);
	$year_level = validate($_POST['cboYearLevel']);
	$cur_id = validate($_POST['cboCurriculum']);
	$year_level_id = 0;
	$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '$year_level'";
	$result2 = mysqli_query($con, $query2);
	while($row = mysqli_fetch_array($result2))
	{
		$year_level_id = $row['id'];
	}
	$select = mysqli_query($con, "SELECT * FROM tblclass where classname='$class_name' and yearlevelid='$year_level_id'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Section Already Exist.'); window.location.href='class.php';</script> <?php
	}else{
		$crud->insert("tblclass", array("classname", "yearlevelid", "cur_id"), array($class_name, $year_level_id, $cur_id));
		echo "<script>alert('Class added.');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";
	}
}

if(isset($_POST['edit_class']))
{
	$classid = validate($_POST['classid']);
	$yearlevel = validate($_POST['cboYearLevel']);
	$className = validate($_POST['txtClassName']);
	$cur_id = validate($_POST['cboCurriculum']);

	$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '" . $yearlevel . "'";
	$result2 = mysqli_query($con, $query2);
	$yearlevelid = 0;
	while($row = mysqli_fetch_array($result2))
	{
		$yearlevelid = $row['id'];
	}
	$crud->update("tblclass", array("id", "classname", "yearlevelid", "cur_id"), array($classid, $className, $yearlevelid, $cur_id));
	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='class.php'; })()</script>";
}

if(isset($_POST['del_class']))
{
	if (!empty($_POST['classid'])) 
	{
		$classid = $_POST['classid'];
		$N = count($classid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblclass where id = '$classid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Class deleted.');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select class you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";
	}
}


if(isset($_POST['btn_update_studgrade']))
{
	$txt_id = $_POST['hidden_id'];
	$studid = $_POST['studid'];
	$txt_edit_class = $_POST['txt_edit_class'];
	$txt_edit_subj = $_POST['txt_edit_subj'];
	$txtprelim = $_POST['txtprelim'];
	$txtmidterm = $_POST['txtmidterm'];
	$txtprefi = $_POST['txtprefi'];
	$txtfinal = $_POST['txtfinal'];

	$query = mysqli_query($con,"UPDATE tblstudentgrade SET prelim = '".$txtprelim."',midterm = '".$txtmidterm."',prefi = '".$txtprefi."',final = '".$txtfinal."' where id = '".$txt_id."' ");
	$q = mysqli_query($con,"SELECT * from tblstudentgrade where id = '".$txt_id."' ");
	while($row=mysqli_fetch_array($q)){
		if($row['midterm'] != 0 && $row['prefi'] != 0 && $row['final'] != 0){
			$result = (( $row['prelim'] + $row['midterm'] + $row['prefi'] + $row['final'] ) / 4) ;
			$average = round($result);
			if($average >= 75){
				$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Passed'  where id = '".$txt_id."' ");
			}
			else{
				$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Failed'  where id = '".$txt_id."' "); 
			}
		}else{
			$result = (( $row['prelim'] + $row['midterm'] + $row['prefi'] + $row['final'] ) / 4) ;
			$average = round($result);
			$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'No Final Remarks'  where id = '".$txt_id."' ");    	
		}
	}
	if($userType == "teacher"){
		?><script> alert('Successfully updated.'); window.location.href="student_grade.php<?php echo '?subid='.$txt_edit_subj.'&classid='.$txt_edit_class; ?>"; </script><?php
	}else if($userType == "registrar"){
		?><script> alert('Successfully updated.'); window.location.href="stud_grade.php<?php echo '?uid='.$studid ?>"; </script><?php
	}
}

if(isset($_POST['active_schoolyear_btn']))
{
	$id =  $_POST['schoolyear_id'];

	$query = "SELECT status FROM tblschoolyear WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	$query2 = "UPDATE tblschoolyear SET status = 1";
	mysqli_query($con, $query2);

	$crud->update("tblschoolyear", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}

if(isset($_POST['statusclearance']))
{
	$id =  $_POST['clearanceid'];
	$result = mysqli_query($con, "SELECT clearance_status FROM tblstudentclass WHERE id = $id");
	$status = 0;
	while($row = mysqli_fetch_array($result)) { $status = $row['clearance_status']; }

	if($status == 0) {
		$status = 1;
	} else {
		$status = 0;
	}
	$crud->update("tblstudentclass", array("id", "clearance_status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	if($userType == "teacher"){
		$classid = $_POST['classid'];
		$subid = $_POST['subid'];
		?><script> window.location.href="viewstud_clearance.php<?php echo '?subid='.$subid.'&classid='.$classid; ?>"; </script><?php
	}else if($userType == "registrar"){
		$studid = $_POST['studid'];
		?><script> window.location.href="stud_clearance.php<?php echo '?uid='.$studid ?>"; </script><?php
	}
}

if(isset($_POST['statussignatory']))
{
	$id =  $_POST['clearanceid'];
	$studid = $_POST['studid'];
	$result = mysqli_query($con, "SELECT status FROM studclearance WHERE id = $id");
	$status = 0;
	while($row = mysqli_fetch_array($result)) { $status = $row['status']; }

	if($status == 0) {
		$status = 1;
	} else {
		$status = 0;
	}
	$crud->update("studclearance", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	if($userType == "admin"){
		?><script> window.location.href="view_report.php<?php echo '?uid='.$studid ?>"; </script><?php
	}else if($userType == "registrar"){
		?><script> window.location.href="stud_clearance.php<?php echo '?uid='.$studid ?>"; </script><?php
	}
}

if(isset($_POST['activeStudentBtn']))
{
	$id = $_POST['studid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);
	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}
	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	$crud->update("usertbl", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";
}

if(isset($_POST['activeTeacherBtn']))
{
	$id = $_POST['teacherid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	$crud->update("usertbl", array("id", "status"), array($id, $status));
	header("location:teacher.php");
}

if(isset($_POST['activeRegistrarBtn']))
{
	$id = $_POST['teacherid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	$crud->update("usertbl", array("id", "status"), array($id, $status));
	header("location:registrar.php");
}

if(isset($_POST['btnAddAdmin']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$select = mysqli_query($con, "SELECT * FROM usertbl where fname='$firstname' and lname='$lastname' and usertype='admin' or username='$username'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Administrator Already Exist.'); window.location.href='admin_user.php';</script> <?php
	}else{
		$crud->insert("usertbl", array("username", "password", "fname", "mname", "lname", "contact", "usertype", "status", "profile_pic"), array($username, "admin123", $firstname, $middlename, $lastname, $contact, "admin", 0, "images/businessman.png"));
		$admin = mysqli_query($con, "SELECT * FROM usertbl where fname='$firstname' and lname='$lastname' and usertype='admin' or username='$username'");
		$rowadmin = mysqli_fetch_array($admin);
		$privilege = $_POST['accessrights'];
		$cntprivilege = count($privilege);
		for ($i=0; $i < $cntprivilege; $i++) { 
			$crud->insert("access_rights", array("userid", "privilege"), array($rowadmin['id'], $privilege[$i]));
		}
		echo "<script>alert('Administrator added.');</script>";
		echo "<script>(function(){ window.location.href='admin_user.php'; })()</script>";	
	}
}

if(isset($_POST['updateAdmin']))
{
	$adminid = validate($_POST['adminid']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);
	$accessrights = $_POST['accessrights'];

	$del_accr_query = "DELETE FROM access_rights WHERE userid = '$adminid'";
	mysqli_query($con, $del_accr_query);

	for ($i = 0; $i < count($accessrights); $i++) { 
		$insert_accr_query = "INSERT INTO access_rights(userid, privilege) VALUES ('$adminid', '$accessrights[$i]')";
		mysqli_query($con, $insert_accr_query);
	}

	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='admin_user.php'; })()</script>";
	
}

if(isset($_POST['btnActiveAdmin']))
{
	$id = validate($_POST['admin_id']);


	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}

	$crud->update("usertbl", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='admin_user.php'; })()</script>";

}

if(isset($_POST['add_empclass']))
{
	$classid = $_POST['cboclass'];
	$subid = validate($_POST['cbosubject']);
	$empid = validate($_POST['cboempid']);
	$grdlvlid = validate($_POST['grdlvlid']);
	$curid = validate($_POST['curid']);
	$schoolyearid = validate($_POST['txtschoolyear']);
	$cntclass = count($classid);
	for ($i=0; $i < $cntclass; $i++) { 
		$select = mysqli_query($con, "SELECT * FROM tblteacheradvisory where classid='$classid[$i]' and subjectid='$subid' and teacherid='$empid' and gradelvl='$grdlvlid'")or die(mysqli_error($con));
		if(mysqli_num_rows($select) > 0){
			?> <script> alert('This class is already assigned.'); window.location.href='teacher_advisory.php';</script> <?php
		}else{
			$crud->insert("tblteacheradvisory", array("classid", "subjectid", "teacherid", "gradelvl", "curiculumid", "schoolyearid"), array($classid[$i],$subid,$empid,$grdlvlid,$curid,$schoolyearid));
			echo "<script>alert('Successfully added.');</script>";
			echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
		}
	}
}

if(isset($_POST['del_empclass']))
{
	if(!empty($_POST['ta']))
	{
		$ids = $_POST['ta'];
		for($i = 0; $i < count($ids); $i++)
		{
			$crud->delete("tblteacheradvisory", "id", $ids[$i]);
		}
		echo "<script>alert('Deleted.');</script>";
		echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select teacher advisory you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
	}
}

if(isset($_POST['update_teacher_advisory']))
{
	$teacher_advisory_id = validate($_POST['teacher_advisory_id']);
	$teacherid = validate($_POST['cboempid']);
	$classid = $_POST['cboclass'];
	$subid = validate($_POST['cbosubject']);
	$grdlvlid = validate($_POST['grdlvlid']);
	$curid = validate($_POST['curid']);
	$schoolyearid = validate($_POST['txtschoolyear']);
	$cntclass = count($classid);
	for ($i=0; $i < $cntclass; $i++) { 
		$crud->update("tblteacheradvisory", array("id", "teacherid", "classid", "subjectid", "gradelvl", "curiculumid", "schoolyearid"), array($teacher_advisory_id, $teacherid, $classid[$i], $subid, $grdlvlid, $curid, $schoolyearid));
	}
	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
}	

if(isset($_POST['edit_empadvisory'])){
	$id = validate($_POST['id']);

	$query1 = "SELECT * FROM tblteacheradvisory WHERE id = $id";
	$result1 = mysqli_query($con, $query1);

	$curid = 0;
	$teacherid = 0;
	$classid = 0;
	$gradelvl = 0;

	while($row = mysqli_fetch_array($result1))
	{
		$curid = $row['curiculumid'];
		$teacherid = $row['teacherid'];
		$classid = $row['classid'];
		$gradelvl = $row['gradelvl'];
		$subid = $row['subjectid'];
	}
	echo $curid . "," . $gradelvl . "," . $classid . "," . $teacherid . "," . $subid;
}

if(isset($_POST['edit_stud_class'])){
	
	$studentname = "";$id = validate($_POST['id']);

	$query1 = "SELECT * FROM tblstudentclass WHERE id = $id";
	$result1 = mysqli_query($con, $query1);

	$classid = 0;
	$studid = 0;
	$cur_id = 0;
	$gradeid = 0;

	while($row = mysqli_fetch_array($result1))
	{
		$classid = $row['classid'];
		$studid = $row['studentid'];
		$cur_id = $row['cur_id'];
		$gradeid = $row['gradelevel'];
	}

	//get curriculum name
	$query2 = "SELECT curname FROM curriculumtbl WHERE id = $cur_id";
	$result2 = mysqli_query($con, $query2);

	$curname = "";
	while($row = mysqli_fetch_array($result2))
	{
		$curname = $row['curname'];
	}

//get grade level
	$query3 = "SELECT yearlevel FROM tblyearlevel WHERE id = $gradeid";
	$result3 = mysqli_query($con, $query3);

	$gradelevel = "";
	while($row = mysqli_fetch_array($result3))
	{
		$gradelevel = $row['yearlevel'];
	}

	//get class name
	$query4 = "SELECT classname FROM tblclass WHERE id = $classid";
	$result4 = mysqli_query($con, $query4);

	$classname = "";
	while($row = mysqli_fetch_array($result4))
	{
		$classname = $row['classname'];
	}

	//get student name
	$query5 = "SELECT fname, lname FROM usertbl WHERE id = $studid AND usertype = 'student'";
	$result5 = mysqli_query($con, $query5);

	while($row = mysqli_fetch_array($result5))
	{
		$studentname = $row['fname'] . " " . $row['lname'];
	}


	echo $cur_id . "," . $gradeid . "," . $classid . "," . $studid . "," . $classname;
}

if(isset($_POST['btnaddannounce']))
{
	$title = validate($_POST['txtttile']);
	$desc = validate($_POST['txtdesc']);
	move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
	$file = $_FILES['image']['name'];
	$crud->insert("announcement", array("title", "description", "image"), array($title,$desc,$file));

	$users = $_POST['users'];
	$cnt = count($users);

	$select = mysqli_query($con, "SELECT * FROM announcement WHERE title = '$title' and description='$desc'");
	$rowa = mysqli_fetch_array($select);
	$id = $rowa['id'];
	for ($i=0; $i < $cnt; $i++) 
	{ 
		$crud->insert("announcement_privilege", array("announceid", "user"), array($id, $users[$i]));
	}
	echo "<script>alert('Announcement added.');</script>";
	echo "<script>(function(){ window.location.href='announcement.php'; })()</script>";
}

if(isset($_POST['btnaddslides']))
{
	move_uploaded_file($_FILES['slideimg']['tmp_name'], "images/".$_FILES['slideimg']['name']);
	$file = $_FILES['slideimg']['name'];
	$crud->insert("slide_tbl", array("image"), array($file));

	echo "<script>alert('Slide Show added.');</script>";
	echo "<script>(function(){ window.location.href='slideshow.php'; })()</script>";
}

if(isset($_POST['edit_announce']))
{
	$aid = $_POST['announceid'];
	$title = validate($_POST['txtttile']);
	$desc = validate($_POST['txtdesc']);
	move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
	$location = validate($_FILES['image']['name']);
	$crud->update("announcement", array("id", "title", "description", "image"), array($aid,$title,$desc,$location));

	echo "<script>alert('Announcement updated.');</script>";
	echo "<script>(function(){ window.location.href='announcement.php'; })()</script>";
}

if(isset($_POST['del_announce']))
{
	if (!empty($_POST['announceid'])) 
	{
		$announceid = $_POST['announceid'];
		$N = count($announceid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from announcement where id = '$announceid[$i]'")or die(mysqli_error($con));
			mysqli_query($con, "DELETE from announcement_privilege where announceid = '$announceid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Announcement deleted.');</script>";
		echo "<script>(function(){ window.location.href='announcement.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select announcement you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='announcement.php'; })()</script>";
	}
}

if(isset($_POST['btnaddevent']))
{
	$title = validate($_POST['txtttile']);
	$start = validate($_POST['txtdatestart']);
	$desc = validate($_POST['txtdesc']);
	$select = mysqli_query($con, "SELECT * FROM event_tbl WHERE title = '$title' and descript='$desc'");
	if(mysqli_num_rows($select) > 0){
		?> <script> alert('Event Already Exist.'); window.location.href='events.php';</script> <?php
	}else{
		move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
		$file = $_FILES['image']['name'];
		$crud->insert("event_tbl", array("title", "descript", "image", "datestart"), array($title,$desc,$file, $start));
		echo "<script>alert('Event added.');</script>";
		echo "<script>(function(){ window.location.href='events.php'; })()</script>";
	}
}


if(isset($_POST['edit_event']))
{
	$aid = $_POST['eventid'];
	$title = validate($_POST['txtttile']);
	$desc = validate($_POST['txtdesc']);
	$start = validate($_POST['txtdatestart']);
	move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
	$location = validate($_FILES['image']['name']);
	$crud->update("event_tbl", array("id", "title", "descript", "image", "datestart"), array($aid,$title,$desc,$location, $start));
	echo "<script>alert('Event updated.');</script>";
	echo "<script>(function(){ window.location.href='events.php'; })()</script>";
}

if(isset($_POST['del_event']))
{
	if (!empty($_POST['eventid'])) 
	{
		$eventid = $_POST['eventid'];
		$N = count($eventid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from event_tbl where id = '$eventid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Event deleted.');</script>";
		echo "<script>(function(){ window.location.href='events.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select event you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='events.php'; })()</script>";
	}
}

if(isset($_POST['import_studentgrade']))
{
	$classid = $_POST['cboclass'];
	$subjectid = validate($_POST['cbosubjectid']);
	$adviserid = $sessionid;
	$filename = $_FILES["studentgrade"]["tmp_name"];
	$average = null;
	if($_FILES["studentgrade"]["size"] > 0)
	{
		$row = true;
		$ColNum = 7;
		$file = fopen($filename, "r");
		while (($stud_data = fgetcsv($file, 30000, ",")) !== FALSE) {
			$countcols = count($stud_data);
			if ($countcols != $ColNum) 
			{
				?><script> alert('Please follow the format of importing student grades.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
			} else {
				if($row) { $row = false; continue; }

				$fullname = explode(" ", $stud_data[0]);
				$Fname = validate($fullname[0]);
				$Lname = validate($fullname[1]);

				$prelim = validate($stud_data[1]);
				$midterm = validate($stud_data[2]);
				$prefi = validate($stud_data[3]);
				$finals = validate($stud_data[4]);

				$selectuser = mysqli_query($con, "SELECT * FROM usertbl where fname='$Fname' and lname='$Lname'")or die(mysqli_error($con));
				$rowuser = mysqli_fetch_array($selectuser);
				$studid =	$rowuser['id'];

				$enrolled = mysqli_query($con, "SELECT * FROM tblstudentclass where studentid='$studid' and subjectid='$subjectid' and classid='$classid'")or die(mysqli_error($con));

				if(mysqli_num_rows($enrolled) > 0){
					$select = mysqli_query($con, "SELECT * FROM tblstudentgrade where studentid='$studid' and subjectid='$subjectid' and classid='$classid' and adviserid='$adviserid'")or die(mysqli_error($con));

					if (mysqli_num_rows($select) > 0) 
					{
						?><script> alert('Student Grade Already exist.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
					}
					else
					{ 
						if($midterm != 0 && $prefi != 0 && $finals != 0)
						{
							$ave = validate($stud_data[5]);
							$remarks = validate($stud_data[6]);
							$crud->insert("tblstudentgrade", array("studentid", "subjectid", "classid", "adviserid", "prelim", "midterm", "prefi", "final", "gradeaverage", "remarks"), 
								array($studid,$subjectid,$classid,$adviserid,$prelim,$midterm,$prefi,$finals,$ave,$remarks));
						}else{
							$total = (($prelim + $midterm + $prefi + $finals) / 4) ;
							$average = round($total);
							$crud->insert("tblstudentgrade", array("studentid", "subjectid", "classid", "adviserid", "prelim", "midterm", "prefi", "final", "gradeaverage", "remarks"), 
								array($studid,$subjectid,$classid,$adviserid,$prelim,$midterm,$prefi,$finals,$average,"No Final Remarks"));
						}
						?><script> alert('Successfully added.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
					}
				}else{
					?><script> alert('Student not enrolled.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
				}
			}
		}
		fclose($file);
	}
	mysqli_close($con);
}

if(isset($_POST['add_curriculum']))
{
	$curriculum = validate($_POST['txtcurriculum']);
	$gradelevel = validate($_POST['txtprogram']);

	$crud->insert("curriculumtbl", array("curname", "gradelevel", "datecreated"), array($curriculum, $gradelevel, date("M d, Y")));

	echo "<script>alert('Curriculum added.');</script>";
	echo "<script>window.location.href='curriculum.php';</script>";
}

if(isset($_POST['edit_curriculum']))
{
	$curriculum_id = validate($_POST['txtcumid']);
	$curriculum = validate($_POST['txtcurriculum']);
	$gradelevel = validate($_POST['txtprogram']);

	$crud->update("curriculumtbl", array("id", "curname", "gradelevel"), array($curriculum_id, $curriculum, $gradelevel));
	echo "<script>alert('Curriculum updated.');</script>";
	echo "<script>window.location.href='curriculum.php';</script>";

}

if(isset($_POST['add_studparent']))
{
	$studid = $_POST['cboStudent'];
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$username = validate($_POST['txtUsername']);

	$selectparent = mysqli_query($con, "SELECT * FROM usertbl where usertype='parent' and fname='$firstname' and lname='$lastname' or username='$username'");
	$cnt = mysqli_num_rows($selectparent);
	if($cnt > 0){
		?><script> alert('Parent Already exist.'); window.location.href="parent.php"; </script><?php
	}else{
		$crud->insert("usertbl", array("username", "password", "fname" ,"mname", "lname", "contact", "usertype", "status", "profile_pic"), array($username, "parent123", $firstname, " ", $lastname, '', "parent", 0, "images/man-28.png"));

		$parentstud = mysqli_query($con, "SELECT * FROM usertbl where username='$username'");
		$rowparent = mysqli_fetch_array($parentstud);
		$parentid = $rowparent['id'];

		for ($i=0; $i < count($studid); $i++) { 
			$selectp = mysqli_query($con, "SELECT * FROM parentstudtbl where parentid='$parentid' and studid='$studid[$i]'");
			$cntp = mysqli_num_rows($selectp);
			if($cntp > 0){
				?><script> alert('Student already exist on this parent.'); window.location.href="parent.php"; </script><?php
			}else{
				$crud->insert("parentstudtbl", array("parentid", "studid"), array($parentid, $studid[$i]));
			}
			?><script>alert('Parent Added.'); window.location = "parent.php"</script><?php 
		}
	}
}

if(isset($_POST['edit_parent']))
{
	$id = validate($_POST['id']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['stxtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$studid = $_POST['cboStudent'];

	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $lastname));

	for ($i=0; $i < count($studid); $i++) { 
		$crud->update("parentstudtbl", array("parentid", "studid"), array($id, $studid[$i]));
	}
	// echo "<script>alert('Saved.');</script>";
	// echo "<script>(function(){ window.location.href='parent.php'; })()</script>";
}

if(isset($_POST['activeParentBtn']))
{
	$id = $_POST['parentid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0){
		$status = 1;
	} else {
		$status = 0;
	}
	$crud->update("usertbl", array("id", "status"), array($id, $status));
	header("location:parent.php");
}

if(isset($_POST['getstudid'])){
	$id = $_POST['userid'];
	$select = mysqli_query($con, "SELECT * FROM parentstudtbl where parentid='$id'");
	while ($row = mysqli_fetch_array($select)) {
		echo $row['studid'];
	}
}

if(isset($_POST['btnAddRegistrar']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype", "profile_pic"), array($username, "registrar123", $firstname, $middlename, $lastname, $contact, "registrar", "images/businessman.png"));		

	echo "<script>alert('Registrar added.');</script>";
	echo "<script>(function(){ window.location.href='registrar.php'; })()</script>";
}

if(isset($_POST['editregistrar']))
{
	$id = validate($_POST['id']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $middlename, $lastname, $contact));

	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='registrar.php'; })()</script>";
}

if(isset($_POST['btnedit']))
{
	$curid = validate($_POST['curid']);
	$gradeid = validate($_POST['gradeid']);

	$query = "SELECT * FROM tblclass WHERE cur_id = " . $curid . " AND yearlevelid = " . $gradeid;
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($result))
	{
		$data[] = $row;
	}
	print json_encode($data);
}

if(isset($_POST['del_slidepic']))
{
	if(!empty($_POST['slideid']))
	{
		$slideid = $_POST['slideid'];
		$N = count($slideid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from slide_tbl where id = '$slideid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Slide deleted.');</script>";
		echo "<script>(function(){ window.location.href='slideshow.php'; })()</script>";
	}
	else
	{

		echo "<script>alert('Please select a slide you want to delete, thank you!');</script>";
		echo "<script>(function(){ window.location.href='slideshow.php'; })()</script>";
	}
}


if(isset($_POST['del_message']))
{
	if(!empty($_POST['msg']))
	{
		$msg = $_POST['msg'];
		$n = count($msg);

		for($i = 0; $i < $n; $i++)
		{
			mysqli_query($con, "DELETE from conversation_tbl where C_ID = '$msg[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Message deleted.');</script>";
		echo "<script>(function(){ window.location.href='inbox.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select a message you want to delete, thank you!');</script>";
		echo "<script>(function(){ window.location.href='inbox.php'; })()</script>";
	}
}

if(isset($_POST['studbygrdlvl']))
{
	$gradelevel = $_POST['gradelevel'];
	$type = $_POST['type'];

	$sy = mysqli_query($con, "SELECT * FROM tblschoolyear where status='0'")or die(mysqli_error($con));
	$rowsy = mysqli_fetch_array($sy);
	$schoolyearid = $rowsy['id'];

	$result = mysqli_query($con, "SELECT *, s.id as studid FROM tblstudentclass sc
		LEFT JOIN usertbl s ON sc.studentid = s.id
		where sc.schoolyearid='$schoolyearid' and gradelevel='$gradelevel' group by studid")or die(mysqli_error($con));

	if(mysqli_num_rows($result) > 0){
		?>
		<table class="table table-bordered table-stripe" id="sample"> 
			<thead> 
				<tr>
					<th>#</th> 
					<th>Student ID</th>
					<th>Image</th>
					<th>Full Name</th> 
					<th></th>
				</tr> 
			</thead>
			<tbody style="color:black;"> 
				<?php
				$cnt = 0;
				while($row = mysqli_fetch_array($result)) { 
					$userid = $row['studid']; 
					?>
					<tr> 
						<th class="text-center" width="40" scope="row"><?php echo $cnt = $cnt + 1; ?></th>
						<td><?php echo $row['username']; ?></td> 
						<td width="40"><img class="img-circle img-sm" src="<?php echo $row['profile_pic'] ?>"></td>
						<td><?php echo $row['lname'].", ".$row['fname']." ". $row['mname']; ?></td>
						<td width="120" class="text-center"><a <?php if($type == '1'){ ?> href="stud_grade.php<?php echo '?uid='.$userid; ?>" <?php }else{ ?> href="stud_clearance.php<?php echo '?uid='.$userid; ?>" <?php } ?> class="btn btn-primary btn-sm"><?php if($type == '1'){ ?>View Grades<?php }else{ ?>View Clearance<?php } ?></a></td> 
					</tr> 
					<?php } ?>
				</tbody> 
			</table>
			<?php }else{ ?>
			<div class="alert alert-danger">No data found.</div>
			<?php } ?> 
			<script>
				$(document).ready(function(){
					$('#sample').dataTable({
						"sSearch": '<span class="fa fa-search form-control-feedback"></span>'
					});
					$('div.dataTables_filter input').attr('placeholder', 'Search...');
				});
			</script>
			<?php } 

		if(isset($_POST['editAdmin']))
		{
			$admin_id = $_POST['adminid'];

			$query = "SELECT privilege FROM access_rights WHERE userid = " . $admin_id;
			$privileges = mysqli_query($con, $query);

			$data = [];
			while($row = mysqli_fetch_array($privileges))
			{
				$data[] = $row;
			}

			print json_encode($data);

		}



			?>



