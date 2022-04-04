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
        <?php include 'information.php'; ?>
      </div>
      <div class="row">
        <?php include 'details.php'; ?>
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
    //for single selection
    $('#tbody-dv_list tr').removeClass(className);
    if (el.className.indexOf(className) >= 0) {
      el.className = el.className.replace(className,"");
    }
    else {
      el.className  += className;
    }
  }

  function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
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
  var ne_id = 0;
  $(document).on('click', '.btn-select', function(e){
    let tbody = $('#tbody-dv_list tr.selected-row');
    //for single selection
    $('#nta-body tr').remove();
    $.each(tbody, function(ii, dd){
      ne_id = $(this).data('ne_id');
    });

    let path = 'Finance/route/generate_uacs_details.php?ne_id='+ne_id;
    $.get(path, function(data, success){
      ne = JSON.parse(data);
      generateNTAItems(ne);
    });
  })

   $(document).on('hidden.bs.modal', '#modal-dv_list', function(e) {
    let tbody = $('#tbody-dv_list tr');
    $.each(tbody, function(ii, dd){
      let $this = $(this);
      $this.removeClass('selected-row');
    });
  });

   function generateNTAItems($data) {
    $.each($data, function(key, item){
      let tr = '<tr class="dv-'+item.dv_id+'-row ne-'+item.ne_id+'-row" id="'+item.dv_id+'">';
      tr += '<td class="text-center">';
      tr += '<span class="badge bg-green">'+item.dv_number+'</span>';
      tr += '<input name="ne_id[]" type="hidden" value="'+item.ne_id+'">';
      tr += '<input name="dvid" type="hidden" value="'+item.dv_id+'">';
      tr += '<input name="obid[]" type="hidden" value="'+item.ob_id+'">';
      tr += '<input name="ob_is_dfunds" type="hidden" value="'+item.ob_is_dfunds+'">';
      tr += '<input name="ob_supplier" type="hidden" value="'+item.ob_supplier+'">';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="nta_number">'+item.nta_number+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="nta_particular">'+item.nta_particular+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="nta_amount">'+item.nta_amount+'</span>';
      tr += '<input name="nta_amount" type="hidden" value="'+item.nta_amount2+'">';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="nta_balance">'+item.nta_balance+'</span>';
      tr += '<input name="nta_balance" type="hidden" value="'+item.nta_balance1+'">';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="ne_disbursed_amount">'+item.ne_disbursed_amount+'</span>';
      tr += '<input name="disbursed_amount" type="hidden" value="'+item.disbursed_amount+'">';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<button type="button" class="btn btn-sm btn-danger" id="btn_remove_nta" data-id="'+item.ne_id+'" data-dv_id="'+item.dv_id+'" data-ob_id="'+item.obligation_id+'"><i class="fa fa-trash"></i></button>';
      tr += '</td>';
      tr += '</tr>';
      
      $('#nta-body').append(tr);
    });
  }

  var a_dvs_id = '';
  var last_dv = '';
  $(document).on('click', '#btn_remove_nta', function(e){
    let ne_id = $(this).data("id");
    $('.ne-'+ne_id+'-row').remove();
  });


</script>



