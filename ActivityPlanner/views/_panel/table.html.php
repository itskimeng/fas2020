<div class="box">
	<div class="box-body">

		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
                  <th rowspan="2" style = "text-align:center; vertical-align: middle; width:5%;">
                  	<label>Program</label>
	                	<select required class="form-control select2 program_code" name="program_code" id="program_code">
                            <?php echo group_options($cddprograms, 'ALL'); ?>
	               		</select>
           			</th>
                  <th rowspan="2" style = "text-align:center; vertical-align: middle; width:20%;">Title</th>
                  <th rowspan="2" style = "text-align:center; vertical-align: middle;">OPR</th>
                  <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%;">Status</th>
                  <th colspan="2" style = "text-align:center; vertical-align: middle; width:22%;">Activity</th>
                  <!-- <th rowspan="2" style = "text-align:center; vertical-align: middle; width:6%;">No. of Participants</th> -->
                  <!-- <th rowspan="2" style = "text-align:center; vertical-align: middle; width:8%;">Priority</th> -->
                  <th rowspan="2" style = "text-align:center; vertical-align: middle; width:21%"></th>         
                </tr>
                <tr>
                  <th style="text-align: center; vertical-align: middle;">Start</th>
                  <th style="text-align: center; vertical-align: middle;">End</th>
                </tr>
			</thead>
			<tbody id="list_body">
				<!-- fetch all events of CDD from db -->
                <?php foreach ($lgcdd_events as $event): ?>
                <tr>
                	<td>
						<?php echo $event['act_code']; ?>
                	</td>
                	<td>
                		<!-- hidden inputs -->
						<?php echo input_hidden('emp_id','emp_id[]','emp_id',$event['emp_id']); ?>
						<?php echo input_hidden('act_id','act_id[]','act_id',$event['id']); ?>
						<?php echo input_hidden('act_code','act_code[]','act_code',$event['act_code']); ?>
						<?php echo input_hidden('act_title','act_title[]','act_title',$event['title']); ?>
						<?php echo input_hidden('description','description[]','description',$event['description']); ?>
						<?php echo input_hidden('act_priority','act_priority[]','act_priority',$event['priority']); ?>
						<?php echo input_hidden_array('act_collaborators','act_collaborators[]','act_collaborators',$event['collaborators']); ?>
						<?php echo input_hidden('host','host[]','host',$event['host']); ?>
						<?php echo input_hidden('profile','profile[]','profile',$event['profile']); ?>
						<?php echo input_hidden('act_status','status[]','act_status',$event['status']); ?>
						<?php echo input_hidden('start_date','start_date[]','date_start',$event['date_start_f']); ?>
						<?php echo input_hidden('end_date','end_date[]','date_end',$event['date_end_f']); ?>
						<?php echo input_hidden('is_new','is_new[]','is_new',$event['is_new']); ?>
						<?php echo input_hidden('target_participants','target_participants[]','target_participants',$event['target_participants']); ?>
						<!-- end -->

						<?php echo $event['title']; ?>
                	</td>
                	<td>
                        <?php echo $event['host']; ?>
                	</td>
                	<td style="background-color:<?php echo $event['color'];?>!important; text-align:center;">
                      <?php echo $event['status']; ?>
                    </td>
                	<td style="text-align:center;">
                      <?php echo $event['date_start']; ?> 
                      <?php if (!$event['is_new']): ?>
                        <?php echo $event['time_start']; ?>
                      <?php else: ?>  
                      <?php endif ?>
                    </td>
                	<td style="text-align:center;">
                		<?php echo $event['date_end']; ?>
						<?php if (!$event['is_new']): ?>
							<?php echo $event['time_end']; ?>
						<?php else: ?>
						<?php endif ?>
                	</td>
                	<!-- <td style="text-align:center;">
                      <?php //echo $event['target_participants']; ?>
                    </td> -->
                	<td>
						<a class="btn btn-app btn-app-edit edit_activity" data-toggle="modal" data-target="#edit_modal">
							<i class="fa fa-edit"></i>
						</a>
						<a class="btn btn-app btn-app-delete delete_activity" data-toggle="modal" data-target="#delete_modal">
							<i class="fa fa-trash-o"></i>
						</a>
						<a href='base_planner_subtasks.html.php?event_planner_id=<?php echo $event["id"];?>&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>' class="btn btn-app btn-app-subtask add_subtask">
							<i class="fa fa-tasks"></i>
						</a>
                	</td>

                </tr>
                <?php endforeach ?>
                <!-- end fetch events -->
			</tbody>
		</table>	
	</div>	
