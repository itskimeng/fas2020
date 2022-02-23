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

	function group_customselect($label, $name, $options, $value, $class, $sel_type, $label_size=1, $readonly=false, $body_size=1, $required=true) {
		$element = '<div id="cgroup-'.$name.'" class="form-group">';
		if ($label_size > 0) {
			$element .= '<label class=" control-label">'.$label.':</label><br>';
		}

	    if ($readonly) {
		   $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
	    } else {
	       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
	    }

	    if ($sel_type == 1) {
			$element .= group_customoptions_po($options, $value, $label);
	    } else if ($sel_type == 2) {
			$element .= group_customoptions_supp($options, $value, $label);
	    } else {
			$element .= group_customoptions_fs($options, $value, $label);
	    }

	    $element .= '</select>';
		$element .= '<input type="hidden" id="hidden-'.$name.'" name="hidden-'.$name.'" value="'.$value.'" />';
		$element .= '</div>';

		return $element;
	}

	function group_customoptions_supp($fields, $selected, $label) {
	    $element = '<option disabled selected>-- Please select '.$label.' --</option>';
	    foreach ($fields as $key=>$value) {
	        if ($key == $selected) {
	            $element .= '<option value="'.$key.'" data-address="'.$value['address'].'" selected="selected">'.$value['name'].'</option>';
	        } else {
	            $element .= '<option value="'.$key.'" data-address="'.$value['address'].'">'.$value['name'].'</option>';
	        }
	    }
	    
	    return $element;
	}

	function group_customoptions_po($fields, $selected, $label) {
	    $element = '<option disabled selected>-- Please select '.$label.' --</option>';
	    foreach ($fields as $key=>$value) {
	        if ($key == $selected) {
	            $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'" selected="selected">'.$value['po'].'</option>';
	        } else {
	            $element .= '<option value="'.$key.'" data-amount="'.$value['po_amount'].'" data-supplier="'.$value['supp_id'].'">'.$value['po'].'</option>';
	        }
	    }
	    
	    return $element;
	}

	function group_customoptions_fs($fields, $selected, $label) {
	    $element = '<option disabled selected>-- Please select '.$label.' --</option>';
	    foreach ($fields as $key=>$value) {
	        if ($key == $selected) {
	            $element .= '<option value="'.$key.'" data-ppa="'.$value['ppa'].'" selected="selected">'.$value['source_no'].'</option>';
	        } else {
	            $element .= '<option value="'.$key.'" data-ppa="'.$value['ppa'].'">'.$value['source_no'].'</option>';
	        }
	    }
	    
	    return $element;
	}
?>

