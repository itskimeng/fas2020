<div class="col-md-3 col-sm-6 col-xs-12" style="color:white;">
  <div class="info-box bg-purple color-palette" style="border-radius: 3px;">
    <div class="panel-heading">
      <i class="fa fa-birthday-cake"></i> <strong>BIRTHDAY CELEBRANTS</strong>
      <a data-toggle="modal" data-target="#modal-default1" class="btn btn-primary btn-xs pull-right"><i class="fa fa-folder-open"></i> VIEW ALL</a>
        <div class="box-header with-border">
        </div>
      <div class="clearfix"></div>
    </div>
    <div class="box-header" style="color:white;">
      <?php 
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $sql = "SELECT 
                  FIRST_M, 
                  MIDDLE_M, 
                  LAST_M, 
                  BIRTH_D, 
                  PROFILE, 
                  STATUS,
                  IF(DAY(BIRTH_D) = DAY(NOW()), TRUE, FALSE) AS is_bday 
                FROM tblemployeeinfo 
                WHERE STATUS = 0 AND MONTH(BIRTH_D) = MONTH(NOW()) AND DAY(BIRTH_D) >= DAY(NOW()) ORDER BY day(BIRTH_D) LIMIT 6";

        $BDAY = mysqli_query($conn,$sql);
        
        while ($row = mysqli_fetch_assoc($BDAY)) {
          $is_bday = $row['is_bday'];
          $FIRST_M1 = $row['FIRST_M'];
          $FIRST_M = ucwords(strtolower($FIRST_M1));
          $MIDDLE_M = $row['MIDDLE_M'];
          $LAST_M1 = $row['LAST_M'];
          $LAST_M = ucfirst(strtolower($LAST_M1));
          $words = explode(" ", $MIDDLE_M);
          $acronym = "";

          foreach ($words as $w) {
            $acronym .= $w[0];
          }
        //asd
        $name = $FIRST_M.' '.$acronym.'.'.' '.$LAST_M;
        $BIRTH_D = $row['BIRTH_D'];
        $PROFILE = $row['PROFILE'];
        $b_day = date('F d',strtotime($BIRTH_D));
        
        if ($PROFILE == 'images/profile/') {
          $PROFILE = 'images/LOGO.png';
        }
      ?>  

      <div class="row" style="margin-bottom: 2.2%;">
        <div class="col-md-2">
          <div style="width:40px; height:40px;">
            <img class="<?= $is_bday ? 'glowing-circle' : ''; ?>" src="<?php echo $PROFILE; ?>" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
          </div>  
        </div>
        <div class="col-md-6">
          <b style="font-size: 13px;"><?php echo $name;?></b>
        </div>
        <div class="col-md-4" style="text-align: right;">
          <font style="font-size: 10px;"><?php echo $b_day?></font>
        </div>
      </div>

    <?php } ?>
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
              <?php 
               $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
               $BDAY = mysqli_query($conn,"SELECT FIRST_M,MIDDLE_M,LAST_M,BIRTH_D,PROFILE,STATUS,IF(DAY(BIRTH_D) = DAY(NOW()), TRUE, FALSE) AS is_bday FROM tblemployeeinfo WHERE STATUS = 0 AND MONTH(BIRTH_D) = MONTH(NOW()) ORDER BY day(BIRTH_D)");
               while ($row = mysqli_fetch_assoc($BDAY)) {
                $is_bday = $row['is_bday'];
                $FIRST_M1 = $row['FIRST_M'];
                $FIRST_M = ucwords(strtolower($FIRST_M1));
                $MIDDLE_M = $row['MIDDLE_M'];
                $LAST_M1 = $row['LAST_M'];
                $LAST_M = ucfirst(strtolower($LAST_M1));
                $words = explode(" ", $MIDDLE_M);
                $acronym = "";

                foreach ($words as $w) {
                  $acronym .= $w[0];
                }

                $name = $FIRST_M.' '.$acronym.'.'.' '.$LAST_M;
                $BIRTH_D = $row['BIRTH_D'];
                $PROFILE = $row['PROFILE'];
                $b_day = date('F d',strtotime($BIRTH_D));
                if ($PROFILE == 'images/profile/') {
                  $PROFILE = 'images/LOGO.png';

                }
              ?>  
              <div class="row" style="margin-bottom: 2%;">
                <div class="col-md-2">
                  <div style="width:40px; height:40px;">
                    <img class="<?= $is_bday ? 'glowing-circle' : ''; ?>" src="<?php echo $PROFILE; ?>" alt="message user image" style="height: 100% !important; width: 100% !important; object-fit: cover; border-radius: 50%; border: 2px solid #fff; background-color: white;">
                  </div>  
                </div>
                <div class="col-md-8">
                  <b style="font-size: 13px;"><?php echo $name;?></b>
                </div>
                <div class="col-md-2">
                  <font class="pull-right" style="font-size: 10px;"><?php echo $b_day?></font>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<style type="text/css">    
.glowing-circle {
  /*width: 100px;*/
  /*height: 100px;*/
  border-radius:50%;
  background-color: #fff;
  -webkit-animation: glowing 1.5s ease-in-out infinite alternate;
  -moz-animation: glowing 1.5s ease-in-out infinite alternate;
  animation: glowing 1.5s ease-in-out infinite alternate;
}
@-webkit-keyframes glowing {
  from {
    box-shadow: 0 0 .5px #fff, 0 0 1px #fff, 0 0 1.5px #f0f, 0 0 2px #0ff, 0 0 2.5px #e60073, 0 0 3px #e60073, 0 0 3.5px #e60073;
  }
  to {
    box-shadow: 0 0 5.5px #fff, 0 0 6px #ff4da6, 0 0 6.5px #ff4da6, 0 0 7px #ff4da6, 0 0 7.5px #ff4da6, 0 0 8px #ff4da6, 0 0 8.5px #ff4da6;
  }
}
</style>