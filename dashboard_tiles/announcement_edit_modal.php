<?php foreach ($announcements as $key => $announcement): ?>
  <div class="modal fade" id="modal-info_<?php echo $announcement['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content activity_content" style="border-radius:5px;">
        <div class="modal-header" style="background-color: #964b00; color:white!important; border-top-left-radius: 5px; border-top-right-radius: 5px;">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white!important;">
            <span aria-hidden="true">&times;</span>
          </button>

          <h4 class="modal-title"><i class="fa fa-edit"></i> EDIT ANNOUNCEMENT</h4>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div id="cgroup-title" class="form-group">
              <label>Title: <font style="color:red;">*</font></font>&nbsp&nbsp<i><font style="color:red;">(Should not exceed 50 characters)</i></font></label><br>
              <input id="cform-title" placeholder="Title" type="text" name="title" class="form-control title" value="<?php echo $announcement['title']; ?>" novalidate style="border-radius:5px;" required/>
              <input type="text" name="idC" hidden value="<?php echo $announcement['id']; ?>">
            </div>   

            <div id="cgroup-content" class="form-group">
              <label>Content: <font style="color:red;">*</font></font>&nbsp&nbsp<i><font style="color:red;">(Should not exceed 500 characters)</i></font></label><br>
              <textarea id="cform-content" name="content" class="form-control content" rows="2" placeholder="Content" style="border-radius:5px;" required><?php echo $announcement['content']; ?>
              </textarea>
            </div> 

            <div id="cgroup-posted_by" class="form-group">
              <label>Posted By: </label><br>
              <input id="cform-posted_by" placeholder="Posted By" type="text" name="posted_by" class="form-control posted_by" value="<?php echo $announcement['posted_by']; ?>" readonly style="border-radius:5px;"/>
            </div> 

            <div id="cgroup-posted_date" class="form-group">
              <label>Posted Date: </label><br>
              <input id="cform-posted_date" placeholder="Posted Date" type="text" name="posted_date" class="form-control posted_date" value="<?php echo $announcement['posted_date']; ?>" readonly style="border-radius:5px;"/>
            </div>  
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="width:19%;"><i class="fa fa-close"></i> Close</button>
            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>