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
              <th>Code</th>
              <th>Particular</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody-ors">
            <?php foreach ($pos as $key => $po): ?>
              <tr>
                <td><?= $po['ponum']; ?></td>
                <td><?= $po['payee']; ?></td>
                <td><?= $po['amount']; ?></td>
                <td>
                  <a href="budget_create_po_obligation.php?id=<?= $po['ponum']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-check-square"></i> Process</a> 
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