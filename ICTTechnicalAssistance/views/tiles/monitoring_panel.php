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
      <tr>
        <td><?= $i++ . '.' ?>
      </td>
        <td><a style="font-size:12px;" href='viewTA.php?id=<?= $data['control_no']; ?>' target="_blank" rel="noopener noreferrer">
            <strong><?= $data['control_no']; ?></strong></a>
        </td>


        </td>
        <td><?= $data['start_date']; ?></td>
        <td><?= $data['start_time']; ?></td>
        <td><?= $data['req_by']; ?></td>
        <td style="width:4%!important;"><?= $data['office']; ?></td>
        <td><?= $data['issue_problem']; ?></td>
        <td><?= $data['assist_by'];?></td>
        <!-- <td></td> -->
        <!-- <td></td> -->
        <td><?= $data['completed_date']; ?></td>
        <td><?= $data['completed_time']; ?></td>

        <td><?= wordwrap($data['type_req'], 15, "<br>\n", TRUE); ?></td>
        <td><?= $data['status']; ?></td>
        <?php if($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3'):?>
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
            <button disabled id="update_complete" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
          <?php else : ?>
            <?php if ($data['completed_date'] == '0000-00-00' || $data['completed_date'] == null || $data['completed_date'] == 'January 01, 1970') : ?>
              <?php if ($_SESSION['complete_name'] == $data['assist_by']) : ?>
                <button id="update_complete" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
              <?php else : ?>
                <button id="update_complete" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success">Complete</button>
              <?php endif; ?>
            <?php else : ?>
              <button title="Completed Date" id="update_complete" data-id='<?= $data['control_no']; ?>' class="col-lg-12 btn btn-md btn-success"> Completed<br> <?= $data['completed_date']; ?> </button> <br>
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
            <?php elseif ($data['status'] == 'Rated') : ?>
              <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?flag=1&division=<?php echo $_GET['division']; ?>&id=<?php echo $data['id']; ?>" style="decoration:none;color:#fff;"> Rated Date<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
            <?php else : ?>
              <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?division=<?php echo $_GET['division']; ?>&id=<?php echo $data['id']; ?>" style="decoration:none;color:#fff;"> Rate Service </a> </button>
            <?php endif; ?>

          <?php endif; ?>
          <!-- END -->





        </td>
        <?php else:?>
     
          <td>
               <a class="btn btn-success btn-md col-lg-12 " target="_blank" rel="noopener noreferrer" href="viewTA.php?month=''&id=<?= $data['id']; ?>">View</a>

              <button class="btn btn-danger btn-md col-lg-12 "> <a href="dash_rate_service.php?flag=1&division=<?php echo $_GET['division']; ?>&id=<?php echo $data['id']; ?>" style="decoration:none;color:#fff;"> Rated Date<br><?php echo date('F d, Y', strtotime($data['date_rated'])); ?></a></button>
          </td>
                    <?php endif;?>


      </tr>
    <?php endforeach; ?>

  </tbody>
</table>
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