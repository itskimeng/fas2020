
<form method="POST"  enctype="multipart/form-data"  action="upload.php">
<input type="hidden" id="cform-checklist_order" name="checklist_order" value="personal files"/>
<input type="hidden" id="cform-entry_id" name="entry_id" value=""/>

<div class="modal-body">
    <div class="mb-3">
      <div class="row mb-1">
        <div class="col-md-12" style="font-size:14px;">
          <div class="" style="background-color: #d0d0d0; border-radius: 3px; color: #625d5d; padding: 5px;">
            Allowed File Size: 10MB<br>
            Allowed File Type: 'pdf', 'png', 'jpeg', 'jpg', 'xls', 'word'
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="custom-file">
          <input type="file" name="files[]" multiple class="custom-file-input form-control" id="customFile" required>
        </div>
      </div>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary btn-close_attachments" data-bs-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
  <button type="submit  " class="btn btn-primary btn-add_attachments"><i class="fa fa-save"></i> Save</button>
</div>
</form>
