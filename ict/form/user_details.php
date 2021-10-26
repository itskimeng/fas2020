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
        <input required type="hidden" name="requested_by" value="<?= $user_info['EMP_N']?>" />
        <input readonly type="text" class="sizeMax alphanum subtxt" value="<?php echo $user_info['FIRST_M'] . ' ' . $user_info['MIDDLE_M'][0] . '. ' . $user_info['LAST_M'] . ' '; ?>">
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
      <td colspan=3 style="  padding:5px 5px 5px 5px;"><input readonly id="phone" placeholder="Contact Number" type="text" name="contact_no" class="sizeMax alphanum subtxt" value="<?= $user_info['MOBILEPHONE'];?>" /></td>
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