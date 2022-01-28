<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$connect = new PDO("mysql:host=localhost;dbname=fascalab_2020", "fascalab_2020", "w]zYV6X9{*BN");
$username = $_GET['username'];
$username1 = $_SESSION['username'];
$division = $_GET['division'];

$admins = ['mmmonteiro', 'masacluti', 'seolivar'];
$hr_admins = moduleAccess($admins, $connect,1);
$po_admins = moduleAccess($admins, $connect,2);

function tblpersonnel($connect)
{
  $output = '';
  $query = "SELECT DIVISION_N,DIVISION_M FROM `tblpersonneldivision` WHERE DIVISION_N = 1 || DIVISION_N = 10 || DIVISION_N = 18 || DIVISION_N = 17 || DIVISION_N = 9 || DIVISION_N = 7 || DIVISION_N = 19 || DIVISION_N = 20 || DIVISION_N = 21 || DIVISION_N = 22 || DIVISION_N = 23 || DIVISION_N = 24 AND DIVISION_M IS NOT NULL ORDER BY DIVISION_M ASC  ";

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option text="text" value="' . $row["DIVISION_N"] . '">' . $row["DIVISION_M"] . '</option>';
  }
  return $output;
}

function moduleAccess($item, $connect, $access)
{
  $query = "SELECT access.access_type,emp.UNAME as 'username' from tbl_module_access access LEFT JOIN tblemployeeinfo as emp on access.user_id = emp.EMP_N  WHERE access.access_type = $access  ";

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    array_push($item, $row['username']);
  }
  return $item;
}





$sel = mysqli_query($conn, "SELECT * FROM phone_directory LIMIT 1");
$rows = mysqli_fetch_array($sel);
$posted_date = $rows['posted_date'];
$month = date('M', strtotime($posted_date));

$sele = mysqli_query($conn, "SELECT ACCESSTYPE,TIN_N FROM tblemployeeinfo WHERE UNAME = '$username1'");
$rowU = mysqli_fetch_array($sele);
$ACCESSTYPE = $rowU['ACCESSTYPE'];
$TIN_N = $rowU['TIN_N'];

