<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Template Generator
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('ActivityPlanner/views/macro.html.php'); ?>
  <?php include('TemplateGenerator/views/index.html.php'); ?>
<?php endblock() ?>
