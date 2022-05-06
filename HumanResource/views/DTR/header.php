<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h4>Information</h4>
      <div class="box-tools">
        <?php if (in_array($username, $sys_admins)): ?>
          <a class="btn btn-success" href="HumanResource/route/export_dtr.php?emp_n=<?= $currentuser; ?>&month=<?= $current_month; ?>&year=<?= $current_year; ?>" style="color:white;text-decoration: none;"><i class="fa fa-download"></i> Export</a>
        <?php endif ?>
      </div>
    </div>
    <div class="box-body">
      <form id="det_form" method="GET">
        <input type="hidden" name="emp_n" value="<?= $currentuser; ?>">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="name" placeholder="" value="<?= $emp_name; ?>" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label for="office" class="col-sm-3 col-form-label">Office: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="office" placeholder="" value="<?= $user_info['division_long_m']; ?>" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label for="position" class="col-sm-3 col-form-label">Position: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="position" placeholder="" value="<?= $user_info['position_m']; ?>" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label for="month" class="col-sm-3 col-form-label">Month: </label>
              <div class="col-sm-8">
                <div class="row">
                  <div class="col-sm-6">
                    <select id="cform-month" name="month" class="form-control select2 month" data-placeholder="-- Select Month --" style="width:100%;" >
                      <option selected disabled>Select Month</option>
                      <?php foreach ($month_opts as $key => $month): ?>
                        <?php if ($key == $current_month): ?>
                          <option value="<?= $key; ?>" selected><?= $month; ?></option>
                        <?php else: ?>
                          <option value="<?= $key; ?>"><?= $month; ?></option>
                        <?php endif ?>
                      <?php endforeach ?>

                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select id="cform-year" name="year" class="form-control select2 year" data-placeholder="-- Select Month --" style="width:100%;" >
                      <option selected disabled>Select Year</option>
                      <option value="2022" <?= $current_year == '2022' ? 'selected' : ''; ?>>2022</option>
                      <option value="2021" <?= $current_year == '2021' ? 'selected' : ''; ?>>2021</option>
                      <option value="2020" <?= $current_year == '2020' ? 'selected' : ''; ?>>2020</option>
                    </select>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group row">
              <label for="position" class="col-sm-3 col-form-label">Date Generated: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="position" placeholder="" value="<?= $date_generated; ?>" readonly>
              </div>
            </div>
          </div>
        </div>

      </form>
      
      
    </div>
  </div>
</div>