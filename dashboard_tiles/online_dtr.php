<div class="col-md-3 col-sm-6 col-xs-12">
  
  <div class="col-xs-12" style="height: 300px !important; ">
    <div class="row">
      <div class="info-box">
        <div class="panel-heading bg-orange color-palette">
        	<strong><a href="DTR.php" style="color:white!important;"><i class="fa fa-clock-o"></i> ONLINE DTR</a></strong>
        </div>
        
        <div>  

     
          <table id="example1" class="table table-striped H1" style="background-color: white;" >
            <form method="POST">
              <tr>
                <td colspan="2">
                  <select required class="col-sm-2 form-control wf_arrangement" disabled="" name="wf_arrangement" id="wf_arrangement" <?php echo $is_opt_disabled ? 'disabled' : ''; ?>>
                    <option disabled <?php echo empty($workforce_opt) ? 'selected' : '';?>>-- Select Workforce Arrangement --</option>
                    <option value="wfh" <?php echo $workforce_opt == 'wfh' ? 'selected' : '';?>>Work from Home</option>
                    <option selected="" value="skeletal" <?php echo $workforce_opt == 'skeletal' ? 'selected' : '';?>>Skeleton Workforce</option>
                  </select>
                </td>
              </tr>
              <tr style="height:51px;">
                <td class="pull-left" style="padding-left: 31px!important;">
                  <b>AM ARRIVAL</b>
                </td>
                <td>
                  <?php if (count($check1) > 0): ?>
                    <?php echo date('h:i A',strtotime($check1['am_in']))?></td>
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
                  <?php if (count($check2) > 0): ?>
                    <?php echo date('h:i A',strtotime($check2['am_out']))?>
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
                  <?php if (count($check3) > 0): ?>
                    <?php echo date('h:i A',strtotime($check3['pm_in']))?>
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
                  <?php if (count($check4) > 0): ?>
                    <?php echo date('h:i A',strtotime($check4['pm_out']))?>    
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

        </div>	
      
        
      </div>
      


    </div>

  </div>
</div>

<script type="text/javascript">
    // $(document).on('change', '.wf_arrangement', function(){
    // $('.dtr_stamp').removeAttr('disabled');  
    $('.dtr_stamp').removeAttr('disabled');  
  // })
</script>   



        