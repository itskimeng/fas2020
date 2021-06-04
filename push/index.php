<?php
date_default_timezone_set('Asia/Manila');
include '../conn.php';

$date = date('Y-m-d', time());

  
$sqlQuery = "SELECT * FROM `events` inner join tblemployeeinfo emp on events.postedby = emp.EMP_N where isSent = 1 and DATE(event_reminder) = '$date' LIMIT 1";
$result = mysqli_query($conn, $sqlQuery);
if (mysqli_num_rows($result) > 0) { 
    function dateDifference($start_date, $end_date)
    {
        // calulating the difference in timestamps 
        $diff = strtotime($start_date) - strtotime($end_date);
         
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }
   
     
   
    
echo '
<span id="seconds"></span>
<form action = "http://192.168.4.100:8080/send/" method= "GET" name="cartCheckout" id="submit" >';
 while ($row = mysqli_fetch_array($result)) {
    //  $start =date('Y-m-d',strtotime($row['start']));
     $notif =date('Y-m-d',strtotime($row['event_reminder']));
    //  $dateDiff = dateDifference($start,$notif);
    $data = '';
        $data .= 'Reminder from DILG IV-A:'."\n".'Hi '.$row['FIRST_M'].'! You have an upcoming activity';
        $data .= ' entitled: "'.$row['title'].'" on '.date('F d',strtotime($row['start'])) . ' to ' .date('F d, Y',strtotime($row['end'])).'';
        $id = $row['id'];            
        $phone_no = $row['MOBILEPHONE'];            
    }
     
    echo '
    <input type = "hidden" name = "id" id = "title_id"  value = '.$id.'>    

    <input type = "hidden" name = "pass" placeholder = "pass" value = "">
    <input type = "hidden" id = "number" name = "number" placeholder = "number" value = '.str_replace('-','',$phone_no).'>
    <textarea style = "display:none;" id = "data" name = "data" placeholder = "data" value = >'.$data.'</textarea>
    <input type = "hidden" name = "id">
    <input type = "hidden" id="dateSet" value = '.$notif.'>
    <input type = "hidden" name ="submit">
    <form>';
}else{

}
    
    
  
?>

<!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
 
 <script src="push/function.js"></script>
