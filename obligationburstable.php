<?php
include('db.class.php'); // call db.class.php
include 'controller/ObligationRequestController.php'; // call db.class.php

?>
<!DOCTYPE html>
<html>
<head>
  <title>Financial Management System</title>


</head>
<body>
<div class="box " style="border-style: groove;">
  <div class="box-body">
          
          <h1 align="">&nbspObligation BURS</h1>
          
          <br>



                    <table class="table" > 

                <!-- Header -->
                  <tr>
                  <td class="col-md-2">
                  <li class="btn btn-warning"><a href="obligation.php" style="color:white;text-decoration: none;">Back</a></li>

                  <li class="btn btn-success   "><a href="ObligationCreate.php" style="color:white;text-decoration: none;">Create</a></li>


                  
                  </td>
                      
                  <td class="col-md-7" >

                    
                  </td>

          

                  <form method = "POST" action = "@Functions/obdateexport.php">
                  <td class="col-md-1">
                  <input type="text" class="" id="datepicker1" placeholder='From Date' name="datefrom" style="height: 35px; width: 250px" autocomplete="off">

                  </td>
                  <td class="col-md-1">
                  <input type="text" class="" id="datepicker2" placeholder='To Date' name="dateto" style="height: 35px; width: 250px" autocomplete="off">

                  </td>
                  <td class="col-md-1">
                  <button type="submit" name="submit"  class="btn btn-success pull-right">Filter/Export Data</button>

                  </td>
                  <td class="col-md-1">
                  <button type="Summary" name="Summary"  class="btn btn-success pull-right">Export Summary</button>

                  </td>
                 
           
                </form>
                  

               

                  </tr>
                  <!-- Header -->
                </table>

        
          <div class=""  style="overflow-x:auto;">
          
              <br>
              <br>
           
            <table id="example1" class="table table-striped table-bordered" style="background-color: white;">
                <thead>
                    <tr style="background-color: white;color:blue;">
                 
                  <th>DATE RECEIVED</th>
                  <th>DATE OBLIGATED</th>
                  <th>DATE RETURNED</th>
                  <th>DATE RELEASED</th>
                  <th>BURS NUMBER</th>
                  <th>PO NUMBER</th>
                  <th>PAYEE</th>
                  <th>PARTICULAR</th>
                 <!--  <th>SARO NUMBER</th>
                  <th>PPA</th>
                  <th>UACS</th> -->
                  <th>AMOUNT</th>
                  <th>REMARKS</th>
                  <!-- <th>GROUP</th> -->
                  <th>STATUS</th>
                  <th width='130'  style="border-right: 0px; text-align: center;">ACTION</th>
                  
                  
                </tr>
              </thead>
              <?php
          foreach ($burs as $key => $burs_data) {
            echo '<tr>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_received'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_obligated'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'><input type="hidden" class = "id" value="'.$burs_data['id'].'" />' . $burs_data['date_return'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_released'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['ors'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['ponum'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['payee'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['particular'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['amount'] . '</td>';
            echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['remarks'] . '</td>';  
            echo '<td '.$burs_data['ors_gss'].' ' . $burs_data['style'] . '>' . $burs_data['status'] . '</td>';
            echo ' <td colspan="1" style="border-right: 0px; margin-left:0px"> 
            <a class="btn btn-success btn-sm" href="#" title = "View" > <i class="fa fa-eye"></i></a> 
                    <a class="btn btn-primary btn-sm" href="#" title = "Edit">  <i class="fa fa-edit"></i></a> 
                    <a class="btn btn-danger btn-sm" href="#" title = "Delete"> <i class="fa fa-trash"></i></a> 
            </td>';
            echo '</tr>';
          }
          ?>
             
                              </tr> 
                          </table>
            



</body>
</html>

<!--cancel modals -->

<div id="ors_data_Modal" class="modal fade" role="dialog" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">OBLIGATION</h4>
            </div>
            <div class="modal-body">
              <!-- <form method="POST" action="ro_cancel.php" > -->
              
        
              <div class="addmodal" >
              <h4 class="modal-title">Breakdown for BURS No.&nbsp;<input style="border:none; font-weight:bolder"  type="text" name="ors11" id="ors11" value="" class=""/></h4>
              

             

           
              <br>

            
              <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12" >
                                        <!-- Table of Uacs -->
                                        <table id="example" class="table table-responsive table-bordered " style="background-color: white; width:100%; text-align:left; border-style: groove;" >
                                        <thead>
                                        <tr style="background-color: #A9A9A9;  text-align:left; border-style: groove; " >
                                       
                                        <th width='500'>ID</th>
                                        <th width='500'>FUND SOURCE</th>
                                        <th width='500'>PPA </th>
                                        <th width='500'>UACS </th>
                                        <th width='500'>AMOUNT </th>
                                        <th width='500'>STATUS </th>
                                        <th width='500'>ACTION</th>
     
                                        </thead>

                                        </table>

                                        <!-- Table of Uacs -->

                                    </div>

                                </div>

                                


                            </div>



              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

              <script type="text/javascript">
              
              </script>
              <script>

                  function myFunction(orsget) {
                    
                    //getting from data-id from link
                    var burs = orsget.getAttribute("data-burs");
                    var dvstatus = orsget.getAttribute("data-dvstatus");
                 
                    var burs1 = $("input[name='ors1']");
                    var burs11 = $("input[name='ors11']");
                    
                    burs1.val(burs);
                    burs11.val(burs);


                    $(document).ready(function(){

                        var ors = orsget.getAttribute("data-burs");
                       
                        // alert(dvstatus);

                        $('#example').DataTable().destroy();
                        dataT();

                        });

                        function dataT(){

                        // var filter_data ='0001';

                        var table = $('#example').DataTable( {
                          

                      'paging'      : true,
                      'lengthChange': false,
                      'searching'   : true,
                      'ordering'    : false,
                      'info'        : false,
                      'autoWidth'   : false,  
                        "processing": true,
                        "serverSide": false,
                        "columnDefs": [{"render": createManageBtn, "data": null, "targets": [6]}],
                        
                        "ajax": {
                        "url": "DATATABLE/Burs_data.php",
                        "type": "POST",
                        "data": {
                        "filter_data": burs,

                        }}

                        } );

                      $('#example tbody').on( 'click', '#editORS', function () {
                      var data = table.row( $(this).parents('tr') ).data();
                      window.location="obupdate1.php?getid="+data[0];
                      });

                      $('#example tbody').on( 'click', '#delete', function () {
                      var data = table.row( $(this).parents('tr') ).data();
                      window.location="@Functions/obdeletefunction1.php?getidDelete="+data[0];
                      });
                     
                      
                      function createManageBtn() {

                      
                      if(dvstatus=='Paid'){
                      return '<a  class="btn btn-primary btn-xs" onclick="myFunc()" id="editORS"><i class="fa">&#xf044;</i>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>';
                      }
                      else{
                      return '<a  class="btn btn-primary btn-xs" onclick="myFunc()" id="editORS"><i class="fa">&#xf044;</i>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a> | <a  class="btn btn-danger btn-xs" onclick="myFunc()" onclick="" id="delete"><i class="fa fa-trash-o"></i>  Delete</a>';
                      }

                      
                      

                      }
                      function myFunc() {
                      confirm("Are you sure you want to delete this obligation?")
                      console.log("Button was clicked!!!");
                      // alert(data[0]);
                      }

                        
                       


                        }
                
                    
                  }

                   

                

                  </script>


              <input hidden  type="text" name="ors1" id="ors1" value="" class=""/>
              <br>
              <input hidden  type="text" name="user" id="user" value="<?php echo $username1?>" class=""/>
              <br>
              <input hidden  type="text" name="now" id="now" value=" <?php date_default_timezone_set('Asia/Manila'); echo date('F d, Y') ?>" class=""/>
              </tr>
              </table>
                



           
                            
              
            
                </div>
           
                <!-- </form> -->
          </div>
        </div>

      
    
    </div>

    </div>
 

          
              
 
           
        <!-- cancel modals -->

