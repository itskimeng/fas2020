<?php 
  $dashboard = new Dashboard();
  $events = $dashboard->getCalendarEvents();
?> 


<?php foreach ($events as $key => $event): ?>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box <?php echo $event['color']; ?>" style="border-radius: 3px; <?php echo $event['color'] == 'bg-yellow' ? 'background-color: #f66f86!important' : ''; ?>">
      <span class="info-box-icon info-box-text" style="min-height: 165px  ; font-size: 35px;">
        <i class="fa fa-calendar"></i><br>
        <p style="margin-top: -41px;"><b><?php echo $event['month'] ?></b></p><br>
        <p style="margin-top: -160px;"><?php echo $event['day'] ?></p>

      </span>
      <div class="info-box-content">
        <!-- <span class="info-box-text" > -->
          <div class="col-md-12">
            <div class="row calendar1" id="calendar<?php echo $key; ?>" style="height: 109px; overflow-y: hidden;">
              <p style="font-size: 19px; font-style: oblique;"><b><?php echo $event['title']; ?></b></p>
            </div>
            
          </div>
        <!-- </span> -->
        <span class="info-box-number"></span>
        <div class="progress">
        </div>

        <span class="progress-description">
          <b>Venue : <?php echo $event['venue']; ?></b><br>
          <b>Office : <?php echo $event['office']; ?></b> 
        </span>
      </div>
    </div>
  </div> 
<?php endforeach ?>  


<style type="text/css">
  
div.calendar1::-webkit-scrollbar {
    width: 12px;
}
 
div.calendar1::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.calendar1::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.calendar1:hover {
  overflow-y: auto!important;
}

</style>