<div class="box box-primary">
    <div class="box-header">
        <h5>Attach Attendance List</h5>
        <form method="POST" enctype="multipart/form-data" action="GSS/route/upload.php">
            <input type="hidden" id="cform-checklist_order" name="checklist_order" value="personal files" />
            <input type="hidden" id="cform-entry_id" name="entry_id" value />
            <input type="hidden" id="division" name="division" value="<?= $_GET['division']; ?>" />
            <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
            <input type="hidden" id="pr_no" name="pr_no" value="<?= $_GET['pr_no']; ?>" />

            <div class="modal-body">
                <div class="mb-3">
                    <div class="row mb-1">
                        <div class="col-md-12" style="font-size:14px;">

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
              
                <button type="submit" class="btn btn-primary btn-add_attachments"><i class="fa fa-save"></i> Save</button>
            </div>
        </form>
    </div>
</div>