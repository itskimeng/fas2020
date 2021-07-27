<?php
$username = $_SESSION['username'];
require_once('_includes/setting.php');
require_once('_includes/dbaseCon.php');
require_once('_includes/library.php');
require_once('_includes/sql_statements.php');

function fillTableInfo()
{
  include 'connection.php';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT EMP_N,FIRST_M,MIDDLE_M, LAST_M, MOBILEPHONE, EMAIL,DIVISION_N, DIVISION_M , POSITION_M FROM tblpersonneldivision 
    INNER JOIN tblemployeeinfo on tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
    INNER JOIN tbldilgposition on tblemployeeinfo.POSITION_C = tbldilgposition.POSITION_ID
    where tblemployeeinfo.UNAME  = '" . $_SESSION['username'] . "' ";
  $result = mysqli_query($conn, $query);
  $val = array();
  if ($row = mysqli_fetch_array($result)) {
    $f = $row['FIRST_M'];
    $m = $row['MIDDLE_M'][0];
    $l = $row['LAST_M'];
    $firstname = ucwords(strtolower($f));

    $lname = ucfirst($l);             // HELLO WORLD!
    $lastname = ucfirst(strtolower($lname));
?>
    <input required type="hidden" name="curuser" value="<?php echo $row['EMP_N']; ?>" id="selectedUser" />


    <table border=1 class="center-text" style="width:100%;">
      <tbody>
        <tr>
          <td colspan=4 class="label-text" style="text-align:center;">
            <h2><b>ONLINE ICT TECHNICAL ASSISTANCE REQUEST FORM</b></h2></span>
          </td>
          <td class="label-text left-text">Control<br>Number:<span style="color:red;">*</span></td>
          <td colspan=2 style="padding:5px 5px 5px 5px;background-color:#CFD8DC;">
            <?php echo countCN(); ?>
          </td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Requested Date:<span style="color:red;">*</span></td>
          <td style="width:15%;padding:5px 5px 5px 5px;">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input disabled type="text" name="request_date1" class="datePicker1" value="<?php echo date('m/d/y'); ?>">
              <input hidden type="text" name="request_date" class="datePicker1" value="<?php echo date('m/d/y'); ?>">
            </div>
          </td>
          <td style="width:15%;" class="label-text">Requested Time:<span style="color:red;">*</span></td>
          <td style="width:15%;  padding:5px 5px 5px 5px;">
            <input readonly style="text-align:left;" placeholder="Request Time" type="text" name="request_time" class="sizeMax alphanum subtxt" value="<?php echo date("h:i:s A"); ?>" />
          </td>
          <!-- date("H:i A",strtotime(date("h:m A"))) -->
          <td colspan=4 class="label-text" style="text-align:center;">HARDWARE INFORMATION (if applicable)</td>
        </tr>
        <tr>
          <td colspan=4 class="label-text">END-USER INFORMATION </td>
          <td class="label-text left-text">Equipment</td>
          <td colspan=3 class="left-text " style="padding:5px 5px 5px 5px;">
            <input style="width:100%;" type="text" name="equipment_type" class="alphanum subtxt" />
          </td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Requested By:<span style="color:red;">*</span></td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;">
            <input required type="hidden" name="requested_by" value="<?php $row['EMP_N']; ?>" />
            <input readonly type="text" class="sizeMax alphanum subtxt" value="<?php echo $firstname . ' ' . $row['MIDDLE_M'][0] . '. ' . $lastname . ' '; ?>">
          <td class="label-text left-text">Brand Model:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="brand_model" class="sizeMax alphanum subtxt" value="" /></td>
        </tr>
        <tr>
          <td class="label-text left-text">Office:<span style="color:red;">*</span></td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input readonly id="office" placeholder="Office" type="text" name="office" class="sizeMax alphanum subtxt" value="<?php echo $row['DIVISION_M']; ?>" /></td>
          <td class="label-text left-text">Property Number:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="property_no" class="sizeMax alphanum subtxt" value="" /> </td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Position/Designation:<span style="color:red;">*</span></td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input readonly id="position" placeholder="Position/Designation" type="text" name="position" class="sizeMax alphanum subtxt" value="<?php echo $row['POSITION_M']; ?>" /></td>
          <td class="label-text left-text">Serial Number:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="serial_no" class="sizeMax alphanum subtxt" /></td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Contact Number:<span style="color:red;">*</span></td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input readonly id="phone" placeholder="Contact Number" type="text" name="contact_no" class="sizeMax alphanum subtxt" value="<?php echo $row['MOBILEPHONE']; ?>" /></td>
          <td class="label-text left-text">IP Address:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="ip_address" class="sizeMax alphanum subtxt" /></td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Email Address:<span style="color:red;">*</span></td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input readonly id="email" placeholder="Email Address" type="text" name="email_address" class="sizeMax alphanum subtxt" value="<?php echo $row['EMAIL']; ?>" /></td>
          <td class="label-text left-text">MAC Address:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="mac_address" class="sizeMax alphanum subtxt" value="" /></td>
        </tr>
      </tbody>
    </table>
<?php
  }
}

