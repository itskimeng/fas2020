  <?php
  $filter = ($_GET['office'] == '') ? 'ALL' : $_GET['office'];
  // $type = ($_GET['type'] == '') ? 'ALL' :$_GET['type'];

  $result = fetchEvents($filter);
  echo $result;

  function fetchEvents($filter = 'ALL', $type = 'ALL')
  {
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
      $sql = "SELECT 
      pr.id as id,
      pr.pr_no as 'pr_no',
      pr.pmo as pmo,
      pr.canceled as 'canceled',
      pr.received_by as 'received_by',
      pr.submitted_by as 'submitted_by',
      pr.submitted_date as 'submitted_date',
      pr.submitted_date_gss as 'submitted_date_gss',
      pr.submitted_by_gss as 'submitted_by_gss',
      pr.received_date as 'received_date',
      pr.purpose as 'purpose',
      pr.pr_date as 'pr_date',
      pt.type as 'type',
      pr.target_date as 'target_date',    
      pr.submitted_date_budget as 'submitted_date_budget',
      pr.budget_availability_status as 'budget_availability_status',
      ps.REMARKS as 'status',
      emp.UNAME as 'username',
      SUM(abc * qty) as 'total',
      is_urgent as 'urgent'
      FROM pr as pr
      LEFT JOIN pr_items items ON items.pr_no = pr.pr_no 
      LEFT JOIN tbl_pr_status as ps on ps.id = pr.stat
      LEFT JOIN tblemployeeinfo emp ON pr.received_by = emp.EMP_N
      LEFT JOIN tbl_pr_type pt on pt.id = pr.type
      where YEAR(date_added) = '2022' and  pr.pmo IN (" . $filter . ")  
      GROUP BY items.pr_no
      order by pr.id desc
      ";
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
      $office = $row['pmo'];
      
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
    if($submitted_by1 == '')
    {
      $submitted_by1 = '';
    }

      $data[] = [
        'id' => $id,
        'pmo_id' => $row['pmo'],
        'pr_no' => $pr_no,
        'division' => $office,
        'type' => $type,
        'canceled' => $canceled,
        'received_by' => $row['username'],
        'submitted_by' => $submitted_by1,
        'submitted_date' => date('F d, Y',strtotime($row['pr_date'])),
        'received_date' => $received_date1,
        'purpose' =>  mb_strimwidth($purpose, 0, 15, "..."),
        'pr_date' => $pr_date1,
        'type' => $type,
        'target_date' => $target_date11,
        'submitted_date_to_budget' => $submitted_date_budget,
        'budget_availability_status' => $budget_availability_status,
        'office' => $office,
        'status' => $row['status'],
        'is_budget' => $row['submitted_date'],
        'is_gss' => $row['submitted_date_gss'],
        'total_abc' => '₱' . $row['total'],
        'urgent' => $row['urgent'],
      ];
    }


    return json_encode($data);
  }
