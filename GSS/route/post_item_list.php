<?php
$id = $_POST['id'];
$pr_no = $_POST['pr_no'];

$result = fetchItemList($id,$pr_no);
echo $result;
function fetchItemList($id,$pr_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
                pr.id,
                pr.pr_no,
                item.item_unit_title,
                pr.description,
                app.procurement,
                app.sn,
                pr.unit,
                pr.qty,
                pr.abc
            FROM
                pr_items pr
            LEFT JOIN app ON app.id = pr.items
            LEFT JOIN item_unit item ON item.id = pr.unit
            WHERE
            pr_no = '$pr_no' AND pr.id = '$id'";
    $query = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $total = number_format($row['qty'] * $row['abc'], 2);

        $data[] = [
            'id' => $row['id'],
            'pr_no' => $row['pr_no'],
            'sn' => $row['sn'],
            'items' => $row['procurement'],
            'description' => $row['description'],
            'unit' => $row['item_unit_title'],
            'qty' => $row['qty'],
            'abc' => $row['abc'],
            'total' => $total
        ];
    }

    return json_encode($data);
}
