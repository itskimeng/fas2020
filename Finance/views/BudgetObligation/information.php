<?php 
	function group_customselect($label, $name, $options, $value, $class, $sel_type, $label_size=1, $readonly=false, $body_size=1, $required=true) {
		$element = '<div id="cgroup-'.$name.'" class="form-group">';
		if ($label_size > 0) {
			$element .= '<label class=" control-label">'.$label.':</label><br>';
		}

	    if ($readonly) {
		   $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
	    } else {
	       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
	    }

	    if ($sel_type == 1) {
			$element .= group_customoptions_po($options, $value, $label);
	    } else if ($sel_type == 2) {
			$element .= group_customoptions_supp($options, $value, $label);
	    } else {
			$element .= group_customoptions_fs($options, $value, $label);
	    }

	    $element .= '</select>';
		$element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />';
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
						<a href="budget_obligation.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-close"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="pull-right">
  						<div class="btn-group">
							<button type="submit" class="btn btn-md btn-success btn-generate" name="save"><i class="fa fa-edit"></i> Save</button>
						</div>
						<div class="btn-group">
							<button type="submit" class="btn btn-md btn-primary btn-generate" name="save_new"><i class="fa fa-save"></i> Save & New</button>
						</div>

  						<?php if ($data['status'] == 'Draft'): ?>
	  						<div class="btn-group">
								<button type="button" class="btn btn-md btn-success btn-generate"><i class="fa fa-upload"></i> Submit</button>
							</div>
  						<?php endif ?>
  						
  						<?php if ($is_admin): ?>
	  						<?php if ($data['status'] == 'Submitted'): ?>
		  						<div class="btn-group">
									<button type="button" class="btn btn-md btn-primary btn-generate"><i class="fa fa-download"></i> Receive</button>
								</div>
	  						<?php endif ?>

	  						<?php if ($data['status'] == 'Received'): ?>
								<div class="btn-group">
									<button type="button" class="btn btn-md btn-warning btn-generate"><i class="fa fa-check-square-o"></i> Obligate</button>
								</div>
	  						<?php endif ?>

	  						<?php if (in_array($data['status'], ['Submitted', 'Received', 'Obligated'])): ?>
								<div class="btn-group">
									<button type="button" class="btn btn-md btn-danger btn-generate"><i class="fa fa-reply"></i> Return</button>
								</div>
	  						<?php endif ?>

	  						<?php if ($data['status'] == 'Obligated'): ?>
								<div class="btn-group">
									<button type="button" class="btn btn-md btn-success btn-generate"><i class="fa fa-mail-forward"></i> Release</button>
								</div>
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
		</div>
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="row">
		  				<div class="col-md-3">
		  					<?= group_select('Obligation Type', 'ob_type', $obligation_opts, $data['ob_type'], 'ob_type', 1); ?>
		  				</div>
		  			</div>

		  			<div class="row">
						<div class="col-md-12">
							<?= group_input_checkbox('Download of Funds', 'dfunds', 'dfunds', 'dfunds', ''); ?>
						</div>
					</div>
		
					<div class="row">
		  				<div class="col-md-3">
		  					<?= group_textnew('Serial Number', 'serial_no', $data['serial_no'], 'serial_no', false); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_customselect('Purchase Order', 'po_no', $po_opts, $data['pid'], 'po_no', 1); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_amount('Amount', 'total_amount', number_format($data['total_amount'], 2, '.', ','), 'amount'); ?>
		  					<?= group_input_hidden('po_amount', $data['total_amount']); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_textnew('Date Created', 'date_created', isset($data['date_created']) ? $data['date_created'] : $now, 'date_created', true); ?>
		  				</div>
		  			</div>

		  			<div class="row">
		  				<div class="col-md-3">
		  					<?= group_customselect('Payee/Supplier', 'supplier', $supplier_opts, $data['supplier'], 'supplier', 2); ?>
		  				</div>

		  				<div class="col-md-9">
		  					<div class="row">
		  						<div class="col-md-6">
		  							<?= group_textarea('Address', 'address', $data['address']); ?>
		  						</div>
		  						<div class="col-md-6">
		  							<?= group_textarea('Particulars', 'particulars', $data['remarks']); ?>
		  						</div>
		  					</div>
		  				</div>
		  		
		  			</div>
  				</div>
  			</div>
  		</div>
  	</div>		
</div>

<!-- <div class="col-md-6">
    <div class="callout callout-warning dropbox">
        <h4>Instruction!</h4>
        <p>Follow the steps to create new obligation:</p>
        <ol>
            <li>Select Obligation Type.</li>
            <li>Check Download of Funds if from Provincial Office.</li>
            <li>Click Generate button to generate Form</li>
            <li>Fill out neccessary fields and click Save</li>
        </ol>
      </div>
</div> -->