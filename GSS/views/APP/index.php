<?php require_once 'GSS/controller/APPController.php'; ?>


<!-- test -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Annual Procurement Plan </h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">GSS Section</a></li>
      <li class="active">APP</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-4">
        <?php include '_panel/app_item_info.php'; ?>
      </div>
      <div class="col-md-4">
        <?php include '_panel/app_item_info.php'; ?>
      </div>
      <div class="col-md-4">
        <?php include '_panel/app_item_info.php'; ?>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12">
        <?php //require_once '_panel/filter_app.php'; 
        ?>
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
    $('#app_table').DataTable({
      "lengthChange": false,
      'paging': false,
      'searching': true,
      "order": [
                    [7, "desc"]
                ],
      'info': false,
      'autoWidth': false,
      "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements


    });
  });
</script>