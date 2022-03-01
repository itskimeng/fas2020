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

      $('.dv-'+dv_id).remove();

      params1.push(dv_id);
      params2.push(ob_id); 
      
      generateDVItems(obj);
    });

    let path = 'Finance/route/generate_uacs_details.php?dvs='+params1+'&obs='+params2;
    $.get(path, function(data, success){
      $dd = JSON.parse(data);

      generateUACSItems($dd['uacs']);
      generateNTAItems($dd['ntas']);
      calculate_values();
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
      item += '<input class="dv_id" type="hidden" name="dvid[]" value="'+$data.dv_id+'">';
      item += '<input class="ob_id" type="hidden" name="obid[]" value="'+$data.id+'">';
      item += '<input class="p_gross" type="hidden" value="'+$data.p_gross+'">';
      item += '<input class="p_total_deductions" type="hidden" value="'+$data.p_total_deductions+'">';
      item += '<input class="p_net_amount" type="hidden" value="'+$data.p_net_amount+'">';
      item += '<span class="badge bg-info dv_number">'+$data.dv_number+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="badge bg-info serial_no" style="background-color:green;">'+$data.serial_no+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += $data.po_code;
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="gross">'+$data.gross+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="total_deductions">'+$data.total_deductions+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="net_amount">'+$data.net_amount+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<div class="btn-group"><button type="button" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-close"></i> Remove</button></div>';
      item += '</td>';
      item += '</tr>';

    $('#dv-body').append(item);
  }

  function generateUACSItems($data) {
    $.each($data, function(key, item){
      let tr = '<tr class="ob-'+item.ob_id+'-row">';
      tr += '<td class="text-center">';
      tr += '<input class="p_amount" type="hidden" value="'+item.p_amount+'">';
      tr += '<span class="badge bg-info" style="background-color:green;">'+item.serial_no+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="source_code">'+item.source_code+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="ppa">'+item.ppa+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="uacs">'+item.uacs+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="amount">'+item.amount+'</span>';
      tr += '</tr>';
      
      $('#uacs-body').append(tr);
    });
  }

   function generateNTAItems($data) {
    $.each($data, function(key, item){
      let tr = '<tr class="dv-'+item.dv_id+'-row">';
      tr += '<td class="text-center dv-'+item.dv_id+'-row">';
      tr += '<span class="badge bg-info">'+item.dv_number+'</span>';
      // tr += '<span class="badge bg-info">'+item.dv_id+'</span>';
      tr += '<input class="p_nta_amount" type="hidden" value="'+item.p_nta_amount+'">';
      tr += '<input class="p_nta_balance" type="hidden" value="'+item.p_nta_balance+'">';
      tr += '<input class="p_nta_disbursed_amount" type="hidden" value="'+item.p_nta_disbursed_amount+'">';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="nta_number">'+item.nta_number+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="particular">'+item.particular+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="amount">'+item.amount+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="balance">'+item.balance+'</span>';
      tr += '</td>';
      tr += '<td class="text-center">';
      tr += '<span class="disbursed_amount">'+item.disbursed_amount+'</span>';
      tr += '</td>';
      tr += '</tr>';
      
      $('#nta-body').append(tr);
    });
  }

  var total_gross = 0;
  var total_total_deductions = 0;
  var total_net_amount = 0;
  var total_nta_amount = 0;
  var total_nta_balance = 0;
  var total_disbursed_amount = 0;
  var total_ob_amount = 0;
  var total_dv_gross = 0;
  var total_dv_deduction = 0;
  var total_dv_net = 0;

  function calculate_values()
  {
    total_gross = 0;
    total_total_deductions = 0;
    total_net_amount = 0;
    total_nta_amount = 0;
    total_nta_balance = 0;
    total_disbursed_amount = 0;
    total_ob_amount = 0;
    total_dv_gross = 0;
    total_dv_deduction = 0;
    total_dv_net = 0;

    $('.p_gross').each(function(){
        total_gross += parseFloat(this.value);
    });
    $('.total_dv_gross').text('P'+total_gross+'.00');
    
    $('.p_total_deductions').each(function(){
        total_dv_deduction += parseFloat(this.value);
    });
    $('.total_dv_deduction').text('P'+total_dv_deduction+'.00');
    
    $('.p_net_amount').each(function(){
        total_net_amount += parseFloat(this.value);
    });
    $('.total_dv_net').text('P'+total_net_amount+'.00');
    
    $('.p_amount').each(function(){
        total_ob_amount += parseFloat(this.value);
    });
    $('.total_ob_amount').text('P'+total_ob_amount+'.00');
    
    $('.p_nta_amount').each(function(){
        total_nta_amount += parseFloat(this.value);
    });
    $('.total_nta_amount').text('P'+total_nta_amount+'.00');
    
    $('.p_nta_balance').each(function(){
        total_nta_balance += parseFloat(this.value);
    });
    $('.total_nta_balance').text('P'+total_nta_balance+'.00');
    
    $('.p_nta_disbursed_amount').each(function(){
        total_disbursed_amount += parseFloat(this.value);
    });
    $('.total_disbursed_amount').text('P'+total_disbursed_amount+'.00');
  }//end calculate_values


  calculate_values();

  $(document).on('click', '.btn-row_remove', function(e){
    let row = $(this).closest('tr');
    let dv_id = row.find('.dv_id').val();
    let ob_id = row.find('.ob_id').val();
    let dv_number = row.find('.dv_number').text();
    let serial_no = row.find('.serial_no').text();
    let gross = row.find('.gross').text();
    let total_deductions = row.find('.total_deductions').text();
    let net_amount = row.find('.net_amount').text();

    var row_nta=$('.dv-'+dv_id+'-row').closest("tr"); 

    let nta_amount = row_nta.find('.amount').text();
    let balance = row_nta.find('.balance').text();
    let disbursed_amount = row_nta.find('.disbursed_amount').text();

    var row_ob=$('.ob-'+ob_id+'-row').closest("tr"); 
    let ob_amount = row_ob.find('.amount').text();

    //------------------------------------
    let item = '<tr>';
      item += '<td class="text-center">';
      item += '<span class="badge bg-info dv_number">'+dv_number+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span>'+serial_no+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="gross">'+gross+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="total_deductions">'+total_deductions+'</span>';
      item += '</td>';
      item += '<td class="text-center">';
      item += '<span class="net_amount">'+net_amount+'</span>';
      item += '</td>';
      item += '</tr>';

    $('#tbody-dv_list').append(item);

    //-------------------------------------

    $('.dv-'+dv_id+'-row').remove();
    $('.ob-'+ob_id+'-row').remove();
    row.remove();
    calculate_values();
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



