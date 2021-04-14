<?php 
	
	require_once '..\..\views\macro.html.php';
	require_once '..\..\manager\ActivityPlanner.php';

	$ap = new ActivityPlanner();
?>

<!-- program -->
<div class="col-md-12">
	<div id="note_box" class="form-group note_box" style="overflow-y: scroll; max-height: 151px!important; min-height: 151px!important;">
		<!-- ....... -->
    </div>	
</div>

<div class="col-md-12">
	<div class="input-group">
      <input type="text" name="message" placeholder="Type Comment ..." class="form-control post_message" required>
        <span class="input-group-btn">
          <button class="btn btn-primary btn-primary_post btn-flat">Post</button>
        </span>
    </div>
</div>