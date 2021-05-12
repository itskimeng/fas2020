<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once '../manager/FlashMessage.php';
require_once '../manager/Configure.php';
require_once "../manager/Notification.php";

$flash = new FlashMessage();
$configure = new Configure();
$notif = new Notification();

$is_new = true;
$event_id = $_POST['event_id'];
$event_program = $_POST['event_program'];
$currentuser = $_SESSION['currentuser'];

$task_id = isset($_POST['task_id']) ? $_POST['task_id'] : '';
$title = $_POST['subtask'];
$person = $_POST['person']; 
$timeline = $_POST['timeline'];

// timeline
$timeline = explode("-", $_POST['timeline']);
$date_from = strtotime($timeline[0]);
$date_from = date('Y-m-d H:i:s', $date_from);
$date_to = strtotime($timeline[1]);
$date_to = date('Y-m-d H:i:s', $date_to);

$code_series = $configure->getCodeSeries($conn, $event_program);

$data = [
    'event_id' => $event_id,
    'event_program' => $event_program,
    'code' => $code_series['code'],
    'task_id' => $task_id,
    'title' => $title,
    'emp_id' => $person,
    'date_from' => $date_from,  
    'date_to' => $date_to,
    'currentuser' => $currentuser
];

if (empty($task_id)) {
    $result = insertEventSubtask($conn, 'event_subtasks', $data);
    $configure->setCodeSeries($conn, $event_program, $code_series['child']);
} else {
    $is_new = false;
    $status = fetchTaskStatus($conn, 'event_subtasks', $task_id);
    if ($status == 'Draft' OR $status == 'Created') {
        $result = updateEventSubtask($conn, 'event_subtasks', $data);
    }
}

if ($is_new) {
    $_SESSION['toastr'] = $notif->addFlash('success', 'Successfully created new task', 'Add Task');
} else{
    $_SESSION['toastr'] = $notif->addFlash('success', 'Task has been successfully edited', $code_series['code']);
}
    

// header('location:../../base_planner_subtasks.html.php?event_planner_id='.$event_id.'&username='.$_SESSION["username"].'&division='.$_SESSION["division"].'');


function checkConflictSched($conn, $data) {
    $person = $data['person']; 
    $date_from = $data['date_from']; 
    $date_to = $data['date_to']; 

    $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM event_subtasks where emp_id = $person AND date_from = '$date_from' AND date_to = '$date_to') THEN TRUE ELSE FALSE END";

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    return $result[0];
}

function findEmployee($conn,$table,$data) {
    $sql = "SELECT EMP_N as emp_n, FIRST_M as fname, MIDDLE_M as mname, LAST_M as lname FROM $table WHERE EMP_N = $data";

    $emp = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($emp);
    
    return $result;    
}

function fetchTaskStatus($conn,$table,$id) {
    $sql = "SELECT status FROM $table WHERE id = $id";

    $emp = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($emp);
    
    return $result['status'];    
}

function updateEventSubtask($conn,$table,$data) {
    $sql = "UPDATE ".$table." SET 
    title = '".$data['title']."', 
    emp_id = ".$data['emp_id'].", 
    date_from = '".$data['date_from']."', 
    date_to = '".$data['date_to']."'
    WHERE id = ".$data['task_id']."";

    $result = mysqli_query($conn, $sql);

    return $result;    
}

function insertEventSubtask($conn,$table,$data) {
    $sql = "INSERT INTO $table (event_id, title, emp_id, date_from, date_to, status, code, posted_by) 
            VALUES(".$data['event_id'].", '".$data['title']."', ".$data['emp_id'].", '".$data['date_from']."', '".$data['date_to']."', 'Draft', '".$data['code']."', ".$data['currentuser'].")";

    $result = mysqli_query($conn, $sql);

    return $result;    
}

function clearCollaborators($conn,$table,$id) {
    $sql = "DELETE FROM $table WHERE event_id = $id AND status = 'Draft'";

    $result = mysqli_query($conn, $sql);

    return $result;    
}
 

