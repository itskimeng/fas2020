<div class="box box-success box-solid">
	<div class="box-header">
	 	<h3 class="box-title">Done</h3>
		<div class="box-tools pull-right">
    		<!-- <button type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i>Clear</button> -->
	  		<div class="btn-group">
            	<button type="button" class="btn btn-block btn-warning btn-xs clear_done_panel">Clear</button>  
        	</div>
	  	</div>
	</div>
	<div class="box-body workspace done_list"  style="overflow-y: scroll; height: 500px;">
		<?php foreach ($tasks['Done'] as $key => $task): ?>
			<div class="external-event ui-draggable done_panel ui-draggable-handle">
				<div class="col-md-8" style="font-size:11px;">
					<?php echo input_hidden('task_id','task_id[]','task_id',$task['task_id']) ?>
					<?php echo input_hidden('title','title[]','title',$task['event_title']) ?>
					<?php echo input_hidden('description','description[]','description',$task['description']) ?>
					<?php echo input_hidden('venue','venue[]','venue',$task['venue']) ?>
					<?php echo input_hidden('profile','profile[]','profile',$task['profile']) ?>
					<?php echo input_hidden('date_start','date_start[]','date_start',$task['date_start']) ?>
					<?php echo input_hidden('date_end','date_end[]','date_end',$task['date_end']) ?>
					<?php echo input_hidden('host_name','host_name[]','host_name',$task['host']) ?>
					<?php echo input_hidden('task_code','task_code[]','task_code',$task['code']) ?>

					<?php echo $task['code']; ?>
				</div>
				<div class="col-md-3 pull-right">
					<img src="<?php echo $task['profile'] ?>" style="width:30px; height:30px; margin-left:7px;">	
				</div>
				<div class="col-md-12" style="height:60px">
					<p><?php echo $task['task_title']; ?></p>
				</div>
				<div class="col-md-12" style="font-size:10px;">
					Timeline: <?php echo $task['timeline']; ?>
				</div>
				<?php if ($task['progress_datestart'] != ''): ?>
					<div class="col-md-9" style="font-size:10px;">
						Date Start: <?php echo $task['progress_datestart']; ?>
						
						<?php if ($task['progress_dateend'] != ''): ?>
							<br>Date End: <?php echo $task['progress_dateend']; ?>
						<?php endif ?>
					</div>
				<?php endif ?>
				<?php if (!empty($task['task_counter'])): ?>
					<div class="col-md-3 pull-right" style="text-align:right; color:red; font-size:10px;">
						<?php echo $task['task_counter']; ?>
					</div>
				<?php endif ?>
			</div>
		<?php endforeach ?>
	</div>
</div>