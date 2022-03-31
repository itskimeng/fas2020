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
              <th class="text-center" width="15%">CODE</th>
              <th class="text-center" width="20%">OFFICE</th>
              <th class="text-center" width="30%">PURPOSE</th>
              <th class="text-center" width="16%">DATE SUBMITTED</th>
              <th class="text-center" width="15%">ACTION</th>
            </tr>
          </thead>
          <tbody id="tbody-purchase-request">
            <?php foreach ($prs as $key => $pr): ?>
              <tr>
                <td class="text-center">
                  <span class="badge bg-purple"><a href="procurement_purchase_request_view.php?division=<?= $_SESSION['division']; ?>&id=<?= $pr['pr_no']; ?>" style="color: inherit;">PR-<?= $pr['pr_no']; ?></a></span>  
                </td>
                <td class="text-center"><?= $pr['office']; ?></td>
                <td><?= $pr['purpose']; ?></td>
                <td class="text-center"><?= $pr['submitted_date']; ?><br><i><b>~<?= $pr['submitted_by']; ?>~</b></i></td>
                <td class="text-center">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm btn-availability_code2" data-dismiss="modal" data-toggle="modal" data-target="#modal_pr_availability_code2" data-id="<?= $pr['id']; ?>" title="Check Availability Funds"><i class="fa fa-search"></i></button>

                    <button type="button" class="btn btn-danger btn-sm btn-return_pr2" data-dismiss="modal" data-toggle="modal" data-target="#modal_pr_return2" data-id="<?= $pr['id']; ?>" title="return"><i class="fa fa-reply"></i></button>
                  </div>
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