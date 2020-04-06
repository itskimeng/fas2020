<?php 
session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$division = $_SESSION['division'];
}
?>
<!DOCTYPE html>
<html>

<title>FAS Dashboard</title>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="_includes/sweetalert.css">
  <link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
  <link href="_includes/fontawesome.css" rel="stylesheet"/>
 

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
  include('sidebar.php'); 
?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="home.php"><i class=""></i> Home</a></li>
        <li class="active">Technical Assistance Request Form</li>
      </ol>
      <br>
      <br>
        <?php include('_tableTA.php');?>
    </section>
  </div>
 
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="_includes/sweetalert.min.js"></script>
<script src="_includes/sweetalert2.min.js"></script>
<script>


$(document).ready(function() {
  $('.select2').on('change', function()
      {
        swal({
          title: "Are you sure you want to save?",
          text: "Control No:",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes',
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        }, function () {
        
      });
    });
var action = '';
    
    var table = $('#example').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,   aLengthMenu: [ [10, 10, 20, -1], [10, 10, 20, "All"] ],
      "bPaginate": false,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "dom": '<"top"lf>rt<"bottom"p><"clear">',




        "processing": true,
        "serverSide": false,
        "ajax": "DATATABLE/server_processing.php",
        "order": [[ 1, "desc" ]],
        "columnDefs": [ {
        "targets": 11,
        "render": function ( data, type, row, meta ) {  
        if(row[3] == 'Jan 01, 1970' || row[0] == '0000-00-00')
        {
          $dateFormat = '';
          // return $dateFormat;
        }
        if(row[10] == '<span class="badge badge-pill" style = "background-color:red;">Submitted</span>')
        {
          
          if(<?php echo $division?> == 16)
          {
            action = '<a class = "btn btn-info btn-xs"   id = "sweet-14"> <i class="fa fa-check-circle"></i>Receive</a>';          
          
          }else{
            action = '';
          
          }
        }
        else if (row[10] == '<span class="badge badge-pill" style = "background-color:orange;">Received</span>')
        {
          action = 'ON GOING';

        }
        else if(row[10] == '<span class="badge badge-pill" style = "background-color:blue;">For action</span>')
        {
          if(<?php echo $division?> == 16)
          {
            action = '<a class = "btn btn-primary btn-xs"  id = "edit" style = "width:100%;"> <i class="fa">&#xf044;</i> Edit</a>';          

          }else{
            action = '<a class = "btn btn-info btn-xs"  id = "view" style = "width:100%;" > <i class="fa" >&#xf06e;</i>&nbsp;View</a>';          


          }
        
        }
        else if (row[10] == '<span class="badge badge-pill" style = "background-color:green;">Completed</span>')
        { 
          if(<?php echo $division?> == 16)
          {
          action = '<a class = "btn btn-success btn-xs"  id = "edit" style = "width:100%;"> <i class="fa info-circle"></i>Resolve</a>';          
          }else{
          action = '<a class = "btn btn-success btn-xs"  id = "sweet-15"> <i class="fa fa-star" aria-hidden="true"></i>&nbsp;Rate Service</a>';          

            // <i style = "font-size:20px;color:#2196F3;tex-align:center;" class="fa fa-print" id = "view" ></i>
          }

        }
        
        return action;
    }
  } ]

    } );
  

    $('#example tbody').on( 'click', '#edit', function () {
      var data = table.row( $(this).parents('tr') ).data();
      window.location="_editRequestTA.php?division=<?php echo $_GET['division'];?>&id="+data[0];
    } );

    $('#example tbody').on( 'click', '#sweet-14', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var a = data[0];

        swal({
            title: "Are you sure you want to recieved this request?",
            text: "Control No:"+data[0],
            type: "info",
            showCancelButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            $.ajax({
              url:"_ticketReleased.php",
              method:"POST",
              data:{
                  id:data[0],
                  option:"released"
              },
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Record saved successfully!");
                  }, 3000);
                  window.location = "allTickets.php?division=<?php echo $_GET['division']?>&ticket_id="+a;
              }
            });
        });
    });

    $('#example tbody').on( 'click', '#view', function () {
      var data = table.row( $(this).parents('tr') ).data();
      window.location="JASPER/sample/viewTA.php?id="+data[0];
    });
    
    $('#example tbody').on( 'click', '#sweet-15', function () {
      var data = table.row( $(this).parents('tr') ).data();
      window.location="rateService.php?division=<?php echo $_GET['division'];?>&id="+data[0];
    });
    
});


</script>


</body>
</html>
