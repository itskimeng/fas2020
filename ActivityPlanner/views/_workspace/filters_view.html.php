<?php 
	
	require_once '..\..\views\macro.html.php';
	require_once '..\..\manager\ActivityPlanner.php';

	$ap = new ActivityPlanner();
?>

<!-- program -->
<div class="col-md-4">
	<?php echo group_select('Program', 'filter_program', $ap->fetchPrograms(), 'ALL', 'filter_program', 1, false) ?>
</div>

<!-- title -->
<div class="col-md-4">
	<?php echo group_select('Title', 'filter_title', $ap->fetchActivities(), '', 'filter_title', 1, false) ?>
</div>

<!-- timeline -->
<div class="col-md-4">
	<?php echo group_daterange3('Timeline', 'filter_timeline', 'filter_timeline', '', '', 'daterange ', 1, ''); ?>
</div>	

<div class="col-md-12">
	<div class="pull-right">
		<div class="btn-group">	            		
			<button type="button" class="btn btn-block btn-default btn-filter_clear"><i class="fa fa-reorder"></i> Clear</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-block btn-primary btn-primary-filter"><i class="fa fa-filter"></i> Filter</button>
		</div>
	</div>
</div>