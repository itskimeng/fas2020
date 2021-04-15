<?php
	require_once 'TemplateGenerator/controller/TemplateGeneratorController.php';	
?>

<div class="box">
	<div class="box-header">
		<!-- <div class="box-tool"> -->
			<!-- <div class="margin" style="position:absolute; margin:0px">
			<div class="btn-group">
            	<a href='base_tempgen_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create New</a>  
            </div>
        	</div> -->
		<!-- </div> -->
	</div>
	<div class="box-body">
		<div class="margin" style="position:absolute; margin:0px">
			<div class="btn-group">
            	<a href='base_template_generator_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create New</a>  
            </div>
        </div>

		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:20%; color: white; background-color: #73758799; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Type</th>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; color:black; color: white; background-color: #73758799;">Code</th>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799;">Title</th>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:22%; color:black; color: white; background-color: #73758799;">Attendee</th>
		              <th colspan="2" style = "text-align:center; vertical-align: middle; color:black; color: white; background-color: #73758799;">Activity Date</th> 
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:22%; color:black; color: white; background-color: #73758799;">Venue</th> 
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799;">Date Given</th>
		              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:10%; color:black; color: white; background-color: #73758799; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Date Generated</th>  

		            </tr>
		            <tr>
		              <th style="text-align: center; vertical-align: middle; width:10%; color: white; background-color: #73758799;">From</th>
		              <th style="text-align: center; vertical-align: middle; width:10%; color: white; background-color: #73758799;">To</th>
		            </tr>
			</thead>
			<tbody id="list_body">
				<?php foreach ($data as $key => $item): ?>
					<tr>
						<td><?php echo $item['certificate_type']; ?></td>
						<td></td>
						<td><?php echo $item['activity_title']; ?></td>
						<td><?php echo $item['attendee']; ?></td>
						<td><?php echo $item['date_from']; ?></td>
						<td><?php echo $item['date_to']; ?></td>
						<td><?php echo $item['activity_venue']; ?></td>
						<td><?php echo $item['date_given']; ?></td>
						<td><?php echo $item['date_generated']; ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		let dt = $('#list_table').DataTable( {
	      // 'paging'      : true,  
	      'lengthChange': false,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : false,
	      'autoWidth'   : false,
	    } );
	});
</script>
