<div class="modal fade" id="modal-default" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-book"></i> Purchase Order</h4>
      </div>
      <div class="modal-body">
        <table id="table-ors" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th class="text-center">CODE</th>
              <th class="text-center">SUPPLIER</th>
              <th class="text-center">AMOUNT</th>
              <th class="text-center">ACTION</th>
            </tr>
          </thead>
          <tbody id="tbody-ors">
            <?php foreach ($pos as $key => $po): ?>
              <tr>
                <td class="text-center">
                  <span class="badge bg-orange"><a href="procurement_purchase_request_view.php?division=<?= $_SESSION['division']; ?>&id=<?= $pr['pr_no']; ?>" style="color: inherit;">PO-<?= $po['ponum']; ?></a></span>      
                </td>
                <td><?= $po['payee']; ?></td>
                <td class="text-center"><?= $po['amount']; ?></td>
                <td class="text-center">
                  <a href="budget_create_po_obligation.php?poid=<?= $po['id']; ?>&new" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-rocket"></i></a> 
                </td>
              </tr>   
            <?php endforeach ?>  
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#table-ors").DataTable({
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
</script>