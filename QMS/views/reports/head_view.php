<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
					<div class="btn-group">
						<a href="qms_report_submission.php" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
					</div>
  				</div>
  				<?php if ($is_admin): ?>
	  				<div class="col-md-6">
	  					<div class="pull-right">
		  					<div class="btn-group">
				              <button type="button" class="btn btn-md btn-warning btn-block btn-export" target="_blank" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download"></i> Export</button>
				            </div>
				            <?php if ($qp_data[0]['status'] == 0): ?>
		  						<div class="btn-group">
									<button type="submit" class="btn btn-md btn-success" name="submit"><i class="fa fa-edit"></i> Submit</button>
								</div>	
							<?php elseif ($qp_data[0]['status'] == 1 && $sys_admin == true): ?>
		  						<div class="btn-group">
									<button type="submit" class="btn btn-md btn-success" name="receive"><i class="fa fa-edit"></i> Receive</button>
								</div>	
							<?php elseif ($qp_data[0]['status'] == 2 && $sys_admin == true): ?>
		  						<div class="btn-group">
									<button type="submit" class="btn btn-md btn-primary" name="complete"><i class="fa fa-check"></i> Complete</button>
								</div>	
				            <?php endif ?>

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
  							<label> QP Code </label>
  							<b><input type="text" class="form-control" readonly name="date_created" value="<?php echo $qp_data[0]['qp_code']; ?>"></b>
						</div>
  						<div class="col-md-3">
  							<label> Period Covered </label>
  							<b><input type="text" class="form-control" readonly name="qp_covered" value="<?php echo $qp_data[0]['qp_covered']; ?>"></b>
  						</div>
  						<div class="col-md-3">
  							<label for=""> Date Created: </label>
  							<input type="text" class="form-control" readonly name="date_created" value="<?php echo $qp_data[0]['date_created']; ?>">
  						</div>
  						<div class="col-md-3">
  							<label for=""> Created By: </label>
  							<input type="text" class="form-control" readonly name="created_by" value="<?php echo $qp_data[0]['created_by']; ?>">
  						</div>
  					</div>
  					<div class="row">
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Coverage: </label>
		  							<input type="text" class="form-control" readonly id="coverage" value="<?php echo $coverage[$qp_data[0]['coverage']]; ?>">
		  							<input type="hidden" class="form-control" readonly id="entry_id" name="entry_id" value="<?php echo $qp_data[0]['id']; ?>">
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Office: </label>
		  							<input type="text" class="form-control" readonly id="office" value="<?php echo $qp_data[0]['division']; ?>">
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
		  							<label for=""> Process Owner: </label>
		  							<input type="text" class="form-control" readonly id="process_owner" value="<?php echo $qp_data[0]['process_owner']; ?>">
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for=""> Frequency of Monitoring: </label>
		  							<input type="text" class="form-control" readonly id="frequency" value="<?php echo $qp_frequency[$qp_data[0]['frequency_monitoring']]; ?>">
		  						</div>
		  					</div>
		  				</div>
		  				<div class="col-md-6">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<label for="">Procedure Title</label>
		  							<textarea name="" cols="20" rows="4" class="form-control mt-2" id="procedure_title" readonly><?php echo $qp_data[0]['procedure_title']; ?></textarea>
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
