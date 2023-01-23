
<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../../../../Model/Connection.php";
require_once "../../../../../Model/Awarding.php";

$id = $_POST['rid'];
$rfq_no = $_POST['rfq'];
$count = 0;
$category = '';
$award = new Awarding();


$count = setHeader($award, $rfq_no);

echo setPPU($award, $count,$id);

function setHeader($award, $rfq_no)
{
    $count_supp = '';
    $award->select(
        "supplier_quote sq
        LEFT JOIN supplier s ON s.id = sq.supplier_id
        LEFT JOIN rfq_items ri ON ri.app_id = sq.rfq_item_id
        LEFT JOIN rfq r ON r.id = ri.rfq_id
        LEFT JOIN rfq rr ON rr.id = sq.rfq_id
        LEFT JOIN app a ON a.id = ri.app_id",
        "rr.rfq_no,
        sq.supplier_id ,
        s.supplier_title AS 'title',
        sq.ppu AS 'price_per_unit',
        sq.is_winner AS 'winner'",
        " rr.rfq_no = '$rfq_no'  GROUP BY title ORDER BY winner
    DESC "
    );
    $result = $award->sql;
    $count_supp = mysqli_num_rows($result);
    return $count_supp;
}
function setPPU($award, $count,$id)
{
    
        $where = "sq.rfq_id = '$id' ";

    
    $award->select(
        "supplier_quote  sq
        LEFT JOIN supplier s on s.id = sq.supplier_id",
        "
        sq.id,
        s.supplier_title,
        sq.supplier_id,
        sq.ppu AS 'ppu',
        sq.is_winner",
        " ".$where." "
    );
    $result = $award->sql;
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % $count == 0) {
            echo '<tr>';
            if ($row['is_winner'] == 1) {
                   
                 echo '<td style="font-size:17px;font-weight:bold;" id="ppu"  data-sid="'.$row['supplier_id'].'" data-value="'.$row['ppu'].'">
                        <span class="star"><i class="fa fa-star" style="color:red;" ></i></span>
                            ₱' . number_format($row['ppu'], 2) . 
                    '</td>';
            } else {
                echo '<td id="ppu"  data-sid="'.$row['supplier_id'].'" data-value="'.$row['ppu'].'">
                        ₱' . number_format($row['ppu'], 2) .    
                    '</td>';
            }
        } else {
            if ($row['is_winner'] == 1) {
                echo '<td style="font-size:17px;font-weight:bold;" id="ppu"  data-sid="'.$row['supplier_id'].'" data-value="'.$row['ppu'].'">
                        <span class="star"><i class="fa fa-star" style="color:red;" ></i></span>
                            ₱' . number_format($row['ppu'], 2) . 
                    '</td>';
            } else {
                echo '<td id="ppu"  data-sid="'.$row['supplier_id'].'" data-value="'.$row['ppu'].'">
                    ₱' . number_format($row['ppu'], 2) . '</td>';
            }
        }
        $i++;
    }
}






?>
