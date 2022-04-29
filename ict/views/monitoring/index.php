<?php require_once 'ict/controller/ICTController.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Request for Quotation</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-d    ashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Request for Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
            <?php
              include 'connection.php';
            $name = $_SESSION['username'];
            $query = "SELECT * from tblemployeeinfo where UNAME = '$name'";
            $result = mysqli_query($conn,$query);
            if($row = mysqli_fetch_array($result))
            {
              if($_GET['division'] != '10')
              {
                ?>
                 <!-- Small boxes (Stat box) -->
 
      <!-- /.row -->
              
                <?php
              }else{
  
                ?>
                  <div class="well">
                    <div class="row">
                        <div class="col-md-2">
                              <?php include 'current_month.php';?>
                        </div>
                        <div class="col-md-2">
                              <select class="form-control " id="selectYear" style="width: 100%;">
                                <?php 
                                for($i= 2020; $i < 2023; $i++)
                                {
                                 if($i==2022){
                                  echo '<option value='.$i.' selected>'.$i.'</option>';

                                 }else{
                                  echo '<option value='.$i.' >'.$i.'</option>';

                                 }
                                }
                                ?>
                              </select>
                              
                        </div>
                        <div class="col-md-2">
                          <ol style = "margin-left:-50px;"><button class="btn btn-success" id = "fml"><i class="fa fa-file-excel-o"></i> Export PML Report</button></ol>
                        </div>&nbsp;
                        <div class="col-md-2" style = "margin-left:10px;">
                          <li class="btn btn-success" style = "margin-left:-40%;"><a  href="#" style="color:white;text-decoration: none;" id = "psl"><i class="fa fa-file-excel-o"></i> Export PSL Report</a></li>
                        </div>
                        <div class="col-md-2" style = "margin-left:-50px;">
                          <li class="btn btn-success" style = "margin-left:-40%;"><a  href="#" style="color:white;text-decoration: none;" id = "css"><i class="fa fa-file-excel-o"></i> Export CSS Report</a></li>
                        </div>
  
                        <!-- <div class = "col-md-2" style = "float:right;margin-right:-30px;">
                          <li class="btn btn-success">
                          <a href="requestForm.php?division=<?php echo $_GET['division'];?>" style="color:white;text-decoration: none;">Create Request</a>
                          </li>

                        </div> -->
                    </div>
                  </div>
                <?php
              }
            }
          
            
            ?>
                <div class="box box-primary" id="" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                    <div class="box-header with-border">
                        <b> Request for Quotation Entries
                        </b>
                        <div class="box-tools pull-right">
                            <button type="button" style="width:100%" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                   
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-condensed table-striped" id="monitoring">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>CONTROL NO.</th>
                                            <th>START DATE</th>
                                            <th>START TIME</th>
                                            <th>COMPLETED DATE</th>
                                            <th>COMPLETED TIME</th>
                                            <th>END USER</th>
                                            <th>OFFICE</th>
                                            <th>ISSUE/CONCERN</th>
                                            <th>MODE OF REQUEST</th>
                                            <th>ASSIGNED PERSON</th>
                                            <th>STATUS</th>
                                            <th style="text-align:center;max-width:20%;">ACTION</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($fetch_ict_opts as $key => $data) : ?>
                                            <tr>
                                                <td><?= $data['control_no']; ?></td>
                                                <td><?= $data['start_date']; ?></td>
                                                <td><?= $data['start_time']; ?></td>
                                                <td><?= $data['completed_date']; ?></td>
                                                <td><?= $data['complete_time']; ?></td>
                                                <td><?= $data['req_by']; ?></td>
                                                <td><?= $data['office']; ?></td>
                                                <td><?= $data['issue_problem']; ?></td>
                                                <td><?= $data['type_req']; ?></td>
                                                <td><?= $data['assist_by']; ?></td>
                                                <td><?= $data['status_request']; ?></td>
                                                <td><?= $data['id']; ?></td>
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
    $(document).ready(function(){
        $('#monitoring').DataTable({
        "dom": '<"pull-left"f><"pull-right"l>tip',
        'paging': true,
        "searching": true,
        "paging": true,
        "info": false,
        "bLengthChange": false,
        "lengthMenu": [
            [10, 20, -1],
            [10, 20, 'All']
        ],
        "ordering": false
    })
    // 
     
    let column_no = 0;

    $( '#table-filter' ).on( 'change', function () {
    // let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    column_no = (this.value);
    }); 

  
    $('#fml').on('click', function()
    {
      let year = $('#selectYear').val();
      window.location = "_fmlReport.php?month="+column_no+"&year="+year;
    });

    $('#psl').on('click', function()
    {
      let year = $('#selectYear').val();

      window.location = "psl_iso.php?month="+column_no+"&year="+year;
    });

    $('#css').on('click', function()
    {
      let year = $('#selectYear').val();

      window.location = "cssPMLReport.php?month="+column_no+"&year="+year;
    });
    });

</script>