<?php require_once 'dashboard_tiles/controller/dashboardController.php'; ?>

<style type="text/css">
  .info-box {
    box-shadow: 0 1px 2px rgb(0 0 0 / 47%);
  }
</style>
<style>
  /* Custom nav-tabs */
  .tab-content {
    border-bottom: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    display: block;
    border-radius: 0 0 0.25em 0.25em;
  }

  .tab-content .tab-pane {
    text-align: left;
    padding: 10px;
  }

  .tab-content .tab-pane h3 {
    margin: 0;
  }

  .cd-breadcrumb {
    padding: 6px 7px;
    margin: 0;
    background-color: transparent;
    border-radius: 0.25em 0.25em 0 0;
  }

  .cd-breadcrumb.nav-tabs {
    border-left: 1px solid #ddd;
    border-top: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: none;
  }

  .cd-breadcrumb.nav-tabs>li.active>a,
  .cd-breadcrumb.nav-tabs>li.active>a:hover,
  .cd-breadcrumb.nav-tabs>li.active>a:focus {
    color: #fff;
    background-color: #144677;
    border: 0px solid #144677;
    cursor: default;
  }

  .cd-breadcrumb.nav-tabs>li>a {
    margin-right: inherit;
    line-height: inherit;
    height: 48px;
    border: inherit;
    border-radius: inherit;
    border-color: #edeff0;
  }

  .cd-breadcrumb li {
    display: inline-block;
    float: left;
    margin: 0.5em 0;
  }

  .cd-breadcrumb li::after {
    /* this is the separator between items */
    display: inline-block;
    content: '\00bb';
    margin: 0 0.6em;
    color: tint(#144677, 50%);
  }

  .cd-breadcrumb li:last-of-type::after {
    /* hide separator after the last item */
    display: none;
  }

  .cd-breadcrumb li>* {
    /* single step */
    display: inline-block;
    font-size: 1.4rem;
    color: #144677;
  }

  .cd-breadcrumb li.current>* {
    /* selected step */
    color: #144677;
  }

  .cd-breadcrumb a:hover {
    /* steps already visited */
    color: #144677;
  }

  .cd-breadcrumb.custom-separator li::after {
    /* replace the default arrow separator with a custom icon */
    content: '';
    height: 16px;
    width: 16px;
    vertical-align: middle;
  }

  .cd-breadcrumb li {
    margin: 1.2em 0;
  }

  .cd-breadcrumb li::after {
    margin: 0 1em;
  }

  .cd-breadcrumb li>* {
    font-size: 1.6rem;
  }

  .cd-breadcrumb.triangle li {
    position: relative;
    padding: 0;
    margin: 0 4px 0 0;
  }

  .cd-breadcrumb.triangle li:last-of-type {
    margin-right: 0;
  }

  .cd-breadcrumb.triangle li .octicon {
    margin-right: 10px;
  }

  .cd-breadcrumb.triangle li>* {
    position: relative;
    padding: 0.8em 0.8em 0.7em 2.5em;
    color: #333;
    background-color: #edeff0;
    /* the border color is used to style its ::after pseudo-element */
    border-color: #edeff0;
  }

  .cd-breadcrumb.triangle li.active>* {
    /* selected step */
    color: #fff;
    background-color: #144677;
    border-color: #144677;
  }

  .cd-breadcrumb.triangle li:first-of-type>* {
    padding-left: 1.6em;
    border-radius: 4px 0 0 4px;
  }

  .cd-breadcrumb.triangle li:last-of-type>* {
    padding-right: 1.6em;
    border-radius: 0 0.25em 0.25em 0;
  }

  .cd-breadcrumb.triangle a:hover {
    /* steps already visited */
    color: #fff;
    background-color: #144677;
    border-color: #144677;
    text-decoration: none;
  }

  .cd-breadcrumb.triangle li::after,
  .cd-breadcrumb.triangle li>*::after {
    /* li > *::after is the colored triangle after each item li::after is the white separator between two items */
    content: '';
    position: absolute;
    top: 0;
    left: 100%;
    content: '';
    height: 0;
    width: 0;
    /* 48px is the height of the <a> element */
    border: 24px solid transparent;
    border-right-width: 0;
    border-left-width: 20px;
  }

  .cd-breadcrumb.triangle li::after {
    /* this is the white separator between two items */
    z-index: 1;
    -webkit-transform: translate(4px, 0);
    -ms-transform: translate(4px, 0);
    -o-transform: translate(4px, 0);
    transform: translate(4px, 0);
    border-left-color: #fff;
    /* reset style */
    margin: 0;
  }

  .cd-breadcrumb.triangle li>*::after {
    /* this is the colored triangle after each element */
    z-index: 2;
    border-left-color: inherit;
  }

  .cd-breadcrumb.triangle li:last-of-type::after,
  .cd-breadcrumb.triangle li:last-of-type>*::after {
    /* hide the triangle after the last step */
    display: none;
  }


  .banner_rank0 span {
    position: absolute;
    top: 0;
    width: 0;
    height: 0;
    right: 0;
    text-align: center;
    font-size: 16px;
    font-family: arial;
    transform: rotate(45deg);
  }

  .banner_rank1 span {
    position: absolute;
    top: 0;
    width: 0;
    height: 0;
    right: 0;
    text-align: center;
    font-size: 16px;
    font-family: arial;
    transform: rotate(45deg);
  }

  .banner_rank2 span {
    position: absolute;
    top: 0;
    width: 0;
    height: 0;
    right: 0;
    text-align: center;
    font-size: 16px;
    font-family: arial;
    transform: rotate(45deg);
  }

  .banner_rank3 span {
    position: absolute;
    top: 0;
    width: 0;
    height: 0;
    right: 0;
    text-align: center;
    font-size: 16px;
    font-family: arial;
    transform: rotate(45deg);
  }

  .banner_rank0:after {
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 60px 60px 0;
    border-color: transparent #B71C1C transparent transparent;
    right: 0;
    top: 0;
    position: absolute;
  }

  .banner_rank1:after {
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 60px 60px 0;
    border-color: transparent #1B5E20 transparent transparent;
    right: 0;
    top: 0;
    position: absolute;
  }

  .banner_rank2:after {
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 60px 60px 0;
    border-color: transparent #1A237E transparent transparent;
    right: 0;
    top: 0;
    position: absolute;
  }

  .banner_rank3:after {
    content: '';
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 60px 60px 0;
    border-color: transparent #FFEA00 transparent transparent;
    right: 0;
    top: 0;
    position: absolute;
  }
</style>
<style type="text/css">
  div.box-emp::-webkit-scrollbar {
    width: 12px;
  }

  div.box-emp::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.3);
    border-radius: 2px;
  }

  div.box-emp::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.5);
  }



  .program_list>a,
  .program_activity:hover {
    background-color: lightgray;
  }

  .faq-content #accordion .panel-title>a.accordion-toggle::before,
  .faq-content #accordion a[data-toggle="collapse"]::before {
    content: "−";
    float: left;
    font-family: 'Glyphicons Halflings';
    margin-right: 1em;
    margin-left: 10px;
    color: #fff;
    font-size: 13px;
    font-weight: 300;
    display: inline-block;
    width: 20px;
    height: 20px;
    line-height: 20px;

    border-radius: 50%;
    text-align: center;
    font-size: 10px;
    background: #ff9900;
  }

  .faq-content #accordion .panel-title>a.accordion-toggle.collapsed::before,
  .faq-content #accordion a.collapsed[data-toggle="collapse"]::before {
    content: "+";
    color: #fff;
    font-size: 10px;
    font-weight: 300;
    background: #333;
  }

  .faq-content {
    float: left;
    width: 100%;
  }

  .faq-content .panel-heading {
    padding-left: 0px;
    border-radius: 0px !important;
  }

  .faq-content .panel-heading a {
    text-decoration: none;
  }

  .faq-content .panel {
    border-radius: 0px !important;
  }

  .faq-content .panel-default {}

  .faq-content .panel-heading {
    background: #f3f3f3 !important;
    color: #666666;
  }

  .faq-content .panel-body {
    font-size: 14px;
    color: #666666;
  }

  .faq-saelect {
    background: #f3f3f3;
    padding: 15px;
    border-bottom: 2px solid #666666;
    float: left;
    width: 100%;
    margin-bottom: 20px;
    margin-top: -10px;
  }

  .faq-saelect span {
    font-size: 16px;
    color: #333;
    margin-right: 20px;
  }

  .faq-saelect select {
    border: 1px solid #dcdcdc;
    color: #999999;
    width: 300px;
    height: 40px;
  }

  .faq-content .panel {
    border-top: none !important;
    border-right: none !important;
    border-left: none !important;
  }

  .faq-content .panel-body {
    border: 1px solid #f3f3f3;
  }
