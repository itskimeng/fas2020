<?php require_once 'Finance/controller/CashController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Payment</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Cash Section</li>
      <li class="active">Payment</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include 'summary.php'; ?>
    </div>
    <div class="row">
      <?php include 'filter.php'; ?>
    </div>
  	<div class="row">
      <div class="col-lg-12 col-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="cash_payment.php"><strong>Normal &nbsp;<small class="label pull-right bg-blue"><?= count($data1);?></small></strong></a></li>
              <li class="active"><a type="button" data-toggle="tab">Delivered </a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
              </div>
              <div class="tab-pane active" id="tab_2">
                <?php include 'Finance/views/CashPayment/table2.php'; ?>
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>

<style type="text/css">
   th {
    background-color: #367fa9; color: white;
  }

  .dataTables_filter {
    text-align: right !important;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }
</style>

<script type="text/javascript">

  <?php
    session_start();
    if (isset($_SESSION['toastr'])) {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
        unset($_SESSION['toastr']);
    }
  ?> 

  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #2e9b21; color: white;">';
    tb += '<td width="12%"><b>PARTICULAR</b></td>';
    tb += '<td width="12%"><b>GROSS AMOUNT</b></td>';
    tb += '<td width="12%"><b>DEDUCTION</b></td>';
    tb += '<td width="12%"><b>NET AMOUNT</b></td>';
    tb += '<td width="12%"><b>DV LINK</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.ob_purpose+'</td>';
    tb += '<td class="text-center"><b>'+data.ob_amount+'</b></td>';
    tb += '<td class="text-center"><b>'+data.dv_total+'</b></td>';
    tb += '<td class="text-center"><b>'+data.dv_net_amount+'</b></td>';
    tb += '<td class="text-center"><iframe src="'+data.p_link.replace('view', 'preview')+'" width="300" height="210" allow="autoplay"></iframe> </td>';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color: #d76e6e; color: white;">';
    tb += '<td colspan="5"><b>DISBURSEMENT</b></td>';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color:#d7d8dd;">';
    tb += '<td colspan="2"><b>FUND SOURCE</b></td>';
    tb += '<td><b>UACS</b></td>';
    tb += '<td><b>PPA</b></td>';
    tb += '<td><b>AMOUNT</b></td>';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color:#d7d8dd;">';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color: #d1aa2d; color: white;">';
    tb += '<td colspan="5"><b>NTA/NCA</b></td>';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color:#d7d8dd;">';
    tb += '<td><b>NTA/NCA NO</b></td>';
    tb += '<td><b>PARTICULAR</b></td>';
    tb += '<td><b>TOTAL AMOUNT</b></td>';
    tb += '<td><b>NTA BALANCE</b></td>';
    tb += '<td><b>DISBURSED AMOUNT</b></td>';
    tb += '</tr>';
    tb += '<tr style="text-align: center; background-color:#d7d8dd;">';
    tb += '</tr>';


    return tb;
  }


  function view_dv_url()
  {
  }


  $('#example1').DataTable();

  // var table = $('#example').DataTable( {
  //   'lengthChange': false,
  //   "columns": [
  //     { "data": "id", "visible": false },
  //     {
  //       "className"     : 'details-control text-center',
  //       "orderable"     : false,
  //       "sortable"      : false,
  //       "data"          : null,
  //       "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%;"><span class="fa fa-plus"></span></a>',
  //     },

  //     { "data": "p_lddap", "className": 'text-center' },
  //     { "data": "p_lddap_date", "className": 'text-center' },
  //     { "data": "dv_dv_number", "className": 'text-center' },
  //     { "data": "ob_serial_no", "className": 'text-center' },
  //     { "data": "supplier", "className": 'text-center' },
  //     { "data": "ob_purpose", "className": 'text-center', "visible": false },
  //     { "data": "ob_amount", "className": 'text-center', "visible": false },
  //     { "data": "dv_total", "className": 'text-center', "visible": false },
  //     { "data": "dv_net_amount", "className": 'text-center', "visible": false },
  //     { "data": "p_link", "className": 'text-center', "visible": false },
  //     { "data": "p_status", "className": 'text-center' },
  //     { "data": "action", "className": 'text-center' },

  //   ],"order": [[1, 'asc']],
  //   'searching'   : true,
  // });


  // $('#example tbody').on('click', 'td.details-control', function () {

  //     var tr = $(this).closest('tr');
  //     var row = table.row( tr );
  //     let tdf = tr.find('td:first');

  //     tdf.html('');

  //     if ( row.child.isShown() ) {
  //         // This row is already open - close it
  //         row.child.hide();
  //         tdf.append('<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>');
  //         tr.removeClass('shown');
  //     }
  //     else {
  //         // Open this row
  //         row.child( format(row.data()) ).show();
  //         tdf.append('<a type="button" class="btn btn-cirle btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-minus"></span></a>');
  //         tr.addClass('shown');
  //         row.child().css('background-color', '#9cc5dd', 'border', '1px solid #727299');
  //     }
  // } );



  // $('#btn_expand').click(function(){
  function changeIcon()
  {

    var className = $('#collapse_icon').attr('class');
    alert(className);
  }
  // });

</script>



