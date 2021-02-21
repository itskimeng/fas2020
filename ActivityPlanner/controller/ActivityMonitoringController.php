<?php
date_default_timezone_set('Asia/Manila');

$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$count_todo = fetchEventSubtasks('Created');
$count_done = fetchEventSubtasks('Done');
$count_paused = fetchEventSubtasks('For Checking');
$count_ongoing = fetchEventSubtasks('Ongoing');
$lgcdd_emp = fetchEmployees($userid);
$lgcdd_events = fetchEvents($userid);
$lgcdd_programs = fetchPrograms();
$cddprograms = fetchCDDPrograms();

// $is_opr = isOPR($event_id, $user);
// $access_list = fetchUserAccess($event_id, $user);

// function hasAccess($pointer='') {
// 	$checker = false;
// 	$access_list = fetchUserAccess($event_id, $user);

// 	if (in_array($pointer, $access_list)) {
// 		$checker = true;	
// 	}

// 	return $checker;
// }

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

function fetchPrograms() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	$arr = fetchCDDPrograms();

	$sql = "SELECT 
				events.id as event_id, 
				events.title as title,
				events.program as program
			FROM events
	     	LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
	     	LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
	      	LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
	          	WHERE tp.DIVISION_M like '%CDD%'
	          	ORDER BY events.program";

	$query = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($query)) {
		if (in_array($row['program'], $arr)) {
			$data[$row['program']][] = [
				'event_id' => $row['event_id'],
				'activity' => $row['title']
			];		
		}
	} 

	return $data;
}

function fetchEmployees($user) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$query = mysqli_query($conn, "
		SELECT tbl_emp.EMP_N as emp_id, tbl_emp.FIRST_M as fname, tbl_emp.MIDDLE_M as mname, tbl_emp.LAST_M as lname, tbl_pos.POSITION_M as position, tbl_desg.DESIGNATION_M as designation, tbl_pdiv.DIVISION_M as division 
	  FROM tblemployeeinfo tbl_emp
	  LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
	  LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
	  LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
	  LEFT JOIN event_subtasks es on es.emp_id = tbl_emp.EMP_N
	  WHERE tbl_pdiv.DIVISION_M like '%CDD%'
	  ORDER BY tbl_emp.FIRST_M ASC");

	while ($row = mysqli_fetch_assoc($query)) {
	  	$tasks = fetchEventSubtasksByEmployee($row['emp_id']);
	  	$active_user = false;

	  	if ($user == $row['emp_id']) {
	  		$active_user = true;
	  	}
		
		$employees[$row['emp_id']] = [
			'name' => $row['fname'] .' ' .$row["lname"],
			'initials' => $row['fname'][0] .''.$row['lname'][0],
			'designation' => empty($row['designation']) ? 'Job Order' : $row['designation'],
			'tasks' => $tasks,
			'active_user' => $active_user
		];

	} 

	return $employees;  
}

function fetchEmployees1() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$query = mysqli_query($conn, "
		SELECT tbl_emp.EMP_N as emp_id, tbl_emp.FIRST_M as fname, tbl_emp.MIDDLE_M as mname, tbl_pos.POSITION_M as position, tbl_desg.DESIGNATION_M as designation, tbl_pdiv.DIVISION_M as division 
	  FROM tblemployeeinfo tbl_emp
	  LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
	  LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
	  LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
	  LEFT JOIN event_subtasks es on es.emp_id = tbl_emp.EMP_N
	  WHERE tbl_pdiv.DIVISION_M like '%CDD%'
	  ORDER BY tbl_emp.LAST_M ASC");

	while ($row = mysqli_fetch_assoc($query)) {
	 	$emp_id = $row["emp_id"];
		$fname = $row['fname'];  
	  	$mname = $row["mname"];  
	  	$lname = $row["lname"];
	  	$position = $row["position"];
	  	$designation = $row["designation"];
	  	$division = $row["division"];

	  	$tasks = fetchEventSubtasksByEmployee($row['emp_id']);
		
		$employees[$row['emp_id']] = $row['fname'] .' ' .$row["lname"];

	} 

	return $employees;  
}

