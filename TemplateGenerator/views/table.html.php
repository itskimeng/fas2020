<?php
	require_once 'TemplateGenerator/controller/TemplateGeneratorController.php';	
?>

<div class="box box-primary dropbox">
	<div class="box-header">
		<div class="filter_buttons hidden">
			<div class="row">
				<!-- program -->
				<div class="col-md-4">
			    	<?php echo group_select('Title', 'filter_title', $title_opts, 'ALL', 'filter_title', 1, false) ?>
				</div>

				<!-- title -->
				<div class="col-md-4">
			    	<?php echo group_select('Venue', 'filter_venue', $venue_opts, 'ALL', 'filter_venue', 1, false) ?>
				</div>

				<div class="col-md-4">
			    	<?php echo group_select('OPR', 'filter_opr', $opr_opts, 'ALL', 'filter_opr', 1, false) ?>
				</div>
			</div>
			<div class="row">

				<!-- timeline -->
				<div class="col-md-4">
			    	<?php echo group_daterange3('Activity Date', 'filter_activity_date', 'filter_activity_date', '', '', 'daterange ', 1, $subtask['is_readonly']); ?>
				</div>	

				<div class="col-md-4">
					<?php echo group_date2('Date Issued', 'filter_date_issued', 'filter_date_issued', '', '') ?>
				</div>

				<div class="col-md-4">
					<?php echo group_date2('Date Generated', 'filter_date_generated', 'filter_date_generated', '', '') ?>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12">
	            	<div class="btn-group">
		    			<button type="button" id="btn-filter" class="btn btn-block btn-warning btn-primary-filter"><i class="fa fa-filter"></i> Filter</button>
		    		</div>
			    	<div class="btn-group">	            		
		    			<button type="button" id="btn-filter-clear" class="btn btn-block btn-default"><i class="fa fa-refresh"></i> Clear</button>
		    		</div>
				</div>					
			</div>
		</div>

		<div class="pull-right">
			<div class="btn-group">
	        	<button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-danger"><i class="fa fa-search-plus"></i> Advance Search</button>
	        </div>

			<div class="btn-group">
            	<a href='base_template_generator_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Activity</a>
            </div>
		</div>
	</div>
	<div class="box-body">
	
		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:20%; color: white; background-color: #73758799; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Title</th>
		              <th colspan="2" style = "text-align:center; vertical-align: middle; color:black; color: white; background-color: #73758799;">Activity Date</th> 
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:22%; color:black; color: white; background-color: #73758799;">Venue</th> 
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799;">Date Issued</th>

		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799;">Date Generated</th>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799;">OPR</th>  
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;"></th>
		            </tr>
		            <tr>
		              <th style="text-align: center; vertical-align: middle; width:10%; color: white; background-color: #73758799;">From</th>
		              <th style="text-align: center; vertical-align: middle; width:10%; color: white; background-color: #73758799;">To</th>
		            </tr>
			</thead>
			<tbody id="list_body">
				<?php foreach ($data as $key => $item): ?>
					<tr>
						<td><?php echo $item['activity_title']; ?></td>
						<td><?php echo $item['date_from']; ?></td>
						<td><?php echo $item['date_to']; ?></td>
						<td><?php echo $item['activity_venue']; ?></td>
						<td><?php echo $item['date_given']; ?></td>
						<td><?php echo $item['date_generated']; ?></td>
						<td><?php echo $item['opr']; ?></td>
						<td>
							<div class="btn-group">
				            	<a href='base_tempgen_view_participants.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>&certificate_type=<?php echo $item['certificate_type']; ?>&activity_title=<?php echo $item['activity_title']; ?>&date_from=<?php echo $item['date_from']; ?>&date_to=<?php echo $item['date_to']; ?>&activity_venue=<?php echo $item['activity_venue']; ?>&date_given=<?php echo $item['date_given']; ?>&date_generated=<?php echo $item['date_generated']; ?>&opr=<?php echo $item['opr']; ?>&place=<?php echo $item['place']; ?>' class="btn btn-block btn-success view_table" value="participants"><i class="fa fa-users"></i> View Participants</a>
				            </div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>	
</div>


<script type="text/javascript">

	function generateMainTable($data) {
	  
	    $.each($data, function(key, item){
	    	let tr = '<tr>';
	    	
	    	tr+= '<td>';
	    	tr+= item['activity_title'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['date_from'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['date_to'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['activity_venue'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['date_issued'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['date_generated'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= item['opr'];
	    	tr+= '</td>';

	    	tr+= '<td>';
	    	tr+= '<div class="btn-group">';
			tr+= '<a href="base_tempgen_view_participants.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>&certificate_type='+item['certificate_type']+'&activity_title='+item['activity_title']+'&date_from='+item['date_from']+'&date_to='+item['date_to']+'&activity_venue='+item['activity_venue']+'&date_given='+item['date_issued']+'&date_generated='+item['date_generated']+'&opr='+item['opr']+'&place='+item['place']+'" class="btn btn-block btn-success view_table" value="participants">';
			tr+= '<i class="fa fa-users"></i> View Participants';
			tr+= '</a>';
			tr+= '</div>';
	    	tr+= '</td>';

	    	tr+= '</tr>';

	        $('#list_body').append(tr);
	    	
	    });

	    return $data;
	  }

	$(document).ready(function(){
		$('#cform-filter_date_issued').datepicker({
	      autoclose: true
	    });

	    $('#cform-filter_date_generated').datepicker({
	      autoclose: true
	    })

	    $('#filter_activity_date').daterangepicker()

		var dt = $('#list_table').DataTable({
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : true,
	      'autoWidth'   : false,
	    });

	    $(document).on('click', '.view_table', function(){
	    	let val = $(this).val();
	    	if (val == 'participants') {
	    		$('#list_body').empty();	
	    		$('#list_table').dataTable().fnClearTable();
	    		$('#list_table').dataTable().fnDestroy();
	    		$('#list_table').addClass('hidden');

	    	} else {

	    	}	
	    });

	    $(document).on('click', '#btn-filter', function(){
			let path = "TemplateGenerator/entity/filter_main.php";
	    	let data = {
	    		title: $('#cform-filter_title').val(),
	    		venue: $('#cform-filter_venue').val(),
	    		opr: $('#cform-filter_opr').val(),
	    		activity_date: $('#filter_activity_date').val(),
	    		date_issued: $('#cform-filter_date_issued').val(),
	    		date_generated: $('#cform-filter_date_generated').val()
	    	};

	    	$.get(path, data, function(data, status){
        			details = JSON.parse(data);
	            	// $('#list_body').empty();
	            	$('#list_table').dataTable().fnClearTable();
	            	$('#list_table').dataTable().fnDestroy();
	            	generateMainTable(details);
	            	$('#list_table').DataTable({
				      'lengthChange': true,
				      'searching'   : true,
				      'ordering'    : false,
				      'info'        : true,
				      'autoWidth'   : false,
				    });
	            }
          	);
	    });

	    $(document).on('click', '#btn-filter-clear', function(){
	    	location.reload();
	    });

	    $(document).on('click', '#btn-advance_search', function(){
	    	let val = $(this).val();
	    	if (val == 'close') {
	    		$('.filter_buttons').removeClass('hidden');
	    		$(this).val('open');
	    		$(this).find('i').toggleClass('fa-search-plus fa-search-minus');
	    	} else {
	    		$('.filter_buttons').addClass('hidden');
	    		$(this).val('close');
	    		$(this).find('i').toggleClass('fa-search-minus fa-search-plus');
	    	}
	    });


	});
</script>
