<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('qms_statistics'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Quality Management System
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('QMS/views/statistics/index.php'); ?>
<?php endblock() ?>
