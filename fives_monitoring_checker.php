<?php
session_start();
date_default_timezone_set('Asia/Manila');
$userid = $_SESSION['currentuser'];
    
$has_data = fetchCurrentUserData($userid);
$is_friday = isFriday();

$show_confirmationmsg = false;
$button_enabled = false;

if ($is_friday AND !$has_data) {
    $button_enabled = true;
} elseif ($is_friday AND $has_data) {
    $button_enabled = true;
    $show_confirmationmsg = true;
}



function isFriday() {
    $today = new DateTime();
    $today = $today->format('D');
    
    $checker = false;
    if ($today == 'Fri') {
        $checker = true;
    }

    return $checker;    
}

function fetchCurrentUserData($id) {
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $data = true;
    $today = new DateTime();
    $today_from = $today->format('Y-m-d 00:00:00');
    $today_to = $today->format('Y-m-d 23:59:59');
    
    $sql = "SELECT * FROM fives_employees WHERE emp_id = $id AND date_submitted >= '".$today_from."' AND date_submitted <= '".$today_to."'";

    $query = mysqli_query($conn, $sql); 
    $data = $query->num_rows;

    if ($data == 0) {
        $data = false;
    }

    return $data;   
}