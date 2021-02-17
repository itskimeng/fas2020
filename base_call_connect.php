<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header('location:index.php');
} else {
	error_reporting(0);
	ini_set('display_errors', 0);
	$admins = ['charlesodi', 'mmmon	iro', 'cvferrer', 'masacluti', 'seolivar'];
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

	