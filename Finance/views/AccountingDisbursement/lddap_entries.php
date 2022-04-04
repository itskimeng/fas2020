
<div class="box box-success  dropbox">
	<div class="box-header">
			<h3 class="box-title"><i class="fa fa-list"></i> LDDAP Entries</h3>
			<div class="box-tools pull-right">
			<div class="btn-group">
        <?php if ($_GET['status'] != 'Paid'): ?>
				  <button type="button" class="btn btn-sm btn-primary btn-generate"><i class="fa fa-plus"></i> Add LDDAP</button>
        <?php endif ?>
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

        <?php foreach ($lddapEntries as $key => $le): ?>
    			<tr>              
            <td>
              <!-- <select class="form-control" name="nta_number" id="nta_number" data-id="1"> -->
              <select class="form-control lddap_number" name="lddap_number[]" id="lddap_number">
                    <option value="" selected="" disabled="">Select LDDAP</option>
                    <?php foreach ($getLddap as $key => $lddap): ?>
                          <option value="<?php echo $lddap['id']; ?>" <?php if ($le['id'] == $lddap['id']) {echo "selected";} ?>><?php echo $lddap['lddap']; ?></option>
                    <?php endforeach; ?>
              </select>
            </td>               
            <td><input type="text" name="lddap_date[]" id="amount" class="form-control amount" readonly value="<?php echo $le['lddap_date']; ?>"></td>               
            <td><input type="text" name="lddap_balance[]" id="balance" class="form-control balance" readonly value="<?php echo $le['lddap_balance']; ?>"></td> 
            <td>

              <input type="text" name="lddap_amount[]" id="lddap_amount" class="form-control lddap_amount" <?php  if($_GET['status'] == 'Paid') {echo 'readonly';} ?> value="<?php echo $le['dv_amount']; ?>">
              <!-- <input type="hidden" name="disburse_amount1[]" id="disburse_amount1" class="form-control disburse_amount1" value="<?php echo $le['nta_amount1']; ?>"> -->
            </td>
            <?php if ($_GET['status'] != 'Paid'): ?>
                <td><button type="button" class="btn btn-sm btn-danger btn-block btn-row_remove"><i class="fa fa-trash"></i></button></td>    
            <?php endif ?> 
          </tr>
        <?php endforeach; ?>

  		</tbody>
		</table>
	</div>

	<div class="box-footer">
	</div>
</div>
