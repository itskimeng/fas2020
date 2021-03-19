<?php
function getReqBy($control_no)
{
  include 'connection.php';
  $query = "SELECT REQUESTED_BY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
  $result = mysqli_query($conn, $query);
  if($row = mysqli_fetch_array($result))
  {
    echo $row['REQUESTED_BY'];
    echo '<input
    type="hidden"
    id="requested_by"
    name="requested_by"
    value="'.$row['REQUESTED_BY'].'"/>';
  }

}
function setSectionChief($control_no)
{
  include 'connection.php';
  $query = "SELECT REQUESTED_BY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
  $result = mysqli_query($conn, $query);
  if($row = mysqli_fetch_array($result))
  {
    $name = $row['REQUESTED_BY'];
   if($_SESSION['username'] == 'masacluti' && $control_no == null)
    {
      echo 'Chief, FAD-RICTU';

    }else{
    if($name == 'cmfiscal' || $name == 'ctronquillo' || $name == 'sglee')
    {
        echo 'Chief, GSS Section';
    }else if($name == 'hpsolis' || $name == 'caporras' || $name == 'jrsilva')
    {
        echo 'Supervising Admin Officer';
    }
  }
  }
}

function setApprovedBy($control_no)
{
  include 'connection.php';
  $query = "SELECT REQUESTED_BY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
  $result = mysqli_query($conn, $query);
  if($row = mysqli_fetch_array($result))
  {
    $name = $row['REQUESTED_BY'];

      if($name == 'cmfiscal' || $name == 'ctronquillo' || $name == 'sglee')
      {
          echo '<u style = "font-size:20px;">BEZALEEL O. SOLTURA</u>';
      }else if($name == 'hpsolis' || $name == 'caporras' || $name == 'jrsilva')
      {
        echo '<u style = "font-size:20px;">MARIA CONCEPCION A. GONZALES</u>';

      }
    
  }
}
function saveApprovedBy($control_no)
{
  include 'connection.php';
  $query = "SELECT REQUESTED_BY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
  $result = mysqli_query($conn, $query);
  if($row = mysqli_fetch_array($result))
  {
    $name = $row['REQUESTED_BY'];
    if($name == 'cmfiscal' || $name == 'ctronquillo' || $name == 'sglee' && $_SESSION['username'] == 'masacluti' ||  $_SESSION['username'] == 'mmmonteiro')
    {
      echo '<u style = "font-size:20px;">BEZALEEL O. SOLTURA</u><br>';
      echo 'Section Chief, GSS';
      

      echo'<input value = "BEZALEEL O. SOLTURA" type="hidden" name = "section_chief" placeholder="Section Chief" class = "form-control" style="text-align:center;" />
      <input value = "Section Chief, GSS" type="hidden" name = "position" placeholder="Position" class = "form-control" style="text-align:center;" />';
    }else if($name == 'hpsolis' || $name == 'caporras' || $name == 'jrsilva' || $name == 'jrsilva' && $_SESSION['username'] == 'masacluti'  ||  $_SESSION['username'] == 'mmmonteiro')
    {
      echo '<u style = "font-size:20px;">MARIA CONCEPCION A. GONZALES</u><br>';
      echo 'Supervising Admin Officer';
      echo'<input value = "MARIA CONCEPCION A. GONZALES" type="hidden" name = "section_chief" placeholder="Section Chief" class = "form-control" style="text-align:center;" />
      <input value = "Supervising Admin Officer" type="hidden" name = "position" placeholder="Position" class = "form-control" style="text-align:center;" />';
    }
  }
}

function setConfirmedBy($control_no)
{
  include 'connection.php';
  $query = "SELECT REQUESTED_BY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
  $result = mysqli_query($conn, $query);
  if($row = mysqli_fetch_array($result))
  {
    $name = $row['REQUESTED_BY'];
    if($name == 'cmfiscal' || $name == 'ctronquillo' || $name == 'sglee' && $_SESSION['username'] == 'masacluti' ||  $_SESSION['username'] == 'mmmonteiro')
    {
      return 'bosoltura';
    }else if($name == 'hpsolis' || $name == 'caporras' || $name == 'jrsilva' || $name == 'jrsilva' && $_SESSION['username'] == 'masacluti'  ||  $_SESSION['username'] == 'mmmonteiro')
    return 'magonzales';
    }
  }

function getOffice()
{
  include 'connection.php';
  if(mysqli_connect_errno()){echo mysqli_connect_error();}  
  $query = "SELECT DIVISION_M FROM tblpersonneldivision 
  INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
  INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
  where tblemployeeinfo.UNAME  = '".$_SESSION['username']."' ";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
      echo '
      <input
      type="hidden"
      class="office"
      name="office"
      value="'.$row['DIVISION_M'].'"/>';
      echo $row['DIVISION_M'];
  }
  }
