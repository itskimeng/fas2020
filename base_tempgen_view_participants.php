<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('template_generator'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  List of Participants
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('TemplateGenerator/views/view_participants.php'); ?>
<?php endblock() ?>
