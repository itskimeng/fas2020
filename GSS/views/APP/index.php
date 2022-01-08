<?php require_once 'GSS/controller/APPController.php'; ?>


<!-- test -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>APP </h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">GSS Section</a></li>
      <li class="active">APP</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php include('_panel/filter_app.php'); ?>
      </div>
      <div class="col-md-12">
        <?php require_once 'form_upload_csv.php' ?>
      </div>
    </div>

  </section>
</div>
<script>
  $(function() {
    $('.select2').select2();

    $('#datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      orientation: "bottom"
    })
    $('#app_table').DataTable();
    $('html, body').animate({
      scrollTop: $('footer').offset().top
    }, 'slow');

   
  });
</script>