<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document" style="width:25%; position: absolute; left: 50%; top: 30%; transform: translate(-50%, -50%);">
    <form method="POST" action="ActivityPlanner/entity/delete_event.php" >
      <div class="modal-content delete_modal">
        <div class="modal-header delete_modal_header text-center">
          <i class="fa fa-trash-o fa-3x"></i> 

          <h3 class="modal-title">Are you sure?</h3>
          <small>This action will remove the selected activity completely.</small>
        </div>
        
        <div class="modal-body text-center">
          <?php echo group_input_hidden('delete_event_id', ''); ?>
          <!-- <i class="fa fa-times fa-3x"></i>  -->

          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:25%">No</button>
          <button type="submit" name="save_changes" class="btn btn-outline-danger" onClick="closeDeleteModal()" style="border-color:red; width:25%">Yes</button>
        </div>
        <!-- <div class="modal-footer text-center" style="text-align: center">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:25%">No</button>
          <button type="submit" name="save_changes" class="btn btn-outline-danger" onClick="closeDeleteModal()" style="border-color:red; width:25%">Yes</button>
        </div> -->
      </div>
    </form>
  </div>
</div>

