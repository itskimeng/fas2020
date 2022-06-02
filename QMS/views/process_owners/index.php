<?php require_once 'QMS/controller/QMSProcessOwnersController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>QMS Process Owners</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">QMS Process Owners</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include 'table_process_owner.php'; ?>
    </div>
    
  </section>
</div>

<?php include 'modal_process_owner.php'; ?>

<style type="text/css">
  .dataTables_filter {
    text-align: right !important;
  }
</style>

<script type="text/javascript">
  var table = $('#example').DataTable({
    "bFilter": true,
    'lengthChange': false,
    "columns": [
      { "data": "lastname", "width": "15%", "className": 'text-center' },
      { "data": "firstname", "width": "15%", "className": 'text-center' },
      { "data": "mi", "width": "5%", "className": 'text-center' },
      { "data": "position", "width": "10%", "className": 'text-center' },
      { "data": "office", "width": "10%", "className": 'text-center' },
      { "data": "action", "width": "12%", "sortable": false, "className": 'text-center' }  
    ],"order": [[1, 'desc']],
    'searching'   : true,
  });
</script>