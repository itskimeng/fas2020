<?php

function group_input_checkbox($label, $id, $name, $class, $value, $label_size=1, $body_size, $checked=false) {
    $element = '<div class="form-group col-md-'.$size.'">';
    $element .= '<div class="checkbox">';
    $element .= '<label>';
    
    if ($checked) {
        $element .= '<input type="checkbox" id="cform-'.$id.'" name="'.$name.'" class="'.$class.'" value="'.$value.'" checked=checked>';
    } else {
        $element .= '<input type="checkbox" id="cform-'.$id.'" name="'.$name.'" class="'.$class.'" value="'.$value.'">';
    }
    if ($label_size > 0) {
        $element .= $label;
    }
    $element .= '</label>';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_input_checkbox_minimal($label, $id, $name, $class, $value, $label_size=1, $body_size='', $checked=false, $disabled = false) {
    $element = '<div class="form-group col-md-'.$size.'">';

    if ($disabled) {
        $dd = "disabled readonly";
    } else {
        $dd = '';
    }
    $element .= '<div class="checkbox">';
    $element .= '<label>';
    
    if ($checked) {
        $element .= '<input type="checkbox" id="cform-'.$id.'" name="'.$name.'" class="minimal '.$class.'" value="'.$value.'" checked=checked '.$dd.'>';
    } else {
        $element .= '<input type="checkbox" id="cform-'.$id.'" name="'.$name.'" class="minimal '.$class.'" value="'.$value.'" '.$dd.'>';
    }
    if ($label_size > 0) {
        $element .= $label;
    }
    $element .= '</label>';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_input_hidden($name,$value='') {
    $element .= '<input id="cform-'.$name.'" type="hidden" name="'.$name.'" value="'.$value.'"/>'; 

    return $element;    
}

function input_hidden($id,$name,$class,$value='') {
    $element = '<input id=cform-'.$id.' type="hidden" name='.$name.' class='.$class.' value="'.$value.'" />'; 
    
    return $element;    
}

function input_hidden_array($id,$name,$class,$value='') {
    $element = '<input id=cform-'.$id.' type="hidden" name='.$name.' class='.$class.' value='.$value.' />'; 
    
    return $element;    
}

function input_hidden_array_text($id,$name,$class,$value='') {
    $element = '<input id=cform-'.$id.' type="hidden" name='.$name.' class='.$class.' value="'.$value.'" />'; 
    
    return $element;    
}

function input_hidden_array2($id,$name,$class,$value='') {
    $element = "<input id='cform-".$id."' type='hidden' name='".$name."' class='".$class."' value='".$value."' />"; 
    
    return $element;    
}

function group_custom_img($value) {
    $element = '<img src="'.$value.'" class="img-rounded" style="width: 40px; height: 40px"/>';

    return $element;
}

function group_text($label,$name,$value='', $disabled='',$label_size=1,$readonly=false,$class,$type='text', $required=true) {

    if ($required) {
        $required = 'required = "required"';
    } else {
        $required = '';
    }

    $element = '<div id="cgroup-'.$name.'" class="form-group">';
    if ($label_size > 0) {
    	$element .= '<label class="control-label">'.$label.':</label><br>';
    }

    if ($readonly) {
        $element .= '<input id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" class="form-control '.$class.'" '.$disabled.' value="'.$value.'" "'.$required.'" novalidate readonly/>';	
    } else {
        $element .= '<input id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" class="form-control '.$class.'" '.$disabled.' value="'.$value.'" "'.$required.'" novalidate />';   
    }

    if ($disabled) {
        $element .= '<input type="hidden" id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" value="'.$value.'">';
    }
    $element .= '</div>';

    return $element;    
}

function group_text_no_label($label,$name,$value='', $disabled='',$label_size=1,$readonly=false,$class,$type='text', $required=true) {

    if ($required) {
        $required = 'required = "required"';
    } else {
        $required = '';
    }

    $element = '<div id="cgroup-'.$name.'" class="form-group" style="margin-top: -15px;">';

    if ($readonly) {
        $element .= '<input id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" class="form-control '.$class.'" '.$disabled.' value="'.$value.'" "'.$required.'" novalidate readonly/>';    
    } else {
        $element .= '<input id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" class="form-control '.$class.'" '.$disabled.' value="'.$value.'" "'.$required.'" novalidate />';   
    }

    if ($disabled) {
        $element .= '<input type="hidden" id="cform-'.$name.'" placeholder="'.$label.'" type="'.$type.'" name="'.$name.'" value="'.$value.'">';
    }
    $element .= '</div>';

    return $element;    
}

function group_select($label, $name, $options, $value, $class, $label_size, $readonly=false, $body_size=1, $required=true) {
	$element = '<div id="cgroup-'.$name.'" class="form-group">';
	if ($label_size > 0) {
		$element .= '<label class=" control-label">'.$label.':</label><br>';
	}

    if ($readonly) {
	   $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled style="width: 100%;">';
       // $element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />'
    } else {
       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select_2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'" style="width: 100%;">'; 
    }

	$element .= group_options($options, $value);

    $element .= '</select>';
	$element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />';
	$element .= '</div>';

	return $element;
}

function group_selectmulti($label,$id,$name, $options, $required=true) {

    $element = '<div class="form-group">';
    $element .= '<label>'.$label.':</label><br>';
    $element .= '<select class="form-control select_2 ddd" name="'.$name.'[]" id="cform-'.$id.'" multiple="multiple" data-placeholder="Select Participants" required="'.$required.'" style="width: 100%;">';
    $element .= group_multi_options($options, '');
    $element .= '</select>';
    $element .= '</div>';

    return $element;
}

function group_selectmulti_with_button($label,$id,$name, $options, $required=true) {

    $element = '<div class="form-group">';
    $element .= '<label>'.$label.':</label>'; 
    $element .= '<button type="button" class="btn btn-primary btn-xs pull-right btn-select_allcollab" style="margin-top: 3px;" name="button"> All</button>';
    $element .= '<br>';
    $element .= '<select class="form-control select_2 ddd" name="'.$name.'[]" id="cform-'.$id.'" multiple="multiple" data-placeholder="Select Participants" required="'.$required.'" style="width: 100%;">';
    $element .= group_multi_options($options, '');
    $element .= '</select>';
    $element .= '</div>';

    return $element;
}

function group_options($fields, $selected) {
    $element = '<option disabled selected></option>';
    foreach ($fields as $key=>$value) {
        if ($key == $selected) {
            $element .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';
        } else {
            $element .= '<option value="'.$key.'">'.$value.'</option>';
        }
    }
    
    return $element;
}

function group_multi_options($fields, $selected) {

    // $element = '<option></option>';

    foreach ($fields as $key=>$display) {
        if ($key == $selected) {
            $element .= '<option value="'.$key.'" selected="selected">'.$display.'</option>';
        } else {
            $element .= '<option value="'.$key.'">'.$display.'</option>';
        }
    }    

    return $element;
}

function group_rateme($label, $name, $value, $label_size=1, $body_size=1) {

    $element = '<div id="cgroup-'.$name.'" class="form-group rate">';
    if ($label_size > 0) {
        $element .= '<label class="control-label">'.$label.':</label><br>';
    }
    $element .= '<input type="hidden" id="cform-'.$name.'" name="'.$name.'" value="'.$value.'">';

    for ($i=1; $i <= 5; $i++) { 
        if ($i <= $value) {
            $element .= '<span class="fa fa-star rate'.$i.' fa-3x" name="rate'.$i.'[]" value="'.$i.'" style="padding:0 0 0 2.5%;color:gold"></span>';
        } else {
            $element .= '<span class="fa fa-star rate'.$i.' fa-3x" name="rate'.$i.'[]" value="'.$i.'" style="padding:0 0 0 2.5%;color:gray"></span>';
        }
    }
    $element .= '<b>';
    $element .= '<div id="cform-priority_label" class="pull-right">';
    $element .= '<label></label>';
    $element .= '</div>';
    $element .= '</b>';

    $element .= '</div>';

    return $element;    
}

function group_daterangepicker($label, $name) {
    $element = '<div class="form-group">';
    $element .= '<label>'.$label.':</label>';
    $element .= '<div class="input-group">';
    $element .= '<button type="button" class="btn btn-default pull-right" id="daterange-btn">';
    $element .= '<span>';
    $element .= '<i class="fa fa-calendar"></i>'; 
    $element .= '';
    $element .= '</span>';
    $element .= '<i class="fa fa-caret-down"></i>';
    $element .= '</button>';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_textarea($label, $name, $value='', $label_size=1, $required=true, $readonly=false) {
    $element = '<div class="form-group">';
    if ($label_size > 0) {
        $element .= '<label>'.$label.':</label>';
    }

    if ($required) {
        $required = 'required="required"';
    } else {
        $required = '';
    }

    if ($readonly) {
        $element .= '<textarea id="cform-'.$name.'" name="'.$name.'" class="form-control '.$name.'" rows="3" placeholder="'.$label.'" "'.$required.'" readonly>';
    } else {
        $element .= '<textarea id="cform-'.$name.'" name="'.$name.'" class="form-control '.$name.'" rows="3" placeholder="'.$label.'" "'.$required.'">';
    }
    
    $element .= $value;
    $element .= '</textarea>';
    $element .= '</div>';

    return $element;
}

function group_newtextarea($label, $name, $value='', $label_size=1, $has_counter=true, $required=true, $readonly=false) {
    $element = '<div class="form-group">';
    if ($label_size > 0) {
        $element .= '<label>'.$label.':</label>';
    }

    if ($required) {
        $required = 'required="required"';
    } else {
        $required = '';
    }

    if ($readonly) {
        $element .= '<textarea id="cform-'.$name.'" name="'.$name.'" class="form-control '.$name.'" rows="3" placeholder="'.$label.'" "'.$required.'" readonly>';
    } else {
        $element .= '<textarea id="cform-'.$name.'" name="'.$name.'" class="form-control '.$name.'" maxlength="500" rows="3" placeholder="'.$label.'" "'.$required.'">';
    }
    
    $element .= $value;
    $element .= '</textarea>';
    $element .= '<span class="pull-right label label-default" id="count_message"></span>';
    $element .= '</div>';

    return $element;
}

function group_daterange1 ($label, $from_name, $to_name, $class, $value_from, $value_to, $readonly=false) {
    $element  = '<div class="form-group">';
    $element .= '<input type="hidden" id="cform-'.$from_name.'" name="'.$from_name.'" value="'.$value_from.'">';
    $element .= '<input type="hidden" id="cform-'.$to_name.'" name="'.$to_name.'" value="'.$value_to.'">';
    $element .= '<label>'.$label.':</label>';
    $element .= '<div class="input-group">';
    $element .= '<button type="button" class="btn btn-default pull-right" id="daterange-btn">';
    $element .= '<span>';
    $element .= '<i class="fa fa-calendar"></i>' .$label;
    $element .= '</span>';
    $element .= '<i class="fa fa-caret-down"></i>';
    $element .= '</button>';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_daterange ($label, $id, $name_from, $name_to, $value_from, $value_to, $id_from, $id_to, $class, $label_size=1, $format_display = 'm/d/Y') {

    $element = '<div class="form-group">';

    $element .= '<input type="hidden" id="cform-'.$id_from.'" name="'.$name_from.'" value="'.$value_from.'">';
    $element .= '<input type="hidden" id="cform-'.$id_to.'" name="'.$name_to.'" value="'.$value_to.'">';

    if ($label_size > 0) {
        $element .= '<label>'.$label.':</label>';
    }

    $element .= '<div class="input-group">';
    $element .= '<div class="input-group-addon">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</div>';
    // $element .= '<input type="text" class="form-control pull-right daterange" id="reservation">';
    $element .= '<input type="text" name="'.$name_from.'_'.$name_to.'" class="form-control pull-right '.$class.'" placeholder="'.$label.'" value="'.(empty($value_from)?date($format_display):$value_from).' - '.(empty($value_to)?date($format_display):$value_to).'" id="'.$id.'">';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}


function group_daterange3 ($label, $id, $name, $value_from, $value_to, $class, $label_size=1, $is_readonly=false, $format_display = 'm/d/Y') {

    $element = '<div class="form-group">';

    if ($label_size > 0) {
        $element .= '<label>'.$label.':</label>';
    }

    $element .= '<div class="input-group">';
    $element .= '<div class="input-group-addon input-sm">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</div>';
    if (!$is_readonly) {
        $element .= '<input type="text" name="'.$name.'" class="form-control pull-right '.$class.'" placeholder="'.$label.'" value="'.(empty($value_from)?date($format_display):$value_from).' - '.(empty($value_to)?date($format_display):$value_to).'" id="'.$id.'">';
    } else {
        $element .= '<input type="text" name="'.$name.'" class="form-control pull-right '.$class.'" placeholder="'.$label.'" value="'.(empty($value_from)?date($format_display):$value_from).' - '.(empty($value_to)?date($format_display):$value_to).'" id="'.$id.'" disabled>';  

        $input_hidden = input_hidden('timeline', 'timeline[]', 'timeline', $value_from .'-'. $value_to);
        
        echo $input_hidden;
    }
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_daterange3_with_chkbox ($label, $id, $name, $value_from, $value_to, $class, $label_size=1, $is_readonly=false, $format_display = 'm/d/Y') {

    $element = '<div class="form-group">';

    if ($label_size > 0) {
        $element .= '<label>'.$label.':</label>';
        $element .= '<div class="form-group pull-right" style="margin-top: -11px; margin-bottom: -4px;">';
        $element .= '<div class="col-md-5">
                    <div class="radio">
                        <label>
                            <input type="radio" class="date_type" name="date_type" id="cform-daterange_type" value="range" checked/>
                            Range
                        </label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="radio">
                        <label>
                            <input type="radio" class="date_type" name="date_type" id="cform-selecteddates_type" value="selected"/>
                            Selected
                        </label>
                    </div>
                </div>';
        $element .= '</div><br>';
    }

    $element .= '<div class="input-group input-group-'.$class.'">';
    $element .= '<div class="input-group-addon input-sm">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</div>';
    if (!$is_readonly) {
        $element .= '<input type="text" name="'.$name.'" class="form-control pull-right '.$class.'" placeholder="'.$label.'" value="'.(empty($value_from)?date($format_display):$value_from).' - '.(empty($value_to)?date($format_display):$value_to).'" id="'.$id.'">';
    } else {
        $element .= '<input type="text" name="'.$name.'" class="form-control pull-right '.$class.'" placeholder="'.$label.'" value="'.(empty($value_from)?date($format_display):$value_from).' - '.(empty($value_to)?date($format_display):$value_to).'" id="'.$id.'" disabled>';  

        $input_hidden = input_hidden('timeline', 'timeline[]', 'timeline', $value_from .'-'. $value_to);
        
        echo $input_hidden;
    }
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_date($label, $id, $name, $value, $class, $label_size=1, $is_readonly=false, $format_display = 'm/d/Y') {
    $element = '<div class="form-group">';
    $element .= '<label>'.$label.':</label>';
    $element .= '<div class="input-group date">';
    $element .= '<div class="input-group-addon">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</div>';
    $element .= '<input type="text" name="'.$name.'" class="form-control pull-right" id="datepicker">';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}

function group_date2($label, $id, $name, $value, $class, $label_size=1, $is_readonly=false, $format_display = 'm/d/Y') {
    $element = '<div class="form-group">';
    $element .= '<label>'.$label.':</label>';
    $element .= '<div class="input-group date">';
    $element .= '<div class="input-group-addon">';
    $element .= '<i class="fa fa-calendar"></i>';
    $element .= '</div>';
    $element .= '<input type="text" name="'.$name.'" class="form-control pull-right" id="cform-'.$id.'">';
    $element .= '</div>';
    $element .= '</div>';

    return $element;
}





