<?php 
$id = $_GET['id'];
$conn = mysqli_connect("localhost","fascalab_2020","7one@2019","fascalab_2020");
$delete = mysqli_query($conn,"DELETE FROM rpci WHERE id = '$id' ");
if ($delete) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Deleted!')
      window.location.href = 'ViewRPCI.php';
      </SCRIPT>");
}else{
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Error Occured!');
      </SCRIPT>");
}
?>