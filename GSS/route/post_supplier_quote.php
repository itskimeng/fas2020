<?php
$rfq_id      = $_POST['rfq_id'];
$supplier_id = $_POST['supplier_id'];

echo fetchQuotation($rfq_id, $supplier_id);

function fetchQuotation($rfq_id, $supplier_id)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT id, ppu from supplier_quote where is_winner = 1 and rfq_id='$rfq_id' and supplier_id = '$supplier_id' ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            'id' => $row['id'],
            'quote' => number_format($row['ppu'], 2)

        );
    }
    return json_encode($data);
}
