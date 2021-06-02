<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/FlashMessage.php';
require_once '../manager/Configure.php';
require_once "../../connection.php";


// call instance of class
$flash = new FlashMessage();
$configure = new Configure();

$is_new = true;
$event_id = $_GET['event_id'];
$event_program = $_GET['event_program'];
$currentuser = $_SESSION['currentuser'];

$task_id = isset($_GET['task_id']) ? $_GET['task_id'] : '';
$title = $_GET['subtask'];
$persons = $_GET['collaborators'];
$timeline = $_GET['timeline'];

// timeline
$timeline = explode("-", $_GET['timeline']);
$date_from = strtotime($timeline[0]);
$date_from = date('Y-m-d H:i:s', $date_from);
$date_to = strtotime($timeline[1]);
$date_to = date('Y-m-d H:i:s', $date_to);

foreach ($persons as $key => $person) {
    $data = checkConflictSched($conn, ['person'=>$person, 'date_from'=>$date_from, 'date_to'=>$date_to, 'task_id' => $task_id]);
    if (!empty($data)) {
        $result[$person]['data'] = $data;
        $result[$person]['name'] = findEmployee($conn, $person);
    }
}

echo !empty($result) ? json_encode($result) : '';

function checkConflictSched($conn, $data) {
    $task_id = $data['task_id']; 
    $person = $data['person']; 
    $date_from = $data['date_from']; 
    $date_to = $data['date_to']; 
    $result = [];

    $sql = "SELECT 
    	ev.title as activity,
    	evs.title as title,
    	DATE_FORMAT(evs.date_from, '%Y-%m-%d %h:%i %p') as date_start,
    	DATE_FORMAT(evs.date_to, '%Y-%m-%d %h:%i %p') as date_end 
    	FROM event_subtasks evs 
    	LEFT JOIN events ev on ev.id = evs.event_id
    	where evs.emp_id LIKE '%$person%' 
        AND evs.date_from >= '$date_from' AND evs.date_to <= '$date_to' AND evs.status <> 'Done' AND evs.id <> $task_id"; 

    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
   		$result[] = [
   			'activity' => $row['activity'],
   			'title' => $row['title'],
   			'date_start' => $row['date_start'],
   			'date_end' => $row['date_end']
   		];
    }

    return $result;
}

function findEmployee($conn, $data) {
    $sql = "SELECT EMP_N as emp_n, FIRST_M as fname, MIDDLE_M as mname, LAST_M as lname FROM tblemployeeinfo WHERE EMP_N = $data";

    $emp = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($emp);
    
    $result = $result['fname'] .' ' .$result['lname'];

    return $result;    
}