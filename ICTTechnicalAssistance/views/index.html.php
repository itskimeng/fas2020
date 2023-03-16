<?php require_once 'ICTTechnicalAssistance/controller/ICTController.php';
?>


  <?php ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? include('base_admin_ict_dashboard.php')  : include('base_user_ict_dashboard.php') ;?>
<?php ?>
<?php ?>

<?php include('modal_reports.html.php'); ?>

<script>
  $(document).on('click', '#btn_create', function() {
    window.location.href = 'dash_ta_view.php';
  });
  $(document).on('click', '#btn_report', function() {

    $('#reports').modal('show');
  })
</script>