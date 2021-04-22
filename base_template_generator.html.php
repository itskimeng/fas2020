<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('template_generator'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Template Generator
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('TemplateGenerator/views/index.html.php'); ?>
<?php endblock() ?>
