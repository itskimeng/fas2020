<div class="modal fade" id="modal-purchase_request" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="fa fa-book"></i> Employee List</h4>
      </div>
      <div class="modal-body">
        <table id="table-purchase-request" class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th class="text-center" width="20%">OFFICE</th>
              <th class="text-center" width="30%">NAME</th>
              <th class="text-center" width="30%">POSITION</th>
              <th class="text-center" width="15%">ACTION</th>
            </tr>
          </thead>
          <tbody id="tbody-purchase-request">
            <?php foreach ($employee_lists as $key => $employee): ?>
              <tr>
                </td>
                <td>
                  <?= $employee['office']; ?>
                  <?= group_input_hidden('emp_id[]', $key); ?>    
                </td>
                <td><?= $employee['fullname']; ?></td>
                <td><?= $employee['fullname']; ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="QMS/route/post_qms_process_owner.php?emp_id=<?= $key; ?>" class="btn btn-success btn-sm" ><i class="fa fa-check-square-o"></i> Select</a>
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