function fetchEventSubtasksByEmployee($id, $status=['Created','Done','Ongoing','For Checking']) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	
	foreach ($status as $value) {
		$sql = "SELECT COUNT(*) as count FROM event_subtasks where emp_id = $id AND status = '".$value."'";
		$query = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($query);
		$data[$value] = $row['count'] > 99 ? $row['count'] .'+' : $row['count'];

	}

	return $data;  
}


function fetchEvents($currentuser='') {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$events = [];

	$current_date = date('Y-m-d H:i:s');
	$sql = "SELECT 
	    			events.id as event_id, 
	    			events.title as title, 
	    			CONCAT(te.FIRST_M, ' ', te.LAST_M)  as fname, 
	    			te.EMP_N as emp_id, 
	    			tp.DIVISION_N as division, 
	    			DATE_FORMAT(events.start, '%Y-%m-%d %H:%i:%s') as date_start, 
	    			DATE_FORMAT(events.end, '%Y-%m-%d %H:%i:%s') as date_end, 
	    			te.PROFILE as profile, 
	    			events.description as description,
	    			events.priority as priority,
	    			events.comments as comments,
	    			events.is_new as is_new,
	    			events.enp as no_participants,
	    			events.code_series as act_code
	    		FROM events
	         	LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
	         	LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
	          	LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION

	          	WHERE tp.DIVISION_M like '%CDD%' ORDER BY events.id DESC"; 	

	$query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {     

    	$participants = getParticipants($row['event_id']);

    	$profile = $color = '';
   
    	$date_start = new DateTime($row['date_start']);
    	$date_end = new DateTime($row['date_end']);
    	
    	if ($current_date > $row['date_end']) {
    		$status = 'Finished';
			// $color = '#70ed70';	
    	} elseif ($current_date >= $row['date_start'] AND $current_date <= $row['date_end']) {
    		$status = 'Ongoing';
			// $color = '#f3bc43';		
    	} else {
    		$status = 'Not yet Started';
			// $color = '#ed5555';	
    	}

    	if ($row['is_new']) {
    		$status = 'No time selected';
			$color = '#b7b4b4';	
    	}

 		$start_date = new DateTime($row['date_start']);
 		$end_date = new DateTime($row['date_end']);

 		if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg')) {
			$profile = $row['profile']; 
 		} else {
			$profile = 'images/logo.png'; 
 		}

 		$access_list = [];
 		$has_access = false;

 		if ($row['emp_id'] == $currentuser) {
 			$access_list = fetchUserAccess($row['event_id'], $row['emp_id']);
 			$is_opr = isOPR($row['event_id'], $row['emp_id']);

 			if ($is_opr OR in_array('opr', $access_list)) {
 				$has_access = true;
 			}
 		}

 		$events[] = [
 			'id' => $row['event_id'],
 			'act_code' => $row['act_code'],
 			'emp_id' => $row['emp_id'],
 			'title' => $row['title'],
 			'host' => $row['fname'],
 			'division' => $row['division'],
 			'date_start_f' => $start_date->format('F d, Y h:i a'),
 			'date_end_f' => $end_date->format('F d, Y h:i a'),
 			'date_start' => $start_date->format('F d, Y'),
 			'date_end' => $end_date->format('F d, Y'),
 			'time_start' => $start_date->format('h:i a'),
 			'time_end' => $end_date->format('h:i a'),
 			'profile' => $profile,
 			'priority' => $row['priority'],
 			'status' => $status,
 			'color' => $color,
 			'description' => $row['description'],
 			'collaborators' => $participants['emps'],
 			'row_count' => $participants['row_count'],
 			'target_participants' => $row['no_participants'],
 			'is_new' => $row['is_new'],
 			'has_access' => $has_access
 		];

    }
   
    return $events;
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

