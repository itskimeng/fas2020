<?php
$procurement = $_POST['pr_id'];
$rfq_no = $_POST['rfq'];
$is_multiple = '';

$result = fetchEvents($procurement,$rfq_no,$is_multiple);
echo $result;
function fetchEvents($id,$rfq_no,$is_multiple)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

  
    $sql1 = "SELECT rfq_no,COUNT(*) as multiple
    FROM rfq
    where rfq_no = '$rfq_no'
    GROUP BY rfq_no
    HAVING COUNT(*) > 1";
    $query = mysqli_query($conn, $sql1);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $is_multiple = ($row['rfq_no'] == '' || $row['rfq_no'] == null) ? true : 1;
    }
    // if($is_multiple)
    // {
    //     $sql2 = "SELECT
    //     r.rfq_no AS 'rfq_no',
    //     r.id AS 'rfq_id',
    //     r.pr_id AS 'pr_id',
    //     r.rfq_date AS 'rfq_date',
    //     pr.pr_no AS 'pr_no',
    //     pr.pmo as 'pmo',
    //     pr.id AS 'pr_id',
    //     pr.pr_date AS 'pr_date',
    //     sum(i.qty*abc) as 'abc',
    //     i.items

    //     FROM
    //         pr
    //         LEFT JOIN rfq r ON r.pr_id = pr.id
    //         LEFT JOIN pr_items i on i.pr_id = pr.id

    //         where
    //        r.rfq_no = '".$rfq_no."'
    //         group by i.pr_id
    //         order by pr.pr_no desc
    //     ";
    // }else{
        $sql2 = "SELECT
        r.rfq_no AS 'rfq_no',
        r.id AS 'rfq_id',
        r.pr_id AS 'pr_id',
        r.rfq_date AS 'rfq_date',
        pr.pr_no AS 'pr_no',
        pr.pmo as 'pmo',
        pr.id AS 'pr_id',
        pr.pr_date AS 'pr_date',
        sum(i.qty*abc) as 'abc',
        i.items

        FROM
            pr
            LEFT JOIN rfq r ON r.pr_id = pr.id
            LEFT JOIN pr_items i on i.pr_id = pr.id

            where
           pr.id = '".$id."' and r.id = '".$rfq_no."'
            group by i.pr_id
            order by pr.pr_no desc
        ";
    // }




    
    $query = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($query)) {
        $office = $row['pmo'];
        $pr[] = $row['pr_no'];

            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
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
            }else{
                $office = '~';
            }
        $data = array(
            'rfq_id' => $row['rfq_id'],
            'pr_id' => $row['pr_id'],
            'rfq_no' => $row['rfq_no'],
            'pr_no' => implode(',',$pr),
            'total_abc' => '₱'. number_format($row['abc'],2),
            'rfq_date' => date('F d, Y',strtotime($row['rfq_date'])),
            'pr_date' => date('F d, Y',strtotime($row['pr_date'])),
            'office' => $office,
            'app_id' => $row['items']
        );
          
    }
    return json_encode($data);
}