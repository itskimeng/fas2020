<div class="col-md-12">
		<div class="box box-primary dropbox">
			<div class="box-header">
	  			<h3 class="box-title"><i class="fa fa-list-ul"></i> Entries</h3>
	  			<div class="box-tools pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-md btn-primary btn-add_entry"><i class="fa fa-plus"></i> Add Entry</button>
					</div>
				</div>
	  		</div>

			<div class="box-body">
				<table class="table table-striped table-bordered">
            		<thead>
            			<tr class="custom-tb-header">
	                		<th class="text-center" width="18%">EXPENSE CLASS</th>
	                		<th class="text-center" width="18%">UACS</th>
	                		<th class="text-center" width="18%">GROUP</th>
	                		<th class="text-center">ALLOTMENT AMOUNT</th>
	                		<th class="text-center">OBLIGATED AMOUNT</th>
	                		<th class="text-center">BALANCE</th>
	                		<th></th>
	              		</tr>
            		</thead>
            		<tbody id="box-entries">
	              		<?php foreach ($fsentries as $key => $entry): ?>
	              			<tr>
	              				<td>
	              					<?= group_select('Expense Class', 'expense_class[]', $expenseclass_opts, $entry['expense_class'], 'expense_class', 0); ?>
	              				</td>
	              				<td>
	              					<?= group_textnew('UACS', 'uacs[]', $entry['uacs'], 'uacs', false, 0); ?>
	              				</td>
	              				<td>
	              					<?= group_textnew('Group', 'group[]', $entry['expense_group'], 'group', false, 0); ?>	
	              				</td>
	              				<td>
	              					<?= group_amount('Amount', 'amount[]', number_format($entry['allotment_amount'], 2, '.', ','), 'amount', false, 0); ?>
		  							<?= group_input_hidden('amount_hidden[] amount_hidden', number_format($entry['allotment_amount'], 2, '.', '')); ?>
	              				</td>
	              				<td>
	              					<?= group_amount('Obligated Amount', 'obligated_amt[]', number_format($entry['obligated_amount'], 2, '.', ','), 'obligated_amt', true, 0); ?>
	              					<?= group_input_hidden('obligated_hidden[] obligated_hidden', number_format($entry['obligated_amount'], 2, '.', '')); ?>
	              				</td>
	              				<td>
	              					<?= group_amount('Balance', 'balance[]', number_format($entry['balance'], 2, '.', ','), 'balance', true, 0); ?>
	              					<?= group_input_hidden('balance_hidden[] balance_hidden', number_format($entry['balance'], 2, '.', '')); ?>
	              				</td>
	              				<td>
	              					<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>
	              				</td>
	              			</tr>
	              		<?php endforeach ?>
            		</tbody>
            		<tfoot>
            			<tr>
            				<td class="text-right" colspan="3"><strong>Total</strong></td>
	              			<td>
	              				<?= group_amount('Total Alloment Amount', 'total_amount', $fsource['total_allotment_amount'], 'total_amount', true, 0); ?>
            				</td>
            				<td>
	              				<?= group_amount('Total Obligated Amount', 'total_obligated', $fsource['total_allotment_obligated'], 'total_obligated', true, 0); ?>
            				</td>
            				<td>
	              				<?= group_amount('Total Balance', 'total_balance', $fsource['total_balance'], 'total_balance', true, 0); ?>
            				</td>
            			</tr>
            		</tfoot>
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