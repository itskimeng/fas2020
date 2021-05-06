<?php
	require_once 'TemplateGenerator/controller/TemplateGeneratorController.php';	
?>

<div class="box box-primary dropbox">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="margin" style="position:absolute; margin:0px">
			<div class="btn-group">
            	<a href='base_template_generator_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Activity</a>
            </div>
            <!-- <div class="btn-group">
            	<button href='#' id="view_participants" class="btn btn-block btn-primary view_table" value="participants"><i class="fa fa-plus"></i> View Participants</button>
            </div>
            <div class="btn-group">
            	<button href='#' id="view_main_table" class="btn btn-block btn-primary view_table" value="main_table"><i class="fa fa-plus"></i> Main Table</button>   
            </div> -->
        </div>

		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
		              <!-- <th rowspan="2" style = "text-align:center; vertical-align: middle; width:20%; color: white; background-color: #73758799; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Type</th> -->
		              <!-- <th rowspan="2" style = "text-align:center; vertical-align: middle; color:black; color: white; background-color: #73758799;">Code</th> -->
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:20%; color: white; background-color: #73758799; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Title</th>
		              <!-- <th rowspan="2" style = "text-align:center; vertical-align: middle; width:22%; color:black; color: white; background-color: #73758799;">Attendee</th> -->
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
						<!-- <td><?php //echo $item['certificate_type']; ?></td> -->
						<!-- <td></td> -->
						<td><?php echo $item['activity_title']; ?></td>
						<!-- <td><?php //echo $item['attendee']; ?></td> -->
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
	$(document).ready(function(){
		let dt = $('#list_table').DataTable({
	      // 'paging'      : true,  
	      'lengthChange': false,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : false,
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
	});
</script>
