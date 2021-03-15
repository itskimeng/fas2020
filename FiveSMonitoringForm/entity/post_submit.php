<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once '../../ActivityPlanner/manager/FlashMessage.php';
require_once '../manager/FiveSEmployee.php';
require_once "../../connection.php";

if (isset($_POST['submit'])) {
    
    $username = $_SESSION['username'];
    $userid = $_SESSION['currentuser'];
    $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    
    $flash = new FlashMessage();
    $fives = new FiveSEmployee();
    $today = new DateTime();

    $is_new = false;
    $fives->submit($conn, ['id'=>$pid, 'comments'=>$comment, 'date_submitted'=>$today->format('Y-m-d H:i:s')]); 
    $parent = $pid;
    
    $flash->generateNew("Data has been submitted successfully. Happy Weekends!!!", "success", "check");
} 

    header('location:../../base_fives_monitoring_form.html.php?username='.$_SESSION['username'].'&division='.$_SESSION['division']);

    function getScores($text) {
        $score = 0;
        switch ($text) {
            case 'one':
                $score = 1;
                break;
            case 'two':
                $score = 2;
                break;
            case 'three':
                $score = 3;
                break;
            case 'four':
                $score = 4;
                break;    
            case 'five':
                $score = 5;
                break;
        }

        return $score;
    }

    

