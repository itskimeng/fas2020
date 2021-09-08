<?php
// session_start();
date_default_timezone_set('Asia/Manila');
	
$tasks = fetchTasks();

function fetchTasks() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	$status=['Created', 'Ongoing', 'Paused', 'For Checking', 'Done'];

	foreach ($status as $stat) {
		$sql = "SELECT 
				ev.title as event_title,
				es.title as task_title,
				es.emp_id as emps,
				es.date_from as date_start,
				es.date_to as date_end
				FROM event_subtasks es 
		        LEFT JOIN events ev on ev.id = es.event_id
		     	LEFT JOIN tblemployeeinfo te on te.EMP_N = es.emp_id
				where es.status = '".$stat."'";
		
		$query = mysqli_query($conn, $sql);

		// $result[$stat] = mysqli_fetch_all($query, MYSQLI_ASSOC);
		while($row = mysqli_fetch_assoc($query)) {
			$persons = json_decode($row['emps'], true);
			$collaborators = fetchEmployee($conn, $persons);

			$ddd1 = new DateTime($row['date_start']);
			$ddd2 = new DateTime($row['date_end']);

			$result[$stat][] = [
				'event_title' 		=> $row['event_title'],
				'task_title' 		=> $row['task_title'],
				'date_start' 		=> date_format($ddd1, 'M d, Y g:i A'),
		 		'date_end' 			=> date_format($ddd2, 'M d, Y g:i A'),
		 		'collaborators'		=> count($collaborators) > 1 ? implode(", <br>", $collaborators) : implode("<br>", $collaborators)
			];
		}
	}

	return $result;
}

function fetchEmployee($conn, $data) {
	$dd = [];

	if (is_array($data) AND !empty($data)) {
		foreach ($data as $key => $id) {
			if ($id != null) {
				$sql = "SELECT LAST_M as lname, FIRST_M as fname
				  FROM tblemployeeinfo 
				  WHERE EMP_N = $id";
					
				$query = mysqli_query($conn, $sql);
				$result = mysqli_fetch_array($query);  
				$dd[] = $result['fname'] .' ' .$result['lname'];
			}
		}
	} else {
		if (!empty($data)) {
			$sql = "SELECT LAST_M as lname, FIRST_M as fname
			  FROM tblemployeeinfo 
			  WHERE EMP_N = $data";

			$query = mysqli_query($conn, $sql);
			$result = mysqli_fetch_array($query);  
			$dd[] = $result['fname'] .' ' .$result['lname'];
		}
	}

	return $dd;
}
