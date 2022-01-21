<?php 
	function group_customselect($label, $name, $options, $value, $class, $is_supp=true, $label_size=1, $readonly=false, $body_size=1, $required=true) {
		$element = '<div id="cgroup-'.$name.'" class="form-group">';
		if ($label_size > 0) {
			$element .= '<label class=" control-label">'.$label.':</label><br>';
		}

	    if ($readonly) {
		   $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
	    } else {
	       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
	    }

	    if ($is_supp) {
			$element .= group_customoptions_supp($options, $value, $label);
	    } else {
			$element .= group_customoptions_po($options, $value, $label);
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
?>

<div class="col-md-12">
	<div class="box dropbox">
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
  					<div class="btn-group">
						<button type="submit" class="btn btn-md btn-success btn-generate" name="save"><i class="fa fa-edit"></i> Save</button>
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-md btn-primary btn-generate" name="save_new"><i class="fa fa-save"></i> Save & New</button>
					</div>
					<div class="btn-group">
						<a href="budget_ors.php" class="btn btn-md btn-default btn-generate" name=""><i class="fa fa-close"></i> Close</a>
					</div>
  				</div>
  				<div class="col-md-6">
  					<div class="pull-right">
  						<div class="btn-group">
							<button type="button" class="btn btn-md btn-success btn-generate"><i class="fa fa-upload"></i> Submit</button>
						</div>
  						<div class="btn-group">
							<button type="button" class="btn btn-md btn-primary btn-generate"><i class="fa fa-download"></i> Receive</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-md btn-warning btn-generate"><i class="fa fa-check-square-o"></i> Obligate</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-md btn-danger btn-generate"><i class="fa fa-reply"></i> Return</button>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-md btn-success btn-generate"><i class="fa fa-mail-forward"></i> Release</button>
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
		  				<div class="col-md-3">
		  					<?= group_select('Obligation Type', 'ob_type', $obligation_opts, '', 'ob_type', 1); ?>
		  				</div>
		  			</div>

		  			<div class="row">
						<div class="col-md-12">
							<?= group_input_checkbox('Download of Funds', 'dfunds', 'dfunds', 'dfunds', ''); ?>
						</div>
					</div>
		
					<div class="row">
		  				<div class="col-md-3">
		  					<?= group_textnew('Serial Number', 'serial_no', '', 'serial_no', false); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_customselect('Purchase Order', 'po_no', $po_opts, '', 'po_no', false); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_textnew('Amount', 'total_amount', '', 'amount', false); ?>
		  					<?= group_input_hidden('po_amount', ''); ?>
		  				</div>
		  				<div class="col-md-3">
		  					<?= group_textnew('Date Created', 'date_created', $now, 'date_created', true); ?>
		  				</div>
		  			</div>

		  			<div class="row">
		  				<div class="col-md-3">
		  					<?= group_customselect('Payee/Supplier', 'supplier', $supplier_opts, '', 'supplier'); ?>
		  				</div>

		  				<div class="col-md-9">
		  					<div class="row">
		  						<div class="col-md-6">
		  							<?= group_textarea('Address', 'address', ''); ?>
		  						</div>
		  						<div class="col-md-6">
		  							<?= group_textarea('Particulars', 'particulars', ''); ?>
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