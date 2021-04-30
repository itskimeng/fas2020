<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="info-box" >
    <div class="panel-heading" style="background-color:#964B00;">
      <font style="color:white;"><i class="fa fa-bullhorn"></i> <b>ANNOUNCEMENTS</b></font> <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-warning btn-xs pull-right"><i class="fa  fa-plus-square"></i> ADD</button>
    </div>
    <div style="background:#ee5; height: 265px; overflow-y: scroll; overflow-x: hidden;" class="table-responsive" id="row2">
      <table id="example15" class="table table-bordered " style="background-color:#ee5;border:#ee5;" >
        <thead >
          <tr style="background-color:#ee5;" >
            <th style="background-color:#ee5;"hidden></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $view_query = mysqli_query($conn,"SELECT tp.DIVISION_M,te.PROFILE,a.date,a.id,a.posted_by,a.content,a.title,concat(te.FIRST_M,' ',te.MIDDLE_M,' ',te.LAST_M) as fname  FROM announcementt a LEFT JOIN tblemployeeinfo te on te.UNAME = a.posted_by  LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = te.DIVISION_C ORDER BY id DESC");
                          
            while ($row = mysqli_fetch_assoc($view_query)) {
              $id = $row["id"];  
              $DIVISION_M = $row["DIVISION_M"];  
              $fname = $row["fname"];  
              $posted_by = $row["posted_by"];  
              $intent = $row["content"];  
              $title = $row["title"];  
              $profile = $row["PROFILE"];  
              $date1 = $row["date"];  
              $date = date('Y-m-d',strtotime($date1));  
              $extension = pathinfo($profile, PATHINFO_EXTENSION);
            ?>
          
          <tr width="200">
            <td><img class="direct-chat-img" src="
              <?php 
                if (file_exists($profile)) {
                  switch ($extension) {
                    case 'jpg':
                      if ($profile == '') {
                        echo 'images/male-user.png';
                      } else if ($profile == $profile) {
                        echo $profile;   
                      } else {
                        echo'images/male-user.png';
                      }
                      break;

                    case 'JPG':
                      if ($profile == '') {
                        echo 'images/male-user.png';
                      } else if ($profile == $profile) {
                        echo $profile;   
                      } else {
                        echo'images/male-user.png';
                      }
                      break;

                    case 'jpeg':
                      if ($profile == '') {
                        echo 'images/male-user.png';
                      } else if ($profile == $profile) {
                        echo $profile;   
                      } else {
                        echo'images/male-user.png';
                      }
                      break;
                    case 'png':
                      if ($profile == '') {
                        echo'images/male-user.png';
                      } else if ($profile == $profile) {
                        echo $profile;   
                      } else {
                        echo'images/male-user.png';
                      }
                      break;
                    default:
                      echo'images/male-user.png';
                      break;
                  }
                } else {
                 echo'images/male-user.png';
                }
              ?>" alt="message user image">
              <b style="font-size: 10px;"><?php echo $fname;?></b>
              <br>
              <font style="font-size: 10px;"><?php echo $DIVISION_M;?></font><br><br>
              <b><?php echo $title;?>
              <br>
              <?php if ($username == $posted_by): ?>
                <a data-toggle="modal" data-target="#modal-info_<?php echo $row['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a> | <a href="delete_announcement.php?id=<?php echo $id?>&username=<?php echo $username?>" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> Delete</a>
              <?php endif ?>
              </b>
              <br>
              <p style="text-align: justify;"><?php echo $intent;?></p>
            </td>
          </tr> 
      <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>  

<div class="modal modal-default fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Announcement</h4>
        </div>
        <div class="modal-body">
          <form method="POST" >
           <label style="padding-right: 20px;">Title <font style="color:red;">*</font></font>&nbsp&nbsp<i><font style="color:red;">should not exceed 50 characters</i></font></label><input value="<?php echo $title?>" class="form-control" type="text" name="title"><br>
           <input type="text" name="idC" hidden  value="<?php echo $id?>">
           <label style="padding-right: 20px;">Content <font style="color:red;">*</font>&nbsp&nbsp<i><font style="color:red;">should not exceed 500 characters</font></i></label><textarea  class="form-control" type="text" name="content"><?php echo $intent?></textarea><br>
           <label style="padding-right: 20px;">Posted By</label><input readonly class="form-control" type="text" name="posted_by" value="<?php echo $posted_by?>"><br>
           <label style="padding-right: 20px;">Posted Date</label><input readonly class="form-control" type="text" name="date" value="<?php echo $date?>"><br>
         </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="update">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Announcement</h4>
        </div>
        
        <div class="modal-body">
          <label style="padding-right: 20px;">Title <font style="color:red;">*</font>&nbsp&nbsp<i><font style="color:red;">should not exceed 50 characters</i></font></label><input maxlength="50"  required class="form-control" type="text" name="title"><br>
          <label style="padding-right: 20px;">Content <font style="color:red;">*</font>&nbsp&nbsp<i><font style="color:red;">should not exceed 500 characters</font></i></label><textarea maxlength="500" required class="form-control" type="text" name="content"></textarea><br>
          <label style="padding-right: 20px;">Posted By</label><input readonly class="form-control" type="text" name="posted_by" value="<?php echo $_SESSION['username']?>"><br>
          <label style="padding-right: 20px;">Posted Date</label><input readonly class="form-control" type="text" name="date" value="<?php echo date('Y-m-d')?>"><br>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style type="text/css">
  
#row2::-webkit-scrollbar {
    width: 12px;
}
 
#row2::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
#row2::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}
</style>

