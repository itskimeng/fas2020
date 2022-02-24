<div class="col-md-12">
	<div class="box box-warning dropbox">
		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-list-ul"></i> Disbursement Voucher</h3>
  			<div class="box-tools pull-right">
  				<div class="btn-group">
  					<button type="button" class="btn btn-md btn-primary btn-generate" data-toggle="modal" data-target="#modal-dv_list"><i class="fa fa-plus"></i> Add</button>
  				</div>	
  			</div>
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center" width="18%">CODE</th>
                		<th class="text-center" width="18%">OBLIGATION</th>
                		<th class="text-center" width="18%">GROSS</th>
                		<th class="text-center">DEDUCTIONS</th>
                		<th class="text-center">NET</th>
                		<th class="text-center"></th>
              		</tr>
        		</thead>
        		<tbody id="dv-body">
              		<?php foreach ($pdvs as $key => $dv): ?>
              			<tr>
              				<td class="text-center">
              					<input type="hidden" name="dvid[]" value="<?= $dv['dv_id']; ?>">
              					<input type="hidden" name="obid[]" value="<?= $dv['id']; ?>">
              					<span class="badge bg-info"><?= $dv['dv_number']; ?></span>
              				</td>
              				<td class="text-center">
              					<span class="badge bg-info" style="background-color:green;"><?= $dv['serial_no']; ?></span>
              				</td>
              				<td class="text-center">
              					<?= $dv['gross']; ?>
              				</td>
              				<td class="text-center">
              					<?= $dv['total_deductions']; ?>
              				</td>
              				<td class="text-center">
              					<?= $dv['net_amount']; ?>
              				</td>
              				<td class="text-center">
              					<div class="btn-group">
              						<button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button>
              					</div>
              				</td>
              			</tr>
              		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="2"><b>TOTAL</b></td>
        				<td></td>
        				<td></td>
        				<td></td>
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
              			<tr>
              				<td class="text-center">
              					<span class="badge bg-info" style="background-color:green;"><?= $uac['serial_no']; ?></span>
              				</td>
              				<td class="text-center">
              					<?= $uac['source_code']; ?>
              				</td>
              				<td class="text-center">
              					<?= $uac['ppa']; ?>
              				</td>
              				<td class="text-center">
              					<?= $uac['uacs']; ?>
              				</td>
              				<td class="text-center">
              					<?= $uac['amount']; ?>
              				</td>
              			</tr>
              		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="4"><b>TOTAL</b></td>
        				<td></td>
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
  			
  		</div>

		<div class="box-body">
			<table class="table table-striped table-bordered">
        		<thead>
        			<tr class="custom-tb-header">
                		<th class="text-center" width="18%">DV</th>
                		<th class="text-center" width="18%">NTA/NCA</th>
                		<th class="text-center" width="18%">PARTICULAR</th>
                		<th class="text-center" width="18%">TOTAL AMOUNT</th>
                		<th class="text-center">NTA BALANCE</th>
                		<th class="text-center">DISBURSE AMOUNT</th>
              		</tr>
        		</thead>
        		<tbody id="nta-body">
              		<?php foreach ($ntas as $key => $nta): ?>
              			<tr>
              				<td class="text-center">
              					<span class="badge bg-info"><?= $nta['dv_number']; ?></span>
              				</td>
              				<td class="text-center">
              					<?= $nta['nta_number']; ?>
              				</td>
              				<td class="text-center">
              					<?= $nta['particular']; ?>
              				</td>
              				<td></td>
              				<td class="text-center">
              					<?= $nta['balance']; ?>
              				</td>
              				<td class="text-center">
              					<?= $nta['disbursed_amount']; ?>
              				</td>
              			</tr>
              		<?php endforeach ?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td class="text-right" colspan="3"><b>TOTAL</b></td>
        				<td></td>
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
</div>