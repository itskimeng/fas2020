<div class="box box-info box-solid dropbox">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> For Checking</h3>
	  <div class="tools pull-right">
	  	<span class="pull-right-container">
          <span class="label label-primary pull-right" style="font-size: 12pt;"><?php echo !empty($tasks['For Checking']) ? count($tasks['For Checking']) : 0; ?></span>
        </span>
	  </div>
	</div>
	<div class="box-body workspace destination forchecking_list" value="for checking" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
		<?php foreach ($tasks['For Checking'] as $key => $task): ?>
			<div class="ui-draggable ui-draggable-handle" value="for checking">
				
				<div class="source sidekick-for_checking external-event well profile_view" value="for checking" style="background-color: white; margin-bottom: 10px; min-height: 80px;">

					<?php echo input_hidden('task_id','task_id[]','task_id',$task['task_id']) ?>
					<?php echo input_hidden('title','title[]','title',$task['event_title']) ?>
					<?php echo input_hidden('description','description[]','description',$task['description']) ?>
					<?php echo input_hidden('venue','venue[]','venue',$task['venue']) ?>
					<?php echo input_hidden('profile','profile[]','profile',$task['profile']) ?>
					<?php echo input_hidden('date_start','date_start[]','date_start',$task['date_start']) ?>
					<?php echo input_hidden('date_end','date_end[]','date_end',$task['date_end']) ?>
					<?php echo input_hidden('host_name','host_name[]','host_name',$task['host_name']) ?>
					<?php echo input_hidden('task_code','task_code[]','task_code',$task['code']) ?>
					<?php echo input_hidden('external_link','external_link[]','external_link',$task['elink']) ?>

			        <div class="col-md-12">
						<div class="row" style="padding:1%;">
							<div class="widget-user-image" style="width:58px; height:58px; float: right;">
								<?php if ($task['is_default']): ?>
									<span data-letters="<?php echo $task['host_initials']; ?>"></span>
								<?php else: ?>	
									<img class="img-circle custom-profile" src="<?php echo $task['profile'] ?>">
								<?php endif ?>
							</div>

							<b style="color: #e41616; float: right; font-size: 8pt;">
								<?php echo $task['task_counter']; ?>
							</b>
					    	
			    			<b style="color: #0a80b9;">
			    				<?php if ($task['multiple_collab']): ?>
			    					<i class="fa fa-users"></i> 
			    				<?php else: ?>
			    					<i class="fa fa-arrow-circle-up"></i> 
			    				<?php endif ?> 
			    				<?php echo $task['code']; ?>
			    			</b><br>

			    			<p><?php echo mb_strimwidth($task['task_title'], 0, 104, "..."); ?><br>
						</div>	
					</div>
					<div class="col-md-12 bottom text-center">
                    	<div class="row">
                    		<div class="col-md-12 emphasis">
	                            
	                        </div>
	                        <div class="col-md-12 emphasis">
	                            <button type="button" class="btn btn-success btn-xs" data-toggle="collapse" data-target="#forchecking_timeline_<?php echo $key; ?>" title="View Timeline"> 
	                                <i class="fa fa-calendar"></i> Timeline  
	                            </button>
	                            <?php if ($task['progress_datestart'] != ''): ?>
	                            	<button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#forchecking_progress_<?php echo $key; ?>"  title="View Progress"> 
	                                	<i class="fa fa-hourglass-1"></i> Progress 
	                            	</button>
	                            <?php endif ?>
	                            
	                            <?php if ($task['multiple_collab']): ?>
	                            	<button type="button" class="btn btn-warning btn-xs" data-toggle="collapse" data-target="#forchecking_progress" title="View Collaborators"> 
	                                	<i class="fa fa-users"></i> Collaborators 
	                            	</button>
	                            <?php endif ?>
	                        </div>
                    	</div>
                    	
                    	<div class="row" style="padding-top: 2%;">
                    		<div class="col-md-12 emphasis">
	                    		<div id="forchecking_timeline_<?php echo $key; ?>" class="collapse">
									<table>
										<tbody style="font-size: 9.5pt;">
											<tr style="border-top: .5px dashed;">
												<td style="width: 47.5%;"><b>TIMELINE FROM</b></td>
												<td style="text-align: right;"><b>:</b> <?php echo $task['timeline_start']; ?></td>
											</tr>
											<tr>
												<td><b>TIMELINE TO</b></td>
												<td><b>:</b> <?php echo $task['timeline_end']; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-12 emphasis">
	                    		<div id="forchecking_progress_<?php echo $key; ?>" class="collapse">
									<table>
										<tbody style="font-size: 9.5pt;">
											
											<?php if ($task['progress_datestart'] != ''): ?>
												<tr style="border-top: .5px dashed;">
													<td style="width: 47.5%;"><b>DATE START</b></td>
													<td style="text-align: right;"><b>:</b> <?php echo $task['progress_datestart']; ?></td>
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
								</div>
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