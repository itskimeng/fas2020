<div class="modal fade" id="modal-comment">
  <div class="modal-dialog" style="width:35%">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-notes bg-info shadow-sm">
                  <i class="fa fa-file-text text-white" style="font-size: 38pt;"></i>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin-bottom: 3%; border-bottom: 1px solid lightgray;">
                    <h2 class="text-center" style="color:#ffd700;"><b>ADD NOTES</b></h2>
                  </div>
                </div>

                <div class="col-md-12">
                  
                  <div class="row">
                    <div class="box-footer box-comments">
                     
                    </div>
                  </div>
                  
                </div>

                <div class="col-md-12">
                  <div class="row">

                    <div class="box-footer footer-buttons">
                      <div class="row">
                        <?php echo input_hidden('comment_taskid','comment_taskid','comment_taskid','') ?>

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
                
            </blockquote>
            
          </div>
        </div>
    </div>
  </div>
</div>


<style type="text/css">
  .modal-dialog {
  vertical-align: middle;
}
  /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.blockquote {
    padding: 10px 20px;
    margin: 0 0 20px;
    font-size: 17.5px;
     border-left: 0px; 
}

.blockquote-custom-icon-notes {
    width: 75px;
    height: 75px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -18px;
    background-color: white;
    color: #ffd700;
     left: 43%; 
}



/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
  background: #eff0eb;
  /*background-image: url('https://i.postimg.cc/MTbfnkj6/bg.png');*/
  background-size: cover;
  background-repeat: no-repeat;
}
  
</style>