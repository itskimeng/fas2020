<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$OFFICE_STATION = $_SESSION['OFFICE_STATION'];

}

    
function filldataTable()
{
    include 'connection.php';
    $query = "SELECT * FROM tblwebposting
    where `STATUS` != '' 
    GROUP by tblwebposting.ID ORDER BY ID DESC
   ";

    // -- order by `REQ_DATE` DESC, `REQ_TIME` desc ";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        $data[] = $row['CONTROL_NO'];
        ?>
        <tr>
            <td style = "width:2%;">
                <br> <br>
                <?php if($row['ASSIST_BY'] =='' || $row['ASSIST_BY'] ==null) { echo '-'; }else{ ?> <img style="vertical-align:top;"  class="round" width="50" height="50" avatar="<?php echo $row['ASSIST_BY'];?>"> <?php } ?>
            </td>
            <td>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body"> 
                                <div class = "col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12" >
                                            <div class="info-box bg-gray" style = "height:auto;" >
                                                <a href = "report/TA/pages/viewTA.php?id=<?php echo $row['CONTROL_NO']; ?>" style = "color:black;" title = "View ICT TA Form" >
                                                    <span class="info-box-icon info-box-text " style = "background-color:#90A4AE;height:125px;"  >
                                                        <?php echo '
                                                                <b>'.$row['CONTROL_NO'].'</b>
                                                        ';?>
                                                        <p style = "color:red;margin-top:-75%;font-weight:bold;"><?php echo $row['STATUS']; ?><br>
                                                        <img src = "images/print.png" style = "width:40px;height:auto;margin-top:-130%;"/>
                                                        </p>




                                                        </span>
                                                        </a>
                                                                                                

                                                <div class="info-box-content" >
                                                    <span class="info-box-number"><i style = "font-size:16px;font-weight:bold;">Issue/Problem/Error Details</i>
                                                    </span>
                                                    <span  style ="font-size:15px;">
                                                    <?php 
                                                    echo $row['PURPOSE'];?>
                                                    </span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div><br>
                                                <div class = "col-lg-3" style = "margin-left:-15px;">
                                                    <span class="progress-description">
                                                    <b><i style = "font-size:13px;" title=  "<?php echo $row['TYPE_REQ'];?>">Category</i></b>
                                                    </span>
                                                    <span class="progress-description"  title=  "<?php echo $row['TYPE_REQ'];?>">
                                                    <?php echo $row['TYPE_REQ'];?>

                                                    </span>
                                                </div>
                                                <div class = "col-lg-3" style = "margin-left:-15px;">
                                                    <span class="progress-description">
                                                    <b><i style = "font-size:13px;">Office</i></b>
                                                    </span>
                                                    <span class="progress-description">
                                                    <?php echo $row['OFFICE'];?>

                                                    </span>
                                                </div>
                                               
                                                <div class = "col-lg-3">
                                                    <span class="progress-description">
                                                    <i style = "font-size:13px;"><b>Requested by</b></i>
                                                    </span>
                                                    <span class="progress-description">

                                                    <?php
                                                            $uname  = $row['REQ_BY'];
                                                            $uname = trim($uname);
                                                            
                                                            if(strpos($uname, " ") !== false){
                                                            
                                                                $u = explode(" ", $uname);
                                                                echo ucfirst(strtolower($u[0])); // piece1
                                                            
                                                            }
                                                            ?>
                                                    </span>
                                                </div>
                                                <div class = "col-lg-">
                                                    <span class="progress-description">
                                                        <b><i style = "font-size:13px;">Requested Date</i></b>
                                                    </span>
                                                    <span class="progress-description">
                                                        <?php  
                                                    
                                                        echo date('F d, Y', strtotime($row['REQ_DATE'])).'&nbsp'.date('g:i A',strtotime($row['REQ_TIME']));?>
                                                    </span>
                                                </div>
                                          
                                              
                                               
                                                
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td style = "width:10%;">
                    <?php
                    // Received
                  
                        if($row['START_DATE'] == '0000-00-00' || $row['START_DATE'] == null   )
                        {
                        echo ' <button  data-id = '.$row['CONTROL_NO'].' class = "sweet-17 btn btn-md btn-primary col-lg-12">Receive</button>';
                            
                        }else{
                            if($row['START_DATE'] != '0000-00-00' || $row['START_DATE'] != 'January 01, 1970')
                            {
                                echo '
                                <button disabled title = "Received Date"  data-id = '.$row['CONTROL_NO'].' class = "sweet-17 btn btn-md btn-primary col-lg-12 " >
                                Received Date<br>    
                                <b>'.date('F d, Y',strtotime($row['START_DATE'])).'</b>
                                </button>';
                                echo '<br>';
                            }
                        }









                    echo '<br>';
                      // Assign
             
               

                
                if($_SESSION['complete_name'] == $row['ASSIST_BY'])
                    {
                        ?><br>
                        <button  data-id ="<?php echo $row['CONTROL_NO'];?>" class = " col-lg-12 pull-right sweet-14  btn btn-danger" style = "background-color:orange;">
                        <?php 
                        if($row['ASSIGN_DATE'] == null || $row['ASSIGN_DATE'] == '')
                        {
                        echo 'Assign';?></button>
                        <?php
                        }else{
                       echo  'Assigned Date<br>';  
                        echo '<b>'.date('F d, Y',strtotime($row['ASSIGN_DATE'])).'</b>';?></button>
                        <?php
                        }
                ?>
                        <?php
                    }else{
                        ?><br>
                        <button   data-id ="<?php echo $row['CONTROL_NO'];?>" class = "col-lg-12 pull-right sweet-14 btn btn-danger" style = "background-color:orange;">
                        <?php 
                        if($row['ASSIGN_DATE'] == null || $row['ASSIGN_DATE'] == '')
                        {
                        echo 'Assign';?></button>
                        <?php
                        }else{
                       echo  'Assigned Date<br>';  
                        echo '<b>'.date('F d, Y',strtotime($row['ASSIGN_DATE'])).'</b>';?></button><br>
                        <?php
                        }
                        

                
                    }

                
                    
                      echo '<br><br>';                                      
                    
                    // Complete
                    if($row['STATUS_REQUEST'] == 'Submitted')
                    {
                        echo '<button disabled id ="sweet-16" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                    }else{
                        if($row['COMPLETED_DATE'] == '0000-00-00' || $row['COMPLETED_DATE'] == NULL || $row['COMPLETED_DATE'] == 'January 01, 1970')
                    {
                        if($_SESSION['complete_name'] == $row['ASSIST_BY'])
                        {
                            echo '<button id ="sweet-16" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                        }else{
                            echo '<button id ="sweet-16"  data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                        }   
                    }else{

                        echo '<button title = "Completed Date"  id ="update_complete" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">
                        Completed Date<br> 
                        '.date('F d, Y',strtotime($row['COMPLETED_DATE'])).'
                        </button>';
                        echo '<br>';
                    }
                    }
                    
              ?>
              <br>
              <br>


            <?php 
             if($row['COMPLETED_DATE'] == '')
             {
                 ?>
                <button    disabled class = "btn btn-danger btn-md col-lg-12 ">
                                Rate Service
                        </button>
                 <?php
             }else{

             
                if($row['STATUS_REQUEST'] == 'Completed')
                {
                    if ($row['DATE_RATED'] != '' || $row['DATE_RATED'] != NULL){
                    ?>
                        <button    class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "rateService.php?division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Rate Service
                            </a>
                        </button>
                    <?php
                    }
                    else{
                    ?>
                        <button   class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "rateService.php?division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Rate Service
                            </a>
                        </button>
                    <?php
                    }
                }else if($row['STATUS_REQUEST'] == 'Rated'){
                    ?>
                        <button    class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "rateService.php?division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Rated Date<br><?php echo date('F d, Y', strtotime($row['DATE_RATED']));?></a></button>
                            <?php
                }else{
                    ?>
                    <button    class = "btn btn-danger btn-md col-lg-12 ">
                        <a href = "rateService.php?division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                            Rate Service
                        </a>
                    </button>
                    <?php
                }
            }
?>
                    
            </td>
           
        </tr>
        <?php
    }

}
?>
<!DOCTYPE html>
<html>

    <title>FAS | Process Request</title>
    <head>

        <link rel="shortcut icon" type="image/png" href="dilg.png">

        <!-- Tell the browser to be responsive to screen width -->
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link
            rel="stylesheet"
            href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of
        downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link
            rel="stylesheet"
            href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.js">

        <!-- Daterange picker -->
        <link
            rel="stylesheet"
            href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link
            rel="stylesheet"
            href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link
            rel="stylesheet"
            href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <script src="bower_components/chart.js/Chart.js"></script>

        <style>
            pre {
                margin: 20px 0;
                padding: 20px;
                background: #fafafa;
            }
            .round {
                border-radius: 50%;
                vertical-align:
            }

            .tdTitle {
                background-color: #B0BEC5;
                font-family: 'Cambria';
                font-weight: bold;
            }

            .table {
                border: 1px solid black;
            }
            .th,
            td {
                padding: 5px;

            }

            #yourBtn {
                position: relative;
                font-family: calibri;
                width: auto;
                padding: 10px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border: 1px dashed black;
                text-align: center;
                background-color: #DDD;
                cursor: pointer;
            }
        </style>
    </head>

    <body class="hold-transition skin-red-light fixed sidebar-mini">
        <div class="wrapper">
        <?php 
  if ($username == 'charlesodi' || $username == 'mmmonteiro' || $username == 'cvferrer' || $username == 'masacluti' || $username == 'magonzales' || $username == 'seolivar' || $username == 'jamonteiro' || $username == 'ctronquillo' || $username == 'sglee') { include('test1.php'); 
  }else{ 
  
       if ($OFFICE_STATION == 1) {
    include('sidebar2.php');
             
          }else{
    include('sidebar3.php');
           
          } 
  }
