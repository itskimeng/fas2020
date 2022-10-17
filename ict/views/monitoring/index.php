<?php require_once 'ict/controller/ICTController.php'; ?>
<?php $division = $_GET['division']; ?>
<style>
  table {
    table-layout: fixed;
    width: 300px;
  }
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>ICT TA Monitoring</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-d    ashboard"></i> Home</a></li>
      <li><a href="#">ICT TA Monitoring</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <?php
        include 'connection.php';
        $name = $_SESSION['username'];
        $query = "SELECT * from tblemployeeinfo where UNAME = '$name'";
        $result = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_array($result)) {
        ?>
          <div class="well">
            <div class="row">
              <div class="col-md-2">
                <?php include 'current_month.php'; ?>
              </div>
              <div class="col-md-2">
                <select class="form-control " id="selectYear" style="width: 100%;">
                  <?php
                  for ($i = 2020; $i < 2023; $i++) {
                    if ($i == 2022) {
                      echo '<option value=' . $i . ' selected>' . $i . '</option>';
                    } else {
                      echo '<option value=' . $i . ' >' . $i . '</option>';
                    }
                  }
                  ?>
                </select>

              </div>
              <div class="col-md-2">
                <ol style="margin-left:-50px;"><button class="btn btn-primary" id="fml"><i class="fa fa-file-excel-o"></i> Export PML Report</button></ol>
              </div>&nbsp;
              <div class="col-md-2" style="margin-left:10px;">
                <li class="btn btn-success" style="margin-left:-40%;"><a href="#" style="color:white;text-decoration: none;" id="psl"><i class="fa fa-file-excel-o"></i> Export PSL Report</a></li>
              </div>
              <div class="col-md-2" style="margin-left:-50px;">
                <li class="btn btn-danger" style="margin-left:-40%;"><a href="#" style="color:white;text-decoration: none;" id="css"><i class="fa fa-file-excel-o"></i> Export CSS Report</a></li>
              </div>

              <!-- <div class = "col-md-2" style = "float:right;margin-right:-30px;">
                          <li class="btn btn-success">
                          <a href="requestForm.php?division=<?php echo $_GET['division']; ?>" style="color:white;text-decoration: none;">Create Request</a>
                          </li>

                        </div> -->
            </div>
          </div>
        <?php

        }


        ?>
        <div class="box box-primary" id="" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
          <div class="box-header with-border">

            </b>
            <div class="box-tools pull-right">
              <button type="button" style="width:100%" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12">
              <div class="s-table-container">
                <table class="table table-striped table-bordered table-responsive" id="monitoring">
                  <thead class="bg-primary">
                    <tr>
                      <th rowspan="2">NO</th>
                      <th rowspan="2" style="width: 10%;">ICT TECHNICAL ASSISTANCE REFERENCE NO.</th>

                      <th colspan="2" scope="colgroup" style="text-align: center;">RECEIVED</th>

                      <th rowspan="2" style="width: 10%;">NAME OF THE END-USER</th>
                      <th rowspan="2" style="width: 10%;"><?= wordwrap('OFFICE/SERVICE/BUREAU DIVISION/SECTION/UNIT', 15, "<br>\n", TRUE); ?></th>
                      <th rowspan="2" style="width: 10%;">ISSUE/CONCERN</th>
                      <th colspan="2" scope="colgroup">AGREED TIMELINE (if any)</th>
                      <th colspan="2" scope="colgroup">COMPLETED</th>
                      <th rowspan="2" style="width: 5%;">TOTAL PROCESSING TIME</th>
                      <th rowspan="2" style="width: 5%;">TYPE OF REQUEST</th>
                      <th rowspan="2">OVERALL QUALITY TIME</th>
                      <th rowspan="2">STATUS</th>
                      <th rowspan="2">ACTIONS</th>
                    </tr>
                    <tr>
                      <th scope="col">DATE</th>
                      <th scope="col">TIME</th>
                      <th scope="col">DATE</th>
                      <th scope="col">TIME</th>
                      <th scope="col">DATE</th>
                      <th scope="col">TIME</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($fetch_ict_opts as $key => $data) : ?>
                      <tr>
                        <td><?= $i++ . '.' ?></td>
                        <td><?= $data['control_no']; ?></strong></td>
                        <td><?= $data['start_date']; ?></td>
                        <td><?= $data['start_time']; ?></td>
                        <td><?= $data['req_by']; ?></td>
                        <td><?= $data['office']; ?></td>
                        <td><?= wordwrap($data['issue_problem'], 25, "<br>\n", TRUE); ?></td>
                        <td></td>
                        <td></td>
                        <td><?= $data['completed_date']; ?></td>
                        <td><?= $data['completed_time']; ?></td>
                        <td></td>

                        <td><?= wordwrap($data['type_req'], 15, "<br>\n", TRUE); ?></td>
                        <td><?= $data['quality']; ?></td>
                        <td><?= $data['status_request']; ?></td>
                        <td></td>

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
  </section>
