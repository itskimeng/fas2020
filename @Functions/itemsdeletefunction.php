
<?php
include('../@classes/db.php');

$servername = "localhost";
<<<<<<< HEAD
$username = "root";
$password = "";
=======
$username = "fascalab_2020";
$password = "7one@2019";
>>>>>>> 4e4db213f2d3f876f69b63e7348f6cddcffbe68c
$database = "fascalab_2020";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

//Get Data
$getid = $_GET['getid'];


// Perform queries

$do = "DELETE FROM item_list where id = ".$getid."";
$query = mysqli_query($conn,$do);



mysqli_close($conn);

if($query){

//if query is successful
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Data Deleted Successfully!')
window.location.href='../@items.php?message=Data Deleted Successfully!';
</SCRIPT>"); 



}
else{

//if query has error
echo ("<SCRIPT LANGUAGE='JavaScript'>

window.alert('Error!')
window.location.href='../@items.php?message=Error!';
</SCRIPT>");
}



?>
