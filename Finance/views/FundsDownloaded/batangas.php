<?php require_once 'Finance/controller/FundsDownloadedController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Funds Downloaded - Batangas</h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li><a href="#">Finance</a></li>
      <li class="active">Funds Downloaded</li>
    </ol> 
  </section>
  <section class="content">
    <div class="row" style="padding-bottom: 10px;">
      <div class="col-md-3">
        <div class="btn-group">
          <a href="funds_downloaded.php" class="btn btn-block btn-default"><i class="fa fa-angle-left"></i> Back</a>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12 col-6">
          <div class="row">
            <div class="col-md-8">
              <div class="box box-success dropbox">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Overview</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height: 365px; width: 594px;" width="742" height="286"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="box box-danger dropbox">
                <div class="box-header with-border">
                  <h3 class="box-title">Overview</h3>
                </div>
                <div class="box-body chart-responsive">
                  <!-- <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div> -->
                  <div>
                    <div class="row">
                      <ul class="custom-ol">
                          <li><b><span class="badge bg-red">TOTAL FUND SOURCE</span> : 3,800,000.00</b></li>
                          <li><b><span class="badge bg-green">TOTAL ALLOCATED</span> : 2,050,000.00</b></li>
                          <li><b><span class="badge bg-blue">TOTAL BALANCE</span> : 1,750,000.00</b></li>
                      </ul>  
                    </div>

                    <div class="chart" id="sales-chart" style="height: 300px; position: relative; text-align: right;"></div>
                    
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="box dropbox">
                <div class="box-body">
                  <div style="position: absolute;">
                    <div class="btn-group">
                      <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm">
                        <i class="fa fa-search-plus"></i> Advance Filter
                      </button>
                    </div>
                  </div>
                  <table id="example2" class="table table-bordered table-striped display">
                    <thead>
                      <tr style="color: white; background-color:#68bbea; color:black;">
                        <th class="text-center">LDDAP NO.</th>
                        <th class="text-center">LDDAP DATE</th>
                        <th class="text-center">TOTAL AMOUNT</th>
                        <th class="text-center">TOTAL ALLOCATED</th>
                        <th class="text-center">TOTAL BALANCE</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>LDDAP-01-0001</td>
                        <td>03/20/2022</td>
                        <td>₱1,000,000.00</td>
                        <td>₱800,000.00</td>
                        <td>₱200,000.00</td>
                        <td>---</td>
                        <td>
                          <div class="btn-group">
                            <a href="funds_downloaded_history.php" class="btn btn-primary btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>LDDAP-01-0002</td>
                        <td>03/21/2022</td>
                        <td>₱2,000,000.00</td>
                        <td>₱500,000.00</td>
                        <td>₱1,500,000.00</td>
                        <td>---</td>
                        <td>
                          <div class="btn-group">
                            <a href="funds_downloaded_history.php" class="btn btn-primary btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>LDDAP-01-0003</td>
                        <td>03/23/2022</td>
                        <td>₱800,000.00</td>
                        <td>₱750,000.00</td>
                        <td>₱50,000.00</td>
                        <td>---</td>
                        <td>
                          <div class="btn-group">
                            <a href="funds_downloaded_history.php" class="btn btn-primary btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Total Balance", value: '1750000'},
        {label: "Total Fund Source", value: '3800000'},
        {label: "Total Allocated", value: '2050000.00'}
      ],
      hideHover: 'auto'
    });

    var areaChartData = {
      labels  : ['Jan.', 'Feb.', 'Mar.', 'Apr', 'May'],
      datasets: [
        {
          label               : 'Fund Source',
          fillColor           : 'rgb(255, 102, 102)',
          strokeColor         : 'rgb(255, 102, 102)',
          pointColor          : 'rgb(255, 102, 102)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 102, 102)',
          data                : [650000, 500000, 3800000]
        },
        {
          label               : 'Allocated',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [300000, 400000, 2050000]
        },
        {
          label               : 'Balance',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [350000, 100000, 1750000]
        }
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);

    var table = $('#example2').DataTable( {
      // "ajax": "../ajax/data/objects.txt",
      'lengthChange': false,
      "columns": [
        { "data": "lddap_no", "width": "15%", "className": 'text-center' },
        { "data": "lddap_date", "width": "15%", "className": 'text-center' },
        { "data": "total_amount", "width": "15%", "className": 'text-center' },
        { "data": "total_allocated", "width": "15%", "className": 'text-center' },
        { "data": "total_balance", "width": "15%", "className": 'text-center' },
        { "data": "status", "width": "10%", "className": 'text-center' },
        { "data": "action", "width": "10%", "sortable": false, "className": 'text-center' }
      ],"order": [[1, 'asc']],
      'searching'   : true,
    });
  });

</script>