<?php session_start();
if(!isset($_SESSION['username'])){
header('location:index.php');
}else{
  error_reporting(0);
ini_set('display_errors', 0);
$username = $_SESSION['username'];
$OFFICE_STATION = $_SESSION['OFFICE_STATION'];

}

function showICTload($itstaff)
{
    include 'connection.php';;
    $query = "SELECT count(*) as 'count' FROM tbltechnical_assistance WHERE POSTED_BY  LIKE '%$itstaff%'";
    
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
        echo $row['count'];
    }
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
                <?php if($row['POSTED_BY'] =='' || $row['POSTED_BY'] ==null) { echo '-'; }else{ ?> <img style="vertical-align:top;"  class="round" width="50" height="50" avatar="<?php echo $row['POSTED_BY'];?>"> <?php } ?>
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
                                                <a href = "report/WEBPOSTING/pages/viewForm.php?id=<?php echo $row['CONTROL_NO']; ?>" style = "color:black;" title = "View ICT TA Form" >
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
                                                    <b><i style = "font-size:13px;" title=  "<?php echo $row['CATEGORY'];?>">Category</i></b>
                                                    </span>
                                                    <span class="progress-description"  title=  "<?php echo $row['CATEGORY'];?>">
                                                    <?php echo $row['CATEGORY'];?>

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
                                                            $uname  = $row['REQUESTED_BY'];
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
                                                    
                                                        echo date('F d, Y', strtotime($row['REQUESTED_DATE'])).'&nbsp'.date('g:i A',strtotime($row['REQUESTED_TIME']));?>
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
                  
                        if($row['RECEIVED_DATE'] == '0000-00-00' || $row['RECEIVED_DATE'] == null   )
                        {
                        echo ' <button  data-id = '.$row['CONTROL_NO'].' class = "sweet-17 btn btn-md btn-primary col-lg-12">Receive</button>';
                            
                        }else{
                            if($row['RECEIVED_DATE'] != '0000-00-00' || $row['RECEIVED_DATE'] != 'January 01, 1970')
                            {
                                echo '
                                <button disabled title = "Received Date"  data-id = '.$row['CONTROL_NO'].' class = "sweet-17 btn btn-md btn-primary col-lg-12 " >
                                Received Date<br>    
                                <b>'.date('F d, Y',strtotime($row['RECEIVED_DATE'])).'</b>
                                </button>';
                                echo '<br>';
                            }
                        }









                    echo '<br>';
                      // Assign
             
               

                
                if($_SESSION['complete_name'] == $row['POSTED_BY'])
                    {
                        ?><br>
                        <button  data-id ="<?php echo $row['CONTROL_NO'];?>" class = " col-lg-12 pull-right sweet-14  btn btn-danger" style = "background-color:orange;">
                        <?php 
                        if($row['ASSIGN_DATE'] == null || $row['ASSIGN_DATE'] == '' || $row['ASSIGN_DATE'] == '0000-00-00')
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
                    if($row['STATUS'] == 'Submitted')
                    {
                        echo '<button disabled id ="sweet-16" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                    }else{
                        if($row['POSTED_DATE'] == '0000-00-00' || $row['POSTED_DATE'] == NULL || $row['POSTED_DATE'] == 'January 01, 1970')
                    {
                        if($_SESSION['complete_name'] == $row['POSTED_BY'])
                        {
                            echo '<button id ="sweet-16" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                        }else{
                            echo '<button id ="sweet-16"  data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">Complete</button>';
                        }   
                    }else{

                        echo '<button title = "Completed Date"  id ="update_complete" data-id = '.$row['CONTROL_NO'].' class = "col-lg-12 btn btn-md btn-success">
                        Completed Date<br> 
                        '.date('F d, Y',strtotime($row['POSTED_DATE'])).'
                        </button>';
                        echo '<br>';
                    }
                    }
                    
              ?>
              <br>
              <br>


            <?php 
             if($row['POSTED_DATE'] == '')
             {
                 ?>
                <button    disabled class = "btn btn-danger btn-md col-lg-12 ">
                                Approval
                        </button>
                 <?php
             }else{

             
                if($row['STATUS'] == 'Completed')
                {
                    if ($row['CONFIRMED_DATE'] != '' || $row['CONFIRMED_DATE'] != NULL){
                    ?>
                        <button    class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "approvedWebForm.php?action=approval&division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Approval
                            </a>
                        </button>
                    <?php
                    }
                    else{
                    ?>
                        <button   class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "approvedWebForm.php?action=approval&division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Approval
                            </a>
                        </button>
                    <?php
                    }
                }else if($row['STATUS'] == 'Approved'){
                    ?>
                        <button    class = "btn btn-danger btn-md col-lg-12 ">
                            <a href = "approvedWebForm.php?action=approval&division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                                Approved Date<br><?php echo date('F d, Y', strtotime($row['CONFIRMED_DATE']));?></a></button>
                            <?php
                }else{
                    ?>
                    <button    class = "btn btn-danger btn-md col-lg-12 ">
                        <a href = "approvedWebForm.php?action=approval&division=<?php echo $_GET['division'];?>&id=<?php echo $row['CONTROL_NO'];?>" style = "decoration:none;color:#fff;" >
                            Approval
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
<style>
pre { margin: 20px 0; padding: 20px; background: #fafafa; } .round { border-radius: 50%;vertical-align: }

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
                            <a href="#">Processing of Website Posting Request</a>
                        </li>
                    </ol>
                    <br>
                    <br>
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="panel panel-default">
                                    <div class="box-body">    
                                            <div> <h1>Processing of Website Posting Request</h1><br> </div>
                                            <div class="col-md-3">
                                                <div class="box box-primary" style = "background-color:#ECEFF1;">
                                                    <div class="box-body box-profile">
                                                        <h3 class="profile-username text-center">ICT Staff Work Load</h3>
                                                        <p class="text-muted text-center">FAD-RICTU</p>
                                                        <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Mark Kim">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">Database Administrator</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-73.8px;font-size:12px;">Mark Kim A. Saluti</span>
                                                                            <button onclick="$('#second_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right">
                                                                                <span class="badge badge-light" ><?php echo showICTload('Mark');?></span>
                                                                            </button>
                                                                            
                                                                        </li>
                                                                
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Louie Jake">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">ADA IV</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-30.8px;font-size:12px;">Louie Jake P. Banalan</span>
                                                                            <button onclick="$('#third_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right" >
                                                                        
                                                                                <span class="badge badge-light"><?php echo showICTload('Louie Jake');?></span>

                                                                            </button>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Shiela Mei">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">Data Analyst</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-55.8px;font-size:12px;">Shiela Mei Olivar</span>
                                                                            <button  onclick="$('#fourth_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right">
                                                                                <span class="badge badge-light"><?php echo showICTload('Shiela');?></span>
                                                                            </button>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Jomarie">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">Web Programmer</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-55.8px;font-size:12px;">Jomarie S. Sodsod</span>
                                                                            <button  onclick="$('#fifth_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right">
                                                                                <span class="badge badge-light"><?php echo showICTload('Jomarie');?></span>
                                                                            </button>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Jan Eric">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">Network Administrator</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-55.8px;font-size:12px;">Jan Eric C. Castillo</span>
                                                                            <button  onclick="$('#six_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right">
                                                                                <span class="badge badge-light"><?php echo showICTload('Jan');?></span>
                                                                            </button>
                                                                        </li>
                                                                        <li class="list-group-item">
                                                                            <img style="vertical-align:top;"  class="round" width="30" height="30" avatar="Maybelline">
                                                                            <span style="font-size:10px;vertical-align:top;line-height:10px;">Information Technology Officer I</span>
                                                                            <span style="font-size:10px;line-height:40px;50px;margin-left:-135.8px;font-size:12px;">Maybelline Monteiro</span>
                                                                            <button  onclick="$('#seventh_tab').trigger('click')" type="button" class="btn btn-sm btn-danger pull-right">
                                                                                <span class="badge badge-light"><?php echo showICTload('Maybelline');?></span>
                                                                            </button>
                                                                        </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="box box-primary" style = "background-color:#ECEFF1;">
                                                    <div class="box-body box-profile">
                                                        <h3 class="profile-username text-center">Generate Monthly Report</h3>
                                                        <p class="text-muted text-center">Website Posting Report</p>
                                                        <div class="box-body" >
                                                            <div class = "row">
                                                                <div class = "col-lg-6">
                                                                <select class="form-control" id = "months">
                                                                <?php
                                                                   for ($i = 0; $i < 12; $i++) {
                                                                    $time = strtotime(sprintf('%d months', $i));   
                                                                    $label = date('F', $time);   
                                                                    $value = date('n', $time);
                                                                    echo "<option value='$value'>$label</option>";
                                                                }
                                                                ?>
                                                                </select>
                                                                </div>
                                                                <div class = "col-lg-6">
                                                                <select class="form-control" id = "year">
                                                                    <option value = "2020">2020</option>
                                                                    <option value = "2021">2021 </option>
                                                                </select>
                                                                </div>
                                                            
                                                        
                                                        </div>
                                                       
                                                        <button class="btn btn-md btn-success" id = "export_logsheet" style="width:100%;margin-top:5px;">Export Summary Log Sheet</button>
                                                        <button class="btn btn-md btn-success" id = "export_monitoring_logsheet" style="width:100%;margin-top:5px;">Export Monitoring Log Sheet</button>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="box box-primary direct-chat direct-chat-primary" style="background-color: #ECEFF1;">
                                                    <div class="box-header with-border">
                                                        <div class="box-body" >
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
                                                                        <thead style="background-color: #78909C;">
                                                                            <th style="color:#212121;font-size:large;">ASSISTED BY</th>
                                                                            <th style="color:#212121;font-size:large;">PARTICULAR</th>
                                                                            <th style="color:#212121;font-size:large;">ACTION</th>
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

<script src="_includes/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
<script src="_includes/sweetalert2.min.js" type="text/javascript"></script>


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script type="text/javascript">
$('#export_logsheet').click(function(){
    let sel_year = $('#year').val();
    let sel_month = $('#months').val();
    window.location = "export_logsheet.php?year="+sel_year+"&month="+sel_month;
})
$('#export_monitoring_logsheet').click(function(){
    let sel_year = $('#year').val();
    let sel_month = $('#months').val();
    window.location = "export_monitoring_logsheet.php?year="+sel_year+"&month="+sel_month;
})
$('.sweet-14').click(function()
    {
        var ids=$(this).data('id');
        swal({
            title: 'Assign to:',
            input: 'select',
            inputOptions: {
            'Mark Kim A. Sacluti': 'Mark Kim A. Sacluti',
            'Louie Jake P. Banalan': 'Louie Jake P. Banalan',
            'Shiela Mei E. Olivar':'Shiela Mei E. Olivar',
            'Jomarie S. Sodsod':'Jomarie S. Sodsod',
            'Jan Eric C. Castillo':'Jan Eric C. Castillo',
            'Maybelline Monteiro':'Maybelline Monteiro',
            },
            inputPlaceholder: 'Select ICT Staff',
            showCancelButton: true,
            inputValidator: function (value) {
            return new Promise(function (resolve, reject) {
                if (value === 'Mark Kim A. Sacluti') {
                resolve()
                }else if(value == 'Louie Jake P. Banalan')
                {
                resolve()
                }else if(value == 'Shiela Mei E. Olivar'){
                resolve()
                }else if(value == 'Jomarie S. Sodsod'){
                resolve()
                }else if(value == 'Jan Eric C. Castillo'){
                resolve()
                }
                else{
                resolve()
                }
            })
            }
        }).then(function (result) {
            swal({
            type: 'success',
            html: 'Successfully approved by:' + result,
            closeOnConfirm: false
            })
            $.ajax({
            url:"_webPostFunc/functions.php",
            method:"POST",
            data:{
                options:'assign',
                ict_staff:result,
                control_no:ids
            },
         success:function(data)
              {
                  setTimeout(function () {
                  swal("Ticket No.already assigned!");
                  window.location = 'webForm_monitoring.php';

                  }, 3000);
              }
            });
        });
    });
$(document).on('click','.sweet-17',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
      swal("Control No: "+ids, "You already received this request", "success")
        .then(function () {
            $.ajax({
              url:"_webPostFunc/functions.php",
              method:"POST",
              data:{
                  options:'received',
                  id:ids
              },
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Record saved successfully!");
                  }, 5000);
                  window.location = "webForm_monitoring.php";
              }
            });
        });
    });