function getParticipants($id) {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$sql = "SELECT emp_id, CONCAT(emp_fname, '. ', emp_mname, ' ', emp_lname) as fname
			FROM event_collaborators WHERE event_id = ".$id."";

	$emp = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($emp, MYSQLI_ASSOC);
    $row_count = count($result);

    $emps = [];

    foreach ($result as $key=>$row) {     
    	$emps[] = $row['emp_id'];
    }

    $data = ['row_count' => $row_count, 'emps' => json_encode($emps)];

    return $data;
}

function updateEvent() {

	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$events = [];

	$current_date = date('Y-m-d 00:00:00');

	$query = mysqli_query($conn, "
	    		SELECT events.id as event_id, events.title as title, CONCAT(te.FIRST_M, '. ', te.MIDDLE_M, ' ', te.LAST_M)  as fname, te.EMP_N as emp_id, tp.DIVISION_N as division, DATE_FORMAT(events.start, '%Y-%m-%d %h:%m:%s') as date_start, DATE_FORMAT(events.end, '%Y-%m-%d %h:%m:%s') as date_end, te.PROFILE as profile, events.description as description
	    		FROM events
	         	LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
	         	LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
	          	LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
	          	WHERE tp.DIVISION_M like '%CDD%'
	          	ORDER BY events.posteddate ASC");
			
    while ($row = mysqli_fetch_assoc($query)) {        
 		
 		if ($current_date < $row['date_start']) {
			$status = 'Not yet Started';
			$color = '#b6c8b6';	
 		} elseif ($current_date > $row['date_end']) {
 			$status = 'Ended';
			$color = '#34e934';	
 		} elseif ($current_date > $row['date_start'] AND $current_date < $row['date_end']) {
 			$status = 'On Going';
			$color = '#ffb91d';	
 		}

 		$start_date = new DateTime($row['date_start']);
 		$end_date = new DateTime($row['date_end']);

 		$events[] = [
 			'id' => $row['event_id'],
 			'emp_id' => $row['emp_id'],
 			'title' => $row['title'],
 			'host' => $row['fname'],
 			'division' => $row['division'],
 			'date_start' => $start_date->format('F d, Y'),
 			'date_end' => $end_date->format('F d, Y'),
 			'profile' => $row['profile'],
 			'status' => $status,
 			'color' => $color,
 			'description' => $row['description']
 		];
 		
    }
    
    return $events;
}

function fetchEventCollaborators($event_id) {
	
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$query = mysqli_query($conn, "
		SELECT tbl_emp.EMP_N as emp_id, tbl_emp.FIRST_M as fname, tbl_emp.MIDDLE_M as mname, tbl_pos.POSITION_M as position, tbl_desg.DESIGNATION_M as designation, tbl_pdiv.DIVISION_M as division 
	  FROM tblemployeeinfo tbl_emp
	  LEFT JOIN tblpersonneldivision tbl_pdiv on tbl_pdiv.DIVISION_N = tbl_emp.DIVISION_C
	  LEFT JOIN tbldilgposition tbl_pos on tbl_pos.POSITION_ID = tbl_emp.POSITION_C
	  LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = tbl_emp.DESIGNATION
	  WHERE tbl_pdiv.DIVISION_M like '%CDD%'
	  ORDER BY tbl_emp.LAST_M ASC");

	while ($row = mysqli_fetch_assoc($query)) {
	 	$emp_id = $row["emp_id"];
		$fname = $row['fname'];  
	  	$mname = $row["mname"];  
	  	$lname = $row["lname"];
	  	$position = $row["position"];
	  	$designation = $row["designation"];
	  	$division = $row["division"];
		
		$employees[$row['emp_id']] = $row['fname'] .' '. $row["mname"] .'. ' .$row["lname"];
	} 

	return $employees;  
}

function fetchEventSubtasks($status) {
	
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$employees = [];
	$sql = "SELECT COUNT(*) as count FROM event_subtasks where status = '".$status."'";
	$query = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($query);
	
	return $row['count'];  
}









