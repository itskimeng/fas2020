<div class="modal fade-scale" id="modal_conflict" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <div class="modal-content delete_modal">
      <div class="modal-header delete_modal_header text-center">
        <i class="fa fa-exclamation-triangle fa-3x"></i> 

        <h3 class="modal-title">Invalid Request!</h3>
        <p>This action cannot be done. Fund Source<br><u><strong id="source_code" style="font-size:17px;"></strong></u> is being used.</p>
      </div>
      
      <div class="modal-body text-center">
        <?php echo group_input_hidden('source_id', ''); ?>
        <?php echo group_input_hidden('source_code', ''); ?>

        <button type="button" class="btn btn-danger btn-md" data-dismiss="modal" style="width:25%"><i class="fa fa-close"></i> Ok</button>
      </div>
    </div>
  </div>
</div>

