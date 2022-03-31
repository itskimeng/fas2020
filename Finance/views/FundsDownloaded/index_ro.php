<?php require_once 'Finance/controller/FundsDownloadedController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Funds Downloaded - Cavite</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li class="active">Funds Downloaded</li>
    </ol> 
  </section>
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary dropbox">
          <div class="box-header with-border">
            <h3 class="box-title">CALABARZON</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-8">
                      <div style="margin: auto; margin-left: 267px; width: 375px;">
                          <img class="calabarzon-map calabarzon-map-quezon" src="images/maps/quezon.png" style="max-width: 100%;">
                      </div>

                      <div style="margin-top: -357.9px; margin-left: 208.6px; width: 377.5px;">
                          <img class="calabarzon-map calabarzon-map-batangas" src="images/maps/batangas.png" style="max-width: 100%;">
                      </div>

                      <div style="margin-top: -356.5px; margin-left: 210px; width: 373px;">
                          <img class="calabarzon-map calabarzon-map-laguna" src="images/maps/laguna.png" style="max-width: 100%;">
                      </div>

                      <div style="margin-top: -346.1px; margin-left: 212px; width: 357px;">
                          <img class="calabarzon-map calabarzon-map-cavite" src="images/maps/cavite.png" style="max-width: 100%;">
                      </div>

                      <div style="margin-top: -345.8px; margin-left: 210.9px; width: 367px;">
                          <img class="calabarzon-map calabarzon-map-rizal" src="images/maps/rizal.png" style="max-width: 100%;">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box box-widget widget-user-2 dropbox">
                      <div class="box-header" style="background-color: #c3c3c3;">
                        <center>
                          <h4><b>PROVINCES</b></h4>
                        </center>
                      </div>
                      <div class="box-body">
                        <ul class="nav nav-stacked">
                          <li>
                            <a href="funds_downloaded_cavite.php" class="zoom-cavite"><b>CAVITE</b> <span class="pull-right"><b>₱8,000,000.00</b></span></a>
                          </li>
                          <li><a href="funds_downloaded_laguna.php" class="zoom-laguna"><b>LAGUNA</b> <span class="pull-right"><b>₱6,500,000.00</b></span></a></li>
                          <li><a href="funds_downloaded_batangas.php" class="zoom-batangas"><b>BATANGAS</b> <span class="pull-right"><b>₱5,500,000.00</b></span></a></li>
                          <li><a href="funds_downloaded_rizal.php" class="zoom-rizal"><b>RIZAL</b> <span class="pull-right"><b>₱8,500,000.00</b></span></a></li>
                          <li><a href="funds_downloaded_quezon.php" class="zoom-quezon"><b>QUEZON</b> <span class="pull-right"><b>₱4,800,000.00</b></span></a></li>
                          <li><a href="funds_downloaded_lucena.php" class="zoom"><b>LUCENA CITY</b> <span class="pull-right"><b>₱9,800,000.00</b></span></a></li>
                          <li><a href="#" readonly><b>TOTAL FUND SOURCE</b> <span class="pull-right"><b>₱43,100,000.00</b></span></a></li>
                        </ul>
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

<style type="text/css"><?php include 'custom.css'; ?></style>

<script type="text/javascript">

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>

  $(document).ready(function(){
    

    // $(document).on('mouseenter', '.zoom-quezon', function(){
    //   $('.calabarzon-map-quezon').css('transform', 'scale('+1.05+')');
    // });

    $('.zoom-quezon').hover(function() {
      $('.calabarzon-map-quezon').css('transform', 'scale('+1.05+')');
    }, function() {
      $('.calabarzon-map-quezon').css('transform', '');                 
    });

    $('.zoom-cavite').hover(function() {
      $('.calabarzon-map-cavite').css('transform', 'scale('+1.05+')');
    }, function() {
      $('.calabarzon-map-cavite').css('transform', '');                 
    });

    $('.zoom-batangas').hover(function() {
      $('.calabarzon-map-batangas').css('transform', 'scale('+1.05+')');
    }, function() {
      $('.calabarzon-map-batangas').css('transform', '');                 
    });

    $('.zoom-rizal').hover(function() {
      $('.calabarzon-map-rizal').css('transform', 'scale('+1.05+')');
    }, function() {
      $('.calabarzon-map-rizal').css('transform', '');                 
    });

    $('.zoom-laguna').hover(function() {
      $('.calabarzon-map-laguna').css('transform', 'scale('+1.05+')');
    }, function() {
      $('.calabarzon-map-laguna').css('transform', '');                 
    });

  });

</script>