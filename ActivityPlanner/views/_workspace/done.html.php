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
	<div class="box-body workspace done_list"  style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
		<?php foreach ($tasks['Done'] as $key => $task): ?>
			<div class="ui-draggable ui-draggable-handle" value="done">
				
				<div class="source_done sidekick-done external-event well profile_view" value="done" style="background-color: white; margin-bottom: 10px; min-height: 80px;">

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
						<div class="row" style="max-height: 85px;">
							<div class="advance-done_collab" style="padding:1%; min-height: 85px; max-height: 85px;">
								<!-- <div class="advance-collab"> -->
									<div class="widget-user-image" style="width:58px; height:58px; float: right; ">
										<?php if ($task['is_default']): ?>
											<span data-letters="<?php echo $task['host_initials']; ?>"></span>
										<?php else: ?>	
											<img class="img-circle custom-profile" src="<?php echo $task['profile'] ?>">
										<?php endif ?>
									</div>

									<b style="color: #e41616; float: right; font-size: 8pt;">
										<?php echo $task['task_counter']; ?>
									</b>
							    	
					    			<b style="color: #03ac00;">
					    				<?php if ($task['multiple_collab']): ?>
					    					<i class="fa fa-users"></i> 
					    				<?php else: ?>
					    					<i class="fa fa-arrow-circle-up"></i> 
					    				<?php endif ?>
					    				 
					    				<?php echo $task['code']; ?>
					    			</b><br>

					    			<p><?php echo mb_strimwidth($task['task_title'], 0, 99, "..."); ?><br>
								<!-- </div> -->
								
							</div>
							<div class="advance-done_collab advance-done_collab2" style="padding:1%; margin-top: -26%; display: none; visible:hidden; min-height: 85px; max-height: 85px;">
								<b>Other Collaborators:</b>
								<p style="font-size: 10pt;">
									<?php echo $task['collaborators_txt']; ?>
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-12 bottom text-center">
                    	<div class="row">
                    		<div class="col-md-12 emphasis">
	                            
	                        </div>
	                        <div class="col-md-12 emphasis">
	                            <button type="button" class="btn btn-success btn-xs" data-toggle="collapse" data-target="#done_timeline_<?php echo $key; ?>" title="View Timeline"> 
	                                <i class="fa fa-calendar"></i> Timeline  
	                            </button>
	                            <?php if ($task['progress_datestart'] != ''): ?>
	                            	<button type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#done_progress_<?php echo $key; ?>"  title="View Progress"> 
	                                	<i class="fa fa-hourglass-1"></i> Progress 
	                            	</button>
	                            <?php endif ?>

	                            <!-- <button type="button" class="btn btn-block btn-default show-advance-btn slide-left" title="Show Advance Buttons" data-value="hidden"><i class="fa fa-gear"></i> </button> -->
	                            
	                            <?php if ($task['multiple_collab']): ?>
	                            	<button type="button" id="show-collaborators" class="btn btn-warning btn-xs show-done_collaborators slide-left" title="View Collaborators" data-value="details"> 
	                                	<i class="fa fa-users"></i> Collaborators 
	                            	</button>
	                            <?php endif ?>
	                        </div>
                    	</div>
                    	
                    	<div class="row" style="padding-top: 2%;">
                    		<div class="col-md-12 emphasis">
	                    		<div id="done_timeline_<?php echo $key; ?>" class="collapse">
									<table>
										<tbody style="font-size: 9.5pt;">
											<tr style="border-top: .5px dashed;">
												<td style="width: 47.5%;"><b>Timeline From</b></td>
												<td style="text-align: right;"><b>:</b> <?php echo $task['timeline_start']; ?></td>
											</tr>
											<tr>
												<td><b>Timeline To</b></td>
												<td><b>:</b> <?php echo $task['timeline_end']; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
                    	</div>

                    	<div class="row">
                    		<div class="col-md-12 emphasis">
	                    		<div id="done_progress_<?php echo $key; ?>" class="collapse">
									<table>
										<tbody style="font-size: 9.5pt;">
											
											<?php if ($task['progress_datestart'] != ''): ?>
												<tr style="border-top: .5px dashed;">
													<td style="width: 47.5%;"><b>Date Start</b></td>
													<td style="text-align: right;"><b>:</b> <?php echo $task['progress_datestart']; ?></td>
												</tr>
											<?php endif ?>
											
											<?php if ($task['progress_dateend'] != ''): ?>
												<tr>
													<td><b>Date End</b></td>
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

  	.advance-collab2{
        /*float:left;*/
        overflow: hidden;
        display: none;
        /*background: #f0e68c;*/
    }
</style>