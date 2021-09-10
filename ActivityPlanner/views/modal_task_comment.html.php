<div class="modal fade" id="modal-comment">
  <div class="modal-dialog" style="width:50%">
    <div class="modal-content modal-dialog-centered" style="border-radius: 5px;">
      <div class="row">  
          <div class="col-md-12">
            <br>
            <!-- CUSTOM BLOCKQUOTE -->
            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                <div class="blockquote-custom-icon-notes bg-info shadow-sm">
                  <i class="fa fa-file-text text-white" style="font-size: 38pt;"></i>
                </div>

                <div class="col-md-12 pull-right" style="position: absolute; top: 7px; left: -4%;">
                  <div class="row">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row" style="margin-bottom: 3%; border-bottom: 1px solid lightgray;">
                    <h2 class="text-center" style="color:#ffd700; margin-left: -5%;"><b>ADD NOTES</b></h2>
                  </div>
                </div>

                <div class="col-md-12" style="padding-bottom: 3%;">
                  
                    <div class="row">
                      <?php echo input_hidden('comment_taskid','comment_taskid','comment_taskid','') ?>
                      <?php echo input_hidden('code','code','code','') ?>
                      
                      <div id="note_box" class="bg-white ">
                        <div class="form-group note_box chat-message" style="overflow-y: scroll; max-height: 450px!important; min-height: 450px!important;">
                            
                        </div>
                        <div class="chat-box bg-white">
                          <div class="input-group">
                            <input type="text" name="message" placeholder="Type your notes here" class="form-control border no-shadow no-rounded post_message" required>
                            <span class="input-group-btn">
                              <button class="btn btn-success no-rounded btn-primary_post" type="button">Post</button>
                            </span>
                          </div>
                        </div>            
                      </div>   
                    </div>
                  
                </div>
                
                <br>
                
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
  

.bg-white {
  background-color: #fff;
}

.friend-list {
  list-style: none;
margin-left: -40px;
}

.friend-list li {
  border-bottom: 1px solid #eee;
}

.friend-list li a img {
  float: left;
  width: 45px;
  height: 45px;
  margin-right: 10px;
}

 .friend-list li a {
  position: relative;
  display: block;
  padding: 10px;
  transition: all .2s ease;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
}

.friend-list li.active a {
  background-color: #f1f5fc;
}

.friend-list li a .friend-name, 
.friend-list li a .friend-name:hover {
  color: #777;
}

.friend-list li a .last-message {
  width: 65%;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

.friend-list li a .time {
  position: absolute;
  top: 10px;
  right: 8px;
}

small, .small {
  font-size: 85%;
}

.friend-list li a .chat-alert {
  position: absolute;
  right: 8px;
  top: 27px;
  font-size: 10px;
  padding: 3px 5px;
}

/*.chat-message {
  padding: 60px 20px 115px;
}*/

.chat {
    list-style: none;
    margin: 0;
}

.chat-message{
    background: #d8d8d8;;  
}

.chat li img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50em;
  -moz-border-radius: 50em;
  -webkit-border-radius: 50em;
}

/*img {*/
  /*max-width: 100%;*/
/*}*/

.chat-body {
  padding-bottom: 20px;
}

.chat li.left .chat-body {
  margin-left: 70px;
  /*margin-right: 70px;*/
  background-color: #fff;
}

.chat li .chat-body {
  border-radius: 3px;
  position: relative;
  font-size: 11px;
  padding: 10px;
  border: 1px solid #f1f5fc;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

.chat li .chat-body .header {
  padding-bottom: 5px;
  border-bottom: 1px solid #f1f5fc;
}

.chat li .chat-body p {
  margin: 0;
}

.chat li.left .chat-body:before {
  position: absolute;
  top: 10px;
  left: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-left: 1px solid #f1f5fc;
  /*content: '';*/
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
}

.chat li.right .chat-body:before {
  position: absolute;
  top: 10px;
  right: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-right: 1px solid #f1f5fc;
  /*content: '';*/
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
}

.chat li {
  margin: 15px 0;
}

.chat li.right .chat-body {
  margin-right: 70px;
  /*margin-left: 70px;*/
  background-color: #fff;
}

.chat-box {
/*
  position: fixed;
  bottom: 0;
  left: 444px;
  right: 0;
*/
  /*padding: 15px;*/
  border-top: 1px solid #eee;
  transition: all .5s ease;
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -o-transition: all .5s ease;
}

.primary-font {
  color: #3c8dbc;
}

a:hover, a:active, a:focus {
  text-decoration: none;
  outline: 0;
}

</style>