function countCN()
{
  include 'connection.php';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }

  $query = "SELECT count(*) as 'count' from tbltechnical_assistance ";
  $result = mysqli_query($conn, $query);
  $val = array();
  if ($row = mysqli_fetch_array($result)) {
    $count = $row['count'] + 1;
    if ($count > 100) {
      echo '<input required style = "text-align:center;color:red;font-weight:bold;" type = "text"  readonly  placeholder = "Control No."  name = "control_no" class = "sizeMax alphanum subtxt" value=2021-' . $count . ' />';
    } else {
      echo '<input required style = "text-align:center;color:red;font-weight:bold;" type = "text"  readonly  placeholder = "Control No."  name = "control_no" class = "sizeMax alphanum subtxt" value=2021-' . $count . ' />';
    }
  }
}
function showUser()
{
  $position_c = '';
  echo '<select class="form-control select2" style="width: 100%;" name="requested_by" id="type" >';
  include 'connection.php';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }

  $query = "SELECT * FROM `tblpersonneldivision` 
  LEFT JOIN tblemployeeinfo ON tblpersonneldivision.DIVISION_N = tblemployeeinfo.DIVISION_C 
  WHERE tblemployeeinfo.UNAME  = '" . $_SESSION['username'] . "' ";
  $result = mysqli_query($link, $query);
  $val = array();
  while ($row = mysqli_fetch_array($result)) {
    echo '<option value = ' . $row['EMP_N'] . '>' . $row['FIRST_M'] . ' ' . $row['MIDDLE_M'] . ' ' . $row['LAST_M'] . '</option>';
  }
  echo '</select>';
  // echo '<input required type = "text" value = '.$position_c.' />';
}

?>
<style>
  /* Styling Checkbox Starts */
  .checkbox-label {
    display: block;
    position: relative;
    margin: auto;
    cursor: pointer;
    font-size: 22px;
    line-height: 24px;
    height: 24px;
    width: 24px;
    clear: both;
  }

  .checkbox-label input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  .checkbox-label .checkbox-custom {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 24px;
    width: 24px;
    background-color: transparent;
    border-radius: 5px;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    border: 2px solid black;
  }


  .checkbox-label input:checked~.checkbox-custom {
    background-color: black;
    border-radius: 5px;
    -webkit-transform: rotate(0deg) scale(1);
    -ms-transform: rotate(0deg) scale(1);
    transform: rotate(0deg) scale(1);
    opacity: 1;
    border: 2px solid black;
  }


  .checkbox-label .checkbox-custom::after {
    position: absolute;
    content: "";
    left: 12px;
    top: 12px;
    height: 0px;
    width: 0px;
    border-radius: 5px;
    border: solid #009BFF;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(0deg) scale(0);
    -ms-transform: rotate(0deg) scale(0);
    transform: rotate(0deg) scale(0);
    opacity: 1;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
  }


  .checkbox-label input:checked~.checkbox-custom::after {
    -webkit-transform: rotate(45deg) scale(1);
    -ms-transform: rotate(45deg) scale(1);
    transform: rotate(45deg) scale(1);
    opacity: 1;
    left: 8px;
    top: 3px;
    width: 6px;
    height: 12px;
    border: solid #fff;
    border-width: 0 2px 2px 0;
    background-color: transparent;
    border-radius: 0;
  }



  /* For Ripple Effect */
  .checkbox-label .checkbox-custom::before {
    position: absolute;
    content: "";
    left: 10px;
    top: 10px;
    width: 0px;
    height: 0px;
    border-radius: 5px;
    border: 2px solid #FFFFFF;
    -webkit-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
  }

  .checkbox-label input:checked~.checkbox-custom::before {
    left: -3px;
    top: -3px;
    width: 24px;
    height: 24px;
    border-radius: 5px;
    -webkit-transform: scale(3);
    -ms-transform: scale(3);
    transform: scale(3);
    opacity: 0;
    z-index: 999;
    transition: all 0.3s ease-out;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
  }




  /* Style for Circular Checkbox */
  .checkbox-label .checkbox-custom.circular {
    border-radius: 50%;
    border: 2px solid black;
  }

  .checkbox-label input:checked~.checkbox-custom.circular {
    background-color: #FFFFFF;
    border-radius: 50%;
    border: 2px solid black;
  }

  .checkbox-label input:checked~.checkbox-custom.circular::after {
    border: solid #0067FF;
    border-width: 0 2px 2px 0;
  }

  .checkbox-label .checkbox-custom.circular::after {
    border-radius: 50%;
  }

  .checkbox-label .checkbox-custom.circular::before {
    border-radius: 50%;
    border: 2px solid #FFFFFF;
  }

  .checkbox-label input:checked~.checkbox-custom.circular::before {
    border-radius: 50%;
  }
