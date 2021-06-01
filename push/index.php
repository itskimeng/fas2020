
  <script src="function.js"></script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<?php
include '../conn.php';
$sqlQuery = "SELECT * FROM `events` where isSent = 1 LIMIT 1 ";
$result = mysqli_query($conn, $sqlQuery);
if (mysqli_num_rows($result) > 0) { 

echo '
<span id="seconds"></span>

<form action = "http://192.168.4.100:8080/send/" method= "GET" name="cartCheckout" id="submit" >';
 while ($row = mysqli_fetch_array($result)) {
        $data = '';
        $data .= 'This is a reminder that your activity is scheduled on  '.date('F d, Y',strtotime($row['start'])) . ' to ' .date('F d, Y',strtotime($row['start'])).'';
        $data .= 'entitled : "'.$row['title'].'"';
        $id = $row['id'];            
    }
    echo '
    <input type = "text" name = "id" id = "title_id"  value = '.$id.'>    

    <input type = "text" name = "pass" placeholder = "pass" value = "">
    <input type = "text" id = "number" name = "number" placeholder = "number" value = "09551003364">
    <textarea id = "data" name = "data" placeholder = "data" value = >'.$data.'</textarea>
    <input type = "hidden" name = "id">
    <input type = "hidden" name ="submit">
    <form>';
}else{

}
    
    
  
?>
