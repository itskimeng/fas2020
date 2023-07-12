<!-- <form id="gap_analysis" action="QMS/route/update_gap_analysis.php" method="POST"> -->
<form id="submitqo" method="POST">
	<div class="col-md-12">
		<div class="box dropbox">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="btn-group">
							<a href="qms_report_view.php?id=<?= $_GET['entry_id']; ?>&parent=<?= $_GET['parent']; ?>"
								class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i>
								Close</a>
						</div>
						<div class="btn-group" style="float: right;">
							<!-- <button class="btn btn-md btn-success" name="" type="submit"><i class="fa  fa-check"></i> Save</button> -->
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
					<span class="label label-info"
						style="font-size: 14.5px; background-color: #06313b !important;"><?= $data['status']; ?></span>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<?= group_textnew('Target(%)', 'target_percentage', !$is_new ? $data['target_percentage'] : '', 'target_percentage', true); ?>
									</div>
									<div class="col-md-3">
										<label>
											Objectives Met?
										</label>
										<div class="switchToggle">
											<input type="hidden" value="<?php echo $_GET['entry_id']; ?>"
												name="entry_id">
											<!-- <input type="checkbox" id="switch_objective_indicator" name="switch_objective_indicator"> -->
											<!-- <input type="checkbox" id="switch_objective_indicator" name="switch_objective_indicator" id="ga_obj" onchange="this.form.submit()" <?= isset($data['is_gap_analysis']) ? (($data['is_gap_analysis'] == true)  ? 'checked' : '') : ''; ?>> -->
											<input type="checkbox" id="switch_objective_indicator"
												name="switch_objective_indicator"
												<?= isset($frequencies[4]['is_gap_analysis']) ? (($frequencies[4]['is_gap_analysis'] == '1')  ? 'checked' : '') : ''; ?>>
											<label for="switch_objective_indicator">Toggle</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<?= group_input_hidden('parent_id', $_GET['parent']); ?>
										<?= group_input_hidden('idGA', $_GET['id']); ?>
										<?= group_textarea('Quality Objective', 'quality_objective', !$is_new ? $data['objective'] : '', 1, true, true, 5); ?>
									</div>
									<div class="col-md-6">
										<label>
											Gap Analysis
										</label>
										<textarea class="form-control" name="gap_analysis" id="gap_analysis" cols="50"
											rows="5" placeholder="Input analysis why it is not met."
											<?= isset($frequencies[4]['is_gap_analysis']) ? (($frequencies[4]['is_gap_analysis'] == true)  ? 'disabled' : '') : ''; ?>><?php echo $frequencies[4]['gap_analysis']; ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- </form> -->

	<?php if ($data['indicator_a'] != ''): $ob_label = 'B'; ?>

	<div class="col-md-12">
		<!-- <form id="qo_form1" action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[0]['id']; ?>&entry_id=<?php echo $_GET['entry_id']; ?>&indicator=<?php echo $frequencies[0]['indicator']; ?>&year=<?php echo $frequencies[0]['year']; ?>" method="POST"> -->
		<table id="tb1" class="table table-striped table-responsive table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator A: "<?= !$is_new ? $data['indicator_a'] : ''; ?>"
					</th>
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
				<!-- <tr style="font-size: 11px; background-color: #b8b8b8a3;">
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch1-indicator_a" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'January'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch1-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch2-indicator_a" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'February'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch2-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch3-indicator_a" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'March'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch3-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch4-indicator_a" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'April'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch4-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch5-indicator_a" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'May'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch5-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
							    <?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch6-indicator_a" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'June'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch6-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch7-indicator_a" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'July'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch7-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch8-indicator_a" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'August'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch8-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch9-indicator_a" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'September'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch9-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch10-indicator_a" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'October'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch10-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch11-indicator_a" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'November'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch11-indicator_a">Toggle</label>
							</div>
						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>
							<div class="switchToggle">
								<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[0]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?>

							    <input type="checkbox" id="switch12-indicator_a" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[0]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'December'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch12-indicator_a">Toggle</label>
							</div>
						</th>
					</tr> -->

			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['01'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['01'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][0]',  isset($frequencies) ? $frequencies[0]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-ban"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][0]',  isset($frequencies) ? $frequencies[0]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['02'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['02'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][1]',  isset($frequencies) ? $frequencies[0]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][1]',  isset($frequencies) ? $frequencies[0]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['03'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['03'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][2]',  isset($frequencies) ? $frequencies[0]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][2]',  isset($frequencies) ? $frequencies[0]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['04'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['04'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][3]',  isset($frequencies) ? $frequencies[0]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][3]',  isset($frequencies) ? $frequencies[0]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['05'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['05'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][4]',  isset($frequencies) ? $frequencies[0]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][4]',  isset($frequencies) ? $frequencies[0]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['06'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['06'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][5]',  isset($frequencies) ? $frequencies[0]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][5]',  isset($frequencies) ? $frequencies[0]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['07'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['07'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][6]',  isset($frequencies) ? $frequencies[0]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][6]',  isset($frequencies) ? $frequencies[0]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['08'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['08'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][7]',  isset($frequencies) ? $frequencies[0]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][7]',  isset($frequencies) ? $frequencies[0]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['09'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['09'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][8]',  isset($frequencies) ? $frequencies[0]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][8]',  isset($frequencies) ? $frequencies[0]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['10'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['10'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][9]',  isset($frequencies) ? $frequencies[0]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][9]',  isset($frequencies) ? $frequencies[0]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['11'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['11'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][10]',  isset($frequencies) ? $frequencies[0]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][10]',  isset($frequencies) ? $frequencies[0]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[0]['rate']['12'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[0]['is_na']['12'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][11]',  isset($frequencies) ? $frequencies[0]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[0]['indicator'].'][11]',  isset($frequencies) ? $frequencies[0]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[0]['total'] : ''; ?>
						<?= input_hidden('id[0]', 'id[0]', 'id', isset($frequencies) ? $frequencies[0]['id'] : ''); ?>
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<!-- <button type="submit" class="btn btn-block btn-md btn-success" <?php  if ($_GET['status'] != 0) {echo "disabled";} ?>><i class="fa fa-save"></i> Save </button> -->
					</td>
				</tr>
			</tbody>
		</table>
		<!-- </form> -->
	</div>

	<?php endif ?>


	<?php if ($data['indicator_b'] != ''): $ob_label = 'C'; ?>

	<div class="col-md-12">
		<!-- <form id="qo_form2" action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[1]['id']; ?>&entry_id=<?php echo $_GET['entry_id']; ?>&indicator=<?php echo $frequencies[1]['indicator']; ?>&year=<?php echo $frequencies[1]['year']; ?>" method="POST"> -->
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator B: "<?= !$is_new ? $data['indicator_b'] : ''; ?>"
					</th>
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
				<!-- <tr style="font-size: 11px; background-color: #b8b8b8a3;">
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch1-indicator_b" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'January'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch1-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch2-indicator_b" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'February'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch2-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch3-indicator_b" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'March'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch3-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch4-indicator_b" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'April'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch4-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch5-indicator_b" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'May'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch5-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch6-indicator_b" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'June'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch6-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch7-indicator_b" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'July'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch7-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch8-indicator_b" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'August'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch8-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch9-indicator_b" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'September'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch9-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['10'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch10-indicator_b" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'October'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch10-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch11-indicator_b" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'November'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch11-indicator_b">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[1]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch12-indicator_b" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[1]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'December'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch12-indicator_b">Toggle</label>
							</div>

						</th>
					</tr> -->
			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['01'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['01'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][0]',  isset($frequencies) ? $frequencies[1]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-ban"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][0]',  isset($frequencies) ? $frequencies[1]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['02'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['02'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][1]',  isset($frequencies) ? $frequencies[1]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][1]',  isset($frequencies) ? $frequencies[1]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['03'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['03'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][2]',  isset($frequencies) ? $frequencies[1]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][2]',  isset($frequencies) ? $frequencies[1]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['04'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['04'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][3]',  isset($frequencies) ? $frequencies[1]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][3]',  isset($frequencies) ? $frequencies[1]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['05'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['05'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][4]',  isset($frequencies) ? $frequencies[1]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][4]',  isset($frequencies) ? $frequencies[1]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['06'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['06'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][5]',  isset($frequencies) ? $frequencies[1]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][5]',  isset($frequencies) ? $frequencies[1]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['07'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['07'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][6]',  isset($frequencies) ? $frequencies[1]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][6]',  isset($frequencies) ? $frequencies[1]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['08'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['08'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][7]',  isset($frequencies) ? $frequencies[1]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][7]',  isset($frequencies) ? $frequencies[1]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['09'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['09'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][8]',  isset($frequencies) ? $frequencies[1]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][8]',  isset($frequencies) ? $frequencies[1]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['10'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['10'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][9]',  isset($frequencies) ? $frequencies[1]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][9]',  isset($frequencies) ? $frequencies[1]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['11'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['11'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][10]',  isset($frequencies) ? $frequencies[1]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][10]',  isset($frequencies) ? $frequencies[1]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[1]['rate']['12'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[1]['is_na']['12'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][11]',  isset($frequencies) ? $frequencies[1]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[1]['indicator'].'][11]',  isset($frequencies) ? $frequencies[1]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[1]['total'] : ''; ?>
						<?= input_hidden('id[1]', 'id[1]', 'id', isset($frequencies) ? $frequencies[1]['id'] : ''); ?>
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<!-- <button type="submit" class="btn btn-block btn-md btn-success" <?php  if ($_GET['status'] != 0) {echo "disabled";} ?>><i class="fa fa-save"></i> Save</button> -->
					</td>
				</tr>
			</tbody>
		</table>
		<!-- </form> -->
	</div>

	<?php endif ?>


	<?php if ($data['indicator_c'] != ''): $ob_label = 'D'; ?>

	<div class="col-md-12">
		<!-- <form id="qo_form3" action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[2]['id']; ?>&entry_id=<?php echo $_GET['entry_id']; ?>&indicator=<?php echo $frequencies[2]['indicator']; ?>&year=<?php echo $frequencies[2]['year']; ?>" method="POST"> -->
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator C: "<?= !$is_new ? $data['indicator_c'] : ''; ?>"
					</th>
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
				<!-- <?php if ($is_admin): ?>
					<tr style="font-size: 11px; background-color: #b8b8b8a3;">
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch1-indicator_c" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'January'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch1-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch2-indicator_c" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'February'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch2-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch3-indicator_c" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'March'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch3-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch4-indicator_c" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'April'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch4-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch5-indicator_c" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'May'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch5-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch6-indicator_c" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'June'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch6-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch7-indicator_c" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'July'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch7-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch8-indicator_c" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'August'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch8-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch9-indicator_c" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'September'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch9-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['10'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch10-indicator_c" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'October'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch10-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch11-indicator_c" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'November'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch11-indicator_c">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[2]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch12-indicator_c" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[2]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'December'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch12-indicator_c">Toggle</label>
							</div>

						</th>
					</tr>
					<?php endif ?> -->
			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['01'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['01'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][0]',  isset($frequencies) ? $frequencies[2]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-ban"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][0]',  isset($frequencies) ? $frequencies[2]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['02'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['02'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][1]',  isset($frequencies) ? $frequencies[2]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][1]',  isset($frequencies) ? $frequencies[2]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['03'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['03'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][2]',  isset($frequencies) ? $frequencies[2]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][2]',  isset($frequencies) ? $frequencies[2]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['04'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['04'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][3]',  isset($frequencies) ? $frequencies[2]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][3]',  isset($frequencies) ? $frequencies[2]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['05'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['05'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][4]',  isset($frequencies) ? $frequencies[2]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][4]',  isset($frequencies) ? $frequencies[2]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['06'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['06'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][5]',  isset($frequencies) ? $frequencies[2]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][5]',  isset($frequencies) ? $frequencies[2]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['07'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['07'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][6]',  isset($frequencies) ? $frequencies[2]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][6]',  isset($frequencies) ? $frequencies[2]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['08'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['08'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][7]',  isset($frequencies) ? $frequencies[2]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][7]',  isset($frequencies) ? $frequencies[2]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['09'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['09'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][8]',  isset($frequencies) ? $frequencies[2]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][8]',  isset($frequencies) ? $frequencies[2]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['10'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['10'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][9]',  isset($frequencies) ? $frequencies[2]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][9]',  isset($frequencies) ? $frequencies[2]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['11'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['11'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][10]',  isset($frequencies) ? $frequencies[2]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][10]',  isset($frequencies) ? $frequencies[2]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[2]['rate']['12'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[2]['is_na']['12'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][11]',  isset($frequencies) ? $frequencies[2]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[2]['indicator'].'][11]',  isset($frequencies) ? $frequencies[2]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[2]['total'] : ''; ?>
						<?= input_hidden('id[2]', 'id[2]', 'id', isset($frequencies) ? $frequencies[2]['id'] : ''); ?>
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<!-- <button type="submit" class="btn btn-block btn-md btn-success" <?php  if ($_GET['status'] != 0) {echo "disabled";} ?>><i class="fa fa-save"></i> Save</button> -->
					</td>
				</tr>
			</tbody>
		</table>
		<!-- </form> -->
	</div>

	<?php endif ?>


	<?php if ($data['indicator_d'] != ''): $ob_label = 'E'; ?>

	<div class="col-md-12">
		<!-- <form id="qo_form4" action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[3]['id']; ?>&entry_id=<?php echo $_GET['entry_id']; ?>&indicator=<?php echo $frequencies[3]['indicator']; ?>&year=<?php echo $frequencies[3]['year']; ?>" method="POST"> -->
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator D: "<?= !$is_new ? $data['indicator_d'] : ''; ?>"
					</th>
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
				<!-- <?php if ($is_admin): ?>
					<tr style="font-size: 11px; background-color: #b8b8b8a3;">
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch1-indicator_d" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'January'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch1-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch2-indicator_d" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'February'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch2-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch3-indicator_d" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'March'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch3-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch4-indicator_d" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'April'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch4-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch5-indicator_d" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'May'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch5-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch6-indicator_d" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'June'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch6-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch7-indicator_d" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'July'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch7-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch8-indicator_d" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'August'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch8-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch9-indicator_d" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'September'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch9-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['10'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch10-indicator_d" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'October'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch10-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch11-indicator_d" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'November'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch11-indicator_d">Toggle</label>
							</div>

						</th>
						<th class="text-center" width="7.5%">
							<label>
		                      is Available?
		                    </label>

							<div class="switchToggle">
		  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[3]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

							    <input type="checkbox" id="switch12-indicator_d" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[3]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'December'){ echo 'onclick="return false;"'; } ?>>
							    <label for="switch12-indicator_d">Toggle</label>
							</div>

						</th>
					</tr>
					<?php endif ?> -->
			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['01'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['01'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][0]',  isset($frequencies) ? $frequencies[3]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-ban"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][0]',  isset($frequencies) ? $frequencies[3]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['02'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['02'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][1]',  isset($frequencies) ? $frequencies[3]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][1]',  isset($frequencies) ? $frequencies[3]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['03'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['03'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][2]',  isset($frequencies) ? $frequencies[3]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][2]',  isset($frequencies) ? $frequencies[3]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['04'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['04'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][3]',  isset($frequencies) ? $frequencies[3]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][3]',  isset($frequencies) ? $frequencies[3]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['05'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['05'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][4]',  isset($frequencies) ? $frequencies[3]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][4]',  isset($frequencies) ? $frequencies[3]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['06'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['06'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][5]',  isset($frequencies) ? $frequencies[3]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][5]',  isset($frequencies) ? $frequencies[3]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['07'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['07'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][6]',  isset($frequencies) ? $frequencies[3]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][6]',  isset($frequencies) ? $frequencies[3]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['08'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['08'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][7]',  isset($frequencies) ? $frequencies[3]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][7]',  isset($frequencies) ? $frequencies[3]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['09'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['09'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][8]',  isset($frequencies) ? $frequencies[3]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][8]',  isset($frequencies) ? $frequencies[3]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['10'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['10'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][9]',  isset($frequencies) ? $frequencies[3]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][9]',  isset($frequencies) ? $frequencies[3]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['11'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['11'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][10]',  isset($frequencies) ? $frequencies[3]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][10]',  isset($frequencies) ? $frequencies[3]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[3]['rate']['12'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[3]['is_na']['12'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][11]',  isset($frequencies) ? $frequencies[3]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[3]['indicator'].'][11]',  isset($frequencies) ? $frequencies[3]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[3]['total'] : ''; ?>
						<?= input_hidden('id[3]', 'id[3]', 'id', isset($frequencies) ? $frequencies[3]['id'] : ''); ?>
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<!-- <button type="submit" class="btn btn-block btn-md btn-success" <?php  if ($_GET['status'] != 0) {echo "disabled";} ?>><i class="fa fa-save"></i> Save</button> -->
					</td>
				</tr>
			</tbody>
		</table>
		<!-- </form> -->
	</div>

	<?php endif ?>


	<!------FORMULA-------->
	<div class="col-md-12">
		<!-- <form id="qo_formF" action="QMS/route/update_qms_qme_monthly.php?parent=<?= $_GET['parent']; ?>&qoe_id=<?= $_GET['id']; ?>&id=<?= $frequencies[4]['id']; ?>&entry_id=<?php echo $_GET['entry_id']; ?>&indicator=<?php echo $frequencies[4]['indicator']; ?>&year=<?php echo $frequencies[4]['year']; ?>" method="POST"> -->
		<table class="table table-striped table-bordered dropbox">
			<thead>
				<tr style="background-color: #367fa9; color: white;">
					<th class="text-center" colspan="13">Indicator <?php echo $ob_label; ?>: Formula:
						"<?= $data['formula']; ?>"</th>
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
				<!-- <?php if ($is_admin): ?>
				<tr style="font-size: 11px; background-color: #b8b8b8a3;">
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['01'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch1-indicator_e" name="is_na[01]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['01'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'January'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch1-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['02'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch2-indicator_e" name="is_na[02]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['02'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'February'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch2-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['03'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch3-indicator_e" name="is_na[03]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['03'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'March'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch3-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['04'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch4-indicator_e" name="is_na[04]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['04'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'April'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch4-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['05'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch5-indicator_e" name="is_na[05]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['05'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'May'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch5-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['06'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch6-indicator_e" name="is_na[06]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['06'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'June'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch6-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['07'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch7-indicator_e" name="is_na[07]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['07'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'July'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch7-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['08'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch8-indicator_e" name="is_na[08]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['08'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'August'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch8-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['09'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch9-indicator_e" name="is_na[09]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['09'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'September'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch9-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['10'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch10-indicator_e" name="is_na[10]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['10'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'October'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch10-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['11'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch11-indicator_e" name="is_na[11]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['11'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'November'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch11-indicator_e">Toggle</label>
						</div>

					</th>
					<th class="text-center" width="7.5%">
						<label>
	                      is Available?
	                    </label>

						<div class="switchToggle">
	  						<?= group_input_hidden('hidden_isna[]', isset($frequencies) ? (($frequencies[4]['is_na']['12'] == 'y')  ? 'y' : 'n') : 'n'); ?> 

						    <input type="checkbox" id="switch12-indicator_e" name="is_na[12]" <?= isset($frequencies) ? (($frequencies[4]['is_na']['12'] == 'y')  ? 'checked' : '') : ''; ?> <?php if ($qp_covered['qp_covered'] != 'December'){ echo 'onclick="return false;"'; } ?>>
						    <label for="switch12-indicator_e">Toggle</label>
						</div>

					</th>
				</tr>
				<?php endif ?> -->
			</thead>
			<tbody>
				<tr>
					<td class="text-center">
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['01'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['01'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][0]',  isset($frequencies) ? $frequencies[4]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-ban"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][0]',  isset($frequencies) ? $frequencies[4]['rate']['01'] : '', 'rate', $qp_covered['qp_covered'] != 'January' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['02'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['02'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][1]',  isset($frequencies) ? $frequencies[4]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][1]',  isset($frequencies) ? $frequencies[4]['rate']['02'] : '', 'rate', $qp_covered['qp_covered'] != 'February' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['03'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['03'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][2]',  isset($frequencies) ? $frequencies[4]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][2]',  isset($frequencies) ? $frequencies[4]['rate']['03'] : '', 'rate', $qp_covered['qp_covered'] != 'March' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['04'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['04'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][3]',  isset($frequencies) ? $frequencies[4]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][3]',  isset($frequencies) ? $frequencies[4]['rate']['04'] : '', 'rate', $qp_covered['qp_covered'] != 'April' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['05'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['05'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][4]',  isset($frequencies) ? $frequencies[4]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][4]',  isset($frequencies) ? $frequencies[4]['rate']['05'] : '', 'rate', $qp_covered['qp_covered'] != 'May' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['06'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['06'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][5]',  isset($frequencies) ? $frequencies[4]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][5]',  isset($frequencies) ? $frequencies[4]['rate']['06'] : '', 'rate', $qp_covered['qp_covered'] != 'June' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['07'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['07'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][6]',  isset($frequencies) ? $frequencies[4]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][6]',  isset($frequencies) ? $frequencies[4]['rate']['07'] : '', 'rate', $qp_covered['qp_covered'] != 'July' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['08'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['08'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][7]',  isset($frequencies) ? $frequencies[4]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][7]',  isset($frequencies) ? $frequencies[4]['rate']['08'] : '', 'rate', $qp_covered['qp_covered'] != 'August' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['09'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['09'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][8]',  isset($frequencies) ? $frequencies[4]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][8]',  isset($frequencies) ? $frequencies[4]['rate']['09'] : '', 'rate', $qp_covered['qp_covered'] != 'September' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['10'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['10'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][9]',  isset($frequencies) ? $frequencies[4]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][9]',  isset($frequencies) ? $frequencies[4]['rate']['10'] : '', 'rate', $qp_covered['qp_covered'] != 'October' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['11'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['11'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][10]',  isset($frequencies) ? $frequencies[4]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][10]',  isset($frequencies) ? $frequencies[4]['rate']['11'] : '', 'rate', $qp_covered['qp_covered'] != 'November' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (!$is_admin): ?>
						<label>
							<?= isset($frequencies) ? $frequencies[4]['rate']['12'] : ''; ?>
						</label>
						<?php else: ?>
						<?php if (!empty($frequencies[4]['is_na']['12'])): ?>
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][11]',  isset($frequencies) ? $frequencies[4]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php else: ?>
						<!-- <span><i class="fa fa-2x fa-ban" style="color:#dd4b39;"></i></span> -->
						<?= group_textnew('Rate', 'rate['.$frequencies[4]['indicator'].'][11]',  isset($frequencies) ? $frequencies[4]['rate']['12'] : '', 'rate', $qp_covered['qp_covered'] != 'December' ? true : false, 0); ?>
						<?php endif ?>
						<?php endif ?>
					</td>
					<td>
						<?= isset($frequencies) ? $frequencies[4]['total'] : ''; ?>
						<?= input_hidden('id[4]', 'id[4]', 'id', isset($frequencies) ? $frequencies[4]['id'] : ''); ?>
					</td>
				</tr>
				<tr style="background-color: #fbfbfb;">
					<td class="text-center" colspan="13">
						<!-- <button type="submit" class="btn btn-block btn-md btn-success" <?php  if ($_GET['status'] == 1) {echo "disabled";} ?>><i class="fa fa-save"></i> Save</button> -->
						<button type="button" class="btn btn-block btn-md btn-success"
							onclick="formsubmit(<?=$_GET['parent'];?>,<?= $_GET['id']; ?>,<?php echo $_GET['entry_id']; ?>,<?php echo $frequencies[0]['indicator']; ?>,<?php echo $frequencies[0]['year']; ?>,<?php echo $freq;?>);"><i
								class="fa fa-save"></i> Save</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</form>
</div>