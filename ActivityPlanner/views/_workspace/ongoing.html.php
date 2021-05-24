<div class="box box-warning box-solid dropbox">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-refresh"></i> Ongoing</h3>
	  <div class="tools pull-right">
	  	<span class="pull-right-container">
          <span class="label label-primary pull-right" style="font-size: 12pt;"><?php echo !empty($tasks['Ongoing']) ? count($tasks['Ongoing']) : 0; ?></span>
        </span>
	  </div>
	</div>
	<div class="box-body workspace destination ongoing_list" value="ongoing" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
	  	<?php foreach ($tasks['Ongoing'] as $key => $task): ?>
			<div class="ui-draggable ui-draggable-handle" value="ongoing">
				
				<div class="col-md-12 source sidekick-ongoing external-event" value="ongoing" style="background-color: white; margin-bottom: 10px; min-height: 80px;">
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
						<?php echo input_hidden('external_link','external_link[]','external_link',$task['elink']) ?>


						<div class="col-md-12">
							<div class="row">
								<div class="widget-user-image" style="margin-left: 1%; width:58px; height:58px; float: right;">
									<?php if ($task['is_default']): ?>
										<span data-letters="<?php echo $task['host_initials']; ?>"></span>
									<?php else: ?>	
										<img class="img-circle custom-profile" src="<?php echo $task['profile'] ?>">
									<?php endif ?>
								</div>

								<b style="color: #e41616; float: right;">
									<?php echo $task['task_counter']; ?>
								</b>
						    	
				    			<b style="color: #ea9000;"><i class="fa fa-arrow-circle-up"></i> <?php echo $task['code']; ?></b><br>
								<p><?php echo mb_strimwidth($task['task_title'], 0, 104, "..."); ?><br>
								
								<?php if (strlen($task['task_title']) < 100): ?>
									<br>
								<?php endif ?>

								<table>
									<tbody style="font-size: 9.5pt;">
										<tr>
											<td style="width: 47.5%;"><b>TIMELINE FROM</b></td>
											<td><b>:</b> <?php echo $task['timeline_start']; ?></td>
										</tr>
										<tr>
											<td><b>TIMELINE TO</b></td>
											<td><b>:</b> <?php echo $task['timeline_end']; ?></td>
										</tr>

										<?php if ($task['progress_datestart'] != ''): ?>
											<tr>
												<td><b>DATE START</b></td>
												<td><b>:</b> <?php echo $task['progress_datestart']; ?></td>
											</tr>
										<?php endif ?>
										
										<?php if ($task['progress_dateend'] != ''): ?>
											<tr>
												<td><b>DATE END</b></td>
												<td><b>:</b> <?php echo $task['progress_dateend']; ?></td>
											</tr>
										<?php endif ?>
										
									</tbody>
								</table>
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