<?php
require 'conn.php';
require 'manager/TechnicalAssistanceManager.php';
$control_no = isset($_GET['id']) ? $_GET['id'] : '';
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
