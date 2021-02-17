<?php 
session_start();

print_r($_SESSION);
die();

if (!isset($_SESSION['username'])) {
	print_r('walang user');
	die();
	header('location:index.php');

} else {
	error_reporting(0);
	ini_set('display_errors', 0);
	$admins = ['charlesodi', 'mmmonteiro', 'cvferrer', 'masacluti', 'seolivar'];

	print_r($_SESSION);
	die();
	$data['username'] = $_SESSION['username'];
	$data['division'] = $_GET['division'];
	$data['DEPT_ID'] = $_SESSION['DEPT_ID'];
	$data['OFFICE_STATION'] = $_SESSION['OFFICE_STATION'];
	$data['is_admin'] = false;

	if (in_array($_SESSION['username'], $admins)) {
		$data['is_admin'] = true;
	}
	
	return $data;
}

	