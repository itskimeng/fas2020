<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username1 = $_SESSION['username'];




}
$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

  //Get Office
$select_user = mysqli_query($conn,"SELECT FIRST_M,MIDDLE_M,LAST_M,DIVISION_C FROM tblemployee WHERE UNAME = '$username1'");
$rowdiv = mysqli_fetch_array($select_user);
$DIVISION_C = $rowdiv['DIVISION_C'];
$f = $rowdiv['FIRST_M'];
$m = $rowdiv['MIDDLE_M'];
$l= $rowdiv['LAST_M'];

$fullname = $f.' '.$m.' '.$l;


//Get Office
$select_user = mysqli_query($conn,"SELECT DIVISION_C, DESIGNATION FROM tblemployee WHERE UNAME = '$username'");
$rowdiv = mysqli_fetch_array($select_user);
$DIVISION_C = $rowdiv['DIVISION_C'];
$DESIGNATION = $rowdiv['DESIGNATION'];
//echo $DESIGNATION;


//Get Position
$select_position = mysqli_query($conn,"SELECT  POSITION_M FROM tblposition WHERE POSITION_C = '$DESIGNATION'");
$rowdiv1 = mysqli_fetch_array($select_position);
$POSITION_M = $rowdiv1['POSITION_M'];
//echo $POSITION_M;

$select_office = mysqli_query($conn, "SELECT DIVISION_M from tblpersonneldivision where DIVISION_N = '$DIVISION_C'");
$rowdiv1 = mysqli_fetch_array($select_office);
$DIVISION_M = $rowdiv1['DIVISION_M'];

//echo $DIVISION_M;

// echo '<div class=""><div class="panel-heading " style = "background-color:orange"> <p style = "color:white;font-size:16px;"> This module is under development </p> </div></div>  '; 
// echo '<br>';
?>



<?php
// include('db.class.php'); // call db.class.php
$edit="edit";
?>
<!DOCTYPE html>
<html>
<head>
  <title>FAS</title>


