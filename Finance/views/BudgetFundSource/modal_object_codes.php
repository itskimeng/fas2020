<form action="<?= $route_add; ?>" method="POST">
  <div class="modal fade-scale" id="modal_object_code" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Add New Object Code</h4>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <?= group_textnew('Object Code', 'obc', '', 'obc'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <?= group_textnew('UACS', 'uacs', '', 'uacs'); ?>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> Close</button>
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-primary btn-md"> Submit</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</form>

