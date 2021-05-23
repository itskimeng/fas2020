<div class="box box-default box-solid dropbox">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-tasks"></i> To Do</h3>
	  <div class="tools pull-right">
	  	<!-- <span class="pull-right-container">
          <span class="label label-primary pull-right" style="font-size: 12pt;"><?php //echo count($tasks['Created']); ?></span>
        </span> -->
	  </div>
	</div>
	<div class="box-body workspace origin created_list" value="created" style="overflow-y: scroll; height: 500px; background-color: #f0f0f070;">
		<?php foreach ($tasks['Created'] as $key => $task): ?>
			<div class="ui-draggable source ui-draggable-handle" value="created">
				
				<div class="col-md-12 source sidekick-todo external-event" value="created" style="background-color: white; margin-bottom: 10px; min-height: 80px;">
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
								<div class="widget-user-image" style="width:58px; height:58px; float: right;">
									<?php if ($task['is_default']): ?>
										<span data-letters="<?php echo $task['host_initials']; ?>"></span>
									<?php else: ?>	
										<img class="img-circle custom-profile" src="<?php echo $task['profile'] ?>">
									<?php endif ?>
								</div>
						    	
				    			<b style="color: #797575;"><?php echo $task['code']; ?></b><br>
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

  	.widget-user .widget-user-image {
	    position: absolute;
	    top: 32px;
	    left: 12%;
	    margin-left: -45px;
	}

	.custom-profile {
	    height: 100% !important;
	    width: 100% !important;
	    object-fit: cover;
	}

	div .widget-user-image > .img-circle {
	    border-radius: 15%;
	    border: 1px solid #c0c1c14a;
	}

  	img {
		max-width: 100%;
	    max-height: 100%;
	 	object-fit: cover;
	}

	[data-letters]:before {
	  content:attr(data-letters);
	  display:inline-block;
	  font-size:1em;
	  width:2.5em;
	  height:2.5em;
	  line-height:2.5em;
	  text-align:center;
	  border-radius:15% !important;
	  background:#a6249a !important;
	  vertical-align:middle;
	  /*margin-right:1em;*/
	  color:white;
	  /*margin-top: -13px;*/
	}

</style>