<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
					<div class="btn-group">
						<a href="budget_obligation.php" class="btn btn-md btn-default" name=""><i class="fa  fa-arrow-circle-left"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="pull-right">
  						<?php if (!in_array($data['status'], ['Released'])): ?>
	  						
	  						<?php if (!$is_admin): ?>
	  							<?php if (in_array($data['status'], ['Draft', 'Returned']) OR isset($_GET['new'])): ?>
		  							<div class="btn-group">
										<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
									</div>
									<div class="btn-group">
										<button type="submit" class="btn btn-md btn-primary" name="save_new"><i class="fa fa-save"></i> Save & New</button>
									</div>
									
									<?php if (isset($data['status'])): ?>
										<div class="btn-group">
											<button type="submit" name="submit" class="btn btn-md btn-success"><i class="fa fa-upload"></i> Submit</button>
										</div>
									<?php endif ?>
	  							<?php endif ?>	
	  						<?php else: ?>
	  							<?php if (isset($_GET['new'])): ?>
	  								<div class="btn-group">
										<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
									</div>
									<div class="btn-group">
										<button type="submit" class="btn btn-md btn-primary" name="save_new"><i class="fa fa-save"></i> Save & New</button>
									</div>	
	  							<?php elseif (!in_array($data['status'], ['Returned', 'Submitted']) AND $data['created_by'] == $_SESSION['currentuser']): ?>
		  							<div class="btn-group">
										<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
									</div>
									<div class="btn-group">
										<button type="submit" class="btn btn-md btn-primary" name="save_new"><i class="fa fa-save"></i> Save & New</button>
									</div>

									<?php if (!in_array($data['status'], ['Received', 'Obligated'])): ?>
										<div class="btn-group">
											<button type="submit" name="submit" class="btn btn-md btn-success"><i class="fa fa-upload"></i> Submit</button>
										</div>
									<?php endif ?>

								<?php elseif (!in_array($data['status'], ['Returned', 'Submitted']) AND $data['received_by'] == $_SESSION['currentuser']): ?>
										<div class="btn-group">
											<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
										</div>
										<div class="btn-group">
											<button type="submit" class="btn btn-md btn-primary" name="save_new"><i class="fa fa-save"></i> Save & New</button>
										</div>
								<?php elseif (in_array($data['status'], ['Returned']) AND $data['created_by'] == $_SESSION['currentuser']): ?>
									<div class="btn-group">
										<button type="submit" class="btn btn-md btn-success" name="save"><i class="fa fa-edit"></i> Save</button>
									</div>
									<div class="btn-group">
										<button type="submit" class="btn btn-md btn-primary" name="save_new"><i class="fa fa-save"></i> Save & New</button>
									</div>
									<div class="btn-group">
										<button type="submit" name="submit" class="btn btn-md btn-success"><i class="fa fa-upload"></i> Submit</button>
									</div>
	  							<?php endif ?>

	  							<?php if ($data['status'] == 'Submitted'): ?>
			  						<div class="btn-group">
										<button type="submit" name="receive" class="btn btn-md btn-primary"><i class="fa fa-download"></i> Receive</button>
									</div>
		  						<?php endif ?>

		  						<?php if ($data['status'] == 'Received'): ?>
									<div class="btn-group">
										<button type="submit" name="obligate" class="btn btn-md btn-warning"><i class="fa fa-check-square-o"></i> Obligate</button>
									</div>
		  						<?php endif ?>

		  						<?php if (in_array($data['status'], ['Submitted', 'Received', 'Obligated'])): ?>
									<div class="btn-group">
										<button type="button" name="return" class="btn btn-md btn-danger btn-return" data-toggle="modal" data-target="#modal_return_edit_obligation"><i class="fa fa-reply"></i> Return</button>
									</div>
		  						<?php endif ?>

		  						<?php if ($data['status'] == 'Obligated'): ?>
									<div class="btn-group">
										<button type="submit" name="release" class="btn btn-md btn-success"><i class="fa fa-mail-forward"></i> Release</button>
									</div>
		  						<?php endif ?>			
	  						<?php endif ?>
  						
  						<?php endif ?>		
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
		  				<div class="col-md-3">
		  					<?= group_input_hidden('is_admin', $is_admin); ?>
		  					<?= group_input_hidden('source_id', $data['obligation_id']); ?>

		  					<?= group_select('Obligation Type', 'ob_type', $obligation_opts, $data['ob_type'], 'ob_type', 1, $is_readonly); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?php if (!empty($data['serial_no'])): ?>
		  						<?= group_textnew('Serial Number', 'serial_no', $data['serial_no'], 'serial_no', $is_admin AND !$is_readonly ? false : true); ?>
		  					<?php elseif ($is_admin): ?>
		  						<?= group_textnew('Serial Number', 'serial_no', $data['serial_no'], 'serial_no', $is_readonly); ?>
		  					<?php endif ?>
		  				</div>
		  				<div class="col-md-3"></div>
		  				<div class="col-md-3">
		  					<?= group_textnew('Date Created', 'date_created', isset($data['date_created']) ? $data['date_created'] : $now, 'date_created', true); ?>
		  				</div>
		  			</div>

					<div class="row">
		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_customselect('Purchase Order', 'po_no', $po_opts, isset($poid) ? $poid : $data['pid'], 'po_no', 1, 1, $is_readonly); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<?php if (!empty($data['pid'])): ?>
				  						<?= group_customselect('Payee', 'supplier', $data['is_dfunds'] ? $huc_opts : $supplier_opts, $data['supplier'], 'supplier', 2, 1, true); ?>
				  					<?php else: ?>
				  						<?= group_customselect('Payee', 'supplier', $data['is_dfunds'] ? $huc_opts : $supplier_opts, $data['supplier'], 'supplier', 2, 1, $is_readonly); ?>
				  					<?php endif ?>
		  						</div>
		  					</div>
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_custom_input_checkbox2('Download of Funds?', 'dfunds', 'dfunds', 'dfunds', $data['is_dfunds']); ?>
		  						</div>
		  					</div>
		  				</div>

		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<div class="form-group">
					  					<?php if (!empty($data['pid'])): ?>
					  						<?= group_amount('Amount', 'total_po_amount', number_format($data['total_amount'], 2, '.', ','), 'amount', true); ?>
					  					<?php else: ?>	
					  						<?= group_amount('Amount', 'total_po_amount', number_format($data['total_amount'], 2, '.', ','), 'amount', $is_readonly); ?>
					  					<?php endif ?>
					  					<?= group_input_hidden('po_amount', $data['total_amount']); ?>
		  							</div>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
									<?= group_textarea('Address', 'address', $data['address'], 1, true, $is_readonly); ?>
		  							
		  						</div>
		  					</div>
		  				</div>

		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textarea('Particulars', 'particulars', $data['purpose'], 1, true, $is_readonly, 7); ?>
		  						</div>
		  					</div>
		  				</div>

		  				<div class="col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('Status', 'status', !empty($data['status']) ? $data['status'] : 'Draft', 'status', true); ?>
		  						</div>
		  					</div>

		  					<div class="row">
		  						<div class="col-md-12">
		  							<?= group_textnew('Created By', 'created_by', $data['uname'], 'created_by', true); ?>
		  						</div>
		  					</div>
		  				</div>
		  				
		  			</div>
		  			

  				</div>
  			</div>
  		</div>
  	</div>		
</div>