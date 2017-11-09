<?php
	require "CRUD.php";

	$crud = new CRUD("localhost", "root", "", "portaldb");
	$con = $crud->getConnection();

	function validate($data)
	{
		$data = addslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}
?>