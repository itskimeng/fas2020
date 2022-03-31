<div class="col-md-12">	
  <div class="box box-primary dropbox" style="border-top-color:#ae52f0;">
		<div class="box-header">
  		<h3 class="box-title"><i class="fa fa-list-ul"></i> Disbursement Voucher</h3>
  		<div class="box-tools pull-right">
  			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
        </button>
  		</div>
  	</div>

		<div class="box-body">
			<table class="table table-striped table-bordered tbl_dv_entries">
        		<thead>
        			<tr class="custom-tb-header" style="background-color:#d8a9fa;">
                		<th class="text-center" width="18%">CODE</th>
                		<th class="text-center" width="18%">ORS/BURS</th>
                		<th class="text-center" width="18%">PURCHASE ORDER</th>
                		<th class="text-center" width="18%">GROSS</th>
                		<th class="text-center">DEDUCTIONS</th>
                		<th class="text-center">NET</th>
              		</tr>
        		</thead>
        		<tbody id="dv-body">
        			<tr>
        				<td class="text-center">
                  <span class="badge badge-blue">DV-01-0001</span><br>
                  03/20/2022<br>
                  <i><b>~jsodsod~</b></i>
                </td>
        				<td class="text-center">
                  <span class="badge badge-blue">ORS-01-0001</span><br>
                  03/18/2022<br>
                  <i><b>~masacluti~</b></i>
                </td>
        				<td class="text-center">
                  <span class="badge badge-blue">PO-01-0001</span><br>
                  03/15/2022<br>
                  <i><b>~jpcastillo~</b></i>
                </td>
        				<td class="text-center">₱10,000.00</td>
        				<td class="text-center">₱200.00</td>
        				<td class="text-center">₱9,800.00</td>
        			</tr>
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
          			</tr>
          		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="3"><b>TOTAL</b></td>
                <td align="center">
                  <b>₱10,000.00</b>
                </td>
                <td align="center">
                  <b>₱200.00</b>
                </td>
                <td align="center">
                  <b>₱9,800.00</b>
                </td>
        			</tr>
        		</tfoot>
      		</table>
		</div>

		<div class="box-footer">
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="box box-warning dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> UACS</h3>
	  		<div class="box-tools pull-right">
	  			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
	        </button>
	  		</div>
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header" style="background-color:#ffcc7a;">
                		<th class="text-center" width="18%">ORS/BURS</th>
                		<th class="text-center" width="18%">FUND SOURCE</th>
                		<th class="text-center" width="18%">PPA</th>
                		<th class="text-center" width="12%">UACS</th>
                		<th class="text-center" width="18%">AMOUNT</th>
              		</tr>
        		</thead>
        		<tbody id="uacs-body">
        			<tr>
        				<td class="text-center">
                  <span class="badge badge-blue">ORS-01-0001</span><br>
                  03/18/2022<br>
                  <i><b>~masacluti~</b></i>
                </td>
        				<td class="text-center">REGULAR MOOE</td>
        				<td class="text-center">310100100001000 - Supervision and Development of Local Government</td>
        				<td class="text-center">Drugs and Medicines Expenses 5-02-03-070-00</td>
        				<td class="text-center">₱9,800.00</td>
        			</tr>
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
                  <b>₱9,800.00</b>
                </td>
        			</tr>
        		</tfoot>
      		</table>
		</div>

		<div class="box-footer">
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="box box-danger dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> NTA/NCA</h3>
  			<div class="box-tools pull-right">
	  			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-chevron-down"></i>
	        </button>
	  		</div>
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header" style="background-color:#ffa59a;">
                		<th class="text-center" width="18%">DV</th>
                		<th class="text-center" width="18%">NTA/NCA</th>
                		<th class="text-center" width="18%">PARTICULAR</th>
                		<th class="text-center" width="18%">TOTAL AMOUNT</th>
                		<th class="text-center">NTA BALANCE</th>
                    <th class="text-center">DISBURSE AMOUNT</th>
              		</tr>
        		</thead>
        		<tbody id="nta-body">
        			<tr>
        				<td class="text-center">
                  <span class="badge badge-blue">DV-01-0001</span><br>
                  03/20/2022<br>
                  <i><b>~jsodsod~</b></i>    
                </td>
        				<td class="text-center">NTA-2022-001	</td>
        				<td class="text-center">Particulars 123s</td>
        				<td class="text-center">₱50,000.00</td>
        				<td class="text-center">₱25,000.00</td>
        				<td class="text-center">₱25,800.00</td>
        			</tr>
          		<?php foreach ($ntas as $key => $nta): ?>
          			<tr class="dv-<?php echo $nta['dv_id']; ?>-row">
          				<td class="text-center">
                    <input class="p_nta_amount" type="hidden" value="<?= $nta['p_nta_amount']; ?>">
                    <input class="p_nta_balance" type="hidden" value="<?= $nta['p_nta_balance']; ?>">
                    <input class="p_nta_disbursed_amount" type="hidden" value="<?= $nta['p_nta_disbursed_amount']; ?>">
                    <span class="badge bg-info"><?= $nta['dv_number']; ?></span>
          				</td>
          				<td class="text-center">
          					<span class="nta_number"><?= $nta['nta_number']; ?></span>
          				</td>
          				<td class="text-center">
          					<span class="particular"><?= $nta['particular']; ?></span>
          				</td>
                  <td class="text-center">
                    <span class="amount"><?= $nta['amount']; ?></span>
                  </td>
          				<td class="text-center">
          					<span class="balance"><?= $nta['balance']; ?></span>
          				</td>
          				<td class="text-center">
          					<span class="disbursed_amount"><?= $nta['disbursed_amount']; ?></span>
          				</td>
                  <td class="text-center">
                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash" id="btn_remove_nta"></i></button>
                  </td>
          			</tr>
          		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="3"><b>TOTAL</b></td>
                <td align="center">
                  <b>₱50,000.00</b>
                </td>
                <td align="center">
                  <b>₱25,000.00</b>
                </td>
                <td align="center">
                  <b>₱25,500.00</b>
                </td>
        			</tr>
        		</tfoot>
      		</table>
		</div>
	</div>
</div>