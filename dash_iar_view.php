<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php include('GSS/macro/macro.php'); ?> 
<?php require_once 'menu_checker.php'; ?> 

<?php $menuchecker = menuChecker('view_iar');?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<link href='GSS/views/backend/css/buttons.css' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>



<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  Asset Management
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include ('GSS/views/AssetManagement/index.php'); ?>
<?php endblock(); ?>
