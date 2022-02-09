<?php
$pr_no = $_POST['pr_no'];

$result = fetchItemList($pr_no);
echo $result;
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
                pr.purpose
                
            FROM
                pr as pr
            
            WHERE
            pr.pr_no = '$pr_no'";
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
            'pr_no'         => $row['pr_no'],
            'purpose'         => $row['purpose'],
            'pr_date'       => date('F d, Y',strtotime($row['pr_date'])),
            'target_date'   => date('F d, Y',strtotime($row['target_date'])),
            'office'        => $office,
            'type'          => $type,
        ];
    }

    return json_encode($data);
}
