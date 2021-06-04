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
        emp_id as emp_id
        FROM event_subtasks evs
        WHERE id = $id";

    $query = mysqli_query($conn, $sql);
    // $data = mysqli_fetch_array($query);

    while ($row = mysqli_fetch_assoc($query)) {
        
        $persons = json_decode($row['emp_id'], true);
        $collaborators = fetchEmployee($conn, $persons);

        $data = [
            'code'          => $row['code'],
            'task_id'       => $row['task_id'],
            'subtask'       => $row['subtask'],
            'date_start'    => $row['date_start'],
            'date_end'      => $row['date_end'],
            'external_link' => $row['external_link'],
            'collaborators' => $collaborators
        ];  
    }

    return json_encode($data);  
}

function fetchEmployee($conn, $data) {
    $dd = [];

    if (is_array($data)) {
        foreach ($data as $key => $id) {
            $dd[] = $id;
        }
    } else {
        $dd[] = $data;
    }

    return json_encode($dd);
}