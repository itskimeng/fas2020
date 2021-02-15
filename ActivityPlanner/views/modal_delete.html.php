
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <form method="POST" action="../../fas/ActivityPlanner/entity/delete_event.php" >
      <div class="modal-content delete_modal">
        <div class="modal-header delete_modal_header text-center">
          <h3 class="modal-title">Are you sure?</h3>
        </div>
        
        <div class="modal-body text-center" style="color:#f15e5e">
          <?php echo group_input_hidden('delete_event_id', ''); ?>
          <i class="fa fa-times fa-3x"></i> 
        </div>
        <div class="modal-footer text-center" style="text-align: center">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="width:25%">No</button>
          <button type="submit" name="save_changes" class="btn btn-outline-danger" onClick="closeDeleteModal()" style="border-color:red; width:25%">Yes</button>
        </div>
      </div>
    </form>
  </div>
</div>

