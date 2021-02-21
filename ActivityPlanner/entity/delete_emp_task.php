<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";
    
    $id = $_GET['id'];

    $result = removeCollaborator($conn, 'event_subtasks', $id);

    echo $result;

    function removeCollaborator($conn,$table, $id) {
        $sql = "DELETE FROM $table WHERE id = $id";
        
        $result = mysqli_query($conn, $sql);

        return $result;    
    }
