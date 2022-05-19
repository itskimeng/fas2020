<?php
require_once "connection.php";
require_once 'ActivityPlanner/manager/ActivityPlanner.php';

date_default_timezone_set('Asia/Manila');

// call instance of ActivityPlanner
// to access all method inside the class
$ap = new ActivityPlanner();
	
// $username = $_SESSION['username'];
// $userid = $_SESSION['currentuser'];
$emp_opt = $ap->fetchEmployeeOptions();

$data = $ap->fetchData();