</head>
<body>
<div class="box">
  <div class="box-body">
          
          <h1 align="">Travel Order</h1>
          
          <br>
        
          <div class=""  style="overflow-x:auto;">
         
            <li class="btn btn-success"><a href="TravelOrderCreate.php?division=<?php echo $_GET['division'];?>" style="color:white;text-decoration: none;">Add</a></li>
        
          
              <br>
              <br>
              
            </div>

            <table id="example1" class="table table-striped table-bordered" style="background-color: white;">
                <thead>
                    <tr style="background-color: white;color:blue; text-align:center">
                  <th width ='100'>TO NO</th> 
                  <th width = '150'>TO DATE</th>
                  <th width = ''>OFFICE</th>
                  <th width = '150'>NAME</th>
                  <th width = '150'>PURPOSE</th>
                  <th width = '100'>PLACE</th>
                  <th width = '150'>DATE</th>
                  <th width = '100'>TIME</th>
                  <th width = '100'>SUBMITTED DATE</th>
                  <th width = '100'>RECEIVED DATE</th>
                  <th width = '300'>ACTION</th>
                  
                </tr>
                </thead>
                <?php
            $servername = "localhost";
            $username = "fascalab_2020";
            $password = "w]zYV6X9{*BN";
            $database = "fascalab_2020";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password,$database);
            $view_query = mysqli_query($conn, "SELECT * from travel_order where office ='$DIVISION_M' order by date desc");

                while ($row = mysqli_fetch_assoc($view_query)) {

                  $id=$row['id'];
                  $obno = $row['tono'];
                  $date1 = $row['date'];
                  $date = date('F d, Y', strtotime($date1));
                  $office = $row['office'];
                  $name = $row['name'];
                  $purpose = $row['purpose'];
                  $place = $row['place'];
                  $todate1 = $row['todate'];
                  $todate = date('F d, Y', strtotime($todate1));
                  
                /*   $timefrom1 = $row['timefrom'];
                  $timefrom=  date("h:i:s a",$timefrom1);
                

                  $timeto1 = $row['timeto'];
                  $timeto=  date("h:i:s a",$timeto1); */

                  $timefrom1 = $row['timefrom'];
                  $timefrom=  date("g A",strtotime($timefrom1));
                

                  $timeto1 = $row['timeto'];
                  $timeto=  date("g A",strtotime($timeto1));


                 
                  


                  $uc = $row['uc'];

                  $submitteddate1 = $row['submitteddate'];
                  $submitteddate = date('F d, Y', strtotime($submitteddate1));


                  $receiveddate1 = $row['receiveddate'];
                  $receiveddate = date('F d, Y', strtotime($receiveddate1));
                
                  $status=$row['status'];
                  //echo $office;
                /*   echo $timefrom.' to '.$timeto;
                  echo '<br>'; */

               ?>

                <tr align = ''>

             
                <td><?php echo  $obno;?></td>

                 
                <?php if ($date1 == '0000-00-00'): ?>
                <td></td>
                <?php else: ?>
                  <td><?php echo  $date?></td>
                <?php endif ?>

               


                <td><?php echo  $office?></td>
                <td><?php echo  $name?></td>
                <td><?php echo  $purpose?></td>
                <td><?php echo  $place?></td>

                
                <?php if ($todate1 == '0000-00-00'): ?>
                <td></td>
                <?php else: ?>
               <td><?php echo  $todate?></td>
                <?php endif ?>
                
               
                <td><?php echo $timefrom.' to '.$timeto?></td>
               

                <?php if ($submitteddate1 == '0000-00-00'): ?>
                    <?php if($fullname==$name):?>  
                    <td><a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to submit this data?');" href='to_submit.php?id=<?php echo $id;?>'title="Submit">Submit</a></td>
                    <?php else: ?>
                      <td></td>
                    <?php endif ?>
                
                  <?php else: ?>
                  <td><?php echo $submitteddate?></td>
                <?php endif ?>

                <?php if ($receiveddate1 == '0000-00-00' && $submitteddate1!='0000-00-00'): ?>
                          <?php if ($username1 == 'charlesodi' || $username1 == 'mmmonteiro' || $username1 == 'cvferrer' || $username1 == 'masacluti' || $username1 == 'magonzales' || $username1 == 'seolivar' || $username1 == 'jamonteiro' || $username1 == 'ctronquillo' || $username1 == 'rdmiranda'):?>
                              <?php if ($status=='cancelled'):?>
                              <td></td>
                              <?php else: ?>
                                <td><a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to submit this data?');" href='to_receive.php?id=<?php echo $id;?>'title="Submit">Receive</a></td>
                              <?php endif ?>
                          <?php else: ?>
                          <td></td>
                          <?php endif ?> 
                        <?php else: ?>
                         
                        <td>
                            
                          <?php if ($receiveddate1 == '0000-00-00'): ?>
                          <!-- //no dates -->
                          <?php else: ?>
                          <?php echo $receiveddate?>
                          <?php endif ?>

                        </td>
                         
                          <?php endif ?>
                <td>

                      <?php if ($submitteddate1 == 0000-00-00): ?>
                          <!--  -->
                              <?php if ($status!='cancelled'):?>
                                  <?php if($fullname==$name):?>
                                    <!-- to_export.php?<?php echo $id;?>&pos=<?php echo $POSITION_M;?> -->
                                  <a  href='#' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> |
                                  <a href='TravelOrderUpdate.php?id=<?php echo $id;?>&pos=<?php echo $POSITION_M;?>'  class = "btn btn-primary btn-xs"> <i class='fa'>&#xf044;</i> Edit</a> | 
                                  <a onclick="return confirm('Are you sure you want to cancel this record?');" href='to_cancel.php?id=<?php echo $id;?>' title="cancel" class = "btn btn-warning btn-xs" > <i class='fa fa-fw fa-close'></i> Cancel</a> 
                                  <?php else: ?>
                                  <td></td>
                                  <?php endif ?>
                              <?php else: ?>
                              Cancelled
                              <?php endif ?>
                        
                        <?php else: ?>


                              <?php if ($status=='cancelled'):?>
                                Cancelled
                              <?php else: ?>
                              <?php if($fullname==$name):?>
                                <!-- to_export.php?<?php echo $id;?>&pos=<?php echo $POSITION_M;?> -->
                                  <a  href='#' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> |
                                  <a onclick="return confirm('Are you sure you want to cancel this record?');" href='to_cancel.php?id=<?php echo $id;?>' title="cancel" class = "btn btn-warning btn-xs" > <i class='fa fa-fw fa-close'></i> Cancel</a> 
                                  <?php else: ?>
                                    
                                  <?php endif ?>
                              <?php endif ?>
                          <?php endif ?>
                        
               
                        
                </td>
                
               

                </tr>

            
            <?php }?>



             
            </table>
                
                </div>
            </div>
                 
      
    <script type="text/javascript">
    $(document).ready(function() {
        var dataTable=$('#example1').DataTable({
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true,
            "order": [[ 1, "asc" ]],
            aLengthMenu: [ [10, 20, -1], [ 10, 20, "All"] ],
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false
            });
        
    } );
</script>





</body>
</html>



