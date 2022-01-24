  <?php
$office = ($_GET['office'] == '') ? 'ALL' :$_GET['office'];
// $type = ($_GET['type'] == '') ? 'ALL' :$_GET['type'];

$result = fetchEvents($office);
echo $result;

function fetchEvents($filter='ALL',$type='ALL') {

    $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
    $data = [];
    $sql = "SELECT * FROM pr";
    
    
        $sql .= " where YEAR(pr_date) = '2022' and pmo = '".$filter."'  ";
  

    $sql .= " order by pr.pr_no desc"; 
   
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
