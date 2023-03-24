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