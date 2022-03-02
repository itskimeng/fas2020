<?php require_once 'Finance/controller/DisbursementController.php'; ?>
<?php 
  $timeNow = (new DateTime('now'))->format('m/d/Y');
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Disbursement</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Accounting Section</li>
      <li class="active">Disbursement</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/summary.php'); ?>
    </div>  
    <div class="row">
      <?php include 'filter.php'; ?>
    </div>
    <div class="row">
      <?php include('Finance/views/AccountingDisbursement/table.php'); ?>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #367fa9 !important; 
    color: white;
   font-size: 80% !important;
  }
  .zoom
  {
    transition: transform .6s;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
  .dataTables_filter
  {
    float: right;
  }
</style>

<script src="Finance/views/AccountingDisbursement/custom_js.js" type="text/javascript"></script>

<script type="text/javascript">

    toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "500",
      "hideDuration": "1500",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

  // toastr.success('Transaction Updated.', 'Success');

</script>

<script type="text/javascript">

  
  <?php
      // toastr output & session reset
      session_start();
      
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.success("Transaction Updated", "Success!")';
          unset($_SESSION['toastr']);
      }
  ?>



  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>Date Received</b></td>';
    tb += '<td width="12%"><b>Date Disbursed</b></td>';
    tb += '<td width="12%"><b>Date Returned</b></td>';
    tb += '<td width="20%"><b>Particular</b></td>';
    tb += '<td><b>Remarks</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.dv_date_received+'</td>';
    tb += '<td class="text-center">'+data.dv_date_process+'</td>';
    // tb += '<td class="text-center">'+data.date_returned+'</td>';
    tb += '<td class="text-center"><button class="btn btn-danger">Return <i class="fa fa-undo"></i></button></td>';
    tb += '<td class="text-center">'+data.particular+'</td>';
    tb += '<td class="text-center">'+data.dv_remarks+'</td>';
    tb += '</tr>';

    return tb;
  }

  $('#cform-filter_date_generated').datepicker({
    autoclose: true
  })

  var table = $('#example2').DataTable( {
    // "ajax": "../ajax/data/objects.txt",
    'lengthChange': false,
    "columns": [
      { "data": "id", "visible": false },
      {
        "className"     : 'details-control text-center',
        "orderable"     : false,
        "sortable"      : false,
        "data"          : null,
        "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%;"><span class="fa fa-plus"></span></a>',
      },
      { "data": "dv_number", "width": "8%", "className": 'text-center' },
      { "data": "id", "width": "8%", "className": 'text-center' },
      { "data": "date_created", "width": "8%", "className": 'text-center' },
      { "data": "dv_date_received", "width": "10%", "className": 'text-center', "visible": false },
      { "data": "dv_date_process", "width": "20%", "visible": false },
      { "data": "supplier", "width": "15%" },
      { "data": "particular", "width": "10%", "className": 'text-center', "visible": false },
      { "data": "amount", "width": "10%", "className": 'text-center' },
      { "data": "total", "width": "10%", "sortable": false, "className": 'text-center' },
      { "data": "net_amount", "width": "10%", "className": 'text-center' },
      { "data": "dv_remarks", "visible": false },
      { "data": "dv_status", "width": "10%", "className": 'text-center'},
      { "data": "action", "width": "10%", "className": 'text-center' },
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

  $(document).on('click', '.btn-remove_obligation', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('source_id');
    let code = row.find('td:eq(4)').html();

    let modal = $('#modal_delete_obligation');
    let modal_sourceID = modal.find('#cform-source_id');
    let modal_sourceCode = modal.find('#cform-source_code');
    let modal_sourceCodeTxt = modal.find('#source_code');

    modal_sourceID.val(id);
    modal_sourceCode.val(code);
    modal_sourceCodeTxt.html(code);
  })

  $(document).on('click', '#btn-advance_search', function(){
    let val = $(this).val();
    
    if (val == 'close') {
      $('.filter_buttons').removeClass('hidden');
      $(this).val('open');
      $(this).find('i').toggleClass('fa-search-plus fa-search-minus');
      $('.filter_buttons').show(1000);
      $('.filter_buttons').addClass('fadeInDown');
    } else {
      // $('.filter_buttons').addClass('hidden');
      $(this).val('close');
      $(this).find('i').toggleClass('fa-search-minus fa-search-plus');
      $('.filter_buttons').hide(1000);
      $('.filter_buttons').removeClass('fadeInDown');
    }
  });

  // Add event listener for opening and closing details
  $('#example2 tbody').on('click', 'td.details-control', function () {

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


   $('#timeline').daterangepicker({
    opens: 'right',
    showButtonPanel: false,
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour'),
    locale: {
    format: 'M/DD/YYYY'
    }
  });

</script>


