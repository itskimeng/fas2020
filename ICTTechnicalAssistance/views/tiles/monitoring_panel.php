<table class="table table-striped table-bordered table-responsive" id="ict_monitoring" style="height: 550px;">
  <thead class="bg-primary" style="background:linear-gradient(90deg,#1E88E5,#0D47A1);">
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2" style="width: 10%;">ICT TECHNICAL ASSISTANCE REFERENCE NO.</th>

      <th colspan="2" scope="colgroup" style="text-align: center;">RECEIVED</th>

      <th rowspan="2" style="width: 10%;">NAME OF THE END-USER</th>
      <th rowspan="2" style="width: 5%;"><?= wordwrap('OFFICE/SERVICE/BUREAU DIVISION/SECTION/UNIT', 15, "<br>\n", TRUE); ?></th>
      <th rowspan="2" style="width: 10%;">ISSUE/CONCERN</th>
      <th rowspan="2" style="width: 10%;">TECHNICAL PERSONNEL ASSIGNED</th>

      <!-- <th colspan="2" scope="colgroup">AGREED TIMELINE (if any)</th> -->
      <th colspan="2" scope="colgroup">COMPLETED</th>
      <!-- <th rowspan="2">TOTAL PROCESSING TIME</th> -->
      <th rowspan="2" style="width: 5%;">TYPE OF REQUEST</th>
      <!-- <th rowspan="2" >OVERALL QUALITY TIME</th> -->
      <th rowspan="2" style="width:5%!important;">STATUS</th>
      <th rowspan="2" style="width:6%!important;">ACTIONS</th>
    </tr>
    <tr>
      <!-- <th scope="col">DATE</th>
    <th scope="col">TIME</th> -->
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
    </tr>
  </thead>

  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($ict_opts as $key => $data) : ?>
      <?php

      //FOR RATED BUTTON
      $role = $_GET['role'];
      $id = $data['id'];
      $quarter = $_GET['quarter'];
      $control_number = $data['control_number'];
      $url1 = "dash_rate_service.php?role=$role&id=$id&quarter=$quarter";
      $url2 = "css_report.php?id=$id&control_no=$control_no";
      $text = ($data['is_rated'] == 1) ? 'View Ratings' : 'Rate Service';
      $class = ($data['is_rated'] == 1) ? 'btn-info' : 'btn-danger';
      $url = ($data['is_rated'] == 1) ? $url2 : $url1;
      ?>
      <tr>
        <td><?= $i++ . '.' ?>
        </td>
        <td><a href='viewTA.php?id=<?= $data['control_no']; ?>'>
            <strong><?= $data['control_no']; ?></strong></a>
        </td>


        </td>
        <td><?= $data['start_date']; ?></td>
        <td><?= $data['start_time']; ?></td>
        <td><?= $data['req_by']; ?></td>
        <td style="width:4%!important;"><?= $data['office']; ?></td>
        <td><?= truncateString($data['issue_problem'], 200); ?></td>
        <td><?= $data['assist_by']; ?></td>
        <td><?= $data['completed_date']; ?></td>
        <td><?= $data['completed_time']; ?></td>

        <td><?= wordwrap($data['type_req'], 15, "<br>\n", TRUE); ?></td>
        <td><?= $data['status']; ?></td>
        <?php if ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') : ?>
          <td>
            <!-- <button class="btn btn-md" style="background: linear-gradient(90deg,#9CCC65, #1B5E20);color:#fff;"><i class="fa fa-download"></i> Start</button> -->

            <!-- RECEIVED BUTTON -->
            <?php if ($data['start_date'] == '0000-00-00' || $data['start_date'] == '' || $data['start_date'] == '~') : ?>
              <button data-id="<?= $data['control_no']; ?>" class="btn btn-primary sweet-17 btn btn-md btn-primary col-lg-12">Receive</button>

            <?php else : ?>
              <?php if ($data['start_date'] != '0000-00-00' || $data['start_date'] != 'January 01, 1970' || $data['start_date'] != '~') : ?>

                <button disabled title="Received Date" data-id='<?= $data['control_no']; ?>' class="sweet-17 btn btn-md btn-primary col-lg-12 ">
                  Received Date<br>
                  <b><?= $data['start_date']; ?></b>
                </button>
                <br>
              <?php endif; ?>
            <?php endif; ?>
            <!-- END -->
            <br><br>
            <!-- ASSIGN BUTTON -->
            <?php if ($_SESSION['complete_name']  == $data['assist_by']) : ?>
              <button data-id="<?php echo $data['control_no']; ?>" class=" col-lg-12 pull-right sweet-14  btn btn-danger" style="background-color:orange;">
                <?php if ($data['assign_date'] == null || $data['assign_date'] == '') : ?>
                  Assign</button>
            <?php else : ?>

              Assigned Date<br>
              <?= date('F d, Y', strtotime($data['assign_date'])) . '</b>'; ?></button><br>

            <?php endif; ?>
          <?php else : ?>
            <button data-id="<?php echo $data['control_no']; ?>" class="col-lg-12 pull-right sweet-14 btn btn-danger" style="background-color:orange;">

              <?php if ($data['assign_date'] == NULL || $data['assign_date'] == '') : ?>
                <?= 'Assign'; ?></button>

          <?php else : ?>
            <?= 'Assigned Date<br>'; ?>
            <?= '<b>' . date('F d, Y', strtotime($data['assign_date'])) . '</b>'; ?></button><br>

          <?php endif; ?>
        <?php endif; ?>
        <?php ?>
        <!-- END -->
        <br><br>
        <!-- COMPLETE BUTTON -->
        <?php if ($data['status'] == 'created') : ?>
          <button disabled id="btn-take-action" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
        <?php else : ?>
          <?php if ($data['completed_date'] == '0000-00-00' || $data['completed_date'] == null || $data['completed_date'] == 'January 01, 1970') : ?>
            <?php if ($_SESSION['complete_name'] == $data['assist_by']) : ?>
              <button id="btn-take-action" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
            <?php else : ?>
              <button id="btn-take-action" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
            <?php endif; ?>
          <?php else : ?>
            <button title="Completed Date" id="btn-take-action" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success"> Completed<br> <?= $data['completed_date']; ?> </button> <br>
          <?php endif; ?>
        <?php endif; ?>
        <!-- END -->
        <br><br>
        <!-- RATE BUTTON -->
        <?php if ($data['completed_date'] == '') : ?>
          <button disabled class="btn btn-danger btn-md col-lg-12 "> Rate Service </button>
        <?php else : ?>
          <?php if ($data['status'] == 'completed') : ?>
            <?php if ($data['date_rated'] != '' || $data['date_rated'] != null) : ?>
              <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?= $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
            <?php else : ?>
              <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?php echo $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
            <?php endif; ?>
          <?php elseif ($data['status'] == 'rated') : ?>
            <?php if (date('m', strtotime($data['start_date'])) == '1' || date('M', strtotime($data['start_date'])) == '2' || date('M', strtotime($data['start_date'])) == '3') : ?>
              <button class="btn btn-info btn-md col-lg-12 "> <a href="report/TA/pages/viewCSS.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
            <?php else : ?>
              <button class="btn btn-info btn-md col-lg-12 "> <a href="base_view_cssReport.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
            <?php endif; ?>
          <?php else : ?>
            <?php if ($data['date_rated'] == null) : ?>
              <button disabled class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?= $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
            <?php else : ?>

              <?php if (date('m', strtotime($data['start_date'])) == '1' || date('M', strtotime($data['start_date'])) == '2' || date('M', strtotime($data['start_date'])) == '3') : ?>
                <button class="btn btn-info btn-md col-lg-12 "> <a href="report/TA/pages/viewCSS.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
              <?php else : ?>
                <button class="btn btn-info btn-md col-lg-12 "> <a href="base_view_cssReport.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>


        <?php endif; ?>
        <!-- END -->





          </td>
        <?php else : ?>

          <td>

            <button class="btn btn-success col-lg-12"><a href='viewTA.php?id=<?= $data['control_no']; ?>'>View</a></button>
            <?php if ($data['completed_date'] == '') : ?>
              <button disabled class="btn btn-danger btn-md col-lg-12 "> Rate Service </button>
            <?php else : ?>
              <?php if ($data['status'] == 'completed') : ?>
                <?php if ($data['date_rated'] != '' || $data['date_rated'] != null) : ?>
                  <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?= $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
                <?php else : ?>
                  <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?php echo $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
                <?php endif; ?>
              <?php elseif ($data['status'] == 'rated') : ?>
                <?php if (date('m', strtotime($data['start_date'])) == '1' || date('M', strtotime($data['start_date'])) == '2' || date('M', strtotime($data['start_date'])) == '3') : ?>
                  <button class="btn btn-info btn-md col-lg-12 "> <a href="report/TA/pages/viewCSS.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
                <?php else : ?>
                  <button class="btn btn-info btn-md col-lg-12 "> <a href="base_view_cssReport.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
                <?php endif; ?> <?php else : ?>
                <?php if ($data['date_rated'] == null) : ?>
                  <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?= $_GET['division']; ?>&id=<?= $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
                <?php else : ?>

                  <?php if (date('m', strtotime($data['start_date'])) == '1' || date('M', strtotime($data['start_date'])) == '2' || date('M', strtotime($data['start_date'])) == '3') : ?>
                    <button class="btn btn-info btn-md col-lg-12 "> <a href="report/TA/pages/viewCSS.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
                  <?php else : ?>
                    <button class="btn btn-info btn-md col-lg-12 "> <a href="base_view_cssReport.php?control_no=<?= $data['id']; ?>&id=<?php echo $data['emp_id']; ?>" style="decoration:none;color:#fff;"> View Survey<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
                  <?php endif; ?> <?php endif; ?>
              <?php endif; ?>


            <?php endif; ?>

          </td>
        <?php endif; ?>


      </tr>
    <?php endforeach; ?>

  </tbody>
