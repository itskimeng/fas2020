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

$data = fetchData($conn);

function fetchData($conn)
{
	$sql = "SELECT 
		e.title as activity,
		es.title as task,
		es.emp_id as emps,
		es.status as status,
		DATE_FORMAT(es.date_from, '%m/%d/%Y %h:%i %p') as tdate_from, 
		DATE_FORMAT(es.date_to, '%m/%d/%Y %h:%i %p') as tdate_to,
		DATE_FORMAT(es.date_start, '%m/%d/%Y %h:%i %p') as pdate_start, 
		DATE_FORMAT(es.date_end, '%m/%d/%Y %h:%i %p') as pdate_end  	
		FROM event_subtasks es
		LEFT JOIN events e on e.id = es.event_id
		WHERE es.status <> 'Draft'
		ORDER BY e.title, es.status";

	$data = [];

	$query = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($query)) {
		$persons = json_decode($row['emps'], true);
		$collaborators = fetchEmployee($conn, $persons);
		$status = $row['status'];

		if ($row['status'] == 'Created') {
			$status = 'To Do';
		}

		$data[] = [
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
		
	return $data;
}

function fetchEmployee($conn, $data) {
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
