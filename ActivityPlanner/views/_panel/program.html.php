<div class="box box-default box-solid">
    <div class="box-header with-border">
      <h5 class="box-title">Program View</h5>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
	<div class="box-body box-emp" style="height: 374px; max-height: 374px; overflow-y: scroll;">
      <ul class="nav nav-pills nav-stacked" data-widget="tree">
      	<?php foreach ($lgcdd_programs as $key => $program): ?>
	        <li class="active treeview program_list" onClick="changeArrow(this)">
	        	<a style="background-color: orange;"><i class="fa fa-calendar-check-o"></i> <?php echo $key; ?>
	          		 <i class="glyphicon glyphicon-chevron-up pull-right"></i> 
	      		</a>
	          	<ul class="treeview-menu" style="border:1px solid">
	          		<?php foreach ($program as $key => $item): ?>
		            	<li>
		              		<a class="program_activity" href='base_planner_subtasks.html.php?event_planner_id=<?php echo $item["event_id"];?>&username=<?php echo $username; ?>&division=<?php echo $_GET['division']; ?>' style = "color:black; font-weight:normal;" onHover="changeColor(this)">
		              			<i class="fa fa-circle-o text-yellow"></i>
		              			<?php echo $item['activity']; ?>
		              		</a>
		            	</li>
	          		<?php endforeach ?>
	        	</ul>
	      	</li>
      	<?php endforeach ?>
      </ul>
          
	</div>	
</div>		

<style type="text/css">
	.program_list > a, .program_activity:hover {
		background-color: #e2d3d3;
	}
</style>

<script type="text/javascript">
	function changeArrow(elem) {
		if ($(elem).find('.glyphicon').hasClass('glyphicon-chevron-down')) {
		    $(elem).find('.glyphicon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		}
		else if ($(elem).find('.glyphicon').hasClass('glyphicon-chevron-up')) {
		    $(elem).find('.glyphicon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		}
	}	
</script>