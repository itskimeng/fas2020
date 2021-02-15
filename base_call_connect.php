<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header('location:index.php');
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
	$username = $_SESSION['username'];
	$division = $_GET['division'];
	$DEPT_ID = $_SESSION['DEPT_ID'];
	$OFFICE_STATION = $_SESSION['OFFICE_STATION'];
}

$id = '';

?>	