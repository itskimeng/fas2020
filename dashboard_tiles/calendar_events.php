<?php 
  $calendar_events = [];
  
  $sql = "SELECT e.id as id, e.start as date_start, e.end as date_end, e.title as title, e.venue as venue, tp.DIVISION_M as office FROM events e LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = e.office ORDER BY e.id DESC LIMIT 3";

  $query = mysqli_query($conn, $sql);
  
  while ($row = mysqli_fetch_assoc($query)) {
    $calendar_events[] = [
      'date' => date('M',strtotime($row['date_start'])) .'<br>'. date('d',strtotime($row['date_start'])),
      'title' => mb_strimwidth($row['title'], 0, 103, "..."),
      'venue' => $row['venue'],
      'office' => $row['office']
    ];
  }
?>  

<?php foreach ($calendar_events as $key => $event): ?>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon info-box-text" style="min-height: 116px;">
        <h3><?php echo $event['date'] ?></h3>
      </span>
      <div class="info-box-content">
        <span class="info-box-text" style="min-height: 104px; white-space: normal;">
          <b><?php echo $event['title']; ?></b>
            
          </span>
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