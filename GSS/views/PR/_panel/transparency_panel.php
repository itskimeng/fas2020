<style>
    .container {
        position: absolute;

        background-image: linear-gradient(45deg, white 92%, green 92%);
        color: white;
        border-radius: 12px;
    }

    .pull-left {
        float: left !important;
        padding: 10px;
    }

    @media print {
        .table-striped tbody tr:nth-of-type(odd) td {
            background-color: rgba(0, 0, 0, .05) !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>
<div class="box">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

        </div>
    </div>
    <div class="box-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span><i class="fa fa-bar-chart-o fa-fw"></i>PROCUREMENT STATISTICS</span>
                <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
            </div>
            <div class="panel-body" style="padding-bottom: 0px;">

                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="panel">
                            <div class="panel-body" style="padding-top: 0px; margin-top: 0px;">

                                <br>
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <th>OFFICE</th>
                                            <th>ENCODED</th>
                                            <th>TOTAL FUNDS</th>
                                        </tr>
                                        <?php include 'office_stat.php'; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="chart" style="position: relative;">
                            <canvas id="barChart" ></canvas>
                            <center>
                                <div style="background-color: #00695C; width:4%;padding:1%;display:inline-block"></div> Purchase Request &nbsp;
                                <div style="background-color: #880E4F; width:4%;padding:1%;display:inline-block"></div> Awarded
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="panel panel-primary">
            <div class="panel-heading">
                <span><i class="fa fa-bar-chart-o fa-fw"></i>TRANSPARENCY TABLE</span>
                <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
            </div>
            <div class="panel-body" style="padding-bottom: 0px;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body" style="padding-top: 0px; margin-top: 0px;">

                                <br>
                                <table id="rfq_table" class="table table-striped table-bordered table-responsive table-hover dataTable no-footer">
                                    <thead>
                                        <th>OFFICE</th>
                                        <th>PR NO</th>
                                        <th>PR DATE</th>
                                        <th>PROCUREMENT</th>
                                        <th>PURPOSE</th>
                                        <th>SUPPLIER</th>

                                    </thead>
                                    <tbody id="list_body">
                                        <?php foreach ($trans_opt as $key => $data) : ?>
                                            <tr>
                                                <td><?= $data['pmo_title']; ?></td>
                                                <td><?= $data['pr_no']; ?></td>
                                                <td><?= $data['pr_date']; ?></td>
                                                <td><button class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View Items</button></td>
                                                <td><?= $data['purpose']; ?></td>
                                                <td><?= $data['supplier_title']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span><i class="fa fa-bar-chart-o fa-fw"></i>No. of Purchase Request Type per Division</span>
                <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of August 10, 2022 09:05:am</small></span>
            </div>
            <div class="box-body box-emp">

                <div class="col-sm-12">
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
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span><i class="fa fa-bar-chart-o fa-fw"></i>No. of Purchase Request No. per Division</span>

                <span class="pull-right hidden-xs"><small>
                        <input type="radio" name="mychart" class="mychart" id="column" value="column" onclick="chartfunc()">Column
                        <input type="radio" name="mychart" class="mychart" id="bar" value="bar" onclick="chartfunc()" checked>Bar
                        <input type="radio" name="mychart" class="mychart" id="pie" value="pie" onclick="chartfunc()">Pie
                        <input type="radio" name="mychart" class="mychart" id="line" value="line" onclick="chartfunc()">Line
                    </small></span>
            </div>
            <div class="box-body box-emp">

                <div class="col-sm-12">


                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>




                </div>
            </div>
        </div>
    </div>
</div>


<!-- View Status History -->
<div class="modal fade" id="viewStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="height:500px;overflow:auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="history">


                    </div>
                    <!-- /.col -->
                </div>
            </div>

        </div>
    </div>
</div>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
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
                    categories: ['FAD','LGCDD','LGMED','ORD'],

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
                    data: [<?= $pr_summary_opts['fad']; ?>, <?= $pr_summary_opts['lgcdd']; ?>, <?= $pr_summary_opts['lgmed']; ?>,<?= $pr_summary_opts['ord']; ?>]
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
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'Electrodnics',
                    fillColor: '#00695C',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#00695C',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php
                        $arr = array();
                        foreach ($monitor_pr as $key => $task) {
                            $arr[] = $task;
                        }
                        echo implode(",", $arr);
                        ?>
                    ],

                },
                {
                    label: 'Digital Goods',
                    fillColor: '#2196F3',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#4DB6AC',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#2196F3',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php
                        $arr = array();
                        foreach ($monitor_awardedpr as $key => $task) {
                            $arr[] = $task;
                        }
                        echo implode(",", $arr);
                        ?>
                    ],
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
        barChartData.datasets[1].fillColor = '#AD1457'
        barChartData.datasets[1].strokeColor = '#B71C1C'
        barChartData.datasets[1].pointColor = '#66BB6A'
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
<script src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js "></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#transparency').DataTable();
    })

    $(document).ready(function() {
        $('#rfq_table').DataTable({
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'rowsGroup': [0],

            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false,
        });
    });
</script>