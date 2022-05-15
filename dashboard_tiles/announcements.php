
<div class="col-md-5 col-sm-5 col-xs-12">
  <div class="info-box" >
    <div class="panel-heading" style="background-color:#964B00;">
      <font style="color:white;"><i class="fa fa-bullhorn"></i> <b>ANNOUNCEMENTS</b></font> <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-warning btn-xs pull-right" style="margin-right: -8px;"><i class="fa  fa-plus-square"></i> ADD ANNOUNCEMENT</button>
    </div>
    <div class="announcements" style="background:#ee5; height: 317.5px; overflow-y: hidden; overflow-x: hidden;" class="table-responsive" id="row2">
      <div class="col-xs-12">
        <div class="row">
          <table id="example15" class="table table-bordered " style="background-color:#ee5;border:#ee5;padding-top: 3%;" >
            <thead >
              <tr style="background-color:#ee5;" >
                <th style="background-color:#ee5;"hidden></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($announcements as $key => $announcement): ?>
                <tr>
                  <td>
                    <div class="col-xs-12">
                      <div class="row">
                        <?php if ($_SESSION['username'] == $announcement['posted_by']): ?>
                          <span class="pull-right" style="margin-right: -8px;">
                            <a class="btn btn-success btn-xs"><?= 'Posted Date:'.date('F d, Y',strtotime($announcement['posted_date']));?></a> 
                          </span>
                        <?php endif ?>

                        <img class="direct-chat-img" src="<?php echo $announcement['profile']; ?>" alt="message user image" style="width: 65px; height: 65px; margin-right: 5px;">
                        <b style="font-size: 15px;">
                          <?php echo $announcement['fname']; ?>    
                        </b>

                        <br>
                        <font style="font-size: 14px;">
                          <?php echo $announcement['division']; ?>    
                        </font>
                      </div>
                    </div>

                    <div class="col-xs-12" style="padding-top: 2%;">
                      <div class="row">
                        <b><?php echo $announcement['title']; ?></b>
                      </div>
                    </div>

                    <div class="col-xs-12" style="padding-top: 1%;">
                      <div class="row">
                        <?php echo $announcement['content']; ?><br>
                        <a data-toggle="modal" data-target="#modal-info_<?php echo $announcement['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a> | 

                        <a href="delete_announcement.php?id=<?php echo $announcement['id']?>&username=<?php echo $username?>" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i> Delete</a> 

                      </div>
                    </div>
                          
                  </td>
                </tr>

              <?php endforeach ?>
            </tbody>
          </table>  
        </div>
        
      </div>
      
    </div>
  </div>
</div>  

<?php include 'announcement_add_modal.php'; ?>
<?php include 'announcement_edit_modal.php'; ?>

<style type="text/css">
  
div.announcements::-webkit-scrollbar {
    width: 12px;
}
 
div.announcements::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.announcements::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.announcements:hover {
    overflow-y: auto!important; 
}

div#example15_wrapper {
    padding: 1%; 
}

</style>

