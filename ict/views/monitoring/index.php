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
                      <th rowspan="2" style="width: 5%;"><?= wordwrap('OFFICE/SERVICE/BUREAU DIVISION/SECTION/UNIT', 15, "<br>\n", TRUE); ?></th>
                      <th rowspan="2" style="width: 10%;">ISSUE/CONCERN</th>
                      <th colspan="2" scope="colgroup">AGREED TIMELINE (if any)</th>
                      <th colspan="2" scope="colgroup" >COMPLETED</th>
                      <th rowspan="2">TOTAL PROCESSING TIME</th>
                      <th rowspan="2" style="width: 5%;">TYPE OF REQUEST</th>
                      <th rowspan="2" >OVERALL QUALITY TIME</th>
                      <th rowspan="2" style="width:5%!important;">STATUS</th>
                      <th rowspan="2" style="width:6%!important;">ACTIONS</th>
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
                        <td style="width:4%!important;"><?= $data['office']; ?></td>
                        <td><?= wordwrap($data['issue_problem'], 25, "<br>\n", TRUE); ?></td>
                        <td></td>
                        <td></td>
                        <td><?= $data['completed_date']; ?></td>
                        <td><?= $data['completed_time']; ?></td>
                        <td></td>

                        <td><?= wordwrap($data['type_req'], 15, "<br>\n", TRUE); ?></td>
                        <td><?= $data['quality']; ?></td>
                        <td><?= $data['status_request']; ?></td>
                        <td>
                          <!-- RECEIVED BUTTON -->
                          <?php if($data['start_date'] == '0000-00-00' || $data['start_date'] == null || $data['start_date'] == '~'):?>
                            <button  data-id ="<?= $data['control_no']; ?>" class = "btn btn-primary sweet-17 btn btn-md btn-primary col-lg-12">Receive</button>

                          <?php else:?>
                              <?php if($data['start_date'] != '0000-00-00' || $data['start_date'] != 'January 01, 1970' || $data['start_date'] != '~'):?>
                         
                                <button disabled title = "Received Date"  data-id = '<?= $data['control_no'];?>' class = "sweet-17 btn btn-md btn-primary col-lg-12 " >
                                Received Date<br>    
                                <b><?= $data['start_date'];?></b>
                                </button>
                                <br>
                              <?php endif;?>
                          <?php endif;?>
                          <!-- END -->
                          <br><br>
                          <!-- ASSIGN BUTTON -->
                          <?php if($_SESSION['complete_name']  == $data['assist_by']):?>
                            <button   data-id ="<?php echo $data['control_no'];?>" class = " col-lg-12 pull-right sweet-14  btn btn-danger" style = "background-color:orange;"> 
                            <?php if($data['assign_date'] == null || $data['assign_date'] == ''):?>
                            Assign</button>
                              <?php else: ?>
                                 
                                  Assigned Date<br>
                                  <?= date('F d, Y',strtotime($data['assign_date'])).'</b>';?></button><br>
                              
                              <?php endif;?>
                            <?php else: ?>
                              <button   data-id ="<?php echo $data['control_no'];?>" class = "col-lg-12 pull-right sweet-14 btn btn-danger" style = "background-color:orange;">

                            <?php if($data['assign_date'] == NULL || $data['assign_date'] == ''):?>
                              <?='Assign';?></button>

                            <?php else:?>
                              <?=  'Assigned Date<br>'; ?> 
                              <?='<b>'.date('F d, Y',strtotime($data['assign_date'])).'</b>';?></button><br>

                          <?php endif;?>
                          <?php endif;?>
                          <?php ?>
                          <!-- END -->
                              <br><br>
                          <!-- COMPLETE BUTTON -->
                          <?php if($data['status_request'] == 'Submitted'):?>
                            <button disabled id ="update_complete" data-id = '<?=$data['control_no'];?>' class = "col-lg-12 btn btn-md btn-success">Complete</button>
                          <?php else:?>
                            <?php if($data['completed_date'] == '0000-00-00' || $data['completed_date'] == null || $data['completed_date'] == 'January 01, 1970'):?>
                              <?php if($_SESSION['complete_name'] == $data['assist_by']):?>
                                <button id ="update_complete" data-id = '<?= $data['control_no'];?>' class = "col-lg-12 btn btn-md btn-success">Complete</button>
                              <?php else:?>
                                <button id ="update_complete"  data-id = '<?= $data['control_no'];?>' class = "col-lg-12 btn btn-md btn-success">Complete</button>
                              <?php endif;?>
                            <?php else:?>
                              <button title = "Completed Date"  id ="update_complete" data-id = '<?= $data['control_no'];?>' class = "col-lg-12 btn btn-md btn-success"> Completed Date<br> <?= $data['completed_date'];?> </button> <br>
                            <?php endif;?>
                          <?php endif;?>
                          <!-- END -->
                              <br><br>
                          <!-- RATE BUTTON -->
                          <?php if($data['completed_date'] == ''):?>
                            <button disabled class = "btn btn-danger btn-md col-lg-12 "> Rate Service </button>
                          <?php else:?>
                              <?php if($data['status_request'] == 'Completed'):?>
                                <?php if($data['date_rated'] != '' || $data['date_rated'] != null):?>
                                  <button class = "btn btn-danger btn-md col-lg-12 "> <a href = "dash_rate_service.php?division=<?=$_GET['division'];?>&id=<?= $data['control_no'];?>" style = "decoration:none;color:#fff;" > Rate Service </a> </button>
                                <?php else:?>
                                  <button   class = "btn btn-danger btn-md col-lg-12 "> <a href = "dash_rate_service.php?division=<?= $_GET['division'];?>&id=<?php echo $data['control_no'];?>" style = "decoration:none;color:#fff;" > Rate Service </a> </button>
                                <?php endif;?>
                              <?php elseif($data['status_request'] == 'Rated'):?>
                                <button    class = "btn btn-danger btn-md col-lg-12 "> <a href = "dash_rate_service.php?flag=1&division=<?php echo $_GET['division'];?>&id=<?php echo $data['control_no'];?>" style = "decoration:none;color:#fff;" > Rated Date<br><?php echo date('F d, Y', strtotime($data['date_rated']));?></a></button>
                              <?php else: ?>
                                <button    class = "btn btn-danger btn-md col-lg-12 "> <a href = "dash_rate_service.php?division=<?php echo $_GET['division'];?>&id=<?php echo $row['control_no'];?>" style = "decoration:none;color:#fff;" > Rate Service </a> </button>
                              <?php endif;?>

                          <?php endif;?>
                          <!-- END -->



                              

                        </td>

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
    $('#monitoring').DataTable({
        "dom": '<"pull-left"f><"pull-right"l>tip',
        'paging': true,
        "searching": true,
        "paging": true,
        "info": false,
        "bLengthChange": false,
        "lengthMenu": [
          [5, 20, -1],
          [5, 20, 'All']
        ],
        "ordering":true,

      })
       

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
<script src="_includes/sweetalert.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="_includes/sweetalert.css">
<link href="_includes/sweetalert2.min.css" rel="stylesheet"/>
<script src="_includes/sweetalert2.min.js" type="text/javascript"></script>


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script type="text/javascript">
    $('.sweet-14').click(function()
    {
        var ids=$(this).data('id');
        swal({
            title: 'Assign to:',
            input: 'select',
            inputOptions: {
            'Mark Kim A. Sacluti': 'Mark Kim A. Sacluti',
            'Louie Jake P. Banalan': 'Louie Jake P. Banalan',
            'Shiela Mei E. Olivar':'Shiela Mei E. Olivar',
            'Jan Eric C. Castillo':'Jan Eric C. Castillo',
            'Maybelline Monteiro':'Maybelline Monteiro',
            },
            inputPlaceholder: 'Select ICT Staff',
            showCancelButton: true,
            inputValidator: function (value) {
            return new Promise(function (resolve, reject) {
                if (value === 'Mark Kim A. Sacluti') {
                resolve()
                }else if(value == 'Louie Jake P. Banalan')
                {
                resolve()
                }else if(value == 'Shiela Mei E. Olivar'){
                resolve()
                }else if(value == 'Jan Eric C. Castillo'){
                resolve()
                }
                else{
                resolve()
                }
            })
            }
        }).then(function (result) {
            swal({
            type: 'success',
            html: 'Successfully approved by:' + result,
            closeOnConfirm: false
            })
            $.ajax({
            url:"_approvedTA.php",
            method:"POST",
            data:{
                ict_staff:result,
                control_no:ids
            },
         success:function(data)
              {
                  setTimeout(function () {
                  swal("Ticket No.already assigned!");
                  }, 3000);
                  window.location = 'processing.php?division=<?php echo $_GET['division'];?>&ticket_id='+data[0];
              }
            });
        });
    });
