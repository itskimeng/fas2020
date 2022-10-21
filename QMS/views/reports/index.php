<?php require_once 'QMS/controller/QMSReportsController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Reports Submission</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">Reports Submission</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include 'table_reports.php'; ?>
    </div>
    
  </section>
</div>

<style type="text/css">
  .dataTables_filter {
    text-align: right !important;
  }
  table.table-bordered > tbody > tr > td{
    border:1px solid grey;
  }
  table.table-bordered > thead > tr > th{
    border:1px solid grey;
  }
</style>

<script type="text/javascript">

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>


  var table = $('#example').DataTable({
    "bFilter": true,
    'lengthChange': false,
    "pageLength": 7
  });


  function delete_qp_entry(entry_id)
  {
    swal({
      title: "Are you sure?",
      text: "Permanently Delete Quality Procedure Report.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: 'red',
      confirmButtonText: "Confirm",
      closeOnConfirm: false
    },
    function(){

        //ajax start
        $.ajax({  
          url:"QMS/route/delete_qp_entry.php?id="+entry_id,
          contentType:false,
          cache:false,
          processData:false,
          beforeSend:function() {
          }, 

          success:function(data){  

              swal({
                title: "Success",
                text: "Entry Sucessfully Deleted!",
                type: "success",
                confirmButtonColor: '#008d4c',
                confirmButtonText: "Confirm",
                closeOnConfirm: false
              },
              function(){    
                window.location.reload();
              });

          }

        });  
        //ajax end       
    });
  }


</script>