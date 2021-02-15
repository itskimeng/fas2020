<div class="modal fade" id="modal-comment">
  <div class="modal-dialog" style="width:40%">
    <div class="modal-content">
      <div class="box direct-chat direct-chat-primary box-chatchat">
        <div class="box-header with-border">
          
          <h3 class="box-title">Notes</h3>
          <div class="box-tools pull-right">
            <h5 class="note_box_title"></h5>
            <?php echo input_hidden('comment_taskid','comment_taskid','comment_taskid','') ?>
          </div>

        </div>

        <!-- <div class="box-body box-body_comment" id="box-body_comment">
            
        </div> -->
        <div class="box-footer box-comments">
                 
        </div>
        <div class="box-footer">
            <div class="input-group">
              <input type="text" name="message" placeholder="Type Comment ..." class="form-control post_message" required>
                <span class="input-group-btn">
                  <button class="btn btn-primary btn-primary_post btn-flat">Post</button>
                </span>
            </div>
        </div>
      </div>
  </div>
  </div>
</div>
