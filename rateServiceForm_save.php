<?php
include 'connection.php';
date_default_timezone_set('Asia/Manila');

$timeliness = $_GET['timeliness'];
$quality = $_GET['quality'];
$date_rated = date('Y-m-d');
$control_no = $_GET['cn'];

for($a=0;$a < count($_GET['rating']); $a++)
{
    $rating =  $_GET['rating'][$a];
    $sd =  $_GET['sd'][$a];
    $SQL_insert1 = "INSERT INTO `tblservice_dimension`(`ID`,`CONTROL_NO`, `SERVICE_DIMENTION`, `RATING_SCALE`) VALUES (null,'$control_no','$sd','$rating')";
    if (mysqli_query($conn, $SQL_insert1)) {
    } else {
    }
}

// =============================================
$sql_select = "SELECT * FROM `tbltechnical_assistance` WHERE CONTROL_NO = '$control_no' ";
$result = mysqli_query($conn, $sql_select);
while($row = mysqli_fetch_array($result))
{
    $office = $row['OFFICE'];
    $service = $row['TYPE_REQ'].' ('.$row['TYPE_REQ_DESC'].')';
    $action_officer = $row['ASSIST_BY'];
    $suggestion = $_GET['suggestion'];
    $client = $row['REQ_BY'];
    $contact_no = $row['CONTACT_NO'];
    $completed_date = $row['COMPLETED_DATE'];


    $SQL_insert2 = "INSERT INTO `tblcustomer_satisfaction_survey`
    (`ID`, `OFFICE`, `SERVICE_PROVIDED`, 
    `ACTION_OFFICER`, `SURVEY_MODE`,`SD_ID`, `SUGGESTION`, 
    `CLIENT`, `CONTACT_NO`, `DATE_ACCOMPLISHED`) 
    VALUES (null,'$office','$service','$action_officer','Electronics','$control_no','$suggestion','$client','$contact_no','$completed_date')";
        if (mysqli_query($conn, $SQL_insert2)) {
        } else {
        }

        echo $SQL_insert2;
}



// =============================================




$insert ="UPDATE `tbltechnical_assistance` SET `STATUS_REQUEST` = 'Rated', `DATE_RATED` = '$date_rated', `TIMELINESS` = '$timeliness', `QUALITY` = '$quality' WHERE `CONTROL_NO` = '".$_GET['cn']."'";
if (mysqli_query($conn, $insert)) {
} else {
}

$query = "SELECT * FROM `ta_monitoring` WHERE `STATUS_REQUEST` LIKE '%RATED%' ";

$result = mysqli_query($conn, $query);
$COUNT = '';
while($row = mysqli_fetch_array($result))
{
    $COUNT = $row['COUNT']+1;
}

$insert1 ="UPDATE `ta_monitoring` SET 
`COUNT` = '$COUNT'
 WHERE `ta_monitoring`.`ID` = 4";
if (mysqli_query($conn, $insert1)) {
} else {
}
?>