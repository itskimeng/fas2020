<?php
	function group_custom_input_checkbox2($label, $id, $name, $class, $value, $label_size = 1, $body_size = 3, $checked = false)
	{
	    $element = '<div class="form-group">';
		$element .= '<div class="switchToggle">';
		if ($value) {
			$element .= '<input type="checkbox" id="cform-'.$name.'" class="'.$class.'" name="'.$name.'" checked>';
		} else {
			$element .= '<input type="checkbox" id="cform-'.$name.'" class="'.$class.'" name="'.$name.'">';
		}
		$element .= '<label for="cform-'.$name.'">'.$label.'</label>';
		
		if ($label_size > 0) {
			$element .= '<span>&nbsp; <b>'.$label.'</b></span>';
		}

		$element .= '</div>';
		$element .= '</div>';

	    return $element;
	}

?>

<?php if (!empty($fsource['id'])): ?>
	<div class="col-md-12">
		<div class="callout callout-info callout-dismissable">
			<ul style="margin-left: -2.5%;">
				<li><i class="fa fa-unlock-alt"></i> Unlock - wont appear fund source in Obligation.</li>
				<li><i class="fa fa-lock"></i> Lock - will appear fund source in Obligation.</li>
			</ul>
		 </div>
	</div>
<?php endif ?>

<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<a href="budget_fundsource.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="row pull-right">
  						<div class="col-md-12">
  							<?php if ($is_admin AND !$fsource['is_lock']): ?>
			  					<div class="btn-group">
									<button type="submit" class="btn btn-md btn-success btn-generate" name="save"><i class="fa fa-edit"></i> Save</button>
								</div>
								<div class="btn-group">
									<button type="submit" class="btn btn-md btn-primary btn-generate" name="save_new"><i class="fa fa-save"></i> Save & New</button>
								</div>

								<?php if (!empty($fsource['id'])): ?>
									<?php if (!$fsource['is_lock']): ?>
										<div class="btn-group">
											<button type="submit" class="btn btn-md btn-warning btn-lock" name="unlock" data-toggle="tooltip" data-placement="top" title="Lock Fund Source"><i class="fa fa-lock"></i> Lock</button>
										</div>
									<?php else: ?>
										<div class="btn-group">
											<button type="submit" class="btn btn-md btn-warning btn-lock" name="lock" data-toggle="tooltip" data-placement="top" title="Unlock Fund Source"><i class="fa fa-unlock-alt"></i> Unlock</button>
										</div>
									<?php endif ?>
								<?php endif ?>
							<?php elseif ($is_admin AND $fsource['is_lock']): ?>
								<div class="btn-group">
										<button type="submit" class="btn btn-md btn-warning btn-lock" name="lock" data-toggle="tooltip" data-placement="top" title="Unlock Fund Source"><i class="fa fa-unlock-alt"></i> Unlock</button>
									</div>
							<?php endif ?>
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
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-4">
		  					<?= group_input_hidden('source_id', $fsource['id']); ?>
		  					<?= group_textnew('Code', 'source_no', $fsource['code'], 'source_no', $is_admin ? false : true); ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_textnew('MFO/PPA', 'ppa', $fsource['ppa'], 'ppa', $is_admin ? false : true); ?>
		  				</div>
		  				<div class="col-md-4">
		  					<?= group_date2('Date', 'date_created', 'date_created', !empty($fsource['date_created']) ? $fsource['date_created'] : $now, 'date_created', 1, true); ?>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-4">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textarea('Name', 'fund_name', $fsource['fund_name'], 1, true, $is_admin ? false : true, 5); ?>
		  						</div>
		  					</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
		  							<?= group_textarea('Particulars', 'particulars', $fsource['particulars'], 1, true, $is_admin ? false : true, 5); ?>
								</div>
							</div>
		  				</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12">
		  							<?= group_textnew('Legal Basis', 'legal_basis', $fsource['legal_basis'], 'legal_basis', $is_admin ? false : true); ?>
								</div>
								<div class="col-md-12">
									<?= group_textnew('Created By', 'created_by', !empty($fsource['created_by']) ? $fsource['created_by'] : $currentuser, 'created_by', true); ?>
								</div>
							</div>
						</div>
		  			</div>
		  			
  				</div>
  			</div>
  		</div>
  	</div>		
</div>