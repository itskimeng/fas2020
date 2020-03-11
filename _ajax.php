
<?php
session_start();
$con = mysqli_connect("localhost","root","", "db_dilg_pmis");



$return_arr = array();
$name = $_SESSION['username'];
if($name == 'fad')
{
    $query = "SELECT 
    * FROM `tbltechnical_assistance` WHERE `REQ_DATE` != '0000-00-00' ORDER BY `CONTROL_NO` ASC ";
    $result = mysqli_query($con,$query);
}else{
    $query = "SELECT 
    * FROM `tbltechnical_assistance` WHERE `OFFICE` LIKE  '%".$_SESSION['username']."%' ";
    $result = mysqli_query($con,$query);
}



while($row = mysqli_fetch_array($result)){
    $cn = $row['CONTROL_NO'];
    if($row['START_DATE'] == '0000-00-00' || $row['START_DATE'] == 'Jan 01, 1970')
    {
        $sd = '';
    }else{
    $sd = date('M d, Y',strtotime($row['START_DATE']));//date format

}
$rd = date('M d, Y',strtotime($row['REQ_DATE']));//date format
if($row['START_TIME'] == '')
{
    
$stI = '';
}else{
    $dd = $row['START_TIME'].' '.$row['START_DATE'];
    $stI =date('H:i a', strtotime($dd)); 
}
$d = $row['REQ_TIME'].' '.$row['REQ_DATE'];
$rtI =date('h:i a', strtotime($d));



    $rb = $row['REQ_BY'];
    $office=$row['OFFICE'];
    $issue=$row['ISSUE_PROBLEM'];
    $rt = $row['TYPE_REQ'];
    $ab = $row['ASSIST_BY'];
    $st = $row['START_TIME'];
    $cd = $row['COMPLETED_DATE'];
    $ct = $row['COMPLETED_TIME'];
    $to_time = strtotime("2020-03-02 9:00");
    $from_time = strtotime("2020-03-02 10:50:00");
    $stat = $row['STATUS'];
    $sr = $row['STATUS_REQUEST'];
    $action = $row['STATUS_REQUEST'];

    $_SESSION['status_request'] = $sr;
    // $rt = round(abs($to_time - $from_time) / 60,2). " minute";
if($sr == 'Submitted')
{
    $sr = '<span class="badge badge-pill" style = "background-color:red;">'.$sr.'</span>';
}else if($sr == 'For action')
{
    $sr = '<span class="badge badge-pill" style = "background-color:blue;">'.$sr.'</span>';
}else if($sr == 'Completed')
{
    $sr = '<span class="badge badge-pill" style = "background-color:green;">'.$sr.'</span>';
}
// =========================================================================================
if($action == 'Submitted')
{
    if($_SESSION['username'] == 'fad' || $_SESSION['username'] == 'FAD'){
        // <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "view" >&#xf06e;</i>
        $action = '<i id = "sweet-14" style = "font-size:20px;color:#2196F3;tex-align:center;" class=" fa fa-check-circle" aria-hidden="true"></i>&nbsp; ';
    }else{
        $action = '<i  title = "Dear User, your feedback is important to us!" id = "sweet-14" style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;&nbsp;<i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "edit">&#xf044;</i> <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "view" >&#xf06e;</i>';

    }
}else if($action == 'For action')
{
    if($_SESSION['username'] == 'fad' || $_SESSION['username'] == 'FAD'){
        // <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "edit">&#xf044;</i> 
        $action = '<i id = "sweet-14" style = "font-size:20px;color:#2196F3;tex-align:center;" class=" fa fa-check-circle" aria-hidden="true"></i>&nbsp; <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa fa-print" id = "view" ></i>';
    }else{
        $action = '<i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "view" >&#xf06e;</i>';
    }
}else if($action == 'Completed')
{
    $action = ' <i id = "sweet-14" style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;&nbsp;<i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa" id = "edit">&#xf044;</i> <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa fa-print" id = "view" ></i>';
}












// $rd = date('M d, Y',strtotime($row['REQ_DATE']));//date format
// $d = $row['REQ_TIME'].' '.$row['REQ_DATE'];
// $rtI =date('h:i a', strtotime($d));

// $sd = date('M d, Y',strtotime($row['START_TIME']));//date format
// $dd = $row['START_TIME'].' '.$row['START_DATE'];
// $stI =date('h:i a', strtotime($dd));


    $return_arr[] = array(
                    "CONTROL_NO" => $cn,
                    "REQ_DATE"   => $sd,
                    "REQ_TIME"   => $stI,
                    "START_DATE"   => $rd,
                    "START_TIME"   => $rtI,
                    "REQ_BY"     => $rb,
                    "OFFICE"     => $office,
                    "ISSUE_PROBLEM"=>$issue,
                    "TYPE_REQ_DESC"=>$rt,
                    "ASSIGNED_PERSON"=>$ab,
                    "STATUS_REQUEST"=>$sr,
                    "BUTTON" =>$action
                    );
}

// Encoding array in JSON format
echo json_encode($return_arr);