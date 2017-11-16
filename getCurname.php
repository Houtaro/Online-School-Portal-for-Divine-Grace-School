<?php


	require "conn.php";


	$curid = $_POST['curid'];
	$gradeid = $_POST['gradeid'];
	$query = "SELECT * FROM curriculumtbl WHERE id = " . $curid;
	$query2 = "SELECT * FROM tblyearlevel WHERE id = " . $gradeid;
	$result = mysqli_query($con, $query);
	$result2 = mysqli_query($con, $query2);

	$curname = "";
	while($row = mysqli_fetch_array($result))
	{
		$curname = $row['curname'];
	}

	$gradelvl = "";
	while($row = mysqli_fetch_array($result2))
	{
		$gradelvl = $row['yearlevel'];
	}

	echo $curname . "," . $gradelvl;


?>