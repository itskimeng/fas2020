<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th style="text-align:center;">ACCOUNT NO</th>
            <th style="text-align:center;">DATE</th>
            <th style="text-align:center;">DV NO</th>
            <th style="text-align:center;">PAYEE</th>
            <th style="text-align:center;">STATUS</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
     		<?php foreach ($data1 as $key => $dd): ?>
     			<tr>
     				<td>
     					<?= $dd['account_no']; ?>
     				</td>
     				<td>
     					<?= $dd['date_created']; ?>
     				</td>
     				<td>
     					<?= $dd['dv_number']; ?>
     				</td>
     				<td>
     					<?= $dd['payee']; ?>
     				</td>
     				<td>
     					<?= $dd['status']; ?>
     				</td>
     				<td>
     					
     				</td>
     			</tr>
     		<?php endforeach ?>

     		<?php foreach ($data2 as $key => $dd): ?>
     			<tr>
            <td>
              <?= $dd['account_no']; ?>
            </td>
     				<td>
     					<?= $dd['date_created']; ?>
     				</td>
     				<td>
     					<?= $dd['dv_number']; ?>
     				</td>
     				<td>
     					<?= $dd['payee']; ?>
     				</td>
     				<td>
     					<?= $dd['status']; ?>
     				</td>
     				<td>
     					<div class="btn-group">
                  <a href="budget_fundsource_edit.php?source=<?= $key; ?>" class="btn btn-block btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                </div>
     				</td>
     			</tr>
     		<?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>
