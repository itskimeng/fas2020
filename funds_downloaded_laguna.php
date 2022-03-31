<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('funds_downloaded'); ?>

<?php include 'base_menu.html.php'; ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="images/logo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<?php startblock('title') ?>
  Funds Downloaded
<?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('Finance/views/FundsDownloaded/laguna.php'); ?>
<?php endblock() ?>

