<?php
date_default_timezone_set('Asia/Manila');

$event_id = $_GET['event_planner_id'];
$user = $_SESSION['currentuser'];
$collaborators = fetchEventCollaborators();
$collaborators1 = fetchEventCollaborators1();
$subtasks = fetchData();
$event_data = fetchEvent();
$is_opr = isOPR($event_id, $user);
$access_list = fetchUserAccess($event_id, $user);

function hasAccess($pointer='') {
	$checker = false;
	$access_list = fetchUserAccess($event_id, $user);

	if (in_array($pointer, $access_list)) {
		$checker = true;	
	}

	return $checker;
}

function isOPR($id='', $user='') {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$checker = true;
	$sql = "SELECT * FROM events
	  WHERE id = $id AND postedby = $user";

	$query = mysqli_query($conn, $sql);	
	$row = mysqli_fetch_assoc($query);

	if (empty($row)) {
		$checker = false;
	}

	return $checker;
}

function fetchUserAccess($id='', $user='') {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$checker = true;
	$sql = "SELECT acl FROM event_collaborators
	  WHERE event_id = $id AND emp_id = $user";
	
	$query = mysqli_query($conn, $sql);	
	$row = mysqli_fetch_assoc($query);

	$acl = json_decode($row['acl']);
	$access = [];
	foreach ($acl as $key => $value) {
		if ($value) {
			array_push($access, $key);
		}
	}

	return $access;
}

function fetchEventCollaborators1() {

	$id = $_GET['event_planner_id'];

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$sql = "SELECT ec.id as clb_id, ec.emp_id as emp_id, ec.emp_fname as fname, ec.emp_mname as mname, ec.emp_lname as lname, ec.acl as acl
	  FROM event_collaborators ec
	  WHERE ec.event_id = $id";
	  
	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
	 	$emp_id = $row["emp_id"];
		$fname = $row['fname'];  
	  	$mname = $row["mname"];  
	  	$lname = $row["lname"];
		
		$employees[$row['clb_id']] = [
			'emp_id' => $row['emp_id'],
			'name' => $row['fname'] .' '. $row["mname"] .'. ' .$row["lname"],
			'acl' => json_decode($row['acl'])
		];
	} 

	return $employees;  
}

function fetchEventCollaborators() {

	$id = $_GET['event_planner_id'];

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$sql = "SELECT ec.emp_id as emp_id, ec.emp_fname as fname, ec.emp_mname as mname, ec.emp_lname as lname
	  FROM event_collaborators ec
	  WHERE ec.event_id = $id";
	  
	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
	 	$emp_id = $row["emp_id"];
		$fname = $row['fname'];  
	  	$mname = $row["mname"];  
	  	$lname = $row["lname"];
		
		$employees[$row['emp_id']] = $row['fname'] .' '. $row["mname"] .'. ' .$row["lname"];
	} 

	return $employees;  
}

function fetchEvent() {
	$id = $_GET['event_planner_id'];

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

	$query = "SELECT ev.id as id, ev.title as event_title, ev.description as event_description, ev.venue as event_venue, DATE_FORMAT(ev.start, '%M %d, %Y %h:%i %p') as event_start, DATE_FORMAT(ev.end, '%M %d, %Y %h:%i %p') as event_end, CONCAT(emp.FIRST_M, '. ', emp.MIDDLE_M, ' ', emp.LAST_M) as host_name, emp.FIRST_M as fname, emp.LAST_M as lname, emp.PROFILE as event_profile, desg.DESIGNATION_M as host_designation, ev.priority as event_priority, ev.code_series as code_series, ev.program as event_program
	  FROM events ev
	  LEFT JOIN tblemployeeinfo emp on emp.EMP_N = ev.postedby
	  LEFT JOIN tbldesignation desg on desg.DESIGNATION_ID = emp.DESIGNATION
	  WHERE ev.id = $id";

	$result = mysqli_query($conn, $query);
	$data = [];

    while ($row = mysqli_fetch_assoc($result)) {     
		$profile = 'images/logo.png'; 

    	if (strpos($profile, '.png') || strpos($profile, '.jpg') || strpos($profile, '.jpeg')) {
			$profile = $row['event_profile']; 
 		}
 		// $start_date->format('F d, Y h:i a')

 		$data = [
 			'id' => $row['id'],
 			'event_title' => $row['event_title'],
 			'event_program' => $row['event_program'],
 			'code_series' => $row['code_series'],
 			'event_description' => $row['event_description'],
 			'event_venue' => $row['event_venue'],
 			'host_name' => $row['host_name'],
 			'host_initials' => $row['fname'][0] .''.$row['lname'][0],
 			'event_start' => $row['event_start'],
 			'event_end' => $row['event_end'],
 			'host_profile' => $profile,
 			'host_designation' => $row['host_designation'],
 			'event_priority' => $row['event_priority'],
 			'current_user' => $_SESSION['currentuser']
 		];
    };

	return $data;
}

