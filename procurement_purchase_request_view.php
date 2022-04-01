<?php include('base_call_connect.php'); ?> 
<?php include('connection.php'); ?> 
<?php include('GSS/macro/macro.php'); ?> 

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
      $("#cform-unit").select2({
        dropdownParent: $("#exampleModal")
    });
        
    })
</script>
<script>
       $(document).on('change', '#cform-unit', function () {
        let selected_item = $('#cform-unit').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function (result) {
                var data = jQuery.parseJSON(result);
                $('#app_items').val(data.id);
                $('#item_title').val(data.procurement);
                $('#stocknumber').val(data.sn);
                $('#abc').val(data.price);
                $('#unit').val(data.unit_id);
                $('#unit_id').val(data.unit);
            }
        })
    });
</script>