</table>
<?php
function truncateString($string, $maxLength = 100)
{
  if (strlen($string) > $maxLength) {
    $string = substr($string, 0, $maxLength - 3) . '...';
  }
  return $string;
}
?>
<style>
  .btn {
    border: none;
    color: #fff;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius: 4px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    margin-bottom: 3%;
  }

  .btn:hover {
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
  }
</style>
<script>
  $(document).ready(function() {
    $(document).on('click', '.sweet-17', function(e) {
      e.preventDefault();
      var ids = $(this).data('id');
      swal("Control No: " + ids, "You already received this request", "success")

        .then(function() {
          $.ajax({
            url: "_ticketReleased.php",
            method: "POST",
            data: {
              id: ids,
              option: "released"
            },
            success: function(data) {
              setTimeout(function() {
                swal("Record saved successfully!");
              }, 3000);
              window.location = "base_ticket_monitoring.html.php";
            }
          });
        });
    });
    $(document).on('click', '#btn-take-action', function(e) {
            e.preventDefault();
            var ids = $(this).data('id');
            swal({
                title: "Are you sure you already finished with this request?",
                text: "Control No:" + ids,
                type: "info",
                showCancelButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }).then(function() {
                $.ajax({
                    url: "_ticketReleased.php",
                    method: "POST",
                    data: {
                        id: ids,
                        option: 'test'
                    },

                    success: function(data) {
                        setTimeout(function() {
                            swal("Service Complete!");
                        }, 3000);
                        window.location = "dash_complete_ta.php?role=<?= $_GET['role']; ?>&quarter=<?= $_GET['quarter']; ?>&id=" + ids;
                    }
                });
            });
        });
    $('#ict_monitoring').DataTable({
      // "ajax": "../ajax/data/objects.txt",
      "bInfo": false,

      'lengthChange': false,
      "dom": '<"pull-left"f><"pull-right"l>tip',

      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': false,
      'autoWidth': false,
      pageLength: 5,


      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,

      'searching': true,
    })

  })
</script>