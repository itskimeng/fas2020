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

            if (item['has_access']) {
	            row += '<div class="btn-group">';
				row += '<a class="btn btn-app btn-app-edit edit_activity" data-toggle="modal" data-target="#edit_modal">';
				row += '<i class="fa fa-edit"></i>';
				row += '</a>';
				row += '</div>';
	            row += '<div class="btn-group">';
				row += '<a class="btn btn-app btn-app-delete delete_activity" data-toggle="modal" data-target="#delete_modal">';
				row += '<i class="fa fa-trash-o"></i>';
				row += '</a>';
				row += '</div>';
            }

            row += '<div class="btn-group">';
			row += '<a href="base_planner_subtasks.html.php?event_planner_id='+item["id"]+'&username=<?php echo $username; ?>&division=<?php echo $_GET["division"]; ?>" class="btn btn-app btn-app-subtask add_subtask">';
			row += '<i class="fa fa-tasks"></i>';
			row += '</a>';
			row += '</div>';

            row += '</td>';
		});

		return row;
	}

	$(document).ready(function(){
		$(document).on('click', '.mail_notif', function(){
			let url = $(this).data('url');	
			let ntfid = {id: $(this).data('ntfid')};	
      		let path = "ActivityPlanner/entity/mark_as_read.php";
			
			$.get(path, ntfid, function(data, status){
	          if (status == 'success') {
	          	window.location.replace(url);	  
	          }
	        });

		});
	});
</script>