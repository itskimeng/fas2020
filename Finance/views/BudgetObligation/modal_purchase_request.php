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
              <th width="15%">Code</th>
              <th width="20%">Office</th>
              <th width="40%">Purpose</th>
              <th width="30%">Date Submitted</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody-purchase-request">
            <?php foreach ($prs as $key => $pr): ?>
              <tr>
                <td>
                  <span class="badge bg-info"><a href="procurement_purchase_request_view.php?division=<?= $_SESSION['division']; ?>&id=<?= $pr['pr_no']; ?>" style="color: inherit;">PR-<?= $pr['pr_no']; ?></a></span>  
                </td>
                <td><?= $pr['office']; ?></td>
                <td><?= $pr['purpose']; ?></td>
                <td><?= $pr['submitted_date']; ?></td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm btn-availability_code2" data-dismiss="modal" data-toggle="modal" data-target="#modal_pr_availability_code2" data-id="<?= $pr['id']; ?>" title="Check Availability Funds"><i class="fa fa-search"></i></button>
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