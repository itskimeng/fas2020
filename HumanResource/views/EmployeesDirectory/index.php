<?php require_once 'HumanResource/controller/EmployeesDirectoryController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Employees Directory</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Human Resource</a></li>
      <li class="active">Employees Directory</li>
    </ol> 
  </section>
    
  <section class="content">
    <div class="row">
      <?php include 'filter.php'; ?>
    </div>

    <div class="row">
      <?php include 'table2.php'; ?>
    </div>
  </section>
</div>

<?php include('modal_export.php'); ?>

<style type="text/css">

   th {
    background-color: #367fa9 !important; 
    color: white;
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

  .delete_modal_header {
  text-align: center;
  background-color: #f15e5e;
  color: white;
  padding:5% !important;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  }

  * {
      box-sizing: border-box;
    }

    .fade-scale {
      transform: scale(0);
      opacity: 0;
      -webkit-transition: all .25s linear;
      -o-transition: all .25s linear;
      transition: all .25s linear;
    }

    .fade-scale.in {
      opacity: 1;
      transform: scale(1);
    }
</style>

<script type="text/javascript">

  function format ( data ) {
    let tb = '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>BIRTHDAY</b></td>';
    tb += '<td width="12%"><b>AGE</b></td>';
    tb += '<td width="12%"><b>GENDER</b></td>';
    tb += '<td width="12%"><b>MOBILE NO.</b></td>';
    tb += '<td width="20%"><b>PERSONAL EMAIL</b></td>';
    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.bday+'</td>';
    tb += '<td class="text-center">'+data.age+'</td>';
    tb += '<td class="text-center">'+data.gender+'</td>';
    tb += '<td class="text-center">'+data.mobile_no+'</td>';
    tb += '<td class="text-center">'+data.email+'</td>';
    tb += '</tr>';

    return tb;
  }

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
  
  <?php
      // toastr output & session reset
      session_start();
      
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.success("Transaction Updated", "Success!")';
          unset($_SESSION['toastr']);
      }
  ?>

  $('.year, .month, .office, .m-office, .m-year, .m-month').select2({
    allowClear: true,
    width: '100%'
  }); 

  <?php if (in_array($username, $sys_admins)): ?> 
    var table = $('#example2').DataTable( {
      'lengthChange': true,
      "lengthMenu": [20, 25],
      "columns": [
        { "data": "id", "visible": false },
        {
          "className"     : 'details-control text-center',
          "orderable"     : false,
          "sortable"      : false,
          "data"          : null,
          "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
        },
        { "data": "fullname", "width": "20%", "className": 'text-center' },
        { "data": "office", "width": "20%", "className": 'text-center' },
        { "data": "position", "width": "20%", "className": 'text-center' },
        { "data": "office_email", "width": "20%", "className": 'text-center' },
        { "data": "action", "width": "20%", "sortable": false, "className": 'text-center' },
        { "data": "bday", "visible": false },
        { "data": "gender", "visible": false },
        { "data": "age", "visible": false },
        { "data": "mobile_no", "visible": false },
        { "data": "email", "visible": false },

      ],"order": [[1, 'asc']],
      'searching'   : true,
    });
  <?php else: ?>
    var table = $('#example2').DataTable( {
      'lengthChange': true,
      "lengthMenu": [20, 25],
      "columns": [
        { "data": "id", "visible": false },
        {
          "className"     : 'details-control text-center',
          "orderable"     : false,
          "sortable"      : false,
          "data"          : null,
          "width"         : "5%",
          "defaultContent": '<a type="button" class="btn btn-xs btn-primary" style="border-radius:50%"><span class="fa fa-plus"></span></a>',
        },
        { "data": "fullname", "width": "20%", "className": 'text-center' },
        { "data": "office", "width": "20%", "className": 'text-center' },
        { "data": "position", "width": "20%", "className": 'text-center' },
        { "data": "office_email", "width": "20%", "className": 'text-center' },
        { "data": "bday", "visible": false },
        { "data": "gender", "visible": false },
        { "data": "age", "visible": false },
        { "data": "mobile_no", "visible": false },
        { "data": "email", "visible": false },

      ],"order": [[1, 'asc']],
      'searching'   : true,
    });
  <?php endif ?>


  // $(document).on('change', '#cform-month, #cform-year', function() {
  //    document.forms['det_form'].submit();
  // });

  // Add event listener for opening and closing details
  $('#example2 tbody').on('click', 'td.details-control', function () {

    let tr = $(this).closest('tr');
    let row = table.row( tr );
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
  });

  $(document).on('click', '.btn-export', function(e){
    let office = $('#cform-office').val();
    let path = 'HumanResource/route/export_employee.php?office='+office;

    $.get(path, function(item, dd) {

    });
  })

  $('.link').click(function(){

    var f = $(this);
    var id = f.data('id');

    var month = $('#month').val();
    var year = $('#year').val();
    var username = $('#username').val();

    window.location = 
    'export_dtr.php?month='+month+'&year='+year+'&username='+username;
  });

  $("#uploadForm").on('submit', function(e){
    e.preventDefault();

    let formData = new FormData();
    let office = $('#cform-office2').val();
    let month = $('#cform-month').val();
    let year = $('#cform-year').val();

    formData.append('office', office);
    formData.append('month', month);
    formData.append('year', year);

    window.location = 'HumanResource/route/export_dtrs.php?month='+month+'&year='+year+'&office='+office;
  })


</script>
