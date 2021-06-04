<?php
session_start();

include '../conn.php';
$curuser = $_SESSION['currentuser'];
$sqlQuery = "SELECT postedby, FIRST_M,title, DATE(event_reminder) as 'date',start,end from events INNER JOIN tblemployeeinfo emp on events.postedby = emp.EMP_N where postedby = '$curuser' and  isSent = 1";
$result = mysqli_query($conn, $sqlQuery);
$now = date('Y-m-d');
// $list = array();
while ($row = mysqli_fetch_array($result)) {
    // $list[] =  $row['date'];
    echo json_encode( array("title" => $row['title'], "start" => $row['start'], "end" => $row['end']));
}
// $mylist = '[' . implode(',', $list) . ']';
// if (in_array($now,$list)){
//   }
//   else  {
// ]  }
?>