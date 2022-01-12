<div class="modal fade" id="modal-purchase_request" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-book"></i> Purchase Request</h4>
      </div>
      <div class="modal-body">
        <table id="table-purchase-request" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th width="120">Code</th>
              <th width="80">Office</th>
              <th width="200">Purpose</th>
              <th width="120">Date Submitted</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody-purchase-request">
            <?php foreach ($prs as $key => $pr): ?>
              <tr>
                <td><?= $pr['pr_no']; ?></td>
                <td><?= $pr['office']; ?></td>
                <td><?= $pr['purpose']; ?></td>
                <td><?= $pr['submitted_date']; ?></td>
                <td><?= $pr['status']; ?></td>
                <td>
                  <a href="CreateObligation.php?id=<?= $pr['id']; ?>&stat=1" class="btn btn-success btn-sm btn-view" title="Process"> <i class="fa fa-check-square"></i> Check Availability</a> 
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
  $("#table-purchase-request").DataTable({
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
</script>