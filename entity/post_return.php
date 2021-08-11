<?php 

if($_POST['burs'] == 'burs')
{
    $id = $_POST['burs_id'];
    $reason = $_POST['reason'];
    $division = $_GET['division'];
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $decline_stat = mysqli_query($conn,"UPDATE `saroobburs` SET `datereturned`=now(), reason='$reason' WHERE id = '$id' ");
    echo "UPDATE `saroobburs` SET `datereturned`=now(), reason='$reason' WHERE id = '$id' ";
}else{
    $id = $_POST['ors_id'];
    $reason = $_POST['reason'];
    $division = $_GET['division'];
    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $decline_stat = mysqli_query($conn,"UPDATE `saroob` SET `datereturned`=now(), reason='$reason' WHERE id = '$id' ");
}
?>

<script>
    window.alert('Successfully Return!');
    window.location.href='../obligation.php?division=<?php echo $division; ?>';
    </script>