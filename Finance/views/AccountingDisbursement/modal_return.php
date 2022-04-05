<div class="modal fade-scale" id="modal_return" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <form method="GET" action="Finance/route/update_obligation_status.php?" >
      <div class="modal-content delete_modal" style="border-radius:5px;">
        <div class="modal-header delete_modal_header text-center">
          <i class="fa fa-reply fa-3x"></i> 

          <h3 class="modal-title">Are you sure?</h3>
          <p>This action will return the selected Disbursement <br><u><strong id="source_code" style="font-size:17px;"></strong></u>.</p>
        </div>
        
        <div class="modal-body text-center">
          <?php echo group_input_hidden('id', $data['obligation_id']); ?>
          <?php echo group_input_hidden('status', 'Returned'); ?>
          <?php echo group_input_hidden('edit', ''); ?>

          <div class="form-group text-left">
            <textarea id="cform-remarks" name="remarks" class="form-control remarks" rows="3" placeholder="Enter Remarks" required></textarea>
          </div>

          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal" style="width:25%"><i class="fa fa-close"></i> No</button>
          <button type="submit" name="save_changes" class="btn btn-md btn-outline-danger" onClick="closeDeleteModal()" style="border-color:red; width:25%"><i class="fa fa-check"></i> Yes</button>
        </div>
      </div>
    </form>
  </div>
</div>


