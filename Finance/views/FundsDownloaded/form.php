<?php require_once 'Finance/controller/CashController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Funds Downloaded History</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li class="active">History</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <?php include 'information.php'; ?>
    </div>

    <div class="row">
      <?php include 'entry.php'; ?>
    </div>

    <div class="row">
      <?php include 'history.php'; ?>
    </div>
  </section>
</div>

<style type="text/css">
  .help-tip{
    float: right;
    top: 18px;
    right: 18px;
    text-align: center;
    background-color: #BCDBEA;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 17px;
    line-height: 26px;
    cursor: default;
    margin-left: 0.3em;
  }

.help-tip:before{
    content:'?';
    font-weight: bold;
    color:#fff;
}

.help-tip:hover p{
    display:block;
    position: relative;
    transform-origin: 100% 0%;
    -webkit-animation: fadeIn 0.3s ease-in-out;
    animation: fadeIn 0.3s ease-in-out;

}

.help-tip p{    /* The tooltip */
    display: none;
    text-align: left;
    background-color:#1d7aa7;
    padding: 20px;
    width: 300px;
    /*position: absolute;*/
    border-radius: 3px;
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
    right: 3px;
    color: #FFF;
    font-size: 13px;
    line-height: 1.4;
    z-index: 999999999999!important;
    top: 6px;
}

.help-tip p:before{ /* The pointer of the tooltip */
    position: relative;
    content: '';
    width:0;
    height: 0;
    border:6px solid transparent;
    border-bottom-color:#1d7aa7;
    right:10px;
    top:-43px;
    z-index: 999999999999!important;
}

.help-tip p:after{ /* Prevents the tooltip from being hidden */
    width:100%;
    height:40px;
    content:'';
    /*position: absolute;*/
    z-index: 999999999999!important;
    top:-40px;
    left:0;
}

.help-tip2{
    float: right;
    top: 18px;
    right: 18px;
    text-align: center;
    background-color: #BCDBEA;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 17px;
    line-height: 26px;
    cursor: default;
    margin-left: 0.3em;
  }

.help-tip2:before{
    content:'?';
    font-weight: bold;
    color:#fff;
}

.help-tip2:hover p{
    display:block;
    position: relative;
    transform-origin: 100% 0%;
    -webkit-animation: fadeIn 0.3s ease-in-out;
    animation: fadeIn 0.3s ease-in-out;

}

.help-tip2 p{    /* The tooltip */
    display: none;
    text-align: left;
    background-color:#1d7aa7;
    padding: 20px;
    width: 300px;
    /*position: absolute;*/
    border-radius: 3px;
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
    right: 276px;
    color: #FFF;
    font-size: 13px;
    line-height: 1.4;
    z-index: 999999999999!important;
    top: 3.5px;
}

.help-tip2 p:before{ /* The pointer of the tooltip */
    position: relative;
    content: '';
    width:0;
    height: 0;
    border:6px solid transparent;
    border-bottom-color:#1d7aa7;
    right:-261px;
    top:-42px;
    z-index: 999999999999!important;
}

.help-tip2 p:after{ /* Prevents the tooltip from being hidden */
    width:100%;
    height:40px;
    content:'';
    /*position: absolute;*/
    z-index: 999999999999!important;
    top:-40px;
    left:0;
}

/* CSS animation */

@-webkit-keyframes fadeIn {
    0% { 
        opacity:0; 
        transform: scale(0.6);
    }

    100% {
        opacity:100%;
        transform: scale(1);
    }
}

@keyframes fadeIn {
    0% { opacity:0; }
    100% { opacity:100%; }
}

  .hiddentablerow{
    /*padding: 0px 0px !important;*/
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

  function format_number(n) {
    return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
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

  $(document).on('click', '.view_entry', function(){
    let row = $(this).closest('tr');
    let next_row = row.next('tr');

    if ($(this).attr('aria-expanded') == "false" ) {
      next_row.addClass('hidden');
      row.css('background-color', '');
      tdf.html('');
    } else {
      next_row.removeClass('hidden');
      row.css('background-color', '#ffe784');
    }
  });

//   $(document).on('click', '.view_entry', function() {
//     let child_tr = $(this).closest('tr');
//     $(this).child.show();
    
//     $(this).toggleClass("open").next(".tr").toggleClass("open");

//     // if ( $(this).attr('aria-expanded') == "true" ) {
//     //     child_tr.removeClass('hidden');
//     //     $(this).children().css('background-color', '#FFF');
//     // } else {
//     //     child_tr.addClass('hidden');
//     //     $(this).children().css('background-color', '#DDD');
//     // }
// });

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
    let item = '<tr class="main_dv_'+$data.dv_id+'">';
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
      // let tr = '<tr onclick="'+toggleClass(this,'selected selected-row')+'" class="dv-'+item.dv_id+'-row">';
      let tr = '<tr class="dv-'+item.dv_id+'-row ne-'+item.ne_id+'-row" id="'+item.dv_id+'">';
      tr += '<td class="text-center">';
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
    let main_dv_id = '';
    let ne_id = $(this).data("id");
    let ob_id = $(this).data("ob_id");
    $('.ne-'+ne_id+'-row').remove();

    a_dvs_id += $(this).data("dv_id")+',';
    dvs_id = a_dvs_id.replace(/,\s*$/, "");
    dvs_id = JSON.parse("[" + dvs_id + "]");
    last_dv = dvs_id[dvs_id.length - 2]

    $('table > #nta-body > tr').each(function() {
      main_dv_id += this.id+',';
    })
    main_dv_id = main_dv_id.replace(/,\s*$/, "");
    var dv_array = JSON.parse("[" + main_dv_id + "]");

    if (dv_array.includes(last_dv) === false) 
    {
      var qq = $('.main_dv_'+last_dv).remove();

      if(qq['length'] == 1)
      {
        $('.ob-'+ob_id+'-row').remove();
      }
    }


    calculate_values();

  });


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
    var x_total_gross = format_number(total_gross);
    // $('.total_dv_gross').text('₱'+total_gross+'.00');
    $('.total_dv_gross').val(x_total_gross);
    
    $('.p_total_deductions').each(function(){
        total_dv_deduction += parseFloat(this.value);
    });
    $('.total_dv_deduction').text('₱'+total_dv_deduction+'.00');
    
    $('.p_net_amount').each(function(){
        total_net_amount += parseFloat(this.value);
    });
    $('.total_dv_net').text('₱'+total_net_amount+'.00');
    
    $('.p_amount').each(function(){
        total_ob_amount += parseFloat(this.value);
    });
    $('.total_ob_amount').text('₱'+total_ob_amount+'.00');
    
    $('.p_nta_amount').each(function(){
        total_nta_amount += parseFloat(this.value);
    });
    $('.total_nta_amount').text('₱'+total_nta_amount+'.00');
    
    $('.p_nta_balance').each(function(){
        total_nta_balance += parseFloat(this.value);
    });
    $('.total_nta_balance').text('₱'+total_nta_balance+'.00');
    
    $('.p_nta_disbursed_amount').each(function(){
        total_disbursed_amount += parseFloat(this.value);
    });
    $('.total_disbursed_amount').text('₱'+total_disbursed_amount+'.00');
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



