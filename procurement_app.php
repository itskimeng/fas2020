<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('app');
?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  APP
<?php endblock('title'); ?>

<?php startblock('content'); ?>

  <?php include('GSS/views/APP/index.php'); ?>
<?php endblock(); ?>
