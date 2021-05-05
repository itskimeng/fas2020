<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once '../manager/TemplateGenerator.php';

$template = new TemplateGenerator();
$data['certificate_type'] = $_GET['certificate_type'];
$data['activity_title'] = $_GET['activity_title'];
$data['date_from'] = $_GET['date_from'];
$data['date_to'] = $_GET['date_to'];
$data['activity_venue'] = $_GET['activity_venue'];
$data['date_given'] = $_GET['date_given'];
$data['date_generated'] = $_GET['date_generated'];
$data['opr'] = !empty($_GET['opr']) ? $_GET['opr'] : null;


$sql = "SELECT certificate_type,activity_title, attendee, 
			DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, 
			DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, 
			activity_venue, 
			DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, 
			DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated,
			opr, position, office
			FROM template_generator
			WHERE certificate_type = '".$data['certificate_type']."' AND activity_title = '".$data['activity_title']."' AND date_from = '".$data['date_from']." 00:00:00' AND date_to = '".$data['date_to']." 23:59:59' AND activity_venue = '".$data['activity_venue']."' AND date_given = '".$data['date_given']." 00:00:00' AND date_generated = '".$data['date_generated']." 00:00:00'"; 
	if ($data['opr'] != '') {
		$sql.= " AND opr = '".$data['opr']."'";
	} else {
		$sql.= " AND opr is NULL";
	}

$template->exportCSV($conn, $sql);

exit;