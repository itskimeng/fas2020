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
</style>
<?php include 'purchase_request_tab.php';?>


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
          data: [1, 2, 3, 4, 5, 6, 7, 9]
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
<script src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js 
"></script>

<script type="text/javascript">
  function generateTable($data) {
    let row = '';
    let css = '';

    $.each($data, function(key, item) {
      if (item['urgent']) {
        css = 'style="background-color:#c2185b;color:#fff;"';
      } else {
        css = '';
      }
      row += '<tr>';
      row += '<td ' + css + '>' + item['pr_no'] + '</td>';
      row += '<td ' + css + '>' + item['division'] + '</td>';
      row += '<td ' + css + '>' + item['type'] + '</td>';
      row += '<td ' + css + '>' + item['purpose'] + '</td>';
      row += '<td ' + css + '>' + item['total_abc'] + '</td>';
      row += '<td ' + css + '>' + item['pr_date'] + '</td>';
      row += '<td ' + css + '>' + item['target_date'] + '</td>';
      row += '<td ' + css + '>' + item['status'] + '</td>';

      if (item['pmo_id'] == <?php echo $_GET['division'] ?>) {
        row += '<td ' + css + ' style="width: 20%;">';
        row += '<center><button class="btn btn-flat btn-success"><i class="fa fa-eye" pull-left></i><a style="color: #fff;" href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=' + item['pr_no'] + '"> View/Edit</a></button></center>';
      } else {
        row += '<td>d</td>';
      }


      row += '</tr>';
    });

    return row;
  }
  $(document).ready(function(){
        $('#transparency').DataTable();
    })

  $(document).ready(function() {

    let dt = $('#list_table').DataTable({
      "dom": '<"pull-left"f><"pull-right"l>tip',

      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': false,
      'autoWidth': false,
    });
    $('#rfq_table').DataTable({
      "dom": '<"pull-left"f><"pull-right"l>tip',
      'rowsGroup': [0],

      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': false,
      'autoWidth': false,
    });



    $(document).on('change', '.office', function() {
      let office_val = $(this).val();
      let type_val = $('.type').val();

      let path = "GSS/route/filter_pr.php";
      let data = {
        office: office_val,
        type: type_val
      };
      $('#list_body').empty();
      $.get(path, data, function(data, status) {
        $('#list_table').DataTable().clear().destroy();
        let row = generateTable(JSON.parse(data));
        $('#list_body').append(row);

        $('#list_table').DataTable({
          // 'paging'      : true,  
          'lengthChange': true,
          'searching': true,
          'ordering': false,
          'info': true,
          'autoWidth': false,
        });
      });
    });
    $(document).on('change', '.type', function() {
      let type_val = $(this).val();
      let office_val = $('.office').val();

      let path = "PR/entity/filter_pr.php";
      let data = {
        type: type_val,
        office: office_val
      };
      $('#list_body').empty();
      $.get(path, data, function(data, status) {
        $('#list_table').DataTable().clear().destroy();
        let row = generateTable(JSON.parse(data));
        $('#list_body').append(row);

        $('#list_table').DataTable({
          // 'paging'      : true,  
          'lengthChange': true,
          'searching': true,
          'ordering': false,
          'info': true,
          'autoWidth': false,
        });
      });
    });
  });
  $(document).on('click', '#showModal', function() {
    let pr = $(this).val();
    let path = 'GSS/route/post_status_history.php';
    let data = {
      pr_no: pr
    };

    $.post(path, data, function(data, status) {
      $('#app_table').empty();
      let lists = JSON.parse(data);
      sample(lists);
      $('#viewStatus').modal();

    });

    function sample($data) {
      $.each($data, function(key, item) {
        console.log(item);
        let ul = '<ul class="timeline">';
        ul += '<li class="time-label">';
        ul += '<span class="bg-red" id="action_date">' + item['action_date'] + '</span>';
        ul += '</li>';
        ul += '<li>';
        ul += '<i class="fa fa-clock-o bg-blue"></i>';
        ul += '<div class="timeline-item">';
        ul += '<h3 class="timeline-header"><a href="#">' + item['status'] + '</a></h3>';
        ul += '<div class="timeline-body">';
        ul += item['username'] + '<br>';
        ul += item['action_date'] + '';
        ul += '</div>';
        ul += '<div class="timeline-footer">';
        ul += '</div>';
        ul += '</div>';
        ul += '</li>';
        ul += '<li>';
        ul += '<i class="fa fa-clock-o bg-gray"></i>';
        ul += '</li>';
        ul += '</ul>';
        $('#history').append(ul);
      });

      return $data;
    }
    $("#history").html("");

  })
</script>