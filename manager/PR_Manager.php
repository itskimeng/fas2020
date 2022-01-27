<?php

class PR_Manager
{
  public $conn = '';
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
  }

  public function getPMO()
  {
    $sql = "SELECT * FROM `pmo` order by id desc";
    $query = mysqli_query($this->conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
      $office = $row['pmo_title'];
      $data[] = [
        'id' => $row['id'],
        'office' => $office,
      ];
    }
    return $data;
  }

  public function fetchPRStatusCount($status = ['1', '2', '3', '4', '5'])
  {
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $options = [];
    foreach ($status as $stat) {
      $sql = "SELECT COUNT(*) as count FROM pr where stat = '" . $stat . "' and YEAR(pr_date) = '2022'";
      $query = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($query);
      $options[$stat] = $row['count'];
    }

    return $options;
  }
  public function fetchPRInfo()
  {

    $sql = "SELECT 
        pr.id as id,
        pr.pr_no as 'pr_no',
        pr.pmo as pmo,
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
        pr.stat as 'stat',
        emp.UNAME as 'username',
        sum(abc*qty) as 'total',
        is_urgent as 'urgent'
        FROM pr as pr
        LEFT JOIN tblemployeeinfo emp ON pr.received_by = emp.EMP_N 
        LEFT JOIN pr_items items ON pr.pr_no = items.pr_no
        where YEAR(date_added) = '2022' 
        GROUP BY pr.pr_no
        order by pr.id desc";

    $query = mysqli_query($this->conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
      $office = $row['pmo_title'];
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
      $office = $row['pmo'];

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
        $stat = '<span class="label label-primary label2" style = "width:250%!important;">Submitted</span>';
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

      $data[] = [
        'id' => $id,
        'pmo_id' => $row['pmo'],
        'pr_no' => $pr_no,
        'division' => $office,
        'type' => $type,
        'canceled' => $canceled,
        'received_by' => $row['username'],
        'submitted_by' => $submitted_by1,
        'submitted_date' => $submitted_date1,
        'received_date' => $received_date1,
        'purpose' => $purpose,
        'pr_date' => $pr_date1,
        'type' => $type,
        'target_date' => $target_date11,
        'submitted_date_to_budget' => $submitted_date_budget,
        'budget_availability_status' => $budget_availability_status,
        'office' => $office,
        'status' => $stat,
        'total_abc' => '₱' . number_format($row['total'], 2),
        'urgent' => $row['urgent']

      ];
    }
    return $data;
  }
  public function fetchPrNo($year)
  {
    $sql = "SELECT count(*) as count_r FROM pr WHERE YEAR(pr_date) = '$year' order by id desc; ";
    $query = mysqli_query($this->conn, $sql);
    $data = [];
    $current_month = date('m');
    while ($row = mysqli_fetch_assoc($query)) {
      $str = str_replace($year . "-" . $current_month . "-", "", $row['count_r']);
      if ($row['count_r'] == 1) {
        $idGet = (int)$str + 1;
        $pr_no = $year . '-' . $current_month . '-' . '0000' . $idGet;
      } else if ($row['count_r'] <= 99) {
        $idGet = (int)$str + 1;

        $pr_no = $year . '-' . $current_month . '-' . '000' . $idGet;
      } else {
        $idGet = (int)$str + 1;

        $pr_no = $year . '-' . $current_month . '-' . '00' . $idGet;
      }
      $data = [
        'pr_no' => $pr_no
      ];
    }
    return $data;
  }
  public function getItems($pmo, $pr_no)
  {
    $sql = "SELECT 
      id as ID";


    $query = mysqli_query($this->conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
      $data = [
        "items" => $row['items']
      ];
    }
    return $data;
  }



  // CRUD
  public function insertPR($pr_no, $pmo, $purpose, $d1, $type, $d2, $is_urgent)
  {
   $is_urgent = ($is_urgent === '0' || $is_urgent == '') ? $is_urgent = '0' :$is_urgent='1';

    $sql = "INSERT INTO pr(pr_no,pmo,purpose,pr_date,type,target_date,stat,is_urgent) VALUES('$pr_no','$pmo','$purpose','$d1','$type','$d2',1, $is_urgent)";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }
  public function view_pr($pr_no)
  {
    $sql = "SELECT
     pr.`id`, pr.`pr_no`, 
     pr.`pmo`, `username`, 
    `purpose`, `canceled`, 
    `canceled_date`, `type`, 
    `pr_date`, `target_date`, 
    `submitted_date`, `submitted_by`, 
    `received_date`, `received_by`, 
    `date_added`, `stat`, `sq`, `aoq`, `po`, 
    `budget_availability_status`, `availability_code`,
    `date_certify`, `submitted_date_budget`,
    sum(i.abc * i.qty) AS 'abc',
    emp.FIRST_M,
    emp.MIDDLE_M,
    emp.LAST_M
    FROM `pr`
     LEFT JOIN pr_items i on pr.pr_no = i.pr_no
     LEFT JOIN tblemployeeinfo emp on pr.received_by = emp.EMP_N
    WHERE pr.pr_no= '$pr_no'";
    $query = mysqli_query($this->conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
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
      $type = $row['type'];

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
      // TYPE
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
      // STATUS
      if ($row['stat'] == 1) {
        $stat = '<span class="label label-primary label2" style = "width:250%!important;">Submitted</span>';
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
      $data = [
        'pr_no' => $row['pr_no'],
        'office' => $office,
        'pr_date' => date('F d, Y', strtotime($row['pr_date'])),
        'target_date' => date('F d, Y', strtotime($row['target_date'])),
        'type' => $type,
        'purpose' => $row['purpose'],
        'unit' => $row['unit'],
        'qty' => $row['qty'],
        'abc' => $row['abc'],
        'received_by' => $row['FIRST_M'] . ' ' . $row['MIDDLE_M'] . ' ' . $row['LAST_M'],
        'status' => $stat
      ];
    }
    return $data;
  }
  public function view_pr_items($pr_no)
  {
    $sql = "SELECT pr.id,item.item_unit_title, pr.description, app.procurement,pr.unit,pr.qty,pr.abc 
    FROM pr_items pr 
    LEFT JOIN app on app.id = pr.items 
    LEFT JOIN item_unit item on item.id = pr.unit
     WHERE pr_no = '$pr_no'";
    $query = mysqli_query($this->conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {
     $total = number_format($row['qty']*$row['abc'],2);

      $data[] = [
        'id' => $row['id'],
        'items' => $row['procurement'],
        'description' => $row['description'],
        'unit' => $row['item_unit_title'],
        'qty' => $row['qty'],
        'abc' => $row['abc'],
        'total' => $total
      ];
    }
    return $data;
  }
}
