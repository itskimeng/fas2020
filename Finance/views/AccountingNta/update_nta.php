

<div class="col-md-12">
	<div class="callout callout-warning callout-dismissable">
		<ul style="margin-left: -2%;">
			<li><i class="fa fa-unlock-alt"></i> Unlock - wont appear NTA/NCA in Disbursement.</li>
			<li><i class="fa fa-lock"></i> Lock - will appear NTA/NCA in Disbursement.</li>
		</ul>
	 </div>
</div>


<div class="col-md-12">
  	<div class="box dropbox">
	    <div class="box-body">

  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<a href="accounting_nta.php" class="btn btn-md btn-default" name=""><i class="fa fa-close"></i> Close </a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="row pull-right">
  						<div class="col-md-12">
		  					<div class="btn-group">
		  						<?php if ($lock == 'readonly'): ?>
									<button type="submit" class="btn btn-md btn-warning" name="btn_unlock" id="btn_unlock"><i class="fa fa-lock"></i> Unlock</button>
								<?php else: ?>
									<button type="submit" class="btn btn-md btn-warning" name="btn_lock" id="btn_lock"><i class="fa fa-lock"></i> Lock </button>
		  						<?php endif ?>
							</div>
		  					<div class="btn-group">
								<button type="submit" class="btn btn-md btn-success" name="btn_post" id="btn_post"><i class="fa fa-edit"></i> Save</button>
							</div>
  						</div>
  					</div>
  				</div>
  			</div>

	    </div>
	</div>
</div>




<div class="col-md-7">
  	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
	    <div class="box-body">
		    	<div class="row">

		    		<div class="col-md-6">
		    			<label>NCA/NTA Date </label>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input required value="<?php echo $update['nta_date']; ?>" type="text" class="form-control pull-right" id="datepicker1" placeholder='Enter Date' name="nta_date" <?php echo $lock; ?>>
						</div>
		    		</div>
		    		<div class="col-md-6">
						<label>Received Date </label>
	                    <div class="input-group date" >
	                        <div class="input-group-addon">
	                            <i class="fa fa-calendar"></i>
	                        </div>
	                        <input required value="<?php echo $update['received_date']; ?>" type="text" class="form-control pull-right" id="datepicker2" placeholder='Enter Date' name="received_date" <?php echo $lock; ?>>
	                    </div>
		    		</div>
		    		<div class="col-md-6">
						<label>NCA/NTA No</label>
						<input  required  type="text" class="form-control" id="nta_number" placeholder="Enter NTA No" name="nta_number" value="<?php echo $update['nta_number']; ?>"  <?php echo $lock; ?>>
		    		</div>
		    		<div class="col-md-6">
	                    <label>SARO Number </label>
	                    <input  type="text"  class="form-control" id="saro_number" placeholder="Enter SARO Number" name="saro_number" value="<?php echo $update['saro_number']; ?>" <?php echo $lock; ?>>
		    		</div>
		    		<div class="col-md-6">
	                    <label>Account No</label>
	                	<input required  type="text" class="form-control" style="height: 35px;" id="account_number" placeholder="Enter Account No" name="account_number" value="<?php echo $update['account_number']; ?>" required <?php echo $lock; ?>>
		    		</div>
		    		<div class="col-md-6">
	                    <label>NCA/NTA Particular</label>
	                    <input  type="text"   class="form-control" style="height: 35px;" id="particular" placeholder="Enter Particular" name="particular" value="<?php echo $update['particular']; ?>" required <?php echo $lock; ?>>
		    		</div>
		    		<input type="number" name="id" value="<?php echo $update['id']; ?>" style="display: none;" <?php echo $lock; ?>>
		    	</div><!-- row -->
	    	<br><br>
	    </div><!-- end of box body -->
	</div>
</div>


<div class="col-md-5">
  	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
	    <div class="box-body">
		    	<div class="row">

		    		<div class="col-md-12">
						<label>NTA/NCA Quarters</label>
						<select class="form-control select input" name="quarter" id="nta_quarter" required  <?php echo $lock; ?>>
							<option value = "" selected="" disabled="">Select Quarter</option>
							<option value = "1Q" <?php if ($update['quarter'] == "1Q") { echo "selected"; } ?> >1st Quarter</option>
							<option value = "2Q" <?php if ($update['quarter'] == "2Q") { echo "selected"; } ?> >2nd Quarter</option>
							<option value = "3Q" <?php if ($update['quarter'] == "3Q") { echo "selected"; } ?> >3rd Quarter</option>
							<option value = "4Q" <?php if ($update['quarter'] == "4Q") { echo "selected"; } ?> >4th Quarter</option>
						</select>
		    		</div>
		    		<div class="col-md-12">
	                    <label>Allotment Amount</label>
	                    <input required="" type="number"  class="form-control" id="amount" step="any" placeholder="Enter Amount" name="amount" value="<?php echo $update['amount']; ?>" <?php echo $lock; ?>>
		    		</div>
		    		<div class="col-md-12">
	                    <label>Disbursement </label>
	                    <input  type="text" class="form-control" id="obligated" placeholder="Enter Obligated" name="obligated" value="<?php echo $update['obligated']; ?>" <?php echo $lock; ?>>
		    		</div>
		    		<div class="col-md-12">
	                    <label>Balance</label>
	                    <input  type="text" class="form-control" id="balance" placeholder="Balance is from Allotment Amount - Disbursed Amount" name="balance" value="<?php echo $update['balance']; ?>" <?php echo $lock; ?>>
		    		</div>
		    		<input type="number" name="id" value="<?php echo $update['id']; ?>" style="display: none;">
		    	</div><!-- row -->
	    	<br>
	    </div><!-- end of box body -->
	</div>
</div>
