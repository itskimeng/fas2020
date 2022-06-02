<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
					<div class="btn-group">
						<a href="qms_procedures_new.php?id=<?= $_GET['parent']; ?>" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
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
	<form action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[0]['id']; ?>" method="POST">
		<table id="tb1" class="table table-striped table-responsive table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator A: "<?= !$is_new ? $data['indicator_a'] : ''; ?>"</th>
				</tr>
				<tr style="background-color: #ffa500a3;">
					<th class="text-center" width="7.5%">JAN</th>
					<th class="text-center" width="7.5%">FEB</th>
					<th class="text-center" width="7.5%">MAR</th>
					<th class="text-center" width="7.5%">APR</th>
					<th class="text-center" width="7.5%">MAY</th>
					<th class="text-center" width="7.5%">JUN</th>
					<th class="text-center" width="7.5%">JUL</th>
					<th class="text-center" width="7.5%">AUG</th>
					<th class="text-center" width="7.5%">SEP</th>
					<th class="text-center" width="7.5%">OCT</th>
					<th class="text-center" width="7.5%">NOV</th>
					<th class="text-center" width="7.5%">DEC</th>
					<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
				</tr>
				<?php if ($is_admin): ?>
					<tr style="font-size: 11px; background-color: #b8b8b8a3;">
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch1-indicator_a" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch1-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch2-indicator_a" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch2-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch3-indicator_a" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch3-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch4-indicator_a" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch4-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch5-indicator_a" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch5-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
							    <?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch6-indicator_a" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch6-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch7-indicator_a" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch7-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch8-indicator_a" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch8-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch9-indicator_a" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch9-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch10-indicator_a" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch10-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch11-indicator_a" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch11-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      Not Applicable?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch12-indicator_a" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?>>
							    <label for="switch12-indicator_a">Toggle</label>
							</div>
						</th>
					</tr>
					
				<?php endif ?>
			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['01'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['01'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['01'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-ban"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['02'] : ''; ?>	
							</label>
						<?php else: ?>	
							<?php if (empty($frequencies[0]['is_na']['02'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['02'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['03'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['03'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['03'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['04'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['04'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['04'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['05'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['05'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['05'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['06'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['06'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['06'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['07'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['07'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['07'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['08'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['08'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['08'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['09'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['09'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['09'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['10'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['10'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['10'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['11'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['11'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['11'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($is_admin): ?>
							<label>
								<?= isset($frequencies) ? $frequencies[0]['rate']['12'] : ''; ?>	
							</label>
						<?php else: ?>
							<?php if (empty($frequencies[0]['is_na']['12'])): ?>
								<?= group_textnew('Rate', 'rate[]',  isset($frequencies) ? $frequencies[0]['rate']['12'] : '', 'rate', false, 0); ?>
							<?php else: ?>
								<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
							<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[0]['total'] : ''; ?>
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
	<table class="table table-striped table-bordered dropbox">
		<thead>
			<tr style="background-color: #367fa9; color: white;">
				<th class="text-center" colspan="13">Indicator B: "<?= !$is_new ? $data['indicator_b'] : ''; ?>"</th>
			</tr>
			<tr style="background-color: #ffa500a3;">
				<th class="text-center" width="7.5%">JAN</th>
				<th class="text-center" width="7.5%">FEB</th>
				<th class="text-center" width="7.5%">MAR</th>
				<th class="text-center" width="7.5%">APR</th>
				<th class="text-center" width="7.5%">MAY</th>
				<th class="text-center" width="7.5%">JUN</th>
				<th class="text-center" width="7.5%">JUL</th>
				<th class="text-center" width="7.5%">AUG</th>
				<th class="text-center" width="7.5%">SEP</th>
				<th class="text-center" width="7.5%">OCT</th>
				<th class="text-center" width="7.5%">NOV</th>
				<th class="text-center" width="7.5%">DEC</th>
				<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
			</tr>
			<?php if ($is_admin): ?>
				<tr style="font-size: 11px; background-color: #b8b8b8a3;">
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch1-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch1-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch2-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch2-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch3-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch3-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch4-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch4-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch5-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch5-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch6-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch6-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch7-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch7-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch8-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch8-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch9-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch9-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch10-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch10-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch11-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch11-indicator_b">Toggle</label>
						</div>
					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      Not Applicable?
	                    </label>
						<div class="switchToggle">
						    <input type="checkbox" id="switch12-indicator_b" <?= isset($frequencies) ? (($frequencies[1]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?>>
						    <label for="switch12-indicator_b">Toggle</label>
						</div>
					</th>
				</tr>
			<?php endif ?>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['01'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['01'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['01'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-ban"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['02'] : ''; ?>	
						</label>
					<?php else: ?>	
						<?php if (empty($frequencies[1]['is_na']['02'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['02'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['03'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['03'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['03'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['04'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['04'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['04'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['05'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['05'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['05'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['06'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['06'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['06'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['07'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['07'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['07'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['08'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['08'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['08'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['09'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['09'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['09'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['10'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['10'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['10'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['11'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['11'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['11'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['12'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[1]['is_na']['12'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[1]['rate']['12'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td></td>
			</tr>
			<tr style="background-color: #fbfbfb;">
				<td class="text-center" colspan="13">
					<button class="btn btn-block btn-md btn-success"><i class="fa fa-save"></i> Save</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-12">
	<table class="table table-striped table-bordered dropbox">
		<thead>
			<tr style="background-color: #367fa9; color: white;">
				<th class="text-center" colspan="13">Indicator C: "<?= !$is_new ? $data['indicator_c'] : ''; ?>"</th>
			</tr>
			<tr style="background-color: #ffa500a3;">
				<th class="text-center" width="7.5%">JAN</th>
				<th class="text-center" width="7.5%">FEB</th>
				<th class="text-center" width="7.5%">MAR</th>
				<th class="text-center" width="7.5%">APR</th>
				<th class="text-center" width="7.5%">MAY</th>
				<th class="text-center" width="7.5%">JUN</th>
				<th class="text-center" width="7.5%">JUL</th>
				<th class="text-center" width="7.5%">AUG</th>
				<th class="text-center" width="7.5%">SEP</th>
				<th class="text-center" width="7.5%">OCT</th>
				<th class="text-center" width="7.5%">NOV</th>
				<th class="text-center" width="7.5%">DEC</th>
				<th rowspan="2" class="text-center" width="7.5%" style="vertical-align: middle;">TOTAL</th>
			</tr>
			<?php if ($is_admin): ?>
			<tr style="font-size: 11px; background-color: #b8b8b8a3;">
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch1-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch1-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch2-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch2-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch3-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch3-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch4-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch4-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch5-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch5-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch6-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch6-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch7-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch7-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch8-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch8-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch9-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch9-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch10-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch10-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch11-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch11-indicator_c">Toggle</label>
					</div>
				</th>
				<th class="text-center" width="7.5%">
					<label>
                      Not Applicable?
                    </label>
					<div class="switchToggle">
					    <input type="checkbox" id="switch12-indicator_c" <?= isset($frequencies) ? (($frequencies[2]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?>>
					    <label for="switch12-indicator_c">Toggle</label>
					</div>
				</th>
			</tr>
			<?php endif ?>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['01'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['01'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['01'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-ban"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['02'] : ''; ?>	
						</label>
					<?php else: ?>	
						<?php if (empty($frequencies[2]['is_na']['02'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['02'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['03'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['03'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['03'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['04'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['04'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['04'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['05'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['05'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['05'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['06'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['06'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['06'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['07'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['07'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['07'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['08'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['08'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['08'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['09'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['09'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['09'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['10'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['10'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['10'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['11'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['11'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['11'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td>
					<?php if ($is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['12'] : ''; ?>	
						</label>
					<?php else: ?>
						<?php if (empty($frequencies[2]['is_na']['12'])): ?>
							<?= group_textnew('Rate', 'rate',  isset($frequencies) ? $frequencies[2]['rate']['12'] : '', 'rate', false, 0); ?>
						<?php else: ?>
							<span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span>
						<?php endif ?>
					<?php endif ?>
				</td>
				<td></td>
			</tr>
			<tr style="background-color: #fbfbfb;">
				<td class="text-center" colspan="13">
					<button class="btn btn-block btn-md btn-success"><i class="fa fa-save"></i> Save</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>