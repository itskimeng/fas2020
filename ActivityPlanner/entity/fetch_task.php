<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
require_once "../manager/Notification.php";
    
$id = $_GET['id'];
$result = fetchTask($id);
echo $result;

function fetchTask($id) {
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $data = [];

    $sql = "SELECT 
        id as task_id, 
        title as subtask, 
        DATE_FORMAT(date_from, '%Y-%m-%d %H:%i:%s') as date_start, 
        DATE_FORMAT(date_to, '%Y-%m-%d %H:%i:%s') as date_end, 
        code, external_link,
        emp_id as person
        FROM event_subtasks evs
        WHERE id = $id";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    return json_encode($data);  
}