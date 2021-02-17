<div class="box box-success box-solid">
	<div class="box-header">
	  <h3 class="box-title">Done</h3>
	</div>
	<div class="box-body workspace done_list">
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
					<p><?php echo mb_strimwidth($task['task_title'], 0, 50, "..."); ?></p>
				</div>
				<div class="col-md-12" style="font-size:10px;">
					Timeline: <?php echo $task['timeline']; ?>
				</div>
				<div class="col-md-9" style="font-size:10px;">
					Date: <?php echo $task['timeline']; ?>
				</div>
				<div class="col-md-3 pull-right" style="text-align:right; color:red; font-size:10px;">
				<?php if (!empty($task['task_counter'])): ?>
					<?php echo $task['task_counter']; ?>
				<?php endif ?>
			</div>
			</div>	
		<?php endforeach ?>
	</div>
</div>