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
        $sql = "SELECT * FROM `tblpersonneldivision`";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $office = $row['DIVISION_M'];

            $data[] = [
                'id' => $row['DIVISION_N'],
                'office' => $office,
            ];
        }
        return $data;
    }
    public function fetchPRStatusCount($status = ['1', '2', '3', '4', '5']) { 
        $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
        $options = [];
        foreach ($status as $stat) {
            $sql = "SELECT COUNT(*) as count FROM pr where stat = '".$stat."' and YEAR(pr_date) = '2022'";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);
            $options[$stat] = $row['count'];
        }

        return $options;  
    }
    public function fetchPRInfo($office)
    {
        if($office == 16)
        {
          $office = 'FAD';
        }else if($office == 17)
        {
          $office = 'LGCDD';
        }else if($office == '18'){
          $office = 'LGMED';
        }else if($office == 19)
        {
          $office = 'BATANGAS';
        }else if($office == 20)
        {
          $office = 'CAVITE';
        }else if($office == 23)
        {
          $office = 'RIZAL';
        
        }else if($office == 24)
        {
          $office = 'LUCENA CITY';
        }else if($office == 21)
        {
          $office = 'LAGUNA';
        }
        $sql = "SELECT * FROM pr
        inner join pmo on pr.pmo = pmo.pmo_title
        where YEAR(pr_date) = '2022' and pmo = '$office'  order by pr.id desc";

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
                $stat = '<span class="label label-primary label2" style = "width:250%!important;">Submitted</span>';

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
                'office' => $office,
                'status' => $stat

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
            $str = str_replace($year."-".$current_month."-", "", $row['count_r']);
            if($row['count_r'] == 1)
            {
            $idGet = (int)$str + 1;
            $pr_no = $year . '-' . $current_month . '-' . '0000' . $idGet;

            }else if ($row['count_r'] <= 99){
            $idGet = (int)$str + 1;

              $pr_no = $year . '-' . $current_month . '-' . '000' . $idGet;
            }else{
                $idGet = (int)$str + 1;

                $pr_no = $year . '-' . $current_month . '-' . '00' . $idGet;
              
            }
            $data = [    
            'pr_no' => $pr_no            
              ];
        }
        return $data;
    }
    public function getItems($pmo,$pr_no)
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
    public function insertPR($pr_no,$pmo,$purpose,$d1,$type,$d2)
    {
        $sql ="INSERT INTO pr(pr_no,pmo,purpose,pr_date,type,target_date,stat) VALUES('$pr_no','$pmo','$purpose','$d1','$type','$d2',1)"; 
        echo $sql;       
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
  
}
