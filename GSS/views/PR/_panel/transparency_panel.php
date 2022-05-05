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
      background-color: rgba(0,0,0,.05) !important;
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
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span><i class="fa fa-bar-chart-o fa-fw"></i>PROCUREMENT STATISTICS</span>
                            <span class="pull-right hidden-xs"><small><i class="fa fa-clock-o fa-fw"></i>as of <?= date('F d, Y'); ?></small></span>
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
                                                        <th>TOTAL FUNDS</th>
                                                    </tr>
                                                    <?php include 'office_stat.php'; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="chart" style="position: relative; height:50vh; width:60vw">
                                        <canvas id="barChart" style="height:300px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-info">
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
                                                            <td><button class="btn btn-success btn-xs"><i class ="fa fa-eye"></i> View Items</button></td>
                                                            <td><?= $data['purpose'];?></td>
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
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                    label: 'Electronics',
                    fillColor: 'rgba(210, 214, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php
                        $arr = array();
                        foreach ($monitor_pr as $key => $task) {
                            $arr[] = $task;
                        }
                        echo implode(",", $arr);
                        ?>
                    ]
                },
                {
                    label: 'Digital Goods',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [0,0,0,0,0,0,0,0,0]
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