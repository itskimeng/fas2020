<?php $is_active1 = (isset($_GET['province'])) ? '' : 'active'; ?>
<?php $is_active2 = (isset($_GET['province'])) ? 'active' : ''; ?>
<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-graph"></i>Employee's Directory Completion Status</h3>
    </div>
    <div class="box-body custom-box-body">
      <div class="table-responsive">
        <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
          <li role="presentation" class=" <?= $is_active1; ?>">
            <a href="#emp_directory" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
              <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Employee's Directory
            </a>
          </li>
        

        </ul>
        <div class="tab-content">


          <div role="tabpanel" class="tab-pane <?= $is_active1; ?>" id="emp_directory">
            <div class="row">
              <div class="col-md-12">
                <?php if (in_array($username, $sys_admins)) : ?>
                  <a class="btn btn-success" href="CreateEmployee.php?division=<?php echo $division ?>&username=<?php echo $username ?>" style="color:white;text-decoration: none;margin-bottom:5px;"><i class="fa fa-user-plus"></i> Add Employee</a>
                  <a class="btn btn-primary pull-right" href="download_employee.php" style="color:white;text-decoration: none;margin-bottom:5px;"><i class="fa fa-file-excel-o"></i> Download </a>
                <?php endif ?>
                <table id="example2" class="table table-bordered table-striped display">
                  <thead>
                    <tr style="color: white; background-color: #367fa9;">
                      <th class="hidden"></th>
                      <th style="color:#367fa9;"></th>
                      <th class="text-center">EMPLOYEE CODE</th>
                      <th class="text-center">NAME</th>
                      <th class="text-center">PROVINCE</th>
                      <th class="text-center">POSITION</th>
                        <?php echo isset($_GET['pwd']) ? '<th class="text-center">ARE YOU A PWD?</th>' : null; ?>
                        <?php echo isset($_GET['health_issues']) ? '<th class="text-center">HEALTH ISSUES</th>' : null; ?>
                        <?php echo isset($_GET['solo']) ? '<th class="text-center">ARE YOU A SOLO PARENT?</th>' : null; ?>
                      <th class="text-center">OFFICE EMAIL ADDRESS</th>
                      <th class="text-center">PERCENTAGE</th>
                      <?php if (in_array($username, $sys_admins)) : ?>

                        <th class="text-center" style="width:30%;">ACTION</th>
                      <?php endif ?>
                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $dd) : ?>
                      <tr>  
                        <td class="hidden" style="vertical-align: middle;"><?= $key; ?></td>
                        <td style="vertical-align: middle;"></td>
                        <td><?= $dd['emp_c']; ?></td>
                        <td><?= $dd['fullname']; ?></td>
                        <td><?= $dd['office']; ?></td>
                        <td><?= $dd['position']; ?></td>
                        <?php echo isset($_GET['pwd']) ? "<td>".$dd['q3']."<br>~<b>PWD ID:".$dd['pwd_id']."<b>~</td>" : null; ?>
                        <?php echo isset($_GET['health_issues']) ? "<td>Condition:<b>".$dd['health_issues']."</b></td>" : null; ?>
                        <?php echo isset($_GET['solo']) ? "<td>".$dd['q4']."<br>~<b>SOLO PARENT:".$dd['spid']."<b>~</td>" : null; ?>
                        <td><?= $dd['office_email']; ?></td>
                        <td><?= $dd['percentage']; ?>%</td>

                        <?php if (in_array($username, $sys_admins)) : ?>
                          <td>
                            <div class="btn-group">
                              <?php if ($username == 'masacluti') : ?>

                                <a href="UpdateEmployee.php?id=<?= $key; ?>&division=<?php echo $_GET['division']; ?>&username=<?= $dd['uname']; ?>" class="btn btn-primary btn-sm btn-block" title="Edit"><i class="fa fa-edit"></i></a>
                              <?php endif; ?>
                            </div>
                            <div class="btn-group">
                              <a href="dailytimerecord.php?emp_n=<?= $key; ?>" class="btn btn-warning btn-sm btn-block" title="Daily Time Record"><i class="fa fa-clock-o"></i></a>
                            </div>

                            <?php if ($dd['emp_status'] == 'N') : ?>
                              <div class="btn-group">
                                <button class="btn btn-danger btn-sm btn-block" title="Block Employee" onclick="blockEmployee('<?php echo $key; ?>');"><i class="fa fa-ban"></i></button>
                              </div>
                            <?php else : ?>
                              <div class="btn-group">
                                <button class="btn btn-success btn-sm btn-block" title="Approve Employee" onclick="acceptEmployee('<?php echo $key; ?>');"><i class="fa fa-check"></i></button>
                              </div>
                              <!-- <div class="btn-group">
                          <button class="btn btn-danger btn-sm btn-block" title="Delete Employee" onclick="deleteEmployee('<?php echo $key; ?>');"><i class="fa fa-trash"></i></button>
                        </div> -->

                            <?php endif ?>


                          </td>
                        <?php endif ?>
                        <td class="hidden"><?= $dd['bday']; ?></td>
                        <td class="hidden"><?= $dd['gender']; ?></td>
                        <td class="hidden"><?= $dd['age']; ?></td>
                        <td class="hidden"><?= $dd['mobile_no']; ?></td>
                        <td class="hidden"><?= $dd['email']; ?></td>
                        <td class="hidden" style="text-align:center;"><input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['generation'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['awards'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['hea'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q5'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q6'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q2'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q3'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q4'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q1'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['years_in_service'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q7'])) ? "checked" : ""; ?>> </td>
                        <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q8'])) ? "checked" : ""; ?>> </td>


                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

         
        </div>
      </div>
    </div>

    <style>
      .bg-yellow2 {
        background-color: #ebf820 !important;
      }

      .bg-yellow2:hover {
        background-color: #d7e31a !important;
      }

      .bg-red2 {
        background-color: #c20e41 !important;
      }

      .bg-red2:hover {
        background-color: #a40d37 !important;
      }

      .bg-blue2 {
        background-color: #1345a0 !important;
      }

      .bg-blue2:hover {
        background-color: #0c3683 !important;
      }

      .bg-green2 {
        background-color: #13a016 !important;
      }

      .bg-warning {
        background-color: #ffc107;
      }

      .bg-warning:hover {
        background-color: #ffc107 !important;
        color: black;
      }

      .bg-green2:hover {
        background-color: #108712 !important;
      }

      .zoom {
        z-index: 1;
        transition: transform .5s;
        /* Animation */
      }

      .zoom:hover {
        z-index: 9999;
        /*margin-top: 13px !important;*/
        /*margin-bottom: 13px !important;*/
        transform: scale(1.1);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
      }

      .info-box .info-box-number {
        display: block;
        margin-top: 0.25rem;
        font-weight: 700;
      }

      .info-box .info-box-content {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        line-height: 1.8;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        padding: 0 10px;
      }

      /* Custom nav-tabs */
      .tab-content {
        border-bottom: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        display: block;
        border-radius: 0 0 0.25em 0.25em;
      }

      .tab-content .tab-pane {
        text-align: left;
        padding: 10px;
      }

      .tab-content .tab-pane h3 {
        margin: 0;
      }

      .cd-breadcrumb {
        padding: 6px 7px;
        margin: 0;
        background-color: transparent;
        border-radius: 0.25em 0.25em 0 0;
      }

      .cd-breadcrumb.nav-tabs {
        border-left: 1px solid #ddd;
        border-top: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: none;
      }

      .cd-breadcrumb.nav-tabs>li.active>a,
      .cd-breadcrumb.nav-tabs>li.active>a:hover,
      .cd-breadcrumb.nav-tabs>li.active>a:focus {
        color: #fff;
        background-color: #144677;
        border: 0px solid #144677;
        cursor: default;
      }

      .cd-breadcrumb.nav-tabs>li>a {
        margin-right: inherit;
        line-height: inherit;
        height: 48px;
        border: inherit;
        border-radius: inherit;
        border-color: #edeff0;
      }

      .cd-breadcrumb li {
        display: inline-block;
        float: left;
        margin: 0.5em 0;
      }

      .cd-breadcrumb li::after {
        /* this is the separator between items */
        display: inline-block;
        content: '\00bb';
        margin: 0 0.6em;
        color: tint(#144677, 50%);
      }

      .cd-breadcrumb li:last-of-type::after {
        /* hide separator after the last item */
        display: none;
      }

      .cd-breadcrumb li>* {
        /* single step */
        display: inline-block;
        font-size: 1.4rem;
        color: #144677;
      }

      .cd-breadcrumb li.current>* {
        /* selected step */
        color: #144677;
      }

      .cd-breadcrumb a:hover {
        /* steps already visited */
        color: #144677;
      }

      .cd-breadcrumb.custom-separator li::after {
        /* replace the default arrow separator with a custom icon */
        content: '';
        height: 16px;
        width: 16px;
        vertical-align: middle;
      }

      .cd-breadcrumb li {
        margin: 1.2em 0;
      }

      .cd-breadcrumb li::after {
        margin: 0 1em;
      }

      .cd-breadcrumb li>* {
        font-size: 1.6rem;
      }

      .cd-breadcrumb.triangle li {
        position: relative;
        padding: 0;
        margin: 0 4px 0 0;
      }

      .cd-breadcrumb.triangle li:last-of-type {
        margin-right: 0;
      }

      .cd-breadcrumb.triangle li .octicon {
        margin-right: 10px;
      }

      .cd-breadcrumb.triangle li>* {
        position: relative;
        padding: 0.8em 0.8em 0.7em 2.5em;
        color: #333;
        background-color: #edeff0;
        /* the border color is used to style its ::after pseudo-element */
        border-color: #edeff0;
      }

      .cd-breadcrumb.triangle li.active>* {
        /* selected step */
        color: #fff;
        background-color: #144677;
        border-color: #144677;
      }

      .cd-breadcrumb.triangle li:first-of-type>* {
        padding-left: 1.6em;
        border-radius: 4px 0 0 4px;
      }

      .cd-breadcrumb.triangle li:last-of-type>* {
        padding-right: 1.6em;
        border-radius: 0 0.25em 0.25em 0;
      }

      .cd-breadcrumb.triangle a:hover {
        /* steps already visited */
        color: #fff;
        background-color: #144677;
        border-color: #144677;
        text-decoration: none;
      }

      .cd-breadcrumb.triangle li::after,
      .cd-breadcrumb.triangle li>*::after {
        /* li > *::after is the colored triangle after each item li::after is the white separator between two items */
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        content: '';
        height: 0;
        width: 0;
        /* 48px is the height of the <a> element */
        border: 24px solid transparent;
        border-right-width: 0;
        border-left-width: 20px;
      }

      .cd-breadcrumb.triangle li::after {
        /* this is the white separator between two items */
        z-index: 1;
        -webkit-transform: translate(4px, 0);
        -ms-transform: translate(4px, 0);
        -o-transform: translate(4px, 0);
        transform: translate(4px, 0);
        border-left-color: #fff;
        /* reset style */
        margin: 0;
      }

      .cd-breadcrumb.triangle li>*::after {
        /* this is the colored triangle after each element */
        z-index: 2;
        border-left-color: inherit;
      }

      .cd-breadcrumb.triangle li:last-of-type::after,
      .cd-breadcrumb.triangle li:last-of-type>*::after {
        /* hide the triangle after the last step */
        display: none;
      }
    </style>