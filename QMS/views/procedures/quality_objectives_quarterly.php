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
		  						<div class="col-md-6">
		  							<?= group_input_hidden('parent_id', $_GET['parent']); ?>
		  							<?= group_textarea('Quality Objective', 'quality_objective', !$is_new ? $data['objective'] : '', 1, true, true, 3); ?>
		  						</div>
		  						<div class="col-md-3">
		  							<?= group_textnew('Target(%)', 'target_percentage', !$is_new ? $data['target_percentage'] : '', 'target_percentage', true); ?>
		  						</div>
		  					</div>
		  				</div>
		  				
		  			</div>	

  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<div class="col-md-12">
	<form action="QMS/route/update_qms_qme_quarterly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[0]['id']; ?>" method="POST">
		<table id="tb1" class="table table-striped table-responsive table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator A: "<?= !$is_new ? $data['indicator_a'] : ''; ?>"</th>
				</tr>
				<tr style="background-color: #ffa500a3;">
					<th class="text-center" width="7.5%">1ST QUARTER</th>
					<th class="text-center" width="7.5%">2ND QUARTER</th>
					<th class="text-center" width="7.5%">3RD QUARTER</th>
					<th class="text-center" width="7.5%">4TH QUARTER</th>
					<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
				</tr>
				<tr style="font-size: 11px; background-color: #b8b8b8a3;">
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch1-indicator_a">
						    <label for="switch1-indicator_a">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch2-indicator_a">
						    <label for="switch2-indicator_a">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch3-indicator_a">
						    <label for="switch3-indicator_a">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch4-indicator_a">
						    <label for="switch4-indicator_a">Toggle</label>
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[0]['rate']['01'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[0]['rate']['02'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[0]['rate']['03'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[0]['rate']['04'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<button type="submit" class="btn btn-block btn-md btn-success"><i class="fa fa-save"></i> Save</button>
					</td>
				</tr>
			</tbody>
		</table>

	</form>
</div>

<div class="col-md-12">
	<form action="QMS/route/update_qms_qme_quarterly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[1]['id']; ?>" method="POST">
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator B: "<?= !$is_new ? $data['indicator_b'] : ''; ?>"</th>
				</tr>
				<tr style="background-color: #ffa500a3;">
					<th class="text-center" width="7.5%">1ST QUARTER</th>
					<th class="text-center" width="7.5%">2ND QUARTER</th>
					<th class="text-center" width="7.5%">3RD QUARTER</th>
					<th class="text-center" width="7.5%">4TH QUARTER</th>
					<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
				</tr>
				<tr style="font-size: 11px; background-color: #b8b8b8a3;">
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch1-indicator_b">
						    <label for="switch1-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch2-indicator_b">
						    <label for="switch2-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch3-indicator_b">
						    <label for="switch3-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch4-indicator_b">
						    <label for="switch4-indicator_b">Toggle</label>
						</div>
					</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[1]['rate']['01'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[1]['rate']['02'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[1]['rate']['03'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[1]['rate']['04'] : '', 'rate', false, 0); ?>
					</td>
					<td></td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<button type="submit" class="btn btn-block btn-md btn-success"><i class="fa fa-save"></i> Save</button>
					</td>
				</tr>
			</tbody>
		</table>	
	</form>
</div>

<div class="col-md-12">
	<form action="QMS/route/update_qms_qme_quarterly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[2]['id']; ?>" method="POST">
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator C: "<?= !$is_new ? $data['indicator_c'] : ''; ?>"</th>
				</tr>
				<tr style="background-color: #ffa500a3;">
					<th class="text-center" width="7.5%">1ST QUARTER</th>
					<th class="text-center" width="7.5%">2ND QUARTER</th>
					<th class="text-center" width="7.5%">3RD QUARTER</th>
					<th class="text-center" width="7.5%">4TH QUARTER</th>
					<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
				</tr>
				<tr style="font-size: 11px; background-color: #b8b8b8a3;">
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch1-indicator_c">
						    <label for="switch1-indicator_c">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch2-indicator_c">
						    <label for="switch2-indicator_c">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch3-indicator_c">
						    <label for="switch3-indicator_c">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch4-indicator_c">
						    <label for="switch4-indicator_c">Toggle</label>
						</div>
					</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[2]['rate']['01'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[2]['rate']['02'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[2]['rate']['03'] : '', 'rate', false, 0); ?>
					</td>
					<td>
						<?= group_textnew('Rate', 'rate[]', isset($frequencies) ? $frequencies[2]['rate']['04'] : '', 'rate', false, 0); ?>
					</td>
					
					<td></td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<button type="submit" class="btn btn-block btn-md btn-success"><i class="fa fa-save"></i> Save</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>	
</div>