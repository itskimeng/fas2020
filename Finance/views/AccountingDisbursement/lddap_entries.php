
<div class="box box-success  dropbox">
	<div class="box-header">
			<h3 class="box-title"><i class="fa fa-list"></i> LDDAP Entries</h3>
			<div class="box-tools pull-right">
			<div class="btn-group">
				<button type="button" class="btn btn-sm btn-primary btn-generate"><i class="fa fa-plus"></i> Add LDDAP</button>
			</div>
		</div>
		</div>

	<div class="box-body">
		<table class="table table-striped table-bordered">
		<thead>
			<tr class="custom-tb-header">
      		<th class="text-center" width="25%">LDDAP NUMBER</th>
      		<th class="text-center" width="">LDDAP DATE</th>
          <th class="text-center">LDDAP BALANCE</th>
      		<th class="text-center">DISBURSE AMOUNT</th>
          <th></th>
  		</tr>
		</thead>
  		<tbody id="nta-entries">

        <?php foreach ($getNtaEntries as $key => $ne): ?>
    			<tr>              
            <td>
              <!-- <select class="form-control" name="nta_number" id="nta_number" data-id="1"> -->
              <select class="form-control nta_number" name="nta_number[]" id="nta_number">
                    <!-- <option value="" selected="" disabled="">SelectNTA/NCA</option> -->
                    <?php foreach ($getNta as $key => $nta): ?>
                          <option value="<?php echo $nta['id']; ?>" <?php if ($ne['ne_nta_id'] == $nta['id']) {echo "selected";} ?>><?php echo $nta['nta_item']; ?></option>
                    <?php endforeach; ?>
              </select>
            </td>               
            <td><input type="text" name="nta_amount" id="amount" class="form-control amount" readonly value="<?php echo $ne['nta_amount']; ?>"></td>               
            <td><input type="text" name="nta_balance" id="balance" class="form-control balance" readonly value="<?php echo $ne['nta_balance']; ?>"></td> 
            <td>
              <input type="text" name="disburse_amount[]" id="disburse_amount" class="form-control disburse_amount" value="<?php echo $ne['nta_amount1']; ?>">
              <!-- <input type="hidden" name="disburse_amount1[]" id="disburse_amount1" class="form-control disburse_amount1" value="<?php echo $ne['nta_amount1']; ?>"> -->
            </td> 
            <td><button type="button" class="btn btn-sm btn-danger btn-block btn-row_remove"><i class="fa fa-trash"></i></button></td>     
          </tr>
        <?php endforeach; ?>

  		</tbody>
		</table>
	</div>

	<div class="box-footer">
	</div>
</div>
