<?php 

if(isset($_POST['ors_id']))
{
   
    $id = $_POST['ors_id'];
    $reason = $_POST['reason'];
    $division = $_GET['division'];
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $decline_stat = mysqli_query($conn,"UPDATE `saroob` SET `datereturned`=now(), reason='$reason', status='RETURN' WHERE id = '$id' "); 
    header('Location:../obligation.php?page=1&ipp=10&division='.$division.'');
}else{
    $id = $_POST['burs_id'];
    $reason = $_POST['reason'];
    $division = $_GET['division'];
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $decline_stat = mysqli_query($conn,"UPDATE `saroobburs` SET `datereturned`=now(), reason='$reason', status = 'RETURN' WHERE id = '$id' ");

    echo "UPDATE `saroobburs` SET `datereturned`=now(), reason='$reason' WHERE id = '$id' ";
    header('Location:../ObligationBURS.php?page=1&ipp=10&division='.$division.'');

}
?>

