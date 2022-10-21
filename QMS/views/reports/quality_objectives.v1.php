<form method="POST" action="<?= $route; ?>">
	<div class="col-md-12">
		<div class="box dropbox">
	  		<div class="box-body">
	  			<div class="row">
	  				<div class="col-md-6">
						<div class="btn-group">
							<a href="qms_procedures_new.php?id=<?= $_GET['parent']; ?>" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
						</div>
	  				</div>
	  				<div class="col-md-6">
	  					<div class="pull-right">
	  						<div class="btn-group">
								<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
							</div>	
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
				<div class="box-tools">
					<span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"><?= $data['status']; ?></span>	
				</div>
			</div>
	  		<div class="box-body">
	  			<div class="row">
	  				<div class="col-md-12">
	  					<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-7">
			  							<?= group_input_hidden('parent_id', $_GET['parent']); ?>
			  							<?= group_textarea('Quality Objective', 'quality_objective', !$is_new ? $data['objective'] : '', 1, true, false, 8); ?>
			  						</div>
			  						<div class="col-md-5">
			  							<div class="row">
			  								<div class="col-md-12"></div>
			  							</div>
			  							<div class="row">
			  								<div class="col-md-12">
			  									<?= group_textnew('Target(%)', 'target_percentage', !$is_new ? $data['target_percentage'] : '', 'target_percentage', false); ?>
			  								</div>
			  							</div>
			  							<div class="row">
			  								<div class="col-md-12">
			  									<?= group_textnew('Formula', 'formula', !$is_new ? $data['formula'] : '', 'formula', false); ?>
			  								</div>
			  							</div>
			  						</div>
			  					</div>

			  				</div>
			  			</div>	

			  			<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-12">
			  							<?= group_textarea('Indicator A', 'indicator_a', !$is_new ? $data['indicator_a'] : '', 1, true, false, 3); ?>
			  						</div>
			  					</div>
			  				</div>
			  			
			  			</div>

			  			<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-12">
			  							<?= group_textarea('Indicator B', 'indicator_b', !$is_new ? $data['indicator_b'] : '', 1, true, false, 3); ?>
			  						</div>
			  					</div>
			  				</div>
			  				
			  			</div>

			  			<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-12">
			  							<?= group_textarea('Indicator C', 'indicator_c', !$is_new ? $data['indicator_c'] : '', 1, true, false, 3); ?>
			  						</div>
			  					</div>
			  				</div>
			  				
			  			</div>

			  			<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-12">
			  							<?= group_textarea('Indicator D', 'indicator_d', !$is_new ? $data['indicator_d'] : '', 1, true, false, 3); ?>
			  						</div>
			  					</div>
			  				</div>
			  				
			  			</div>

			  			<div class="row">
			  				<div class="col-md-12">
			  					<div class="row">
			  						<div class="col-md-12">
			  							<?= group_textarea('Indicator E', 'indicator_e', !$is_new ? $data['indicator_e'] : '', 1, true, false, 3); ?>
			  						</div>
			  					</div>
			  				</div>
			  				
			  			</div>

	  				</div>
	  			</div>
	  		</div>
	  	</div>		
	</div>
</form>
