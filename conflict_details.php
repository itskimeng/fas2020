


<?php
         include 'conn.php';
  
         $start  = date('Y-m-d',strtotime($_POST['start']));
          $end = date('Y-m-d',strtotime($_POST['end']));        
         $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE '$start'  <= DATE(end) AND '$end' >= DATE(start)");
         if (mysqli_num_rows($sqlcheck) > 0) { 
           echo '
           <tr>
           <td style = "font-size:15px;"><b>TITLE<b/></td>
           <td style = "font-size:15px;"><b>START<b/></td>
           <td style = "font-size:15px;"><b>END<b/></td>
           <td style = "font-size:15px;"><b>REMARS<b/></td>
           </tr>';
         while ($row = mysqli_fetch_array($sqlcheck)) {
           echo '<tr>';
           echo '<td>'.$row['title'].'</td>';
           echo '<td>'.date('F d, Y',strtotime($row['start'])).'</td>';
           echo '<td>'.date('F d, Y',strtotime($row['end'])).'</td>';
           echo '<td>'.$row['remarks'].'</td>';
           echo '</tr>';

         }
        }

    
?>
 
  