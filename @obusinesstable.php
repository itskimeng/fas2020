<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username1 = $_SESSION['username'];
$division = $_SESSION['division'];



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
//echo $fullname;

$select_office = mysqli_query($conn, "SELECT DIVISION_M from tblpersonneldivision where DIVISION_N = '$DIVISION_C'");
$rowdiv1 = mysqli_fetch_array($select_office);
$DIVISION_M = $rowdiv1['DIVISION_M'];

?>



<?php

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
          
          <h1 align="">Official Business</h1>
          
          
          <br>
        

<table class="table" > 

<!-- Header -->
  <tr>
  <td class="col-md-2">
  <li class="btn btn-success"><a href="OfficialBusinessCreate.php?division=<?php echo $_GET['division'];?>" style="color:white;text-decoration: none;">Add</a></li>
  </td>
      
  <td class="col-md-3" >

    
  </td>

  <td class="col-md-7" style = "text-align:center;">

  
  <form method = "POST" action = "ob_export_date.php">
  <?php if ($username1 == 'cvferrer' || $username1 == 'itdummy1' || $username1 == 'seolivar' || $username1 == 'magonzales' || $username1 == 'jbaco' || $username1 == 'gpvillanueva'|| $username1 == 'hpsolis'|| $username1 == 'rmsaturno'):?>
  
 

      <b>Month</b>
