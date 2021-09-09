<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    $task_id = $_GET['task_id'];
    $data = fetchComment($conn, $task_id);

    echo $data;

    function fetchComment($conn, $id) {
        $user = $_SESSION['currentuser'];

        $data = [];
        $sql = "SELECT esc.remarks, DATE_FORMAT(esc.posted_date, '%M %d, %Y %h:%i %p') as posted_date, CONCAT(emp.FIRST_M, '. ', emp.MIDDLE_M, ' ', emp.LAST_M) as posted_by, emp.profile as profile, emp.EMP_N as postby_id
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

            if (strpos($row['profile'], '.png') || strpos($row['profile'], '.jpg') || strpos($row['profile'], '.jpeg') ||  strpos($row['profile'], '.JPG')) {
                $profile = $row['profile']; 
            }

            $data[] = [
                'remarks' => $row['remarks'],
                'posted_date' => $row['posted_date'],
                'posted_by' => $is_currentuser ? 'ME' : $row['posted_by'],
                'profile' => $profile,
                'is_currentuser' => $is_currentuser
            ];
        };

        return json_encode($data);
    }
