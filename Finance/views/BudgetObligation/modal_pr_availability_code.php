<div class="modal fade-scale" id="modal_pr_availability_code" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <form method="POST" action="Finance/route/insert_pr_code.php" >
      <div class="modal-content delete_modal" style="border-radius:5px;">
        <div class="modal-header pr_modal_header text-center">
          <i class="fa fa-edit fa-3x"></i> 

          <h3 class="modal-title">Insert Code</h3>
          <p>To verify availability of funds for <br><u><strong id="source_code" style="font-size:17px;"></strong></u></p>
        </div>
        
        <div class="modal-body text-center">
          <?php echo group_input_hidden('id', ''); ?>

          <?= group_textnew('Code', 'code', '', 'code', false, 0, '', 'text', true); ?>

          <button type="button" class="btn btn-warning btn-md" data-dismiss="modal" style="width:25%"><i class="fa fa-close"></i> No</button>
          <button type="submit" name="save_changes" class="btn btn-md btn-outline-danger" onClick="closeDeleteModal()" style="border-color:#f39c12; width:25%"><i class="fa fa-check"></i> Yes</button>
        </div>
      </div>
    </form>
  </div>
</div>

