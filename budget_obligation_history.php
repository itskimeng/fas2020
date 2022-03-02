<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('finance_obligation'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Obligation
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('Finance/views/BudgetObligation/history.php'); ?>
<?php endblock() ?>