</style>
<style>
  .collapsible {
    background-color: #ff5252;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
  }

  .activecollap,
  .collapsible:hover {
    background-color: #c62828;
  }

  .content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
    overflow-y: scroll;
    height: 110px;

  }

  #changePass {
    opacity: 1;
    transition: opacity 10s;
  }

  #changePass.hide {
    opacity: 0;
  }

  th {
    color: #a9242d;
    text-align: center;
  }

  td {
    text-align: left;
  }

  .center-text {
    text-align: center;
  }

  .left-text {
    text-align: left;
  }

  .borderless {
    border: none;
  }

  .sizeMax {
    width: 100%;
  }

  td.label-text {
    background-color: #B0BEC5;
    padding: 5px 5px 5px 5px;
  }

  input[type=checkbox] {
    /* Double-sized Checkboxes */
    -ms-transform: scale(1);
    /* IE */
    -moz-transform: scale(1);
    /* FF */
    -webkit-transform: scale(1);
    /* Safari and Chrome */
    -o-transform: scale(1);
    /* Opera */
    transform: scale(1);
    padding: 10px;
  }

  .setDateIcon {
    background-image: url(images/cal.gif);
    background-repeat: no-repeat;
    background-position: 90px 5px;
  }

  .disabletxtarea {
    pointer-events: none;
  }
