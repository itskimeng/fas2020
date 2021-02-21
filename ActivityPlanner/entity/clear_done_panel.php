<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    $currentuser = $_SESSION['currentuser']; 

    updateSubtask($conn, 'event_subtasks', $currentuser);
    updateNotif($conn, 'event_notif', $currentuser);


    function updateSubtask($conn,$table,$user) {
        $sql = "UPDATE $table SET is_read = TRUE WHERE emp_id = $user AND status = 'Done' AND is_read = FALSE";
        $result = mysqli_query($conn, $sql);

        return $result;    
    }   

    function updateNotif($conn,$table,$user) {
        $sql = "UPDATE $table SET is_read = TRUE WHERE receiver = $user AND status = 'Done' AND is_read = FALSE";
        $result = mysqli_query($conn, $sql);
        
        return $result;    
    }   

