<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../manager/FlashMessage.php';
require_once '../manager/Entity.php';
require_once "../../connection.php";

    $event_id = isset($_POST['delete_event_id']) ? $_POST['delete_event_id'] : '';
    
    // call instance of class
    $flash = new FlashMessage();
    $entity = new Entity();

    // clear
    $participants = $entity->clear($conn, 'event_collaborators', 'event_id', $event_id);
    $event = $entity->clear($conn, 'events','id', $event_id);

    if (!$event) {
        $event = mysqli_error($conn);
        $flash->generateNew("A problem occured while submitting your data", "danger", "ban");
    } else {
        $flash->generateNew("Event has been deleted successfully", "success", "check");
    }

    header('location:../../base_menu.html.php?division='.$_SESSION['division']);


    

    