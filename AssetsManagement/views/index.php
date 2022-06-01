<?php include 'time_zone.php'; ?>
<?php include 'controller/AssetsController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">IAR</a></li>
    </ol><br>
  </section>
  <section class="content">
    <div class="box">
      <div class="panel panel-default">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <?php include('_panel/iar.php'); ?>
            </div>
         
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(function () {
    $('').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>