</div>

<style type="text/css">
	
</style>

<script type="text/javascript">
	function generateTable($data) {
		let row ='';
		$.each($data, function(key, item){
			let collaborators = JSON.parse(item['collaborators']);
			row += '<tr>';
			row += '<td>';
			row += item['act_code'];
            row += '</td>';

            row += '<td>';
            row += '<input type="hidden" id="cform-emp_id" name="emp_id[]" class="emp_id" value="'+item['emp_id']+'">';
            row += '<input type="hidden" id="cform-act_id" name="act_id[]" class="act_id" value="'+item['id']+'">';
            row += '<input type="hidden" id="cform-act_code" name="act_code[]" class="act_code" value="'+item['act_code']+'">';
            row += '<input type="hidden" id="cform-act_title" name="act_title[]" class="act_title" value="'+item['title']+'">';
            row += '<input type="hidden" id="cform-description" name="description[]" class="description" value="'+item['description']+'">';
            row += '<input type="hidden" id="cform-act_priority" name="act_priority[]" class="act_priority" value="'+item['priority']+'">';
            row += '<input type="hidden" id="cform-act_collaborators" name="act_collaborators[]" class="act_collaborators" value="['+collaborators+']">';
            row += '<input type="hidden" id="cform-host" name="host[]" class="host" value="'+item['host']+'">';
            row += '<input type="hidden" id="cform-profile" name="profile[]" class="profile" value="'+item['profile']+'">';
            row += '<input type="hidden" id="cform-act_status" name="act_status[]" class="act_status" value="'+item['status']+'">';
            row += '<input type="hidden" id="cform-start_date" name="start_date[]" class="start_date" value="'+item['date_start_f']+'">';
            row += '<input type="hidden" id="cform-end_date" name="end_date[]" class="end_date" value="'+item['date_end_f']+'">';
            row += '<input type="hidden" id="cform-is_new" name="is_new[]" class="is_new" value="'+item['is_new']+'">';
            row += '<input type="hidden" id="cform-target_participants" name="target_participants[]" class="target_participants" value="'+item['target_participants']+'">';
						
           	row += item['title'];
            row += '</td>';

            row += '<td>';
            row += item['host'];
            row += '</td>';

            row += '<td style="background-color:<?php echo $event['color'];?>!important; text-align:center;">';
            row += item['status'];
            row += '</td>';

            row += '<td style="text-align:center;">';
            row += item['date_start']; 
            	if (!item['is_new']) {
                	row += item['time_start'];
                }   
            row += '</td>';

            row += '<td style="text-align:center;">';
            row += item['date_end']; 
            	if (!item['is_new']) {
                	row += item['time_end'];
                }   
            row += '</td>';

            row += '<td>';
			row += '<a class="btn btn-app btn-app-edit edit_activity" data-toggle="modal" data-target="#edit_modal">';
			row += '<i class="fa fa-edit"></i>';
			row += '</a>';
			row += '<a class="btn btn-app btn-app-delete delete_activity" data-toggle="modal" data-target="#delete_modal">';
			row += '<i class="fa fa-trash-o"></i>';
			row += '</a>';

			row += '<a href="base_planner_subtasks.html.php?event_planner_id='+item["id"]+'&username=<?php echo $username; ?>&division=<?php echo $_GET["division"]; ?>" class="btn btn-app btn-app-subtask add_subtask">';
			row += '<i class="fa fa-tasks"></i>';
			row += '</a>';
            row += '</td>';
		});

		return row;
	}

	$(document).ready(function(){
		let dt = $('#list_table').DataTable( {
	      // 'paging'      : true,  
	      'lengthChange': false,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : false,
	      'autoWidth'   : false,
	    } );

	    $(document).on('change', '.program_code', function(){
	    	let program = $(this).val();	    	
	    	
	    	$('#list_body').empty();

	    	$.ajax({
		        url:"ActivityPlanner/entity/filter_events.php",
		        type:"GET",
		        data:{program: program},
		        success:function(data){
		    		$('#list_table').DataTable().clear().destroy();

		        	let row = generateTable(JSON.parse(data));
		        	$('#list_body').append(row);

		        	$('#list_table').DataTable( {
				      // 'paging'      : true,  
				      'lengthChange': false,
				      'searching'   : true,
				      'ordering'    : false,
				      'info'        : false,
				      'autoWidth'   : false,
				    } );
		        }
		      });
	    });
	});
</script>