<?php 
<<<<<<< HEAD
$conn = mysqli_connect("localhost","root","","fascalab_2020");
=======
$conn = mysqli_connect("localhost","fascalab_2020","7one@2019","fascalab_2020");
>>>>>>> 4e4db213f2d3f876f69b63e7348f6cddcffbe68c
$id = $_GET['id'];

$sel = mysqli_query($conn,"SELECT * FROM rfq WHERE id = '$id' ");
$rowdel = mysqli_fetch_array($sel);
$rfqID = $rowdel['id'];

$items = mysqli_query($conn,"DELETE FROM rfq_items WHERE rfq_id = '$rfqID' ");
$sitems = mysqli_query($conn,"SELECT * FROM rfq_items WHERE rfq_id = '$rfqID' ");
if (mysqli_num_rows($sitems) <= 0 ) {
$del = mysqli_query($conn,"DELETE FROM rfq WHERE id = '$id' ");
}
if ($items) {
$del = mysqli_query($conn,"DELETE FROM rfq WHERE id = '$id' ");
if ($del) {
	  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfuly Deleted!')
    window.location.href = 'ViewRFQ.php';
    </SCRIPT>");
}else{
	 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfuly Deleted!')
    window.location.href = 'ViewRFQ.php';
    </SCRIPT>");
}

}else{
	//do nothing
}

	 // header('location: ViewRFQ.php ');
	 // header('location: ViewRFQdetails.php?pr_no='.$pr_no.'&pr_date='.$pr_date.'&pmo='.$pmo.'&purpose='.$purpose.' ');
?>