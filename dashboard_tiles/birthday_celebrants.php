<div class="col-md-3 col-sm-6 col-xs-12" style="color:white;">
  <div class="info-box bg-purple color-palette" style="border-radius: 3px; ">
    <div class="panel-heading">
      <i class="fa fa-birthday-cake"></i> <strong>BIRTHDAY CELEBRANTS</strong>
      <a data-toggle="modal" data-target="#modal-default1" class="btn btn-primary btn-xs pull-right"><i class="fa fa-folder-open"></i> VIEW ALL</a>
        <div class="box-header with-border">
        </div>
      <div class="clearfix"></div>
    </div>

    <div class="panel-body birthday_panel">
      <div class="box-header" style="color:white;">

        <?php foreach ($birthdays as $key => $birthday): ?>
          

        <div class="row" style="margin-bottom: 1.2%;">
          <div class="col-md-2">
            <div style="width:40px; height:40px;">
              <?php if (file_exists($birthday["PROFILE"]) == false || $birthday["PROFILE"] == 'images/profile/'): ?>
                <img class="" src="images/LOGO.png" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
              <?php else: ?>
                <img class="" src="<?php echo $birthday["PROFILE"]; ?>" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
              <?php endif ?>
            </div>  
          </div>
          <div class="col-md-6">
            <b style="font-size: 13px;"><?php echo ucwords($birthday['FIRST_M']); ?> <?php echo $birthday['MIDDLE_M'][0]; ?>. <?php echo ucwords($birthday['LAST_M']); ?></b>
          </div>
          <div class="col-md-4" style="text-align: right;">
            <font style="font-size: 10px;"><?php echo $birthday['BIRTH_D']; ?></font>
          </div>
        </div>

        <?php endforeach ?>
      </div>
    </div>
  </div>


  <form method="POST">
    <div class="modal fade" id="modal-default1">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: #605ca8; color: white;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-birthday-cake"></i>&nbsp&nbsp&nbsp<strong>Birthday Celebrants</strong></h4>

            </div>
            <div class="modal-body">
              <?php foreach ($birthdays as $key => $birthday): ?>
            

                <div class="row" style="margin-bottom: 2.2%;">
                  <div class="col-md-2">
                    <div style="width:40px; height:40px;">
                      <?php if (file_exists($birthday["PROFILE"]) == false || $birthday["PROFILE"] == 'images/profile/'): ?>
                        <img class="" src="images/LOGO.png" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
                      <?php else: ?>
                        <img class="" src="<?php echo $birthday["PROFILE"]; ?>" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
                      <?php endif ?>
                    </div>  
                  </div>
                  <div class="col-md-6">
                    <b style="font-size: 13px;"><?php echo ucwords($birthday['FIRST_M']); ?> <?php echo $birthday['MIDDLE_M'][0]; ?>. <?php echo ucwords($birthday['LAST_M']); ?></b>
                  </div>
                  <div class="col-md-4" style="text-align: right;">
                    <font style="font-size: 10px;"><?php echo $birthday['BIRTH_D']; ?></font>
                  </div>
                </div>

                <?php endforeach ?>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>