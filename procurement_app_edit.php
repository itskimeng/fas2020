<?php include('base_call_connect.php'); ?>
<?php include('connection.php'); ?>
<?php include('GSS/macro/macro.php'); ?>

<?php require_once 'bower_components/phpti-master/src/ti.php'; ?>

<?php require_once 'menu_checker.php'; ?>
<?php $menuchecker = menuChecker('app');
?>

<?php include 'base_menu.html.php'; ?>

<?php startblock('title'); ?>

Annual Procurement Plan
<?php endblock('title'); ?>

<?php startblock('content'); ?>

<?php include('GSS/views/APP/form_edit_app.php'); ?>

<?php endblock(); ?>

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });

  $(document).on('click', '#btn_app_edit', function() {
    let form = $('#app_edit_form').serialize();
    let path = 'GSS/route/post_edit_app.php?' + form;
    update(path);

    function update(path) {
      $.get({
        url: path,
        success: function(data) {
          window.location = "procurement_app.php?division=" + $('#office_id').val();

        }
      })
    }
  })
</script>