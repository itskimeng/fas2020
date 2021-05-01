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
      $BDAY = mysqli_query($conn,"SELECT FIRST_M,MIDDLE_M,LAST_M,BIRTH_D,PROFILE FROM tblemployeeinfo WHERE MONTH(BIRTH_D) = MONTH(NOW()) ORDER BY day(BIRTH_D) LIMIT 5");
      
      while ($row = mysqli_fetch_assoc($BDAY)) {
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
    <div class="col-md-12">
      <div class="row" style="padding-bottom: 5.5px;">
        <img class="direct-chat-img" src="<?php echo $PROFILE; ?>" alt="message user image">
        <b style="font-size: 13px;"><?php echo $name;?></b>
        <font style="font-size: 10px;" class="pull-right"><?php echo $b_day?></font>
      </div>
    </div>

    <?php } ?>
  
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
          <table>
            <tbody>
              <?php 
         $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
         $BDAY = mysqli_query($conn,"SELECT FIRST_M,MIDDLE_M,LAST_M,BIRTH_D,PROFILE FROM tblemployeeinfo WHERE MONTH(BIRTH_D) = MONTH(NOW()) ORDER BY day(BIRTH_D)");
         while ($row = mysqli_fetch_assoc($BDAY)) {
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
              <tr style="height: 75px;">
                <td style="width: 80px;">
                  <img class="direct-chat-img" src="<?php echo $PROFILE; ?>" alt="message user image" style="height: 65px; width: 65px;">
                </td>
                <td style="width: 378px;">
                  <b> <?php echo $name;?></b>
                </td>
                <td style="width: 110px;">
                  <font><?php echo $b_day?></font>
                </td>
              </tr>
        <?php } ?>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</form>