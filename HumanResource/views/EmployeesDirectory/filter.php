<style>
 .span-center{
  text-align:center !important;
 }
</style>
<div class="col-lg-4">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>User Accounts Statistics</h4>
    </div>
    <div class="box-body" style="height:140px; overflow-y:auto;">
      <table class="table table-condensed table-bordered">
        <thead>
          <tr>
            <th></th>
            <th colspan="3" class="text-center">Total</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>All Accounts</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['all'];?></span></td>
         
          </tr>
          <tr>
            <td>Region</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['region'];?></span></td>

          </tr>
          <tr>
            <td>CAVITE</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['cavite'];?></span></td>

          </tr>
          <tr>
            <td>LAGUNA</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['laguna'];?></span></td>

          </tr>
          <tr>
            <td>BATANGAS</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['batangas'];?></span></td>
            
          </tr>
          <tr>
            <td>RIZAL</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['rizal'];?></span></td>

          </tr>
          <tr>
            <td>QUEZON</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['quezon'];?></span></td>

          </tr>
          <tr>
            <td>LUCENA CITY</td>
            <td colspan="3" class="span-center"><span class="badge "><?= $emp_stat_opts['lucena'];?></span></td>

          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>For Action
    </div>
    <div class="box-body">
      <table class="table table-condensed table-bordered">
        <thead>
          <tr>
            <th></th>
            <th colspan="3" class="span-center">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Primary Accounts with same Employee IDs</td>
            <td colspan="3" class="span-center"><span class="badge"><?= $emp_stat_opts['duplicate_empid'];?></span></td>

          </tr>
          <tr>
            <td>Accounts with missiong Office</td>
            <td colspan="3" class="span-center"><span class="badge"><?= $emp_stat_opts["missing_office"];?></span></td>
      
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>For Information</h4>
    </div>
    <div class="box-body">
      <table class="table table-condensed table-bordered">
        <thead>
          <tr>
            <th></th>
            <th colspan="3" class="span-center">Total</th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>Block Accounts</td>
            <td colspan="3" class="span-center"><span class="badge"><?= $emp_stat_opts['block_account'];?></span></td>
           
          </tr>
          <tr>
            <td>Newly Registered Accounts</td>
            <td colspan="3" class="span-center"><span class="badge"><?= $emp_stat_opts['activated']?></span></td>
     
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">

  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>Search Filter</h4>
    </div>
    <div class="box-body">
      <form id="det_form" method="GET">
        <div class="row">
          <div class="col-md-4">
            <?= group_select2('Office', 'office', $office_opts, isset($_GET['office']) ? $_GET['office'] : '', 'office'); ?>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Employee ID No.:</label>


              <input class="form-control" name="emp_id" id="emp_id" value=""/>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Name:</label>


              <input class="form-control" name="emp_name" id="emp_name" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?= group_select2('Age Category', 'age_category', $age_category_opts, isset($_GET['age_category']) ? $_GET['age_category'] : '', 'age_category'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?= group_select2('Civil Status', 'civil_status', $civil_status_opts, isset($_GET['civil_status']) ? $_GET['civil_status'] : '', 'civil_status'); ?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <?= group_select2('With Health Issues', 'health_issues', $health_issues_opts, isset($_GET['health_issues']) ? $_GET['health_issues'] : '', 'health_issues'); ?>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
              <button type="submit" class="btn btn-md btn-primary btn-block"><i class="fa fa-filter"></i> Filter</button>
            </div>

            <div class="btn-group">
              <!-- <button type="button" class="btn btn-md btn-warning btn-block btn-export" target="_blank"><i class="fa fa-download"></i> Export</button> -->
            </div>

            <?php if (in_array($username, $sys_admins)) : ?>
              <div class="btn-group">
                <!-- <button type="button" class="btn btn-md btn-success btn-block btn-generate" data-toggle="modal" data-target="#exportModal"><i class="fa fa-download"></i> Generate</button> -->
              </div>
            <?php endif ?>

            <div class="btn-group">
              <a href="employees_directory.php" class="btn btn-md btn-default btn-block"><i class="fa fa-refresh" aria-hidden="true"></i> Clear</a>
            </div>
          </div>
        </div>


      </form>

    </div>
  </div>
</div>