</style>
<script>
  $(document).ready(function() {

    $("#ck").click(function() {
      if ($(this).prop("checked") == true) {
        $('#s3').prop("disabled", false);
        $('#s2').prop("disabled", false);
      } else if ($(this).prop("checked") == false) {
        $('#s3').prop("disabled", true);
        $('#s2').prop("disabled", true);
      }
    });
  });
</script>
<script>
  document.getElementById('to').onchange = function() {
    document.getElementById('t_o').disabled = !this.checked;
  };

  function yesnoCheck() {
    $(".H1").hide();
    $(".H2").show();
    if ($('#to').is(':checked')) {

    } else {
      $(".H1").show();
      $(".H2").hide();
    }
  }

  document.getElementById('ob').onchange = function() {
    document.getElementById('o_b').disabled = !this.checked;
  };

  function yesnoCheck1() {
    $(".H1").hide();
    $(".H22").show();
    if ($('#ob').is(':checked')) {} else {
      $(".H1").show();
      $(".H22").hide();
    }
  }
</script>
<script type="text/javascript">
  setInterval(displayclock, 1000);

  function displayclock() {
    var time = new Date();
    var hrs = time.getHours();
    var min = time.getMinutes();
    var sec = time.getSeconds();

    if (hrs > 12) {
      hrs = hrs - 12;
    }

    if (hrs == 0) {
      hrs = 12;
    }
    if (min < 10) {
      min = '0' + min;
    }

    if (hrs < 10) {
      hrs = '0' + hrs;
    }

    if (sec < 10) {
      sec = '0' + sec;
    }

    document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec;
  }
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard</h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="#">Dashboard</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
    </div>
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>
    <div class="row">


      <div class="col-md-12">
        <div class="row">
          <?php include 'dashboard_tiles/standard_time.php';
          ?>
          <?php include 'dashboard_tiles/calendar_events.php';
          ?>
        </div>
      </div>


      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <img class="direct-chat-img" src="images/male-user.png" alt="message user image">
            <h3 class="box-title" style="line-height:40px;"><i class="fa fa-graph"></i>
              IP Phone Telephony Directory</h3>
          </div>
          <div class="box-body custom-box-body no-padding" style="height:250px;overflow:auto;">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">DIVISION/SECTION</th>
                  <th rowspan="2" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">DIRECTORY</th>

                </tr>


              </thead>
              <tbody id="list_body">
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>RD Secretary</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7401</b></td>
                </tr>
                <tr>

                  <td style="text-align: center; vertical-align: middle;"><b>ORD-Planning</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7430</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>ORD-RICTU</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7406</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>LGMED</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7405</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>LGCDD</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b></b></td>


                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>FAD-Personnel</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7403</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>FAD-Accounting & Budget</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7409</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>FAD-GSS & Records</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7410</b></td>

                </tr>
                <tr>
                  <td style="text-align: center; vertical-align: middle;"><b>Security Guard</b></td>
                  <td style="text-align: center; vertical-align: middle;"><b>7400</b></td>

                </tr>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title" style="font-size:14px;"><i class="fa fa-graph"></i>USE OF BIOMETRICS DEVICE FOR ATTENDANCE MONITORING IN THE REGIONAL OFFICE</h3>
          </div>
          <div class="box-body custom-box-body no-padding" style="height:250px;">

            <!-- <?php if ($_SESSION['OFFICE_STATION'] == 1) : ?>
              <object class="memo" type="application/pdf" data="dashboard_tiles/R220512-16716_MEMO.pdf#toolbar=0" width="100%" height="295px">
                <parm name="view" value="FitH" />
              </object>
            <?php else : ?>
              <object class="memo" type="application/pdf" data="dashboard_tiles/po_memo.pdf#toolbar=0" width="100%" height="295px">
                <parm name="view" value="FitH" />
              </object>
            <?php endif ?> -->
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Birthday Celebrants</h3>
          </div>
          <div class="box" style="color:black;">

            <div class="box-header" style="color:black;">
              <div class="list-group contact-group zoom" style="margin-bottom: 5px;overflow:auto;height:250px;">

                <?php
                foreach ($birthdays as $key => $data) {
                ?>
                  <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#ECEFF1">
                    <div class="media">
                      <div class="pull-left" style="width:65px; height:65px;margin-top: -1%;">
                        <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="<?= $data['PROFILE']; ?>" alt="...">
                      </div>
                      <div class="media-body">

                        <div class="media-content" style="margin-top: -1%;">
                          <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;"><?= $data['FIRST_M']; ?></b>
                        </div>

                        <div class="media-content" style="margin-top: -1%;">
                          <small><i class="fa fa-calendar"></i><?= $data['BIRTH_D']; ?></small>
                        </div>
                        <div class="media-content" style="margin-top: -1%;">
                          <small><i class="fa fa-phone"></i> 0927-120-6718</small>
                          <ul class="list-unstyled pull-right">
                            <span class="label label-default label2"><?= $b_day; ?></span>

                          </ul>
                        </div>



                      </div>
                    </div>
                  </a>
                  <BR>
                <?php
                }
                ?>


              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">

        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Procurement Progress</h3>
          </div>
          <div class="box-body custom-box-body" style="height:500px;">
            <div class="table-responsive">
              <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#Ideate" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                    <i class="fa fa-list" aria-hidden="true"></i> Purchase Request Type per Division
                  </a>
                </li>
                <li role="presentation" class="">
                  <a href="#Submit" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-list" aria-hidden="true"></i>Purchase Request per Month
                  </a>
                </li>
                <!-- <li role="presentation" class="">
                  <a href="#Submit" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-list" aria-hidden="true"></i>Utilization Rate
                  </a>
                </li>
                <li role="presentation" class="">
                  <a href="#Submit" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-list" aria-hidden="true"></i>Funds per Division
                  </a>
                </li> -->
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="Ideate">

                  <table class="table table-bordered" style="font-size:10pt;">
                    <thead>
                      <tr>
                        <th rowspan="2" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">Division</th>
                        <th rowspan="2" class="header_pink" style="vertical-align: middle;">Total No. of Catering Services</th>
                        <th rowspan="2" class="header_yellow" style="vertical-align: middle;">Total No. of Meals, Venue and Accomodation </th>
                        <th rowspan="2" class="header_yellow" style="vertical-align: middle;">Total No. of Repair and Maintenance</th>
                        <th rowspan="2" class="header_yellow" style="vertical-align: middle;">Total No. of Supplies, Materials and Devices</th>
                        <th rowspan="2" class="header_yellow" style="vertical-align: middle;">Total No. of Other Services</th>
                        <th rowspan="2" class="header_yellow" style="vertical-align: middle;">Total No. of Reimbursement and Petty Cash</th>
                      </tr>


                    </thead>
                    <tbody id="list_body">
                      <tr  style="background-color: #8ae38a;">
                        <td style="text-align: center; vertical-align: middle;"><b>TOTAL</b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_catering_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_mva_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_repair_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_smd_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_other_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['total_rpc_serv']; ?></b></td>
                      </tr>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><b>FAD</b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_catering_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_mva_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_repair_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_smd_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_other_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['fad_rpc_serv']; ?></b></td>
                      </tr>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><b>LGCDD</b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_catering_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_mva_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_repair_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_smd_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_other_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgcdd_rpc_serv']; ?></b></td>
                      </tr>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><b>LGMED</b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_catering_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_mva_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_repair_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_smd_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_other_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['lgmed_rpc_serv']; ?></b></td>
                      </tr>
                      <tr>
                        <td style="text-align: center; vertical-align: middle;"><b>ORD</b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_catering_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_mva_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_repair_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_smd_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_other_serv']; ?></b></td>
                        <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $report_opts['ord_rpc_serv']; ?></b></td>
                      </tr>



                    </tbody>
                  </table>

                </div>
                <div role="tabpanel" class="tab-pane" id="Submit">
                  <span class="pull-right hidden-xs"><small>
                      <input type="radio" name="mychart" class="mychart" id="column" value="column" onclick="chartfunc()">Column
                      <input type="radio" name="mychart" class="mychart" id="bar" value="bar" onclick="chartfunc()" checked>Bar
                      <input type="radio" name="mychart" class="mychart" id="pie" value="pie" onclick="chartfunc()">Pie
                      <input type="radio" name="mychart" class="mychart" id="line" value="line" onclick="chartfunc()">Line
                    </small></span>




                  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>




                </div>
                <div role="tabpanel" class="tab-pane" id="Discuss">
                  c
                </div>
                <!-- <div role="tabpanel" class="tab-pane" id="GetValidated">
                  d

                </div>
                <div role="tabpanel" class="tab-pane" id="Work">
                </div> -->
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Supplier's Rankings</h3>
          </div>
          <div class="box-body custom-box-body" style="height:500px;">
            <?php foreach ($supplier_rank as $key => $item) : ?>
              <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#ECEFF1;margin-top:5px;">
                <div class="media">
                  <div class="pull-left" style="width:65px; height:65px;margin-top: -1%;">
                    <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/logo.png" alt="...">
                  </div>
                  <div class="media-body">

                    <div class="media-content" style="margin-top: 1%;">
                      <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;"><?= $item['supplier_title']; ?></b>
                    </div>

                    <div class="media-content" style="margin-top: -1%;">
                      <small><i class="fa fa-map-marker"></i><?= $item['supplier_address']; ?></small>
                    </div>
                    <div class="media-content" style="margin-top: -1%;">
                      <small><i class="fa fa-phone"></i> <?= $item['contact_details']; ?></small>
                      <ul class="list-unstyled pull-right">
                        <span class="label label-default label2"></span>

                      </ul>
                    </div>

                    <div class="banner_rank<?= $key; ?>">
                      <span>1st</span>
                    </div>

                  </div>
                </div>
              </a>
            <?php endforeach; ?>


          </div>
        </div>
      </div>
      <!-- <div class="col-md-8">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Driver's Monitoring</h3>
          </div>
          <div class="box-body custom-box-body" style="height:500px;">
            <div id='calendar' style="width:auto;height:50%;border:none!important;"></div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Supplier's Rankings</h3>
          </div>
          <div class="box-body custom-box-body" style="height:500px;">



          </div>
        </div>
      </div> -->
      <?php include 'dashboard_tiles/employees.php'; ?>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>ICT Technical Assistance Request</b> </h3>
          </div>
          <div class="box-body custom-box-body" style="height: 374px; max-height: 374px; overflow-y: auto;">
            <div class="about-page-content testimonial-page">
              <div class="faq-content">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php foreach ($ict as $key => $item) : ?>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                          <a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#faq_<?= $item['id']; ?>" aria-expanded="false">
                            <span><?= $item['control_no']; ?></span>
                          </a>
                        </h4>
                      </div>
                      <div id="faq_<?= $item['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $item['id']; ?>" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                          <ul class="fa-ul">
                            <li style="display: block; margin-left: 3%">
                              <a class="program_activity" href="base_planner_subtasks.html.php?event_planner_id=974&amp;username=masacluti&amp;division=1" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                                <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                                <div class="row ddd_list">
                                  <div class="col-md-7" style="padding-bottom: 5px;">
                                    <div style="border-right: 1px solid #dbdbdb;">
                                      <?= $item['request_type']; ?> - <?= $item['issue']; ?></div>
                                  </div>
                                  <div class="col-md-5">
                                    <?= $item['request_date']; ?> </div>
                                </div>
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>





                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Issuances</h3>
          </div>
          <div class="box-body custom-box-body " style="height: 374px; max-height: 374px; overflow-y: auto;">
            <?php foreach ($issuances as $key => $item) : ?>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                  <h4 class="panel-title">
                    <a class="collapsed" style="color: black !important;" role="button" data-toggle="collapse" data-parent="#accordion" href="#faq_<?= $item['id']; ?>" aria-expanded="false">
                      <span><?= $item['issuance_no']; ?></span>
                    </a>
                  </h4>
                </div>
                <div id="faq_<?= $item['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $item['id']; ?>" aria-expanded="false" style="height: 0px;">
                  <div class="panel-body">
                    <ul class="fa-ul">
                      <li style="display: block; margin-left: 3%">
                        <a class="program_activity" href="base_planner_subtasks.html.php?event_planner_id=974&amp;username=masacluti&amp;division=1" style="color:black; font-weight:normal;" onhover="changeColor(this)">
                          <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                          <div class="row ddd_list">
                            <div class="col-md-7" style="padding-bottom: 5px;">
                              <div style="border-right: 1px solid #dbdbdb;">
                                <b><?= $item['office']; ?></b> - <?= $item['subject']; ?>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <a href="<?= $item['file']; ?>" title="Download" download class="btn btn-success btn-xs">Download</a>
                            </div>
                          </div>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">

      </div>
    </div>
  </section>
