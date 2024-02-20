<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('vehicle_form_create'); ?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
 Create Vehicle Request Form
<?php endblock('title'); ?>

<?php startblock('content'); ?>
  <?php include('GSS/views/AssetManagement/form/form_vehicle_request_create.php'); ?>
<?php endblock(); ?>