</div>

<script>
  function generateMainTable($data) {
    let i= 1;
    $.each($data, function(key, item) {

      let tr = '<tr>';
      tr += '<td>'+i++ +'.</td>';
      tr += '<td>' + item['control_no'] + '</td>';
      tr += '<td>' + item['start_date'] + '</td>';
      tr += '<td>' + item['start_time'] + '</td>';
      tr += '<td>' + item['req_by'] + '</td>';
      tr += '<td>' + item['office'] + '</td>';
      tr += '<td>' + item['issue_problem'] + '</td>';
      tr += '<td></td>';
      tr += '<td></td>';
      tr += '<td>' + item['completed_date'] + '</td>';
      tr += '<td>' + item['completed_time'] + '</td>';
      tr += '<td></td>';
      tr += '<td>' + item['type_req'] + '</td>';
      tr += '<td>' + item['quality'] + '</td>';
      tr += '<td>' + item['status_request'] + '</td>';
      tr += '<td>' + item['action'] + '</td>';
      tr += '</tr>';
      $('#monitoring').append(tr);
    });

    return $data;
  }
  // $(document).on('change', '#table-filter', function() {
  //   let path = 'ict/route/filter.php';
  //   let data = {
  //     quarter: $(this).val(),
  //     division: "<?= $division;?>",
  //     year: $('#selectYear').val()
  //   };

  //   $.get(path, data, function(data, status) {
  //     $('#monitoring').empty();
  //     let lists = JSON.parse(data);
  //     $('#monitoring').dataTable().fnClearTable();
  //     $('#monitoring').dataTable().fnDestroy();
  //     generateMainTable(lists);
  //     $('#monitoring').DataTable({
  //       "dom": '<"pull-left"f><"pull-right"l>tip',
  //       'paging': true,
  //       "searching": true,
  //       "paging": true,
  //       "info": false,
  //       "bLengthChange": false,
  //       "lengthMenu": [
  //         [2, 20, -1],
  //         [2, 20, 'All']
  //       ],
  //       "ordering": TRUE,

  //     })
  //   });
  // })
  
  $(document).ready(function() {
  
        $('#monitoring tbody').on('click', '#edit', function() {
          var data = table.row($(this).parents('tr')).data();
          window.location = "dash_complete_ta.php?division=<?php echo $_GET['division']; ?>&id=" + data[0];
        });

        $('#monitoring tbody').on('click', '#delete', function() {
          var data = table.row($(this).parents('tr')).data();
          var control_no = data[0];

          swal({
            title: "Are you sure you want to delete this request?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
          }).then(function() {
            swal("Control Number " + control_no + " has been deleted.", "success");
            $.ajax({
              url: "deleteRequest.php",
              method: "POST",
              data: {
                control_no: control_no,
              },
              success: function(data) {
                setTimeout(function() {
                  window.location = "monitoring.php?division=<?php echo $_GET['division']; ?>";
                }, 1000);
              }
            });
          });


        });

        $('#monitoring tbody tr').on('click', '#sweet-14', function() {
          var data = table.row().data();
          // console.log(data);
          swal("Control No: " + data[1], "You already received this request", "success")
            .then(function() {
              $.ajax({
                url: "_ticketReleased.php",
                method: "POST",
                data: {
                  id: data[1],
                  option: "released"
                },
                success: function(data) {
                  setTimeout(function() {
                    swal("Record saved successfully!");
                  }, 3000);
                  window.location = "monitoring.php?division=<?php echo $_GET['division'] ?>&ticket_id=" + a;
                }
              });
            });
        });

        $('#monitoring tbody').on('click', '#view', function() {
          var data = table.row($(this).parents('tr')).data();
          window.location = "viewTA.php?id=" + data[1];
        });

        $('#monitoring tbody').on('click', '#sweet-15', function() {
          var data = table.row($(this).parents('tr')).data();
          window.location = "rateService.php?division=<?php echo $_GET['division']; ?>&id=" + data[0];
        });
    // 

    let column_no = 0;

    $('#table-filter').on('change', function() {
      // let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
      column_no = (this.value);
    });


    $('#fml').on('click', function() {
      let year = $('#selectYear').val();
      window.location = "_fmlReport.php?month=" + column_no + "&year=" + year;
    });

    $('#psl').on('click', function() {
      let year = $('#selectYear').val();

      window.location = "psl_iso.php?month=" + column_no + "&year=" + year;
    });

    $('#css').on('click', function() {
      let year = $('#selectYear').val();

      window.location = "cssPMLReport.php?month=" + column_no + "&year=" + year;
    });
  });
       
</script>