<div class="box box-primary dropbox">
	<div class="box-header">
		Filter		
	</div>
	<div class="box-body">
		<!-- <div class="row"> -->
			<!-- <div class="col-md-12"> -->
			<div class="row">
				<!-- title -->
				<div class="col-md-4">
		      <?php echo group_text('Activity','activity','', '',1, false,'title'); ?>
				</div>

				<div class="col-md-4">
		      <?php echo group_text('Task','task','', '',1, false,'title'); ?>
				</div>

				<!-- title -->
				<div class="col-md-4">
		      <!-- participants -->
          <?php echo group_selectmulti('Collaborators', 'collaborators', 'collaborators', $emp_opt); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="btn-group">
	    			<button type="button" id="btn-filter" class="btn btn-block btn-primary btn-primary-filter"><i class="fa fa-filter"></i> Filter</button>
	    		</div>
          <div class="btn-group">
	    			<button type="button" id="btn-generator" class="btn btn-block btn-success btn-primary-filter"><i class="fa fa-print"></i> Generate</button>
	    		</div>
		    	<div class="btn-group">	            		
	    			<button type="button" id="btn-filter-clear" class="btn btn-block btn-default"><i class="fa fa-refresh"></i> Clear</button>
	    		</div>			
				</div>
			</div>
		<!-- </div> -->
		
	</div>	
</div>

<div class="box box-primary dropbox">
	<div class="box-header">
		List		
	</div>
	<div class="box-body">

		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
        	<th class="text-center" width="20%">Activity</th>
        	<th class="text-center" width="20%">Task</th>       
        	<th class="text-center" width="20%">Collaborator</th>  
        	<th class="text-center" width="12%">Timeline</th>
        	<th class="text-center" width="12%">Progress Date</th>          
        	<th class="text-center">Status</th>       
        </tr>
			</thead>
			<tbody id="list_body">
				<?php foreach ($data as $key => $dd): ?>
					<tr>
						<td><?php echo $dd['activity']; ?></td>
						<td><?php echo $dd['task']; ?></td>
						<td><?php echo $dd['collaborators']; ?></td>
						<td>
							<table class="table-bordered">
                <tbody>
                  <tr>
                    <td class="text-center">
                      <b>From</b>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 13.5px;"><?php echo $dd['date_from']; ?></td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <b>To</b>
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size: 13.5px;"><?php echo $dd['date_to']; ?></td>
                  </tr>
                </tbody>
              </table>
						</td>
						<td>
							<?php if (!empty($dd['date_start'])): ?>
								<table class="table-bordered">
	                <tbody>
	                  <tr>
	                    <td class="text-center">
	                      <b>Start</b>
	                    </td>
	                  </tr>
	                  <tr>
	                    <td style="font-size: 13.5px;"><?php echo $dd['date_start']; ?></td>
	                  </tr>
	                  <tr>
	                    <td class="text-center">
	                      <b>End</b>
	                    </td>
	                  </tr>
	                  <tr>
	                    <td style="font-size: 13.5px;"><?php echo $dd['date_end']; ?></td>
	                  </tr>
	                </tbody>
	              </table>
	            <?php else: ?>
	            	Not yet started
							<?php endif ?>
						</td>
						<td><?php echo $dd['status']; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>	
	</div>	
</div>

<style type="text/css">
	#list_table {
	    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
	  }
</style>

<script type="text/javascript">
	function generateTable($data) {
		let tr='';
		$.each($data, function(key, item){
			// let collaborators = JSON.parse(item['collaborators']);
					tr+= '<tr>';
					tr+= '<td>';
					tr+= item['activity'];
					tr+= '</td>';

					tr+= '<td>';
					tr+= item['task'];
					tr+= '</td>';
					
					tr+= '<td>';
					tr+= item['collaborators'];
					tr+= '</td>';
					
					tr+= '<td class="text-center">';
						tr+= '<table class="table-bordered">';
						tr+= '<tr>';
						tr+= '<td class="text-center">';
						tr+= '<b>From</b>';
						tr+= '</td>';
						tr+= '</tr>';
						tr+= '<tr>';
						tr+= '<td>';
						tr+= item['date_from'];
						tr+= '</td>';
						tr+= '</tr>';

						tr+= '<tr>';
						tr+= '<td class="text-center">';
						tr+= '<b>To</b>';
						tr+= '</td>';
						tr+= '</tr>';

						tr+= '<tr>';
						tr+= '<td>';
						tr+= item['date_to'];
						tr+= '</td>';
						tr+= '</tr>';
						tr+= '</table>';
					tr+= '</td>';

					tr+= '<td class="text-center">';
						if (item['date_start'] != '') {
							tr+= '<table class="table-bordered">';
							tr+= '<tr>';
							tr+= '<td class="text-center">';
							tr+= '<b>Start</b>';
							tr+= '</td>';
							tr+= '</tr>';

							tr+= '<tr>';
							tr+= '<td>';
							tr+= item['date_start'];
							tr+= '</td>';
							tr+= '</tr>';

							tr+= '<tr>';
							tr+= '<td class="text-center">';
							tr+= '<b>End</b>';
							tr+= '</td>';
							tr+= '<td>';
							tr+= item['date_end'];
							tr+= '</td>';
							tr+= '</tr>';
							tr+= '</table>';
						} else {
							tr+= 'N/A';
						}
					tr+= '</td>';

					tr+= '<td>';
					tr+= item['status'];
					tr+= '</td>';
					
					tr+= '</tr>';
		});

	 	$('#list_body').append(tr);

		return 0;
	}

	$(document).ready(function(){
		$('#cform-collaborators').select2();
		var dt = $('#list_table').DataTable( {
	      // 'paging'      : true,  
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : true,
	      'autoWidth'   : false,
	    } );

	  $(document).on('click', '#btn-filter', function(){
	 		let path = 'ActivityPlanner/entity/report_filter.php';
	 		let activity = $('#cform-activity');
	 		let task = $('#cform-task');
	 		let collaborators = $('#cform-collaborators');

	 		let data = {
	 			activity: activity.val(), 
	 			task: task.val(), 
	 			collaborators: collaborators.val()
	 		};

	 		$.get(path, data, function(dd, key){
	 			let data = $.parseJSON(JSON.parse(dd));
	 		
	 			// $('#list_body').empty();
	 			$('#list_table').dataTable().fnClearTable();
	      $('#list_table').dataTable().fnDestroy();
	 			generateTable(data);

	 			$('#list_table').DataTable( {
		      // 'paging'      : true,  
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : false,
		      'info'        : true,
		      'autoWidth'   : false,
		    } );
	 		});
	  });

	  $(document).on('click', '#btn-filter-clear', function(){
	  	location.reload();
	  });

	  $(document).on('click', '#btn-generator', function(){
	 		let path = 'ActivityPlanner/entity/report_generator.php';
	 		let activity = $('#cform-activity');
	 		let task = $('#cform-task');
	 		let collaborators = $('#cform-collaborators');

	 		let data = {
	 			activity: activity.val(), 
	 			task: task.val(), 
	 			collaborators: collaborators.val()
	 		};

	 		$.get(path, data, function(dd, key){
	 			 // window.open(dd, '_blank');
	 			// window.location.href
	 		});
	  })


	});
</script>