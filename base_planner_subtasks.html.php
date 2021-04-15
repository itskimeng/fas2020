<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Add Task
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('ActivityPlanner/views/planner_add_subtask.html.php'); ?>
<?php endblock() ?>
