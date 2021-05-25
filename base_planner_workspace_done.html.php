<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('activity_planner'); ?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  My Workspace
<?php endblock('title'); ?>

<?php startblock('content'); ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('ActivityPlanner/views/planner_view_done_workspace.html.php'); ?>
<?php endblock(); ?>