if (isset($_POST['submit'])) {
  // $month_export = $_POST['month'];
  // $year_export = $_POST['year'];
  $office_export = $_POST['office'];

  // $full_date = $year_export.'-'.$month_export;

  echo ("<SCRIPT LANGUAGE='JavaScript'>
  window.location.href='export_employee.php?office=$office_export';
  </SCRIPT>");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="row">

  <div class="col-md-12">
    <div class="box box-warning dropbox">
      <div class="box-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Office </label>
              <select required class="form-control select2" name="office" id="office">
                <option disabled selected></option>
                <option value="0" selected>ALL</option>
                <?php echo tblpersonnel($connect) ?>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <br>
            <div class="btn-group" style="padding-top: 5px; margin-left: -20px;">
              <a href="javascript:void(0);" class="btn btn-warning link" data-id="<=$data['id']?>"><i class="fa fa-download"></i> Export</a>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

  <div class="col-md-12">
    <div class="box box-primary dropbox">
      <div class="box-header">
        <?php if ($ACCESSTYPE == 'admin' || in_array($username, $admins)) : ?>
          <a class="btn btn-success" href="CreateEmployee.php?division=<?php echo $division ?>&username=<?php echo $username ?>" style="color:white;text-decoration: none;"><i class="fa fa-user-plus"></i> Add Employee</a>
        <?php endif ?>
      </div>

      <div class="box-body table-responsive">
        <!-- <h1 align="">Directory of DILG-IV-A Employees</h1> -->
        <!-- <br> -->
        <form method="POST">
          <div class="row" id="boxed">
            <div class="col-xs-2">
              <!-- <br> -->

            </div>
            <div class="">
              <div>
                <div class="col-xs-1">
                </div>
                <div class="col-xs-2 " style="padding-top: 5px;" hidden>
                  <div>
                    <br>
                    <a href="javascript:void(0);" class="btn btn-success link2 pull-right" data-id="<=$data['id']?>">DTR</a>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div hidden>
                    <label>Employement Status </label>
                    <select class="form-control select2" name="emp_status" id="emp_status">
                      <option selected disabled></option>
                      <option value="Yes">Regular</option>
                      <option value="No">COS</option>
                    </select>

                  </div>
                </div>

              </div>

              <div class="col-xs-2" hidden>
                <div>
                  <label>Month </label>
                  <select class="form-control select2" name="month" id="month">
                    <option selected disabled></option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
              </div>
              <!-- <div class="col-xs-2 pull-right">
                <label>Office </label>
                <select required class="form-control select2" name="office" id="office">
                  <option disabled selected ></option>
                  <option value="0" >ALL</option>
                  <?php //echo tblpersonnel($connect)
                  ?>
                </select>
              </div>

              <div class="col-xs-1 pull-right" style="padding-top: 5px;">
                <br>
                <a href="javascript:void(0);" class="btn btn-primary link" data-id="<=$data['id']?>">Export</a>
                <br>  
                <br>  
              </div> -->

            </div>
          </div>
        </form>
        <!-- <br> -->
        <!-- <br> -->
        <table id="example1" class="table table-striped table-bordered" style="width:;background-color: white;">
          <thead>
            <tr style="background-color: white;color:black;">
              <th class="center_align">FIRST NAME</th>
              <th class="center_align">MIDDLE NAME</th>
              <th class="center_align">LAST NAME</th>
              <th class="center_align">OFFICE</th>
              <th class="center_align">POSITION</th>
              <th class="center_align">DESIGNATION</th>
              <th class="center_align">MOBILE NO</th>
              <th class="center_align">PERSONAL EMAIL ADDRESS</th>
              <th class="center_align">OFFICE CONTACT NO</th>
              <th class="center_align">OFFICE EMAIL ADDRESS</th>
              <th class="center_align">BIRTHDAY</th>
              <th class="center_align" style="width: 50px;">ACTION</th>
            </tr>
          </thead>
          <?php
          $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
          $view_query = mysqli_query($conn, "SELECT tblemployee.LANDPHONE,tblemployee.REMARKS_M,tblemployee.EMP_N,tblemployee.FIRST_M,tblemployee.MIDDLE_M,tblemployee.UNAME,tblemployee.LAST_M,tblemployee.BIRTH_D,tblemployee.EMAIL,tblemployee.ALTER_EMAIL,tblemployee.MOBILEPHONE,tblpersonneldivision.DIVISION_M,tbldilgposition.POSITION_M,tbldesignation.DESIGNATION_M, tbl_province.LGU_M, tblemployee.STATUS
          FROM tblemployeeinfo tblemployee 
          LEFT JOIN tblpersonneldivision on tblpersonneldivision.DIVISION_N = tblemployee.DIVISION_C 
          LEFT JOIN tbldilgposition on tbldilgposition.POSITION_ID = tblemployee.POSITION_C 
          LEFT JOIN tbldesignation on tbldesignation.DESIGNATION_ID = tblemployee.DESIGNATION
          LEFT JOIN tbl_province on tbl_province.PROVINCE_C = tblemployee.PROVINCE_C 
          WHERE tblemployee.STATUS = 0
          ORDER BY tblemployee.LAST_M ASC");


          while ($row = mysqli_fetch_assoc($view_query)) {
            $id = $row["EMP_N"];
            $FIRST_M = $row["FIRST_M"];
            $MIDDLE_M = $row["MIDDLE_M"];
            $LAST_M = $row["LAST_M"];
            $DIVISION_M = $row["DIVISION_M"];
            $LGU_M = $row["LGU_M"];
            $POSITION_M = $row["POSITION_M"];
            $DESIGNATION_M = $row["DESIGNATION_M"];
            $office_contact = $row["LANDPHONE"];
            $office_address = $row["REMARKS_M"];
            $MOBILEPHONE = $row["MOBILEPHONE"];
            $ALTER_EMAIL = $row["ALTER_EMAIL"];
            $EMAIL = $row["EMAIL"];
            $BIRTH_D = $row["BIRTH_D"];
            $UNAME = $row["UNAME"];
            $BIRTH = date('F d', strtotime($BIRTH_D));

          ?>
            <tr>
              <td width=""><?php echo $FIRST_M; ?></td>
              <td width=""><?php echo $MIDDLE_M; ?></td>
              <td width=""><?php echo $LAST_M; ?></td>
              <td width=""><?php echo $DIVISION_M; ?></td>
              <td width=""><?php echo $POSITION_M; ?></td>
              <td width=""><?php echo $DESIGNATION_M; ?></td>
              <td width=""><?php echo $MOBILEPHONE; ?></td>
              <td width=""><?php echo $EMAIL; ?></td>
              <td width=""><?php echo $office_contact; ?></td>
              <td width=""><?php echo $ALTER_EMAIL; ?></td>
              <td width=""><?php echo $BIRTH; ?></td>

              <?php if ($ACCESSTYPE == 'admin' && in_array($username, $hr_admins)) { ?>
                <td width="150">
                    <a href='UpdateEmployee.php?id=<?php echo $id; ?>&division=<?php echo $_GET['division']; ?>&username=<?php echo $_GET['username']; ?>' title="Edit" class="btn btn-primary btn-sm" style="width:100%;"> <i class='fa'>&#xf044;</i>Edit</a>
                    <br><a href='DTRa.php?id=<?php echo $id; ?>&division=<?php echo $_GET['division']; ?>&username=<?php echo $UNAME; ?>' title="dtr" class="btn btn-warning btn-sm" style="width:100%;margin-top:5px;"> <i class='fa fa-fw fa-clock-o'></i>DTR</a>
                    <br><a data-value="<?php echo $id; ?>" title="delete" class="blockBtn btn btn-danger btn-sm " style="width:100%;margin-top:5px;"> <i class='fa fa-fw fa-ban'></i> Block</a>
                </td>
             <?php }else if(in_array($username,$po_admins)){ ?>
              <td width="150">
                    <br><a href='DTRa.php?id=<?php echo $id; ?>&division=<?php echo $_GET['division']; ?>&username=<?php echo $UNAME; ?>' title="dtr" class="btn btn-warning btn-sm" style="width:100%;margin-top:5px;"> <i class='fa fa-fw fa-clock-o'></i>DTR</a>
                </td>
              <?php }else if($username == $row['UNAME']){ ?>
                <td width="150">

                <a href='UpdateEmployee.php?id=<?php echo $id; ?>&division=<?php echo $_GET['division']; ?>&username=<?php echo $_GET['username']; ?>' title="Edit" class="btn btn-primary btn-sm" style="width:100%;"> <i class='fa'>&#xf044;</i>Edit</a>
                </td>
                <?php }else{ ?>
                  <td></td>
                <?php } ?>
               
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="welcome-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
        <div class="box box-primary box-solid dropbox">
          <div class="box-header with-border">
            <h5 class="box-title"><i class="fa fa-ban"></i>HR Section: Blocking of Accounts</h5>


            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">

                </div>
              </div>
              <div class="card-body card-body-filter collapse show">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Current Status:</label>
                      <select class="form-control select2 select2-hidden-accessible" id="option" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="year">
                        <option value="1">Transferred</option>
                        <option value="2">Deceased</option>
                        <option value="3">Retired</option>
                        <option value="4">Resigned</option>
                        <option value="5">End of Contract</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-8 ">
                    <div class="form-group">
                      <label>Note:</label>

                      <textarea id="note" class="form-control" style="margin: 0px 8.33333px 0px 0px; width: 547px; height: 203px;resize:none;"></textarea>
                      <input type="hidden" id="account_id" value=""/>
                    </div>
                    <button id="btnSubmit" type="submit" class="btn btn-success pull-right"><i class="fa fa-save"> </i>Submit</button>

                  </div>


                </div>


              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        
      </div>
      

  </div>
</div>
<!-- end modal -->
<script>
    $('.blockBtn').click(function() {
      $('#welcome-modal').modal();
      let id = $(this).data('value');
      $(".modal #account_id").val( id );

    });
    $('#btnSubmit').click(function(){
      let id = $('#account_id').val();
      let note_val = $('#note').val();
      let option_val = $('#option').val();
        $.post({
          url: 'delete_account2.php',
          data:{
            id:id,
            note: note_val,
            option:option_val,

          },  
          success: function(data) {
            window.location.href='ViewEmployees.php?division=<?= $_GET['division'];?>&username=<?= $_GET['username'];?>';

          }
        })
    })

    $('.link').click(function() {

      var f = $(this);
      var id = f.data('id');

      var office = $('#office').val();

      window.location =
        'export_employee.php?office=' + office;
      // 'export_employee.php?office='+office+'&pr_no='+pr_no;
    });
    $('.link2').click(function() {

      var f = $(this);
      var id = f.data('id');

      var office = $('#office').val();
      var emp_status = $('#emp_status').val();
      var month = $('#month').val();

      window.location =
        'pdf/examples/export_dtr.php?office=' + office + '&month=' + month + '&emp_status=' + emp_status;
      // 'export_employee.php?office='+office+'&pr_no='+pr_no;
    });
  </script>