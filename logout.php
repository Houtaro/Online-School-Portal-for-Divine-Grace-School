<?php
include "conn.php";
include "session.php";
session_destroy();
$crud->insert("activity_log", array("userid", "madeby", "description", "datemade"), array($sessionid, $name, "Logout" ,date("M d, Y - h:i a")));
header('location:index.php'); 
?>