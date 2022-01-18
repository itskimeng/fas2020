<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('finance_ors'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Obligation
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('Finance/views/BudgetObligation/index.php'); ?>
<?php endblock() ?>