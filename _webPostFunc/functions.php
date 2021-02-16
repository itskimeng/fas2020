<?php
date_default_timezone_set('Asia/Manila');
function assign()
{
    include '../connection.php';
    $ict_staff = $_POST['ict_staff'];
    $control_no = $_POST['control_no'];
    $assign_date = date('Y-m-d');
    
    
    $insert ="UPDATE `tblwebposting` SET 
            `POSTED_BY` = '$ict_staff',
            `STATUS` = 'On-going',
            `ASSIGN_DATE` = '$assign_date'
            WHERE `CONTROL_NO` = '$control_no' ";
    
    if (mysqli_query($conn, $insert)) {
    } else {
    }
}
function received()
{
   include '../connection.php';
   $date_recieved = date('Y-m-d');
    $time =  date("h:i:sa");
    $time_recieved= date("H:i", strtotime($time));
    $id = $_POST['id'];

    $insert ="UPDATE `tblwebposting` SET 
    `STATUS` = 'Received',
    `RECEIVED_DATE` = '$date_recieved',
    `RECEIVED_TIME` = '$time_recieved'
     WHERE `CONTROL_NO` = '$id' ";
    if (mysqli_query($conn, $insert)) {
    } else {
    }

}


switch ($_POST['options']) {
    case 'assign':
        assign();
        break;
    case 'received':
        received();
        break;
    
    default:
        # code...
        break;
}
?>
