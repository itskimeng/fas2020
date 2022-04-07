
<?php


session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../../../Model/Connection.php";
require_once "../../../../Model/Awarding.php";
$pr_no = $_POST['pr_no'];
$award = new Awarding();
            
echo '<thead> <tr> <th>Item</th> </tr> </thead> <tbody>';
    $award->select(
        "pr_items pr
        LEFT JOIN app ON app.id = pr.items
        LEFT JOIN item_unit item ON item.id = pr.unit
        LEFT JOIN pr i ON i.id = pr.pr_id
        LEFT JOIN rfq ON rfq.pr_id = i.id",
        "pr.id,
        app.procurement,
        pr.description,
        pr.qty,
        pr.abc,
        item.item_unit_title,
        rfq.id AS 'rfq_id',
        app.id AS item_id,
        pr.unit,
        rfq.rfq_date,
        rfq.rfq_no,
        rfq.purpose,
        pr.pmo,
        rfq.pr_no,
        rfq.pr_received_date",
        "pr.pr_no = '".$pr_no."' "
    );
    $result1 = $award->sql;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $row = mysqli_num_rows($result1);

       echo '<tr>';
       echo '<td>'.$row1['procurement'].'</td>';

       if($row == 1)
       {
        echo '<td hidden><input type="text" name="rfq_item_id" value="'.$row1['item_id'].'" /></td>';
           
       }else{
        echo '<td hidden><input type="text" name="rfq_item_id[]" value="'.$row1['item_id'].'" /></td>';

       }
       echo '</tr>';
    }
echo '</tbody>';

 
?>
                                                                