</div>
<!-- MODALS -->
<div class="modal fade" id="myModal" >
        <div class="modal-dialog" style="border-radius: 10px;!important">
          <div class="modal-content"  >
            <div class="modal-header"  style="background:linear-gradient(90deg, #FFCDD2, #E57373);">
              <h4 class="modal-title">
                
              </h4>

              <button type="button" class="close" data-dismiss="modal">&times;
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
<link rel="stylesheet" href="calendar/fullcalendar/fullcalendar.min.css" />
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="calendar/fullcalendar/lib/jquery.min.js"></script>
<script src="calendar/fullcalendar/lib/moment.min.js"></script>
<script src="calendar/fullcalendar/fullcalendar.min.js"></script>


<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
  $(document).ready(function() {
    $(function() {


      // Create the chart

      var options = {

        chart: {
          events: {
            drilldown: function(e) {
              if (!e.seriesOptions) {

                var chart = this;

                chart.showLoading('Loading ...');

                setTimeout(function() {
                  chart.hideLoading();
                  chart.addSeriesAsDrilldown(e.point, series);
                }, 1000);
              }

            }
          },
          plotBorderWidth: 0
        },

        title: {
          text: 'Purchase Request per Division',
        },
        //
        subtitle: {
          text: 'Procurement'
        },
        //
        xAxis: {
          type: 'category',
          categories: ['FAD', 'LGCDD', 'LGMED', 'ORD'],

        },
        //
        yAxis: {

          title: {
            margin: 10,
            // text: 'No. of P'
          },
        },
        //
        legend: {
          enabled: true,
        },
        //
        plotOptions: {
          series: {
            pointPadding: 0.2,
            borderWidth: 0,
            dataLabels: {
              enabled: true
            }
          },
          pie: {
            plotBorderWidth: 0,
            allowPointSelect: true,
            cursor: 'pointer',
            size: '100%',
            dataLabels: {
              enabled: true,
              format: '{point.name}: <b>{point.y}</b>'
            }
          }
        },
        //
        series: [{
          // name: 'Case',
          colorByPoint: true,
          data: [<?= $pr_summary_opts['fad']; ?>, <?= $pr_summary_opts['lgcdd']; ?>, <?= $pr_summary_opts['lgmed']; ?>, <?= $pr_summary_opts['ord']; ?>]
        }],
        //
        drilldown: {
          series: []
        }
      };

      // Column chart
      options.chart.renderTo = 'container';
      options.chart.type = 'bar';
      var chart1 = new Highcharts.Chart(options);

      chartfunc = function() {
        var column = document.getElementById('column');
        var bar = document.getElementById('bar');
        var pie = document.getElementById('pie');
        var line = document.getElementById('line');


        if (column.checked) {

          options.chart.renderTo = 'container';
          options.chart.type = 'column';
          var chart1 = new Highcharts.Chart(options);
        } else if (bar.checked) {
          options.chart.renderTo = 'container';
          options.chart.type = 'bar';
          var chart1 = new Highcharts.Chart(options);
        } else if (pie.checked) {
          options.chart.renderTo = 'container';
          options.chart.type = 'pie';
          var chart1 = new Highcharts.Chart(options);
        } else {
          options.chart.renderTo = 'container';
          options.chart.type = 'line';
          var chart1 = new Highcharts.Chart(options);
        }

      }


    });
  });
  $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
      header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
      editable: true,
      events: "calendar/fetch-event.php",
      displayEventTime: false,
      eventRender: function(event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      eventClick: function(event, element) {
          if (event.office == <?php echo $_GET['division']; ?>) {
            test();
          } else {
            $('#title').html("View Activity");

            $('#save').hide();
            $('#edit').hide();
          }
        
          $('#myModal').modal('show');

          $('#myModal').find('#eventid').val(event.id);
          $('#myModal').find('#titletxtbox').val(event.title);
          $('#myModal').find('#datepicker1').val(moment(event.start).format('MM/DD/YYYY'));
          if (event.end == '0000-00-00 00:00:00' || event.end == null || event.end == '1970-01-01 00:00:00') {
            $('#myModal').find('#datepicker2').val('');
          } else {
            $('#myModal').find('#datepicker2').val(moment(event.end).subtract(1, "days").format('MM/DD/YYYY'));

          }
          // $('#myModal').find('#datepicker2').val(moment(event.end).format('MM/DD/YYYY'));
          $('#myModal').find('#datepicker3').val(moment(event.posteddate).format('MM/DD/YYYY'));
          $('#myModal').find('#descriptiontxtbox').val(event.description);
          $('#myModal').find('#remarks').val(event.remarks);
          $('#myModal').find('#postedby').val(event.postedby);
          $('#myModal').find('#venuetxtbox').val(event.venue);
          $('#myModal').find('#enptxtbox').val(event.enp);


        },
      selectable: true,
      selectHelper: true,
      editable: true,

    });
    $('#calendar').fullCalendar('option', 'height', 400); //Seems to have no effect...
  });
</script>