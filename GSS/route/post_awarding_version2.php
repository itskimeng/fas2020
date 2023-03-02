<?php
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/Awarding.php";
require_once "../../Model/Procurement.php";
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$award = new Awarding();
$pr = new Procurement();

$cfrom_abstract_no = $_GET['cform-abstract_no'];
$cfrom_abstract_date = date('Y-m-d', strtotime($_GET['cform-abstract_date']));
$rfq_no = $_GET['cform-rfq_no'];
$is_multiple_pr = fetchMultiplePRtoRFQ($rfq_no);

// $rfq_id = ($is_multiple_pr) ? explode(",", $_GET['cform-rfq_id']) : $_GET['cform-rfq_id'];
$rfq_id = $_GET['cform-rfq_id'];
$pr_id = $_GET['cform-pr_id'];
$ppu = $_GET['ppu'];
$app_id = $_GET['app_id'];
$supplier_id = str_replace("'", "", $_GET['supplier_id']);
$winner = '';


$multiple =  count($supplier_id);
$a = array_fill(0, $multiple, $rfq_id);
$b = array_fill(0, $multiple, $rfq_id);


// Distribute all item id in selected supplier
$app_item = [];
$supp = count($supplier_id) / count($app_id);
foreach ($app_id as $key => $val) {
    for ($i = 0; $i < $supp; $i++) {
        array_push($app_item, $val);
    }
}

//insert data
for ($i = 0; $i < count($a); $i++) {
    $award->insert(
        'supplier_quote',
        [
            'id' => null,
            'supplier_id' => $supplier_id[$i],
            'rfq_id' => $rfq_id,
            'rfq_no' => $rfq_no,
            'rfq_item_id' => $app_item[$i],
            'ppu' => $_GET['ppu'][$i],
        ]
    );
}
// }


generateAbstractNo($is_multiple_pr, $award, $rfq_id, $rfq_no, $cfrom_abstract_no, $cfrom_abstract_date);
setLogs($award, $pr_id);

function generateAbstractNo($is_multiple_pr, $award, $rfq_id, $rfq_no, $cfrom_abstract_no, $cfrom_abstract_date)
{


    $award->update(
        'supplier_quote',
        [
            'is_winner' => '1'
        ],
        "ppu = (SELECT MIN(ppu) FROM supplier_quote WHERE rfq_no ='$rfq_no' and ppu != 0)"
    );

    $award->insert(
        'abstract_of_quote',
        [
            'id' => null,
            'abstract_no' => $cfrom_abstract_no,
            'supplier_id' => $winner,
            'rfq_id' => $rfq_id,
            'warranty' => '',
            'price_validity' => '',
            'date_created' => $cfrom_abstract_date,
        ]
    );
}


function setLogs($award, $pr_id)
{
    $award->update(
        'pr',
        [
            'stat' => Procurement::STATUS_AWARDED,
        ],
        "id='$pr_id'"
    );
}
function fetchMultiplePRtoRFQ($rfq_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

    if (isset($rfq_no)) {
        $where = "where rfq_no = '$rfq_no'";
    } else {
        $where = '';
    }
    $sql = "SELECT rfq_no,COUNT(*) as multiple
        FROM rfq
        " . $where . "
        GROUP BY rfq_no
        HAVING COUNT(*) > 1";
    $query = mysqli_query($conn, $sql);
    $data = [];
    $is_multiple = '';
    while ($row = mysqli_fetch_assoc($query)) {
        $is_multiple = ($row['rfq_no'] == '' || $row['rfq_no'] == null) ? true : 1;
    }
    return $is_multiple;
}
