<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <?php if (in_array($username, $sys_admins)): ?>
        <a class="btn btn-success" href="CreateEmployee.php?division=<?php echo $division ?>&username=<?php echo $username ?>" style="color:white;text-decoration: none;"><i class="fa fa-user-plus"></i> Add Employee</a>    
      <?php endif ?>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <table id="example2" class="table table-bordered table-striped display">
            <thead>
              <tr style="color: white; background-color: #367fa9;">
                <th class="hidden"></th>
                <th style="color:#367fa9;"></th>
                <th class="text-center">NAME</th>
                <th class="text-center">OFFICE</th>
                <th class="text-center">POSITION</th>
                <th class="text-center">OFFICE EMAIL ADDRESS</th>
                <?php if (in_array($username, $sys_admins)): ?>

                <th class="text-center">ACTION</th>
                    <?php endif ?>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dd): ?>
                <tr>
                  <td class="hidden" style="vertical-align: middle;"><?= $key; ?></td>
                  <td style="vertical-align: middle;"></td>
                  <td><?= $dd['fullname']; ?></td>
                  <td><?= $dd['office']; ?></td>
                  <td><?= $dd['position']; ?></td>
                  <td><?= $dd['office_email']; ?></td>
                  <?php if (in_array($username, $sys_admins)): ?>
                  <td>
                      <div class="btn-group">
                        <a href="UpdateEmployee.php?id=<?php echo $id; ?>&division=<?php echo $_GET['division']; ?>&username=<?php echo $_GET['username']; ?>" class="btn btn-primary btn-sm btn-block" title="Edit"><i class="fa fa-edit"></i></a>
                      </div>
                      <div class="btn-group">
                        <a href="dailytimerecord.php?emp_n=<?= $key; ?>" class="btn btn-warning btn-sm btn-block" title="Daily Time Record"><i class="fa fa-clock-o"></i></a>
                      </div>
                      <div class="btn-group">
                        <button class="btn btn-danger btn-sm btn-block" title="Block Employee"><i class="fa fa-ban"></i></button>
                      </div>
                  </td>
                    <?php endif ?>
                  <td class="hidden"><?= $dd['bday']; ?></td>
                  <td class="hidden"><?= $dd['gender']; ?></td>
                  <td class="hidden"><?= $dd['age']; ?></td>
                  <td class="hidden"><?= $dd['email']; ?></td>
                  <td class="hidden"><?= $dd['mobile_no']; ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
         
    </div>
  </div>
</div>