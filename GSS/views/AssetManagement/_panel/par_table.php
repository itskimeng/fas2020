<?php $is_active1 = (isset($_GET['province'])) ? '' : 'active'; ?>
<?php $is_active2 = (isset($_GET['province'])) ? 'active' : ''; ?>
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
                        <li><b><span class="badge bg-red">ORD</span> : 3,800,000.00</b></li>
                        <li><b><span class="badge bg-green">FAD</span> : 2,050,000.00</b></li>
                        <li><b><span class="badge bg-blue">LGMED</span> : 1,750,000.00</b></li>
                        <li><b><span class="badge bg-warning">LGCDD</span> : 1,750,000.00</b></li>
                    </ul>
                </div>

                <div class="chart" id="sales-chart" style="height: 300px; position: relative; text-align: right;"></div>

            </div>

        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="box box-primary dropbox">
        <div class="box-header">
            <!-- <h3 class="box-title"><i class="fa fa-graph"></i>Equipment Information</h3> -->
        </div>
        <div class="box-body custom-box-body">
            <div class="table-responsive">

                <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
                    <li role="presentation" class=" <?= $is_active1; ?>">
                        <a href="#emp_directory" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                            <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Equipment Information
                        </a>
                    </li>


                </ul>
                <div class="tab-content">
                    <?php include 'par_equipment_panel.php'; ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                //DONUT CHART
                var donut = new Morris.Donut({
                    element: 'sales-chart',
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#00a65a"],
                    data: [{
                            label: "Total Balance",
                            value: '1750000'
                        },
                        {
                            label: "Total Fund Source",
                            value: '3800000'
                        },
                        {
                            label: "Total Allocated",
                            value: '2050000.00'
                        }
                    ],
                    hideHover: 'auto'
                });

                var areaChartData = {
                    labels: ['Jan.', 'Feb.', 'Mar.', 'Apr', 'May', 'June', 'July', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
                    datasets: [{
                            label: 'Fund Source',
                            fillColor: 'rgb(255, 102, 102)',
                            strokeColor: 'rgb(255, 102, 102)',
                            pointColor: 'rgb(255, 102, 102)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgb(255, 102, 102)',
                            data: [650000, 500000, 3800000,3800000,3800000,3500000,38008000,2800000,3800000,3800000,3800000,3800000]
                        },
                        {
                            label: 'Allocated',
                            fillColor: 'rgba(60,141,188,0.9)',
                            strokeColor: 'rgba(60,141,188,0.8)',
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [650000, 500000, 3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000]
                        },
                        {
                            label: 'Balance',
                            fillColor: 'rgba(60,141,188,0.9)',
                            strokeColor: 'rgba(60,141,188,0.8)',
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [650000, 500000, 3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000,3800000]
                        }
                    ]
                }


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

                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions);

            
            });
        </script>