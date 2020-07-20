<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:index.php');
  }else{
    error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
  $_SESSION['unique_id'] = 1;
  
  }
include('db.class.php'); // call db.class.php
$mydb = new db(); // create a new object, class db()

?>

<!DOCTYPE html>
<html>
<head>
  <title>Procurement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<body>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel panel-defasult">
          <div class="box-body"> 
          
            <div>
                <h1>Monitoring of Travel Claim Request</h1><br>
           <a href = "CreateTravelClaim.php?ro=&ui=1&username=<?php echo $username;?>" ><button class = "btn btn-md btn-success">Create</button></a><br><br><br>
                
            </div>
            
     
            
         
        
              <table id="example" class="table table-striped table-bordered table-responsive" style="width:;background-color: white;">
                    <thead>
                        <th>NO</th>
                        <th>EMPLOYEE NAME</th>
                        <th>RO/OT/OB</th>
                        <th>NO. OF TRAVEL DAYS</th>

                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>ORIGIN</th>
                        <th>DESTINATION</th>
                        <th>DISTANCE</th>
                        <th>VENUE</th>

                        
                        <th style = "text-align:center;max-width:20%;">ACTION</th>
                    </thead>

                </table>
      
<!-- 

      <!-- jQuery 3 -->
      <!-- Bootstrap 3.3.7 -->
      <!-- Select2 -->
    

      <script src="jquery.min.js"></script>

</div>
</div>


<div class="panel-footer"></div>
</div>
</div>

</body>
</html>
<script>
          $(document).ready(function() {
            
        
              var action = '';
              var table = $('#example').DataTable( {
        
                'scrollX'     : true,
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
                  "processing": true,
                  "serverSide": false,
                  "ajax": "DATATABLE/travel_claim.php"
                  ,
                  "columnDefs": [ {
                      "targets":10,
                      "render": function (data, type, row, meta ) {  
                      action = "<button class = 'btn btn-sm btn-success' id = 'view'><i class = 'fa fa-eye'></i>View</button>";
                      // &nbsp;<button class = 'btn btn-md btn-primary'><i class = 'fa fa-edit'></i>Edit</button>&nbsp;<button class = 'btn btn-md btn-danger'><i class = 'fa fa-trash'></i> Delete</button>
                      return action;
                      }
                  }]
                

              } );

              
              $('#example tbody').on( 'click', '#view', function () {
                var data = table.row( $(this).parents('tr') ).data();
                window.location="ViewTravelClaim.php?emp_name="+data[1]+"&ro="+data[2];
              } );
          });
              </script>
