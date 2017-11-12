<?php
require "conn.php";
include "session.php";

if(isset($_POST['btnAddSchoolYear']))
{
	$school_year = validate($_POST['txtSchoolYear']);

	$crud->insert("tblschoolyear", array("schoolyear", "status"), array($school_year, 1));

	echo "<script>alert('School Year added.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}

if(isset($_POST['btneditSchoolYear']))
{

	$id = $_POST['school_year_id'];
	$school_year = validate($_POST['txtSchoolYear']);

	$crud->update("tblschoolyear", array("id", "schoolyear"), array($id, $school_year));

	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}

if(isset($_POST['btnAddSubjects']))
{
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);

	$crud->insert("tblsubjects", array("subjectname", "description", "yearlevelid"), array($subjectname,$desc,$yearlevelid));

	echo "<script>alert('Subject added.');</script>";
	echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
}

if(isset($_POST['edit_subject']))
{
	$subid = $_POST['subid'];
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);

	$crud->update("tblsubjects", array("id", "subjectname", "description", "yearlevelid"), array($subid,$subjectname,$desc,$yearlevelid));

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
	$studentid = validate($_POST['cboStudent']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->insert("tblstudentclass", array("classid", "studentid", "subjectid"), array($classid,$studentid,$subjectid));

	echo "<script>alert('Student successfully enrolled.');</script>";
	echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
}
if(isset($_POST['edit_studclass']))
{
	$studclass_id = $_POST['stud_class_id'];
	$classid = validate($_POST['cboclass']);
	$studentid = validate($_POST['cboStudent']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->update("tblstudentclass", array("id", "classid", "studentid", "subjectid"), array($studclass_id,$classid,$studentid,$subjectid));

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

	$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype"), array($username, "student123", $firstname, $middlename, $lastname, $contact, "student"));		

	echo "<script>alert('Student added.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";
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
	$syid = validate($_POST['cboSchoolYear']);
	$adviserid = $sessionid;
	$classid = $_POST['cboclass'];
	$studid = $_POST['cbostudent']; 
	$subjectid = validate($_POST['cbosubjectid']);
	$prelim = $_POST['prelim'];
	$select = mysqli_query($con, "SELECT * FROM tblstudentgrade where studentid='$studid' and schoolyearid='$syid' and subjectid='$subjectid' and classid='$classid' and adviserid='$adviserid'")or die(mysqli_error($con));
	if(mysqli_num_rows($select) > 0){
		?><script> alert('Student Grade Already exist.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}else{
		$crud->insert("tblstudentgrade", array("schoolyearid", "studentid", "subjectid", "classid", "adviserid", "prelim"), array($syid,$studid,$subjectid,$classid,$adviserid,$prelim));
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

	$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype"), array($username, "teacher123", $firstname, $middlename, $lastname, $contact, "teacher"));		

	echo "<script>alert('Teacher added.');</script>";
	echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";
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

	$crud->insert("tblyearlevel", array("yearlevel", "description"), array($year_level, $year_level_desc));

	echo "<script>alert('Year Level added.');</script>";
	echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
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
		echo "<script>alert('Year Level deleted.');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select year level you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
	}
}

if(isset($_POST['edit_yearlevel']))
{
	$id = validate($_POST['year_level_id']);
	$year_level = validate($_POST['yearlevel']);
	$yearlevel_desc = validate($_POST['yearleveldesc']);

	$crud->update("tblyearlevel", array("id", "yearlevel", "description"), array($id, $year_level, $yearlevel_desc));

	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
}

if(isset($_POST['btnAddClass']))
{
	$class_name = validate($_POST['txtClassName']);
	$school_year = validate($_POST['cboSchoolYear']);
	$year_level = validate($_POST['cboYearLevel']);

	$query = "SELECT id FROM tblschoolyear WHERE schoolyear = '$school_year'";
	$result = mysqli_query($con, $query);

	$school_year_id = 0;
	$year_level_id = 0;

	while($row = mysqli_fetch_array($result))
	{
		$school_year_id = $row['id'];
	}
	
	$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '$year_level'";
	$result2 = mysqli_query($con, $query2);

	while($row = mysqli_fetch_array($result2))
	{
		$year_level_id = $row['id'];
	}
	$crud->insert("tblclass", array("classname", "schoolyearid", "yearlevelid"), array($class_name, $school_year_id, $year_level_id));
	echo "<script>alert('Class added.');</script>";
	echo "<script>(function(){ window.location.href='class.php'; })()</script>";
}

if(isset($_POST['edit_class']))
{
	$classid = validate($_POST['classid']);
	$schoolyear = validate($_POST['cboSchoolYear']);
	$yearlevel = validate($_POST['cboYearLevel']);
	$className = validate($_POST['txtClassName']);

	$query = "SELECT id FROM tblschoolyear WHERE schoolyear = '" . $schoolyear . "'";
	$result = mysqli_query($con, $query);
	$schoolyearid = 0;
	while($row = mysqli_fetch_array($result))
	{
		$schoolyearid = $row['id'];
	}

	$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '" . $yearlevel . "'";
	$result2 = mysqli_query($con, $query2);
	$yearlevelid = 0;
	while($row = mysqli_fetch_array($result2))
	{
		$yearlevelid = $row['id'];
	}
	echo "CLASS ID: " . $classid . " schoolyearid: " . $schoolyearid . " yearlevelid: " . $yearlevelid;
	$crud->update("tblclass", array("id", "classname", "schoolyearid", "yearlevelid"), array($classid, $className, $schoolyearid, $yearlevelid));
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
	$txt_edit_sy = $_POST['txt_edit_sy'];
	$txt_edit_class = $_POST['txt_edit_class'];
	$txt_edit_subj = $_POST['txt_edit_subj'];
	$txt_edit_stud = $_POST['txt_edit_stud'];
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
	?><script> alert('Successfully updated.'); window.location.href="student_grade.php<?php echo '?subid='.$txt_edit_subj.'&classid='.$txt_edit_class; ?>"; </script><?php
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
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";	
}

if(isset($_POST['btnAddAdmin']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->insert("usertbl", array("username", "password", "fname", "mname", "lname", "contact", "usertype", "status"), array($username, "admin123", $firstname, $middlename, $lastname, $contact, "admin", 0));

	echo "<script>alert('Admin added.');</script>";
	echo "<script>(function(){ window.location.href='admin_user.php'; })()</script>";	

}

if(isset($_POST['updateAdmin']))
{
	$adminid = validate($_POST['adminid']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);


	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($adminid, $username, $firstname, $middlename, $lastname, $contact));

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
	$classid = validate($_POST['cboclass']);
	$empid = validate($_POST['cboempid']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->insert("tblteacheradvisory", array("classid", "teacherid", "subjectid"), array($classid,$empid,$subjectid));

	echo "<script>alert('Successfully added.');</script>";
	echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
}

if(isset($_POST['del_empclass']))
{
	if(!empty($_POST['subid']))
	{
		$ids = $_POST['subid'];
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
	$classid = validate($_POST['cboclass']);
	$subjectid = validate($_POST['cbosubjectid']);


	$crud->update("tblteacheradvisory", array("id", "teacherid", "classid", "subjectid"), array($teacher_advisory_id, $teacherid, $classid, $subjectid));

	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";

}	

if(isset($_POST['edit_empadvisory'])){
	$id = validate($_POST['id']);

	$query1 = "SELECT * FROM tblteacheradvisory WHERE id = $id";
	$result1 = mysqli_query($con, $query1);

	$teacherid = 0;
	$classid = 0;
	$subjectid = 0;

	while($row = mysqli_fetch_array($result1))
	{
		$teacherid = $row['teacherid'];
		$classid = $row['classid'];
		$subjectid = $row['subjectid'];
	}

	echo $teacherid . "," . $classid . "," . $subjectid;
}

if(isset($_POST['edit_stud_class'])){
	$id = validate($_POST['id']);

	$query1 = "SELECT * FROM tblstudentclass WHERE id = $id";
	$result1 = mysqli_query($con, $query1);

	$studid = 0;
	$classid = 0;
	$subjectid = 0;

	while($row = mysqli_fetch_array($result1))
	{
		$studid = $row['studentid'];
		$classid = $row['classid'];
		$subjectid = $row['subjectid'];
	}
	echo $studid . "," . $classid . "," . $subjectid;
}

if(isset($_POST['add_topstudent']))
{
	$topnum = validate($_POST['top_number']);
	$adviserid = $sessionid;
	$classid = $_POST['cboclass'];
	$studid = $_POST['cbostudent']; 
	$subjectid = validate($_POST['cbosubjectid']);
	$period = $_POST['cboperiod'];
	$grade = $_POST['grade'];
	$select = mysqli_query($con, "SELECT * FROM top_students where studid='$studid' and subjectid='$subjectid' and classid='$classid' and adviserid='$adviserid' and period='$period'")or die(mysqli_error($con));
	if(mysqli_num_rows($select) > 0){
		?><script> alert('Data Already exist.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}else{
		$crud->insert("top_students", array("topnum", "studid", "subjectid", "classid", "adviserid", "period", "grade"), array($topnum,$studid,$subjectid,$classid,$adviserid,$period,$grade));
		?><script> alert('Successfully added.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
	}
}

if(isset($_POST['get_top_students']))
{ 
	$classid = addslashes($_POST['classid']);
	$subid = addslashes($_POST['subid']);
	$period = $_POST['period'];
	$res = mysqli_query($con, "SELECT *,ts.id as sgid, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
		FROM top_students ts
		LEFT JOIN usertbl s ON ts.studid = s.id
		LEFT JOIN tblteacheradvisory ta ON ts.classid = ta.classid
		LEFT JOIN usertbl t ON ts.adviserid = t.id
		LEFT JOIN tblclass c ON ts.classid = c.id
		LEFT JOIN tblsubjects sb on ts.subjectid = sb.id
		where (ts.studid = '".$sessionid."' or ts.adviserid = '".$sessionid."') and ts.subjectid='".$subid."' and ts.classid='".$classid."' and ts.period='$period'")or die(mysqli_error($con));
	$row_class = mysqli_fetch_array($res);

	$result = mysqli_query($con, "SELECT *,ts.id as sgid, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
		FROM top_students ts
		LEFT JOIN tblstudentclass sc ON ts.classid = sc.classid
		AND ts.studid = sc.studentid
		AND ts.subjectid = sc.subjectid
		LEFT JOIN usertbl s ON ts.studid = s.id
		LEFT JOIN tblteacheradvisory ta ON ts.classid = ta.classid
		LEFT JOIN usertbl t ON ts.adviserid = t.id
		LEFT JOIN tblclass c ON ts.classid = c.id
		LEFT JOIN tblsubjects sb on ts.subjectid = sb.id
		where (ts.studid = '".$sessionid."' or ts.adviserid = '".$sessionid."') and ts.subjectid='".$subid."' and ts.classid='".$classid."' and ts.period='$period' group by sgid order by ts.grade asc")or die(mysqli_error($con));
	if(mysqli_num_rows($result) > 0){
		$counter = 0;
		?>
		<table class="table <?php if($userType=='teacher'){ echo 'table-bordered'; }?>"> 
			<thead> 
				<tr>
					<?php if($userType=="teacher"){ ?><th></th> <?php }else{ ?>
						<th>#</th> <?php } ?>
						<th>Top 10 Students in <?php echo $row_class['subjectname']; ?> from <?php echo $row_class['classname']; ?> </th> 
						<th><?php if($userType=="teacher"){ echo "Grade"; } ?></th> 
					</tr> 
				</thead>
				<tbody> 
					<?php while($row = mysqli_fetch_array($result)) { ?>
						<tr> 
							<?php if($userType=="teacher"){ ?><td scope="row"><input type="checkbox" id="records" name="topstudid[]" value="<?php echo $row['sgid']; ?>"></td><?php }else{ ?>
								<td scope="row"><?php echo $counter = $counter + 1; ?></td><?php } ?>
								<td><?php echo $row['sname']; ?></td> 
								<td align="center"><?php echo $row['grade']; ?></td> 
							</tr> 
							<?php } ?>
						</tbody> 
					</table>
					<?php }else{ ?>
						<div class="alert alert-danger">No data found.</div>
						<?php } 
					}

					if(isset($_POST['del_topstudents']))
					{
						$classid = $_POST['classid'];
						$subjectid = $_POST['subid']; 
						if(!empty($_POST['topstudid']))
						{
							$ids = $_POST['topstudid'];
							for($i = 0; $i < count($ids); $i++)
							{
								$crud->delete("top_students", "id", $ids[$i]);
							}
							?><script> alert('Deleted.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
						}
						else
						{
							?><script> alert('Please select top students you want to delete, Thank you!.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
						}
					}

					if(isset($_POST['btnaddannounce']))
					{
						$title = validate($_POST['txtttile']);
						$desc = validate($_POST['txtdesc']);
						move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
						$file = $_FILES['image']['name'];
						$crud->insert("announcement", array("title", "description", "image"), array($title,$desc,$file));

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
						$desc = validate($_POST['txtdesc']);
						move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
						$file = $_FILES['image']['name'];
						$crud->insert("event_tbl", array("title", "descript", "image", "dateupload"), array($title,$desc,$file, date("M d, Y - h:i A")));

						echo "<script>alert('Event added.');</script>";
						echo "<script>(function(){ window.location.href='events.php'; })()</script>";
					}


					if(isset($_POST['edit_event']))
					{
						$aid = $_POST['eventid'];
						$title = validate($_POST['txtttile']);
						$desc = validate($_POST['txtdesc']);
						move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);
						$location = validate($_FILES['image']['name']);
						$crud->update("event_tbl", array("id", "title", "descript", "image"), array($aid,$title,$desc,$location));

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
						$syid = validate($_POST['cboSchoolYear']);
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

									$select = mysqli_query($con, "SELECT * FROM tblstudentgrade where studentid='$studid' and schoolyearid='$syid' and subjectid='$subjectid' and classid='$classid' and adviserid='$adviserid'")or die(mysqli_error($con));

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
											$crud->insert("tblstudentgrade", array("schoolyearid", "studentid", "subjectid", "classid", "adviserid", "prelim", "midterm", "prefi", "final", "gradeaverage", "remarks"), 
												array($syid,$studid,$subjectid,$classid,$adviserid,$prelim,$midterm,$prefi,$finals,$ave,$remarks));
										}else{
											$total = (($prelim + $midterm + $prefi + $finals) / 4) ;
											$average = round($total);
											$crud->insert("tblstudentgrade", array("schoolyearid", "studentid", "subjectid", "classid", "adviserid", "prelim", "midterm", "prefi", "final", "gradeaverage", "remarks"), 
												array($syid,$studid,$subjectid,$classid,$adviserid,$prelim,$midterm,$prefi,$finals,$average,"No Final Remarks"));
										}
										?><script> alert('Successfully added.'); window.location.href="student_grade.php<?php echo '?subid='.$subjectid.'&classid='.$classid; ?>"; </script><?php
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

						$crud->insert("curriculumtbl", array("curname", "gradelevel"), array($curriculum, $gradelevel));

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

						$firstname = validate($_POST['txtfname']);
						$lastname = validate($_POST['txtlname']);
						$contact = validate($_POST['txtcontact']);
						$username = validate($_POST['txtuname']);
						$studid = validate($_POST['studentid']);

						$crud->insert("usertbl", array("username", "password", "fname" ,"mname", "lname", "contact", "usertype", "status", "profile_pic", "parentstud"), array($username, "parent123", $firstname, " ", $lastname, $contact, "parent", 0, "", 0));
						echo "<script>alert('Parent added.');</script>";
						echo "<script>window.location.href='student.php';</script>";

					}

					if(isset($_POST['btnAddRegistrar']))
					{

						$username = validate($_POST['txtUsername']);
						$firstname = validate($_POST['txtFirstname']);
						$lastname = validate($_POST['txtLastname']);
						$middlename = validate($_POST['txtMiddlename']);
						$contact = validate($_POST['txtContact']);

						$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype"), array($username, "registrar123", $firstname, $middlename, $lastname, $contact, "registrar"));		

						echo "<script>alert('Registrar added.');</script>";
						echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";
					}

					?>