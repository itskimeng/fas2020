<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php include('GSS/macro/macro.php'); ?> 

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('app');
?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  
Annual Procurement Plan
<?php endblock('title'); ?>

<?php startblock('content'); ?>

  <?php include('GSS/views/APP/form_add_app.php'); ?>
  <?php include('GSS/views/APP/modal_view_duplicate_stockNo.php');?>

<?php endblock(); ?>
