<?php
session_start();
date_default_timezone_set ('Asia/Manila');

$division = $_SESSION['division'];
$username = $_SESSION['username'];
$timeliness = $_POST['timeline'];

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../PHPJasperXML.inc.php");

// $request_date =  date("M d, Y",strtotime($_POST['request_date']));
// $request_date1 = $_POST['request_date'];
$req_date_format = date("Y-m-d");

$office = $_POST['office'];

// $position = $_POST['position'];
$contact_no = $_POST['contact_no'];
// $email_address = $_POST['email_address'];
$req_type_category = $_POST['req_type_category'];

// $request_time = $_POST['request_time'];
if (strstr($_POST['request_time'], 'PM' ) ) {
    $a = str_replace("PM","",$_POST['request_time']);
    $request_time =  date("H:i", strtotime($_POST['request_time']));

}else{
    $a = str_replace("AM","",$_POST['request_time']);
    $request_time  = date("H:i",strtotime($_POST['request_time']));
}


if(isset($_POST['req_type_subcategory']))
{
    $req_type_subcategory = $_POST['req_type_subcategory'];

}else{
    $req_type_subcategory = '';

}




// $txt1 = $_POST['text1'];
// $txt2 = $_POST['text2'];
// $txt3 = $_POST['text3'];
// $txt4 = $_POST['text4'];
// $txt5 = $_POST['text5'];
// $txt6 = $_POST['text6'];




$control_no = $_POST['control_no'];
$assisted_by ='';

$equipment_type = $_POST['equipment_type'];
$brand_model = $_POST['brand_model'];
$property_no = $_POST['property_no'];
$serial_no = $_POST['serial_no'];
// $ip_address = $_POST['ip_address'];
// $mac_address = $_POST['mac_address'];
$issue = $_POST['issue'];




$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

              if(mysqli_connect_errno()){echo mysqli_connect_error();}  
             $currentuser = $_POST['requested_by'];


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
for($i = 0; $i < count($_POST['req_type_category']); $i++)
{
    
    
    $type_req = $_POST['req_type_category'][$i];
    $type_subreq = $_POST['req_type_subcategory'][$i];
    // $txt1 = $_POST['text1'][$i];


    if($type_req == 'OTHERS')
    {
        $type_subreq = 'OTHERS';
    }else if($type_req == 'POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE')
    {
        $type_subreq = $_POST['posting_details'];
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
               '',
               '',
               '',
               '',
               '',
               '',
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
?>

<?php 
       if($username == 'jamonteiro' || $username == 'magonzales' || $username == 'rlsegunial'){
           ?>

<script>

   window.location = '../../techassistance.php?division=<?php echo $_POST['division'];?>';
</script>
<?php
       }
else{
   if ($username == 'charlesodi' || $username == 'itdummy1' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'cvferrer' || $username == 'seolivar') {

     ?>
<script>
   window.location = '../../processing.php?division=<?php echo $_POST['division'];?>&ticket_id=';
</script>
<?php
   }else{
    ?>

<script>

   window.location = '../../techassistance.php?division=<?php echo $_POST['division'];?>';
</script>
<?php
   }
}
}
?>



