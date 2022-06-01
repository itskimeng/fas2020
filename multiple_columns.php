<?php
$max_columns = 4;
$data = array(100,200,200,200,500,200,300,920,200,10,11,12);
?>
<table border= 1>
    <?php  
    $record_id = 0;
    while(true)
    {
        for ($column=1; $column < $max_columns ; $column++) { 
           if(!isset($data[$record_id]))
           {
               return;
           }
           if($column == 1)
           {
               echo '<tr>';
           }?>
           <td>
               <?= $data[$record_id];?>
           </td>
           <?php
           if($column == $max_columns)
           {
               echo '</tr>';
           }
           $record_id++;
        }
    }
    ?>
</table>