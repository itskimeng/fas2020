<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

$activity = $_GET['activity'];
$task = $_GET['task'];
$collaborators = isset($_GET['collaborators']) ? implode(', ', $_GET['collaborators']) : '';
$daterange = explode(' - ', $_GET['daterange']);
$drange = convertToTime($daterange);

fetchData($conn, ['activity'=>$activity, 'task'=>$task, 'collaborators'=>$collaborators, 'dfrom'=>$drange['date_from'], 'dto'=>$drange['date_to']]);

function convertToTime($daterange) 
{
	// timeline
	// $timeline = explode("-", $_POST['timeline']);
	$date_from = strtotime($daterange[0]);
	$date_from = date('Y-m-d H:i:s', $date_from);
	$date_to = strtotime($daterange[1]);
	$date_to = date('Y-m-d H:i:s', $date_to);

	return array('date_from'=>$date_from, 'date_to'=>$date_to);
}

function fetchData($conn, $data) 
{
	$array = $data['collaborators'];
	$sql = "SELECT e.title as activity, es.title as task, es.emp_id as emps, es.status as status, DATE_FORMAT(es.date_from, '%m/%d/%Y %h:%i %p') as tdate_from, DATE_FORMAT(es.date_to, '%m/%d/%Y %h:%i %p') as tdate_to, DATE_FORMAT(es.date_start, '%m/%d/%Y %h:%i %p') as pdate_start, DATE_FORMAT(es.date_end, '%m/%d/%Y %h:%i %p') as pdate_end FROM event_subtasks es LEFT JOIN events e on e.id = es.event_id WHERE es.status <> 'Draft'";

	if (!empty($data['dfrom']) AND !empty($data['dto'])) {
		$dfrom = $data['dfrom'];
		$dto = $data['dto'];

		$sql.= " AND es.date_from >= '".$dfrom."' AND es.date_to <= '".$dto."' ";
	}
	
	if (!empty($data['activity'])) {
		$sql.= " AND e.title LIKE '%".$data['activity']."%' ";
	}

	if (!empty($data['task'])) {
		$sql.= " AND es.title LIKE '%".$data['task']."%' ";
	}

	if (!empty($array)) {
		$sql.= " AND es.emp_id LIKE '%$array%' ";
	}

	$sql.= "ORDER BY e.title, es.status";

	$query = mysqli_query($conn, $sql);
	$results = [];

	while($row = mysqli_fetch_assoc($query)) {
		$persons = json_decode($row['emps'], true);
		$collaborators = fetchEmployee($conn, $persons);
		$status = $row['status'];

		if ($row['status'] == 'Created') {
			$status = 'To Do';
		}

		$results[] = [
			'activity' 		=> $row['activity'],
			'task' 			=> $row['task'],
			'status' 		=> $status,
			'date_from' 	=> $row['tdate_from'],
	 		'date_to' 		=> $row['tdate_to'],
	 		'date_start' 	=> $row['pdate_start'] != '' ? $row['pdate_start'] : '',
	 		'date_end' 		=> $row['pdate_end'] != '' ? $row['pdate_end'] : '',
	 		'collaborators'	=> count($collaborators) > 1 ? implode(", <br>", $collaborators) : implode("<br>", $collaborators)
		];
	}

	echo json_encode(json_encode($results));
}

function fetchEmployee($conn, $data) 
{
	$dd = [];

	if (is_array($data)) {
		foreach ($data as $key => $id) {
			$sql = "SELECT LAST_M as lname, FIRST_M as fname
			  FROM tblemployeeinfo 
			  WHERE EMP_N = $id";

			$query = mysqli_query($conn, $sql);
			$result = mysqli_fetch_array($query);  
			$dd[] = $result['fname'] .' ' .$result['lname'];
		}
	} else {
		$sql = "SELECT LAST_M as lname, FIRST_M as fname
		  FROM tblemployeeinfo 
		  WHERE EMP_N = $data";

		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_array($query);  
		$dd[] = $result['fname'] .' ' .$result['lname'];
	}

	return $dd;
}