<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('ict_ta'); ?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
 Client Satisfaction Report
<?php endblock('title'); ?>

<?php startblock('content'); ?>
  <?php include('ICTTechnicalAssistance/views/css_report.php'); ?>
<?php endblock(); ?>
