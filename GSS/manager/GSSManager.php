<?php
class GSSManager  extends Connection
{
    public $conn = '';
    public $default_table = 'app';
    public $default_year = '2022';





    function __construct()
    {
        if (!isset($this->db)) {
            $conn = new mysqli($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Database is not connected: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

    public function getPMO()
    {
        $sql = "SELECT id, pmo_title from pmo";
        $query = $this->db->query($sql);
        $data = [];
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $office = $row['pmo_title'];

            $data[] = [
                'id' => $row['id'],
                'office' => $office,
                'pmo_contact_person' => $row['pmo_contact_person'],
                'position' => $row['position'],
            ];
        }
        return $data;
    }
    public function fetch()
    {
        $sql = "SELECT 
        app.sn as sn,
        app.code as code,
        mop.mode_of_proc_title as mode
        FROM $this->default_table  
        LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
        WHERE app_year = $this->default_year";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'stock_no'  => $row['sn'],
                'code'      => $row['code'],
                'mode'      => $row['mode']
            ];
        }
        return $data;
    }
    public function fetchAPP($admins)
    {
        if (in_array($_SESSION['username'], $admins)) {
            $sql = "SELECT DISTINCT app.id,app.app_price,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,app.pmo_id,sof.source_of_funds_title 
            FROM $this->default_table  
            LEFT JOIN item_category ic on ic.id = app.category_id 
            LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
            LEFT JOIN pmo on pmo.id = app.pmo_id 
            LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
            where app_year in (2020,2021,2022)
            ORDER BY app.app_year desc";
        } else {
            $sql = "SELECT DISTINCT app.id,app.app_price,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,app.pmo_id,sof.source_of_funds_title 
            FROM $this->default_table  
            LEFT JOIN item_category ic on ic.id = app.category_id 
            LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
            LEFT JOIN pmo on pmo.id = app.pmo_id 
            LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
            where app_year in ($this->default_year)
            ORDER BY app.app_year desc";
        }

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo_id'];
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
                'id'  => $row['id'],
                'sn'  => $row['sn'],
                'code'      => $row['code'],
                'year'      => $row['app_year'],
                'code'      => $row['mode'],
                'category'      => $row['item_category_title'],
                'procurement'      => $row['procurement'],
                'pmo_title'      => $office,
                'mode'      => $row['mode_of_proc_title'],
                'source'      => $row['source_of_funds_title'],
                'app_price' => $row['app_price']
            ];
        }
        return $data;
    }


    public function setCategory()
    {
        $sql = "SELECT 
        app.category_id,
        ic.item_category_title as category
        FROM $this->default_table  
        LEFT JOIN item_category ic on ic.id = app.category_id 
        GROUP BY category
        ORDER BY category_id
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['category_id']] = $row['category'];
        }
        return $data;
    }


    public function setPMO()
    {
        $sql = "SELECT DIVISION_N, DIVISION_M FROM tblpersonneldivision where DIVISION_M in ('FAD','LGMED','LGCDD','ORD','CAVITE','LAGUNA','BATANGAS','RIZAL','QUEZON', 'LUCENA CITY')";

        $getQry = $this->db->query($sql);
        $data = [];


        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['DIVISION_N']] = $row['DIVISION_M'];
        }


        return $data;
    }

    public function setPages()
    {
        $pages = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return $pages;
    }
    public function setSFund()
    {
        $fund =
            [
                'Regular, Local and Trust Fund',
                'Local Fund',
                'Regular Fund'
            ];
        return $fund;
    }

    public function getItemUnit()
    {
        $sql = "SELECT id, item_unit_title from item_unit";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['item_unit_title'];
        }
        return $data;
    }
    public function getAPPItemList($default_year)
    {
        $sql = "SELECT id,price,sn,price,procurement,unit_id,app_year from app where app_year = $default_year";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['procurement'];
        }



        return $data;
    }


    public function setStockNo()
    {
        $sql = "SELECT max(id)+1 as sn FROM app order by id desc limit 1";
        $getQry = $this->db->query($sql);
        $data = '';
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data =  $row['sn'];
        }
        return $data;
    }

    public function checkDuplicate($stock_val)
    {
        $sql = "SELECT sn FROM app where sn = '$stock_val' ";
        $getQry = $this->db->query($sql);
        $data = true;
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data =  true;
        } else {
            $data = false;
        }

        return $data;
    }


    // pr

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
        pr.submitted_date_gss as 'submitted_date_gss',
        pr.submitted_by_gss as 'submitted_by_gss',
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

        $query = $this->db->query($sql);
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
            $submitted_date1 = ($submitted_date == '' || $submitted_date == null) ? '' : date('F d, Y', strtotime($submitted_date));;
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

            if ($row['stat'] == 0) {
                $stat = '<div class="btn small-box bg-red zoom" style="text-align:left;">
                <div class="inner">
                    <b>DRAFT</b>
                        <br><small>' . $row['submitted_by'] . '<br> ' . date('F d, Y', strtotime($row['submitted_date'])) . '</small>
                </div>
                <div class="icon">
                </div>
                <button class="btn btn-flat" style="width:100%;background-color:#b71c1c;" id="showModal"  value= "'.$row['pr_no'].'" class="small-box-footer"><i class="fa fa-plus"></i> View Status History
                </button>
            </div>';
            }
            if ($row['stat'] == 1) {
                $stat = '<div class="btn small-box bg-red zoom" style="text-align:left;">
                            <div class="inner">
                                <b>SUBMITTED TO BUDGET</b>
                                    <br><small>' . $row['submitted_by'] . '<br> ' . date('F d, Y H:i:a', strtotime($row['submitted_date'])) . '</small>
                            </div>
                            <div class="icon">
                            </div>
                            <button class="btn btn-flat" style="width:100%;background-color:#b71c1c;" id="showModal"  value= "'.$row['pr_no'].'" class="small-box-footer"><i class="fa fa-plus"></i> View Status History
                            </button>
                        </div>';
            }
            if ($row['stat'] == 2) {
                $stat = '<div class="kv-attribute"><b>RECEIVED BY BUDGET</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 3) {
                $stat = '<div class="btn small-box bg-red zoom" style="text-align:left;">
                <div class="inner">
                    <b>SUBMITTED TO GSS</b>
                        <br><small>' . $row['submitted_by_gss'] . '<br> ' . date('F d, Y h:i:A', strtotime($row['submitted_date_gss'])) . '</small>
                </div>
                <div class="icon">
                </div>
                <button class="btn btn-flat" style="width:100%;background-color:#b71c1c;" id="showModal"  value= "'.$row['pr_no'].'" class="small-box-footer"><i class="fa fa-plus"></i> View Status History
                </button>
            </div>';
            }
            if ($row['stat'] == 4) {
                $stat = '<div class="kv-attribute"><b>RECEIVED BY GSS</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 5) {
                $stat = '<div class="kv-attribute"><b>WITH RFQ</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 6) {
                $stat = '<div class="kv-attribute"><b>POSTED IN PHILGEPS</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 7) {
                $stat = '<div class="kv-attribute"><b>AWARDED</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 8) {
                $stat = '<div class="kv-attribute"><b>OBLIGATED</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 9) {
                $stat = '<div class="kv-attribute"><b>DELIVERED BY SUPPLIER</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 10) {
                $stat = '<div class="kv-attribute"><b>RECEIVED BY</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 11) {
                $stat = '<div class="kv-attribute"><b>DISBURSED</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
            }
            if ($row['stat'] == 12) {
                $stat = '<div class="kv-attribute"><b>MADE PAYMENT WITH SUPPLIER</b><br><small>' . $submitted_by1 . '<br> ' . $submitted_date1 . '</small></div>';
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
                'is_budget' => $row['submitted_date'],
                'is_gss' => $row['submitted_date_gss'],
                'total_abc' => '₱' . number_format($row['total'], 2),
                'urgent' => $row['urgent']

            ];
        }
        return $data;
    }

    public function fetchPrNo($year)
    {
        $sql = "SELECT count(*) as count_r FROM pr WHERE YEAR(pr_date) = '$year' order by id desc; ";
        $query = $this->db->query($sql);
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
        $query = $this->db->query($sql);
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
                $stat = '<span class="label label-primary label2" style = "width:250%!important;">Submitted</small></div>';
            }
            if ($row['stat'] == 2) {
                $stat = '<span class="label label-success label2">Received</small></div>';
            }
            if ($row['stat'] == 3) {
                $stat = '<span class="label label-warning label2">Processing</small></div>';
            }
            if ($row['stat'] == 4) {
                $stat = '<div class="kv-attribute"><b>Completed</small></div>';
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
        $query = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $total = number_format($row['qty'] * $row['abc'], 2);

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
