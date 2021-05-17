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
$person = $_GET['person'];
$timeline = $_GET['timeline'];

// timeline
$timeline = explode("-", $_GET['timeline']);
$date_from = strtotime($timeline[0]);
$date_from = date('Y-m-d H:i:s', $date_from);
$date_to = strtotime($timeline[1]);
$date_to = date('Y-m-d H:i:s', $date_to);

$has_conflict = checkConflictSched($conn, ['person'=>$person, 'date_from'=>$date_from, 'date_to'=>$date_to]);

echo $has_conflict;

function checkConflictSched($conn, $data) {
    $person = $data['person']; 
    $date_from = $data['date_from']; 
    $date_to = $data['date_to']; 

    // $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM event_subtasks where emp_id = $person AND date_from = '$date_from' AND date_to = '$date_to') THEN TRUE ELSE FALSE END";

    $sql = "SELECT CASE WHEN EXISTS (SELECT 1 FROM event_subtasks where emp_id = 3319 AND date_from = '$date_from' AND date_to = '$date_to') THEN TRUE ELSE FALSE END";

    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    return $result[0];
}