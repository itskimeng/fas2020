<?php

class RFQManager  extends Connection
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
    public function fetchPRStatusCount($status = ['3', '4', '5', '7', '9'])
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
    public function fetch($status)
    {
        $sql = "SELECT
                pr.`id`,
                pr.`pr_no`,
                pr.`pmo`,
                pr.`pr_date`,
                pr.`action_date`,
                sum(i.qty * i.abc) as ABC
                FROM pr
                LEFT JOIN pr_items i on pr.pr_no = i.pr_no
                -- where  stat  = '$status' and YEAR(date_added) = '2022' 
                where stat IN ('4','2','1','0') AND YEAR(date_added) = '2022' 
                GROUP BY pr.pr_no
                order by pr.id desc";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
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
                'pr_date'       => date('F d, Y H:i:s A', strtotime($row['action_date'])),
                'target_date'   => date('F d, Y', strtotime($row['target_date'])),
                'office'        => $office,
                'type'          => $type,
                'stat'          => $row['stat'],
                'amount'        => '₱' . number_format($row['ABC'], 2)

            ];
        }
        return $data;
    }
    public function fetchRFQ()
    {

        $sql = "SELECT
        r.rfq_no AS 'rfq_no',
        r.id AS 'rfq_id',
        r.pr_id AS 'pr_id',
        r.rfq_date AS 'rfq_date',
        pr.pr_no AS 'pr_no',
        pr.pmo as 'pmo',
        pr.id AS 'pr_id',
        pr.pr_date AS 'pr_date',
        pr.target_date AS 'target_date',
        pr.stat AS 'status',
        pr.stat,
        pr.purpose AS 'purpose',
        pr.submitted_date as 'submitted_date',
        pr.action_date as 'action_date',
        pt.type AS 'type',
        po.po_no AS 'po_no',
        po.po_date AS 'po_date',
        ab.abstract_no AS 'abstract_no' ,
        ab.date_created as 'abstract_date',
        m.mode_of_proc_title,
        i.qty,
        i.abc,
        sum(i.qty*abc) as 'amount',
        emp.UNAME as 'action_officer',
        ps.REMARKS AS 'status'
     

        FROM
            pr
            LEFT JOIN tblemployeeinfo as emp ON pr.action_officer = emp.EMP_N 
            LEFT JOIN tbl_pr_status as ps on ps.id = pr.stat
            LEFT JOIN tbl_pr_type pt ON pr.type = pt.id
            LEFT JOIN rfq r ON r.pr_id = pr.id
            LEFT JOIN pr_items i on i.pr_id = pr.id
            LEFT JOIN rfq rr on rr.pr_id = i.pr_id
            LEFT JOIN abstract_of_quote ab ON ab.rfq_id = r.id 
            LEFT JOIN po ON po.rfq_id = r.id
            LEFT JOIN mode_of_proc m on m.id = r.rfq_mode_id
            -- LEFT JOIN supplier_quote sq on r.id = sq.rfq_id
            -- LEFT JOIN supplier s on sq.supplier_id = s.id

            where 
            YEAR(date_added) = '$this->default_year' and 
            pr.stat != 16 and 
            pr.stat != 3 and 
            pr.stat != 0 and
            pr.stat != 1 and 
            pr.stat != 2 and
            pr.stat != 17
            group by i.pr_id
            order by pr.pr_no desc
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $submitted_by1 = $row["action_officer"];
            $submitted_date = $row["submitted_date"];


            if ($row['rfq_date'] == '' || $row['rfq_date'] == null) {
                $rfq_date = '';
            } else {
                $rfq_date = date('F d, Y', strtotime($row['rfq_date']));
            }
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
            $action_date = ($row['action_date'] == '') ? '' :  date('F d, Y h:i:s A', strtotime($row['action_date']));

                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' .$action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            
          
            if($row['stat'] == 9)
            {
                $paid = ' <div class="btn-group">
                <button class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu <span class="caret"></span></button>
                <ul id="w2" class="dropdown-menu scrollable-menu pull-right">
                    <li><a href="GSS/route/post_payment.php?pr_no='.$row['pr_no'].'&pr_id='.$row['pr_id'].'&id='.$row['rfq_id'].'" tabindex="-1"><span class="fa fa-money"></span> Delivered by supplier</a></li>
                    <li><a href="#" tabindex="-1"><span class="fa fa-paper-plane-o"></span>Received by end-user </a></li>
                </ul>
            </div>';
            }else{
                $paid = ' <div class="btn-group">
                <button class="btn btn-sm btn-primary dropdown-toggle" disabled data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu <span class="caret"></span></button>
                <ul id="w2" class="dropdown-menu scrollable-menu pull-right">
                <li><a href="GSS/route/post_payment.php?pr_no='.$row['pr_no'].'&pr_id='.$row['pr_id'].'&id='.$row['rfq_id'].'" tabindex="-1"><span class="fa fa-money"></span> Delivered by supplier</a></li>
                <li><a href="#" tabindex="-1"><span class="fa fa-paper-plane-o"></span> Delivered to Supplier</a></li>
                </ul>
            </div>';
            }
          
            $data[$row['pr_id']] = [
                'rfq_no'            => $row['rfq_no'],
                'pr_id'             => $row['pr_id'],
                'abstract_no'       => $row['abstract_no'],
                'abstract_date'     => date('F d, Y', strtotime($row['abstract_date'])),
                'po_no'             => $row['po_no'],
                'po_date'           => date('F d, Y', strtotime($row['po_date'])),
                'purpose'           => $row['purpose'],
                'rfq_id'            => $row['rfq_id'],
                'pr_no'             => $row['pr_no'],
                'pr_id'             => $row['pr_id'],
                'rfq_date'          => $rfq_date,
                'pr_date'           => date('F d, Y', strtotime($row['pr_date'])),
                'target_date'       => date('F d, Y', strtotime($row['target_date'])),
                'stat'              => $stat,
                'mode'              => $row['mode_of_proc_title'],
                'qty'               => $row['qty'],
                'abc'               => $row['abc'],
                'amount'            => $row['amount'],
                'office'            => $row['pmo'],
                'division'          => $office,
                'type'              => $row['type'],
                'supplier_winner'   => $row['supplier_title'],
                'paid'              => $paid
                // 'is_awarded'        => $row['is_awarded'],
                // 'urgent'        => $row['urgent'],
            ];
        }
        return $data;
    }

    public function qty($rfq_no)
    {

        $sql = "SELECT i.qty,i.abc

        FROM
        `pr_items` 
        where rr.rfq_no = '$rfq_no' 
        GROUP BY sq.id";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {

            $data[$row['supplier_id']][] =
                [
                    'id' => $row['supplier_id'],
                    'price_per_unit' => $row['price_per_unit'],
                    'winner'         => $row['winner']
                ];
        }
        return $data;
    }


























    public function generateRFQNo()
    {

        $sql = "SELECT COUNT(DISTINCT(rfq_no)) as 'count_r' FROM `rfq` where YEAR(rfq_date) = '2022'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $str = str_replace("2022" . "-", "", $row['count_r']);

            if ($row['count_r'] == 1) {
                $idGet = (int)$str + 1;
                $rfq = $year  . '-' . '00' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $rfq = $year  . '-' . '00' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $rfq = $year  . '-' . '00' . $idGet;
            }

            $data = [
                'rfq_no' => $rfq,
                'id'    =>  $row['count_r'] + 1
            ];
        }
        return $data;
    }
    public function fetchRFQID($rfq_no)
    {
        $sql = "SELECT
            rfq.`id` as 'rfq_id'
        FROM
        `rfq`
        WHERE rfq_no  ='$rfq_no'";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'id'       => $row['rfq_id'],
            ];
        }
        return $data;
    }
    public function fetchPRID($pr_no)
    {
        $sql = "SELECT
            pr.`id` as 'pr_id'
        FROM
        `pr`
        WHERE pr_no  ='$pr_no'";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'id'       => $row['pr_id'],
            ];
        }
        return $data;
    }
    public function generatePONo()
    {
        $sql = "SELECT count(*) as 'count' FROM `po` where YEAR(noa_date) = '$this->default_year'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $str = str_replace("2022" . "-", "", $row['count']);

            if ($row['count'] == 1) {
                $idGet = (int)$str + 1;
                $po = $year  . '-' . date('m') . '-0000' . $idGet;
            } else if ($row['count'] <= 99) {
                $idGet = (int)$str + 1;

                $po = $year  . '-' . date('m') . '-000' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $po = $year  . '-' . date('m') . '-00' . $idGet;
            }

            $data = [
                'po_no' => $po
            ];
        }
        return $data;
    }
    public function generateAbstractNo()
    {
        $sql = "SELECT COUNT(*) as 'abstract_no' from abstract_of_quote";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $abstract_no = $row['abstract_no'];
            if ($abstract_no == 0) {
                $count = (int)$abstract_no + 1;
                $abstract_no = '2022' . '-00' . $count;
            } else if ($abstract_no <= 10) {
                $count = (int)$abstract_no + 1;

                $abstract_no = '2022' . '-00' . $count;
            } else {
                $count = (int)$abstract_no + 1;

                $abstract_no = '2022' . '-00' . $count;
            }

            $data = [
                'abstract_no' => $abstract_no
            ];
        }

        return $data;
    }
    public function fetchSupplier()
    {
        $sql = "SELECT id, supplier_title, supplier_address, contact_person FROM supplier ORDER BY supplier_title ASC";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id' => $row['id'],
                'supplier' => $row['supplier_title'],
                'supplier_address' => $row['supplier_address'],
                'contact_person' => $row['contact_person'],
            ];
        }


        return $data;
    }
    public function fetchSuppAward()
    {
        $sql = "SELECT id, supplier_title, supplier_address, contact_person FROM supplier ORDER BY supplier_title ASC";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['supplier_title'];
        }


        return $data;
    }
    function fetchMultiplePRtoRFQ($rfq_no)
    {
        if(isset($rfq_no))
        {
            $where = "where rfq_no = '$rfq_no'";
        }else{
            $where = '';
        }
        $sql = "SELECT rfq_no,COUNT(*) as multiple
        FROM rfq
        ".$where."
        GROUP BY rfq_no
        HAVING COUNT(*) > 1";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $is_multiple = ($row['rfq_no'] == '' || $row['rfq_no'] == null) ? true : 1;
            $data = [
                'is_multiple' => $is_multiple,
                'rfq_no'      => $row['rfq_no']
            ];
        }
        return $data;
    }
    public function fetchPRInfo($id)
    {

        $sql = "SELECT  
        pr.id as id,
        pr.pmo as pmo,
        pr.stat as stat,
        pr.pr_no as 'pr_no',
        pr.canceled as 'canceled',
        pr.submitted_by as 'submitted_by',
        pr.submitted_date as 'submitted_date',
        pr.received_date as 'received_date',
        pr.purpose as 'purpose',
        pr.pr_date as 'pr_date',
        pr.type as 'type',
        pr.target_date as 'target_date',
        pr.submitted_date_budget as 'submitted_date_budget',
        pr.budget_availability_status as 'budget_availability_status' ,
        pr.stat as 'stat',
        ps.REMARKS as 'status',
        pr.remarks,
        pr.is_urgent,
        pr.reason_gss,
        r.rfq_no,
        aq.abstract_no,
        po.po_no,
        s.supplier_title,
        emp.UNAME as 'action_officer',
        pr.action_date,
        sum(items.abc*items.qty) as 'total_abc'
  
        FROM pr  
            LEFT JOIN tblemployeeinfo as emp ON pr.action_officer = emp.EMP_N 
            LEFT JOIN pr_items as items ON pr.id = items.pr_id
            LEFT JOIN tbl_pr_status as ps on ps.id = pr.stat
            LEFT JOIN po as p on p.pr_id = pr.id
            LEFT JOIN rfq as r on r.pr_id = pr.id
            LEFT JOIN supplier_quote as sq on sq.rfq_id = r.id
            LEFT JOIN supplier as s on s.id = sq.supplier_id
            LEFT JOIN abstract_of_quote as aq on aq.rfq_id = r.id
            LEFT JOIN po as po on po.rfq_id = r.id


            where YEAR(pr_date) = '2022'  and 
            r.rfq_no='$id' and 
            pr.stat != '17'
            GROUP BY pr.pr_no
            order by pr.id desc ";
                // -- pr.submitted_date_budget as 'submitted_date_budget',
                // -- pr.budget_availability_status as 'budget_availability_status',
                // -- pr.availability_code as 'availability_code',
                //   -- pr.canceled as 'canceled',
                // -- pr.received_by as 'received_by',
                // -- pr.submitted_by as 'submitted_by',
                // -- pr.submitted_date as 'submitted_date',
                // -- pr.submitted_date_gss as 'submitted_date_gss',
                // -- pr.submitted_by_gss as 'submitted_by_gss',
                // -- pr.received_date as 'received_date',

        $query = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $pr_no = $row["pr_no"];
            $submitted_by1 = $row["action_officer"];
            $received_date = $row["received_date"];
            $purpose = $row["purpose"];
            $pr_date = $row["pr_date"];
            $pr_date1 = date('F d, Y', strtotime($pr_date));
            $type = $row["type"];
            $target_date = $row["target_date"];
            $target_date11 = date('F d, Y', strtotime($target_date));
            $office = $row['pmo'];
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
            }


            if ($type == "0") {
                $type = "";
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
            $a = '';
            
        
                $action_date = ($row['action_date'] == '') ? '' :  date('F d, Y h:i:s A', strtotime($row['action_date']));

            if ($row['stat'] == 0) {
               

                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' .$action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 1) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 2) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 3) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 4) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 5) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 6) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 7) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 8) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 9) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 10) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 11) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 12) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small>
                </div>';
            }
            if ($row['stat'] == 16) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small><br>
                   
                </div>';
            }
            if ($row['stat'] == 17) {
                $stat = '
                <div class="kv-attribute">
                    <b><span id="showModal" data-value="'.$row['pr_no'].'" data-id="'.$row['pr_id'].'" data-value="'.$row['pr_no'].'" data-id="'.$row['id'].'" class="badge" style="background-color: #AD1457;width:100%;padding:9px;">' . $row['status'] . '</span></b><br>
                    <input type="hidden" id="pr_no" value="' . $row['pr_no'] . '" />
                    <small>' . $action_date . '<br><b>~' . $submitted_by1 . '~</b></small><br>
                   
                </div>';
            }
            if($row['total_abc'] == '')
            {
                $total_abc = '';
            }else{
                $total_abc = '₱'.$row['total_abc'];
            }
            $data[] = [
                'id' => $id,
                'po' => $row['po_no'],
                'rfq_no' => $row['rfq_no'],
                'pr_no' => $pr_no,
                'division' => $office,
                'type' => $type,
                'supplier_winner' => $row['supplier_title'],
                'abstract_no' => $row['abstract_no'],
                'po_no' => $row['po_no'],
                'submitted_by' => $submitted_by1,
                'submitted_date' => date('F d, Y', strtotime($row['pr_date'])),
                // 'received_date' => $received_date1,
                'purpose' =>  $purpose,
                'pr_date' => $pr_date1,
                'type' => $type,
                'target_date' => $target_date11,
                // 'submitted_date_to_budget' => $submitted_date_budget,
                // 'budget_availability_status' => $budget_availability_status,
                // 'office' => $office,
                'status' => $stat,
                // 'is_budget' => $row['submitted_date'],
                'is_gss' => $row['submitted_date_gss'],
                'total_abc' => $total_abc,
                'urgent' => $row['is_urgent'],
                'stat'   => $row['stat'],
                'curr_stat'=> $row['status'],
                'reason'   => $row['reason_gss'],
                'remarks' => $row['remarks']

            ];
        }
        return $data;
    }
    public function fetchRFQReportDetails($rfq_no)
    {
        $sql =  "SELECT
        rfq.id,
        rfq.rfq_mode_id,
        rfq.quotation_date,
        rfq.rfq_date,
        rfq.rfq_no,
        rfq.purpose,
        rfq.pmo_id,
        rfq.pr_no,
        rfq.pr_received_date,
        rfq.rfq_mode_id,
        m.mode_of_proc_title,
        app.id
        FROM
            rfq
        LEFT JOIN pr ON pr.id = rfq.pr_id
        LEFT JOIN pr_items ON pr_items.pr_id = pr.id
        LEFT JOIN app ON app.id = pr_items.items
        LEFT JOIN mode_of_proc m on m.id = rfq.rfq_mode_id
        WHERE
                rfq.id = '$rfq_no'";
                echo $sql;

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

            $pmo = $office;
            $rfq_no = $row['rfq_no'];
            $rfq_mode_id = $row['rfq_mode_id'];
            $rfq_date = $row['rfq_date'];
            $quotation_date = $row['quotation_date'];
            $purpose = $row['purpose'];
            $pr_date = $row['pr_received_date'];

            if ($rfq_mode_id == 1) {
                $rfq_mode_id = "Small Value Procurement";
            }
            if ($rfq_mode_id == 2) {
                $rfq_mode_id = "Shopping";
            }
            if ($rfq_mode_id == 4) {
                $rfq_mode_id = "NP Lease of Venue";
            }
            if ($rfq_mode_id == 5) {
                $rfq_mode_id = "Direct Contracting";
            }
            if ($rfq_mode_id == 6) {
                $rfq_mode_id = "Agency to Agency";
            }
            if ($rfq_mode_id == 7) {
                $rfq_mode_id = "Public Bidding";
            }
            if ($rfq_mode_id == 8) {
                $rfq_mode_id = "Not Applicable N/A";
            }
            $data = [
                'rfq_no' => $rfq_no,
                'mode'   => $row['mode_of_proc_title'],
                'mode_id' => $row['rfq_mode_id'],
                'rfq_date'  => $rfq_date,
                'pmo'       => $office
            ];
        }
        return $data;
    }
    public function fetchRFQReportDetailsMultiple($id)
    {
        $sql =  "SELECT
                rfq.id as 'rfq_id',
                rfq.rfq_mode_id,
                rfq.quotation_date,
                rfq.rfq_date,
                rfq.rfq_no,
                rfq.purpose,
                rfq.pmo_id,
                rfq.pr_no,
                rfq.pr_received_date,
                app.mode_of_proc_id,
                app.id,
                pi.abc,
                pi.qty
                                FROM
                rfq
                LEFT JOIN pr ON pr.id = rfq.pr_id
                LEFT JOIN pr_items pi ON pi.pr_id = pr.id
                LEFT JOIN app ON app.id = pi.items
                WHERE
                rfq.id = '$id'";

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

            $pmo = $office;
            $rfq_no = $row['rfq_no'];
            $rfq_mode_id = $row['mode_of_proc_id'];
            $rfq_date = $row['rfq_date'];
            $quotation_date = $row['quotation_date'];
            $purpose = $row['purpose'];
            $pr_date = $row['pr_received_date'];

            if ($rfq_mode_id == 1) {
                $rfq_mode_id = "Small Value Procurement";
            }
            if ($rfq_mode_id == 2) {
                $rfq_mode_id = "Shopping";
            }
            if ($rfq_mode_id == 4) {
                $rfq_mode_id = "NP Lease of Venue";
            }
            if ($rfq_mode_id == 5) {
                $rfq_mode_id = "Direct Contracting";
            }
            if ($rfq_mode_id == 6) {
                $rfq_mode_id = "Agency to Agency";
            }
            if ($rfq_mode_id == 7) {
                $rfq_mode_id = "Public Bidding";
            }
            if ($rfq_mode_id == 8) {
                $rfq_mode_id = "Not Applicable N/A";
            }

            $data[] = [
                'id'        => $row['rfq_id'],
                'rfq_no'        => $rfq_no,
                'mode'          => $rfq_mode_id,
                'rfq_date'      => $rfq_date,
                'pmo'           => $office,
                'pr_no'            => $row['pr_no']
            ];
        }

        return $data;
    }
    public function fetchRFQAmount($rfq_no)
    {
        $sql = "SELECT sum(pi.abc * pi.qty) as 'amount' FROM
        `rfq`
        LEFT JOIN pr on pr.id = rfq.pr_id
        LEFT JOIN pmo on pmo.id = pr.pmo
        LEFT JOIN mode_of_proc `mode` on mode.id = rfq.rfq_mode_id
        LEFT JOIN pr_items pi on pi.pr_id = pr.id
        WHERE
        rfq.rfq_no ='$rfq_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $total_amount = $row['amount'];
            $data = [
                'total_abc' => $total_amount
            ];
        }

        return $data;
    }
    public function getchRFQItemSummary($pr_no)
    {
        $sql = "SELECT SUM(pr.qty * pr.abc) AS totalABC FROM pr_items pr LEFT JOIN app ON app.id = pr.items WHERE pr_no = '$pr_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $total_amount = $row['totalABC'];
            $data = [
                'total_amount' => $total_amount
            ];
        }

        return $data;
    }
    public function getchMultiRFQItemSummary($rfq_no)
    {
        $sql = "SELECT SUM(pi.qty * pi.abc) AS totalABC,rfq.purpose FROM rfq LEFT JOIN pr ON pr.id = rfq.pr_id LEFT JOIN pr_items pi ON pi.pr_id = pr.id LEFT JOIN app ON app.id = pi.items where rfq.rfq_no= '$rfq_no'";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $total_amount = $row['totalABC'];
            $data = [
                'total_amount' => $total_amount,
                'purpose' => $row['purpose']
            ];
        }

        return $data;
    }
    public function fetchPOSdata($supp_id)
    {
        $sql = "SELECT * FROM supplier WHERE id = '$supp_id'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $supName = $row['supplier_title'];
            $supContact = $row['contact_person'];
            $supAddress = $row['supplier_address'];
            $data = [
                'supplier_name' => $supName,
                'supplier_contact_person' => $supContact,
                'supplier_address' => $supAddress
            ];
        }

        return $data;
    }
    public function fetchABSReq()
    {
        $sql = "SELECT * FROM abstract_eligibility_requirements";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id' => $row['ID'],
                'content' => $row['CONTENT'],
                'remarks' => $row['REMARKS']
            ];
        }

        return $data;
    }
    public function fetchLatestRFQID()
    {
        $sql = "SELECT id FROM rfq order by id desc limit 1";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $rfq_id = $row['id'] + 1;
            $data = [
                'rfq_id' => $rfq_id
            ];
        }

        return $data;
    }
    public function checkRFQ($rfq_no)
    {
        $sql = "SELECT id,is_awarded FROM rfq where rfq_no = '$rfq_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $is_awarded = $row['is_awarded'];
            $data = [
                'rfq_awarded' => $is_awarded
            ];
        }
        return $data;
    }
    public function fetchRFQDetails($id)
    {
        $sql = "SELECT
                pr.id,
                item.item_unit_title,
                app.procurement,
                app.id AS item_id,
                pr.unit,
                pr.qty,
                pr.abc,
                pr.description,
                rfq.rfq_date,
                rfq.rfq_no,
                rfq.purpose,
                i.pmo,
                rfq.pr_no,
                rfq.pr_received_date
            FROM
                pr_items pr
            LEFT JOIN app ON app.id = pr.items
            LEFT JOIN item_unit item ON
                item.id = pr.unit
            LEFT JOIN pr i ON
                i.id = pr.pr_id
            LEFT JOIN rfq ON rfq.pr_id = i.id
            WHERE
            rfq.id = '$id' ";
        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
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
            }
            $data = [
                'id'  => $count . '.',
                'item_id'  => $row['item_id'],
                'rfq_no'  => $row['rfq_no'],
                'item'  => $row['procurement'],
                'desc'  => mb_strimwidth($row['description'], 0, 13, "..."),
                'unit'  => $row['unit'],
                'qty'  => $row['qty'],
                'cost'  => $row['abc'],
                'total'  => number_format($row['qty'] * $row['abc'], 2),
                'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
                'purpose'   => $row['purpose'],
                'office'    => $office,
                'pr_no'     => $row['pr_no'],
                'status'    => ''

            ];
            $count++;
        }
        return $data;
    }
    public function fetchRFQItems($id, $is_multiple)
    {
        if ($is_multiple == 1) {
            $where = ' rfq.rfq_no = "' . $_GET['rfq_no'] . '"';
        } else {
            $where = ' rfq.id = "' . $_GET['rfq_id'] . '"';
        }
        $sql = "SELECT
            pr.id,
            app.procurement,
            pr.description,
            pr.qty,
            pr.abc,
            item.item_unit_title,
            rfq.id AS 'rfq_id',
            app.id AS item_id,
            pr.unit,
            rfq.rfq_date,
            rfq.rfq_no,
            rfq.purpose,
            pr.pmo,
            rfq.pr_no,
            rfq.pr_received_date
        FROM
            pr_items pr
        LEFT JOIN app ON app.id = pr.items
        LEFT JOIN item_unit item ON item.id = pr.unit
        LEFT JOIN pr i ON i.id = pr.pr_id
        LEFT JOIN rfq ON rfq.pr_id = i.id
                WHERE" . $where . "";








        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
            $data[] = [
                'id'  => $count . '.',
                'item_id'  => $row['item_id'],
                'rfq_id'  => $row['rfq_id'],
                'rfq_no'  => $row['rfq_no'],
                'item'  => $row['procurement'],
                'desc'  => mb_strimwidth($row['description'], 0, 13, "..."),
                'description'  => $row['description'],
                'unit'  => $row['item_unit_title'],
                'qty'  => $row['qty'],
                'cost'  => $row['abc'],
                'total'  => $row['qty'] * $row['abc'],
                'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
                'purpose'   => $row['purpose'],
                'office'    => $office,
                'pr_no'     => $row['pr_no'],
                'status'    => ''
            ];
            $count++;
        }
        return $data;
    }

    public function fetchPPU($id)
    {
        $sql = "SELECT
        s.supplier_title,
        sq.supplier_id,
        sq.ppu as 'price_per_unit',
        sq.is_winner,
        a.procurement

        FROM
        `supplier_quote` sq
        LEFT JOIN supplier s on s.id = sq.supplier_id
        LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
        LEFT JOIN rfq r on r.id = ri.rfq_id
        LEFT JOIN app a on a.id = ri.app_id
        where sq.rfq_id = '$id'  ORDER by rfq_item_id";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'winner' => $row['is_winner'],
                'ppu' => $row['price_per_unit']
            ];
        }
        return $data;
    }

    public function fetchPRItems($pr_no)
    {


        $sql = "SELECT
            pr.id,
            app.procurement,
            pr.description,
            pr.qty,
            pr.abc,
            item.item_unit_title,
            rfq.id AS 'rfq_id',
            app.id AS item_id,
            pr.unit,
            rfq.rfq_date,
            rfq.rfq_no,
            rfq.purpose,
            pr.pmo,
            rfq.pr_no,
            rfq.pr_received_date
        FROM
            pr_items pr
        LEFT JOIN app ON app.id = pr.items
        LEFT JOIN item_unit item ON item.id = pr.unit
        LEFT JOIN pr i ON i.id = pr.pr_id
        LEFT JOIN rfq ON rfq.pr_id = i.id
                WHERE
                pr.pr_no = '" . $pr_no . "'";



        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
            $data[] = [
                'id'  => $count . '.',
                'item_id'  => $row['item_id'],
                'rfq_id'  => $row['rfq_id'],
                'rfq_no'  => $row['rfq_no'],
                'item'  => $row['procurement'],
                'desc'  => mb_strimwidth($row['description'], 0, 13, "..."),
                'description'  => $row['description'],
                'unit'  => $row['item_unit_title'],
                'qty'  => $row['qty'],
                'cost'  => $row['abc'],
                'total'  => $row['qty'] * $row['abc'],
                'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
                'purpose'   => $row['purpose'],
                'office'    => $office,
                'pr_no'     => $row['pr_no'],
                'status'    => ''
            ];
            $count++;
        }
        return $data;
    }
    public function fetchSupplierQuote($rfq_no)
    {
        $sql = " SELECT
                    sq.rfq_no,
                    a.procurement,
                    a.id AS item_id,
                    sq.ppu AS 'price_per_unit',
                    s.supplier_title
                FROM
                    `supplier_quote` sq
                LEFT JOIN supplier s ON
                    s.id = sq.supplier_id
                LEFT JOIN rfq_items ri ON
                    ri.app_id = sq.rfq_item_id
                                        LEFT JOIN app a on a.id = ri.app_id
                
                LEFT JOIN rfq r ON
                    r.id = ri.rfq_id
                LEFT JOIN rfq rr ON
                    rr.rfq_no = sq.rfq_no
                WHERE
                    sq.rfq_no = '$rfq_no'
                GROUP BY a.procurement";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'item' => $row['procurement'],
                'item_id' => $row['item_id'],
                'supplier' => $row['supplier_title'],
                'supp_price' => $row['price_per_unit']
            ];
        }

        return $data;
    }
    public function fetchSelectedSupplier($rfq_no)
    {
        $sql = "SELECT
                    s.supplier_title,
                    sq.ppu as 'price_per_unit'

                FROM
                    `supplier_quote` sq
                    LEFT JOIN supplier s on s.id = sq.supplier_id
                    LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
                    LEFT JOIN rfq r on r.id = ri.rfq_id
                    LEFT JOIN app a on a.id = ri.app_id
                    where r.rfq_no = '$rfq_no' ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'supplier' => $row['supplier_title'],
                'supp_price' => $row['price_per_unit']

            ];
        }

        return $data;
    }
    public function fetchSupplierItem($rfq_no, $flag)
    {
        $sql = "SELECT
                s.supplier_title,
                a.procurement,
                sq.ppu,
                sq.is_winner
            FROM
                `supplier_quote` sq
            LEFT JOIN supplier s ON sq.supplier_id = s.id
            LEFT JOIN app a ON sq.rfq_item_id = a.id
            WHERE
                sq.rfq_no = '$rfq_no'";


        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {


            $data[] = [
                'supplier_title' => $row['supplier_title'],
                'procurement' => $row['procurement'],
                'price_per_unit' => $row['ppu'],
                'total' => $row['ppu'] + $row['ppu'],
                'is_winner' => $row['is_winner'],

            ];
        }

        return $data;
    }
    public function countItem($pr_no)
    {
        $sql = "SELECT count(*) as 'item_count' FROM `rfq_items` WHERE pr_no = '$pr_no'";
        $getQry = $this->db->query($sql);
        $data = '';
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = $row['item_count'];
        }
        return $data;
    }
    public function monitorPR($month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'])
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $options = [];
        foreach ($month as $months) {
            $sql = "SELECT COUNT(*) as count FROM pr where MONTH(pr_date) = '" . $months . "' and YEAR(pr_date) = '2022'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $options[$months] = $row['count'];
        }
        return $options;
    }
    public function setHeader($rfq_no)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $data = [];
        $sql = "SELECT
      
            s.supplier_title AS 'title',
            sq.id AS 'id',
            sq.is_winner AS 'winner'

        
            FROM
                `supplier_quote` sq
            LEFT JOIN supplier s ON s.id = sq.supplier_id
            LEFT JOIN rfq_items ri ON ri.app_id = sq.rfq_item_id
            LEFT JOIN rfq r ON r.id = ri.rfq_id
            LEFT JOIN rfq rr ON rr.id = sq.rfq_id
            LEFT JOIN app a ON a.id = ri.app_id
            WHERE
                rr.rfq_no = '$rfq_no'
            GROUP BY
                title
            ORDER BY
                winner
            DESC";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = "'" . $row['title'] . "'";
        }

        return $data;
    }
    public function itemStat($id)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $options = [];
        $sql = "SELECT
        pr.id,
     
        pr.abc,
     
    FROM
        pr_items pr
    LEFT JOIN app ON app.id = pr.items
    LEFT JOIN item_unit item ON item.id = pr.unit
    LEFT JOIN pr i ON i.id = pr.pr_id
    LEFT JOIN rfq ON rfq.pr_id = i.id
            WHERE
            rfq.id = '" . $id . "'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {

            $options[$row['id']] = $row['count'];
        }

        return $options;
    }
    public function fetchITem($id)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $options = [];
        $sql = "SELECT
        pr.id,
        app.procurement
      
    FROM
        pr_items pr
    LEFT JOIN app ON app.id = pr.items
    LEFT JOIN item_unit item ON item.id = pr.unit
    LEFT JOIN pr i ON i.id = pr.pr_id
    LEFT JOIN rfq ON rfq.pr_id = i.id
            WHERE
            rfq.id = '" . $id . "'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $options[$row['id']] = $row['procurement'];
        }
        return $options;
    }

    public function fetchDataPoint($id, $rfq_no, $is_multiple)
    {
        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $dataPoints = [];

        if ($is_multiple == 1) {
            $where = "r.rfq_no = '$rfq_no'";
        } else {
            $where = "r.id = '$id'";
        }
        $sql = "SELECT a.procurement,pi.abc FROM `app` a LEFT JOIN `pr_items` pi on pi.items = a.id LEFT JOIN `rfq` r on r.pr_id = pi.pr_id where " . $where . "";
      


        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $dataPoints[] =
                array("y" => $row['abc'], "label" => $row['procurement']);
        }
        return $dataPoints;
    }



    public function fetchWinnerSupplier($rfq_no)
    {
        $sql = "SELECT
        rr.rfq_no,
        sq.supplier_id ,
        s.supplier_title AS 'title',
        sq.ppu AS 'price_per_unit',
        sq.is_winner AS 'winner'
        FROM
            `supplier_quote` sq
        LEFT JOIN supplier s ON s.id = sq.supplier_id
        LEFT JOIN rfq_items ri ON ri.app_id = sq.rfq_item_id
        LEFT JOIN rfq r ON r.id = ri.rfq_id
        LEFT JOIN rfq rr ON rr.id = sq.rfq_id
        LEFT JOIN app a ON a.id = ri.app_id
        WHERE
            rr.rfq_no = '$rfq_no'
        GROUP BY
            title
        ORDER BY
            winner
        DESC
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['supplier_id']] = [
                'id' => $row['supplier_id'],
                'supplier' => $row['title'],
                'winner' => $row['winner'],
                'price_per_unit' => $row['price_per_unit'],

            ];
        }
        return $data;
    }
    public function fetchSupplierTotalABC($rfq_no)
    {
        // supplier header
        // -item1
        // -item1
        // -item1
        $sql = "SELECT
        rr.rfq_no,
        sq.supplier_id,
        s.supplier_title as 'title',
        sq.ppu as 'price_per_unit',
        sq.is_winner as 'winner'

        FROM
        `supplier_quote` sq
        LEFT JOIN supplier s on s.id = sq.supplier_id
        LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
        LEFT JOIN rfq r on r.id = ri.rfq_id
        LEFT JOIN rfq rr on rr.rfq_no = sq.rfq_no
        LEFT JOIN app a on a.id = ri.app_id
        where rr.rfq_no = '$rfq_no' 
        GROUP BY sq.id";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {

            $data[$row['supplier_id']][] =
                [
                    'id' => $row['supplier_id'],
                    'price_per_unit' => $row['price_per_unit'],
                    'winner'         => $row['winner']
                ];
        }
        return $data;
    }
    public function fetchTotalABC($pr_no)
    {
        $sql = "SELECT
            pr.qty,
            pr.abc
            FROM
            pr_items pr
        WHERE
                pr.pr_no = '" . $pr_no . "'";
        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {

            $data = [
                'total_abc'  => number_format($row['qty'] * $row['abc'], 2),
            ];
            $count++;
        }
        return $data;
    }

    public function fetchPO($po_no)
    {
        $sql = "SELECT
        po.`id`,
        `po_no`,
        po.`rfq_no`,
        po.`rfq_id`,
        `po_date`,
        `noa_date`,
        `ntp_date`,
        `po_amount`,
        `remarks`,
        rm.rfq_mode_title
        FROM
        `po`
 
        LEFT JOIN rfq r on r.id = po.rfq_id
        LEFT JOIN rfq_mode rm on rm.id = r.rfq_mode_id
       WHERE
        po_no = '$po_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {

            $data = [
                'po_no'     => $row['po_no'],
                'rfq_no'    => $row['rfq_no'],
                'po_date'   => $row['po_date'],
                'noa_date'  => $row['noa_date'],
                'ntp_date'  => $row['ntp_date'],
                'po_amount' => $row['po_amount'],
                'mode' => $row['rfq_mode_title']
            ];
        }
        return $data;
    }

    public function fetchSupplierWinnerDetails($rfq_no,$rfq_id)
    {
        $multiple = $_SESSION['is_multiple']['is_multiple'];
        $where = ($multiple == 1) ? "rr.rfq_no = '" . $rfq_no . "'" : "rr.rfq_id = '" . $rfq_id . "'";
        $sql = "SELECT
        s.supplier_title,
        s.supplier_address,
        s.contact_details,
        sq.is_winner
        
        FROM
            `supplier_quote` sq
        LEFT JOIN supplier s on sq.supplier_id = s.id
        LEFT JOIN app a on sq.rfq_item_id = a.id
        LEFT JOIN rfq_items ri on sq.rfq_item_id =ri.app_id
        LEFT JOIN rfq r on ri.rfq_id = r.id
        LEFT JOIN rfq rr on rr.id = sq.rfq_id

        WHERE ".$where." and sq.is_winner = 1
        GROUP BY sq.supplier_id
        ORDER BY s.supplier_title";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {

            $data[] = [
                'supplier_title'     => $row['supplier_title'],
                'supplier_address'    => $row['supplier_address'],
                'contact_details'   => $row['contact_details'],

            ];
        }
        return $data;
    }
    public function fetchSupplierHistory()
    {
        $sql = "SELECT
                    s.supplier_title,
                    sum(sw.count) as `count`
                FROM
                    `tbl_supplier_winners` sw
                LEFT JOIN supplier s on s.id = sw.supplier_id
                WHERE supplier_title != ''

                GROUP BY sw.supplier_id
                ORDER BY count desc LIMIT 5";
        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {

            $data[] = [
                'id'     => $count++,
                'supplier_title'     => $row['supplier_title'],
                'count'    => $row['count'],
            ];
        }
        return $data;
    }

    public function purchaseOrderCreateDetails($rfq_no, $rfq_id)
    {
        $multiple = $_SESSION['is_multiple']['is_multiple'];
        $where = ($multiple == 1) ? "sq.rfq_no = '" . $rfq_no . "'" : "sq.rfq_id = '" . $rfq_id . "'";

        $sql = "SELECT
        r.rfq_no,
        s.supplier_title as 'supplier',
        sum(sq.ppu * sq.qty) as 'po_amount'
    FROM
        `supplier_quote` sq
    LEFT JOIN rfq r on r.id = sq.rfq_id
    LEFT JOIN supplier s on s.id = sq.supplier_id
    WHERE " . $where . " and is_winner = 1";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {

            $data = [
                'rfq_no'     =>  $row['rfq_no'],
                'supplier'   =>  $row['supplier'],
                'po_amount'  =>  number_format($row['po_amount'], 2),
                'amount'  =>  $row['po_amount']
            ];
        }
        return $data;
    }

    public function fetchNOAandNTPData($po_no)
    {
        $sql = "SELECT
                    po.po_date,
                    po.noa_date,
                    po.ntp_date,
                    s.supplier_title,
                    s.contact_person,
                    s.supplier_address,
                    p.type,
                    p.purpose,
                    sum(`ppu`) as 'po_amount'
                    
                FROM
                    `po` as po
                LEFT JOIN supplier_quote sq on sq.rfq_no = po.rfq_no
                LEFT JOIN supplier s on s.id = sq.supplier_id
                LEFT JOIN rfq r on r.rfq_no = sq.rfq_no
                LEFT JOIN pr p on p.pr_no = r.pr_no
                where po.po_no = '$po_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $type = $row['type'];
            if ($type == 1) {
                $type = 'Catering Services';
            }
            if ($type == 2) {
                $type = 'Meals, Venue and Accommodation';
            }
            if ($type == 3) {
                $type = 'Repair and Maintenance';
            }
            if ($type == 4) {
                $type = 'Supplies, Materials and Devices';
            }
            if ($type == 5) {
                $type = 'Other Services';
            }
            if ($type == 6) {
                $type = 'Reimbursement and Petty Cash';
            }
            $data = [
                'po_date'           =>  $row['po_date'],
                'noa_date'           =>  date('F d, Y', strtotime($row['noa_date'])),
                'ntp_date'           =>  date('F d, Y', strtotime($row['ntp_date'])),
                'supplier_title'    =>  $row['supplier_title'],
                'contact_person'    =>  $row['contact_person'],
                'supplier_address'  =>  $row['supplier_address'],
                'type'              =>  $type,
                'purpose'           =>  $row['purpose'],
                'totalABC'           =>  $row['po_amount'],
            ];
        }
        return $data;
    }
    public function fetchPendingPR()
    {
        $sql = "SELECT id,pr_no,pmo,type from pr where  YEAR(date_added) = '2022' ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
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
            $data[$row['id']] = [
                'id' => $row['id'],
                'pr_no' => $row['pr_no'],
                'pmo' => $office,
                'pmo_id' => $row['pmo'],
            ];
        }
        return $data;
    }
    public function fetchModeofProc()
    {
        $sql = "SELECT * from mode_of_proc ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['mode_of_proc_title'];
        }
        return $data;
    }
    public function fetchPOSRFQ()
    {

        $sql = "SELECT * from pr where stat = 4 and YEAR(pr_date) = 2022 ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['pr_no']] = $row['pr_no'];
        }
        return $data;
    }
    public function fetchPOIds($po_no)
    {
        $sql = "SELECT
                        p.rfq_id,
                        sq.supplier_id,
                        p.id
                    FROM
                        `po` p
                    LEFT JOIN rfq r on r.id = p.rfq_id
                    LEFT JOIN supplier_quote sq on sq.rfq_id = r.id
                    WHERE
                        p.po_no = '$po_no' and sq.is_winner = 1
                    limit 1";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'po_id' => $row['id'],
                'rfq_id' => $row['rfq_id'],
                'supplier_id' => $row['supplier_id']
            ];
        }
        return $data;
    }
    public function fetchPOItems($id)
    {
        $sql = "SELECT
        a.procurement,
        PI.id,
        a.sn,
        item.item_unit_title,
        PI.description,
        sq.ppu as 'PPU',
        sq.qty,
        sq.qty * sq.ppu AS 'total_abc'
            FROM
                `supplier_quote` sq
            LEFT JOIN supplier s ON  sq.supplier_id = s.id
            LEFT JOIN app a ON sq.rfq_item_id = a.id
            LEFT JOIN rfq r ON r.id = sq.rfq_id
            LEFT JOIN pr p ON p.id = r.pr_id
            LEFT JOIN pr_items PI On p.id = PI.pr_id 
            LEFT JOIN item_unit item ON item.id = PI.unit
            WHERE
                sq.rfq_id = '$id' AND sq.is_winner = 1
            GROUP BY PI.id
            ORDER BY
                sq.is_winner
            DESC
                
        ";

        $query = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {

            $data[] = [
                'id' => $row['id'],
                'sn' => $row['sn'],
                'items' => $row['procurement'],
                'description' => $row['description'],
                'unit' => $row['item_unit_title'],
                'qty' => $row['qty'],
                'abc' => $row['total_abc'],
                'total' => $row['app_price'],
                'ppu' => $row['PPU'],
                'unit_cost' => $row['unit_cost']
            ];
        }
        return $data;
    }
}