<!--      
  <select class="" id = "selectMonth" name="month" style="width: 150px; Height:30px;">
    <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
  </select> -->
  <select class="" name="month" id = "selectMonth" style="width: 150px; Height:30px;">
                              <?php 
                                $current_month =  date('F');
                              switch($current_month){
                                case 'January':
                                  echo '
                                  <option value="01" selected>January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'February':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02" selected>February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'March':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03" selected>March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'April':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04" selected>April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'May':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05" selected>May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'June':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06" selected>June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'July':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07" selected>July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'August':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08" selected>August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'September':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09" selected>September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'October':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10" selected>October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'November':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11" selected>November</option>
                                  <option value="12">December</option>';
                                break;
                                case 'December':
                                  echo '
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12" selected>December</option>';
                                break;
                              }
                              ?>
                                
                              </select>

  
  
  <b>Year</b>
  <select class="" id="year" name="year" style="width: 150px; Height:30px;">
  
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    
  </select>

  <b>Office</b>
  <select class="" id="office" name="office" style="width: 150px; Height:30px;">
    
    <option value="ALL">ALL</option>
    <option value="ORD">ORD</option>
    <option value="FAD">FAD</option>
    <option value="LGCDD">LGCDD</option>
    <option value="MBRTG">MBRTG</option>
    <option value="LGMED">LGMED</option>
    <option value="PDMU">PDMU</option>
    <option value="Batangas">Batangas</option>
    <option value="Cavite">Cavite</option>
    <option value="Laguna">Laguna</option>
    <option value="Rizal">Rizal</option>
    <option value="Quezon">Quezon</option>
    <option value="Lucena City">Lucena City</option>
    
  </select>
  &nbsp;&nbsp;&nbsp;
  <button style="  Height:30px;"  id="" name="submit" type="submit"  class="btn btn-success ">&nbsp;&nbsp;&nbsp;Export&nbsp;&nbsp;</button>
                 
  </form>
  

  </td>

  <?php else:?>

  <?php endif?>

  </tr>
  <!-- Header -->
  </table>  

          <div class=""  style="overflow-x:auto;">
         
         <br>
            <br>  
            </div>

            <table id="example1" class="table table-striped table-bordered" style="background-color: white;">
                <thead>
                  <tr style="background-color: white;color:blue; text-align:center">
                  <th width ='150'>OB NO</th> 
                  <th width = '300'>OB DATE</th>

                  <th width = '300'>DATE OF OB</th>

                  <th width = '300'>TIME</th>

                  <th width = ''>OFFICE</th>
                  <th width = '200'>NAME</th>
                  <th width = '700'>PURPOSE</th>
                  <th width = '500'>PLACE</th>
                  
                 
                  <th width = '100'>SUBMITTED DATE</th>
                  <th width = '200'>RECEIVED DATE</th>
                  <th width = '1500'>ACTION</th>
                  
                </tr>
                </thead>
                <?php
            $servername = "localhost";
            $username = "fascalab_2020";
            $password = "w]zYV6X9{*BN";
            $database = "fascalab_2020";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password,$database);

            if ($username1 == 'cvferrer' || $username1 == 'itdummy1' || $username1 == 'magonzales' || $username1 == 'jbaco' || $username1 == 'gpvillanueva'|| $username1 == 'hpsolis'|| $username1 == 'rmsaturno')
            {
              $view_query = mysqli_query($conn, "SELECT * from ob order by id desc");
            }
            else{
              $view_query = mysqli_query($conn, "SELECT * from ob where office ='$DIVISION_M' order by id desc");

            }
         

                while ($row = mysqli_fetch_assoc($view_query)) {

                  $id=$row['id'];
                  $obno = $row['obno'];
                  $date1 = $row['date'];
                  $date = date('F d, Y', strtotime($date1));
                  $office = $row['office'];
                  $name = $row['name'];
                  $purpose = $row['purpose'];
                  $place = $row['place'];
                  $obdate1 = $row['obdate'];
                  $obdate = date('F d, Y', strtotime($obdate1));
                  
                  $timefrom1 = $row['timefrom'];
                  $timefrom=  date("g:i A",strtotime($timefrom1));
                

                  $timeto1 = $row['timeto'];
                  $timeto=  date("g:i A",strtotime($timeto1));

                 
                  


                  $uc = $row['uc'];

                  $submitteddate1 = $row['submitteddate'];
                  $submitteddate = date('F d, Y', strtotime($submitteddate1));


                  $receiveddate1 = $row['receiveddate'];
                  $receiveddate = date('F d, Y', strtotime($receiveddate1));
                
                  $status=$row['status'];
                  $submittedby = $row['submittedby'];
                  $receivedby = $row['receivedby'];
                  $cancelledby = $row['cancelledby'];
                  $cancelleddate1 = $row['cancelleddate'];

                  $cancelleddate = date('F d, Y', strtotime($cancelleddate1));

                  $reason = $row['reason'];

               ?>

                <tr align = ''>

             
                <td><?php echo  $obno;?></td>
             

                <?php if ($date1 == '0000-00-00'): ?>
                <td></td>
                <?php else: ?>
                  <td><?php echo  $date?></td>
                <?php endif ?>
                


                <?php if ($obdate1 == '0000-00-00'): ?>
                <td></td>
                <?php else: ?>
                <td><?php echo  $obdate?></td>
                <?php endif ?>


                <td><?php echo $timefrom.' to '.$timeto?></td>
              

                
                <td><?php echo  $office?></td>
                <td><?php echo  $name?></td>
                <td><?php echo  $purpose?></td>
                <td><?php echo  $place?></td>

                
               
               
             

                <?php if ($submitteddate1 == '0000-00-00'): ?>
                  
                          <?php if ($status!='cancelled'):?> 
                          <td><a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to submit this Official Business?');" href='ob_submit.php?id=<?php echo $id;?>&now=<?php date_default_timezone_set('Asia/Manila'); echo date('F d, Y') ?>&user=<?php echo $username1;?>'title="Submit">Submit</a></td>
                          <?php else: ?>
                          <td></td>
                          <?php endif ?>

                
                <?php else: ?>
                <td><?php echo $submitteddate .'<br>'.$submittedby.''?></td>
                <?php endif ?>


                        <?php if ($receiveddate1 == '0000-00-00' && $submitteddate1!='0000-00-00'): ?>
                          <?php if ($username1 == 'itdummy1' || $username1 == 'cvferrer' || $username1 == 'magonzales' || $username1 == 'jbaco' || $username1 == 'gpvillanueva'|| $username1 == 'hpsolis'|| $username1 == 'rmsaturno'):?>
                              <?php if ($status=='cancelled'):?>
                              <td></td>
                              <?php else: ?>
                                <td><a class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to receive this Official Business?');" href='ob_receive.php?id=<?php echo $id;?>&now=<?php date_default_timezone_set('Asia/Manila'); echo date('F d, Y') ?>&user=<?php echo $username1;?>'title="Receive">Receive</a></td>
                              <?php endif ?>
                          <?php else: ?>
                          <td></td>
                          <?php endif ?> 
                        <?php else: ?>
                         
                        <td>
                            
                          <?php if ($receiveddate1 == '0000-00-00'): ?>
                          <!-- //no dates -->
                          <?php else: ?>
                            <?php echo $receiveddate .'<br>'.$receivedby.''?>
                          <?php endif ?>

                        </td>
                         
                          <?php endif ?>
                        <td>
               
                      
                         


                        <?php if ($submitteddate1 == 0000-00-00): ?>
                        
                              <?php if ($status!='cancelled'):?>
                                
                                  <a  href='/OfficialBusiness/Report/pages/OB.php?id=<?php echo $id;?>&division=<?php echo $division?>' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> |
                                  <a href='OfficialBusinessUpdate.php?id=<?php echo $id;?>'  class = "btn btn-primary btn-xs"> <i class='fa'>&#xf044;</i> Edit</a> | 
                                  <a name="Cancel" value="" id="Cancel" onclick="myFunction(this)" data-idtomodal="<?php echo $id;?>" data-toggle="modal" data-target="#add_data_Modal" title="cancel" class = "btn btn-warning btn-xs" > <i class='fa fa-fw fa-close'></i> Cancel</a> 
                                  
                             
                              
                              
                                  <?php else: ?>
                             
                              <a  disabled href='#' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> |
                              <label style="color:red">Cancelled</label> <?php echo $cancelleddate.'&nbsp;'.$cancelledby.'<br>'.'Reason: '.$reason ?>
                              <?php endif ?>
                        
                        <?php else: ?>


                              <?php if ($status=='cancelled'):?>
                               
                                <a disabled  href='#' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> | 
                                <label style="color:red">Cancelled</label> <?php echo $cancelleddate.'&nbsp;'.$cancelledby.'<br>'.'Reason: '.$reason ?>
                                <?php else: ?>
                             
                                  <a href='/OfficialBusiness/Report/pages/OB.php?id=<?php echo $id;?>&division=<?php echo $division?>' title="View" class = "btn btn-info btn-xs"> <i class='fa'>&#xf06e;</i> Export</a> |
                                  <a name="Cancel" value="" id="Cancel" onclick="myFunction(this)" data-idtomodal="<?php echo $id;?>" data-toggle="modal" data-target="#add_data_Modal" title="cancel" class = "btn btn-warning btn-xs" > <i class='fa fa-fw fa-close'></i> Cancel</a>
                                  
                             
                              
                              
                                <?php endif ?>
                          <?php endif ?>
                        

                         
                </td>
                
               

                </tr>

            
            <?php }?>



             
            </table>
                
                </div>
            </div>




        
        <!-- //Setting ID -->
        <script>
        function myFunction(idget) {

          var idtomodal = idget.getAttribute("data-idtomodal");
          var id1 = $("input[name='id1']");
          id1.val(idtomodal);

         
       
        }
        </script>
          <!-- //Setting ID -->
      

      
    <script type="">
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



            <!-- modals -->

            <div id="add_data_Modal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cancel Official Business</h4>
            </div>
            <div class="modal-body">
              <form method="POST" id="insert_form" action="ob_cancel.php">
              
              <label>Reason</label>
              <input required type="text" name="reason" id="reason" class="form-control" />
                                  
              <br>
              
              
              <button type="submit" name="cancel" class="btn btn-warning pull-right ">Cancel</button>


              <input hidden type="text" name="id1" id="id1" value="" class=""/>
              <br>
              <input hidden type="text" name="user" id="user" value="<?php echo $username1?>" class=""/>
              <br>
              <input hidden type="text" name="now" id="now" value=" <?php date_default_timezone_set('Asia/Manila'); echo date('F d, Y') ?>" class=""/>
             
             
              <br />

             

             
          
              
              </form>
            </div>
            <div class="modal-footer">
          
            </div>
            </div>
          </div>
          </div>

      
        <!-- modals -->




