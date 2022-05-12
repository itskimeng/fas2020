<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="info-box" >
    <div class="panel-heading" style="background-color: #286951;">
      <font style="color:white;"><i class="fa fa-external-link"></i> <b>ISSUANCES</b></font><!-- Item(s) -->
      <div class="clearfix"></div>
    </div>
   
    <div class="issuances" id="row3" style="padding-left: 10px;padding-right: 10px; height: 308px; overflow-y: hidden;">
      <?php foreach ($issuances as $key => $issuance): ?>
        <b><a href="ViewIssuances.php?id=<?php echo $idI;?>"><?php echo $issuance['issuance_no']; ?></a></b>
        <p><?php echo $issuance['subject']; ?></p>
        <hr>
      <?php endforeach ?>
    </div>
  </div>  
</div>

<style type="text/css">
  
div.issuances::-webkit-scrollbar {
    width: 12px;
}
 
div.issuances::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.issuances::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.issuances:hover {
  overflow-y: auto!important;
}
</style>