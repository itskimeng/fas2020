<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('qms_report_submission'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  QMS Reports Submission
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('QMS/views/reports/index.php'); ?>
<?php endblock() ?>
