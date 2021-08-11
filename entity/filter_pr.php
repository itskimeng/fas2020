<?php
session_start();
date_default_timezone_set('Asia/Manila');

$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");



$office = $_GET['office'];
$pr_date = $_GET['pr_date'];

$pr_dateFormat = date('Y-m-d', strtotime($pr_date));


$data = [
    'name' => $office,
];

$lists = filterApplicants($conn, $office, $pr_dateFormat);

echo $lists;

function filterApplicants($conn, $office, $pr_date)
{
    $username = $_SESSION['username'];

    $data = [];
    if($pr_date == '' || $pr_date == NULL || $pr_date == '1970-01-01')
    {
        $sql = "SELECT `id`, `pr_no`, `pmo`, `username`, `purpose`, `canceled`, `canceled_date`, `type`, `pr_date`, `target_date`, `submitted_date`, `submitted_by`, `received_date`, `received_by`, `date_added`, `stat`, `sq`, `aoq`, `po`, `budget_availability_status`, `availability_code`, `date_certify`, `submitted_date_budget` 
        FROM `pr`  WHERE pmo = '" . $office . "'";
    }else{
        $sql = "SELECT `id`, `pr_no`, `pmo`, `username`, `purpose`, `canceled`, `canceled_date`, `type`, `pr_date`, `target_date`, `submitted_date`, `submitted_by`, `received_date`, `received_by`, `date_added`, `stat`, `sq`, `aoq`, `po`, `budget_availability_status`, `availability_code`, `date_certify`, `submitted_date_budget` 
        FROM `pr`  WHERE pmo = '" . $office . "' AND pr_date = '" . $pr_date . "' ";
    }
  



    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['type'] == '1') {
            $type = 'Catering Services';
        } else if ($row['type'] == '2') {
            $type = "Meals, Venue and Accommodation";
        } else if ($row['type'] == '3') {
            $type = "Repair and Maintenance";
        } else if ($row['type'] == '4') {
            $type = "Supplies, Materials and Devices";
        } else if ($row['type'] == '5') {
            $type = "Other Services";
        } else if ($row['type'] == '6') {
            $type = "Reimbursement and Petty Cash";
        }
        $submitted_date = $row['submitted_date'];
        $submitted_date1 = date('F d, Y', strtotime($submitted_date));
        $submitted_by1 = $row["submitted_by"];
        $id = $row['id'];
        $getID = $row["id"];

        $received_date = $row["received_date"];
        $received_date1 = date('F d, Y', strtotime($received_date));
        $received_by1 = $row["received_by"];
        $submitted_date_budget = $row['submitted_date_budget'];
        $budget_availability_status = $row['budget_availability_status'];
        $canceled = $row["canceled"];





        if ($submitted_date == NULL) {
            $sb = '<a class="btn btn-success btn-xs" onclick="return confirm("Are you sure you want to Submit this PR?");" href="submit_pr.php?id=' . $id . '&username=' . $username . ' title="Submit">
                   <i class="fa fa-fw fa-send-o"></i>Submit
                   </a>';
        } else {
            $sb = $submitted_date1 . '<br><strong><i>' . $submitted_by1 . '</i></strong>';
        }

        if ($received_date == NULL) {
            $rd = '';
        } else {
            $rd = $received_date1 . '<br><strong><i>' . $received_by1 . '</i></strong>';
        }
        if ($budget_availability_status == 'Submitted') {
            $to_budget = 'DRAFT';
        } else if ($budget_availability_status == 'CERTIFIED') {
            $to_budget = date('F d, Y', strtotime($row['date_certify'])) . '<br><span class="badge badge-pill badge-success"><b>' . $row['availability_code'] . '</b></span>';
        }else{
            $to_budget = '';
        }

        if ($submitted_date_budget == NULL) {
            $sub_bud = '<a class="btn btn-success btn-xs" onclick="return confirm("Are you sure you want to Submit this to Budget Section?");" href="entity/post_to_budget.php?id=' . $id . '&username=' . $username . ' title="Submit">
            <i class="fa fa-fw fa-send-o"></i>Submit</a>';
        } else {
            $sub_bud = date('F d, Y', strtotime($submitted_date_budget)) . '<br><strong><i>' . $submitted_by1 . '</i></strong>';
        }

        // if ($submitted_date == NULL) {
        //     $btn = '
        //     <a href="ViewPRv.php?id=' . $id . ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> View</a> |
        //     <a href="ViewRFQdetails.php?id=' . $getID . '" class="btn btn-primary btn-xs"> <i class="fa">&#xf044;</i> Edit</a>';
        //     if ($canceled == NULL || $canceled == '') {
        //         $btn = '<a data-toggle="modal" data-target="#modal-info_' . $row['id'] . '" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-close"></i>Cancel</a>';
        //     } else {
        //         $btn = '<font style="color:red;">Canceled </font>' . $canceled . '';
        //     }
        // } else {
        //     $btn = '<a href="ViewPRv.php?id=' . $id . ' title="View" class="btn btn-info btn-xs"> <i class="fa">&#xf06e;</i> View</a>';
        //     if ($canceled == NULL || $canceled == '') {
        //         $btn = '| <a data-toggle="modal" data-target="#modal-info_' . $row['id'] . '" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-close"></i>Cancel</a>';
        //     } else {
        //         $btn = '| <font style="color:red;">Canceled </font>' . $canceled . '';
        //     }
        // }



        $data[$row['id']] = [
            'id' => $row['id'],
            'pr_no' => $row['pr_no'],
            'pr_date' => date('F d, Y', strtotime($row['pr_date'])),
            'pmo' => $row['pmo'],
            'type' => $type,
            'purpose' => $row['purpose'],
            'target_date' => date('F d, Y', strtotime($row['target_date'])),
            'submitted_date_budget' => $sub_bud,
            'received_date' => $rd,
            'budget_availability_status' => $to_budget,
            'submitted_date' => $sb,
            'actions' => $submitted_date,
            'cancelled' => $canceled



        ];
    }
    return json_encode($data);
}
