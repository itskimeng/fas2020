<?php
date_default_timezone_set('Asia/Manila');

include 'connection.php';
$ict_staff = $_POST['ict_staff'];
$control_no = $_POST['control_no'];
$assign_date = date('Y-m-d');


$insert ="UPDATE `tbltechnical_assistance` SET 
        `ASSIST_BY` = '$ict_staff',
        `STATUS` = 'ongoing',
        `ASSIGN_DATE` = '".date('Y-m-d')."'
        WHERE `CONTROL_NO` = '$control_no' ";
        echo $insert;

if (mysqli_query($conn, $insert)) {
} else {
}
?>