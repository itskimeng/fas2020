<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <div class="panel-heading bg-orange color-palette">
      	<strong><a href="DTR.php" style="color:white!important;"><i class="fa fa-clock-o"></i> ONLINE DTR</a></strong>
      	<?php if ($username == 'masacluti' || $username = ''): ?>
      		<?php if ($t_o != NULL || $o_b != NULL): ?>

            <?php else: ?>
              &nbsp &nbsp &nbsp   <input type="checkbox" value="t_o" name="to" id="to" onclick='javascript:yesnoCheck();'> <strong>TO</strong>
              &nbsp &nbsp &nbsp   <input type="checkbox" value="o_b" name="ob" id="ob" onclick='javascript:yesnoCheck1();'> <strong>OB</strong>
            <?php endif ?>
        <?php else: ?>

        <?php endif ?>

        <div class="pull-right" hidden>
          <input type="checkbox" id="ck"><font style="color:blue;"><strong>PM Half-day</strong></font>
        </div>
    </div>
    <div class="">
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
                		<td class="pull-left"><b>AM ARRIVAL</b></td>
                    	<?php if (mysqli_num_rows($check1)>0): ?>
                      	<td ><?php echo date('h:i A',strtotime($time_inL))?></td>
                      <?php else: ?>
                        <td ><button class="btn btn-success " name="stamp1" id="" type="submit"><i class="fa fa-sign-in"></i> Stamp</button></td>
                      <?php endif ?>
                    </tr>
                    <tr>
                      <td class="pull-left"><b>AM DEPARTURE</b></td>
                      <?php if (mysqli_num_rows($check2)>0): ?>
                        <td><?php echo date('h:i A',strtotime($lunch_inL))?>
                      </td>
                      <?php else: ?>
                        <td ><button class="btn btn-success " name="stamp2" id="" type="submit"><i class="fa  fa-sign-out"></i> Stamp</button></td>
                      <?php endif ?>
                    </tr>
                    <tr>
                      <td class="pull-left"><b>PM ARRIVAL</b></td>
                      <?php if (mysqli_num_rows($check3)>0): ?>
                        <td><?php echo date('h:i A',strtotime($lunch_outL))?>
                      </td>
                      <?php else: ?>
                        <td>
                        	<button  class="btn btn-success" name="stamp3" type="submit"><i class="fa fa-sign-in"></i> Stamp</button>
                        </td>
                      <?php endif ?>
                    </tr>

                    <tr>
                      <td class="pull-left"><b>PM DEPARTURE</b></td>
                      <?php if (mysqli_num_rows($check4)>0): ?>
                        <td ><?php echo date('h:i A',strtotime($time_outL))?></td>
                        <?php else: ?>
                          <td ><button class="btn btn-success" name="stamp4" type="submit"><i class="fa  fa-sign-out"></i> Stamp</button></td>
                        <?php endif ?>
                    </tr>
                </form>
            </table>
        <?php endif ?>
    </div>	
    </div>
    <div class="col-lg-12">
		<div class="row" style="margin-top:-5%;">
			<div class="btn-goup">
				<!-- <button class = "btn btn-danger btn-lg btndisable" style = "width:100%;" id = "healthDec" value ="Don't forget to Accomplish the <br>ONLINE HEALTH DECLARATION FORM here">Don't forget to Accomplish the <br>ONLINE HEALTH DECLARATION FORM here.</button> -->
				<a class="btn btn-block btn-social btn-google" id="healthDec" value="Don't forget to Accomplish the <br>ONLINE HEALTH DECLARATION FORM here">
					<i class="fa fa-exclamation" style="padding:2%;"></i> Don't forget to Accomplish your <br><b>Online Health Declaration Form</b> here
				</a>
			</div>
		</div>
	</div>
</div>    
        