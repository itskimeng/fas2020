
<?php require_once 'ICTTechnicalAssistance/controller/ICTController.php';
?>


  <?php ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? include('base_admin_ict_dashboard.php')  : include('base_user_ict_dashboard.php') ;?>
<?php ?>
<?php ?>

<?php include('modal_reports.html.php'); ?>

<script>
  $(function(){
    $('.select2').select2()

  })
  $(document).on('change','#db_year',function(){
    if($(this).val() == 2022)
    {
      window.location.href = "base_ticket_monitoring.html.php?role=<?= $_GET['role'];?>&year=2022&quarter=<?= $_GET['quarter'];?>";
    }else{
      window.location.href = "base_ticket_monitoring.html.php?role=<?= $_GET['role'];?>&year=2023&quarter=<?= $_GET['quarter'];?>";
      
    }
    
  })
  $(document).on('click', '#btn_create', function() {
    window.location.href = 'dash_ta_view.php';
  });
  $(document).on('click', '#btn_report', function() {

    $('#reports').modal('show');
  })
  $(document).on('click','#btn_qms',function(){
    window.location = "base_qms_report.html.php";
  })
</script>