function getPosition($control_no)
{
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT POSITION FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
      ECHO '
      <input
      type="hidden"
      class="position"
      name="position"
      value="'.$row['POSITION'].'"/>';
      echo $row['POSITION'];
    }
}

  function getNo($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT MOBILE_NO FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo '
        <input
        type="hidden"
        class="mobile_no"
        name="mobile_no"
        value="'.$row['MOBILE_NO'].'"/>';
        echo $row['MOBILE_NO'];
    }
  }
  function getControlNo($control_no){
  
          print($control_no);
       
  }
  function getReqDate()
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT REQUESTED_DATE FROM  tblwebposting WHERE CONTROL_NO  = '".$_GET['id']."' ";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        $date = new DateTime($row['REQUESTED_DATE']);
        $dateF = $date->format("F d, Y");
        echo '
        <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input
        disabled
            type="text"
            class="form-control pull-right"
            id="datepicker"
            name="requested_date"
            value="'.$dateF.'"
            tooltip = "'.$dateF.'"
            title = "'.$dateF.'"
            >
    </div>';
    }
  
  }
  function getReqTime()
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT REQUESTED_TIME FROM  tblwebposting WHERE CONTROL_NO  = '".$_GET['id']."' ";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        echo '<input disabled value = "'.date("H:i", strtotime($row['REQUESTED_TIME'])).'" type="time" class="form-control timepicker" name="requested_time">';
        
    }

  }

  function getSelectedCat($control_no,$value)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT CATEGORY FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
    $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        $chk = $row['CATEGORY'];
         if($value == $chk){
            echo '<input  checked type="checkbox" class="checkbox_group" name="chk_category" value="'.$chk.'"> '.$chk.'';
         }else{
            echo '<input disabled type="checkbox" class="checkbox_group" name="chk_category" value="'.$value.'"> '.$value.'';
         }
    }
   
  }
  function getFile($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT ATTACHMENT FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
     echo '<a href = "'.$row['ATTACHMENT'].'" >'.$row['ATTACHMENT'].'</a>';   
    }
  }

  function getPurpose($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT PURPOSE FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
     echo '<input disabled type="text" class="form-control purpose" name="purpose" value = "'.$row['PURPOSE'].'"/>';
    }
  }

  function fillReceivedDate($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT RECEIVED_DATE FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        if($_GET['action'] == 'edit')
        {
            echo '<input name = "received_date" type="text" class="form-control pull-right" id="datepicker_received" value = "'.date('F d, Y',strtotime($row['RECEIVED_DATE'])).'">';
        }else if($_GET['action'] == 'approval'){
          echo '<input disabled name = "received_date" type="text" class="form-control pull-right" id="datepicker_received" value = "'.date('F d, Y',strtotime($row['RECEIVED_DATE'])).'">';
        }else{
            echo '<input name = "received_date" type="text" class="form-control pull-right" id="datepicker_received" >';

        }
    }
  }
  
  function fillReceivedTime($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT RECEIVED_TIME FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        if($_GET['action'] == 'edit')
        {
          $date = new DateTime($row['RECEIVED_TIME']);

          echo '<input type="time" name = "received_time" class="form-control timepicker_received" value = "'.$date->format('H:i').'">';
        }else if($_GET['action'] == 'approval'){
          $date = new DateTime($row['RECEIVED_TIME']);
          echo '<input disabled type="time" name = "received_time" class="form-control timepicker_received" value = "'.$date->format('H:i').'"/>';
        }else{
        echo '<input type="time" name = "received_time" class="form-control timepicker_received">';

        }
    }
  }
  function fillPostedDate($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT POSTED_DATE FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        if($_GET['action'] == 'edit')
        {
            echo '<input type="text" name="posted_date" class="form-control pull-right" id="datepicker_posted" value = "'.date('F d, Y',strtotime($row['POSTED_DATE'])).'">';
        }else if($_GET['action'] == 'approval'){
          echo '<input type="text" disabled name="posted_date" class="form-control pull-right" id="datepicker_posted" value = "'.date('F d, Y',strtotime($row['POSTED_DATE'])).'">';
        }else{
            echo '<input type="text" name="posted_date" class="form-control pull-right" id="datepicker_posted">';

        }
    }
  }
  function fillPostedTime($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT POSTED_TIME FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        if($_GET['action'] == 'edit')
        {
            $date = new DateTime($row['POSTED_TIME']);
        echo ' <input type="time" name = "posted_time" class="form-control timepicker-posted" value = "'.$date->format('H:i').'">';
        }else if($_GET['action'] == 'approval'){
          $date = new DateTime($row['POSTED_TIME']);

        echo ' <input disabled type="time" name = "posted_time" class="form-control timepicker-posted" value = "'.$date->format('H:i').'">';
        }else{
        echo ' <input type="time" name = "posted_time" class="form-control timepicker-posted">';

        }
    }
  }
 
  function getRemarks($control_no)
  {
    include 'connection.php';
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $query = "SELECT REMARKS FROM  tblwebposting WHERE CONTROL_NO  = '".$control_no."' ";
     $result = mysqli_query($conn, $query);
    if($row = mysqli_fetch_array($result))
    {
        if($_GET['action'] == 'edit')
        {
        echo '<textarea  name = "remarks" style="resize:none;" cols="58">'.$row['REMARKS'].'</textarea>';
        }else{
        echo '<textarea disabled name = "remarks" style="resize:none;" cols="58">POSTED WITH NO ERROR</textarea>';

        }
    }
  }
  function inputTypeHidden($val,$id)
{
echo '<input type = "hidden" value = "'.$val.'" id = "'.$id.'" />';
}
  ?>