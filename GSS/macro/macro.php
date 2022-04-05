<?php
function proc_group_select($label, $name, $options, $value, $class, $label_size = 1, $readonly = false, $body_size = 1, $required = true)
{
    $element = '<div id="cgroup-' . $name . '" class="form-group">';
    if ($label_size > 0) {
        $element .= '<label class=" control-label">' . $label . ':</label><br>';
    }

    if ($readonly) {
        $element .= '<select value="5" id="cform-' . $name . '" name="' . $name . '" class="form-control select2 ' . $class . '" data-placeholder="-- Select ' . $label . ' --" readonly disabled>';
        // $element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />'
    } else {
        $element .= '<select id="cform-' . $name . '" name="' . $name . '" class="form-control select2 ' . $class . '" data-placeholder="-- Select ' . $label . ' --" required="' . $required . '" style="width:100%;" >';
    }

    $element .= pgroup_options($options, $value, $label);
    $element .= '</select>';
    $element .= '<input type="hidden" name="hidden-' . $name . '" value="' . $value . '" />';
    $element .= '</div>';

    return $element;
}
function pgroup_options($fields, $selected, $label)
{
    $element = '<option disabled>-- Please select ' . $label . ' --</option>';
    foreach ($fields as $key => $value) {
        if ($key == $selected) {
            $element .= '<option selected value="'.$key.'"  data-id = "'.$value.'"  data-pmo="'.$value['pmo'].'" data-value="'.$key.'" >'.$value.'</option>';
        } else {
            $element .= '<option value="'.$key.'" data-id = "'.$value.'" data-value="'.$key.'">'.$value.'</option>';
        }
    }

    return $element;
}
function proc_text_input($type, $classname, $id, $name, $required = true, $value)
{
    $required_val = ($required) ? 'required = "required" ' : '';
    // if($id== 'rfq')
    // {
        $element = '<input  type="' . $type . '" class="' . $classname . '" id="' . $id . '" name="' . $name . '"' . $required_val . '"  value="' . $value . '"  />';

    // }else{
    //     $element = '<input type="' . $type . '" class="' . $classname . '" id="' . $id . '" name="' . $name . '' . $required_val . '"  value="' . $value . '"  />';

    // }
    return $element;
}
function proc_form_control($label, $type, $classname, $id, $name, $required = true, $value, $size)
{
    $required_val = ($required) ? 'required' : '';



    switch ($type) {
        case 'text':
            $element  = '<div class="form-group">';
            $element .= '<label for="stockNo">' . $label . '</label>';
            $element .= '<input type="' . $type . '" class="' . $classname . '" id="' . $id . '" name="' . $name . '" ' . $required_val . '  value="' . $value . '"  />';
            $element .= '</div>';
            break;
        case 'checkbox':
            $element  = '<div class="col-md-' . $size . '">';
                    $element .= '<label style="display:inline-block;line-height:35px;">';
                    $element .= '<input  type="' . $type . '" class="' . $classname . '" id="' . $id . '" name="' . $name . '" "' . $required_val . '"  value="' . $value . '"  />';
                    $element .= $label;
                    $element .= '</label>';
                    $element .= '</div>';
            break;
        case 'number':
            $element  = '<div class="form-group">';
            $element .= '<label for="stockNo">' . $label . '</label>';
            $element .= '<input type="' . $type . '" class="' . $classname . '" id="' . $id . '" name="' . $name . '" "' . $required_val . '"  value="' . $value . '"  />';
            $element .= '</div>';
            break;

        default:
            # code...
            break;
    }

    return $element;
}
function proc_action_btn($label, $param3, $id, $class, $val, $param1, $param2, $icon, $path)
{
    if($path == '#')
    {
        $element = '<button type="button" ' . $param3 . 'id="' . $id . '" class="' . $class . '" value="' . $val . '" style = "width:100%;">';
        $element .= '<i class="' . $icon . ' pull-left"></i> ' . $label . '';
        $element .= '</button>'; 
    }else if($path == 'submit')
        {
            $element = '<button type="submit" ' . $param3 . 'id="' . $id . '" class="' . $class . '" value="' . $val . '"style = "width:100%;" >';
            $element .= '<i class="' . $icon . ' pull-left"></i> ' . $label . '';
            $element .= '</button>'; 
    }else{
        $element = '<button ' . $param3 . 'id="' . $id . '" class="' . $class . '" value="' . $val . '" style = "width:100%;">';
        $element .= '<a href="' . $path . '' . $param1 . '' . $param2 . '" style="color: #fff;">';
        $element .= '<i class="' . $icon . ' pull-left"></i> ' . $label . '</a>';
        $element .= '</button>';
    }
    
    return $element;
}

function proc_select_form_control($label, $options, $value)
{
    $element = '<div class="form-group">';
    $element .= '<label>' . $label . '<i style="color: red;">*</i></label>';
    $element .= '<select class="form-control select2" style="width: 100%;" name="unit" data-placeholder="--Select Unit --">';
    $element .= proc_group_options($options, $value);
    $element .= '</select>';
    $element .= '</div>';
    return $element;
}

function proc_group_options($fields, $selected)
{

    $element = '<option></option>';

    foreach ($fields as $key => $display) {
        if ($key == $selected) {
            $element .= '<option value="' . $key . '" selected="selected">' . $display . '</option>';
        } else {
            $element .= '<option value="' . $key . '">' . $display['item'] . '</option>';
        }
    }

    return $element;
}

?>