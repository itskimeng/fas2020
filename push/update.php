<?php
include '../conn.php';
$id = $_POST['id'];
 $sql = "UPDATE `events` SET `isSent`='0' WHERE id = '$id'"; 
 echo "UPDATE `events` SET `isSent`='0' WHERE id = '$id'";
 $result = mysqli_query($conn, $sql);
 
 if (! $result) {
     $result = mysqli_error($conn);
 }
?>