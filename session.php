<?php
date_default_timezone_set("Asia/Manila");
session_start();
if (isset($_SESSION['username'])) 
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: index.php");
	exit();
}


$result = mysqli_query($con,"SELECT * FROM usertbl WHERE username = '$username'")or die(mysqli_error($con));
$user_rows = mysqli_fetch_array($result);
$username = $user_rows['username'];
$fname = $user_rows['fname'];
$lname = $user_rows['lname'];
$mname = $user_rows['mname'];
$contact = $user_rows['contact'];
$sessionid = $user_rows['id'];
$userType = $user_rows['usertype'];
$profile_pic = $user_rows['profile_pic'];
$name = $fname." ".$lname;
?>