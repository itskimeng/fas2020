<?php 

    // require 'webposting/index.php';

function submitWebPosting($category)
{
    $requested_date = date('Y-m-d',strtotime($_POST['requested_date']));
    $requested_time = $_POST['requested_time'];
    $requested_by = $_POST['requested_by'];
    $office = $_POST['office'];
    $position = $_POST['position'];
    $mobile_no = $_POST['mobile_no'];
    $purpose = $_POST['purpose'];
    $attached_file = $_POST['attachment'];
    $control_no = $_POST['control_no'];
    include 'connection.php';
    $sql = "INSERT INTO `tblwebposting`
    (`ID`, `CONTROL_NO`, `REQUESTED_DATE`, `REQUESTED_TIME`, 
    `REQUESTED_BY`, `OFFICE`, `POSITION`, `MOBILE_NO`, `CATEGORY`, 
    `PURPOSE`, `ATTACHMENT`, `RECEIVED_DATE`, `RECEIVED_TIME`, 
    `POSTED_DATE`, `POSTED_TIME`, `POSTED_BY`, `REMARKS`, 
    `CONFIRMED_DATE`, `CONFIRMED_TIME`, `CONFIRMED_BY`, `IS_APPROVED`, `STATUS`) 
    VALUES (null, '$control_no','$requested_date','$requested_time','$requested_by','$office','$position','$mobile_no','$category','$purpose','$attached_file',
    '0000-00-00','',
    '0000-00-00','',
    '','',
    '0000-00-00','','',
    '0','For action')";

   

    if (mysqli_query($conn, $sql)) {
       
    } else {
    }
}
submitWebPosting($_POST['chk_category']);
    


?>