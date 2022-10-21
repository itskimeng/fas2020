<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
					<div class="btn-group">
						<a href="qms_procedures.php" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
					</div>
  				</div>
  				<?php if ($is_admin): ?>
	  				<div class="col-md-6">
	  					<div class="pull-right">
		  					<div class="btn-group">
				              <!-- <button type="button" class="btn btn-md btn-warning btn-block btn-export" target="_blank" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download"></i> Export</button> -->
				            </div>
	  						<div class="btn-group">
								<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
							</div>	
	  					</div>
	  				</div>
  				<?php endif ?>
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
  						<div class="col-md-3">
  							<?= group_select('Frequency of Monitoring', 'frequency', $frequency_opts, !$is_new ? $data['frequency_monitoring'] : '', 'frequency', 1, $is_admin ? false : true); ?>
  						</div>
  						<div class="col-md-3"></div>
  						<div class="col-md-3">
  							<?= group_textnew('Date Created', 'date_created', !$is_new ? $data['date_created'] : '', 'date_created', true); ?>
  						</div>
  						<div class="col-md-3">
				  			<?= group_textnew('Created By', 'created_by', !$is_new ? $data['created_by'] : '', 'created_by', true); ?>
  							
  						</div>
  					</div>
  					<div class="row">
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_input_hidden('parent_id', !$is_new ? $_GET['id'] : ''); ?>
		  							<?= group_select('Coverage', 'coverage', $coverage_opts, !$is_new ? $data['coverage'] : '', 'coverage', 1, $is_admin ? false : true); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_select('Office', 'office', $office_opts, !$is_new ? $data['office'] : '', 'office', 1, $is_admin ? false : true); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							
		  						</div>
		  					</div>

		  				</div>
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_select('Process Owner', 'process_owner', $processowners_opts, !$is_new ? $data['process_owner'] : '', 'office', 1, $is_admin ? false : true); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('QP Code', 'qp_code', !$is_new ? $data['qp_code'] : '', 'qp_code', $is_admin ? false : true); ?>
		  						</div>
		  					</div>
		  				</div>
		  				<div class="col-md-6">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textarea('Procedure Title', 'procedure_title', !$is_new ? $data['procedure_title'] : '', 1, true, $is_admin ? false : true, 5); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-6">
		  							<div class="row">
			  							<div class="col-md-12">
				  							
				  						</div>
		  							</div>
		  						</div>

		  						<div class="col-md-6">
		  							<div class="row">
			  							<div class="col-md-12">
				  						</div>
		  							</div>
		  						</div>
		  					</div>
		  				</div>
		  				
		  			</div>	

  				</div>
  			</div>
  		</div>
  	</div>		
</div>