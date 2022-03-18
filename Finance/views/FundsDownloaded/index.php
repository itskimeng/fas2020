<?php require_once 'Finance/controller/FundsDownloadedController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Funds Downloaded</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li class="active">Funds Downloaded</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a type="button" data-toggle="tab"><strong>Cavite</strong></a></li>
              <li><a type="button" data-toggle="tab">Laguna</a></li>
              <li><a type="button" data-toggle="tab">Batangas</a></li>
              <li><a type="button" data-toggle="tab">Rizal</a></li>
              <li><a type="button" data-toggle="tab">Quezon</a></li>
              <li><a type="button" data-toggle="tab">Lucena City</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php include 'provinces/cavite.php'; ?>
              </div>
              <div class="tab-pane" id="tab_2">
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>

<style type="text/css"><?php include 'custom.css'; ?></style>

<script type="text/javascript">

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>

  $(document).ready(function(){
    var table = $('#example2').DataTable( {
      // "ajax": "../ajax/data/objects.txt",
      'lengthChange': false,
      "columns": [
        { "data": "lddap_no", "width": "15%", "className": 'text-center' },
        { "data": "lddap_date", "width": "15%", "className": 'text-center' },
        { "data": "total_amout", "width": "15%", "className": 'text-center' },
        { "data": "status", "width": "10%", "className": 'text-center' },
        { "data": "action", "width": "10%", "sortable": false, "className": 'text-center' }
      ],"order": [[1, 'asc']],
      'searching'   : true,
    });
  });

</script>