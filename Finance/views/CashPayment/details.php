<!-- <div class="col-md-12">	
  <div class="box box-primary dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> Disbursement Voucher</h3>
  			<div class="box-tools pull-right">
  				<?php if (!$readonly): ?>
	  				<div class="btn-group">
	  					<button type="button" class="btn btn-md btn-primary btn-generate" data-toggle="modal" data-target="#modal-dv_list"><i class="fa fa-plus"></i> Add DV</button>
	  				</div>
  				<?php endif ?>
  			</div>
		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered tbl_dv_entries">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center" width="18%">CODE</th>
                		<th class="text-center" width="18%">OBLIGATION</th>
                		<th class="text-center" width="18%">PURCHASE ORDER</th>
                		<th class="text-center">GROSS</th>
                		<th class="text-center">DEDUCTIONS</th>
                		<th class="text-center">NET</th>
                		<?php if (!$readonly): ?>
                			<th class="text-center"></th>
                		<?php endif ?>
              		</tr>
        		</thead>
        		<tbody id="dv-body">
              		<?php foreach ($pdvs as $key => $dv): ?>
              			<tr class="main_dv_<?php echo $dv['dv_id']; ?>" id="main_dv_<?php echo $dv['dv_id']; ?>">
              				<td class="text-center">
              					<input class="dv_id" type="hidden" name="dvid[]" value="<?= $dv['dv_id']; ?>">
                        <input class="ob_id" type="hidden" name="obid[]" value="<?= $dv['id']; ?>">
                        <input class="p_gross" type="hidden" value="<?= $dv['p_gross']; ?>">
                        <input class="p_total_deductions" type="hidden" value="<?= $dv['p_total_deductions']; ?>">
              					<input class="p_net_amount" type="hidden" value="<?= $dv['p_net_amount']; ?>">
              					<span class="badge bg-info dv_number"><?= $dv['dv_number']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="badge bg-info serial_no" style="background-color:green;"><?= $dv['serial_no']; ?></span>
              				</td>
              				<td class="text-center">
              					<?= $dv['po_code']; ?>
              				</td>
              				<td class="text-center">
              					<span class="gross"><?= $dv['gross']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="total_deductions"><?= $dv['total_deductions']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="net_amount"><?= $dv['net_amount']; ?></span>
              				</td>
              				<?php if (!$readonly): ?>
	              				<td class="text-center">
	              					<div class="btn-group">
	              						<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>
	              					</div>
	              				</td>
              				<?php endif ?>
              			</tr>
              		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="3"><b>TOTAL</b></td>
                <td align="center">
                  <b>
                    <?php echo currencyTxtBox('total_dv_gross','total_gross'); ?>
                  </b>
                </td>
                <td align="center">
                  <b>
                    <?php echo currencyTxtBox('total_dv_deduction','x_total_dv_deduction'); ?>
                  </b>
                </td>
                <td align="center">
                  <b>
                    <?php echo currencyTxtBox('total_dv_net','total_net_amount'); ?>
                  </b>
                </td>
        			</tr>
        		</tfoot>
      		</table>
		</div>

		<div class="box-footer">
		</div>
	</div>
</div> -->

<!-- 
<div class="col-md-12">
	<div class="box box-warning dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> UACS</h3>
  			
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center" width="18%">OBLIGATION</th>
                		<th class="text-center" width="18%">FUND SOURCE</th>
                		<th class="text-center" width="18%">PPA</th>
                		<th class="text-center" width="18%">UACS</th>
                		<th class="text-center" width="18%">AMOUNT</th>
              		</tr>
        		</thead>
        		<tbody id="uacs-body">
              		<?php foreach ($uacs as $key => $uac): ?>
              			<tr class="ob-<?php echo $uac['ob_id']; ?>-row">
              				<td class="text-center">
                        <input class="p_amount" type="hidden" value="<?= $uac['p_amount']; ?>">
              					<span class="badge bg-info" style="background-color:green;"><?= $uac['serial_no']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="source_code"><?= $uac['source_code']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="ppa"><?= $uac['ppa']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="uacs"><?= $uac['uacs']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="amount"><?= $uac['amount']; ?></span>
              				</td>
              			</tr>
              		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="4"><b>TOTAL</b></td>
        				<td align="center">
                  <b>
                    <?php echo currencyTxtBox('total_ob_amount','x_total_ob_amount'); ?>
                  </b>
                </td>
        			</tr>
        		</tfoot>
      		</table>
		</div>

		<div class="box-footer">
		</div>
	</div>
</div> -->

<div class="col-md-12">
	<div class="box box-primary dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i>DISBURSEMENT VOUCHER | NTA/NCA</h3>
        <div class="box-tools pull-right">
          <?php if (!$readonly): ?>
            <div class="btn-group">
              <button type="button" class="btn btn-md btn-primary btn-generate" data-toggle="modal" data-target="#modal-dv_list"><i class="fa fa-plus"></i> Add NTA/NCA</button>
            </div>
          <?php endif ?>
        </div>
  			
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered" id="selected_table">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center">DV NUMBER</th>
                		<th class="text-center">NTA/NCA</th>
                		<th class="text-center">PARTICULAR</th>
                		<th class="text-center" width="20%">TOTAL AMOUNT</th>
                		<th class="text-center" width="20%">NTA BALANCE</th>
                    <th class="text-center" width="20%">DISBURSE AMOUNT</th>
                    <th class="text-center">DELETE</th>
              		</tr>
        		</thead>
        		<tbody id="nta-body">
              		<?php foreach ($ntaentries as $key => $nta): ?>
              			<tr class="ne-<?php echo $nta['pe_ne_id']; ?>-row">
              				<td class="text-center">
                        <span class="badge bg-green"><?= $nta['dv_number']; ?></span>
                        <input name="ne_id[]" type="hidden" value="<?= $nta['pe_ne_id']; ?>">
                        <input name="dvid[]" type="hidden" value="<?= $nta['pe_dv_id']; ?>">
                        <input name="obid[]" type="hidden" value="<?= $nta['pe_ob_id']; ?>">
                       <input name="ob_is_dfunds" type="hidden" value="<?= $nta['ob_is_dfunds']; ?>">
                       <input name="ob_supplier" type="hidden" value="<?= $nta['ob_supplier']; ?>">
              				</td>
              				<td class="text-center">
              					<span class="nta_number"><?= $nta['nta_number']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="nta_particular"><?= $nta['nta_particular']; ?></span>
              				</td>
                      <td class="text-center">
                        <span class="nta_amount"><?= $nta['nta_amount']; ?></span>
                        <input name="nta_amount" type="hidden" value="<?= $nta['nta_amount']; ?>">
                      </td>
              				<td class="text-center">
              					<span class="nta_balance"><?= $nta['nta_balance']; ?></span>
                        <input name="nta_balance" type="hidden" value="<?= $nta['nta_balance']; ?>">
              				</td>
              				<td class="text-center">
              					<span class="ne_disbursed_amount"><?= $nta['ne_disbursed_amount']; ?></span>
                        <input name="disbursed_amount" type="hidden" value="<?= $nta['disbursed_amount']; ?>">
              				</td>
                      <td class="text-center">
                        <?php if ( $data['status'] != 'Delivered to Bank'): ?>
                          <button type="button" class="btn btn-sm btn-danger" id="btn_remove_nta" data-id="<?= $nta['pe_ne_id']; ?>"><i class="fa fa-trash" id="btn_remove_nta"></i></button>
                        <?php endif ?>
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