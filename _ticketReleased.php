<?php
session_start();
$complete_name = $_SESSION['complete_name'];
date_default_timezone_set("Asia/Manila");
include 'connection.php';
$id = $_POST['id'];
$option = $_POST['option'];
$date_recieved = date('Y-m-d');

$time =  date("h:i:sa");
$time_recieved= date("H:i", strtotime($time));




switch ($option) {
    case 'released':
        $query = "SELECT * FROM `ta_monitoring` 
        where `STATUS_REQUEST` = 'RECEIVED' ";

        $result = mysqli_query($conn, $query);
        $COUNT = '';
        while($row = mysqli_fetch_array($result))
        {
            $COUNT = $row['COUNT']+1;
        }

        $insert ="UPDATE `tbltechnical_assistance` SET 
        `STATUS_REQUEST` = 'Received',
        `START_DATE` = '$date_recieved',
        `START_TIME` = '$time_recieved'
         WHERE `CONTROL_NO` = '$id' ";
        if (mysqli_query($conn, $insert)) {
        } else {
        }


        // ============================================
        $insert1 ="UPDATE `ta_monitoring` SET 
        `COUNT` = '$COUNT'
         WHERE `STATUS_REQUEST` = 'RECEIVED' ";
        if (mysqli_query($conn, $insert1)) {
        } else {
        }
   
        break;
        echo $insert;
    case 'complete':
        $insert ="UPDATE `tbltechnical_assistance` SET 
        `STATUS_REQUEST` = 'Completed'
        WHERE `CONTROL_NO` = '$id' ";
        if (mysqli_query($conn, $insert)) {
        } else {
        }
            break;
    case 'update_complete':
        $insert ="UPDATE `tbltechnical_assistance` SET 
        `STATUS_REQUEST` = 'Rated'
        WHERE `CONTROL_NO` = '$id' ";
        if (mysqli_query($conn, $insert)) {
        } else {
        }
    break;
    
    default:
        # code...
        break;
}

?>