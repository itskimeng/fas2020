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
  							<?php if ($_GET['status'] != 'Paid') : ?>
			  					<div class="btn-group">
									<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
								</div>
			  					<div class="btn-group">
									<button type="submit" class="btn btn-md btn-danger" name="paid">Paid <i class="fa fa-check"></i></button>
								</div>
							<?php else : ?>
								<div class="box-tools">
									<span class="label label-success" style="font-size: 14.5px; background-color: #06313b !important;">Paid</span>	
								</div>
							<?php endif; ?>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-6">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">

		  			<div class="row">
		  				<div class="col-md-12">
		  					<?= group_input_hidden('dvid', $data['dvid']); ?>
		  					<?= group_textnew('DV Number', 'dv_no', $data['de_dv_number'], 'dv_no', true); ?>
		  				</div>
		  				<div class="col-md-12">
		  					<?= group_textnew('ORS No', 'ors_no', $data['dv_no'], 'ors_no', true); ?>
		  				</div>
		  				<div class="col-md-12">
		  					<?= group_textnew('Gross', 'gross', $data['gross'], 'gross', true); ?>
						</div>
						<div class="col-md-12">
		  					<?= group_textnew('Total Deductions', 'total_deductions', $data['total_deductions'], 'total_deductions', true); ?>	
						</div>
						<div class="col-md-12">
		  					<?= group_textnew('Net', 'net', $data['net_amount'], 'net', true); ?>	<br>
						</div>
		  			</div>

  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-6">
	<div class="box box-success dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-edit"></i> LDDAP</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-6">
		  					<?= group_textnew('Account No', 'source_no', $data['p_account_no'], 'source_no', ($_GET['status'] == 'Paid') ? true : false); ?>
		  				</div>
		  				<div class="col-md-6">
		  					<?= group_textnew('LDDAP-ADA/Check', 'lddap', $data['p_lddap'], 'lddap', ($_GET['status'] == 'Paid') ? true : false); ?>	
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<?= group_date2('LDDAP Date', 'lddap_date', 'lddap_date', ($data['p_lddap_date'] == '00/00/0000') ? $now : $data['p_lddap_date'], 'date_created', 1, ($_GET['status'] == 'Paid') ? true : false); ?>
		  				</div>
		  				<div class="col-md-12">
		  					<?= group_textnew('Upload Google Link', 'link', $data['p_link'], 'lddap', ($_GET['status'] == 'Paid') ? true : false); ?>	
		  				</div>
		  				<div class="col-md-12">
		  					<?= group_textarea('Remarks', 'remarks', $data['p_remarks'], 1, true, ($_GET['status'] == 'Paid') ? true : false, 5); ?>
		  				</div>

		  			</div>

  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-warning dropbox">
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
</div>

<div class="col-md-12">
	<div class="box box-danger dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> NTA/NCA</h3>
  			
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center" width="18%">NTA/NCA</th>
                		<th class="text-center" width="18%">PARTICULAR</th>
                		<th class="text-center" width="18%">TOTAL AMOUNT</th>
                		<th class="text-center">NTA BALANCE</th>
                		<th class="text-center">DISBURSE AMOUNT</th>
              		</tr>
        		</thead>
        		<tbody id="box-entries">
              		<?php foreach ($nta_entries as $key => $nta): ?>
              			<tr>
              				<td><?php echo $nta['nta_number']; ?></td>
              				<td><?php echo $nta['particular']; ?></td>
              				<td><?php echo $nta['amount']; ?></td>
              				<td><?php echo $nta['balance']; ?></td>
              				<td><?php echo $nta['disbursed']; ?></td>
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
</div>