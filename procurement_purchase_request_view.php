<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?> 
<?php $menuchecker = menuChecker('procurement');
?> 

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>
  Procurement
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include('GSS/views/PR/form/form_view_new.php'); ?>
<?php endblock(); ?>
<script src="GSS/views/backend/js/custom.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    })
</script>
