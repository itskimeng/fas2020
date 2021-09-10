<?php 



function getDivision()
{
  include 'connection.php';
  $sqlUsername = mysqli_query($conn,"SELECT * FROM tblpersonneldivision where DIVISION_N =".$_SESSION['division']."");
  $row = mysqli_fetch_array($sqlUsername);
  echo  $row['DIVISION_M']; 
  mysqli_close($conn);

}

function getAddress2()
{
  include 'connection.php';
  $sqlUsername = mysqli_query($conn,"SELECT * FROM tblemployeeinfo where UNAME =".$_SESSION['username']."");
  $row = mysqli_fetch_array($sqlUsername);
  echo  $row['CURRENT_ADDRESS']; 
  mysqli_close($conn);

}

function notification()
{
  include 'connection.php';

  $query = "SELECT count(*) as 'count' from tbltechnical_assistance where `STATUS_REQUEST` = 'Submitted'  ";
  $result = mysqli_query($conn, $query);
  $val = array();
  while($row = mysqli_fetch_array($result))
  {
    if($row['count'] == '0')
   {
   }else{
    echo $row['count'];
   }
 }
 mysqli_close($conn);

}

function webnotification()
{
  include 'connection.php';

  $query = "SELECT count(*) as 'count' from tblwebposting where `STATUS` = 'Submitted'  ";
  $result = mysqli_query($conn, $query);
  $val = array();
  while($row = mysqli_fetch_array($result))
  {

   if($row['count'] == '0')
   {
   }else{
    echo $row['count'];
   }
 }
 mysqli_close($conn);

}

function showRequest()
{
  include 'connection.php';

  $query = "SELECT * from tbltechnical_assistance where `STATUS_REQUEST` = 'Submitted'  ";
  $result = mysqli_query($conn, $query);
  $val = array();
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <li>
      <a href="processing.php?division=<?php echo $_GET['division']?>&ticket_id=<?php echo $row['CONTROL_NO'];?>">
        <div class="pull-left">
          <img src="images/male-user.png" class="img-circle" alt="User Image">
        </div>
        <h4>
          <?php echo $row['REQ_BY'].'&nbsp<label style = "color:red;font-size:15px;">'.$row['CONTROL_NO'].'</label>';?>
        </h4>
        <p><?PHP echo $row['ISSUE_PROBLEM'];?></p>
      </a>
    </li>
    <?php
  }
  mysqli_close($conn);

}
function showWebRequest()
{
  include 'connection.php';

  $query = "SELECT * from tblwebposting where `STATUS` = 'Submitted'  ";
  $result = mysqli_query($conn, $query);
  $val = array();
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <li>
      <a href="webForm_monitoring.php?division=<?php echo $_GET['division']?>&ticket_id=<?php echo $row['CONTROL_NO'];?>">
        <div class="pull-left">
          <img src="images/male-user.png" class="img-circle" alt="User Image">
        </div>
        <h4>
          <?php echo $row['REQUESTED_BY'].'&nbsp<label style = "color:red;font-size:12px;">'.$row['CONTROL_NO'].'</label>';?>
        </h4>
        <p><?PHP echo $row['PURPOSE'];?></p>
      </a>
    </li>
    <?php
  }
  mysqli_close($conn);

}
function getImage()
{

  $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  $slect = mysqli_query($conn,"SELECT PROFILE FROM tblemployeeinfo WHERE UNAME = '$username'");
  $rowP = mysqli_fetch_array($slect);
  $profile                 = $rowP['PROFILE'];
  $extension = pathinfo($profile, PATHINFO_EXTENSION);
  
  
  if(file_exists($profile))
  {
    switch($extension)
    {
      case 'jpg':
      if($profile == '')
      {
        echo 'images/male-user.png';
      }
      else if ($profile == $profile)
      {
        echo $profile;   
      }
      else
      {
        echo'images/male-user.png';
      }
      break;
      case 'JPG':
      if($profile == '')
      {
        echo 'images/male-user.png';
      }
      else if ($profile == $profile)
      {
        echo $profile;   
      }
      else
      {
        echo'images/male-user.png';
      }
      break;
      case 'jpeg':
      if($profile == '')
      {
        echo 'images/male-user.png';
      }
      else if ($profile == $profile)
      {
        echo $profile;   
      }
      else
      {
        echo'images/male-user.png';
      }
      break;
      case 'png':
      if($profile == '')
      {
        echo'images/male-user.png';
      }
      else if ($profile == $profile)
      {
        echo $profile;   
      }
      else
      {
        echo'images/male-user.png';
      }
      break;
      default:
      echo'images/male-user.png';
      break;
    }
  }else{
   echo'images/male-user.png';
 }
 mysqli_close($conn);

}
function isActive($title)
{
  if($title == 1)
  {
    $css = 'color:#black;font-weight:normal;';

  }else{
    $css = 'color:#fff;';

  }
  return $css;
}
?>