<div class="modal fade" id="modal-default">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header" style="background-color: #964b00; color:white!important;">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white!important;">
            <span aria-hidden="true">&times;</span>
          </button>

          <h4 class="modal-title"><i class="fa fa-plus-square"></i> ADD ANNOUNCEMENT</h4>
        </div>
        
        <div class="modal-body">
          <div id="cgroup-title" class="form-group">
            <label>Title: <font style="color:red;">*</font></font>&nbsp&nbsp<i><font style="color:red;">(Should not exceed 50 characters)</i></font></label><br>
            <input id="cform-title" placeholder="Title" type="text" name="title" class="form-control title" value="" novalidate />
          </div>   

          <div id="cgroup-content" class="form-group">
            <label>Content: <font style="color:red;">*</font></font>&nbsp&nbsp<i><font style="color:red;">(Should not exceed 500 characters)</i></font></label><br>
            <textarea id="cform-content" name="content" class="form-control content" rows="2" placeholder="Content"></textarea>
          </div> 

          <div id="cgroup-posted_by" class="form-group">
            <label>Posted By: </label><br>
            <input id="cform-posted_by" placeholder="Posted By" type="text" name="posted_by" class="form-control posted_by" value="<?php echo $_SESSION['username']?>" readonly/>
          </div> 

          <div id="cgroup-posted_date" class="form-group">
            <label>Posted Date: </label><br>
            <input id="cform-posted_date" placeholder="Posted Date" type="text" name="posted_date" class="form-control posted_date" value="<?php echo date('Y-m-d')?>" readonly/>
          </div> 

        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" value="" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>