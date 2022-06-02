<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('qms_process_owners'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  QMS Process Owners
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('QMS/views/process_owners/index.php'); ?>
<?php endblock() ?>
