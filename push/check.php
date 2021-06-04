<?php
date_default_timezone_set('Asia/Manila');
include '../conn.php';

$date = date('Y-m-d', time());
$sqlQuery = "SELECT DATE(event_reminder) as 'date' from events where DATE(event_reminder)  = '$date' and  isSent = 1";
$result = mysqli_query($conn, $sqlQuery);
while ($row = mysqli_fetch_array($result)) {
    echo json_encode( array("date" => $row['date']));
}

?>