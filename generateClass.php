<?php



require "conn.php";

$cur_id = $_POST['curid'];
$gradeid = $_POST['gradeid'];

$query = "SELECT * FROM tblclass WHERE cur_id = " . $cur_id . " AND yearlevelid = " . $gradeid;
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


?>