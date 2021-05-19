<?php
?>
<table width = 100%>
 <th>Activity Title</th>
 <th>Start Date</th>    
 <th>End Date</th>
 <th>Target Participants</th>
 <tbody>

<?php
         include 'conn.php';
  
         $start  = date('Y-m-d',strtotime($_SESSION['start']));
        $end = date('Y-m-d',strtotime($_SESSION['end']));
         $sqlcheck = mysqli_query($conn, "SELECT * FROM events WHERE '$start'  <= DATE(end) AND '$end' >= DATE(start)");
         if (mysqli_num_rows($sqlcheck) > 0) { 
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
 
   </tr>
 </tbody>
</table>
<style>
table {
  table-layout: fixed;
}
</style>