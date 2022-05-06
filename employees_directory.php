<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('emp_directory'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Employees Directory
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('HumanResource/views/EmployeesDirectory/index.php'); ?>
<?php endblock() ?>