</style>
<?php
function setModules()
{
  $fasMod = array(
    "Dashboard" => 1,
    "Calendar" => 2,
    "Records" => 3,
    "DTR" => 4,
    "Procurement" => 5,
    "ICT TA" => 6,
    "Website Posting" => 7,

  );
  foreach ($fasMod as $key => $val) {
    echo '<option>' . $key . '</option>';
  }
}
function setIntra()
{
  $a = array(
    "" => 0,
    "ADAC FMS" => 1,
    "BIS" => 2,
    "BPLS - BPCO Online Monitoring System" => 3,
    "Competency Assessment Information System" => 4,
    "CBMS Portal" => 5,
    "DMS" => 6,
    "ECLIP" => 7,
    "Financial Reporting System" => 8,
    "GAD" => 9,
    "LTIA" => 10,
    "POPSPCMS" => 11,
    "RR4LGUs" => 12,
    "SUBAYBAYAN" => 13,
    "VMS" => 14,
  );

  foreach ($a as $id => $val) {
?>
    <option> <?php echo '&nbsp' . $id; ?></option>
    <!-- <tr>
                      <td style="width:10%;">
                        <div class="checkbox-container">
                          <label class="checkbox-label">
                            <input type="checkbox">
                            <span class="checkbox-custom rectangular"></span>
                          </label>
                        </div>
                      </td>
                      <td style="width:10%;">
                        <h4> <?php echo '&nbsp' . $id; ?></h4>
                      </td>
                      <td>
                        <textarea id="check" cols="60" style="resize:none;">Issue's/Concerns:</textarea>
                      </td>
                    </tr> -->
<?php
  }
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="panel panel-default">
        <div class="box-body">
          <div>
            <h1>ICT Technical Assistance</h1><br>
          </div>
          <form method="POST" enctype="multipart/form-data" class="myformStyle" action="JASPER/sample/sample1.php">
            <?php echo fillTableInfo(); ?>
            <input required type="hidden" name="division" value="<?php echo $_GET['division']; ?>" />
            <br>
            <u style="margin-top:20px; font-size:20px;" class="label-text">TYPE OF REQUEST<span style="color:red;">*</span></u>
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 1) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> 
                            <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {
                      if ($request_type['id'] == 1) {
                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" id= "'.$request_type['enable'] .'" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 4) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {
                      if ($request_type['id'] == 4) {
                        if($request_type['request_id'] == 14 || $request_type['request_id'] == 19 )
                        {
                        echo  $request_type['request_type'].'<br>';

                        }else{
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';

                        }
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 7) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g7" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 7) {
                        if ($request_type['request_id'] == 25 || $request_type['request_id'] == 26 || $request_type['request_id'] == 28 ||$request_type['request_id'] == 29 ) {
                          echo '<input style="margin-left:30px;" type="checkbox" name="text1[]" class="'.$request_type['req_class'].' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                        }else if( $request_type['request_id'] == 31) {
                         echo  $request_type['request_type']; 
                        }else {
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="'.$request_type['req_class'].' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                        }
                      }
                    }
                    ?>
                  </div>
                </div>
             
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 2) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 2) {

                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 5) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {
                      if ($request_type['id'] == 5) {
                        if($request_type['request_id'] == 14 || $request_type['request_id'] == 19 )
                        {
                        echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_type'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';

                        }else{
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';

                        }
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 8) {
                      echo '<input type="checkbox" name="req_type_category[]" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <!-- <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 8) {
                        if ($request_type['request_id'] == 16) {
                          echo $request_type['request_type'] . '<br>';
                        } else {
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3 form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                        }
                      }
                    }
                    ?>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 3) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 3) {

                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                 <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 6) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g6" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {
                      if ($request_type['id'] == 6) {
                        if($request_type['request_id'] == 14 || $request_type['request_id'] == 19 )
                        {
                        echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                        }else{
                          echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';

                        }
                      }
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-4">
                  <?php
                  foreach ($type as $key => $request) {
                    if ($request['id'] == 9) {
                      echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g9" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                    }
                  }

                  ?>
                  <div style="margin-left:30px;padding-top:10px;">
                    <?php
                    foreach ($data as $key => $request_type) {

                      if ($request_type['id'] == 9) {
                        if ($request_type['request_id'] == 16) {
                          echo $request_type['request_type'] . '<br>';
                        } else {
                          echo  $request_type['request_type'].'<br>';
                        }
                      }
                    }
                    ?>
                  </div>
                </div>
          
              </div>
            </div>

       
            <!-- <table border=1 style="margin-top:20px;width:100%;">
              <tr>
                <td colspan=4 class="center-text label-text" style="width:50%;">ADDITIONAL INFORMATION/REMARKS (if any):</td>
                <td colspan=4 class="center-text label-text">ACTION TAKEN/RESOLUTION/RECOMMENDATION:</td>
              </tr>
              <tr>
              <tr>
                <td colspan=4>
                  <textarea required rows="5" name="issue" id="issue" cols="20" style="border:1px solid white;resize:none;width:100%;text-align:left;">
                                </textarea>
                </td>

                <td colspan=4 rowspan=2>
                <textarea required rows="5" name="issue" id="issue" cols="20" style="border:1px solid white;resize:none;width:100%;text-align:left;">
                                </textarea>
                </td>
              </tr>


            </table> -->



            <table border=1 style="margin-top:20px;width:100%;">
              <tr>
                <td colspan=4 class="center-text label-text" style="width:50%;"><i>END-USER</i></td>
                <td colspan=4 class="center-text label-text"><i>RICTU</i></td>
              </tr>
              <tr>
                <td colspan=4 class="label-text">ISSUE/PROBLEM/ERROR DETAILS:<span style="color:red;">*</span></td>
                <td colspan=4 class="label-text">FINDINGS AND RESOLUTION/RECOMMENDATION</td>
              </tr>
              <tr>
                <td colspan=4>
                  <textarea required rows="23" name="issue" id="issue" cols="56" style="border:1px solid white;resize:none;width:100%;text-align:left;">
                                </textarea>
                </td>

                <td colspan=4 rowspan=2>
                  <textarea rows="25" cols="56" style="border:1px solid white;resize:none;width:100%;text-align:left;background-color:#EEEEEE;" name="status" class="disabletxtarea">
                                </textarea>
                </td>

              </tr>
              <tr>
                <td colspan=4 class="label-text">ACCEPTANCE OF ICT TECHNICAL ASSISTANCE RENDERED:</td>

              </tr>
              <tr>
                <td colspan=4 STYLE="text-align:center;background-color:#EEEEEE;"><u><?php echo $_SESSION['complete_name']; ?></u><br><span class="label-text">Signature over Printed Name</span></td>


                <td colspan=2 class="label-text"><input type="checkbox" disabled />&nbsp;&nbsp;&nbsp;&nbsp;Resolved</td>
                <td colspan=2 class="label-text">
                  <input type="checkbox" disabled />&nbsp;&nbsp;&nbsp;&nbsp;Defective(to be referred to GSS for repair)
                </td>

              <tr>
                <td colspan=4 class="label-text" style="background-color:#EEEEEE;">DEAR END USER, YOUR FEEDBACK IS IMPORTANT TO US:</td>



                <td style="width:12.5%;" class="label-text">Started Date:</td>
                <td style="width:12.5%;">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <!-- class="datePicker1"  -->
                    <input required disabled type="text" name="started_date" placeholder="Started Date" value="<?php echo date('F d, Y'); ?>" required>
                  </div>
                </td>
                <td style="width:12.5%;" class="label-text">Completed Date:</td>
                <td style="width:12.5%;">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input required disabled type="text" name="completed_time" value="" required>
                  </div>
                </td>

              </tr>
              <tr>
                <td colspan=4>
                <td style="width:12.5%;" class="label-text">Started Time:</td>
                <td style="width:12.5%;">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input required disabled type="text" name="started_time" value="<?php echo date('H:i A'); ?>">
                  </div>
                </td>
                <td style="width:12.5%;" class="label-text">Completed Time:</td>
                <td style="width:12.5%;">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input required disabled type="text" name="completed_time" value="" required>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan=4 style="background-color:#EEEEEE;">
                  <ol>
                    <li class="label-text">Timeliness
                      <p style="font-weight:normal;">Was the ICT Staff able to provide immediate assistance within three (3) hours or agreed timeline?(Yes/No) ___________________________ </p>
                    </li>
                    <li class="label-text">Quality
                      <p style="font-weight:normal;">At a rating scale of 1 to 5, kindly rate the service rendered?<br>(5-Outstanding, 4- Very Satisfactory, 3 - Satisfactory, 2 - Unsatisfactory, 1 - Poor) ____________
                    </li>
                  </ol>
                </td>
                <td colspan=4 style="text-align:center;background-color:#EEEEEE;">
                  _____________________________________________________
                  <p class="label-text">Signature over Printer Name</p>

                </td>
              </tr>






            </table><br>

            <input id='submit' style="float:right;" type="submit" value="Submit" class="btn btn-primary btn-s sweet-14" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:65%;">
    <div class="modal-content">
      <div class="modal-header" style="background-image: linear-gradient(#ffebee, #ffcdd2, #ef9a9a);">
        DILG PORTAL SYSTEM
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">

        <!------ Include the above in your HEAD tag ---------->
        <form name="bidForm" id="bidForm">

          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-md-3">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                          </span>Intranet Portal</a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <table class="table">
                          <tr>
                            <td>
                              <span class="fa fa-users text-primary"></span><a class="link" href="#" data-div="div1"> Creation of Accounts</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-desktop text-success"></span><a class="link" href="#" data-div="div2"> Intranet Production Server</a>
                            </td>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                          </span>Loop System</a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <table class="table">
                          <tr>
                            <td>
                              <span class="fa fa-users text-primary"></span><a class="link" href="#" data-div="div3"> Retrieving Accounts</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-check text-primary"></span><a class="link" href="#" data-div="div4">Activation of Account</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-file text-primary"></span><a class="link" href="#" data-div="div5"> Records Searching Issue</a>
                            </td>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                          </span>FAS System</a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <table class="table">
                          <tr>
                            <td>
                              <span class="fa fa-users text-primary"></span><a class="link" href="#" data-div="div6"> Retrieving Accounts</a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span class="fa fa-check text-primary"></span><a class="link" href="#" data-div="div7">Activation of Account</a>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <span class="fa fa-users text-primary"></span><a class="link" href="#" data-div="div8">FAS Modules</a>
                            </td>
                          </tr>


                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-sm-9 col-md-9">

                <div id="div1" class="contentDiv">
                  <div class="panel panel-danger">
                    <div class="panel-heading"> User Details </div>
                    <div class="panel-body">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Employee ID No. <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="employee_id" placeholder="Employee Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">First Name <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="fname" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Office <span style="color:red;">*</span></label>
                            <select class="form-control" id="designation">
                              <option value=""> </option>
                              <option value="Regional Office">Regional Office </option>
                              <option value="Provincial Office">Provincial Office </option>
                              <option value="Municipal Office">Municipal Office </option>
                              <option value="City Office">City Office </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Middle Name <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="mname" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Region <span style="color:red;">*</span></label>
                            <select class="form-control" id="region">
                              <option> </option>
                              <option>Regional Office </option>
                              <option>Provincial Office </option>
                              <option>Municipal Office </option>
                              <option>City Office </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Last Name <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="lname" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Province <span style="color:red;">*</span></label>
                            <select class="form-control" id="province">
                              <option> </option>
                              <option>Regional Office </option>
                              <option>Provincial Office </option>
                              <option>Municipal Office </option>
                              <option>City Office </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Extension Name <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="exname" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <select class="form-control" id="municipality">
                              <option> </option>
                              <option>City/Municipality </option>
                              <option>Provincial Office </option>
                              <option>Municipal Office </option>
                              <option>City Office </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Birth Date <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="bdate" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <select class="form-control" id="brgy">
                              <option> </option>
                              <option>Barangay </option>
                              <option>Provincial Office </option>
                              <option>Municipal Office </option>
                              <option>City Office </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Gender <span style="color:red;">*</span></label>

                            <select class="form-control" id="gender">
                              <option> </option>
                              <option>Male </option>
                              <option>Female </option>
                            </select>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Mobile Phone <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="phonenum">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-danger">
                    <div class="panel-heading">Account Details</div>
                    <div class="panel-body">
                      <div class="form-group row">
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Email <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="emailadd" placeholder="Employee Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Username <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="uname">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Password <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="pass" placeholder="Employee Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group field-usersearch-app_id">
                            <label class="control-label" for="usersearch-app_id">Confirm Password <span style="color:red;">*</span></label>
                            <input autocomplete="off" type="text" class="form-control" id="cpass" placeholder="Employee Name">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-danger   contentDiv" id="div2" style="overflow:auto; height:300px;">
                  <div class="panel-heading"> User Details </div>
                  <div class="panel-body" id="append">
                    <span id="addmore" class="btn btn-danger btn-md">Add More </span>
                    <div class="form-group row myTemplate2">
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Programs <span style="color:red;">*</span></label>
                          <select class="form-control" id="program" name="append">
                            <?php setIntra(); ?>
                          </select>
                          <!-- <input type="text" class="form-control" id="inputPassword" placeholder="Username"> -->
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Roles/Permission <span style="color:red;">*</span></label>

                          <input autocomplete="off" type="text" class="form-control" name="append" id="roles" placeholder="Roles/Permission">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Assign To <span style="color:red;">*</span></label>
                          <input autocomplete="off" type="text" class="form-control" name="append" id="focalperson" placeholder="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="panel panel-danger contentDiv" id="div3">
                  <div class="panel-heading"> Loop: Retrieving Accounts </div>
                  <div class="panel-body">
                    <div class="form-group row">
                      <div class="col-md-6">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Complete Name <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" name="retaccounts" placeholder="Employee Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Office <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" name="retaccounts" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Username <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" name="retaccounts" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">Old Password <span style="color:red;">*</span></label>
                          <input type="password" class="form-control" name="retaccounts" placeholder="Password">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group field-usersearch-app_id">
                          <label class="control-label" for="usersearch-app_id">New Password <span style="color:red;">*</span></label>
                          <input type="password" class="form-control" name="retaccounts" placeholder="Password">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="well box contentDiv" id="div4">
                <div class="form-group row">
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Username or Employee's Name<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Office<span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Instruction <span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="well box contentDiv" id="div5">
                <div class="form-group row">
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Record No. <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Username">
                    </div>
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Subject <span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Issue's and Concerns: <span style="color:red;">*</span></label>
                      <textarea cols=80 rows=5 style="outline:none;resize:none;"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="well box contentDiv" id="div6">
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Complete Name <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Employee Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Office <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Username <span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Old Password</label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">New Password</label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="well box contentDiv" id="div7">
                <div class="form-group row">
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Username or Employee's Name<span style="color:red;">*</span></label>
                      <input type="text" class="form-control" id="inputPassword" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Office<span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Instruction <span style="color:red;">*</span></label>
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="well box contentDiv" id="div8">
                <div class="form-group row">
                  <div class="col-md-4">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">FAS Module<span style="color:red;">*</span></label>
                      <select class="form-control"><?php setModules(); ?></select>
                    </div>
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Priority Level <span style="color:red;">*</span></label>
                      <select class="form-control">
                        <option value="1">Urgent</option>
                        <option value="2">High</option>
                        <option value="3">Medium</option>
                        <option value="4">Low</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group field-usersearch-app_id">
                      <label class="control-label" for="usersearch-app_id">Issue's and Concerns: <span style="color:red;">*</span></label>
                      <textarea cols=80 rows=5 style="outline:none;resize:none;"></textarea>
                    </div>
                  </div>
                </div>
              </div>




            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="submitBtn" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/input-mask/jquery.inputmask.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="js/title.js"></script>

  <style>
    .link {
      color: black;
    }

    .well {
      background-color: #ECEFF1;
    }

    .contentDiv {
      display: none;
    }
  </style>
  <script>
    $(document).ready(function() {
      $('#div1').removeClass("contentDiv");




      // append
      $('#addmore').click(function() {
        $('.myTemplate2')
          .clone()
          .removeClass("myTemplate2")
          .show()
          .appendTo('#append');

        myCounter++;
        $('.additionalDate .datePicker22').each(function(index) {
          $('.datePicker22').addClass("myDate2");
          $(this).attr("name", $(this).attr("name") + myCounter);
        });
      });
      $('#submitBtn').click(function() {
        var prog = []
        var accounts = []
        let value = '';
        let intranet = ["employee_id", "designation", "fname", "mname", "lname", "exname", "region", "province", "municipality", "bdate", "gender", "phonenum", "emailadd", "uname", "pass", "cpass", ];
        let intranetProg = ["program", "roles", "focalperson"];

        let val1 = ["Employee ID No.", "Office", "First Name", "Middle Name", "Last Name", "Extension Name", "Region", "Province", "Municipality", "Birth Date", "Gender", "Phone No.", "Email", "Username", "Password", "Confirm Password"];
        let val2 = ["Programs", "Roles", "Assign To"];
        let val3 = ["Complete Name", "Office", "Username", "Old Password", "New Password"];

        let append = document.getElementsByName("append");
        let retaccounts = document.getElementsByName("retaccounts");


        //  INTRANET
        for (let index = 0; index < intranet.length; index++) {
          let info = $('#' + intranet[index]).val();
          if (info == '') {
            title1 = '';
          } else {
            title1 += "\nt\t" + val1[index] + ": " + info + "";
          }
        }

        for (let index = 0; index < append.length; index++) {
          if (append[index].value == '') {
            title2 == '';
          } else {
            val2.push(val2[index]);
            prog.push("\t" + val2[index] + ":" + append[index].value);
          }

        }


        //LOOP
        for (let index = 0; index < retaccounts.length; index++) {
          if (retaccounts[index].value == '') {
            title3 = ''
          } else {
            accounts.push("\t" + val3[index] + ":" + retaccounts[index].value)
          }
        }


        title2 += '\n' + prog.join('\n');
        title3 += '\n' + accounts.join('\n');
        $('#issue').val(title1 + "\n" + title2 + title3);



      })
      $('.link').click(function() {
        var e = $(this);
        var target = $("#" + e.data("div"));
        target.show("slow").siblings().hide("slow");
      });

    });
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>
  <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("activecollap");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    $('#submit').click(function() {

      var cb1 = document.getElementById("checkboxgroup_g1").checked;
      var cb2 = document.getElementById("checkboxgroup_g2").checked;
      var cb3 = document.getElementById("checkboxgroup_g3").checked;
      var cb4 = document.getElementById("checkboxgroup_g4").checked;
      var cb5 = document.getElementById("checkboxgroup_g5").checked;
      var cb6 = document.getElementById("checkboxgroup_g6").checked;
      var cb7 = document.getElementById("checkboxgroup_g7").checked;
      var cb8 = document.getElementById("checkboxgroup_g8").checked;
      var cb9 = document.getElementById("checkboxgroup_g9").checked;


      if (cb1 == '' && cb2 == '' && cb3 == '' && cb4 == '' && cb5 == '' && cb6 == '' && cb7 == '' && cb8 == '' && cb9 == '') {
        alert('Required Field:Choose at least one Type of Request');
        return false;
      }
      return true;
    })
  </script>
  <script>
    $(function() {

      //Date picker,
      $(".datePicker1").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datePicker1").datepicker().datepicker("setDate", new Date());


      $('#datepicker2').datepicker({
        autoclose: true
      })
      $('#datepicker3').datepicker({
        autoclose: true
      })
      $('#datepicker4').datepicker({
        autoclose: true
      })


    })
  </script>

  <script type="text/javascript">





    $(function() {
      enable_cb1();
      enable_cb2();
      enable_cb3();
      enable_cb4();
      enable_cb5();
      enable_cb6();
      enable_cb7();
      enable_cb8();
      enable_cb9();
      $("#checkboxgroup_g1").click(enable_cb1);
      $("#checkboxgroup_g2").click(enable_cb2);
      $("#checkboxgroup_g3").click(enable_cb3);
      $("#checkboxgroup_g4").click(enable_cb4);
      $("#checkboxgroup_g5").click(enable_cb5);
      $("#checkboxgroup_g6").click(enable_cb6);
      $("#checkboxgroup_g7").click(enable_cb7);
      $("#checkboxgroup_g8").click(enable_cb8);
      $("#checkboxgroup_g9").click(enable_cb9);

  



    });
    $('#cb3_4').on('change', function(e) {
      if (e.target.checked) {
        $('#myModal').modal();
      }
    });

  
































    function enable_cb1() {
      if (this.checked) {
        if($('.checkboxgroup_g1').val() == '1')
          {
            $('#cb1').not(this).prop('checked', true);
            $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
          }

        // $('#others1').val('');
        // $('#others2').val('');
        // $('#others3').val('');



        $(".checkboxgroup_g1").removeAttr("disabled");
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);




      } else {

        $('.checkboxgroup_g1').not(this).prop('checked', false);


        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

      }
    }

    function enable_cb2() {
      if (this.checked) {
        if ($('.checkboxgroup_g2').val() == '6') {
          $('#cb2').not(this).prop('checked', true);
          $("#portals").removeAttr("disabled");
          $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
     
        }
   



        $(".checkboxgroup_g2").removeAttr("disabled");
        $('.checkboxgroup_g1').not(this).prop('checked', false);

        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);


        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);
      } else {
        // $('#site').val('');
        // $('#purpose').val('');
        // $('#purpose2').val('');

        $('.checkboxgroup_g2').not(this).prop('checked', false);

        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);


        // document.getElementById("site").disabled = true;
        // document.getElementById("purpose").disabled = true;
        // document.getElementById("purpose2").disabled = true;
      }
    }

    function enable_cb3() {
      if (this.checked) {
        if ($('.checkboxgroup_g3').val() == '10') {
          $('#cb3').not(this).prop('checked', true);
          $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
        }
        // $('#site').val('');
        // $('#purpose').val('');
        // $('#purpose2').val('');
        // $('#softwares').val('');
        // $('#changeaccount').val('');
        // $('#others1').val('');
        // $('#others2').val('');
        // $('#others3').val('');

        $(".checkboxgroup_g3").removeAttr("disabled");
        // document.getElementById("softwares").disabled = false;
        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);

      } else {
        // document.getElementById("softwares").disabled = true;

        // $('#softwares').val('');
        $('.checkboxgroup_g3').not(this).prop('checked', false);

        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);


      }
    }

    function enable_cb4() {
      if (this.checked) {
        if ($('.checkboxgroup_g4').val() == '13') {
          $('#cb4').not(this).prop('checked', true);
          $("input.txt1").removeAttr("disabled");
          $("input.txt1").prop("required",true);
          $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
        }
        
      


        $(".checkboxgroup_g4").removeAttr("disabled");
        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);


        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);
        
      } else {
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);
      }
    }

    function enable_cb5() {
      if (this.checked) {
        // document.getElementById("changeaccount").disabled = false;
        if ($('.checkboxgroup_g5').val() == '20') {
          $('#cb5').not(this).prop('checked', true);
          $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
        }
        // $('#site').val('');
        // $('#purpose').val('');
        // $('#purpose2').val('');
        // $('#softwares').val('');
        // $('#changeaccount').val('');
        $('#others1').val('');
        $('#others2').val('');
        $('#others3').val('');



        $(".checkboxgroup_g5").removeAttr("disabled");
        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);

      } else {
        // document.getElementById("changeaccount").disabled = true;
        // $('#changeaccount').val('');
        $('.checkboxgroup_g5').not(this).prop('checked', false);

        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);



      }
    }

    function enable_cb6() {
      if (this.checked) {
        if($('.checkboxgroup_g6').val() == '22')
          {
            $('#cb6').not(this).prop('checked', true);
            $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
          };


        // $('#others1').val('');
        // $('#others2').val('');
        // $('#others3').val('');



        $(".checkboxgroup_g6").removeAttr("disabled");
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);




      } else {

        $('.checkboxgroup_g6').not(this).prop('checked', false);


        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

      }
    }

    function enable_cb7() {
      if (this.checked) {
        if ($('.checkboxgroup_g7').val() == '24') {
          $('#cb7').not(this).prop('checked', true);
          $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
        }else{
          $('#cb7').not(this).prop('checked', false);

        }
        // $('#site').val('');
        // $('#purpose').val('');
        // $('#purpose2').val('');
        // $('#softwares').val('');
        // $('#changeaccount').val('');
        // $('#others1').val('');
        // $('#others2').val('');
        // $('#others3').val('');



        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").removeAttr("disabled");
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);




      } else {

        $('.checkboxgroup_g7').not(this).prop('checked', false);


        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

      }
    }

    function enable_cb8() {
      if (this.checked) {
        if ($('.checkboxgroup_g8').val() == '32') {
          $('#cb9').not(this).prop('checked', true);
          $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
            $("input.txt4").attr("disabled",true);
        }
        // $('#site').val('');
        // $('#purpose').val('');
        // $('#purpose2').val('');
        // $('#softwares').val('');
        // $('#changeaccount').val('');
        $('#others1').val('');
        $('#others2').val('');
        $('#others3').val('');



        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").removeAttr("disabled");
        $(".checkboxgroup_g9").attr("disabled", true);

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g9').not(this).prop('checked', false);




      } else {

        $('.checkboxgroup_g8').not(this).prop('checked', false);


        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

      }
    }

    function enable_cb9() {

      if (this.checked) {
        if ($('.checkboxgroup_g4').val() == '9') {
          $('#cb4').not(this).prop('checked', true);
          $("input.txt1").removeAttr("disabled");
          $("input.txt2").attr("disabled",true);
            $("input.txt3").attr("disabled",true);
          $("input.txt4").prop("required",true);

        }
        $("#others1").removeAttr("disabled");
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",false);







        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").removeAttr("disabled");

        $('.checkboxgroup_g1').not(this).prop('checked', false);
        $('.checkboxgroup_g2').not(this).prop('checked', false);
        $('.checkboxgroup_g3').not(this).prop('checked', false);
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g5').not(this).prop('checked', false);
        $('.checkboxgroup_g6').not(this).prop('checked', false);
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g8').not(this).prop('checked', false);




      } else {

        $('.checkboxgroup_g9').not(this).prop('checked', false);
        $("input.txt1").attr("disabled",true);
        $("input.txt2").attr("disabled",true);
        $("input.txt3").attr("disabled",true);
        $("input.txt4").attr("disabled",true);



        $(".checkboxgroup_g1").attr("disabled", true);
        $(".checkboxgroup_g2").attr("disabled", true);
        $(".checkboxgroup_g3").attr("disabled", true);
        $(".checkboxgroup_g4").attr("disabled", true);
        $(".checkboxgroup_g5").attr("disabled", true);
        $(".checkboxgroup_g6").attr("disabled", true);
        $(".checkboxgroup_g7").attr("disabled", true);
        $(".checkboxgroup_g8").attr("disabled", true);
        $(".checkboxgroup_g9").attr("disabled", true);

      }
    }

    $('.checkboxgroup_g1').on('change', function() {
      $('.checkboxgroup_g1').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g2').on('change', function() {
      $('.checkboxgroup_g2').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g3').on('change', function() {
      $('.checkboxgroup_g3').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g4').on('change', function() {
      $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g4:checked').each(function(){
          if(this.value == "13")
          {
            $("input.txt1").removeAttr("disabled");
           

          }else if(this.value == "18")
          {
            $("input.txt1").attr("disabled",true);
            $("input.txt2").removeAttr("disabled");
            $("input.txt2").prop("required",true);

          }else{
            $("input.txt1").attr("disabled",true);
            $("input.txt2").attr("disabled",true);

          }
        })  
    });
    $('.checkboxgroup_g5').on('change', function() {
      $('.checkboxgroup_g5').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g6').on('change', function() {
      $('.checkboxgroup_g6').not(this).prop('checked', false);
      
    });

    $('.checkboxgroup_g7').on('change', function() {
      $('.checkboxgroup_g7').not(this).prop('checked', false);
      $('.checkboxgroup_g7:checked').each(function(){
          if(this.value == "30")
          {
            $("input.txt3").removeAttr("disabled");
            $("input.txt3").prop("required",true);
          }else{
            $("input.txt3").attr("disabled",true);

          }
        })  
    });


    $('.checkbox_group').on('change', function() {
      $('.checkbox_group').not(this).prop('checked', false);
      $('.checkboxsubgroup7').not(this).prop('checked',false);

    });

    $('.checkboxsubgroup7').on('change', function() {
      $('.checkboxsubgroup7').not(this).prop('checked', false);
      
    });
 
 


    // DATE PICKER
    $(function() {
      $(".datePicker1").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datePicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });
      $(".datePicker3").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2020",
        dateFormat: 'M dd, yy'
      });


    });
  </script>