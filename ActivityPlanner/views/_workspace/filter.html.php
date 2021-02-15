<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Filter</h3>
		<div class="box-tools pull-right">
        	<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
        </div>
	</div>
	<div class="box-body box-body_details">
		<!-- program -->
		<div class="col-md-6">
	    	<?php echo group_text('Program','filter_program','', '', 1, false,'filter_program'); ?>
		</div>

		<!-- title -->
		<div class="col-md-6">
	    	<?php echo group_select('Title', 'filter_title', $activities, '', 'filter_title', 1, false) ?>
		</div>

		<!-- timeline -->
		<div class="col-md-6">
	    	<?php echo group_daterange3('Timeline', 'filter_timeline', 'filter_timeline', '', '', 'daterange ', 1, $subtask['is_readonly']); ?>
		</div>		
	</div>
	<div class="box-footer">
		<div class="row pull-right">
			<div class="col-md-12">
		    	<div class="margin">
	            	<div class="btn-group">
		    			<button type="button" class="btn btn-block btn-default">Clear</button>
		    		</div>
	            	<div class="btn-group">
		    			<button type="button" class="btn btn-block btn-primary btn-primary-filter">Filter</button>
		    		</div>
		    	</div>
				
			</div>
				
			</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.daterange').daterangepicker();
	});
</script>
