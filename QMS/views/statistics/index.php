<?php require_once 'QMS/controller/QMSStatisticsController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Quality Management System</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">Quality Management System</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <?php include 'top.php'; ?>
        <?php include 'mid.php'; ?>
        <?php include 'bottom.php'; ?>
      </div>
      <div class="col-md-4">
        <?php include 'right.php'; ?>
      </div>	
    </div>
    
  </section>
</div>

<style type="text/css">
  .bg-green-custom {
    background-color: #17948e !important;
  }

  .bg-aqua-custom {
    background-color: #2ec0cd !important;
  }

  .bg-pink-custom {
    background-color: #f38cb7 !important;
  }

  .bg-yellow-custom {
    background-color: #f1cf64 !important;
  }

  .custom-border {
    border: solid 5px;
  }

  time.icon
  {
    font-size: 7px; /* change icon size */
    display: block;
    position: relative;
    width: 7em;
    height: 7em;
    background-color: #fff;
    /*margin: 2em auto;*/
    border-radius: 0.6em;
    box-shadow: 0 1px 0 #bdbdbd, 0 2px 0 #fff, 0 3px 0 #bdbdbd, 0 4px 0 #fff, 0 5px 0 #bdbdbd, 0 0 0 1px #bdbdbd;
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    -webkit-transform: rotate(0deg) skewY(0deg);
    -webkit-transform-origin: 50% 10%;
    transform-origin: 50% 10%;
  }

  time.icon *
  {
    display: block;
    width: 100%;
    font-size: 1em;
    font-weight: bold;
    font-style: normal;
    text-align: center;
  }

  time.icon strong
  {
    position: absolute;
    top: 0;
    padding: 0.4em 0;
    color: #fff;
    background-color: #fd9f1b;
    border-bottom: 1px dashed #f37302;
    box-shadow: 0 2px 0 #fd9f1b;
  }

  time.icon em
  {
    position: absolute;
    bottom: 0.3em;
    color: #fd9f1b;
  }

  time.icon span
  {
    width: 100%;
    font-size: 2.8em;
    letter-spacing: -0.05em;
    padding-top: 0.8em;
    color: #2f2f2f;
  }

  .move-calendar:hover time, .move-calendar:focus time
  {
    -webkit-animation: swing 0.6s ease-out;
    animation: swing 0.6s ease-out;
  }

  @-webkit-keyframes swing {
    0%   { -webkit-transform: rotate(0deg)  skewY(0deg); }
    20%  { -webkit-transform: rotate(12deg) skewY(4deg); }
    60%  { -webkit-transform: rotate(-9deg) skewY(-3deg); }
    80%  { -webkit-transform: rotate(6deg)  skewY(-2deg); }
    100% { -webkit-transform: rotate(0deg)  skewY(0deg); }
  }

  @keyframes swing {
    0%   { transform: rotate(0deg)  skewY(0deg); }
    20%  { transform: rotate(12deg) skewY(4deg); }
    60%  { transform: rotate(-9deg) skewY(-3deg); }
    80%  { transform: rotate(6deg)  skewY(-2deg); }
    100% { transform: rotate(0deg)  skewY(0deg); }
  }

</style>