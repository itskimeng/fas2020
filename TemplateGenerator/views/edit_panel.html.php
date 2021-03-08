<div class="box">
	<div class="box-body">
		<form method="POST" enctype="multipart/form-data" action="TemplateGenerator/entity/template.php" >
			<div class="col-md-4">
				<div class="col-md-12">
					<?php echo group_text('Title','title','', '',1, false,''); ?>
	    		</div>
				<div class="col-md-6">
	    			<?php echo group_text('Attendee','attendee','', '',1, false,'', '',false); ?>
	    		</div>
	    		<div class="col-md-6">
	    			<label>Attendees List:</label><br>
	    			<input type="file" name="uploadfile" value="" /> 
	    		</div>
	    		<div class="col-md-12">
	    			<?php echo group_text('LGU/Office','lgu','', '',1, false,''); ?>
	    		</div>	
	    		<div class="col-md-12">
	            	<?php echo group_textarea('Message','message',''); ?>
	    		</div>
	    		<div class="col-md-12">
	    			<?php echo group_text('Signatore','signatore','', '',1, false,''); ?>
	    		</div>
	    		<div class="col-md-12">
	    			<?php echo group_text('Position','position','', '',1, false,''); ?>
	    		</div>
	  			<div class="col-md-12">
		    		<div class="btn-group pull-right">
		            	<button type="submit" name="submit" value="" class="btn btn-block btn-primary" id="submit_btn">Save</button>  
		        	</div>
	        	</div>
			</div>
		</form>
	</div>	
</div>
