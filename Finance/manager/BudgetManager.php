<?php

class BudgetManager extends Connection
{ 
    
    function __construct() {
        if (!isset($this->db)) {
            $conn = new mysqli($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Database is not connected: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

    public function fetch() {
        $data = [];
        $pageno = 1;
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM saro";
        // $result = mysqli_query($this->conn, $total_pages_sql);
        $getResult = $this->db->query($total_pages_sql);
        $total_rows = mysqli_fetch_array($getResult)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        // $sql = "SELECT * FROM saro LIMIT $offset, $no_of_records_per_page";
        $sql = "SELECT * FROM saro ORDER BY id DESC";

        // $res_data = mysqli_query($this->conn, $sql);
        $getResult = $this->db->query($sql);

        while($row = mysqli_fetch_array($getResult)){
            $data[] = $row;
        }
        
        return $data;
    }

    public function getPurchaseRequest() {
        $sql = "SELECT 
                    p.date_certify, 
                    p.submitted_date, 
                    p.availability_code, 
                    p.budget_availability_status,
                    p.id, 
                    p.pr_no,
                    pm.pmo_title AS pmo,
                    p.purpose,
                    e.UNAME AS submitted_by
                FROM pr AS p 
                LEFT JOIN tblemployeeinfo AS e ON e.EMP_N = p.username
                LEFT JOIN pmo AS pm ON pm.id = p.pmo
                WHERE p.stat = 1 AND YEAR(p.pr_date) > '2021'
                ORDER BY p.id DESC";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $date = new DateTime($row['submitted_date']);
    
            $data[] = [
                'id'                => $row['id'],
                'date_certify'      => $row['date_certify'],
                'availability_code' => $row['availability_code'],
                'pr_no'             => $row['pr_no'],
                'office'            => $row['pmo'],
                'purpose'           => $row['purpose'],
                'submitted_date'    => $date->format('m/d/Y'),
                'status'            => $row['status'],
                'span-class'        => $row['budget_availability_status'] == 'CERTIFIED' ? 'label-success' : 'label-primary',
                'submitted_by'      => $row['submitted_by']
            ];
        }

        return $data;
    }

    public function getObligationsCount() {
        $sql = "SELECT 
                SUM(CASE WHEN status = 'Received' then 1 else 0 end) AS for_receiving,
                SUM(CASE WHEN status = 'Obligated' then 1 else 0 end) AS obligated,
                SUM(CASE WHEN status = 'Returned' then 1 else 0 end) AS returned,
                SUM(CASE WHEN status = 'Released' then 1 else 0 end) AS released
                FROM tbl_obligation";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_assoc($getQry);
        
        return $result;
    }

    public function monthOptions() {
        $options = array();
        for ($i = 0; $i < 12; $i++) { 
            $date_str = date('M', strtotime("+ $i months")); 
            $new_i = $i+1; 
            $options[$new_i] = $date_str;
        }

        return $options;
    }

    public function payeeOptions()
    {
        $sql = "SELECT id,ors, payee from saroob group by ors";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['payee'];
        }

        return $data;
    }

    public function getObligationsData()
    {             
        $sql = "SELECT 
                    ob.id AS id,
                    ob.type AS type,
                    ob.serial_no AS serial_no,
                    ob.po_id AS po_id,
                    ob.address AS address,
                    ob.purpose AS purpose,
                    ob.amount AS amount,
                    ob.remarks AS remarks,
                    ob.status AS status,
                    ob.is_dfunds,
                    DATE_FORMAT(ob.date_created, '%m/%d/%Y') AS date_created,
                    e.EMP_N AS userid,
                    e.UNAME AS created_by,
                    sb.UNAME AS submitted_by,
                    rb.UNAME AS received_by,
                    obl.UNAME AS obligated_by,
                    rtb.UNAME AS returned_by,
                    rlb.UNAME AS released_by,
                    DATE_FORMAT(ob.date_updated, '%m/%d/%Y') AS date_updated,
                    DATE_FORMAT(ob.date_submitted, '%m/%d/%Y') AS date_submitted,
                    DATE_FORMAT(ob.date_received, '%m/%d/%Y') AS date_received,
                    DATE_FORMAT(ob.date_obligated, '%m/%d/%Y') AS date_obligated,
                    DATE_FORMAT(ob.date_returned, '%m/%d/%Y') AS date_returned,
                    DATE_FORMAT(ob.date_released, '%m/%d/%Y') AS date_released,
                    po.po_no AS po_code,
                    CASE 
                        WHEN ob.is_dfunds THEN 'dfund' ELSE 'normal'
                    END AS df_type,
                    CASE 
                        WHEN s.id IS NOT NULL THEN s.supplier_title ELSE ob.supplier
                    END AS supplier,
                    em.uname AS pr_creator,
                    of.DIVISION_M AS division,
                    em.DIVISION_C AS user_division
                FROM tbl_obligation ob
                LEFT JOIN po po ON po.id = ob.po_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN tblemployeeinfo sb ON sb.EMP_N = ob.submitted_by
                LEFT JOIN tblemployeeinfo rb ON rb.EMP_N = ob.received_by
                LEFT JOIN tblemployeeinfo obl ON obl.EMP_N = ob.obligated_by
                LEFT JOIN tblemployeeinfo rtb ON rtb.EMP_N = ob.returned_by
                LEFT JOIN tblemployeeinfo rlb ON rlb.EMP_N = ob.released_by
                LEFT JOIN pr pr ON pr.id = po.pr_id
                LEFT JOIN tblemployeeinfo em ON em.EMP_N = pr.username
                LEFT JOIN tblpersonneldivision of ON of.DIVISION_N = em.DIVISION_C
                ORDER BY ob.id DESC"; 

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {

            $hucs = $this->getHUCsOpts();

            if ($row['is_dfunds']) {
                $supp_title = $hucs[$row['supplier']];
                $supp_name = $supp_title['name'];
            } else {
                $supp_name = $row['supplier'];
            }



            $data[$row['df_type']][] = [
                'id'                => $row['id'],
                'userid'            => $row['userid'],
                'type'              => strtoupper($row['type']),
                'serial_no'         => $row['serial_no'],
                'po_code'           => !empty($row['po_code']) ? 'PO-'.$row['po_code'] : '---',
                'supplier'          => $supp_name,
                'particular'        => $row['purpose'],
                'amount'            => '₱ '.number_format($row['amount'], 2),
                'remarks'           => $row['remarks'],
                'status'            => $row['status'],
                'date_created'      => $row['date_created'],
                'created_by'        => $row['created_by'],
                'date_updated'      => $row['date_updated'],
                'date_submitted'    => $row['date_submitted'],
                'submitted_by'      => $row['submitted_by'],
                'date_received'     => $row['date_received'],
                'received_by'       => $row['received_by'],
                'date_obligated'    => $row['date_obligated'],
                'obligated_by'      => $row['obligated_by'],
                'date_returned'     => $row['date_returned'],
                'returned_by'       => $row['returned_by'],
                'date_released'     => $row['date_released'],
                'released_by'       => $row['released_by'],
                'pr_creator'        => $row['pr_creator'],
                'division'          => $row['division'],
                'user_division'     => $row['user_division']
            ];
        }

        return $data;
    }

    public function getPurchaseOrders()
    {
        // $sql = "SELECT id, ponum, payee, amount FROM `saroob` WHERE `IS_GSS` = 'FROM GSS' ORDER BY `id` DESC";
        $sql = "SELECT
                p.id,
                p.po_no AS ponum,
                s.supplier_title AS payee,
                p.po_amount AS amount,
                pr.username AS requested_by,
                e.UNAME AS username
            FROM
                po AS p
            LEFT JOIN rfq r ON
                r.id = p.rfq_id
            LEFT JOIN supplier_quote sq ON
                sq.rfq_id = r.id
            LEFT JOIN supplier s ON
                s.id = sq.supplier_id
            LEFT JOIN pr pr ON 
                pr.id = p.pr_id
            LEFT JOIN tblemployeeinfo e ON
                e.EMP_N = pr.username
            where r.stat = 9 and sq.is_winner = 1";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'            => $row['id'],
                'ponum'         => $row['ponum'],
                'payee'         => $row['payee'],
                'amount'        => '₱' .number_format($row['amount'], 2),
                'requested_by'  => $row['requested_by'],
                'username'      => $row['username']
            ];
        }

