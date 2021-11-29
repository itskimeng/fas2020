<?php
session_start();
date_default_timezone_set ('Asia/Manila');

$division = $_SESSION['division'];
$username = $_SESSION['username'];
$timeliness = $_GET['timeline']; 

$req_date_format = date("Y-m-d");

$office = $_GET['office'];

$contact_no = $_GET['contact_no'];
// $email_address = $_GET['email_address'];
$req_type_category = $_GET['req_type_category'];

// $request_time = $_GET['request_time'];
if (strstr($_GET['request_time'], 'PM' ) ) {
    $a = str_replace("PM","",$_GET['request_time']);
    $request_time =  date("H:i", strtotime($_GET['request_time']));

}else{
    $a = str_replace("AM","",$_GET['request_time']);
    $request_time  = date("H:i",strtotime($_GET['request_time']));
}

if(isset($_GET['req_type_subcategory']))
{
    $req_type_subcategory = $_GET['req_type_subcategory'];

}else{
    $req_type_subcategory = '';

}




$txt1 = $_GET['text1'];
$txt2 = $_GET['text2'];
$txt3 = $_GET['text3'];
$txt4 = $_GET['text4'];
$txt5 = $_GET['text5'];
$txt6 = $_GET['text6'];




$control_no = $_GET['control_no'];
$assisted_by ='';

$equipment_type = $_GET['equipment_type'];
$brand_model = $_GET['brand_model'];
$property_no = $_GET['property_no'];
$serial_no = $_GET['serial_no'];
// $ip_address = $_GET['ip_address'];
// $mac_address = $_GET['mac_address'];
$issue = $_GET['issue'];




$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

              if(mysqli_connect_errno()){echo mysqli_connect_error();}  
             $currentuser = $_GET['requested_by'];


              $query = "SELECT * FROM tblemployeeinfo where EMP_N = $currentuser";
              $name = '';
              $result = mysqli_query($conn, $query);
              $val = array();
              while($row = mysqli_fetch_array($result))
              {
                $name = $row['FIRST_M'].' '.$row['LAST_M'];
              }



// $PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
for($i = 0; $i < count($_GET['req_type_category']); $i++)
{
    
    
    $type_req = $_GET['req_type_category'][$i];
    $type_subreq = $_GET['req_type_subcategory'][$i];
    // $txt1 = $_GET['text1'][$i];


    if($type_req == 'OTHERS')
    {
        $type_subreq = 'OTHERS';
    }else if($type_req == 'POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE')
    {
        $type_subreq = $_GET['posting_details'];
    }
    
     $sql_insert ="INSERT INTO `tbltechnical_assistance`(
               `ID`, 
               `CONTROL_NO`, 
               `REQ_DATE`, 
               `REQ_TIME`, 
               `REQ_BY`, 
               `OFFICE`, 
               `POSITION`, 
               `CONTACT_NO`, 
               `EMAIL_ADD`, 
               `EQUIPMENT_TYPE`, 
               `BRAND_MODEL`, 
               `PROPERTY_NO`, 
               `SERIAL_NO`, 
               `IP_ADDRESS`,
               `MAC_ADDRESS`, 
               `TYPE_REQ`,
               `TYPE_REQ_DESC`,
               `TEXT1`,
               `TEXT2`,
               `TEXT3`,
               `TEXT4`,
               `TEXT9`,
               `TEXT5`,
               `TEXT6`,
               `TEXT7`,
               `TEXT8`,
               `ISSUE_PROBLEM`, 
               `START_DATE`,
               `START_TIME`, 
               `STATUS_DESC`,
               `COMPLETED_DATE`, 
               `COMPLETED_TIME`, 
               `ASSIST_BY`,
               `PERSON_ASSISTED`, 
               `TIMELINESS`, 
               `QUALITY`, 
               `STATUS`,
               `STATUS_REQUEST`)
               VALUES (null,
               '$control_no',
               '$req_date_format',
               '$request_time',
               '$name',
               '$office',
               '',
               '$contact_no',
               '',
               '$equipment_type',
               '$brand_model',
               '$property_no',
               '$serial_no',
               '',
               '',
               '$type_req',
               '$type_subreq',
               '$txt1',
               '$txt2',
               '$txt3',
               '$txt4',
               '$txt5',
               '$txt6',
               '',
               '',
               '',
               '$issue',
               null,
               null,
               null,
               null,
               null,
               '$assisted_by',
               '',
               '$timeliness',
               '',
               null,
               'Submitted'
               )";
               echo $sql_insert;

if (mysqli_query($conn, $sql_insert)) {
} else {
}


}
?>



