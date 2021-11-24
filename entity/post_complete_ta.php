<?php
include '../connection.php';
date_default_timezone_set("Asia/Manila");
$started_date =  date("Y-m-d");
 $date = $_POST['completed_date'];
 $date1 = strtotime($date);
 $completed_time = date('H:i:s', $date1);

// $requested_date = date("Y-m-d",strtotime($_POST['requested_date']));
$completed_date =  date("Y-m-d",strtotime($_POST['completed_date']));
// $status = $_POST['status'];
$STATUS_DESC = $_POST['STATUS_DESC'];
// $request_time = $_POST['request_time'];
if (strstr(date('h:m:s A'), 'PM' ) ) {
    $a = str_replace("PM","",$completed_time);
    $started_time  = date("H:i",strtotime($started_date." ".$completed_time));


}else{
    $a = str_replace("AM","",date('h:m:s A'));
    $started_time  = date("H:i");

}
if (strstr($completed_time, 'PM' ) ) {
    $b = str_replace("PM","",$completed_time);
    $completed_time  = date("H:i",strtotime($started_date." ".$completed_time));
}else{
    $b = str_replace("AM","",$completed_time);
    $completed_time  = date("H:i",strtotime($started_date." ".$completed_time));
}
echo $completed_time;
// $COM = $_POST['isComplete'];
// ==
// if(strstr($_POST['requested_time'],'PM'))
// {
//     $c = str_replace("PM","",$_POST['requested_time']);
//     $requested_time  = date("H:i",strtotime($c));
// }else{
//     $c = str_replace("AM","",$_POST['requested_time']);
//     $requested_time  = date("H:i",strtotime($c));

// }
$insert ="UPDATE `tbltechnical_assistance` SET 
`STATUS_DESC` = '".$STATUS_DESC."',
`COMPLETED_DATE`= '".$completed_date."',
`COMPLETED_TIME`= '".$completed_time."',
`STATUS_REQUEST`='Completed',
`STATUS` = '1'
WHERE `CONTROL_NO` = '".$_POST['control_no']."'";

if (mysqli_query($conn, $insert)) {
} else {
}
?>
