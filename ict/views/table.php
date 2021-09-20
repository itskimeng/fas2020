<?php 
function fillTableInfo()
{
  include 'connection.php';


  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  $val = array();
  if ($row = mysqli_fetch_array($result)) {
?>
    <table border=1 class="center-text" style="width:100%;">
      <input type="hidden" value="<?php echo $_GET['id']; ?>" name="control_no" id="control_no" />
      <tbody>
        <tr>
          <td colspan=4 class="label-text">
            <h2><b>ONLINE ICT TECHNICAL ASSISTANCE REQUEST FORM</b></h2></span>
          </td>
          <td class="label-text left-text">Control<br>Number:</td>
          <td colspan=2 style="padding:5px 5px 5px 5px;background-color:#CFD8DC;color:red;font-weight:bold;text-align:center;">
            <input type="text" style="text-align:center;" readonly name="control_no" value="<?php echo $_GET['id']; ?>" </td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Request Date:</td>
          <td style="width:15%;padding:5px 5px 5px 5px;">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="request_date" placeholder="Request Date" value="<?php echo date('m/d/y', strtotime($row['REQ_DATE'])); ?>" disabled placeholder="mm/dd/yyyy">
            </div>
          </td>
          <td style="width:15%;" class="label-text">Request Time:</td>
          <td style="width:15%;  padding:5px 5px 5px 5px;"><input disabled style="text-align:left;" placeholder="Request Time" type="text" name="request_time" class="sizeMax alphanum subtxt" value="<?php echo date("h:i:s A", strtotime($row['REQ_TIME'])); ?>" /></td>
          <!-- date("H:i A",strtotime(date("h:m A"))) -->
          <td colspan=4 class="label-text">HARDWARE INFORMATION</td>
        </tr>
        <tr>
          <td colspan=4 class="label-text">END-USER INFORMATION </td>
          <td class="label-text left-text">Equipment</td>
          <td colspan=3 class="left-text " style="padding:5px 5px 5px 5px;"><input value="<?php echo $row['EQUIPMENT_TYPE']; ?>" disabled style="width:100%;" type="text" name="equipment_type" class="alphanum subtxt" /></td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Requested By:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;">
            <input type="text" class="sizeMax alphanum subtxt" value="<?php echo $row['REQ_BY']; ?>" disabled />



          <td class="label-text left-text">Brand Model:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;">
            <input type="text" name="brand_model" class="sizeMax alphanum subtxt" value="<?php echo $row['BRAND_MODEL']; ?>" disabled />
          </td>
        </tr>
        <tr>
          <td class="label-text left-text">Office:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;">
            <input id="office" readonly type="text" name="office" class="sizeMax alphanum subtxt" value="<?php echo $row['OFFICE']; ?>" disabled />
            <input id="office" readonly type="hidden" name="office" class="sizeMax alphanum subtxt" value="<?php echo $row['OFFICE']; ?>" />
          </td>
          <td class="label-text left-text">Property Number:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="property_no" class="sizeMax alphanum subtxt" value="<?php echo $row['PROPERTY_NO']; ?>" disabled /> </td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Position/Designation:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input id="position" disabled type="text" name="position" class="sizeMax alphanum subtxt" value="<?php echo $row['POSITION']; ?>" /></td>
          <td class="label-text left-text">Serial Number:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input disabled value="<?php echo $row['SERIAL_NO']; ?>" type="text" name="serial_no" class="sizeMax alphanum subtxt" /></td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Contact Number:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input id="phone" type="text" name="contact_no" class="sizeMax alphanum subtxt" value="<?php echo $row['CONTACT_NO']; ?>" disabled /></td>
          <td class="label-text left-text">IP Address:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="ip_address" class="sizeMax alphanum subtxt" value="<?php echo $row['IP_ADDRESS']; ?>" disabled /></td>
        </tr>
        <tr>
          <td style="width:15%;" class="label-text left-text">Email Address:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input id="email" type="text" name="email_address" class="sizeMax alphanum subtxt" value="<?php echo $email; ?>" disabled /></td>
          <td class="label-text left-text">MAC Address:</td>
          <td colspan=3 style="  padding:5px 5px 5px 5px;"><input type="text" name="mac_address" class="sizeMax alphanum subtxt" value="<?php echo $row['MAC_ADDRESS']; ?>" disabled /></td>
        </tr>
      </tbody>
    </table>
    <?php
  }
}
function fillCheckbox()
{
  include 'connection.php';

  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
    switch ($row['TYPE_REQ']) {
      case 'DESKTOP/LAPTOP':
    ?>
        <tr>
          <td>
            <input type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" checked disabled> <b>DESKTOP/LAPTOP</b><br>
            <?php
            switch ($row['TYPE_REQ_DESC']) {
              case 'Hardware Error':
            ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
                </div>
              <?php
                break;
              case 'Software Error':
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
                </div>
              <?php
                break;
              case 'Computer Assembly ':
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
                </div>
              <?php
                break;
              case 'Parts Replacement':
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
                </div>
              <?php
                break;
              case 'Virus Scanning':
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
                </div>
            <?php
                break;

              default:

                break;
            }
            echo '</td>';
            ?>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
              <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
          <td>
            <input style="margin-left:60px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
            <div style="margin-left:90px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
              <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
        </tr>
        <!-- == -->
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
            </div>
          </td>
          <td>
            <input disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>
      <?php
        break;
      case 'INTERNET CONNECTIVITY':
      ?>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" disabled> <b>DESKTOP/LAPTOP</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled checked type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
            <?php
            switch ($row['TYPE_REQ_DESC']) {
              case 'New Connection(Wired or Wireless)';
            ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
                  <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
                </div>
              <?php
                break;
              case 'No Internet (Cross or Exclamation)';
              ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
                  <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
                </div>
              <?php
                break;
              case 'Access to Blocked Site:';
              ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
                  <input type="text" name="site" id="site" value="<?php echo $row['TEXT2']; ?>" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input value="<?php echo $row['TEXT2']; ?>" type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input value="" type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
                </div>
              <?php
                break;
              case 'Internet for Personal Phone/Tablet/Laptop';
              ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
                  <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input value="" type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
                  <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input value="<?php echo $row['TEXT3']; ?>" type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
                </div>
            <?php
                break;
            }
            echo '</td>';
            ?>
          <td>
            <input style="margin-left:60px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
            <div style="margin-left:90px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
              <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
            </div>
          </td>
          <td>
            <input disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>
      <?php
        break;
      case 'SOFTWARE/SYSTEM';
      ?>
        <td>
          <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" disabled> <b>DESKTOP/LAPTOP</b><br>
          <div style="margin-left:30px;padding-top:10px;">
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
          </div>
        </td>
        <td>
          <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
          <div style="margin-left:180px;padding-top:10px;">
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
            <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
            <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
            <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </div>
        </td>
        <td>
          <input style="margin-left:90px;" checked disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
          <?php
          switch ($row['TYPE_REQ_DESC']) {
            case 'Operating System, Office, Anti-Virus':
          ?>
              <div style="margin-left:60px;padding-top:10px;">
                <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
                <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
              </div>
            <?php
              break;
            case 'Records Tracking System':
            ?>
              <div style="margin-left:60px;padding-top:10px;">
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
                <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
                <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
              </div>
            <?php
              break;
            case 'Google Drive':
            ?>
              <div style="margin-left:60px;padding-top:10px;">
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
                <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
                <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
              </div>
            <?php
              break;
            case 'DILG Portals/Systems':
            ?>
              <div style="margin-left:60px;padding-top:10px;">
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
                <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
                <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
              </div>
            <?php
              break;
            case 'Other software/s (please specify)':
            ?>
              <div style="margin-left:120px;padding-top:10px;">
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
                <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
                <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
                <br><input value="<?php echo $row['TEST4']; ?>" type="text" name="softwares" id="softwares" value="" style="margin-left:10px;border:none;border-bottom:1px solid black;" /><br>
                <input value="<?php echo $row['TEST9']; ?>" type="text" name="softwares" id="softwares" value="" style="margin-left:10px;border:none;border-bottom:1px solid black;" />
              </div>
          <?php
              break;
            default:
              # code...
              break;
          }
          ?>
        </td>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
            </div>
          </td>
          <td>
            <input disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>
      <?php
        break;
      case 'PRINTER/SCANNER':
      ?>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" disabled> <b>DESKTOP/LAPTOP</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
              <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
          <td style="width:35%;">
            <input style="margin-left:60px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
            <div style="margin-left:90px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
              <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <input checked disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <?php
            switch ($row['TYPE_REQ_DESC']) {
              case 'Installation';
            ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
                </div>
              <?php
                break;
              case 'Troubleshooting';
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
                </div>
              <?php
                break;
              case 'Sharing/Networking';
              ?>
                <div style="margin-left:30px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
                </div>
            <?php
                break;
            }
            ?>

          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
            </div>
          </td>
          <td>
            <input disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>

      <?php
        break;
      case 'GOVMAIL':
      ?>
        <tr>
          <td>
            <input type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" disabled> <b>DESKTOP/LAPTOP</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
            </div>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
              <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
          <td>
            <input style="margin-left:60px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
            <div style="margin-left:90px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
              <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
        </tr>
        <!-- == -->
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
            </div>
          </td>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <?php
            switch ($row['TYPE_REQ_DESC']) {
              case 'New Account':
            ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
                </div>
              <?php
                break;
              case 'Change Account to':
              ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
                </div>
              <?php
                break;
              case 'Password Reset':
              ?>
                <div style="margin-left:180px;padding-top:10px;">
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
                  <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
                  <input checked style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
                </div>
            <?php
                break;
            }
            ?>
          </td>
          <td>
            <input disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>
      <?php
        break;
      case 'OTHERS':
      ?>
        <tr>
          <td>
            <input type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group" value="DESKTOP/LAPTOP" disabled> <b>DESKTOP/LAPTOP</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Hardware Error"> Hardware Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Software Error"> Software Error<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Computer Assembly"> Computer Assembly<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Parts Replacement"> Parts Replacement<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g1" value="Virus Scanning"> Virus Scanning
            </div>
          <td>
            <input style="margin-left:150px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group" value="INTERNET CONNECTIVITY"><b>&nbsp;INTERNET CONNECTIVITY</b><br>
            <div style="margin-left:180px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="New Connection(Wired or Wireless)"> New Connection(Wired or Wireless)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="No Internet Connection(Cross or Exclamation)"> No Internet Connection(Cross or Exclamation)<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Access to Blocked Site:"> Access to Blocked Site:
              <input type="text" name="site" id="site" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose" id="purpose" value="" style="border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g2" value="Internet for Personal Phone/Tablet/Laptop"> Internet for Personal Phone/Tablet/Laptop<br>
              <i style="margin-left:5%;"><i style="margin-left:5%">Purpose</i></i><input type="text" name="purpose2" id="purpose2" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
          <td>
            <input style="margin-left:60px;" disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group" value="SOFTWARE/SYSTEM"> <b>SOFTWARE/SYSTEM</b><br>
            <div style="margin-left:90px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Operating System, Office, Anti-Virus"> Operating System, Office, Anti-Virus<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Records Tracking System"> Records Tracking System<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Google Drive"> Google Drive<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="DILG Portals/Systems"> DILG Portals/Systems<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3" value="Other software/s (please specify)"> Other software/s (please specify)
              <br><input type="text" name="softwares" id="softwares" value="" style="border:none;border-bottom:1px solid black;" /><br>
            </div>
          </td>
        </tr>
        <!-- == -->
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input disabled type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group" value="PRINTER/SCANNER"> <b>PRINTER/SCANNER</b><br>
            <div style="margin-left:30px;padding-top:10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Installation"> Installation<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Troubleshooting"> Troubleshooting<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g4" value="Sharing/Networking"> Sharing/Networking<br>
            </div>
          </td>
          <td>
            <input style="margin-left:150px; disabled" type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group" value="GOVMAIL"> <b>GOVMAIL</b><br>
            <div style="margin-left:180px; padding-top: 10px;">
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="New Account"> New Account<br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Change Account to"> Change Account to <input type="text" id="changeaccount" name="changeaccount" value="" style="width:30%;border:none;border-bottom:1px solid black;" /><br>
              <input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g5" value="Password Reset"> Password Reset<br>
            </div>
          </td>
          <td>
            <input checked disabled style="margin-left:90px;margin-bottom:10px;" type="checkbox" name="req_type_category[]" value="OTHERS"><b>OTHERS (please specify)</b><br>
            <input style="margin-left:120px;" type="text" name="others1" id="others1" value="<?php echo $row['TEXT6']; ?>" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others2" id="others2" value="<?php echo $row['TEXT7']; ?>" style="border:none;border-bottom:1px solid black;" /><br>
            <input style="margin-left:120px;" type="text" name="others3" id="others3" value="<?php echo $row['TEXT8']; ?>" style="border:none;border-bottom:1px solid black;" /><br>
          </td>
        </tr>
      <?php
        break;
    }
  }
}
function showIssue()
{
  include 'connection.php';

  $issue = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT ISSUE_PROBLEM FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    $issue = $row['ISSUE_PROBLEM'];
  }
  return $issue;
}
function showDiagnose()
{
  include 'connection.php';

  $status_desc = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT STATUS_DESC FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    $status_desc = $row['STATUS_DESC'];
  }
  return $status_desc;
}
function setStartDate()
{
  include 'connection.php';

  $start_date = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['START_DATE'] == '' || $row['START_DATE'] == NULL) {
      $start_date = date('F d, Y');
    } else {
      $start_date = date('F d, Y', strtotime($row['START_DATE']));
    }
  }
  return $start_date;
}
function setCompletedDate()
{
  include 'connection.php';

  $completed_date = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['COMPLETED_DATE'] == '' || $row['COMPLETED_DATE'] == NULL) {
      $completed_date = date('F d, Y');
    } else {
      $completed_date = date('F d, Y', strtotime($row['COMPLETED_DATE']));
    }
  }
  return $completed_date;
}
function setStartTime()
{
  include 'connection.php';

  $start_time = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['START_TIME'] == '' || $row['START_TIME'] == NULL) {
      $start_time = date('g:i A');
    } else {
      $start_time = date('g:i A', strtotime($row['START_TIME']));
    }
  }
  return $start_time;
}
function setCompletedTime()
{
  include 'connection.php';

  $completed_time = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['COMPLETED_TIME'] == '' || $row['COMPLETED_TIME'] == NULL) {
      $completed_time = date('g:i A');
    } else {
      $completed_time = date('g:i A', strtotime($row['COMPLETED_TIME']));
    }

    $completed_time = date('g:i A', strtotime($row['COMPLETED_TIME']));
  }
  return $completed_time;
}
function setSig()
{
  include 'connection.php';

  $assist_by = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT REQ_BY FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    $assist_by = '<b>' . ucwords(strtolower($row['REQ_BY'])) . '</b>';
  }
  return $assist_by;
}
function setSigICT()
{
  include 'connection.php';

  $assist_by = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT ASSIST_BY FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    $assist_by = '<b>' . ucwords(strtolower($row['ASSIST_BY'])) . '</b>';
  }
  return $assist_by;
}
function setTimeliness()
{
  include 'connection.php';

  $timeliness = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['TIMELINESS'] == 'YES') {
      ?>
      <select class="form-control " style="width: 50%;" name="timeliness" id="timeliness">
        <option value="YES" selected>YES</option>
        <option value="NO">NO</option>
      </select>
    <?php
    } else {
    ?>
      <select class="form-control " style="width: 20%;" name="timeliness" id="timeliness">
        <option value="YES">YES</option>
        <option value="NO" selected>NO</option>
      </select>
    <?php
    }
  }
  return $timeliness;
}
function setQuality()
{
  include 'connection.php';

  $quality = '';
  if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
  }
  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='" . $_GET['id'] . "' ";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_array($result)) {
    if ($row['QUALITY'] == '5') {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5" selected>Outstanding</option>
        <option value="4">Very-Satisfatory</option>
        <option value="3">Satisfatory</option>
        <option value="2">Unsatisfatory</option>
        <option value="1">Poor</option>
      </select>
    <?php
    } else if ($row['QUALITY'] == '4') {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5">Outstanding</option>
        <option value="4" selected>Very-Satisfatory</option>
        <option value="3">Satisfatory</option>
        <option value="2">Unsatisfatory</option>
        <option value="1">Poor</option>
      </select>
    <?php
    } else if ($row['QUALITY'] == '3') {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5">Outstanding</option>
        <option value="4">Very-Satisfatory</option>
        <option value="3" selected>Satisfatory</option>
        <option value="2">Unsatisfatory</option>
        <option value="1">Poor</option>
      </select>
    <?php
    } else if ($row['QUALITY'] == '2') {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5">Outstanding</option>
        <option value="4">Very-Satisfatory</option>
        <option value="3">Satisfatory</option>
        <option value="2" selected>Unsatisfatory</option>
        <option value="1">Poor</option>
      </select>
    <?php
    } else if ($row['QUALITY'] == '1') {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5">Outstanding</option>
        <option value="4">Very-Satisfatory</option>
        <option value="3">Satisfatory</option>
        <option value="2">Unsatisfatory</option>
        <option value="1" selected>Poor</option>
      </select>
    <?php
    } else {
    ?>
      <select class="form-control " style="width: 22%;" name="quality" id="quality">
        <option value="5">Outstanding</option>
        <option value="4">Very-Satisfatory</option>
        <option value="3">Satisfatory</option>
        <option value="2">Unsatisfatory</option>
        <option value="1">Poor</option>
      </select>
<?php
    }
  }
  return $quality;
}
?>