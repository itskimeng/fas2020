<div class="col-md-12">
  <div class="box box-primary dropbox">
    <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table id="dtr" class="table table-striped table-bordered display" style="width:100%">
              <thead>
                <tr style="color: white; background-color: #367fa9;">
                  <th class="hidden"></th>
                  <th style="text-align:center;">DATE</th>
                  <th style="text-align:center;">AM ARRIVAL</th>
                  <th style="text-align:center;">AM DEPARTURE</th>
                  <th style="text-align:center;">PM ARRIVAL</th>
                  <th style="text-align:center;">PM DEPARTURE</th>
                  <th style="text-align:center;">UNDERTIME</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $dd): ?>
                  <tr>
                    <td><?= $key; ?></td>
                    <td><?= $dd['attendance_date']; ?></td>
                    <td><?= $dd['am_in']; ?></td>
                    <td><?= $dd['am_out']; ?></td>
                    <td><?= $dd['pm_in']; ?></td>
                    <td><?= $dd['pm_out']; ?></td>
                    <td>
                      <?php if ($dd['undertime'] != null AND $dd['undertime'] != '--' AND $dd['undertime'] != ''): ?>
                        <?php if ($dd['undertime'] == 'incomplete data'): ?>
                          <span class="badge bg-orange"><?= $dd['undertime']; ?></span>
                        <?php else: ?>
                          <span class="badge bg-red"><?= $dd['undertime']; ?></span>
                        <?php endif ?>
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
</div>