<div class="col-md-12">
	<div class="box box-primary dropbox">
  		<div class="box-header">
  			<h3 class="box-title"><i class="fa fa-info-circle"></i> Payee</h3>
  		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-4">
  					<div class="row">
  						<div class="col-md-12">
  							<?= group_textnew('Payee', 'payee', '', 'payee'); ?>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-12">
  							<?= group_select('Supplier', 'supplier', [], '', 'supplier', 1); ?>
  						</div>
  					</div>
  					<div class="row">
  						<div class="col-md-12">
  							<?= group_input_checkbox('Download of Funds', 'dfunds', 'dfunds', 'dfunds', ''); ?>

  						</div>
  					</div>
   				</div>
	  			<div class="col-md-6">
	  				<?= group_textarea('Particulars', 'particulars', '', 1, true, false, 5); ?>
	  			</div>
  			</div>
  		</div>
  	</div>		
</div>