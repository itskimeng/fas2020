<?php 
date_default_timezone_set('Asia/Manila');
$username = $_SESSION['username'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$location = $details->city;
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
            $workforce_opt = $rowl['workforce_arrangement'];
            $is_opt_disabled = false;

            if (!empty($rowl['time_in']) AND !empty($rowl['lunch_in']) AND !empty($rowl['lunch_out']) AND !empty($rowl['time_out'])) {
              $is_opt_disabled = true;
            }
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
  $wf_arrngmt = $_POST['wf_arrangement'];
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET time_in = '$time_now',t1 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }else{

    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }
    $insert = mysqli_query($conn,"UPDATE dtr SET time_in = '$time_now',t1 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
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
  $wf_arrngmt = $_POST['wf_arrangement'];

  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_in = '$time_now',l1 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_in = '$time_now',l1 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
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
  $wf_arrngmt = $_POST['wf_arrangement'];

  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_out = '$time_now',l2 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");
    }
    $insert = mysqli_query($conn,"UPDATE dtr SET lunch_out = '$time_now',l2 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%' AND `UNAME` = '$username'");
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
  $wf_arrngmt = $_POST['wf_arrangement'];
  
  if (mysqli_num_rows($checkall)>0) {
    $insert = mysqli_query($conn,"UPDATE dtr SET time_out = '$time_now',t2 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
  }else{
    for($d = 1; $d <=$d1; $d++)
    {
      $date_in_month = $year.'-'.$month.'-'.$d;
      $insert = mysqli_query($conn,"INSERT INTO dtr(UNAME,date_today) VALUES('$username','$date_in_month')");

    }

    $insert = mysqli_query($conn,"UPDATE dtr SET time_out = '$time_now',t2 = '$location', workforce_arrangement = '$wf_arrngmt' WHERE `date_today` LIKE '%$date_now%'  AND `UNAME` = '$username'");
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