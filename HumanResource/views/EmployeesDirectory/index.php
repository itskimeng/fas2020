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

  .swal2-icon.swal2-warning
  {
    font-size : 20px !important;
  }


</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js"></script>


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
    tb += '<td class="text-center">'+data.generation+'</td>';
    tb += '<td class="text-center">'+data.age+'</td>';
    tb += '<td class="text-center">'+data.gender+'</td>';
    tb += '<td class="text-center">'+data.mobile_no+'</td>';
    tb += '<td class="text-center">'+data.email+'</td>';
    tb += '</tr>';

    tb += '<table class="table table-bordered" cellpadding="9">';
    tb += '<tr style="text-align: center; background-color: #f39c12; color: white;">';
    tb += '<td width="12%"><b>GENERATION</b></td>';
    tb += '<td width="12%"><b>AWARDS RECEIVED</b></td>';
    tb += '<td width="12%"><b>HIGHEST EDUCATIONAL ATTAINMENT</b></td>';
    tb += '<td width="12%"><b># OF CHILDREN - BELOW 18</b></td>';
    tb += '<td width="20%"><b># OF CHILDREN W/ SPECIAL NEEDS</b></td>';
    tb += '<td width="20%"><b> ARE YOU A MEMBER OF ANY INDIGENOUS GROUP</b></td>';
    tb += '<td width="20%"><b>ARE YOU PWD</b></td>';
    tb += '<td width="20%"><b>ARE YOU A SOLO PARENT</b></td>';
    tb += '<td width="20%"><b>W/ CHILDREN 6YRS AND BELOW</b></td>';
    tb += '<td width="20%"><b>YEARS IN THE DEPARTMENT</b></td>';
    tb += '<td width="20%"><b>WITH EXISTING GYNECOLOGICAL DISORDER?</b></td>';
    tb += '<td width="20%"><b>WITH EXISTING HEALTH ISSUES</b></td>';

    

    tb += '</tr>';
    tb += '<tr>';
    tb += '<td class="text-center">'+data.generation+'</td>';
    tb += '<td class="text-center">'+data.awards+'</td>';
    tb += '<td class="text-center">'+data.hea+'</td>';
    tb += '<td class="text-center">'+data.q1+'</td>';
    tb += '<td class="text-center">'+data.q2+'</td>';
    tb += '<td class="text-center">'+data.q3+'</td>';
    tb += '<td class="text-center">'+data.q4+'</td>';
    tb += '<td class="text-center">'+data.q5+'</td>';
    tb += '<td class="text-center">'+data.q6+'</td>';
    tb += '<td class="text-center">'+data.years_inservice+'</td>';
    tb += '<td class="text-center">'+data.q7+'</td>';
    tb += '<td class="text-center">'+data.q8+'</td>';

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
    $('#example3').DataTable();

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
        { "data": "emp_c", "width": "5%", "className": 'text-center' },
        { "data": "fullname", "width": "24%", "className": 'text-center' },
        { "data": "office", "width": "18%", "className": 'text-center' },
        { "data": "position", "width": "20%", "className": 'text-center' },
        <?php echo isset($_GET['pwd']) ? '{ "data": "pwd", "width": "20%", "className": "text-center" },' : null; ?>
        <?php echo isset($_GET['health_issues']) ? '{ "data": "health_issues", "width": "20%", "className": "text-center" },' : null; ?>
        <?php echo isset($_GET['solo']) ? '{ "data": "solo", "width": "20%", "className": "text-center" },' : null; ?>
        
        { "data": "office_email", "width": "18%", "className": 'text-center' },
        { "data": "percentage", "width": "5%", "className": 'text-center' },
        { "data": "action", "width": "30%", "sortable": false, "className": 'text-center' },
        { "data": "bday", "visible": false },
        { "data": "gender", "visible": false },
        { "data": "age", "visible": false },
        { "data": "mobile_no", "visible": false },
        { "data": "email", "visible": false },
        { "data": "generation", "visible": false },
        { "data": "awards", "visible": false },
        { "data": "hea", "visible": false },
        { "data": "q1", "visible": false },
        { "data": "q2", "visible": false },
        { "data": "q3", "visible": false },
        { "data": "q4", "visible": false },
        { "data": "q5", "visible": false },
        { "data": "q6", "visible": false },
        { "data": "years_inservice", "visible": false },
        { "data": "q7", "visible": false },
        { "data": "q8", "visible": false },
        


      ],"order": [[7, 'desc']],
      'searching'   : true,
    });
  <?php else: ?>
    $('#example3').DataTable();

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
        { "data": "emp_c", "width": "5%", "className": 'text-center' },
        { "data": "fullname", "width": "24%", "className": 'text-center' },
        { "data": "office", "width": "18%", "className": 'text-center' },
        { "data": "position", "width": "20%", "className": 'text-center' },
        { "data": "office_email", "width": "18%", "className": 'text-center', "sortable" : false },
        { "data": "percentage", "width": "5%", "className": 'text-center' },
        
        { "data": "bday", "visible": false },
        { "data": "gender", "visible": false },
        { "data": "age", "visible": false },
        { "data": "mobile_no", "visible": false },
        { "data": "email", "visible": false },
        { "data": "generation", "visible": false },
        { "data": "awards", "visible": false },
        { "data": "hea", "visible": false },
        { "data": "q1", "visible": false },
        { "data": "q2", "visible": false },
        { "data": "q3", "visible": false },
        { "data": "q4", "visible": false },
        { "data": "q5", "visible": false },
        { "data": "q6", "visible": false },
        { "data": "years_inservice", "visible": false },

        { "data": "q7", "visible": false },
        { "data": "q8", "visible": false },

      ],"order": [[7, 'desc']],
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

  // $("#uploadForm").on('submit', function(e){
  //   e.preventDefault();

  //   let formData = new FormData();
  //   let office = $('#cform-office2').val();
  //   let month = $('#cform-month').val();
  //   let year = $('#cform-year').val();

  //   formData.append('office', office);
  //   formData.append('month', month);
  //   formData.append('year', year);

  //   window.location = 'HumanResource/route/export_dtrs.php?month='+month+'&year='+year+'&office='+office;
  // })

  function blockEmployee(employee_id)
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "Block User!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          type: "GET",
          url: 'HumanResource/route/block_employee.php?emp_id='+employee_id,
          success: function(response){

            Swal.fire({
              title: 'Success!',
              text: "The user was successfully blocked.",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Confirm'
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          }
        });



      }
    })
  }

  function acceptEmployee(employee_id)
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "Approve User!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          type: "GET",
          url: 'HumanResource/route/accept_employee.php?emp_id='+employee_id,
          success: function(response){

            Swal.fire({
              title: 'Success!',
              text: "The user was successfully approved.",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Confirm'
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          }
        });



      }
    })
  }

  function deleteEmployee(employee_id)
  {
    Swal.fire({
      title: 'Are you sure?',
      text: "Delete User!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          type: "GET",
          url: 'HumanResource/route/delete_employee.php?emp_id='+employee_id,
          success: function(response){

            Swal.fire({
              title: 'Success!',
              text: "The user was successfully deleted.",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Confirm'
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })

          }
        });



      }
    })
  }





</script>
