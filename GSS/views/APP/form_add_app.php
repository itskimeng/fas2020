<?php require_once 'GSS/controller/APPController.php'; ?>

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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php include 'app_details.php'; ?>
                    </div>
                </div>
            </div>

        </div>


    </section>
</div>
<script>
     $(function() {
    $('.select2').select2();
    $('#app_duplicate_tbl').DataTable({
      "lengthChange": false,
      "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements


    });
  });
</script>
<script src="GSS/views/backend/js/custom.js"></script>
