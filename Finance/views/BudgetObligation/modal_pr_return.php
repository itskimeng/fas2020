<div class="modal fade-scale" id="modal_pr_return" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <form method="POST" action="Finance/route/return_pr_code.php" >
      <div class="modal-content delete_modal" style="border-radius:5px;">
        <div class="modal-header pr_modal_header text-center" style="background-color:#fe4b38 !important;">
          <i class="fa fa-reply fa-3x"></i> 

          <h3 class="modal-title">Enter Remarks</h3>
          <p>To return <u><strong id="source_code" style="font-size:17px;"></strong></u></p>
        </div>
        
        <div class="modal-body text-center">
          <?php echo group_input_hidden('id', ''); ?>
          <?= group_textarea('reason', 'reason', '', 0); ?>
          
          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal" style="width:25%"><i class="fa fa-close"></i> No</button>
          <button type="submit" name="save_changes" class="btn btn-md btn-outline-danger" onClick="closeDeleteModal()" style="border-color:#dd4b39; width:25%"><i class="fa fa-check"></i> Yes</button>
        </div>
      </div>
    </form>
  </div>
</div>

