<style>
    .shake {
        animation-name: shake;
        animation-duration: 1s;
        animation-fill-mode: both;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            transform: translateX(-10px);
        }

        20%,
        40%,
        60%,
        80% {
            transform: translateX(10px);
        }
    }
</style>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php $menuchecker = menuChecker('procurement'); ?>
<?php $admin = ['masacluti', 'ctronquillo', 'cmfiscal', 'mmmonteiro']; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">

            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php //include('_panel/box.html.php'); 
            ?>
        </div>
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red">
                    <h3>REMINDER!</h3>
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is
                        urgent and must be processed on the date submitted by the user. </div><br>
                </div>
            </div> -->
        </div>
        <?php
        if (in_array($_SESSION['username'], $admin)) {
            include 'filter.php';
        }
        ?>
        <div class="col-md-8">
            <div class="box box-primary dropbox" style="height: 452px;">
                <div class="box-header with-border">
                    <h3 class="box-title">Monthly Overview</h3>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height: 400px; width: 639px;" width="1278" height="438"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary dropbox">
                <div class="box-header with-border">
                    <h3 class="box-title">Overview</h3>
                </div>
                <div class="box-body chart-responsive">
                    <!-- <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div> -->
                    <div>
                        <div class="row">
                            <ul class="custom-ol">

                                <li><b><span class="badge bg-red" style="background-color:#3c8dbc;">ORD</span> : <?= '₱ ' . number_format($office_total['ord'],2);?></b></li>
                                <li><b><span class="badge bg-green" style="background-color:#00a65a;">FAD</span> : <?= '₱ ' . number_format($office_total['fad'],2);?></b></li>
                                <li><b><span class="badge bg-blue" style="background-color:#00a65a;">LGMED</span> : <?= '₱ ' . number_format($office_total['lgmed'],2); ?></b></li>
                                <li><b><span class="badge bg-warning" style="background-color: #4A148C;">LGCDD</span> : <?= '₱ ' . number_format($office_total['lgcdd'],2);?></b></li>
                            </ul>
                        </div>

                        <div class="chart" id="sales-chart" style="height: 300px; position: relative; text-align: right;"></div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            
            <?php include('_panel/purchase_request_tab.php'); ?>
            <?php include('modal/modal_pending_pr.php'); ?>

        </div>
</div>
</section>
</div>
<script>
  $(document).ready(function() {
    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#f56954", "#00a65a", "#3c8dbc","#4A148C"],
      data: [{
          label: "ORD",
          value: <?= $office_total['ord'];?>
        },
        {
          label: "FAD",
          value: <?= $office_total['fad'];?>
        },
        {
          label: "LGMED",
          value: <?= $office_total['lgmed'];?>
        },
        {
          label: "LGCDD",
          value: <?= $office_total['lgcdd'];?>
        }
      ],
      hideHover: 'auto'
    });

    var areaChartData = {
      labels: ['Jan.', 'Feb.', 'Mar.', 'Apr', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
      axisY:{
              valueFormatString: "$#,###,#0", //try properties here
            },
            axisX:{
              valueFormatString: "Sample #"
            },
      datasets: [{
          label: 'Fund Source',
          fillColor: 'rgb(255, 102, 102)',
          strokeColor: 'rgb(255, 102, 102)',
          pointColor: 'rgb(255, 102, 102)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgb(255, 102, 102)',
          data: <?= $monthly_overview; ?>
        }
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChart = new Chart(barChartCanvas)
    var barChartData = areaChartData
    barChartData.datasets[0].fillColor = '#283593'
    barChartData.datasets[0].strokeColor = '#283593'
    barChartData.datasets[0].pointColor = '#283593'
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    }

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);


  });
</script>