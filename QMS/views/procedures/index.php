<?php require_once 'QMS/controller/QMSProcedureController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Quality Procedures</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">Quality Procedures</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include 'table_procedures.php'; ?>
    </div>
    
  </section>
</div>

<style type="text/css">
  .dataTables_filter {
    text-align: right !important;
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
  let dataTest = '';
  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>Test</b></td>';
    tb += '<td width="12%"><b>Test</b></td>';
    tb += '<td width="12%"><b>Test</b></td>';
    tb += '<td width="12%"><b>Test</b></td>';
    tb += '<td width="20%"><b>Test</b></td>';
    tb += '<td><b>Remarks</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '<td class="text-center">'+dataTest+'</td>';
    tb += '</tr>';

    return tb;
  }

  var table = $('#example').DataTable({
    "bFilter": true,
    'lengthChange': false,
    "columns": [
      { "data": "id", "visible": false },
      {
        "className"     : 'details-control text-center',
        "orderable"     : false,
        "sortable"      : false,
        "data"          : null,
        "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
      },
      { "data": "frequency", "className": 'text-center' },
      { "data": "title", "className": 'text-center' },
      { "data": "qp_code", "className": 'text-center' },
      { "data": "process_owner", "className": 'text-center' },
      { "data": "office", "className": 'text-center' },
      { "data": "action", "width": "10%", "sortable": false, "className": 'text-center' }  
    ],"order": [[1, 'desc']],
    'searching'   : true,
  });


  // Add event listener for opening and closing details
  $('#example tbody').on('click', 'td.details-control', function () {

      var tr = $(this).closest('tr');
      var row = table.row( tr );
      let tdf = tr.find('td:first');

      tdf.html('');

      if ( row.child.isShown() ) {
          // This row is already open - close it
          row.child.hide();
          tdf.append('<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>');
          tr.removeClass('shown');
      }
      else {
          // Open this row
          row.child( format(row.data()) ).show();
          tdf.append('<a type="button" class="btn btn-cirle btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-minus"></span></a>');
          tr.addClass('shown');
          row.child().css('background-color', '#b4b4b4');
      }
  } );


    function delete_qp_entry(entry_id)
    {
      swal({
        title: "Are you sure?",
        text: "Permanently Delete Quality Procedure.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Confirm",
        closeOnConfirm: false
      },
      function(){

          //ajax start
          $.ajax({  
            url:"QMS/route/delete_qms_procedure.php?id="+entry_id,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function() {
            }, 

            success:function(data){  

                swal({
                  title: "Success",
                  text: "Quality Procedure Sucessfully Deleted!",
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