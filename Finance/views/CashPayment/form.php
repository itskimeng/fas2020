<?php require_once 'Finance/controller/CashController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Payment New</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Cash Section</li>
      <li class="active">Payment New</li>
    </ol> 
  </section>
  <section class="content">
    <form method="POST" action="<?= $route; ?>">
      <div class="row">
        <?= include 'information.php'; ?>
      </div>
      <div class="row">
        <?= include 'details.php'; ?>
      </div>
    </form>
  </section>
</div>

<?php include 'modal_dv_list.php'; ?>

<style type="text/css">
  th {
    background-color: #013765; 
    color: white;
  }

  .dataTables_filter {
    text-align: right !important;
  }
  .small-box
  {
    border-radius: 15px;
    box-shadow: 0 1px 8px rgb(0,0,0);
  }

  .#tb-dv_list .selected, .#tbody-dv_list tbody .selected
  {
    background-color: #6ccbfb;
    color: #fff;
  }

  .selected-row {
    background-color: #6ccbfb !important;
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

  function toggleClass(el, className) {
    if (el.className.indexOf(className) >= 0) {
      el.className = el.className.replace(className,"");
    }
    else {
      el.className  += className;
    }
  }

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




  var table = $('#example').DataTable( {
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

      { "data": "p_lddap", "className": 'text-center' },
      { "data": "p_lddap_date", "className": 'text-center' },
      { "data": "dv_dv_number", "className": 'text-center' },
      { "data": "ob_serial_no", "className": 'text-center' },
      { "data": "supplier", "className": 'text-center' },
      { "data": "ob_purpose", "className": 'text-center', "visible": false },
      { "data": "ob_amount", "className": 'text-center', "visible": false },
      { "data": "dv_total", "className": 'text-center', "visible": false },
      { "data": "dv_net_amount", "className": 'text-center', "visible": false },
      { "data": "p_link", "className": 'text-center', "visible": false },
      { "data": "p_status", "className": 'text-center' },
      { "data": "action", "className": 'text-center' },

    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

  $('select').select2();

  $('#cform-lddap_date').datepicker({
    autoclose: true
  })

  $(document).on('click', '.btn-select', function(e){
    let tbody = $('#tbody-dv_list tr.selected-row');
    let params1 = [];
    let params2 = [];

    $.each(tbody, function(ii, dd){
      let dv_id = $(this).data('dv_id');
      let ob_id = $(this).data('ob_id');
      let obj = $(this).data('object');

      params1.push(dv_id);
      params2.push(ob_id); 
      
      generateDVItems(obj);
    });

    let path = 'Finance/route/generate_uacs_details.php?dvs='+params1+'&obs='+params2;
    $.get(path, function(data, success){
      $dd = JSON.parse(data);

      generateUACSItems($dd['uacs']);
      generateNTAItems($dd['ntas']);
    });
  })

   $(document).on('hidden.bs.modal', '#modal-dv_list', function(e) {
    let tbody = $('#tbody-dv_list tr');
    $.each(tbody, function(ii, dd){
      let $this = $(this);
      $this.removeClass('selected-row');
    });
  });

  function generateDVItems($data) {
    let item = '<tr>';
      item += '<td class="text-center">';
      item += '<input type="hidden" name="dvid[]" value="'+$data.dv_id+'">';
      item += '<input type="hidden" name="obid[]" value="'+$data.id+'">';
      item += '<span class="badge bg-info">'+$data.dv_number+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="badge bg-info" style="background-color:green;">'+$data.serial_no+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += $data.gross;
      item += '</td>';
      item += '<td class="text-center">';
      item += $data.total_deductions;
      item += '</td>';
      item += '<td class="text-center">';
      item += $data.net_amount;
      item += '</td>';
      item += '<td class="text-center">';
      item += '<div class="btn-group"><button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button></div>';
      item += '</td>';
      item += '</tr>';

    $('#dv-body').append(item);
  }

  function generateUACSItems($data) {
    $.each($data, function(key, item){
      let tr = '<tr>';
      tr += '<td class="text-center">';
      tr += '<span class="badge bg-info" style="background-color:green;">'+item.serial_no+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.source_code;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.ppa;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.uacs;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.amount;
      tr += '</tr>';
      
      $('#uacs-body').append(tr);
    });
  }

   function generateNTAItems($data) {
    $.each($data, function(key, item){
      let tr = '<tr>';
      tr += '<td class="text-center">';
      tr += '<span class="badge bg-info">'+item.dv_number+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.nta_number;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.particular;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.balance;
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += item.disbursed_amount;
      tr += '</td>';
      tr += '</tr>';
      
      $('#nta-body').append(tr);
    });
  }

  $(document).on('click', '.btn-row_remove', function(e){
    let row = $(this).closest('tr');
    row.remove();
  })

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
          row.child().css('background-color', '#9cc5dd', 'border', '1px solid #727299');
      }
  } );


</script>



