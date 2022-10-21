<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <div style="position: absolute;">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-purchase_request"><i class="fa fa-plus-square"></i> Add Process Owner</button>
        </div>
      </div>
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th style="text-align:center;">LAST NAME</th>
            <th style="text-align:center;">FIRST NAME</th>
            <th style="text-align:center;">MI</th>
            <th style="text-align:center;">POSITION</th>
            <th style="text-align:center;">OFFICE</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
          <?php foreach ($process_owners as $key => $owner): ?>
            <tr>
              <td><?= $owner['lname']; ?></td>
              <td><?= $owner['fname']; ?></td>
              <td><?= $owner['mi']; ?></td>
              <td><?= $owner['position']; ?></td>
              <td><?= $owner['office']; ?></td>
              <td>
                  <div class="btn-group">
                    <button class="btn btn-danger btn-sm" onclick="delete_qp_owner(<?php echo $key; ?>);"><i class="fa fa-trash"></i></button>
                  </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>