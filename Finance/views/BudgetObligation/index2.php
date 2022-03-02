<?php require_once 'Finance/controller/ObligationController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>ORS/BURS</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li>Budget Section</li>
      <li class="active">ORS/BURS</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
    	<?php include 'tiles/tile.php'; ?>
    </div>
    <div class="row">
      <div class="col-md-6">
      <?php include 'tiles/purchase_request.php'; ?>
      </div>
      
      <div class="col-md-6">
        <?php include 'tiles/purchase_order.php'; ?>
        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-6">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="budget_obligation.php">Normal &nbsp;<small class="label pull-right bg-blue"><?= $count_normal; ?></small></a></li>
              <li class="active"><a type="button" data-toggle="tab"><strong>Download of Funds</strong></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
              </div>
              <div class="tab-pane active" id="tab_2">
                <?php include 'tiles/table_df.php'; ?>
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
</div>

<?php include 'modal_purchase_order.php'; ?>
<?php include 'modal_purchase_request.php'; ?>
<?php include 'modal_delete.php'; ?>
<?php include 'modal_return.php'; ?>
<?php include 'modal_pr_availability_code.php'; ?>
<?php include 'modal_pr_availability_code2.php'; ?>

<style type="text/css"><?php include 'custom_css.css'; ?></style>
<script type="text/javascript">

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>
  
  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>Date Received</b></td>';
    tb += '<td width="12%"><b>Date Obligated</b></td>';
    tb += '<td width="12%"><b>Date Returned</b></td>';
    tb += '<td width="12%"><b>Date Released</b></td>';
    tb += '<td width="20%"><b>PO Number</b></td>';
    tb += '<td><b>Remarks</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.date_received+'</td>';
    tb += '<td class="text-center">'+data.date_obligated+'</td>';
    tb += '<td class="text-center">'+data.date_returned+'</td>';
    tb += '<td class="text-center">'+data.date_released+'</td>';
    tb += '<td class="text-center">'+data.ponum+'</td>';
    tb += '<td class="text-center">'+data.remarks+'</td>';
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
        "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
      },
      { "data": "type", "width": "8%", "className": 'text-center' },
      { "data": "date_submitted", "width": "8%", "className": 'text-center' },
      { "data": "date_created", "width": "8%", "className": 'text-center' },
      { "data": "ors_number", "width": "10%", "className": 'text-center' },
      { "data": "payee", "width": "20%" },
      { "data": "particulars", "width": "15%" },
      { "data": "amount", "width": "10%", "className": 'text-center' },
      { "data": "status", "width": "10%", "className": 'text-center' },
      { "data": "action", "width": "10%", "sortable": false, "className": 'text-center' },
      { "data": "date_received", "visible": false },
      { "data": "date_obligated", "visible": false },
      { "data": "date_returned", "visible": false },
      { "data": "date_released", "visible": false },
      { "data": "ponum", "visible": false  },   
      { "data": "remarks", "visible": false },
    ],"order": [[1, 'asc']],
    'searching'   : true,
  });

  $(document).on('click', '.btn-availability_code', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = row.find('td:eq(0)').html();

    let modal = $('#modal_pr_availability_code');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');
  
    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);
  })

  $(document).on('click', '.btn-availability_code2', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = row.find('td:eq(0)').html();

    let modal = $('#modal_pr_availability_code2');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');
  
    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);
  })

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

  $(document).on('click', '.btn-return', function(e){
    let row = $(this).closest('tr');
    let id = $(this).data('id');
    let code = $(this).data('ors_num');

    let modal = $('#modal_return_obligation');
    let modal_sourceID = modal.find('#cform-id');
    let modal_sourceCodeTxt = modal.find('#source_code');

    modal_sourceID.val(id);
    modal_sourceCodeTxt.html(code);

    $('#modal_return_obligation').modal('show');
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


</script>