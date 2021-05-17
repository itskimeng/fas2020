<style>
table {
  table-layout: fixed;
}
</style>
<table width = 100%>
 <th>Activity Title</th>
 <th>Start Date</th>
 <th>End Date</th>
 <th>Target Participants</th>
 <tbody>
<?php
         include 'conn.php';
         $sqlcheck = mysqli_query($conn, "SELECT start, end, title,remarks as 'participants' FROM `events` where MONTH(start) = '05'");
         if (mysqli_num_rows($sqlcheck) > 0) { 
         while ($row = mysqli_fetch_array($sqlcheck)) {
           echo '<tr>';
           echo '<td>'.$row['title'].'</td>';
           echo '<td>'.date('F d, Y',strtotime($row['start'])).'</td>';
           echo '<td>'.date('F d, Y',strtotime($row['end'])).'</td>';
           echo '<td>'.$row['participants'].'</td>';
           echo '</tr>';

         }
        }

    
?>
 
   </tr>
 </tbody>
</table>