        return $data;
    }

    public function getSAROOB($id)
    {
        $sql = "SELECT * FROM burs WHERE po_no = '$id'";
        $getQry = $this->db->query($sql);
        
        $result = mysqli_fetch_assoc($getQry);
        return $result;
    }

    // public function getSupplierOpts()
    // {
    //     $sql = "SELECT id, supplier_title from supplier";
    //     $getQry = $this->db->query($sql);
    //     $data = [];

    //     while ($row = mysqli_fetch_assoc($getQry)) {
    //         $data[$row['id']] = $row['supplier_title'];
    //     }

    //     return $data;
    // }

    public function getSupplierOpts()
    {
        $sql = "SELECT id, supplier_title, supplier_address from supplier";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'name'      => $row['supplier_title'],
                'address'   => $row['supplier_address']
            ];
        }

        return $data;
    }

    public function getSupplierOpts2()
    {
        $sql = "SELECT id, supplier_title, supplier_address from supplier";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'name'      => $row['supplier_title'],
                'address'   => $row['supplier_address']
            ];
        }

        return $data;
    }

    public function getPurchaseOrderOpts()
    {
        $sql = "SELECT 
                    p.id AS po_id, 
                    p.po_no AS po,
                    p.po_amount AS amount,
                    p.pr_id AS pr_id,
                    s.id as supplier_id,
                    s.supplier_title AS supplier,
                    s.supplier_address AS supplier_address, 
                    pr.username AS requested_by,
                    e.UNAME AS username,
                    o.DIVISION_M AS division
                FROM po as p
                LEFT JOIN rfq r ON r.id = p.rfq_id
                LEFT JOIN supplier_quote sq ON sq.rfq_id = r.id
                LEFT JOIN supplier s ON s.id = sq.supplier_id
                LEFT JOIN pr pr ON pr.id = p.pr_id
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = pr.username
                LEFT JOIN tblpersonneldivision o ON o.DIVISION_N = e.DIVISION_C
                where sq.is_winner = 1";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['po_id']] = [
                'po_id'         => $row['po_id'],
                'pr_id'         => $row['pr_id'],
                'po'            => 'PO-'.$row['po'],
                'po_amount'     => $row['amount'],
                'supp_id'       => $row['supplier_id'],
                'supp'          => $row['supplier'],
                'supp_address'  => $row['supplier_address'],
                'requested_by'  => $row['requested_by'],
                'username'      => $row['username']." (".$row['division'].")"
            ];
        }

        return $data;
    }

    public function getFundSourceOpts()
    {
        $sql = "SELECT 
                    * 
                FROM tbl_fundsource 
                WHERE total_balance != 0";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'id'        => $row['id'],
                'source_no' => $row['source'],
                'ppa'       => $row['ppa']
            ];
        }

        return $data;
    }

    public function getFundSourceOpts2()
    {
        $sql = "SELECT
                    fs.id,
                    fs.source,
                    fs.ppa, 
                    SUM(fse.balance) AS balance
                FROM
                    tbl_fundsource fs
                LEFT JOIN tbl_fundsource_entry fse ON
                    fs.id = fse.source_id
                WHERE
                    fse.balance > 0 AND fs.is_lock
                GROUP BY
                    fs.id";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'id'        => $row['id'],
                'source_no' => $row['source'],
                'ppa'       => $row['ppa']
            ];
        }

        return $data;
    }

    public function getFundSources($startdate=null, $enddate=null)
    {   
        $sql = "SELECT * FROM tbl_fundsource WHERE status != 'Deleted'";

        if (!empty($startdate)) {
            $sql .= "AND date_created BETWEEN '".$startdate."' AND '".$enddate."'";
        }

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            if (!empty($row)) {
                $data[$row['id']] = $row;
            }
        }

        return $data;
    }

    public function getFundSources2($startdate=null, $enddate=null)
    {   
        $sql = "SELECT
                    fs.id,
                    fs.source,
                    fs.name, 
                    fs.total_allotment_amount,
                    fs.total_balance,
                    DATE_FORMAT(fs.date_created, '%b. %d, %Y') as date_created,
                    fs.is_lock,
                    CASE WHEN oe.id IS NOT NULL THEN TRUE ELSE FALSE
                    END AS is_used, 
                    IF(fs.is_lock = TRUE, 'Locked', 'Unlocked') AS status
                FROM
                    tbl_fundsource fs
                LEFT JOIN tbl_obentries oe ON
                    oe.fund_source = fs.id
                WHERE
                    fs.status != 'Deleted'";

        if (!empty($startdate)) {
            $sql .= " AND date_created BETWEEN '".$startdate."' AND '".$enddate."'";
        }

        $sql .= " GROUP BY fs.id";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            if (!empty($row)) {
                $data[$row['id']] = $row;
            }
        }

        return $data;
    }

    public function getFundSources3($startdate=null, $enddate=null)
    {   
        $sql = "SELECT
                    fs.id,
                    fs.source,
                    fs.name, 
                    fs.total_allotment_amount,
                    fs.total_balance,
                    DATE_FORMAT(fs.date_created, '%b. %d, %Y') as date_created,
                    SUM(fse.allotment_amount) AS total_allotment_amount,
                    SUM(fse.obligated_amount) AS total_allotment_obligated,
                    SUM(fse.balance) AS total_balance
                FROM
                    tbl_fundsource fs
                LEFT JOIN tbl_fundsource_entry fse ON
                    fse.source_id = fs.id
                WHERE
                    fs.status != 'Deleted'";

        if (!empty($startdate)) {
            $sql .= " AND date_created BETWEEN '".$startdate."' AND '".$enddate."'";
        }

        $sql .= " GROUP BY fs.id";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            if (!empty($row)) {
                $data[$row['id']] = [
                    'total_allotment_amount'    => $row['total_allotment_amount'],
                    'total_allotment_obligated' => $row['total_allotment_obligated'],
                    'total_balance'             => $row['total_balance']
                ];
            }
        }

        return $data;
    }

    public function getFundSourcesFilter($startdate=null, $enddate=null)
    {   
        $sql = "SELECT * FROM tbl_fundsource WHERE status != 'Deleted'";

        if (!empty($startdate)) {
            $sql .= "AND date_created BETWEEN '".$startdate."' AND '".$enddate."'";
        }

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            if (!empty($row)) {
                $data[$row['id']] = [
                    'source'                    => $row['source'],
                    'name'                      => $row['name'],
                    'total_allotment_amount'    => '₱ '.number_format($row['total_allotment_amount'], 2, '.', ','),
                    'total_allotment_obligated' => '₱ '.number_format($row['total_allotment_obligated'], 2, '.', ','),
                    'total_balance'             => '₱ '.number_format($row['total_balance'], 2, '.', ','),
                    'date_created'              => date('M. d, Y', strtotime($row['date_created']))
                ];
            }
        }

        return $data;
    }

    public function getExpenseClassOpts(){
        $opts = [
            'ps'    => 'Personnel Service (PS)',
            'mooe'  => 'Maintenance and Other Operating Expenses (MOOE)',
            'fe'    => 'Financial Expenses (FE)',
            'co'    => 'Capital Outlay (CO)'
        ];

        return $opts;
    }

    public function getFundSourceData($id)
    {
        $sql = "SELECT 
                    fs.id,
                    fs.source AS code,
                    fs.name AS fund_name,
                    fs.ppa AS ppa,
                    fs.legal_basis AS legal_basis,
                    fs.particulars AS particulars,
                    SUM(fse.allotment_amount) AS total_allotment_amount,
                    SUM(fse.obligated_amount) AS total_allotment_obligated,
                    SUM(fse.balance) AS total_balance,
                    e.UNAME AS uname,
                    CONCAT(e.FIRST_M, ' ', substring(e.MIDDLE_M, 1, 1), '. ', e.LAST_M) AS created_by,
                    DATE_FORMAT(fs.date_created, '%m/%d/%Y') AS date_created,
                    fs.is_lock
                FROM tbl_fundsource fs
                LEFT JOIN tbl_fundsource_entry fse ON fse.source_id = fs.id
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = fs.created_by
                WHERE fs.id = $id";

        $getQry = $this->db->query($sql);
        $data = ['code' => '', 'fund_name' => '', 'ppa' => '', 'legal_basis' => '', 'particulars' => '', 'created_by', 'date_created', 'is_lock' => ''];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'id'                        => $row['id'],
                'code'                      => $row['code'],
                'fund_name'                 => $row['fund_name'],
                'ppa'                       => $row['ppa'],
                'legal_basis'               => $row['legal_basis'],
                'particulars'               => $row['particulars'],
                'total_allotment_amount'    => number_format($row['total_allotment_amount'], 2, '.', ','),
                'total_allotment_obligated' => number_format($row['total_allotment_obligated'], 2, '.', ','),
                'total_balance'             => number_format($row['total_balance'], 2, '.', ','),
                'created_by'                => $row['uname'],
                'date_created'              => $row['date_created'],
                'is_lock'                   => $row['is_lock']
            ];
        }

        return $data;
    }

    public function getFSEntries($id)
    {
        $sql = "SELECT
                    fse.id,
                    fse.expense_class,
                    fse.uacs,
                    fse.allotment_amount,
                    fse.obligated_amount,
                    fse.balance,
                    fse.uacs,
                    CASE 
                        WHEN oe.id IS NOT NULL THEN TRUE ELSE FALSE
                    END AS is_used,
                    fse.is_lock
                FROM
                    tbl_fundsource_entry fse
                LEFT JOIN tbl_fundsource fs ON
                    fs.id = fse.source_id
                LEFT JOIN tbl_obentries oe ON
                    oe.uacs = fse.id
                LEFT JOIN tbl_object_codes oc ON
                    oc.id = fse.uacs
                WHERE
                    fs.id = $id
                GROUP BY
                    fse.id";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = $row;
        }

        return $data;
    }

    public function removeComma($item) 
    {
        return str_replace( ',', '', $item );
    }

    public function getObligations($id) 
    {
        $sql = "SELECT 
                    o.id AS obligation_id,
                    o.type AS ob_type,
                    o.serial_no AS serial_no,
                    p.id AS pid,
                    o.amount AS total_amount,
                    CASE 
                        WHEN s.id IS NOT NULL THEN s.id ELSE o.supplier
                    END AS supplier,
                    o.address,
                    o.remarks,
                    o.status,
                    o.is_dfunds,
                    o.purpose,
                    o.created_by,
                    o.received_by,
                    o.obligated_by,
                    o.released_by,
                    o.is_submitted,
                    DATE_FORMAT(o.date_created, '%m/%d/%Y') AS date_created,
                    o.supplier AS ob_payee,
                    s.supplier_title AS supplier_title,
                    e.DIVISION_C AS user_division,
                    pr.username AS requested_by,
                    e.uname AS pr_creator,
                    em.uname AS uname,
                    of.DIVISION_M AS division
                FROM tbl_obligation o
                LEFT JOIN po p ON p.id = o.po_id
                LEFT JOIN supplier s ON s.id = o.supplier
                LEFT JOIN pr pr ON pr.id = p.pr_id
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = pr.username
                LEFT JOIN tblemployeeinfo em ON em.EMP_N = o.created_by
                LEFT JOIN tblpersonneldivision of ON of.DIVISION_N = e.DIVISION_C
                WHERE o.id = $id";



        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_assoc($getQry);

        return $result;
    }

    public function getFSUACS($id)
    {
        $sql = "SELECT 
                fse.id,
                fse.uacs,
                fse.allotment_amount,
                fse.balance,
                CONCAT(oc.code, ' ', oc.uacs) AS object_code 
                FROM tbl_fundsource_entry fse
                LEFT JOIN tbl_fundsource fs ON fs.id = fse.source_id
                LEFT JOIN tbl_object_codes oc ON oc.id = fse.uacs
                WHERE fse.balance > 0 AND fse.source_id = $id AND fs.is_lock";


        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'code'      => $row['object_code'],
                'amount'    => $row['allotment_amount'],
                'balance'   => $row['balance']
            ];
        }

        return $data;
    }

    public function getSelectedUACSBalance($id)
    {
        $sql = "SELECT fse.balance, fse.obligated_amount as obligated, fse.allotment_amount as allotment FROM tbl_fundsource_entry fse
                WHERE fse.id = $id";

        $getQry = $this->db->query($sql);
        $data = [];

        $row = mysqli_fetch_assoc($getQry);
        return $row;
    }

    public function getObligationEntries($id)
    {
        $sql = "SELECT 
                    oe.fund_source,
                    fs.ppa AS mfo_ppa,
                    oe.uacs,
                    oe.amount,
                    fe.balance AS uacs_balance 
                FROM tbl_obentries oe
                LEFT JOIN tbl_fundsource_entry fe ON fe.id = oe.uacs
                LEFT JOIN tbl_fundsource fs ON fs.id = fe.source_id  
                WHERE oe.ob_id = $id";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[] = $result;
        }

        return $data;
    }

    public function getUACSOpts() {
        $sql = "SELECT 
                    fse.id,
                    fse.source_id,
                    fse.obligated_amount,
                    fse.allotment_amount,
                    fse.balance,
                    CONCAT(oc.code, ' ', oc.uacs) AS uacs
                FROM tbl_fundsource_entry fse
                LEFT JOIN tbl_object_codes oc ON oc.id = fse.uacs";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[$result['source_id']][] = $result;
        }

        return $data;
    }

    public function getHUCsOpts() {
        $opts = [
            '1'    => ['name'=> 'DILG Cavite', 'address'=> 'Cavite'],
            '2'    => ['name'=> 'DILG Laguna', 'address'=> 'Laguna'],
            '3'    => ['name'=> 'DILG Batangas', 'address'=> 'Batangas'],
            '4'    => ['name'=> 'DILG Rizal', 'address'=> 'Rizal'],
            '5'    => ['name'=> 'DIG Quezon', 'address'=> 'Quezon'],
            '6'    => ['name'=> 'DILG Lucena', 'address'=> 'Lucena']
        ];

        return $opts;
    }

    public function getUACSObligation($id)
    {
        $sql = "SELECT 
                fse.id,
                fse.uacs,
                fse.allotment_amount,
                fse.balance 
                FROM tbl_fundsource_entry fse
                LEFT JOIN tbl_fundsource fs ON fs.id = fse.source_id
                WHERE fse.balance > 0 AND fse.source_id = $id AND fs.is_lock";


        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'code'      => $row['uacs'],
                'amount'    => $row['allotment_amount'],
                'balance'   => $row['balance']
            ];
        }

        return $data;
    }

    public function getObUACS($ids)
    {
        $sql = "SELECT
                    ob.id,
                    ob.serial_no,
                    oe.fund_source,
                    oe.id AS oe_id,
                    fs.source AS source_code,
                    fs.ppa AS ppa,
                    fe.uacs,
                    oe.amount,
                    fe.balance AS uacs_balance 
                FROM tbl_obentries oe
                LEFT JOIN tbl_obligation ob ON ob.id = oe.ob_id
                LEFT JOIN tbl_fundsource_entry fe ON fe.id = oe.uacs
                LEFT JOIN tbl_fundsource fs ON fs.id = fe.source_id  
                WHERE ob.id IN ($ids)";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[$result['oe_id']] = [
                'ob_id'         => $result['id'],
                'serial_no'     => $result['serial_no'],
                'fund_source'   => $result['fund_source'],
                'source_code'   => $result['source_code'],
                'ppa'           => $result['ppa'],
                'uacs'          => $result['uacs'],
                'amount'        => '₱'.number_format($result['amount'], 2),
                'p_amount'        => $result['amount'],
                'uacs_balance'  => '₱'.number_format($result['uacs_balance'], 2)
            ];
        }

        return $data;
    }

    public function getUACS() 
    {
        $sql = "SELECT * FROM tbl_object_codes";
        $getQry = $this->db->query($sql);

        $data = [];
        
        while($row = mysqli_fetch_assoc($getQry)){
            $data[$row['id']] = $row['code'] .' '.$row['uacs'];
        }


        return $data;
    }

    public function getChecker($type)
    {
        $result = '';
        switch ($type) {
            case 'PS':
                $result = 'ps';
                break;
            case 'MOOE':
                $result = 'mooe';
                break;
            case 'CO':
                $result = 'co';
                break;
            case 'FE':
                $result = 'fe';
                break;
        }

        return $result;
    }
}