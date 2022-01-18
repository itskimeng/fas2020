<div class="col-md-6">
	<div class="box box-primary dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-6">
		  					<?= group_select('Obligation Type', 'ob_type', $obligation_opts, '', 'ob_type', 1); ?>
		  				</div>
		  			</div>
		  			<div class="row">
						<div class="col-md-12">
							<?= group_input_checkbox('Download of Funds', 'dfunds', 'dfunds', 'dfunds', ''); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-md btn-primary btn-generate"><i class="fa fa-book"></i> Generate</button>
						</div>
					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-6">
    <div class="callout callout-warning dropbox">
        <h4>Instruction!</h4>
        <p>Follow the steps to continue to payment</p>
        <ol>
            <li>Select Obligation Type.</li>
            <li>Check Download of Funds if from Provincial Office.</li>
            <li>Click Generate button to </li>
            <li>Fill out neccessary fields</li>
        </ol>
      </div>
</div>