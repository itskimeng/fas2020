  <?php
  $filter = ($_GET['office'] == '') ? 'ALL' : $_GET['office'];
  // $type = ($_GET['type'] == '') ? 'ALL' :$_GET['type'];

  $result = fetchEvents($filter);
  echo $result;

  function fetchEvents($filter = 'ALL', $type = 'ALL')
  {
    // if($filter == 16)
    // {
    //   $filter = 'FAD';
    // }else if($filter == 17)
    // {
    //   $filter = 'LGCDD';
    // }else if($filter == '18'){
    //   $filter = 'LGMED';
    // }else if($filter == 19)
    // {
    //   $filter = 'BATANGAS';
    // }else if($filter == 20)
    // {
    //   $filter = 'CAVITE';
    // }else if($filter == 23)
    // {
    //   $filter = 'RIZAL';

    // }else if($filter == 24)
    // {
    //   $filter = 'LUCENA CITY';
    // }else if($filter == 21)
    // {
    //   $filter = 'LAGUNA';
    // }
    $fad = ['10', '11', '12', '13', '14', '15', '16'];
    $ord = ['1', '2', '3', '5'];
    $lgmed = ['7', '18'];
    $lgcdd = ['8', '9', '17'];
    $cavite = ['20', '34', '35', '36', '45'];
    $laguna = ['21', '40', '41', '42', '47', '51', '52'];
    $batangas = ['19', '28', '29', '30', '44'];
    $rizal = ['23', '37', '38', '39', '46', "50"];
    $quezon = ['22', '31', '32', '33', '48', '49', '53'];
    $lucena_city = ['24'];

    if (in_array($filter, $fad)) {
      $filter = '10';
    } else if (in_array($filter, $lgmed)) {
      $filter = '18';
    } else if (in_array($filter, $lgcdd)) {
      $filter = '17';
    } else if (in_array($filter, $cavite)) {
      $filter = '20';
    } else if (in_array($filter, $laguna)) {
      $filter = '21';
    } else if (in_array($filter, $batangas)) {
      $filter = '19';
    } else if (in_array($filter, $rizal)) {
      $filter =  "'" . implode("', '", $rizal) . "'";
    } else if (in_array($filter, $quezon)) {
      $filter = '22';
    } else if (in_array($filter, $lucena_city)) {
      $filter = '24';
    } else if (in_array($filter, $ord)) {
      $filter = '1';
    }
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    if ($filter == '112') {
      $sql = "SELECT  pr.id as id,
            pr.pmo as pmo,
      pr.stat as stat,
      pr.pr_no as 'pr_no',
      pr.canceled as 'canceled',
      pr.received_by as 'received_by',
      pr.submitted_by as 'submitted_by',
      pr.submitted_date as 'submitted_date',
      pr.received_date as 'received_date',
      pr.purpose as 'purpose',
      pr.pr_date as 'pr_date',
      pr.type as 'type',
      pr.target_date as 'target_date',
      pr.submitted_date_budget as 'submitted_date_budget',
      pr.budget_availability_status as 'budget_availability_status' ,
      emp.UNAME as 'username',
        sum(abc*qty) as 'total'
      
      FROM pr  
      LEFT JOIN tblemployeeinfo emp ON pr.received_by = emp.EMP_N 
        LEFT JOIN pr_items items ON pr.pr_no = items.pr_no
      where YEAR(pr_date) = '2022' 
      GROUP BY pr.pr_no
      order by pr.pr_no desc ";
    } else {
      $sql = "SELECT  pr.id as id,
      pr.pmo as pmo,
      pr.stat as stat,
      pr.pr_no as 'pr_no',
      pr.canceled as 'canceled',
      pr.received_by as 'received_by',
      pr.submitted_by as 'submitted_by',
      pr.submitted_date as 'submitted_date',
      pr.received_date as 'received_date',
      pr.purpose as 'purpose',
      pr.pr_date as 'pr_date',
      pr.type as 'type',
      pr.target_date as 'target_date',
      pr.submitted_date_budget as 'submitted_date_budget',
      pr.budget_availability_status as 'budget_availability_status',
      emp.UNAME as 'username',
        sum(abc*qty) as 'total',
        pr.is_urgent as 'urgent'
       FROM pr  
     
        LEFT JOIN tblemployeeinfo emp ON pr.received_by = emp.EMP_N 
        LEFT JOIN pr_items items ON pr.pr_no = items.pr_no
      where YEAR(date_added) = '2022'  and  pr.pmo IN (" . $filter . ")  
      GROUP BY pr.pr_no
      order by pr.pr_no desc ";
    }

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
      $id = $row["id"];
      $pr_no = $row["pr_no"];
      $pmo = $row["pmo"];
      $canceled = $row["canceled"];
      $received_by1 = $row["received_by"];
      $submitted_by1 = $row["submitted_by"];
      $submitted_date = $row["submitted_date"];
      $submitted_date1 = date('F d, Y', strtotime($submitted_date));
      $received_date = $row["received_date"];
      $received_date1 = date('F d, Y', strtotime($received_date));
      $purpose = $row["purpose"];
      $pr_date = $row["pr_date"];
      $pr_date1 = date('F d, Y', strtotime($pr_date));
      $type = $row["type"];
      $target_date = $row["target_date"];
      $target_date11 = date('F d, Y', strtotime($target_date));
      $submitted_date_budget = $row['submitted_date_budget'];
      $budget_availability_status = $row['budget_availability_status'];
      $stat='';
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
      if ($row['stat'] == 1) {
        $stat = '<span class="label label-primary label2">Submitted</span>';
      }
      if ($row['stat'] == 2) {
        $stat = '<span class="label label-success label2">Received</span>';
      }
      if ($row['stat'] == 3) {
        $stat = '<span class="label label-warning label2">Processing</span>';
      }
      if ($row['stat'] == 4) {
        $stat = '<span class="label label-danger label2">Completed</span>';
      }
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

      if (in_array($pmo, $fad)) {
        $pmo = 'FAD';
      } else if (in_array($pmo, $lgmed)) {
        $pmo = 'LGMED';
      } else if (in_array($pmo, $lgcdd)) {
        $pmo = 'LGCDD';
      } else if (in_array($pmo, $cavite)) {
        $pmo = 'CAVITE';
      } else if (in_array($pmo, $laguna)) {
        $pmo = 'LAGUNA';
      } else if (in_array($pmo, $batangas)) {
        $pmo = 'BATANGAS';
      } else if (in_array($pmo, $rizal)) {
        $pmo = 'RIZAL';
      } else if (in_array($pmo, $quezon)) {
        $pmo = 'QUEZON';
      } else if (in_array($pmo, $lucena_city)) {
        $pmo = 'LUCENA CITY';
      } else if (in_array($pmo, $ord)) {
        $pmo = 'ORD';
      }

      $data[] = [
        'id'      => $id,
        'pmo_id'  => $row['pmo'],
        'pr_no'   => $pr_no,
        'pmo'     => $pmo,
        'division'=> $pmo,
        'type'    => $type,
        'canceled' => $canceled,
        'received_by' => $row['username'],
        'submitted_by' => $submitted_by1,
        'submitted_date' => $submitted_date1,
        'received_date' => $received_date1,
        'purpose'       => $purpose,
        'pr_date'       => $pr_date1,
        'type'          => $type,
        'target_date'   => $target_date11,
        'submitted_date_to_budget' => $submitted_date_budget,
        'budget_availability_status' => $budget_availability_status,
        'status'                      => $stat,
        'total_abc' => '₱' . number_format($row['total'], 2),
        'urgent' => $row['urgent']

      ];
    }


    return json_encode($data);
  }
