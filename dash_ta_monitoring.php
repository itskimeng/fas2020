<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'menu_checker.php'; ?> 

<?php $menuchecker = menuChecker('monitoring');?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  Procurement
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include ('ict/views/monitoring/index.php'); ?>


<?php endblock(); ?>

