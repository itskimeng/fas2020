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
        urgent = '<label class="label label-danger" style="    display: inline; padding: 0.2em 0.6em 0.3em; font-size: 75%; font-weight: 700; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.25em;">URGENT</label>';
      } else {
        urgent = '';
      }
      row += '<tr>';
      row += '<td>' + item['pr_no'] + '<br>'+urgent+'</td>';
      row += '<td>' + item['division'] + '</td>';
      row += '<td>' + item['type'] + '</td>';
      row += '<td>' + item['purpose'] + '</td>';
      row += '<td>' + item['total_abc'] + '</td>';
      row += '<td>' + item['pr_date'] + '</td>';
      row += '<td>' + item['target_date'] + '</td>';
      row += '<td>';
      row += '<div class="kv-attribute">';
      row += '<b><span id="showModal" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">'+item['status']+'</span></b><br>';
      row += '<input type="hidden" id="pr_no" value="'+item['pr_no']+'" />';
      row += '<small>'+item['submitted_by']+'<br>'+item['submitted_date']+'</small>';
      row += '</div>';
      row += '</td>';
      row += '<td style="width: 20%;">';
      row +='<a href="procurement_purchase_request_view.php?division='+item['division']+'&amp;id='+item['pr_no']+'" class="btn btn-success btn-sm btn-view" title="View"> <i class="fa fa-eye"></i></a>';
      row +='<button id="btn_submit_to_gss" class="btn btn-primary btn-sm btn-view" title="Submit to GSS"> <i class="fa fa-send"></i></button>';
      row += '<button id="btn_received_by_gss" class="btn bg-purple btn-sm" title="Received by GSS" value="'+item['pr_no']+'"> <i class="fa fa-rocket"></i></button>  </td>';
      


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

      let path = "GSS/route/filter_pr.php";
      let data = {
        office: office_val,
      };
      $('#list_body').empty();
      $.get(path, data, function(data, status) {
        $('#list_table').DataTable().clear().destroy();
        let row = generateTable(JSON.parse(data));
        $('#list_table tbody').append(row);

         $('#list_table').DataTable({
          "dom": '<"pull-left"f><"pull-right"l>tip',

'lengthChange': true,
'searching': true,
'ordering': false,
'info': false,
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
    let pr = $('#pr_no').val();
    let path = 'GSS/route/post_status_history.php';
     let data = {
        'idd': 's',
        'pmo': office_id
      };

    $.post(path, data, function(data, status) {
      $('#app_table').empty();
      let lists = JSON.parse(data);
      sample(lists);
      $('#viewStatus').modal();

    });

    function sample($data) {
      $.each($data, function(key, item) {
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