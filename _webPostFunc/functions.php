<?php

use function Composer\Autoload\includeFile;

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
function accomplished()
{
    include '../connection.php';

  $received_date = date('Y-m-d',strtotime($_POST['received_date']));
  $receved_time = $_POST['received_time'];
  $posted_date = date('Y-m-d', strtotime($_POST['posted_date']));
  $posted_time = $_POST['posted_time'];
  $posted_by = $_POST['posted_by'];
  $remarks = $_POST['remarks'];
  $control_no = $_POST['control_no'];

  $update =" UPDATE `tblwebposting` SET
  `RECEIVED_DATE`='$received_date',
  `RECEIVED_TIME`='$receved_time',
  `POSTED_DATE`='$posted_date',
  `POSTED_TIME`='$posted_time',
  `POSTED_BY`='$posted_by',
  `REMARKS`='$remarks',
  `STATUS`='Completed'  WHERE `CONTROL_NO` = '$control_no'";
  if (mysqli_query($conn, $update)) {
  } else {
  }
 
}
function approved(){

    include ('../connection.php');
    $confirmed_date = $_POST['confirmed_date'];
    $confirmed_dateFormat = new DateTime($confirmed_date);
    $c_date = $confirmed_dateFormat->format('Y-m-d');  

    $confirmed_time = $_POST['confirmed_time'];
    $confirmed_by   = $_POST['confirmed_by'];
    $approved_by = $_POST['section_chief'];
    $control_no = $_POST['control_no'];
    $update =" UPDATE `tblwebposting` SET
  `CONFIRMED_DATE`='$c_date',
  `CONFIRMED_TIME`='$confirmed_time ',
  `CONFIRMED_BY`='$confirmed_by',
  `APPROVED_BY`='$approved_by',
  `STATUS`='Approved'  WHERE `CONTROL_NO` = '$control_no'";
  echo $update;
  if (mysqli_query($conn, $update)) {
  } else {
  }
}
function counter($options)
{
    include ('../connection.php');
    $query = "SELECT count(*) as 'count', `STATUS` FROM web_monitoring WHERE STATUS  = '$options'";
    
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        $count = $row['count'];
        $count1 = $row['count']+1;
        $stat = $row['STATUS'];
    
        if($count == 1)
        {
            $update =" UPDATE `web_monitoring` SET 
            `COUNT`='$count' WHERE `STATUS` = '$stat' ";
            if (mysqli_query($conn, $update)) { } else { }
        }else{
            $update =" UPDATE `web_monitoring` SET 
            `COUNT`='$count1' WHERE `STATUS` = '$stat' ";
            if (mysqli_query($conn, $update)) { } else { }
        }
    
    }

}

switch ($_POST['options']) {
    case 'assign':
        assign();
        counter($_POST['options']);
        break;
    case 'received':
        received();
        counter($_POST['options']);
        break;
    case 'accomplished':
        accomplished();
        counter($_POST['options']);

        break;
    case 'approval':
        approved();
        counter($_POST['options']);

        break;
    
    default:
        # code...
        break;
}
?>
