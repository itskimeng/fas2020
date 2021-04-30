<?php 
  $dashboard = new Dashboard();
  $issuances = $dashboard->getIssuances();
?>

<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="info-box" >
    <div class="panel-heading" style="background-color: #013220;">
      <font style="color:white;"><i class="fa fa-external-link"></i> <b>ISSUANCES</b></font><!-- Item(s) -->
      <div class="clearfix"></div>
    </div>
   
    <div id="row3" style="padding-left: 10px;padding-right: 10px; height: 308px; overflow-y: scroll;">
      <?php foreach ($issuances as $key => $issuance): ?>
        <b><a href="ViewIssuances.php?id=<?php echo $idI;?>"><?php echo $issuance['issuance_no']; ?></a></b>
        <p><?php echo $issuance['subject']; ?></p>
        <hr>
      <?php endforeach ?>
    </div>
  </div>  
</div>

<style type="text/css">
  
#row3::-webkit-scrollbar {
    width: 12px;
}
 
#row3::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
#row3::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}
</style>