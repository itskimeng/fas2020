<div class="col-md-12">
  	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Quality Objective Entry</h3>
		</div>

		<div class="box-body">

		<ul class="todo-list ui-sortable">
			<?php foreach ($entries as $key => $entry): ?>
				<li class="ui-state-default" style="background: #f4ebeb !important;">
					<!-- <span class="handle ui-sortable-handle"> -->
						<!-- <i class="fa fa-magnet"></i> -->
						<span><u><?= $counter; ?></u>.</span>
					<!-- </span> -->
					<span class="text" style="font-size: 12px;">
						<!-- <?= $entry; ?> -->
						<?php 
							$string = strip_tags($entry);
							if (strlen($string) > 230) {

							    // truncate string
							    $stringCut = substr($string, 0, 230);
							    $endPoint = strrpos($stringCut, ' ');

							    //if the string doesn't contain any space then it will cut without word basis.
							    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
							    $string .= '.....';
							}
							echo $string;
						 ?>
					</span>
					<div class="tools">
						<a href="qms_procedure_ob_entries.php?parent=<?= $_GET['parent']; ?>&division=<?= $_SESSION['division']; ?>&id=<?= $key; ?>&entry_id=<?php echo $_GET['id']; ?>&status=<?php echo $qp_data[0]['status']; ?>&auth=entry" title="Open Form"><i class="fa fa-folder-open-o" style="color:#17179e;"></i></a>
					</div>
				</li>
			<?php $counter++; endforeach ?>

		</ul>
	</div>

</div>	

