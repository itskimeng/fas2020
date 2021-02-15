<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../connection.php";

    $event_id = isset($_POST['delete_event_id']) ? $_POST['delete_event_id'] : '';

    // clear
    $participants = clear($conn, 'events_participants', 'event_id', $event_id);
    $event = clear($conn, 'events','id', $event_id);

    if (!$event) {
        $event = mysqli_error($conn);
        flashMessage("A problem occured while submitting your data", "danger", "ban");
    } else {

        flashMessage("Event has been deleted successfully", "success", "check");

    }

    header('location:../../base_menu.html.php?division='.$_SESSION['division']);




    function clear($conn,$table,$column,$id) {
        $sql = "DELETE FROM $table WHERE $column = $id";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function flashMessage($message="", $type="success") {
        $notification = [];

        $notification = [
            'message' => $message,
            'type' => $type,
            'icon' => $type == 'ban' ? 'ban' : 'check',
            'header' => $type == 'ban' ? 'Error' : 'Success'
        ];

        $_SESSION['alert'] = $notification;

        return 0;
    } 


    

    