?>
            <div class="content-wrapper">
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Website Posting Request Form</a>
                        </li>
                    </ol>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                               
                               
                            </div>
                            <div class="col-md-8">
                                <div class="box box-primary direct-chat direct-chat-primary">
                                    <div class="box-header with-border">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-aqua">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">RECEIVED</span>
                                                            <span class="info-box-number">1,410</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-green">
                                                            <i class="fa fa-flag-o"></i>
                                                        </span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">ASSIGNED</span>
                                                            <span class="info-box-number">410</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-yellow">
                                                            <i class="fa fa-files-o"></i>
                                                        </span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">COMPLETED</span>
                                                            <span class="info-box-number">13,648</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-red">
                                                            <i class="fa fa-star-o"></i>
                                                        </span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">RATED</span>
                                                            <span class="info-box-number">93,139</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <table
                                                        id="example2"
                                                        class="table table-bordered-striped table-bordered  "
                                                        style="border:none;">
                                                        <thead>
                                                            <th>ASSISTED BY</th>
                                                            <th>PARTICULAR</th>
                                                            <th>ACTION</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php filldataTable(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        <footer class="main-footer">
            <br>
            <div class="pull-right hidden-xs">
                <b>Version</b>
                1.0
            </div>
            <strong>DILG IV-A Regional Information and Communications Technology Unit
                (RICTU) © 2019 All Right Reserved .</strong>

        </footer>
        <br>

    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script
        src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="_includes/sweetalert.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="_includes/sweetalert.css">
    <link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
    <script src="_includes/sweetalert2.min.js" type="text/javascript"></script>
    <script src="_includes/sweetalert.min.js"></script>
    <link rel="stylesheet" href="_includes/sweetalert.css">

    <!-- <script
    src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

</body>
</html>

<script>
$('document').ready(function () {

    // DATATABLE

    $('#example2').DataTable({

        'scrollX': true,
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        aLengthMenu: [
            [
                3, 3, 3, -1
            ],
            [
                3, 3, 3, "All"
            ]
        ],
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "lengthMenu": [
            [3], [3]
        ]
    });

})
</script>