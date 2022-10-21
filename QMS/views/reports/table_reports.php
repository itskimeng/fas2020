<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <div style="position: absolute;">
        <div class="btn-group">
            <a href="qms_reports_new.php?new" id="btn-advance_search" value="close" class="btn btn-block btn-success btn-sm"><i class="fa fa-plus"></i> Submit New Report</a>
        </div>
      </div>
      <table id="example" class="table table-striped table-bordered display table-hover" style="width:100%; border: 1px solid grey; border-radius: 3px;">
        <thead>
          <tr style="color: white; background-color: #367fa9;" align="center">
            <th style="text-align:center;">QP CODE</th>
            <th style="text-align:center;">FREQUENCY</th>
            <th style="text-align:center;">PROCEDURE TITLE</th>
            <th style="text-align:center;">PROCESS OWNER</th>
            <th style="text-align:center;">OFFICE</th>
            <!-- <th style="text-align:center;">CREATED BY</th> -->
            <th style="text-align:center;">PERIOD COVERED</th>
            <th style="text-align:center;">STATUS</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($qop_entries as $key => $qop_entry): ?>
            <tr align="center" style="background-color: <?php echo $status_style[$qop_entry['status']]; ?>;">
              <td><b><?php echo $qop_entry['qp_code']; ?></b></td>
              <td><?php echo $qp_frequency[$qop_entry['frequency_monitoring']]; ?></td>
              <td><?php echo $qop_entry['procedure_title']; ?></td>
              <td><?php echo $qop_entry['process_owner']; ?></td>
              <td><?php echo $qop_entry['division']; ?></td>
              <!-- <td>
                <p><?php echo $qop_entry['created_by']; ?></p>
                <p style="font-size: 13px; margin-top: -10px;"><i>~<?php echo $qop_entry['date_created']; ?>~</i></p>
              </td> -->
              <td>
                <?php echo $qop_entry['qp_covered']; ?>
                <p style="font-size: 13px; margin-top: -2px;"><i>~<?php echo $qop_entry['year_created']; ?>~</i></p>
              </td> 
              <td>
                <span class="badge" style="background-color: <?php echo $badge_style[$qop_entry['status']]; ?>;"><?php echo $status[$qop_entry['status']];?></span>
                <p style="font-size: 13px; margin-top: 0px; font-weight: bold;"><i><?php echo $qop_entry['updated_by']; ?></i></p>
                <p style="font-size: 10px; margin-top: -8px; font-weight: bold;"><i><?php echo $qop_entry['date_updated']; ?></i></p>
              </td>
              <td>
                <?php //if ($qop_entry['creator_id'] == $_SESSION['currentuser'] || $sys_admin == true): ?>
                  
                  <div class="btn-group">
                    <a href="qms_report_view.php?id=<?php echo $qop_entry['id']; ?>&parent=<?php echo $qop_entry['qop_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <?php if ($qop_entry['status'] == 0): ?>
                      <button class="btn btn-danger btn-sm" onclick="delete_qp_entry(<?php echo $qop_entry['id']; ?>);"><i class="fa fa-trash"></i></button>
                    <?php endif ?>
                  </div>

                <?php //endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>