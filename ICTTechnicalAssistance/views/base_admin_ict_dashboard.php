<div class="content-wrapper">
  <section class="content-header">
    <h1>ICT Technical Assistance Monitoring</h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">RICTU</a></li>
      <li class="active">ICT Technical Assistance Monitoring</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <?php //include('_panel/box.html.php'); 
      ?>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php //include('tiles/ict_status.html.php');
        ?>
      </div>
      <div class="col-md-4">
        <?php //include('tiles/ict_frequent_issues.html.php');
        ?>

      </div>
      <div class="col-md-4">

      </div>

      <div class="col-md-12">
        <div class="col-lg-12">
          <div class="box box-warning dropbox">
            
            <div class="box-body custom-box-body" >
          <button id="btn_create" class="btn-lg  btn-default" style="background:linear-gradient(90deg,#64B5F6,#0D47A1);color:#fff;">Create ICT Request</button>
          <?php if($_SESSION['username'] == 'masacluti'):?>
          <button id="btn_report" class="btn-lg  btn-success" style="background:linear-gradient(90deg,#81C784,#1B5E20);color:#fff;"><i class="fa  fa-file-excel-o"></i> Generate Reports</button>
          <?php endif;?>
          <button id="btn_qms" class="btn-lg btn-warning" style="background:linear-gradient(90deg,#FFD54F,#FF6F00);color:#fff;"><i class="fa fa-book"></i>QMS Reports</</button>
              
            </div>
          </div>
         
        </div>
        <div class="col-lg-12">
          <?php include('tiles/ict_monitoring.html.php'); ?>

        </div>
      </div>
    </div>
  </section>
</div>
 <!-- //foreach ($rictu_opts as $key => $data) -->
<!--                 
                <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                  <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#f3eff5">
                    <div class="media">
                      <div class="pull-left" style="width:65px; height:65px;">
                        <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/profile/ $data['rictu_staff'][$key];?>.jpg" alt="...">
                      </div>
                      <div class="media-body">
                        <div class="media-content">
                          <small> $data['position'][$key];?></small><br>
                        </div>

                        <div class="media-content" style="margin-top: -1%;">
                          <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;"> $data['rictu_staff'][$key];?></b>
                        </div>

                        <div class="media-content" style="margin-top: -1%;">
                          <small><i class="fa fa-envelope"></i> $data['email_address'][$key];?></small>
                        </div>
                        <div class="media-content" style="margin-top: -2%;">
                          <small><i class="fa fa-phone"></i> $data['contact_details'][$key];?></small>
                          <ul class="list-unstyled pull-right">
                            <span class="label label-warning label2"> //count($workload['ongoing'][$key]);?></span>
                            <span class="label label-primary label2"> count($workload['completed'][$key]);?></span>
                            <span class="label label-success label2"> count($workload['for rating'][$key]);?></span>
                          </ul>
                        </div>



                      </div>
                    </div>
                  </a>
                </div> -->
              <!-- endforeach; -->