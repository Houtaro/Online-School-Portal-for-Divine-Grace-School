<?php
require "conn.php";
session_start();
if(isset($_POST['btnSubmit']))
{
	$username = validate(addslashes($_POST['txtUsername']));
	$password = validate(addslashes($_POST['txtPassword']));

	$query = "SELECT * FROM usertbl WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	if($row['status'] == 0){
		if(mysqli_num_rows($result) > 0)
		{
			$userType = $row["usertype"];
			if($userType === "admin")
			{
				$_SESSION['username'] = $row['username'];
				header("LOCATION: admin_dashboard.php");
			}
			else if($userType === "teacher")
			{
				$_SESSION['username'] = $row['username'];
				header("LOCATION: teacher_dashboard.php");
			}
			else if($userType === "student")
			{
				$_SESSION['username'] = $row['username'];
				header("LOCATION: student_dashboard.php");
			}
			else if($userType === "parent")
			{
				$_SESSION['username'] = $row['username'];
				header("LOCATION: teacher_dashboard.php");
			}
			else if($userType === "registrar")
			{
				$_SESSION['username'] = $row['username'];
				header("LOCATION: teacher_dashboard.php");
			}
			else
			{
				?> <script> alert("Invalid password and username."); window.location = "index.php"; </script><?php
			}
		}else{
			?> <script> alert("Invalid password and username."); window.location = "index.php"; </script><?php
		}
	}else{
		?> <script> alert("This account is currently Inactive. Please approach administrator for help."); window.location = "index.php"; </script><?php
	}
}
?>