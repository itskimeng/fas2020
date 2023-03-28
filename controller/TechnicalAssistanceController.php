<?php
session_start();
require 'conn.php';
require 'manager/TechnicalAssistanceManager.php';
$control_no = isset($_GET['id']) ? $_GET['id'] : '';
$covered_period =  isset($_GET['month']) ? $_GET['month'] : '';
$ta = new TechnicalAssistanceManager();

$data = $ta->fetchdata();
$type = $ta->getReqType();

$view_req = $ta->viewRequest($control_no);
$sub_request = $ta->getSubRequest();
$show_checklist = $ta->showRateForm($control_no);
$user_info = showUserInfo($conn, $_SESSION['username']);
$getControlNo= $ta->countCN();

// complete technical assistance
$view_ta = $ta->fetchTAinfo($control_no);
$details = webpostingDetails($conn,'');

$css_opts = $ta->fetchCSSQuestionaire();
$css_data = $ta->fetchClientChecklist($covered_period);

//PART 1. CLIENT DEMOGRAPHIC
$client_type_opts   = $ta->fetchRespondentPerClientType($covered_period);
$client_gender_opts = $ta->fetchRespondentPerGender($covered_period);
$client_age_opts    = $ta->fetchRespondentPerAge($covered_period); 

$client_cc_question = $ta->fetchCitizenClientQuestion($covered_period);
$service_dimension    = $ta->fetchServiceDimensionReport($covered_period);
$no_of_respondents = $ta->fetchTotalRespondents($covered_period);
$no_of_desire_respondents = $ta->fetchNoOfDesireRespondents($covered_period);


$_SESSION['toastr'] = $ta->addFlash('error', 'A problem occured while submitting your data', 'Error');







function showUserInfo($conn, $username)
{

    $sql = "SELECT EMP_N,FIRST_M,MIDDLE_M, LAST_M, MOBILEPHONE, EMAIL,DIVISION_N, DIVISION_M , POSITION_M FROM tblpersonneldivision 
        INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
        INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
        where tblemployeeinfo.UNAME  = '" . $username . "'";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    return $data;
}
function webpostingDetails($conn,$control_no)
{
    $sql = "SELECT CONTROL_NO, TYPE_REQ_DESC  from tbltechnical_assistance where CONTROL_NO =  '" . $control_no . "'";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    return $data;
    
}
