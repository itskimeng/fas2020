<div class="col-md-12">
  	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Quality Objective Entry</h3>
			<?php if ($is_admin): ?>
				<div class="box-tools">
					<div class="btn-group">
						<a href="qms_procedures_objective.php?parent=<?= $_GET['id']; ?>&division=<?= $_SESSION['division']; ?>&new" class="btn btn-block btn-primary btn-md btn-add_qobj"><i class="fa fa-plus-square"></i> Add Quality Objective</a>
					</div>	
				</div>
			<?php endif ?>
		</div>

		<div class="box-body">

		<ul class="todo-list ui-sortable">
			<?php foreach ($entries as $key => $entry): ?>
				<li class="ui-state-default" style="background: #f4ebeb !important;">
					<span class="handle ui-sortable-handle">
						<i class="fa fa-magnet"></i>
					</span>
					<span class="text"><?= $entry; ?></span>
					<div class="tools">
						<?php if ($is_admin): ?>
							<a href="qms_procedures_objective.php?parent=<?= $_GET['id']; ?>&division=<?= $_SESSION['division']; ?>&edit=<?= $key; ?>" title="Edit"><i class="fa fa-edit" style="color:#0e8b10;"></i></a>
						<?php endif ?>
						<a href="qms_procedures_objective.php?parent=<?= $_GET['id']; ?>&division=<?= $_SESSION['division']; ?>&id=<?= $key; ?>" title="Open Form"><i class="fa fa-folder-open-o" style="color:#17179e;"></i></a>
						<?php if ($is_admin): ?>
							<i class="fa fa-trash-o"></i>
						<?php endif ?>
					</div>
				</li>
			<?php endforeach ?>

		</ul>
	</div>

</div>	

