<div class="modal fade" id="modal-dv_list" style="display: none;">
  <div class="modal-dialog modal-lg" style="width: 1250px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-book"></i> Disbursement Vouchers | NTA/NCA</h4>
      </div>
      <div class="modal-body">
        <table id="tb-dv_list" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th class="text-center" width="15%">DV NUMBER</th>
              <th class="text-center" width="20%">NTA/NCA</th>
              <th class="text-center" width="20%">PARTICULAR</th>
              <th class="text-center" width="15%">TOTAL AMOUNT</th>
              <th class="text-center" width="15%">NTA BALANCE</th>
              <th class="text-center" width="15%">DISBURSED AMOUNT</th>
            </tr>
          </thead>
          <tbody id="tbody-dv_list">
            <?php foreach ($ne_list as $key => $ne): ?>
              <tr onclick="toggleClass(this,'selected selected-row');" data-ne_id="<?= $ne['ne_id']; ?>">
                <td class="text-center"><span class="badge" style="background-color: green !important;"><?= $ne['dv_number']; ?></span></td>
                <td class="text-center"><?= $ne['nta_number']; ?></td>
                <td class="text-center"><?= $ne['nta_particular']; ?></td>
                <td class="text-center"><?= $ne['nta_amount']; ?></td>
                <td class="text-center"><?= $ne['nta_balance']; ?></td>
                <td class="text-center"><?= $ne['ne_disbursed_amount']; ?></td>
              </tr>   
            <?php endforeach ?>  
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <div class="box-tools pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-md btn-default" name="cancel" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-md btn-primary btn-select" name="save" data-dismiss="modal"><i class="fa fa-edit"></i> Select</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $("#tb-dv_list").DataTable({
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
</script>