<?php
session_start();
date_default_timezone_set('Asia/Manila');

require '../manager/TechnicalAssistanceManager.php';

$ta = new TechnicalAssistanceManager();
$today = new DateTime();
$view_ta = $ta->fetchTAinfo($_GET['cn']);
$count_rated = $ta->countRated();

$control_no     =   $_GET['cn'];
$service        =   $view_ta['service'];
$office         =   $view_ta['office'];
$action_officer =   $view_ta['assisted_by'];
$suggestion     =   $_GET['suggestion'];
$client         =   $view_ta['request_by'];
$contact_details =  $view_ta['contact_details'];
$completed_date =   $view_ta['completed_date'];
$rated_date     =   date('Y-m-d');

$service_dimention = ["Responsiveness","Reliability","Access & Facilities","Communication","Cost","Integrity","Assurance","Outcome"];
for($a=0;$a < count($_GET['rating']); $a++)
{
    $rating =  $_GET['rating'][$a];
    $sd = $service_dimention[$a];
    $ta->rateService($control_no,$sd,$rating);	
}
    $ta->insertCSSDetails($control_no,$service,$office,$action_officer,$suggestion,$client,$contact_details,$completed_date);	
    $ta->updateRequest($rated_date,$control_no);	
    $ta->updateMonitoring($count_rated['count']);	



