<?php 
  $calendar_events = [];
  
  $sql = "SELECT e.id as id, e.start as date_start, e.end as date_end, e.title as title, e.venue as venue, tp.DIVISION_M as office FROM events e LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = e.office ORDER BY e.id DESC LIMIT 3";

  $query = mysqli_query($conn, $sql);
  
  while ($row = mysqli_fetch_assoc($query)) {
    $calendar_events[] = [
      'date' => date('M',strtotime($row['date_start'])) .'<br>'. date('d',strtotime($row['date_start'])),
      'title' => mb_strimwidth($row['title'], 0, 62, "..."),
      'venue' => $row['venue'],
      'office' => $row['office']
    ];
  }  