<?php include('base_call_connect.php'); ?>
<?php include('connection.php'); ?>
<?php include('GSS/macro/macro.php'); ?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('supplier_info');
?>

<?php include 'base_menu.html.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<?php startblock('title'); ?>
Procurement
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include('GSS/views/SupplierAwarding/index.php'); ?>
<?php endblock(); ?>
<script src="GSS/views/backend/js/custom.js"></script>

