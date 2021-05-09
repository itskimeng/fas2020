<div class="box box-info box-solid dropbox">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> For Checking</h3>
	</div>
	<div class="box-body workspace destination forchecking_list" value="for checking" style="overflow-y: scroll; height: 500px;">
		<?php foreach ($tasks['For Checking'] as $key => $task): ?>
			<div class="external-event ui-draggable source ui-draggable-handle ongoing">
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

<style type="text/css">
	.dropbox {
    	box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  	}
</style>