<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <div style="position: absolute;">
        <div class="btn-group">
            <a href="qms_procedures_new.php?new" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Procedure</a>
        </div>
      </div>
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th></th>
            <th style="text-align:center;">FREQUENCY</th>
            <th style="text-align:center;">QP CODE</th>
            <th style="text-align:center;">PROCEDURE TITLE</th>
            <th style="text-align:center;">PROCESS OWNER</th>
            <th style="text-align:center;">OFFICE</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
          <?php foreach ($data as $key => $dd): ?>
            <tr>
              <td></td>
              <td></td>
              <td><?= $frequency_name[$dd['frequency_monitoring']]; ?></td>
              <td><?= $dd['qp_code']; ?></td>
              <td><?= $dd['procedure_title']; ?></td>
              <td><?= $dd['process_owner']; ?></td>
              <td><?= $dd['office']; ?></td>
              <td>
                <?php if ($dd['is_owner'] OR $is_admin): ?>
                  <div class="btn-group">
                    <a href="qms_procedures_new.php?id=<?= $key; ?>" class="btn btn-success btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
                  </div>
                <?php endif ?>

                <?php if ($is_admin): ?>
                  <div class="btn-group">
                    <!-- <a href="QMS/route/delete_qms_procedure.php?id=<?= $key; ?>" class="btn btn-danger btn-sm btn-view" title="Edit"> <i class="fa fa-trash-o"></i></a> -->
                    
                    <button class="btn btn-danger btn-sm" onclick="delete_qp_entry(<?php echo $dd['id']; ?>);"><i class="fa fa-trash"></i></button>
                  </div>
                <?php endif ?>

              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>