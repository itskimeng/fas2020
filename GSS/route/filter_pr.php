  <?php
$filter = ($_GET['office'] == '') ? 'ALL' :$_GET['office'];
// $type = ($_GET['type'] == '') ? 'ALL' :$_GET['type'];

$result = fetchEvents($filter);
echo $result;

function fetchEvents($filter='ALL',$type='ALL') {
  if($filter == 16)
  {
    $filter = 'FAD';
  }else if($filter == 17)
  {
    $filter = 'LGCDD';
  }else if($filter == '18'){
    $filter = 'LGMED';
  }else if($filter == 19)
  {
    $filter = 'BATANGAS';
  }else if($filter == 20)
  {
    $filter = 'CAVITE';
  }else if($filter == 23)
  {
    $filter = 'RIZAL';
  
  }else if($filter == 24)
  {
    $filter = 'LUCENA CITY';
  }else if($filter == 21)
  {
    $filter = 'LAGUNA';
  }

    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $data = [];
    if($filter == '112')
    {
      $sql = "SELECT  pr.id as id,
            pr.pmo as pmo,
pr.stat as stat,
      pmo.pmo_title as 'pmo_title',
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
      pr.budget_availability_status as 'budget_availability_status' FROM pr   inner join pmo on pr.pmo = pmo.id  where YEAR(pr_date) = '2022' order by pr.pr_no desc ";

    }else{
      $sql = "SELECT  pr.id as id,
      pr.pmo as pmo,
      pr.stat as stat,

      pmo.pmo_title as 'pmo_title',
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
      pr.budget_availability_status as 'budget_availability_status' FROM pr    inner join pmo on pr.pmo = pmo.id  where YEAR(pr_date) = '2022'  and  pr.pmo = '".$filter."'  order by pr.pr_no desc ";

    }
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {     
        $id = $row["id"];
        $pr_no = $row["pr_no"];
        $office = $row['pmo_title'];
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
         if($row['stat'] == 1)
         {
           $stat = '<span class="label label-primary label2">Submitted</span>';

         }
         if($row['stat'] == 2)
         {
           $stat = '<span class="label label-success label2">Received</span>';


         }
         if($row['stat'] == 3)
         {
           $stat = '<span class="label label-warning label2">Processing</span>';
         }
         if($row['stat'] == 4)
         {
           $stat = '<span class="label label-danger label2">Completed</span>';

         }
        $data[] = [
            'id' => $id,
            'pr_no' => $pr_no,
            'pmo' => $pmo,
            'division' => $office,
            'type' => $type,
            'canceled' => $canceled,
            'received_by' => $received_by1,
            'submitted_by' => $submitted_by1,
            'submitted_date' => $submitted_date1,
            'received_date' => $received_date1,
            'purpose' => $purpose,
            'pr_date' => $pr_date1,
            'type' => $type,
            'target_date' => $target_date11,
            'submitted_date_to_budget' => $submitted_date_budget,
            'budget_availability_status' => $budget_availability_status,
            'status' => $stat
        ];

    }

   
    return json_encode($data);
}
