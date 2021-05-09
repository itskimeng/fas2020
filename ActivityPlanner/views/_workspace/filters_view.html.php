<?php 
	session_start();
	
	$user = $_SESSION['currentuser'];

	function group_select($label, $name, $options, $value, $class, $label_size, $readonly=false, $body_size=1, $required=true) {
		$element = '<div id="cgroup-'.$name.'" class="form-group">';
		if ($label_size > 0) {
			$element .= '<label class=" control-label">'.$label.':</label><br>';
		}

	    if ($readonly) {
		   $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" disabled>';
	       // $element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />'
	    } else {
	       $element .= '<select id="cform-'.$name.'" name="'.$name.'" class="form-control select2 '.$class.'" data-placeholder="-- Select '.$label.' --" required="'.$required.'">'; 
	    }

		$element .= group_options($options, $value);

	    $element .= '</select>';
		$element .= '<input type="hidden" name="hidden-'.$name.'" value="'.$value.'" />';
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

	function fetchPrograms() {
        $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

        $programs = [];

        $sql = "SELECT id, code, name FROM event_programs"; 
        $query = mysqli_query($conn, $sql);
        
        $programs['ALL'] = 'ALL';
        while ($row = mysqli_fetch_assoc($query)) {
            $programs[$row['code']] = $row['code'];
        }

        return $programs;
    }

    function fetchActivities() {
    	$user = $_SESSION['currentuser'];
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $data = [];
        $sql = "SELECT 
                    events.id as id, 
                    events.title as title,
                    events.program as program,
                    events.code_series as code
                FROM events
                LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = events.office
                LEFT JOIN tblemployeeinfo te on te.EMP_N = events.postedby
                LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION
                LEFT JOIN event_subtasks es on es.event_id = events.id
                
                    WHERE tp.DIVISION_M like '%CDD%' AND es.emp_id = $user
                    ORDER BY events.id DESC";

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data[$row['id']] = $row['code'] .' : '.$row['title'];
        } 

        return $data;
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
?>

<!-- program -->
<div class="col-md-4">
	<?php echo group_select('Program', 'filter_program', fetchPrograms(), 'ALL', 'filter_program', 1, false) ?>
</div>

<!-- title -->
<div class="col-md-4">
	<?php echo group_select('Title', 'filter_title', fetchActivities(), '', 'filter_title', 1, false) ?>
</div>

<!-- timeline -->
<div class="col-md-4">
	<?php echo group_daterange3('Timeline', 'filter_timeline', 'filter_timeline', '', '', 'daterange ', 1, ''); ?>
</div>	

<div class="col-md-12">
	<div class="pull-right">
		<div class="btn-group">	            		
			<button type="button" class="btn btn-block btn-default btn-filter_clear"><i class="fa fa-reorder"></i> Clear</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-block btn-primary btn-primary-filter"><i class="fa fa-filter"></i> Filter</button>
		</div>
	</div>
</div>