<?php require_once 'dashboard_tiles/controller/dashboardController.php'; ?>



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
      <div class="col-md-4">
        <a href="https://intranet.dilg.gov.ph" target="_blank"  style="text-decoration: none;"><img src="images/dilg_intranet.jpg" class="img-responsive" style="width: 70%;"/></a>
        <a href="https://calabarzon.dilg.gov.ph" target="_blank"  style="text-decoration: none;"><img src="images/regional_website.jpg" class="img-responsive" style="width: 70%;margin-top:10px;"/>
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
                <li role="presentation" class="">
                  <a href="#top" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                    <i class="fa fa-list" aria-hidden="true"></i> Top 20 Purchase Request
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
                      <tr style="background-color: #8ae38a;">
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
                <div role="tabpanel" class="tab-pane" id="top" style="font-size:10pt;overflow-y:auto;max-height:350px;">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th rowspan="2" width="15%" class="header_pink" style="font-size:22pt;vertical-align: middle;text-align:center;background-color:#B71C1C;color:#fff;">Rank</th>

                        <th rowspan="2" class="header_yellow" style="font-size:22pt;vertical-align: middle;text-align:center;background-color:#B71C1C;color:#fff;">Purchase No.</th>
                        <th rowspan="2" class="header_yellow" style="font-size:22pt;vertical-align: middle;text-align:center;background-color:#B71C1C;color:#fff;">Purchase Date</th>
                        <th rowspan="2" class="header_yellow" style="font-size:22pt;vertical-align: middle;text-align:center;background-color:#B71C1C;color:#fff;">Office</th>
                        <th rowspan="2" class="header_yellow" style="font-size:22pt;vertical-align: middle;text-align:center;background-color:#B71C1C;color:#fff;">Amount</th>
                      </tr>


                    </thead>
                    <tbody id="list_body">
                      <?php $rank = 1; ?>
                      <?php foreach ($pr_rank as $key => $data) : ?>
                        <tr>
                          <?php
                          if ($rank == 1) {
                          ?>
                            <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $rank++; ?></b></td>

                          <?php
                          } else {
                          ?>
                            <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $rank++; ?></b></td>

                          <?php
                          }
                          ?>
                          <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><a href="procurement_purchase_request_view.php?&id=<?= $data['id']; ?>&pr_no=<?= $data['pr_no']; ?>"><?= $data['pr_no']; ?></a></b></td>
                          <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $data['pr_date']; ?></b></td>
                          <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $data['pmo']; ?></b></td>
                          <td style="font-size:20pt; text-align: center; vertical-align: middle;"><b><?= $data['amount']; ?></b></td>
                        </tr>
                      <?php endforeach; ?>





                    </tbody>
                  </table>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="box box-primary dropbox">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-graph"></i>Monitoring of Supplier Awarding</h3>
          </div>
          <div class="box-body custom-box-body" style="height:500px;overflow:auto;">

          <?php foreach ($supplier_rank as $key => $item) : ?>
              <a  class="list-group-item" style="padding: 7px 7px; background-color:#ECEFF1;margin-top:5px;">
                <div class="media">
                  <div class="pull-left" style="width:65px; height:65px;margin-top: -1%;">
                    <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/logo.png" alt="...">
                  </div>
                  <div class="media-body">

                    <div class="media-content" style="margin-top: 1%;">
                      <i class="fa fa-building"></i> <b class="media-heading" style="font-size: 10pt;"><?= $item['supplier_title']; ?></b>
                    </div>

                    <div class="media-content" style="margin-top: -1%;">
                      <small>Purchase Order No: <b><?= $item['po_number']; ?></b></small>
                    </div>
                    <div class="media-content" style="margin-top: -1%;">
                      <small>Abstract No: <b><?= $item['abstract_number']; ?></b></small>
                    </div>
                    <div class="media-content" style="margin-top: -1%;">
                      <small><i class="fa fa-peso"></i>Purchase Order Amount: Php<?= number_format($item['po_amount'],2); ?></small>
                      <ul class="list-unstyled pull-right">
                        <span class="label label-default label2"></span>

                      </ul>
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
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="border-radius: 10px;!important">
    <div class="modal-content">
      <div class="modal-header" style="background:linear-gradient(90deg, #FFCDD2, #E57373);">
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
<link rel="stylesheet" href="dash.css" />
<link rel="stylesheet" href="calendar/fullcalendar/fullcalendar.min.css" />
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="calendar/fullcalendar/lib/jquery.min.js"></script>
<script src="calendar/fullcalendar/lib/moment.min.js"></script>
<script src="calendar/fullcalendar/fullcalendar.min.js"></script>

<!-- <script>
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
</script> -->
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