<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('finance_fundsource'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Edit Fund Source
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('Finance/views/BudgetFundSource/form.php'); ?>
<?php endblock() ?>
