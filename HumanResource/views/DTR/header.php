<div class="col-md-12">
  <div class="row">
    <div class="col-md-4">
      <div class="box box-warning dropbox">
        <div class="box-header">
          <h4><b>Profile</b></h4>
          
        </div>
        <div class="box-body" style="height: 230px;">
          <div class="row">
            <div class="col-md-12">
              <div class="circle">
                <div>
                  <img class="profile-pic" 
                    src="<?= $user_info['profile']; ?>" style="height: 100% !important; width: 100% !important; object-fit: cover;">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="clabel" style="text-align: center; margin-top: 6px;">
                <label><?= $emp_name; ?></label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="clabel" style="text-align: center; margin-top: -10px;">
                <label><small>Employee Code: <?= $emp_code; ?></small></label>
              </div>
            </div>
          </div>
          
        </div>
      </div>  
      
    </div>
    <div class="col-md-8">
      <div class="box box-warning dropbox">
        <div class="box-header">
          <h4><b>Information</b></h4>
          <div class="box-tools">
            <?php if (in_array($username, $sys_admins)): ?>
              <a class="btn btn-success" href="HumanResource/route/export_dtr.php?emp_n=<?= $currentuser; ?>&month=<?= $current_month; ?>&year=<?= $current_year; ?>" style="color:white;text-decoration: none;"><i class="fa fa-download"></i> Export</a>
            <?php endif ?>
          </div>
        </div>
        <div class="box-body" style="height: 230px;">
          <form id="det_form" method="GET">
            <input type="hidden" name="emp_n" value="<?= $currentuser; ?>">
            <div class="row">
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="office" class="col-sm-4 col-form-label">OFFICE: </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="office" placeholder="" value="<?= $user_info['division_long_m']; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="position" class="col-sm-4 col-form-label">POSITION: </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="position" placeholder="" value="<?= $user_info['position_m']; ?>" readonly>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="month" class="col-sm-4 col-form-label">MONTH & YEAR: </label>
                  <div class="col-sm-8">
                    <div class="row">
                      <div class="col-sm-6">
                        <select id="cform-month" name="month" class="form-control select2 month" data-placeholder="-- Select Month --" style="width:100%;" >
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
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="position" class="col-sm-4 col-form-label">DATE GENERATED: </label>
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
    
  </div>
</div>