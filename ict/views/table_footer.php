<table border=1 style="margin-top:20px;width:100%;">
                <tr>
                  <td colspan=4 class="center-text label-text" style="width:50%;"><i>END-USER</i></td>
                  <td colspan=4 class="center-text label-text"><i>RICTU</i></td>
                </tr>
                <tr>
                  <td colspan=4 class="label-text">ISSUE/PROBLEM/ERROR DETAILS:</td>
                  <td colspan=4 class="label-text">FINDINGS AND RESOLUTION/RECOMMENDATION<span style="color:red;">*</span></td>
                </tr>
                <tr>
                  <td colspan=4>
                    <textarea class="disabletxtarea" rows="23" name="issue" cols="56" style="background-color:#EEEEEE;resize:none;width:100%;">
                              <?php echo showIssue(); ?>
                              </textarea>
                  </td>

                  <td colspan=4 rowspan=2>
                    <textarea class="disabletxtarea" rows="25" name="issue" cols="56" style="background-color:#EEEEEE;resize:none;width:100%;">

                              <?php echo showDiagnose(); ?>
                              </textarea>
                  </td>

                </tr>
                <tr>
                  <td colspan=4 class="label-text">ACCEPTANCE OF ICT TECHNICAL ASSISTANCE RENDERED:</td>

                </tr>
                <tr>
                  <td colspan=4 style="background-color:#EEEEEE;text-align:center;"><u><?php echo setSig(); ?></u><br><span class="label-text">Signature over Printed Name</span></td>


                  <?php
                  include 'connection.php';

                  if (mysqli_connect_errno()) {
                    echo mysqli_connect_error();
                  }
                  $id = $_GET['id'];
                  $query = "SELECT * FROM `tbltechnical_assistance` where `CONTROL_NO` ='$id' ";
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) {
                    switch ($row['STATUS']) {
                      case '1':
                  ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" checked />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                      <?php
                        break;

                      case '0':
                      ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" checked />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                      <?php
                        break;
                      default:
                      ?>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="resolved" name="isComplete" value="1" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Resolved<span style="color:red;">*</span>
                        </td>
                        <td colspan=2 class="label-text">
                          <input type="checkbox" class="checkbox_group" id="defective" name="isComplete" value="0" />&nbsp;&nbsp;&nbsp;&nbsp;
                          Defective(to be referred to GSS for repair)<span style="color:red;">*</span>
                        </td>
                  <?php
                        break;
                    }
                  }
                  ?>

                <tr>
                  <td colspan=4 class="label-text">DEAR END USER, YOUR FEEDBACK IS IMPORTANT TO US:</td>



                  <td style="width:12.5%;" class="label-text">Started Date:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled type="text" name="started_date" placeholder="Started Date" class="datePicker1" value="<?PHP echo setStartDate(); ?>" required>

                    </div>
                  </td>
                  <td style="width:12.5%;" class="label-text">Completed Date:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled type="text" name="completed_date" placeholder="Completed Date" class="datePicker1" value="<?php echo setCompletedDate(); ?>" required>
                    </div>
                  </td>

                </tr>
                <tr>
                  <td colspan=4>
                  <td style="width:12.5%;" class="label-text">Started Time:<span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled id="timepicker" type="text" name="started_time" placeholder="Started Time" value="<?php echo setStartTime(); ?>" required>

                    </div>
                  </td>
                  <td style="width:12.5%;" class="label-text">Completed Time: <span style="color:red;">*</span></td>
                  <td style="width:12.5%;">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input disabled id="timepicker2" type="text" name="completed_time" placeholder="Completed Time" value="<?php echo setCompletedTime(); ?>" required>

                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=4 style="background-color:#EEEEEE;border:5px solid red;">
                    <ol>
                      <li class="label-text">Timeliness
                        <label style="font-weight:normal;">Was the ICT Staff able to provide immediate assistance within three (3) hours or agreed timeline?(Yes/No) </label><?php echo setTimeliness(); ?>
                      </li>
                      <li class="label-text">Quality
                        <p style="font-weight:normal;">At a rating scale of 1 to 5, kindly rate the service rendered?<br>(5-Outstanding, 4- Very Satisfactory, 3 - Satisfactory, 2 - Unsatisfactory, 1 - Poor)
                          <?php echo setQuality(); ?>
                      </li>
                    </ol>
                  </td>
                  <td colspan=4 style="background-color:#EEEEEE;text-align:center;"><u><?php echo setSigICT(); ?></u><br><span class="label-text">Signature over Printed Name</span></td>

                </tr>






              </table>