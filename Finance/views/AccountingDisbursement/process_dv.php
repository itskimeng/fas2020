<?php include 'connection.php'; ?>

<div class="col-md-12">
	<div class="box dropbox">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="btn-group">
						<li class="btn btn-warning"><a href="accounting_disbursement.php" style="color:white;text-decoration: none;"><i class="fa fa-arrow-left"></i> Back</a></li>
					</div>
				</div>
				<div class="col-md-6">
  					<div class="pull-right">
						<div class="btn-group">
	        				<button class="btn btn-primary" id="btnUpdateDisbursement"  name="btn_post"><i class="fa fa-edit"></i> Save</button>


	        				<button class="btn btn-success" id="btnPostDisbursement" name="btn_post"><i class="fa fa-check"></i> Paid</button>
						</div>
  					</div>
				</div>
			</div>
	        
			<!-- end box body -->
		</div>
	</div>
</div>

<?php foreach ($data2 as $key => $item): 

	if ($item['po_supplier'] == 1) 
	{
		$po_supplier = 'Cavite';
	}
	else if ($item['po_supplier'] == 2) 
	{
		$po_supplier = 'Laguna';
	}
	else if ($item['po_supplier'] == 3) 
	{
		$po_supplier = 'Batangas';
	}
	else if ($item['po_supplier'] == 4) 
	{
		$po_supplier = 'Rizal';
	}
	else if ($item['po_supplier'] == 5) 
	{
		$po_supplier = 'Quezon';
	}
	else
	{
		$po_supplier = 'Lucena';
	}

?>

<div class="col-md-6">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">

  					<div class="row">
		  				<div class="col-md-4">
		  					<b>Obligation Type:</b>
		  					<select class="form-control" disabled="">
		  						<option value="1"<?php if ($flag == 'ORS') {echo 'selected'; } ?>>ORS</option>
		  						<option value="2"<?php if ($flag == 'BURS') {echo 'selected'; } ?>>BURS</option>
		  					</select>
		  				</div>
		  				<div class="col-md-4">
		  					<?php if ($flag == 'ORS') : ?>
		  						<b>ORS Number:</b>
		  						<input type="" name="" class="form-control" disabled="" value="<?php echo $item['serial_no']; ?>">
	  						<?php else : ?>
		  						<b>BURS Number:</b>
		  						<input type="" name="" class="form-control" disabled="" value="<?php echo $item['serial_no']; ?>">
		  					<?php endif ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?php if ($flag == 'ORS') : ?>
		  						<b>ORS Date:</b>
		  						<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['date_created']; ?>">
	  						<?php else : ?>
		  						<b>BURS Date:</b>
		  						<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['date_created']; ?>">
		  					<?php endif ?>
		  				</div>
  					</div>

  					<div class="row" style="margin-top: 10px;">
  						<div class="col-md-12">
  							<b>Payee:</b>
  							<input type="" name="" class="form-control" disabled="" value="<?php if ($item['supplier'] != '') { echo $item['supplier']; } else { echo $po_supplier; } ?>">
  						</div>
  					</div>

  					<div class="row">
  						<div class="col-md-12">
  							<b>Particular:</b>
  							<textarea type="" name="" class="form-control" disabled="" value="<?php echo $item['purpose']; ?>"></textarea> 
  						</div>
  					</div>

  					<div class="row">
  						<div class="col-md-12">
  							<b>Obligated Amount:</b>
  							<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['amount1']; ?>" id="gross_amount">
  							<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['amount1']; ?>" id="x_gross_amount" style="display: none;">
  						</div>
  					</div>

  					<div class="row">
  						<div class="col-md-12">
  							<b>Total Deductions:</b>
  							<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['total1']; ?>" id="tax_amount">
  						</div>
  					</div>

  					<div class="row">
  						<div class="col-md-12">
  							<b>Net Amount:</b>
  							<input type="text" name="" class="form-control" disabled="" value="<?php echo $item['net_amount1']; ?>" id="total_net_amount">
  						</div>
  					</div>
  				</div>
  			</div>
  			<br>
  		</div>
  	</div>	
</div>



<!-- <form action="Finance/route/process_disbursement.php" method="post" id="form_disbursed"> -->
<form action="" method="post" id="form_disbursed">
	<div class="col-md-6">
		<div class="box box-success dropbox">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-edit"></i> DV and Deductions</h3>
			</div>
	  		<div class="box-body">
	  			<div class="row">

		  				<div class="col-md-12">

		  					<div class="row">
				  				<div class="col-md-7">
				  					<input type="number" name="amount_obligated" value="<?php echo $item['amount1']; ?>" style="display:none;">
				  					<input type="text" name="ors_number" value="<?php echo $ors; ?>" style="display:none;">
				  					<input type="text" name="dv_id" value="<?php echo $item['dv_id']; ?>" style="display:none;">
				  					<b>DV Number:</b>
				  					<input type="" class="form-control" name="dv_number" value="<?php echo $item['dv_number']; ?>">
				  				</div>
				  				<div class="col-md-5">
				  					<b>DV Date:</b>
				  					<input type="date" class="form-control" name="dv_date" value="<?php echo $item['dv_date_process']; ?>">
				  				</div>
		  					</div>

		  					<div class="row" style="margin-top: 10px;">
				  				<div class="col-md-12">
				  					<b>TAX:</b>
				  					<input type="text" class="form-control" name="tax" id="tax" value="<?php echo $item['tax']; ?>">
				  				</div>
				  			</div>
		  					<div class="row" style="margin-top: 5px;">
				  				<div class="col-md-12">
				  					<b>GSIS</b>
				  					<input type="text" class="form-control" name="gsis" id="gsis" value="<?php echo $item['gsis']; ?>">
				  				</div>
				  			</div>
		  					<div class="row" style="margin-top: 5px;">
				  				<div class="col-md-12">
				  					<b>PAGIBIG:</b>
				  					<input type="text" class="form-control" name="pagibig" id="pagibig" value="<?php echo $item['pagibig']; ?>">
				  				</div>
				  			</div>
		  					<div class="row" style="margin-top: 5px;">
				  				<div class="col-md-6">
				  					<b>PHILHEALTH</b>
				  					<input type="text" class="form-control" name="philhealth" id="philhealth" value="<?php echo $item['philhealth']; ?>">
				  				</div>
				  				<div class="col-md-6">
				  					<b>OTHER PAYABLES</b>
				  					<input type="text" class="form-control" name="other" id="other" value="<?php echo $item['other']; ?>">
				  				</div>
				  			</div>


		  					<div class="row" style="margin-top: 5px;">
				  				<div class="col-md-12">
				  					<b>Remarks</b>
				  					<textarea type="number" class="form-control" name="remarks"><?php echo $item['dv_remarks']; ?></textarea> 
				  				</div>
		  					</div>

		  				</div>

	  			</div>
	  		</div>
	  	</div>	
	</div>

	<div class="col-md-12">
		<?php include 'nta_entries.php'; ?>
	</div>

	<div class="col-md-12">
		<?php include 'uacs_entries.php'; ?>
	</div>
</form>



<?php endforeach ?>