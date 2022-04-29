
<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../Model/Connection.php";
require_once "../../../../Model/Awarding.php";
$id = $_POST['id'];
$count = 0;
$category = '';
$award = new Awarding();

$award->select(
    "pr_items",
    "count(*) as 'count'",
    "pr_no = '".$_POST['pr_no']."' "
);
$result = $award->sql;
while ($row = mysqli_fetch_assoc($result)) {
$count = $row['count'];
}

    $award->select(
        "supplier_quote sq
        LEFT JOIN supplier s ON sq.supplier_id = s.id
        LEFT JOIN app a ON sq.rfq_item_id = a.id",
        "s.supplier_title,
        a.procurement,
        sq.ppu,
        sq.id,
        sq.is_winner",
        "sq.rfq_id = '".$id."' "
    );
    $result1 = $award->sql;
    while ($row1 = mysqli_fetch_assoc($result1)) {
 
    
        if ($row1['is_winner'] == 1) {
            $is_winner = 'style="background-color:#d32f2f;color:#fff;"';
        } else {
            $is_winner = '';
        }
            $rowspan = $count;
        
        echo '<tr>';
        if ($row1['supplier_title'] != $category) {
            $category = $row1['supplier_title'];
            $category = $row1['supplier_title'];
            echo '<td  rowspan = ' . $rowspan . '>' . $row1['supplier_title'] . '</td>';
        } else {
        }
        echo '<td ' . $is_winner . '>' . $row1['procurement'] . '</td>';
        if($row1['ppu'] == 0 || $row1['ppu'] == '')
        {
            echo '<td '.$is_winner.'>No quotation</td>';
        }else{
                    echo '<td ' . $is_winner . '>₱' . number_format($row1['ppu'], 2) . '</td>';

        }
        echo '<td style="text-align:center;"><button id="btn_edit_ppu" value='.$row1['ppu'].' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button>';
        echo '<td hidden><input type="hidden" id="sq_id" value='.$row1['id'].' />';
        echo '</tr>';
    }


 
?>
