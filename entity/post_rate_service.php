<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../manager/TechnicalAssistanceManager.php';

$ta = new TechnicalAssistanceManager();
//1. INSERT DATA FROM CLIENT TO THE DATABASE
$control_no     = $_POST['id'];
$user_id        = $_POST['cform-client_id'];
$client_type    = $_POST['cform-client_type'];
$age            = $_POST['cform-age'];
$gender         = $_POST['cform-gender'];
$region         = $_POST['cform-region'];
$suggestion     = $_POST['cform-suggestion'];
$datereceived   = date('y-m-d',strtotime($_POST['cform-date-received']));
$datereleased   = $ta->getDateCompleted($control_no);

$cc1            = $_POST['cform-cc1'];
$cc2            = $_POST['cform-cc2'];
$cc3            = $_POST['cform-cc3'];

$numbers = array();

// Generate 9 random numbers between 1 and 100 and push them into the array
for ($i = 0; $i < count($_POST['rating']); $i++) {
    array_push($numbers, $_POST['rating'][$i]);
}
list($num1, $num2, $num3, $num4, $num5, $num6, $num7, $num8, $num9) = $numbers;

 $ta->insert(
    'tbl_css_client_info',
    [
        'ID'            => NULL,
        'EMP_ID'        => $user_id,
        'CLIENT_TYPE'   => $client_type,
        'AGE'           => $age,
        'GENDER'        => $gender,
        'REGION'        => $region,
        'DATE_CREATED'  => date('y-m-d h:i:s')
    ]
);

//2. INSERT CLIENT CHECKLIST TO THE DATABASE
$ta->insert(
    'tbl_css_cliententry',
    [
        'ID'         => NULL,
        'TA_ID'      => $control_no,
        'EMP_ID'     => $user_id,
        'CC1'        => $cc1,
        'CC2'        => $cc2,
        'CC3'        => $cc3,
        'SQD0'       => $num1,
        'SQD1'       => $num2,       
        'SQD2'       => $num3,
        'SQD3'       => $num4,
        'SQD4'       => $num5,
        'SQD5'       => $num6,
        'SQD6'       => $num7,
        'SQD7'       => $num8,
        'SQD8'       => $num9,
        'SUGGESTIONS'=> $suggestion,
        'DATE_RELEASED'  => $datereleased['date_released'],
        'DATE_RECEIVED'  => $datereceived
    ]
);

//3. UPDATE ICT TA CONTROL NO
$ta->update('tbltechnical_assistance',
[
    'STATUS' => 'rated',
    'STATUS_REQUEST' => 'rated',
    'DATE_RATED' => date('Y-m-d')
],
    
    
    "id='$control_no'");







































//  CSS INSERTING CODE 03/09/2023
// $today = new DateTime();
// $view_ta = $ta->fetchTAinfo($_GET['cn']);
// $count_rated = $ta->countRated();

// $control_no     =   $_GET['cn'];
// $service        =   $view_ta['service'];
// $office         =   $view_ta['office'];
// $action_officer =   $view_ta['assisted_by'];
// $suggestion     =   $_GET['suggestion'];
// $client         =   $view_ta['request_by'];
// $contact_details =  $view_ta['contact_details'];
// $completed_date =   $view_ta['completed_date'];
// $rated_date     =   date('Y-m-d');

// $service_dimention = ["Responsiveness","Reliability","Access & Facilities","Communication","Cost","Integrity","Assurance","Outcome"];
// for($a=0;$a < count($_GET['rating']); $a++)
// {
//     $rating =  $_GET['rating'][$a];
//     $sd = $service_dimention[$a];
//     $ta->rateService($control_no,$sd,$rating);	
// }
//     $ta->insertCSSDetails($control_no,$service,$office,$action_officer,$suggestion,$client,$contact_details,$completed_date);	
//     $ta->updateRequest($rated_date,$control_no);	
//     $ta->updateMonitoring($count_rated['count']);	