$(document).on('click','#sweet-16',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
        swal({
            title: "Are you sure you already finished with this request?",
            text: "Control No:"+ids,
            type: "info",
            showCancelButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            $.ajax({
            //   url:"_ticketReleased.php",
            //   method:"POST",
            //   data:{
            //       id:ids,
            //       option:'complete'
            //   },
              
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Service Complete!");
                  }, 3000);
                  window.location = "completedwebForm.php?division=<?php echo $_GET['division']?>&id="+ids;
              }
            });
        });
    });
$(document).on('click','#update_complete',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
        swal({
            title: "Are you sure you already finished with this request?",
            text: "Control No:"+ids,
            type: "info",
            showCancelButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            $.ajax({
            //   url:"_ticketReleased.php",
            //   method:"POST",
            //   data:{
            //       id:ids,
            //       option:'complete'
            //   },
              
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Service Complete!");
                  }, 3000);
                  window.location = "completedwebForm.php?action=edit&division=<?php echo $_GET['division']?>&id="+ids;
              }
            });
        });
    });
</script>

<script>
$('document').ready(function () {

    // DATATABLE

    $('#example2').DataTable({
        <?php 
if($_GET['ticket_id'] == null)
{

}else{
  
    echo ' "search": {
        "search": "'.$_GET['ticket_id'].'"
      },';
}

?>
        'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
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
<script>
            /*
                * LetterAvatar
                * 
                * Artur Heinze
                * Create Letter avatar based on Initials
                * based on https://gist.github.com/leecrossley/6027780
                */
                (function(w, d){


            function LetterAvatar (name, size) {

                name  = name || '';
                size  = size || 60;

                var colours = [
                        "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
                        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                    ],

                    nameSplit = String(name).toUpperCase().split(' '),
                    initials, charIndex, colourIndex, canvas, context, dataURI;


                if (nameSplit.length == 1) {
                    initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
                } else {
                    initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
                }

                if (w.devicePixelRatio) {
                    size = (size * w.devicePixelRatio);
                }
                    
                charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
                colourIndex   = charIndex % 20;
                canvas        = d.createElement('canvas');
                canvas.width  = size;
                canvas.height = size;
                context       = canvas.getContext("2d");
                
                context.fillStyle = colours[colourIndex - 1];
                context.fillRect (0, 0, canvas.width, canvas.height);
                context.font = Math.round(canvas.width/2)+"px Arial";
                context.textAlign = "center";
                context.fillStyle = "#FFF";
                context.fillText(initials, size / 2, size / 1.5);

                dataURI = canvas.toDataURL();
                canvas  = null;

                return dataURI;
            }

            LetterAvatar.transform = function() {

                Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
                    name = img.getAttribute('avatar');
                    img.src = LetterAvatar(name, img.getAttribute('width'));
                    img.removeAttribute('avatar');
                    img.setAttribute('alt', name);
                });
            };


            // AMD support
            if (typeof define === 'function' && define.amd) {
                
                define(function () { return LetterAvatar; });

            // CommonJS and Node.js module support.
            } else if (typeof exports !== 'undefined') {
                
                // Support Node.js specific `module.exports` (which can be a function)
                if (typeof module != 'undefined' && module.exports) {
                    exports = module.exports = LetterAvatar;
                }

                // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
                exports.LetterAvatar = LetterAvatar;

            } else {
                
                window.LetterAvatar = LetterAvatar;

                d.addEventListener('DOMContentLoaded', function(event) {
                    LetterAvatar.transform();
                });
            }

            })(window, document);
</script>