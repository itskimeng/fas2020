<div class="box box-primary dropbox">
		  		<div class="box-header">
		  			<h3 class="box-title"><i class="fa fa-info-circle"></i> 1</h3>
		  			<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		          	</div>
		  		</div>
		  		<div class="box-body no-padding">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<table class="table table-striped">
				                <tbody>
				                	<tr class="custom-tb-header">
					                  <th class="text-center">Serial No.</th>
					                  <th class="text-center">PO</th>
					                  <th class="text-center">Date Received</th>
					                  <th class="text-center">Date Obligated</th>
					                  <th class="text-center">Date Returned</th>
					                  <th class="text-center">Date Released</th>
					                </tr>
					                <tr>
					                	<td><?= group_textnew('Serial Number', 'serial_no[]', '', 'serial_no', false, 0); ?></td>
					                	<td><?= group_textnew('Purchase Order', 'po_no[]', '', 'serial_no', false, 0); ?></td>
					                	<td><?= group_date2('Date Received', 'date_received[]', 'date_received', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Processed', 'date_processsed[]', 'date_processsed', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Returned', 'date_returned[]', 'date_returned', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Released', 'date_released[]', 'date_released', '', 'info-dates', 0); ?></td>
					                </tr>
					                <tr class="custom-tb-header">
					                  <th class="text-center" width="25%">Payee</th>
					                  <th class="text-center" width="25%">Supplier</th>
					                  <th class="text-center" colspan="4">Particulars/Purpose</th>
					                </tr>
					                <tr>
					                	<td><?= group_textnew('Payee', 'payee[]', '', 'payee', false, 0); ?></td>
					                	<td><?= group_textnew('Supplier', 'supplier[]', '', 'supplier', false, 0); ?></td>
					                	<td colspan="4"><?= group_textarea('Particulars', 'particulars[]', '', 0, true, false); ?></td>
					                </tr>
					            </tbody>
			          		</table>
		  				</div>
		  			</div>
		  		</div>
		  	</div>

		  	<div class="box box-primary dropbox">
		  		<div class="box-header">
		  			<h3 class="box-title"><i class="fa fa-info-circle"></i> 2</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		          	</div>
		  		</div>
		  		<div class="box-body no-padding">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<table class="table table-striped">
				                <tbody>
				                	<tr class="custom-tb-header">
					                  <th class="text-center">Serial No.</th>
					                  <th class="text-center">PO</th>
					                  <th class="text-center">Date Received</th>
					                  <th class="text-center">Date Obligated</th>
					                  <th class="text-center">Date Returned</th>
					                  <th class="text-center">Date Released</th>
					                </tr>
					                <tr>
					                	<td><?= group_textnew('Serial Number', 'serial_no[]', '', 'serial_no', false, 0); ?></td>
					                	<td><?= group_textnew('Purchase Order', 'po_no[]', '', 'serial_no', false, 0); ?></td>
					                	<td><?= group_date2('Date Received', 'date_received[]', 'date_received', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Processed', 'date_processsed[]', 'date_processsed', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Returned', 'date_returned[]', 'date_returned', '', 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Released', 'date_released[]', 'date_released', '', 'info-dates', 0); ?></td>
					                </tr>
					                <tr class="custom-tb-header">
					                  <th class="text-center" width="25%">Payee</th>
					                  <th class="text-center" width="25%">Supplier</th>
					                  <th class="text-center" colspan="4">Particulars/Purpose</th>
					                </tr>
					                <tr>
					                	<td><?= group_textnew('Payee', 'payee[]', '', 'payee', false, 0); ?></td>
					                	<td><?= group_textnew('Supplier', 'supplier[]', '', 'supplier', false, 0); ?></td>
					                	<td colspan="4"><?= group_textarea('Particulars', 'particulars[]', '', 0, true, false); ?></td>
					                </tr>
					                <tr>
					                	<td colspan="6">
					                		<div class="row">
					                			<div class="col-md-3">
					                				<?= group_textnew('Fund Source', 'fund_source[]', '', 'fund_source'); ?>
					                			</div>
					                			<div class="col-md-3">
					                				<?= group_textnew('MFO/PPA', 'ppa[]', '', 'ppa'); ?>
					                			</div>
					                			<div class="col-md-3">
					                				<?= group_textnew('UACS Object Code', 'uacs[]', '', 'uacs'); ?>
					                			</div>
					                			<div class="col-md-3">
					                				<?= group_textnew('Amount', 'amount[]', '', 'amount'); ?>
					                			</div>
					                		</div>
					                		<div class="row">
					                			<div class="col-md-6">
					                				<?= group_textarea('Remarks', 'remarks', '', 1, true, false, 3); ?>
					                			</div>
					                			<div class="col-md-3">
					                				<?= group_textnew('Group', 'group[]', '', 'group'); ?>
					                			</div>
					                			<div class="col-md-3">
					                				<?= group_select('Status', 'status', ['Obligated', 'Pending'], '', 'status', 1); ?>
					                			</div>
					                		</div>
					                	</td>
					                </tr>
					            </tbody>
			          		</table>
		  				</div>
		  			</div>
		  		</div>
		  	</div>	