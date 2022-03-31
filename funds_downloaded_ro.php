<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('funds_downloaded'); ?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title') ?>
  Funds Downloaded - RO
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('Finance/views/FundsDownloaded/index_ro.php'); ?>
<?php endblock() ?>

