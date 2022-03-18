<div class="col-md-12">
		<div class="box box-primary dropbox">
			<div class="box-header">
	  			<h3 class="box-title"><i class="fa fa-list-ul"></i> Entries</h3>
	  			<div class="box-tools pull-right">
	  				<?php if ($is_admin AND !$fsource['is_lock']): ?>
						<div class="btn-group">
							<button type="button" class="btn btn-md btn-primary btn-add_entry"><i class="fa fa-plus"></i> Add Entry</button>
						</div>
	  				<?php endif ?>
	  				<div class="btn-group">
						<a href="budget_fundsource_objectcode.php?division=<?= $_SESSION['division']; ?>" class="btn btn-md btn-success btn-add_entry" target="_blank"><i class="fa fa-plus"></i> Add UACS</a>
					</div>
				</div>
	  		</div>

			<div class="box-body">
				<table id="exp_class" class="table table-striped table-bordered">
            		<thead>
            			<tr class="custom-tb-header">
	                		<th class="text-center" width="25%">EXPENSE CLASS</th>
	                		<th class="text-center" width="20%">UACS</th>
	                		<th class="text-center" width="15%">ALLOTMENT AMOUNT</th>
	                		<th class="text-center" width="15%">OBLIGATED AMOUNT</th>
	                		<th class="text-center" width="15%">BALANCE</th>
	                		<?php if ($is_admin AND !$fsource['is_lock']): ?>
	                			<th></th>
	                		<?php endif ?>
	              		</tr>
            		</thead>
            		<tbody id="box-entries">
	              		<?php foreach ($fsentries as $key => $entry): ?>
	              			<tr>
	              				<td>
	              					<?php if ($entry['is_used'] OR $fsource['is_lock']): ?>
	              						<?= group_select('Expense Class', 'expense_class[]', $expenseclass_opts, $entry['expense_class'], 'expense_class', 0, true); ?>
	              					<?php else: ?>	
	              						<?= group_select('Expense Class', 'expense_class[]', $expenseclass_opts, $entry['expense_class'], 'expense_class', 0, $is_admin ? false : true); ?>
	              					<?php endif ?>
	              				</td>
	              				<td>
	              					<?php if ($entry['is_used'] OR $fsource['is_lock']): ?>
	              						<?= group_select('UACS', 'uacs[]', $uacs_opts, $entry['uacs'], 'uacs', 0, true); ?>
	              					<?php else: ?>	
	              						<?= group_select('UACS', 'uacs[]', $uacs_opts, $entry['uacs'], 'uacs', 0, $is_admin ? false : true); ?>
	              					<?php endif ?>
	              				</td>
	              				<td>
	              					<?php if ($entry['is_used'] OR $fsource['is_lock']): ?>
	              						<?= group_amount('Amount', 'amount[]', number_format($entry['allotment_amount'], 2, '.', ','), 'amount', true, 0); ?>
	              					<?php else: ?>	
	              						<?= group_amount('Amount', 'amount[]', number_format($entry['allotment_amount'], 2, '.', ','), 'amount', $is_admin ? false : true, 0); ?>
	              					<?php endif ?>

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
	              				<?php if ($is_admin AND !$fsource['is_lock']): ?>
		              				<td>
		              					<?php if (!$entry['is_used'] AND !$fsource['is_lock']): ?>
		              						<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-trash"></i> Remove</button>
		              					<?php endif ?>
		              				</td>
	                			<?php endif ?>
	              			</tr>
	              		<?php endforeach ?>
            		</tbody>
            		<tfoot>
            			<tr>
            				<td class="text-right" colspan="2"><strong>Total</strong></td>
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