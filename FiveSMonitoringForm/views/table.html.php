<div class="box">
	<div class="box-header">
		<?php if (!$is_friday): ?>
			<div class="callout callout-info" style="color: black !important;">
	            <h4>Important Note:</h4>
	            <ul>
	                <li>
	                    Submission of 5S Monitoring Form is every <b>Friday afternoon</b> of the week.</p>
	                </li>
	            </ul>
	        </div>  
		<?php endif ?>
		<div class="box-tool">
			<?php if (!$has_data AND $is_friday): ?>
				<?php if (!$is_driver): ?>
					<div class="btn-group">
		            	<a href='base_fives_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create New</a>  
		            </div>
				<?php else: ?>
		            <div class="btn-group">
		            	<a href='base_fives_driver_add_form.html.php?&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Create New</a>  
		            </div>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
	<div class="box-body">
		<table id="list_table" class="table table-striped table-bordered table-responsive table-hover" role="grid">
			<thead>
				<tr>
	              <th rowspan="2" style = "width:12%!important; text-align:center; vertical-align: middle; width:20%; color:white; background-color: #737587; border-left: none; border-top-left-radius: 4px; -webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px;">Division</th>
	              <th rowspan="2" style = "width:20%!important; text-align:center; vertical-align: middle; color:white; background-color: #737587;">Name</th>
	              <th rowspan="2" style = "width:14%!important; text-align:center; vertical-align: middle; width:10%; color:white; background-color: #737587;">Position</th>
	              
	              <th colspan="4" style = "text-align:center; vertical-align: middle; width:22%; color:white; background-color: #737587;">Score</th>

	              <th rowspan="2" style = "width:10%!important; text-align:center; vertical-align: middle; width:22%; color:white; background-color: #737587;">Date Created</th>
	              <th rowspan="2" style = "width:10%!important; text-align:center; vertical-align: middle; width:22%; color:white; background-color: #737587;">Status</th>
	              <th rowspan="2" style = "width:10%!important; text-align:center; vertical-align: middle; width:22%; color:white; background-color: #737587;">Date Submitted</th>
	              <th rowspan="2" style = "text-align:center; vertical-align: middle; width:22%; color:white; background-color: #737587; border-right: none; border-top-right-radius: 4px; -webkit-border-top-right-radius: 4px; -moz-border-radius-topright: 4px;">Action</th>
	            </tr>
	            <tr>
	            	<th style="width:10%!important; text-align:center; vertical-align: middle; color:white; background-color: #737587;">S1<br>Sort - Seiri</th>
	            	<th style="width:15%!important; text-align:center; vertical-align: middle; color:white; background-color: #737587;">S2<br>Set in order - Seiton</th>
	            	<th style="width:11%!important; text-align:center; vertical-align: middle; color:white; background-color: #737587;">S3<br>Shining - Seiso</th>
	            	<th style="color:white; text-align:center; vertical-align: middle; background-color: #737587;">Total</th>
	            </tr>
			</thead>
			<tbody id="list_body">

				<?php foreach ($fetchAll as $key => $data): ?>
					<tr>
						<td style="text-align: center;"><?php echo $data['division']; ?></td>
						<td><?php echo $data['emp_name']; ?></td>
						<td style="text-align: center;"><?php echo $data['position']; ?></td>
						<td style="text-align: center;">
							<?php if (!$data['is_driver']): ?>
								<?php echo $data['seiri']; ?></td>
							<?php endif ?>
						<td style="text-align: center;"><?php echo $data['seiton']; ?></td>
						<td style="text-align: center;"><?php echo $data['seiso']; ?></td>
						<td style="text-align: center;"><?php echo $data['total']; ?></td>
						<td style="text-align: center;"><?php echo $data['date_created']; ?></td>
						<td style="text-align: center;"><?php echo $data['status']; ?></td>
						<td style="text-align: center;"><?php echo $data['date_submitted']; ?></td>
						<td>
							<?php if ($data['has_access']): ?>
								<div class="btn-group">
								<?php if (!$data['is_driver']): ?>
		                				<a href="base_fives_edit_form.html.php?username=<?php echo $_SESSION["username"]; ?>&division=<?php echo $_SESSION["division"]; ?>&parent=<?php echo $data['id'] ?>" class="btn btn-block btn-primary btn-modal-add_task">
											<i class="fa fa-edit"></i> Edit
										</a>
		                			</div>
								<?php else: ?>
										<a href="base_fives_driver_edit_form.html.php?username=<?php echo $_SESSION["username"]; ?>&division=<?php echo $_SESSION["division"]; ?>&parent=<?php echo $data['id'] ?>" class="btn btn-block btn-primary btn-modal-add_task">
											<i class="fa fa-edit"></i> Edit
										</a>
								<?php endif ?>
		                		</div>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>	
</div>

<style type="text/css">
	.callout.callout-info {
    border-color: #0097bc!important;
    background-color: white!important;
}
	.callout {
	color: black !important;
    border-radius: 3px!important;
    margin: 0 0 20px 0!important;
    padding: 15px 30px 15px 15px!important;
    border-left: 5px solid #eee!important;
    border-right: 1px solid #0097bc!important;
    border-top: 1px solid #0097bc!important;
    border-bottom: 1px solid #0097bc!important;
}
</style>

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
