<?php
date_default_timezone_set('Asia/Manila');

$emp_id = $_GET['emp_id'];
$current_user = $_SESSION['currentuser'];
$employee = fetchEmployee($emp_id);
$tasks = fetchAllTask($emp_id);
$tasks_done = fetchDoneTasks($emp_id);

$activities = fetchActivities();
$cddprograms = fetchCDDPrograms();

function fetchCDDPrograms() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$programs = [];

	$sql = "SELECT id, code, name FROM event_programs"; 
	$query = mysqli_query($conn, $sql);
	
	$programs['ALL'] = 'ALL';
	while ($row = mysqli_fetch_assoc($query)) {
	    $programs[$row['code']] = $row['code'];
	}

	return $programs;
}

function fetchActivities() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	$sql = "SELECT 
				events.id as id, 
				events.title as title,
				events.program as program,
				events.code_series as code
			FROM events
	     	LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
	     	LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
	      	LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
	          	WHERE tp.DIVISION_M like '%CDD%'
	          	ORDER BY events.id DESC";

	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		$data[$row['id']] = $row['code'] .'  ~  '.$row['title'];
	} 

	return $data;
}

function fetchAllTask($id='', $status=['Created', 'Ongoing', 'Paused', 'For Checking', 'Done']) {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	foreach ($status as $stat) {
		$sql = "SELECT 
			evs.id as task_id, 
			evs.title as task_title, 
			host.LAST_M as lname, 
			host.FIRST_M as fname, 
			host.PROFILE as profile, 
			DATE_FORMAT(evs.date_from, '%M %d, %Y %h:%i %p') as date_start, 
			DATE_FORMAT(evs.date_to, '%M %d, %Y %h:%i %p') as date_end, 
			ev.venue as venue, 
			ev.description as description, 
			ev.title as event_title, 
			DATE_FORMAT(ev.start, '%m/%d/%Y') as ev_datestart, 
			DATE_FORMAT(ev.end, '%m/%d/%Y') as ev_dateend, 
			evs.task_counter as task_counter, 
			evs.code as code, 
			DATE_FORMAT(evs.date_start, '%M %d, %Y %h:%i %p') as evs_progstart, 
			DATE_FORMAT(evs.date_end, '%M %d, %Y %h:%i %p') as evs_progend,
			evs.external_link as elink
		  FROM event_subtasks evs
		  LEFT JOIN events ev ON ev.id = evs.event_id
		  JOIN tblemployeeinfo host ON host.EMP_N = ev.postedby
		  WHERE evs.emp_id = $id AND evs.status = '".$stat."' AND evs.is_read = False";

		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {
			$is_default = false;
			if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg') || strpos($row['profile'], '.JPG')) {
				$profile = $row['profile']; 
	 		} else {
				$profile = 'images/logo.png';
				$is_default = true; 
	 		}

			$data[$stat][] = [
				'task_id' => $row['task_id'],
				'task_title' => $row['task_title'],
				'event_title' => $row['event_title'],
				'host_initials' => $row['fname'][0] .''.$row['lname'][0],
				'is_default' => $is_default,
				'profile' => $profile,
				'timeline_start' => $row['date_start'],
				'timeline_end' => $row['date_end'],
				'date_start' => $row['ev_datestart'],
				'date_end' => $row['ev_dateend'],
				'progress_datestart' => $row['evs_progstart'],
				'progress_dateend' => $row['evs_progend'],
 				'venue' => $row['venue'],
				'description' => $row['description'],
				'task_counter' => $row['task_counter'] > 0 ? 'Rev '.$row['task_counter'] : '',
				'code' => $row['code'],
				'elink' => $row['elink']
			]; 
		} 
	}

	return $data;  
}

function fetchDoneTasks($id='', $status=['Done']) {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];

	foreach ($status as $stat) {
		$sql = "SELECT 
			evs.id as task_id, 
			evs.title as task_title, 
			host.LAST_M as lname, 
			host.FIRST_M as fname, 
			host.PROFILE as profile, 
			DATE_FORMAT(evs.date_from, '%M %d, %Y %h:%i %p') as date_start, 
			DATE_FORMAT(evs.date_to, '%M %d, %Y %h:%i %p') as date_end, 
			ev.venue as venue, 
			ev.description as description, 
			ev.title as event_title, 
			DATE_FORMAT(ev.start, '%m/%d/%Y') as ev_datestart, 
			DATE_FORMAT(ev.end, '%m/%d/%Y') as ev_dateend, 
			evs.task_counter as task_counter, 
			evs.code as code, 
			DATE_FORMAT(evs.date_start, '%M %d, %Y %h:%i %p') as evs_progstart, 
			DATE_FORMAT(evs.date_end, '%M %d, %Y %h:%i %p') as evs_progend,
			evs.external_link as elink,
			evs.approver as approver
		  FROM event_subtasks evs
		  LEFT JOIN events ev ON ev.id = evs.event_id
		  JOIN tblemployeeinfo host ON host.EMP_N = ev.postedby
		  WHERE evs.emp_id = $id AND evs.status = '".$stat."'";

		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($query)) {
			$is_default = false;
			if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg') || strpos($row['profile'], '.JPG')) {
				$profile = $row['profile']; 
	 		} else {
				$profile = 'images/logo.png';
				$is_default = true; 
	 		}

			$data[] = [
				'task_id' => $row['task_id'],
				'task_title' => $row['task_title'],
				'event_title' => $row['event_title'],
				'host' => $row['fname'] .' '.$row['lname'],
				'host_initials' => $row['fname'][0] .''.$row['lname'][0],
				'is_default' => $is_default,
				'profile' => $profile,
				'timeline_start' => $row['date_start'],
				'timeline_end' => $row['date_end'],
				'date_start' => $row['ev_datestart'],
				'date_end' => $row['ev_dateend'],
				'progress_datestart' => $row['evs_progstart'],
				'progress_dateend' => $row['evs_progend'],
 				'venue' => $row['venue'],
				'description' => $row['description'],
				'task_counter' => $row['task_counter'] > 0 ? $row['task_counter'] : '',
				'code' => $row['code'],
				'elink' => $row['elink'],
				'approver' => $row['approver']
			]; 
		} 
	}

	return $data;  
}

function fetchEmployee($id) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$sql = "SELECT LAST_M as lname, FIRST_M as fname, MIDDLE_M as mname 
		  FROM tblemployeeinfo WHERE EMP_N = $id";

	$query = mysqli_query($conn, $sql);

	$result = mysqli_fetch_assoc($query);

	$name = $result['fname'] .' '.$result['lname'];
	
	return $name;
}



