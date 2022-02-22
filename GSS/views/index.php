<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Dashboard</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-4">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">APP Encoded</span>
                            <span class="info-box-number">
                                <div style="font-size: 23px;">
                                    1
                                </div>
                            </span>
                            <a href="/documentroute/incoming-document">
                                <p style="color: white;"> View Details <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Purchase Request</span>
                            <span class="info-box-number">
                                <div style="font-size: 23px;">
                                    1
                                </div>
                            </span>
                            <a href="/documentroute/incoming-document">
                                <p style="color: white;"> View Details <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">RFQ</span>
                            <span class="info-box-number">
                                <div style="font-size: 23px;">
                                    1
                                </div>
                            </span>
                            <a href="/documentroute/incoming-document">
                                <p style="color: white;"> View Details <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">AWARDED</span>
                            <span class="info-box-number">
                                <div style="font-size: 23px;">
                                    1
                                </div>
                            </span>
                            <a href="/documentroute/incoming-document">
                                <p style="color: white;"> View Details <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span><i class="fa fa-bar-chart-o fa-fw"></i>PROCUREMENT STATISTICS</span>
                        <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of February 11, 2022 11:37 am</small></span>
                    </div>
                    <div class="panel-body" style="padding-bottom: 0px;">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="panel">
                                    <div class="panel-body" style="padding-top: 0px; margin-top: 0px;">

                                        <br>
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>OFFICE</th>
                                                    <th>ENCODED</th>
                                                </tr>
                                                <tr>
                                                    <td>REGIONAL OFFICE</td>
                                                    <td><span class="badge" style="background-color: #28CECF;">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>CAVITE</td>
                                                    <td><span class="badge" style="background-color: #28CECF;">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>LAGUNA</td>
                                                    <td><span class="badge bg-orange">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>BATANGAS</td>
                                                    <td><span class="badge bg-red">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>RIZAL</td>
                                                    <td><span class="badge bg-green">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td>QUEZON</td>
                                                    <td><span class="badge bg-purple">0</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="chart">
                                    <canvas id="barChart" style="height:300px"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Electronics',
                    fillColor: 'rgba(210, 214, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: 'Digital Goods',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        }


        //Create the line chart


        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        var barChartData = areaChartData
        barChartData.datasets[1].fillColor = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor = '#00a65a'
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

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    })
</script>