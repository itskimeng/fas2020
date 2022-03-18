<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('finance_fundsource'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Object Codes
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('Finance/views/BudgetFundSource/object_codes.php'); ?>
<?php endblock() ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
