<div class="col-md-12">
  <div class="box box-warning dropbox">
    <div class="box-header">
      <h5>Upload DTR History</h5>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <table id="dtr" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr style="color: white; background-color: #367fa9;">
                <th class="hidden"></th>
                <!-- <th style="text-align:center;">CUTOFF</th> -->
                <th style="text-align:center;">DATE FROM</th>
                <th style="text-align:center;">DATE TO</th>
                <th style="text-align:center;">UPLOADER</th>
                <th style="text-align:center;">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $dd): ?>
                <tr>
                  <td><?= $key; ?></td>
                  <!-- <td></td> -->
                  <td><?= $dd['date_from']; ?></td>
                  <td><?= $dd['date_to']; ?></td>
                  <td><?= $dd['uploader']; ?></td>
                  <td></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>
</div>