function fetchData() {

	$id = $_GET['event_planner_id'];

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	$sql = "SELECT 
		es.id as id, 
		es.emp_id as emp_id,
		CONCAT(emp.FIRST_M, ' ', emp.LAST_M) as emp_fullname,
		es.title as title, 
		es.status as status, 
		DATE_FORMAT(es.date_from, '%m/%d/%Y') as date_from, 
		DATE_FORMAT(es.date_to, '%m/%d/%Y') as date_to,
		DATE_FORMAT(es.date_start, '%m/%d/%Y') as date_start, 
		DATE_FORMAT(es.date_end, '%m/%d/%Y') as date_end, 
		es.is_new as is_new,
		es.code as code,
		es.task_counter as task_counter
	  FROM event_subtasks es
	  LEFT JOIN tblemployeeinfo emp on emp.EMP_N = es.emp_id
	  WHERE es.event_id = $id";
	
	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
	 	$is_readonly = false;
	 	if (in_array($row['status'], ['Done', 'Ongoing', 'For Checking'])) {
	 		$is_readonly = true;
	 	}

	 	$comments = fetchComment($conn, $row['id']);

	 	$data[] = [
	 		'task_id' => $row['id'],
	 		'task_code' => $row['code'],
	 		'title' => $row['title'],
	 		'emp_id' => $row['emp_id'],
	 		'person' => $row['emp_fullname'],
	 		'status' => $row['status'] != "For Checking" ? lcfirst($row['status']) : "forchecking",
	 		'is_readonly' => $is_readonly,
	 		'date_from' => $row['date_from'],
	 		'date_to' => $row['date_to'],
	 		'date_start' => $row['date_start'] != '' ? '<b>Start:</b> ' .$row['date_start'] : '',
	 		'date_end' => $row['date_end'] != '' ? '<b>End:</b> ' .$row['date_end'] : '',
	 		'is_new' => $row['is_new'],
	 		'comments' => $comments,
			'task_counter' => $row['task_counter'] > 0 ? $row['task_counter'] : ''

	 	];	
	} 


	return $data;  
}

function fetchComment($conn, $id) {
	$user = $_SESSION['currentuser'];
	$data = [];
	$sql = "SELECT esc.remarks, DATE_FORMAT(esc.posted_date, '%Y/%m/%d %H:%i:%s') as posted_date, CONCAT(emp.FIRST_M, '. ', emp.MIDDLE_M, ' ', emp.LAST_M) as posted_by, emp.profile as profile, emp.EMP_N as postby_id
	  FROM event_subtasks_comment esc
	  LEFT JOIN tblemployeeinfo emp ON emp.EMP_N = esc.posted_by
	  WHERE task_id = $id";
	
	$query = mysqli_query($conn, $sql);   

	while ($row = mysqli_fetch_assoc($query)) {
		$is_currentuser = false;
		
		if ($user == $row['postby_id']) {
			$is_currentuser = true;
		}

		$profile = 'images/logo.png'; 

		if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg')) {
			$profile = $row['profile']; 
 		}

		$data[] = [
			'remarks' => $row['remarks'],
			'posted_date' => $row['posted_date'],
			'posted_by' => $row['posted_by'],
			'profile' => $profile,
			'is_currentuser' => $is_currentuser
		];
	};

	return json_encode($data);
}