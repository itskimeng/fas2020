<div class="box box-primary">
	<div class="box-header with-border">
	  	<h3 class="box-title"><i class="fa fa-sticky-note"></i> Notes</h3> 
		<div class="box-tools pull-right">
	  		<h5 class="note_box_title"></h5> 
          	<?php echo input_hidden('notes_taskid','notes_taskid','notes_taskid','') ?>
        </div>
	</div>
	
	<div class="box-footer box-comments">
		<!-- <div class="form-group note_box" style="overflow-y: scroll; max-height: 151px!important; min-height: 151px!important;">
			
    </div> -->
	</div>
        
    <div class="box-footer">
        <div class="input-group">
          <input type="text" name="message" placeholder="Type Comment ..." class="form-control post_message" required>
            <span class="input-group-btn">
              <button class="btn btn-primary btn-primary_post btn-flat">Post</button>
            </span>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.daterange').daterangepicker();
	});
</script>
