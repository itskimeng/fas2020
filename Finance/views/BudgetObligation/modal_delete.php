<div class="modal fade-scale" id="modal_delete_obligation" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <form method="POST" action="Finance/route/delete_obligation.php" >
      <div class="modal-content delete_modal" style="border-radius:5px;">
        <div class="modal-header delete_modal_header text-center">
          <i class="fa fa-trash-o fa-3x"></i> 

          <h3 class="modal-title">Are you sure?</h3>
          <p>This action will remove the selected Fund Source<br><u><strong id="source_code" style="font-size:17px;"></strong></u> completely.</p>
        </div>
        
        <div class="modal-body text-center">
          <?php echo group_input_hidden('source_id', ''); ?>
          <?php echo group_input_hidden('source_code', ''); ?>

          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal" style="width:25%"><i class="fa fa-close"></i> No</button>
          <button type="submit" name="save_changes" class="btn btn-md btn-outline-danger" onClick="closeDeleteModal()" style="border-color:red; width:25%"><i class="fa fa-check"></i> Yes</button>
        </div>
      </div>
    </form>
  </div>
</div>

