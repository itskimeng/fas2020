<div class="col-md-12">
	<form method="POST" action="">
		<div class="box box-primary dropbox">
		  		<div class="box-header">
		  			<h3 class="box-title"><i class="fa fa-info-circle"></i> Details</h3>
					<div class="box-tools pull-right">
			            <div class="btn-group">
							<a href="budget_ors.php" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Cancel</a>
						</div>
						<div class="btn-group">
							<button class="btn btn-primary btn-md btn-save btn-sm"><i class="fa fa-save"></i> Save</button>
						</div>
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
					                	<td><?= group_textnew('Purchase Order', 'po_no[]', $ob_po['po_no'], 'serial_no', true, 0); ?></td>
					                	<td><?= group_date2('Date Received', 'date_received[]', 'date_received', $ob_po['date_received'], 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Processed', 'date_processsed[]', 'date_processsed', $ob_po['date_proccess'], 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Returned', 'date_returned[]', 'date_returned', $ob_po['date_return'], 'info-dates', 0); ?></td>
					                  	<td><?= group_date2('Date Released', 'date_released[]', 'date_release', $ob_po['date_return'], 'info-dates', 0); ?></td>
					                </tr>
					                <tr class="custom-tb-header">
					                  <th class="text-center" width="25%">Payee</th>
					                  <th class="text-center" width="25%">Supplier</th>
					                  <th class="text-center" colspan="4">Particulars/Purpose</th>
					                </tr>
					                <tr>
					                	<td><?= group_textnew('Payee', 'payee[]', '', 'payee', false, 0); ?></td>
					                	<td><?= group_textnew('Supplier', 'supplier[]', $ob_po['supplier'], 'supplier', false, 0); ?></td>
					                	<td colspan="4"><?= group_textarea('Particulars', 'particulars[]', $ob_po['purpose'], 0, true, false); ?></td>
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
					                				<?= group_textnew('Amount', 'amount[]', '₱ ' .number_format($ob_po['amount'], 2), 'amount'); ?>
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
					                				<?= group_select('Status', 'status', ['Obligated', 'Pending'], $ob_po['status'], 'status', 1); ?>
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
	</form>

</div>