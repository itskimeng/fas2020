<div class="col-md-12">
	<div class="box box-primary dropbox">
  		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
  		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-4">
  					<?= group_select('Type', 'ob_type', [], '', 'ob_type', 1); ?>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-4">
  					<?= group_textnew('Serial Number', 'serial_no', '', 'serial_no'); ?>
  				</div>
  				<div class="col-md-4">
					<?= group_date2('Date Received', 'date_received', 'date_received', '', 'info-dates'); ?>
				</div>
				<div class="col-md-4">
					<?= group_date2('Date Returned', 'date_returned', 'date_returned', '', 'info-dates'); ?>
				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-4">
  					<?= group_textnew('Purchase Order', 'serial_no', '', 'serial_no'); ?>
  				</div>
  				<div class="col-md-4">
					<?= group_date2('Date Processed', 'date_processsed', 'date_processsed', '', 'info-dates'); ?>
				</div>

				<div class="col-md-4">
					<?= group_date2('Date Released', 'date_released', 'date_released', '', 'info-dates'); ?>
				</div>
  			</div>

  		</div>
  	</div>		
</div>