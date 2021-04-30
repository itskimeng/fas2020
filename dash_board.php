<?php
date_default_timezone_set('Asia/Manila');
$username = $_SESSION['username'];

$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$location = $details->city;

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $posted_by = $_POST['posted_by'];
  $date = $_POST['date'];

  $get_dv = mysqli_query($conn,"SELECT DIVISION_C FROM tblemployeeinfo WHERE UNAME = '$posted_by'");
  $rowdv = mysqli_fetch_array($get_dv);
  $rDIVISION_C = $rowdv['DIVISION_C'];

  $div = mysqli_query($conn,"SELECT DIVISION_M FROM tblpersonneldivision WHERE DIVISION_N = '$rDIVISION_C'");
  $rowdiv = mysqli_fetch_array($div);
  $rDIVISION_M = $rowdiv['DIVISION_M']; 


  $insert = mysqli_query($conn,"INSERT INTO announcementt(posted_by, division, title, content, date) VALUES('$posted_by','$rDIVISION_M','$title','$content','$date')");
  if ($insert) {
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Successfuly Saved!')
    window.location.href = 'home.php?division=$division';
    </SCRIPT>");
 }

}

if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $posted_by = $_POST['posted_by'];
  $date = $_POST['date'];
  $idC = $_POST['idC'];

  $update = mysqli_query($conn,"UPDATE announcementt SET title = '$title' , content = '$content' WHERE id = $idC ");
  if ($update) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Updated!')
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }

}

?>

<?php
$date_now = date('Y-m-d');
$now_date = date('Y-m-d H:i:s');


  include 'connection.php';
        
  $logs = "SELECT * FROM dtr WHERE UNAME = '$username' AND `date_today` LIKE '%$date_now%'";
        $result = mysqli_query($conn, $logs);
        if(mysqli_num_rows($result) > 0)    
        {
          if($rowl= mysqli_fetch_array($result))
          {
            $time_inL = $rowl['time_in'];
            $lunch_inL = $rowl['lunch_in'];
            $lunch_outL = $rowl['lunch_out'];
            $time_outL = $rowl['time_out'];
            $t1 = $rowl['t1'];
            $l1 = $rowl['l1'];
            $l2 = $rowl['l2'];
            $t2 = $rowl['t2'];
            $t_o = $rowl['t_o'];
            $o_b = $rowl['o_b'];

          }

        }
// date_default_timezone_set('Asia/Manila');
$time_now = (new DateTime('now'))->format('H:i');
$newtime = date('Y-m-d H:i:s');

$check1 =mysqli_query($conn,"SELECT *  FROM `dtr` WHERE `UNAME` = '$username' AND date_today LIKE '%$date_now%' AND `time_in` IS NOT NULL ");
$check2 =mysqli_query($conn,"SELECT *  FROM `dtr` WHERE `UNAME` = '$username' AND date_today LIKE '%$date_now%' AND `lunch_in` IS NOT NULL ");
$check3 =mysqli_query($conn,"SELECT *  FROM `dtr` WHERE `UNAME` = '$username' AND date_today LIKE '%$date_now%' AND `lunch_out` IS NOT NULL ");
$check4 =mysqli_query($conn,"SELECT *  FROM `dtr` WHERE `UNAME` = '$username' AND date_today LIKE '%$date_now%' AND `time_out` IS NOT NULL ");
$checkall = mysqli_query($conn,"SELECT * FROM dtr WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
$month = date('m');
$year = date('Y');
$d1=cal_days_in_month(CAL_GREGORIAN,$month,$year);

if (isset($_POST['ob_to'])) {
  $t_o = $_POST['t_o'];
  $o_b = $_POST['o_b'];
  $remarksOBTO = $_POST['remarksOBTO'];
  $remarksOBTO1 = $_POST['remarksOBTO1'];
  if (!empty($t_o)) {
    $insert = mysqli_query($conn,"UPDATE dtr SET t_o = '$remarksOBTO1' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");

  }
  if (!empty($o_b)) {
    $insert = mysqli_query($conn,"UPDATE dtr SET o_b = '$remarksOBTO' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href = 'home.php?division=$division';
    </SCRIPT>");
}

if (isset($_POST['stamp1'])) {
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET time_in = '$time_now',t1 = '$location' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }else{

    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }
    $insert = mysqli_query($conn,"UPDATE dtr SET time_in = '$time_now',t1 = '$location' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }
  if ($insert) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }
}

if (isset($_POST['stamp2'])) {
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_in = '$time_now',l1 = '$location' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_in = '$time_now',l1 = '$location' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }

  if ($insert) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }
}

if (isset($_POST['stamp3'])) {
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_out = '$time_now',l2 = '$location' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_out = '$time_now',l2 = '$location' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }

  if ($insert) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }
}

if (isset($_POST['stamp4'])) {
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET time_out = '$time_now',t2 = '$location' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }

    $insert = mysqli_query($conn,"UPDATE dtr SET time_out = '$time_now',t2 = '$location' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }

  if ($insert) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href = 'home.php?division=$division';
      </SCRIPT>");
  }
}

?>

<?php require_once 'dashboard_tiles/manager/Dashboard.php'; ?>  

<!-- <div class="row"> -->

  <div class="col-md-12">
    <div class="row">
      <?php include 'dashboard_tiles/standard_time.php'; ?> 
      <?php include 'dashboard_tiles/calendar_events.php'; ?>
    </div>
  </div>

  <div class="col-md-12">
    <div class="row">
      <?php include 'dashboard_tiles/online_dtr.php'; ?>
      <?php include 'dashboard_tiles/announcements.php'; ?>
      <?php include 'dashboard_tiles/birthday_celebrants.php'; ?>
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="row">
      <?php include 'dashboard_tiles/employees.php'; ?>
      <?php include 'dashboard_tiles/procurements.php'; ?>
      <?php include 'dashboard_tiles/obligations.php'; ?>
    </div>
  </div>

  <div class="col-md-12">
    <div class="row">
      <?php include 'dashboard_tiles/issuances.php'; ?>
      <?php include 'dashboard_tiles/disbursement.php'; ?>
      <?php include 'dashboard_tiles/payment.php'; ?>
    </div>
  </div>

<!-- </div> -->


<style type="text/css">
  .info-box {
        box-shadow: 0 1px 2px rgb(0 0 0 / 47%);
  }
</style>

<script>
  $(document).ready(function(){

    $("#ck").click(function(){
      if($(this).prop("checked") == true){
        $('#s3').prop("disabled", false);
        $('#s2').prop("disabled", false);
      }
      else if($(this).prop("checked") == false){
        $('#s3').prop("disabled", true);
        $('#s2').prop("disabled", true);
      }
    });
  });
</script>
<script>
  document.getElementById('to').onchange = function() {
    document.getElementById('t_o').disabled = !this.checked;
  };
  function yesnoCheck() {
    $(".H1").hide();
    $(".H2").show();
    if ($('#to').is(':checked')) {

    }else{
      $(".H1").show();
      $(".H2").hide();
    }
  }

  document.getElementById('ob').onchange = function() {
    document.getElementById('o_b').disabled = !this.checked;
  };
  function yesnoCheck1() {
    $(".H1").hide();
    $(".H22").show();
    if ($('#ob').is(':checked')) {
    }else{
      $(".H1").show();
      $(".H22").hide();
    }
  }

</script>