<div class="col-md-12">
  <div class="box box-primary dropbox">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-list-ul"></i> Entries</h3>

      <div class="box-tools pull-right">
        <div class="btn-group">
          <button type="button" class="btn btn-md btn-primary btn-add_entry" data-toggle="modal" data-target="#modal_object_code"><i class="fa fa-plus"></i> Add New</button>
        </div>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th style="text-align:center;">CODE</th>
            <th style="text-align:center;">UACS</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
          <?php foreach ($data as $key => $dd): ?>
            <tr>
              <td class="hidden"><?= $dd['id']; ?></td>
              <td><?= $dd['code']; ?></td>
              <td><?= $dd['uacs']; ?></td>
              <td>
                <div class="btn-group">
                  <a href="Finance/route/delete_object_code.php?id=<?= $dd['id']; ?>" class="btn btn-danger btn-block btn-row_remove"><i class="fa fa-trash-o"></i> Remove</a>


                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>
