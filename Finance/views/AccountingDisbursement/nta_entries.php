
<div class="box box-warning  dropbox">
	<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> NTA/NCA</h3>
			<div class="box-tools pull-right">
			<div class="btn-group">
				<button type="button" class="btn btn-sm btn-primary btn-generate"><i class="fa fa-plus"></i> Add NTA/NCA</button>
			</div>
		</div>
		</div>

	<div class="box-body">
		<table class="table table-striped table-bordered">
		<thead>
			<tr class="custom-tb-header">
      		<th class="text-center" width="">#</th>
      		<th class="text-center" width="45%">NTA/NCA NO.</th>
      		<th class="text-center" width="">TOTAL AMOUNT</th>
          <th class="text-center">NTA BALANCE</th>
      		<th class="text-center">DISBURSE AMOUNT</th>
          <th></th>
  		</tr>
		</thead>
  		<tbody id="nta-entries">
  			<tr>
          <td>1</td>               
          <td>
            <!-- <select class="form-control" name="nta_number[1]" id="nta_number" data-id="1"> -->
            <select class="form-control nta_number" name="nta_number[1]" id="nta_number">
                  <option value="" selected="" disabled="">SelectNTA/NCA</option>
                  <?php foreach ($getNta as $key => $nta): 
                        echo $nta['nta_item'];
                  endforeach; ?>
            </select>
          </td>               
          <td><input type="text" name="nta_amount[1]" id="amount" class="form-control amount" readonly></td>               
          <td><input type="text" name="nta_balance[1]" id="balance" class="form-control balance" readonly></td> 
          <td><input type="text" name="disburse_amount[1]" id="disburse_amount" class="form-control disburse_amount" ></td> 
          <td></td>     
        </tr>
  		</tbody>
      <tfoot>
            <tr>
                  <td class="text-right" colspan="4"><strong>Total</strong></td>
                  <td colspan="1">
                    <b>
                      <div class="input-group">
                        <span class="input-group-addon">₱</span>
                        <input type="text" name="total_disbursement" id="total_disbursement" class="form-control total_disbursement" disabled="">
                      </div>
                    </b>
                  </td>
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
