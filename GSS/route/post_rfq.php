<?php

if (isset($_POST['pr_no'])) {
    $pr_no = $_POST['pr_no'];

    $result = fetchItemList($pr_no);
    echo $result;
} else {
    if (isset($_POST['id'])) {
        $rfq_no = $_POST['id'];
        $result = fetchRFQInfo($rfq_no);
        echo $result;
    }
}
function fetchItemList($pr_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
            pr.id,
            pr.pr_no,
            pr.pr_date,
            pr.target_date,
            pr.pmo,
            pr.type,
            pr.purpose,
            i.`abc`,
            i.`qty`,
            i.items,
            i.description,
            i.unit,
            rfq.id AS 'rfq_id',
            rfq.rfq_no,
            SUM(i.qty * i.abc) AS ABC
        FROM
            pr AS pr
        LEFT JOIN pr_items i ON
            pr.id = i.pr_id
        LEFT JOIN rfq ON pr.id = rfq.pr_id
        LEFT JOIN app ON app.id = i.items
        WHERE
            pr.pr_no = '$pr_no'
            GROUP by pr_no";
    $query = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $office = $row['pmo'];
        $type = $row['type'];
        $fad = ['10', '11', '12', '13', '14', '15', '16'];
        $ord = ['1', '2', '3', '5'];
        $lgmed = ['7', '18'];
        $lgcdd = ['8', '9', '17'];
        $cavite = ['20', '34', '35', '36', '45'];
        $laguna = ['21', '40', '41', '42', '47', '51', '52'];
        $batangas = ['19', '28', '29', '30', '44'];
        $rizal = ['23', '37', '38', '39', '46', '50'];
        $quezon = ['22', '31', '32', '33', '48', '49', '53'];
        $lucena_city = ['24'];
        if (in_array($office, $fad)) {
            $office = 'FAD';
        } else if (in_array($office, $lgmed)) {
            $office = 'LGMED';
        } else if (in_array($office, $lgcdd)) {
            $office = 'LGCDD';
        } else if (in_array($office, $cavite)) {
            $office = 'CAVITE';
        } else if (in_array($office, $laguna)) {
            $office = 'LAGUNA';
        } else if (in_array($office, $batangas)) {
            $office = 'BATANGAS';
        } else if (in_array($office, $rizal)) {
            $office = 'RIZAL';
        } else if (in_array($office, $quezon)) {
            $office = 'QUEZON';
        } else if (in_array($office, $lucena_city)) {
            $office = 'LUCENA CITY';
        } else if (in_array($office, $ord)) {
            $office = 'ORD';
        }
        if ($type == "1") {
            $type = "Catering Services";
        }
        if ($type == "2") {
            $type = "Meals, Venue and Accommodation";
        }
        if ($type == "3") {
            $type = "Repair and Maintenance";
        }
        if ($type == "4") {
            $type = "Supplies, Materials and Devices";
        }
        if ($type == "5") {
            $type = "Other Services";
        }
        if ($type == "6") {
            $type = "Reimbursement and Petty Cash";
        }
        $data[] = [
            'id'            => $row['id'],
            'rfq_id'        => $row['rfq_id'],
            'rfq_no'        => $row['rfq_no'],
            'pr_no'         => $row['pr_no'],
            'purpose'       => $row['purpose'],
            // 'pr_date'       => date('F d, Y', strtotime($row['pr_date'])),
            // 'target_date'   => date('F d, Y', strtotime($row['target_date'])),
            'office'        => $office,
            // 'mode'          => $type,
            // 'amount'        => $row['ABC'],
            // 'abc'           => $row['abc'],
            // 'qty'           => $row['qty'],
            // 'items'         => $row['items'],
            // 'description'   => $row['description'],
            // 'unit'          => $row['unit']

        ];
    }

    return json_encode($data);
}
function fetchRFQInfo($rfq_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
                rfq.id as 'rfq_id',
                rfq.rfq_date,
                rfq.rfq_no,
                rfq.purpose,
                pr.id,
                pr.pmo,
                pr.type,
                pr.pmo,
                pr.pr_date,
                pr.target_date,
                rfq.pr_no,
                rfq.pr_received_date,
                i.`abc`,
                i.`qty`,
                mode.mode_of_proc_title
            FROM
                rfq
            LEFT JOIN pr ON pr.pr_no = rfq.pr_no
      

            LEFT JOIN pr_items i on pr.pr_no = i.pr_no
            LEFT JOIN app on i.items = app.id
            LEFT JOIN mode_of_proc mode on app.mode_of_proc_id = mode.id
            WHERE
            rfq.rfq_no = '$rfq_no' ";
    $query = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $office = $row['pmo'];
        $type = $row['type'];
        $fad = ['10', '11', '12', '13', '14', '15', '16'];
        $ord = ['1', '2', '3', '5'];
        $lgmed = ['7', '18'];
        $lgcdd = ['8', '9', '17'];
        $cavite = ['20', '34', '35', '36', '45'];
        $laguna = ['21', '40', '41', '42', '47', '51', '52'];
        $batangas = ['19', '28', '29', '30', '44'];
        $rizal = ['23', '37', '38', '39', '46', '50'];
        $quezon = ['22', '31', '32', '33', '48', '49', '53'];
        $lucena_city = ['24'];
        if (in_array($office, $fad)) {
            $office = 'FAD';
        } else if (in_array($office, $lgmed)) {
            $office = 'LGMED';
        } else if (in_array($office, $lgcdd)) {
            $office = 'LGCDD';
        } else if (in_array($office, $cavite)) {
            $office = 'CAVITE';
        } else if (in_array($office, $laguna)) {
            $office = 'LAGUNA';
        } else if (in_array($office, $batangas)) {
            $office = 'BATANGAS';
        } else if (in_array($office, $rizal)) {
            $office = 'RIZAL';
        } else if (in_array($office, $quezon)) {
            $office = 'QUEZON';
        } else if (in_array($office, $lucena_city)) {
            $office = 'LUCENA CITY';
        } else if (in_array($office, $ord)) {
            $office = 'ORD';
        }
        if ($type == "1") {
            $type = "Catering Services";
        }
        if ($type == "2") {
            $type = "Meals, Venue and Accommodation";
        }
        if ($type == "3") {
            $type = "Repair and Maintenance";
        }
        if ($type == "4") {
            $type = "Supplies, Materials and Devices";
        }
        if ($type == "5") {
            $type = "Other Services";
        }
        if ($type == "6") {
            $type = "Reimbursement and Petty Cash";
        }
        $data[] = [
            'id'            => $row['id'],
            'rfq_id'            => $row['rfq_id'],
            'pr_no'         => $row['pr_no'],
            'rfq_no'         => $row['rfq_no'],
            'purpose'         => $row['purpose'],
            'pr_date'       => date('F d, Y', strtotime($row['pr_date'])),
            'target_date'   => date('F d, Y', strtotime($row['target_date'])),
            'rfq_date'   => date('F d, Y', strtotime($row['rfq_date'])),
            'office'        => $office,
            'type'          => $type,
            'amount'        => $row['abc'] * $row['qty'],
            'mode'          => $row['mode_of_proc_title']
        ];
    }

    return json_encode($data);
}
