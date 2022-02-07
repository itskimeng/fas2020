<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<a href="cash_paid_payment.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-close"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="row pull-right">
  						<div class="col-md-12">
		  					<div class="btn-group">
								<button type="submit" class="btn btn-md btn-success btn-generate" name="save"><i class="fa fa-edit"></i> Save</button>
							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-4">
		  					<?= group_input_hidden('dvid', $data['dvid']); ?>
		  					<?= group_textnew('Account No', 'source_no', '', 'source_no', false); ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_textnew('ORS No', 'ors_no', $data['dv_no'], 'ors_no', true); ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_date2('Date', 'date_created', 'date_created', !empty($fsource['date_created']) ? $fsource['date_created'] : $now, 'date_created', 1); ?>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-4">
		  					<?= group_textnew('Gross', 'gross', $data['gross'], 'gross', true); ?>
						</div>
						<div class="col-md-4">
		  					<?= group_textnew('Total Deductions', 'total_deductions', $data['total_deductions'], 'total_deductions', true); ?>	
						</div>
						<div class="col-md-4">
		  					<?= group_textnew('Net', 'net', $data['net_amount'], 'net', true); ?>	
						</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-4">
		  					<?= group_textnew('LDDAP-ADA/Check', 'lddap', '', 'lddap', false); ?>	
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_textnew('Upload Google Link', 'link', '', 'lddap', false); ?>	
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_textarea('Remarks', 'remarks', '', 1, true, false, 4); ?>
		  				</div>
		  				<div class="col-md-4">
		  				</div>
		  			</div>

  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
		<div class="box box-primary dropbox">
			<div class="box-header">
	  			<h3 class="box-title"><i class="fa fa-list-ul"></i> Entries</h3>
	  			
	  		</div>

			<div class="box-body">
				<table class="table table-striped table-bordered">
            		<thead>
            			<tr class="custom-tb-header">
	                		<th class="text-center" width="18%">FUND SOURCE</th>
	                		<th class="text-center" width="18%">PPA</th>
	                		<th class="text-center" width="18%">UACS</th>
	                		<th class="text-center">AMOUNT</th>
	              		</tr>
            		</thead>
            		<tbody id="box-entries">
	              		<?php foreach ($entries as $key => $entry): ?>
	              			<tr>
	              				<td>
	              					<?= group_textnew('UACS', 'uacs[]', $entry['fund_source'], 'uacs', true, 0); ?>
	              					
	              				</td>
	              				<td>
	              					<?= group_textnew('UACS', 'uacs[]', $entry['uacs'], 'uacs', true, 0); ?>
	              				</td>
	              				<td>
	              					<?= group_textnew('Group', 'group[]', $entry['mfo_ppa'], 'group', true, 0); ?>	
	              				</td>
	              				<td>
	              					<?= group_amount('Amount', 'amount[]', $entry['amount'], 'amount', true, 0); ?>
		  						</td>
	              			</tr>
	              		<?php endforeach ?>
            		</tbody>
            		
          		</table>
			</div>

			<div class="box-footer">
				<!-- <div class="box-tools pull-right">
					<div class="btn-group">
						<button class="btn btn-primary btn-md"><i class="fa fa-save"></i> Save</button>
					</div>
				</div> -->
			</div>
		</div>
	</form>

</div>