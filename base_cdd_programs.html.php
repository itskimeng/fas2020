<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  LGCDD Programs
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('LGCDDProgram/index.html.php'); ?>
<?php endblock() ?>
