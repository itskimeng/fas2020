<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<a href="funds_downloaded.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-arrow-circle-left"></i> Back</a>
					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-success dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-edit"></i> LDDAP - <span class="label label-info" style="font-size: 14.5px; background-color: #009d0a !important;">Delivered to Bank</span></h3>
			<div class="box-tools pull-right">
	  			<a href="https://getbootstrap.com/docs/4.0/components/forms/" class="btn btn-block btn-primary btn-sm" target="_blank">
	  				<i class="fa fa-external-link"></i> Open Link
	        	</a>
	  		</div>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-8">
  					<div class="row">
			  			<div class="col-md-4">
			  				<?= group_textnew('Account No', 'source_no', 'ACT-01-0001', 'source_no', true); ?>
			  			</div>
			  			<div class="col-md-4">
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_date2('Date Created', 'date_created', 'date_created', !empty($data['date_created']) ? $data['date_created'] : $now, 'date_created', 1, true); ?>
		  				</div>
  					</div>
  					<div class="row">
		  				<div class="col-md-4">
		  					<?= group_textnew('LDDAP-ADA/Check', 'lddap', 'LDDAP-01-0001', 'lddap', true); ?>	
		  						
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_date2('LDDAP Date', 'lddap_date', 'lddap_date', !empty($data['lddap_date']) ? $data['lddap_date'] : $now, 'lddap_date', 1, true); ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_textnew('Created By', 'created_by', $current_user, 'created_by', true); ?>
		  				</div>
		  			</div>
		  			
  				</div>
  				<div class="col-md-4">
  					<div class="row">
			  			<div class="col-md-12">
			  				<?= group_textarea('Remarks', 'remarks', 'Sample Remarks', 1, true, true, 5); ?>
			  			</div>
  					</div>
  					
		  			
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-success dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
			  			<div class="col-md-4">
			  				<div class="form-group">
			  					<label class="control-label">Fund Source:
			  						<div class="help-tip">
									    <p>Total Fund Allocation.</p>
									</div>
								</label><br>
								<div id="cgroup-fund_source" class="input-group">
									<span class="input-group-addon"><strong>₱</strong></span>
									<input id="cform-fund_source" placeholder="Fund Source" type="text" name="fund_source" class="form-control fund_source" value="25,000.00" novalidate readonly/>
			  					</div>
			  				</div>
			  			</div>	
			  			<div class="col-md-4">
			  				<div class="form-group">
			  					<label class="control-label">Running Balance:
			  						<div class="help-tip">
									    <p>Remaining balance from Allocated PRs & DVs in the system.</p>
									</div>
								</label><br>
								<div id="cgroup-running_balance" class="input-group">
									<span class="input-group-addon"><strong>₱</strong></span>
									<input id="cform-running_balance" placeholder="Fund Source" type="text" name="running_balance" class="form-control running_balance" value="0.00" novalidate readonly/>
			  					</div>
			  				</div>
		  				</div>
		  				<div class="col-md-4">
		  					<div class="form-group">
			  					<label class="control-label">Actual Balance:
			  						<div class="help-tip">
									    <p>Actual balance from Paid PRs & DVs in the system.</p>
									</div>
								</label><br>
								<div id="cgroup-actual_balance" class="input-group">
									<span class="input-group-addon"><strong>₱</strong></span>
									<input id="cform-actual_balance" placeholder="Fund Source" type="text" name="actual_balance" class="form-control actual_balance" value="10,000.00" novalidate readonly/>
			  					</div>
			  				</div>
		  				</div>
  					</div>
  				</div>
  				
  			</div>
  		</div>
  	</div>		
</div>