// =====================================================================
$(document).on('click','.sweet-17',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
    console.log(ids);
      swal("Control No: "+ids, "You already received this request", "success")
        // swal({
        //     title: "Are you sure you want to recieved this request?",
        //     text: "Control No:"+data[0],
        //     type: "info",
        //     showCancelButton: true,
        //     showCancelButton: true,
        //     confirmButtonText: 'Yes',
        //     closeOnConfirm: false,
        //     showLoaderOnConfirm: true
        // })
        .then(function () {
            $.ajax({
              url:"_ticketReleased.php",
              method:"POST",
              data:{
                  id:ids,
                  option:"released"
              },
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Record saved successfully!");
                  }, 3000);
                  window.location = "processing.php?division=<?php echo $_GET['division'];?>&ticket_id=";
              }
            });
        });
    });
$(document).on('click','#sweet-16',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
        swal({
            title: "Are you sure you already finished with this request?",
            text: "Control No:"+ids,
            type: "info",
            showCancelButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            $.ajax({
              url:"_ticketReleased.php",
              method:"POST",
              data:{
                  id:ids,
                  option:'complete'
              },
              
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Service Complete!");
                  }, 3000);
                  window.location = "_editRequestTA.php?division=<?php echo $_GET['division']?>&id="+ids;
              }
            });
        });
    });
$(document).on('click','#update_complete',function(e){
    e.preventDefault();
    var ids=$(this).data('id');
        swal({
            title: "Are you sure you already finished with this request?",
            text: "Control No:"+ids,
            type: "info",
            showCancelButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }).then(function () {
            $.ajax({
              url:"_ticketReleased.php",
              method:"POST",
              data:{
                  id:ids,
                  option:'test'
              },
              
              success:function(data)
              {
                  setTimeout(function () {
                  swal("Service Complete!");
                  }, 3000);
                  window.location = "dash_complete_ta.php?&division=<?php echo $_GET['division']?>&id="+ids;
              }
            });
        });
    });
</script>