<div class="box box-success box-solid dropbox">
	<div class="box-header">
	 	<h3 class="box-title"><i class="fa fa-check-square-o"></i> Done</h3>
		<div class="box-tools pull-right">

    		<!-- <div class="tools"> -->
			  	<!-- <span class="pull-right-container"> -->
		          <!-- <span class="label label-primary pull-right" style="font-size: 12pt;"><?php //echo count($tasks['Done']); ?></span> -->
		        <!-- </span> -->
			<!-- </div> -->
	  		<div class="btn-group">
            	<button type="button" class="btn btn-block btn-warning btn-xs clear_done_panel">Clear</button>  
        	</div>
	  	</div>
	</div>
	<div class="box-body workspace done_list"  style="overflow-y: scroll; height: 500px;">
		<?php foreach ($tasks['Done'] as $key => $task): ?>
			<div class="ui-draggable source ui-draggable-handle" value="done">
				
				<div class="col-md-12 source sidekick-done external-event" value="done" style="background-color: white; margin-bottom: 10px; min-height: 80px;">
					<div class="row">
						<?php echo input_hidden('task_id','task_id[]','task_id',$task['task_id']) ?>
						<?php echo input_hidden('title','title[]','title',$task['event_title']) ?>
						<?php echo input_hidden('description','description[]','description',$task['description']) ?>
						<?php echo input_hidden('venue','venue[]','venue',$task['venue']) ?>
						<?php echo input_hidden('profile','profile[]','profile',$task['profile']) ?>
						<?php echo input_hidden('date_start','date_start[]','date_start',$task['date_start']) ?>
						<?php echo input_hidden('date_end','date_end[]','date_end',$task['date_end']) ?>
						<?php echo input_hidden('host_name','host_name[]','host_name',$task['host']) ?>
						<?php echo input_hidden('task_code','task_code[]','task_code',$task['code']) ?>

						<div class="col-md-12">
							<div class="row">
								<div class="widget-user-image" style="width:58px; height:58px; float: right;">
									<?php if ($task['is_default']): ?>
										<span data-letters="<?php echo $task['host_initials']; ?>"></span>
									<?php else: ?>	
										<img class="img-circle custom-profile" src="<?php echo $task['profile'] ?>">
									<?php endif ?>
								</div>
						    	
				    			<b style="color: #027406;"><?php echo $task['code']; ?></b><br>
								<p><?php echo mb_strimwidth($task['task_title'], 0, 100, "..."); ?><br><br>
								
								<font style="font-size: 9.5pt;">
									<b>Timeline:</b> <?php echo $task['timeline']; ?><br>

									<?php if (!empty($task['task_counter'])): ?>
										<b style="color: #e41616; float: right;">
											<?php echo $task['task_counter']; ?>										
										</b>
									<?php endif ?>

									<?php if ($task['progress_datestart'] != ''): ?>
										<b>Date Start:</b> <?php echo $task['progress_datestart']; ?>
										<?php if ($task['progress_dateend'] != ''): ?>
											<br><b>Date End:</b> <?php echo $task['progress_dateend']; ?>
										<?php endif ?>
									<?php endif ?>

								</font>	
								</p>

							
							</div>
						</div>
					</div>
				</div>

			</div>
		<?php endforeach ?>





		
	</div>
</div>

<style type="text/css">
	.dropbox {
    	box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  	}
</style>