$(document).ready(function() {
            
        
    var action = '';
    var username = '<?php echo $username;?>';
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
            "width": "22%", "targets": 10,

            "render": function (data, type, row, meta ) {  
              if(row[1] == "<?php echo $_SESSION['complete_name2'];?>" || username == 'masacluti'){
                action = "<button  class = 'btn btn-md btn-success' id = 'view' style = 'font-family:Arial'><i class = 'fa fa-eye'></i>View</button> &nbsp;<button class = 'btn btn-md btn-primary' style = 'font-family:Arial' id = 'edit'><i class = 'fa fa-edit'></i>Edit</button>&nbsp;<button class = 'btn btn-md btn-danger' id = 'delete' style = 'font-family:Arial;'><i class = 'fa fa-trash'></i> Delete</button>&nbsp;<button  class = 'btn btn-md btn-warning' id = 'export' style = 'font-family:Arial'><i class = 'fa fa-fw fa-download'></i>Export</button>  ";
              }else{
                action = "<center><button  class = 'btn btn-md btn-success' id = 'view' style = 'font-family:Arial'><i class = 'fa fa-eye'></i>View</button></center>";
              }
                return action;
            }
        }]
      

    } );



    // when users click view button
    $('#example tbody').on( 'click', '#view', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var RO = data[2];
      var username = data[1];
      $('#exampleModal').modal({ keyboard: false });
      $('#or').val(data[2]);
      $.ajax({
        type: 'POST',
        url: 'testtime.php',
        data: (
          {
            ro:RO,
            uname:username,
            action:"view",
          }),
        cache: false,
        success: function(data)
        {
          $('#results').html(data);

        }
      });
      $.ajax({
        type: 'POST',
        url: 'getTable1.php',
        data: ({
          "username":username,
          "purpose":RO
          }),
        cache: false,
        success: function(data2)
        {
          $('#table1').html(data2);

        }
      });
      $.ajax({
        type: 'POST',
        url: 'getTable3.php',
        data: ({
          "username":username,
          "purpose":RO,
          "action":"view",
          }),
        cache: false,
        success: function(data3)
        {
          $('#table3').html(data3);

        }
      });
    });
    // when users click edit button
    $('#example tbody').on( 'click', '#edit', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var RO = data[2];
      var username = data[1];
      $('#add_travel_dates').modal({ keyboard: false });
      $('#or').val(data[2]);
      $.ajax({
        type: 'POST',
        url: 'testtime.php',
        // url: 'editTravelData.php',
        data: (
          {
            ro:RO,
            uname:username,
            action:"edit",
          }),
        cache: false,
        success: function(data)
        {
          $('#travelDate_panel').html(data);  

        }
      });
    
      // $.ajax({
      //   type: 'POST',
      //   url: 'getTable1.php',
      //   data: ({
      //     "username":username,
      //     "purpose":RO
      //     }),
      //   cache: false,
      //   success: function(data2)
      //   {
      //     $('#tbl1').html(data2);

      //   }
      // });
      // $.ajax({
      //   type: 'POST',
      //   url: 'getTable3.php',
      //   data: ({
      //     "username":username,
      //     "purpose":RO,
      //     "action":"edit"
      //     }),
      //   cache: false,
      //   success: function(data3)
      //   {
      //     $('#tbl3').html(data3);

      //   }
      // });
    });
    // when users click delete button
    $('#example tbody').on( 'click', '#delete', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var RO = data[2];
      var username = data[1];
      var id = data[0];
      
      swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this entry!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(){
            swal("Deleted!", "Your travel date  has been deleted.", "success");
                $.ajax({
                    url:"travelclaim_functions.php",
                    method:"POST",
                    data:{
                    'action': 'deleteAll',
                    "ro": RO,
                    "id":id
                },
                success:function(data)
                {
            
                      setTimeout(function () {
                      window.location = "CreateTravelClaim.php?username=<?php echo $_GET['username'];?>&division=<?php echo $_GET['division'];?>";
                      }, 1000);

                  
                }
                });

            }
            );
   
    });
    //when users click export button
    $('#example tbody').on( 'click', '#export', function () {
      var data = table.row( $(this).parents('tr') ).data();
      var RO = data[2];
      var username = data[1];
      $('#or').val(data[2]);
     window.location = "export_travelclaim.php?id="+RO+"&&username="+username+"";
    });

});