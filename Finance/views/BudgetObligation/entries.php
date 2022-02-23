<div class="col-md-12">
		<div class="box dropbox">
			<div class="box-header">
	  			<h3 class="box-title"><i class="fa fa-info-circle"></i> Entries</h3>
	  			<div class="box-tools pull-right">
					<div class="btn-group">
						<?php if ($is_admin AND !$is_readonly): ?>
							<button type="button" class="btn btn-md btn-primary btn-generate"><i class="fa fa-plus"></i> Generate</button>
				        <?php elseif ($is_admin AND $data['status'] == 'Released'): ?>
							<button type="button" class="btn btn-md btn-primary btn-generate hidden"><i class="fa fa-plus"></i> Generate</button>
						<?php else: ?>
							<button type="button" class="btn btn-md btn-primary btn-generate hidden"><i class="fa fa-plus"></i> Generate</button>
				        <?php endif ?>

					</div>
				</div>
	  		</div>

			<div class="box-body">
				<table class="table table-striped table-bordered">
            		<thead>
            			<tr class="custom-tb-header">
	                		<th class="text-center" width="20%">Fund Source</th>
	                		<th class="text-center" width="20%">MFO/PPA</th>
	                		<th class="text-center" width="20%">UACS</th>
	                		<th class="text-center">Amount</th>
	                		<?php if (!$is_readonly): ?>
	                			<th></th>
	                		<?php endif ?>
	              		</tr>
            		</thead>
            		<tbody id="box-entries">
            			<?php foreach ($entries as $key => $entry): ?>
            				<tr>
            					<td>
            						<?= group_customselect('Fund Source', 'fund_source[]', $fund_sources, $entry['fund_source'], 'fund_source', 0, 0, $is_readonly); ?>
            					</td>
            					<td>
            						<?= group_textnew('MFO/PPA', 'ppa[]', $entry['mfo_ppa'], 'ppa', true, 0); ?>
            					</td>
            					<td>
            						
            						<div id="cgroup-uacs[]" class="form-group">
            							<select id="cform-uacs[]" name="uacs[]" class="form-control select_2 uacs" data-placeholder="-- Select UACS Object Code --" style="width: 100%;" <?= $is_readonly ? 'readonly' : ''; ?>>
            								<option value="" disabled>-- Please select UACS Object Code --</option>
            								<?php foreach ($uacs_opts[$entry['fund_source']] as $key => $uacs): ?>
            									<?php if ($uacs['id'] == $entry['uacs']): ?>
            										<option value="<?= $uacs['id']; ?>" data-amount="<?= $uacs['allotment_amount'];?>" selected><?= $uacs['uacs']; ?></option>
            									<?php else: ?>
            										<option value="<?= $uacs['id']; ?>" data-amount="<?= $uacs['allotment_amount'];?>"><?= $uacs['uacs']; ?></option>
            									<?php endif ?>
            								<?php endforeach ?>
            							</select>
            						</div>
            					</td>
            					<td>
            						<?= group_amount('Amount', 'amount[]', number_format($entry['amount'], 2, '.', ','), 'entry_amount', $is_readonly, 0); ?>
            						<?= group_input_hidden('amount_hidden[] amount_hidden', $entry['amount']); ?>
            						<?= group_input_hidden('amount_limit[] amount_limit', $entry['uacs_balance']); ?>

            					</td>
            					<?php if (!$is_readonly): ?>
	            					<td>
	            						<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>
	            					</td>
            					<?php endif ?>
            				</tr>
            			<?php endforeach ?>
            		</tbody>
            		<tfoot>
            			<tr>
            				<td class="text-right" colspan="3"><strong>Total</strong></td>
            				<td><?= group_amount('Amount', 'total_amount', $has_entries ? number_format($data['total_amount'], 2, '.', ',') : 0.00, 'total_amounts', true, 0); ?></td>
            				<?php if (!$is_readonly): ?>
            					<td></td>
            				<?php endif ?>
            			</tr>
            		</tfoot>
          		</table>
			</div>

			<div class="box-footer">
			</div>
		</div>
	</form>

</div>