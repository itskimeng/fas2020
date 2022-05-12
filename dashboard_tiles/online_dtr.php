<div class="col-md-3 col-sm-6 col-xs-12">
  
  <div class="col-xs-12">
    <div class="row">
      <div class="info-box">
        <div class="panel-heading bg-orange color-palette">
        	<strong><a href="DTR.php" style="color:white!important;"><i class="fa fa-clock-o"></i> ONLINE DTR</a></strong>
        	<!-- <?php //if ($username == 'masacluti' || $username = ''): ?>
        		<?php //if ($t_o != NULL || $o_b != NULL): ?>

              <?php //else: ?>
                &nbsp &nbsp &nbsp   <input type="checkbox" value="t_o" name="to" id="to" onclick='javascript:yesnoCheck();'> <strong>TO</strong>
                &nbsp &nbsp &nbsp   <input type="checkbox" value="o_b" name="ob" id="ob" onclick='javascript:yesnoCheck1();'> <strong>OB</strong>
              <?php //endif ?>
          <?php //else: ?>

          <?php //endif ?> -->

          <div class="pull-right" hidden>
            <input type="checkbox" id="ck"><font style="color:blue;"><strong>PM Half-day</strong></font>
          </div>
        </div>
        
        <div>  
          <?php if ($t_o != NULL): ?>
            	<label> &nbsp&nbspRemarks (Travel Order)</label>
              <textarea class="form-control"><?php echo $t_o?></textarea>
          <?php endif ?>
          
          <?php if ($o_b != NULL): ?>
            	<label> &nbsp&nbspRemarks (Official Business)</label>
              <textarea class="form-control"><?php echo $o_b?></textarea>
          <?php endif ?>
          <form method="POST">
            <div class="H2" hidden>
            	<label> &nbsp&nbspRemarks</label>
            	<textarea class="form-control" name="remarksOBTO1"></textarea>
            	<br>
            	<input type="text" name="t_o" id="t_o" value="t_o" hidden disabled>
            	<button class="btn btn-primary" type="submit" name="ob_to" style="float: right;">Submit</button>
            	<br><br><br>
            </div>
              <div class="H22" hidden>
                <label> &nbsp&nbspRemarks</label>
                <textarea class="form-control" name="remarksOBTO"></textarea>
                <br>
                <input type="text" name="o_b" id="o_b" value="o_b" hidden disabled>
                <button class="btn btn-primary" type="submit" name="ob_to" style="float: right;">Submit</button>
                <br><br><br>
              </div>
          </form>
          <?php if ($t_o != NULL || $o_b !=NULL): ?>

          <?php else: ?>
            <table id="example1" class="table table-striped H1" style="background-color: white;" >
              <form method="POST">
                <tr>
                  <td colspan="2">
                    <select required class="col-sm-2 form-control wf_arrangement" name="wf_arrangement" id="wf_arrangement" <?= $is_opt_disabled ? 'disabled' : ''; ?> style="border-radius: 5px;">
                      <option disabled <?php echo empty($workforce_opt) ? 'selected' : '';?>>-- Select Workforce Arrangement --</option>
                      <option value="wfh" <?php echo $workforce_opt == 'wfh' ? 'selected' : '';?>>Work from Home</option>
                      <option value="skeletal" <?php echo $workforce_opt == 'skeletal' ? 'selected' : '';?>>Skeleton Workforce</option>
                    </select>
                  </td>
                </tr>
                <tr style="height:51px;">
                  <td class="pull-left" style="padding-left: 31px!important;">
                    <b>AM ARRIVAL</b>
                  </td>
                  <td>
                    <?php if (mysqli_num_rows($check1)>0): ?>
                      <?php echo date('h:i A',strtotime($time_inL))?></td>
                    <?php else: ?>
                      <button class="btn btn-success dtr_stamp" name="stamp1" id="" type="submit" disabled>
                        <i class="fa fa-sign-in"></i> Stamp
                      </button>
                    <?php endif ?>
                  </td>
                </tr>
                <tr style="height:51px;">
                  <td class="pull-left" style="padding-left: 31px!important;">
                    <b>AM DEPARTURE</b>
                  </td>
                  <td>
                    <?php if (mysqli_num_rows($check2)>0): ?>
                      <?php echo date('h:i A',strtotime($lunch_inL))?>
                    <?php else: ?>
                      <button class="btn btn-success dtr_stamp" name="stamp2" id="" type="submit" <?php echo empty($workforce_opt) ? 'disabled' : '';?>>
                        <i class="fa  fa-sign-out"></i> Stamp
                      </button>
                    <?php endif ?>
                  </td>
                </tr>
                <tr style="height:51px;">
                  <td class="pull-left" style="padding-left: 31px!important;">
                    <b>PM ARRIVAL</b>
                  </td>
                  <td>
                    <?php if (mysqli_num_rows($check3)>0): ?>
                      <?php echo date('h:i A',strtotime($lunch_outL))?>
                    <?php else: ?>
                      <button  class="btn btn-success dtr_stamp" name="stamp3" type="submit" <?php echo empty($workforce_opt) ? 'disabled' : '';?>>
                        <i class="fa fa-sign-in"></i> Stamp
                      </button>
                    <?php endif ?>
                  </td>
                </tr>
                <tr style="height:51px;">
                  <td class="pull-left" style="padding-left: 31px!important;">
                    <b>PM DEPARTURE</b>
                  </td>
                  <td>
                    <?php if (mysqli_num_rows($check4)>0): ?>
                      <?php echo date('h:i A',strtotime($time_outL))?>    
                    <?php else: ?>
                      <button class="btn btn-success dtr_stamp" name="stamp4" type="submit" <?php echo empty($workforce_opt) ? 'disabled' : '';?>>
                        <i class="fa  fa-sign-out"></i> Stamp
                      </button>
                    <?php endif ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="padding: 5px">
                    <div class="btn-goup">
                      <a class="btn btn-block btn-social btn-google" id="healthDec" value="Don't forget to Accomplish the <br>ONLINE HEALTH DECLARATION FORM here" style="font-size: 13.5px;">
                        <i class="fa fa-exclamation" style="padding:2%; width: 31px;"></i> <b>Don't forget to Accomplish your <br>Online Health Declaration Form here</b>
                      </a>
                    </div>
                  </td>
                </tr>
              </form>
            </table>
          <?php endif ?>
        </div>	
      
        
      </div>
      


    </div>

  </div>
</div>

<script type="text/javascript">
    $(document).on('change', '.wf_arrangement', function(){
    $('.dtr_stamp').removeAttr('disabled');  
  })
</script>   



        