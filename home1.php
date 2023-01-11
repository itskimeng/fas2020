<?php include('base_call_connect.php'); ?>
<?php include('connection.php'); ?>
<?php include('GSS/macro/macro.php'); ?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('dashboard');
?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
Procurement
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include('dash_board.php'); ?>
<?php endblock(); ?>

