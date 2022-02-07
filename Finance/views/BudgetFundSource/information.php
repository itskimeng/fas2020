<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row pull-right">
  				<div class="col-md-12">
  					<div class="btn-group">
						<button type="submit" class="btn btn-md btn-success btn-generate" name="save"><i class="fa fa-edit"></i> Save</button>
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-md btn-primary btn-generate" name="save_new"><i class="fa fa-save"></i> Save & New</button>
					</div>
					<div class="btn-group">
						<a href="budget_fundsource.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-close"></i> Close</a>
					</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-4">
		  					<?= group_input_hidden('source_id', $fsource['id']); ?>
		  					<?= group_textnew('Source No.', 'source_no', $fsource['code'], 'source_no', false); ?>
		  				</div>
		  				<div class="col-md-4">
		  					&nbsp;
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_date2('Date', 'date_created', 'date_created', !empty($fsource['date_created']) ? $fsource['date_created'] : $now, 'date_created', 1, true); ?>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-4">
		  					<?= group_textnew('Name', 'fund_name', $fsource['fund_name'], 'fund_name', false); ?>
						</div>
						<div class="col-md-4">
		  					<?= group_textnew('MFO/PPA', 'ppa', $fsource['ppa'], 'ppa', false); ?>
						</div>
						<div class="col-md-4">
		  					<?= group_textnew('Legal Basis', 'legal_basis', $fsource['legal_basis'], 'legal_basis', false); ?>	
						</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-4">
		  					<?= group_textarea('Particulars', 'particulars', $fsource['particulars'], 1, true, false, 4); ?>
		  				</div>
		  				<div class="col-md-4">&nbsp;</div>
		  				<div class="col-md-4">
		  					<?= group_textnew('Created By', 'created_by', !empty($fsource['created_by']) ? $fsource['created_by'] : 
		  					$currentuser, 'created_by', true); ?>	
		  				</div>
		  			</div>

  				</div>
  			</div>
  		</div>
  	</div>		
</div>