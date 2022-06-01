<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h5>DTR Generation</h5>
      <div class="box-tools">
        <?php if (in_array($username, $sys_admins)): ?>
          <div class="btn-group">
            <button type="submit" class="btn btn-success btn-md" id="btn-send_all_mail" data-toggle="modal" data-target="#exportModal"><i class="fa fa-download"></i> Export DTR</button>
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-primary btn-md" id="btn-send_all_mail" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-upload"></i> Import DTR</button>
          </div>
        <?php endif ?>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <table id="dtr" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr style="color: white; background-color: #367fa9;">
                <th class="hidden"></th>
                <th style="text-align:center;">CUTOFF DATE FROM</th>
                <th style="text-align:center;">CUTOFF DATE TO</th>
                <th style="text-align:center;">DATE GENERATED</th>
                <th style="text-align:center;">IMPORTER/EXPORTER</th>
                <th style="text-align:center;">TYPE OF ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dd): ?>
                <tr>
                  <td><?= $key; ?></td>
                  <!-- <td></td> -->
                  <td><?= $dd['date_from']; ?></td>
                  <td><?= $dd['date_to']; ?></td>
                  <td><?= $dd['date_uploaded']; ?></td>
                  <td><?= $dd['uploader']; ?></td>
                  <td>
                    <?php if ($dd['action'] == 'export'): ?>
                      <span class="badge bg-green"><i><?= strtoupper($dd['action']); ?></i></span>
                    <?php else: ?>
                      <span class="badge bg-blue"><i><?= strtoupper($dd['action']); ?></i></span>
                    <?php endif ?>
                    
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>
</div>
