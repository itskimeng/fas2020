<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<a href="cash_payment.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-close"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="row pull-right">
  						<div class="col-md-12">
  							<?php if (isset($data['status']) AND $data['status'] != 'Paid' AND $data['status'] != 'Delivered to Bank') : ?>
			  					<div class="btn-group">
									<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
								</div>
			  					<div class="btn-group">
									<a href="Finance/route/update_payment.php?id=<?= $_GET['id'];?>" class="bt"><span class="label label-success" style="font-size: 14.5px; background-color: #06313b !important;">Paid</span> </a>
								</div>
							<?php elseif (isset($data['status']) AND $data['status'] == 'Paid') : ?>
								<div class="btn-group">
									<a href="Finance/route/deliver_payment.php?id=<?= $_GET['id'];?>" class="btn btn-success"><i class="fa fa-bank"></i> Deliver to Bank</a>
								</div>
							<?php endif; ?>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-success dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-edit"></i> LDDAP</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-3">
		  					<?= group_textnew('Account No', 'source_no', $data['account_no'], 'source_no', $readonly); ?>
		  				</div>
		  				<div class="col-md-3">
		  						
		  				</div>
		  				<div class="col-md-3">
		  					
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_date2('Date Created', 'date_created', 'date_created', !empty($data['date_created']) ? $data['date_created'] : $now, 'date_created', 1, true); ?>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-6">
		  					<div class="row">
		  						<div class="col-md-6">
		  							<?= group_textnew('LDDAP-ADA/Check', 'lddap', $data['lddap'], 'lddap', $readonly); ?>	
		  						</div>
		  						<div class="col-md-6">
		  							<?= group_date2('LDDAP Date', 'lddap_date', 'lddap_date', !empty($data['lddap_date']) ? $data['lddap_date'] : $now, 'lddap_date', 1, $readonly); ?>
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('Google Link', 'link', $data['link'], 'link', $readonly); ?>	
		  						</div>
		  					</div>
		  				</div>
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textarea('Remarks', 'remarks', $data['remarks'], 1, true, $readonly, 5); ?>
		  							
		  						</div>
		  					</div>
		  				</div>
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('Status', 'status', isset($data['status']) ? $data['status'] : $status, 'status', true); ?>	
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('Created By', 'created_by', $current_user, 'created_by', true); ?>
		  						</div>
		  					</div>
		  				</div>
		  			</div>
		  			

  				</div>
  			</div>
  		</div>
  	</div>		
</div>