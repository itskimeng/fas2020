<div class="modal fade" id="modal-dv_list" style="display: none;">
  <div class="modal-dialog modal-lg" style="width:1190px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-book"></i> Disbursement Vouchers</h4>
      </div>
      <div class="modal-body">
        <table id="tb-dv_list" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th class="text-center" width="15%">CODE</th>
              <th class="text-center" width="20%">OBLIGATION</th>
              <th class="text-center" width="20%">PURCHASE ORDER</th>
              <th class="text-center" width="15%">GROSS</th>
              <th class="text-center" width="15%">DEDUCTIONS</th>
              <th class="text-center" width="15%">NET</th>
            </tr>
          </thead>
          <tbody id="tbody-dv_list">
            <?php foreach ($dv_list as $key => $dv): ?>
              <tr class="dv-<?= $dv['dv_id']; ?>" onclick="toggleClass(this,'selected selected-row');" data-dv_id="<?= $dv['dv_id']; ?>" data-ob_id="<?= $key; ?>" data-object='<?= json_encode($dv);?>'>
                <td class="text-center">
                  <input type="hidden" class="pre_dv_id" value="<?= $dv['dv_id']; ?>">
                  <span class="badge bg-info"><a href="procurement_purchase_request_view.php?division=<?= $_SESSION['division']; ?>&id=<?= $dv['dv_number']; ?>" style="color: inherit;">DV-<?= $dv['dv_number']; ?></a></span>  
                </td>
                <td class="text-center"><span class="badge" style="background-color: green !important;"><?= $dv['serial_no']; ?></span></td>
                <td class="text-center"><?= $dv['po_code']; ?></td>
                <td class="text-center"><?= $dv['gross']; ?></td>
                <td class="text-center"><?= $dv['total_deductions']; ?></td>
                <td class="text-center">
                  <?= $dv['net_amount']; ?>
                </td>
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