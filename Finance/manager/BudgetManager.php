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
        $sql = "SELECT a.date_certify, a.submitted_date_budget, a.availability_code, a.budget_availability_status,
                a.submitted_date, a.received_by, a.canceled, a.canceled_date, a.received_date, a.id, a.pr_no,
                a.pmo,a.purpose, a.pr_date,a.type, a.target_date, a.stat, b.rfq_no,
                b.rfq_date FROM pr as a 
                LEFT JOIN rfq as b ON a.pr_no=b.pr_no 
                WHERE a.budget_availability_status IN ('Submitted', 'CERTIFIED')
                Order by a.id DESC";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'date_certify'      => $row['vdate_certify'],
                'availability_code' => $row['availability_code'],
                'pr_no'             => $row['pr_no'],
                'office'            => $row['pmo'],
                'purpose'           => $row['purpose'],
                'submitted_date'    => date('m/d/Y', strtotime($row['submitted_date_budget'])),
                'status'            => $row['budget_availability_status'] == 'Submitted' ? 'Submitted to Budget' : 'CERTIFIED',
                'span-class'        => $row['budget_availability_status'] == 'CERTIFIED' ? 'label-success' : 'label-primary'
            ];
        }

        return $data;
    }

    public function getObligationsCount() {
        $sql = "SELECT 
                SUM(CASE WHEN status = 'FROM GSS' OR status = 'FOR RECEIVING' then 1 else 0 end) AS for_receiving,
                SUM(CASE WHEN status = 'OBLIGATED' then 1 else 0 end) AS obligated,
                SUM(CASE WHEN status = 'RETURN' then 1 else 0 end) AS returned,
                SUM(CASE WHEN status = 'RELEASED' then 1 else 0 end) AS released
                FROM saroob";

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
                ob.id as id,
                ob.type as type,
                ob.serial_no as serial_no,
                ob.po_id as po_id,
                ob.address as address,
                ob.purpose as purpose,
                ob.amount as amount,
                ob.remarks as remarks,
                ob.status as status,
                DATE_FORMAT(ob.date_created, '%m/%d/%Y') as date_created,
                e.UNAME as created_by,
                sb.UNAME as submitted_by,
                rb.UNAME as received_by,
                obl.UNAME as obligated_by,
                rtb.UNAME as returned_by,
                rlb.UNAME as released_by,
                DATE_FORMAT(ob.date_updated, '%m/%d/%Y') as date_updated,
                DATE_FORMAT(ob.date_submitted, '%m/%d/%Y') as date_submitted,
                DATE_FORMAT(ob.date_received, '%m/%d/%Y') as date_received,
                DATE_FORMAT(ob.date_obligated, '%m/%d/%Y') as date_obligated,
                DATE_FORMAT(ob.date_returned, '%m/%d/%Y') as date_returned,
                DATE_FORMAT(ob.date_released, '%m/%d/%Y') as date_released,
                po.code as po_code,
                s.supplier_title as supplier
                FROM tbl_obligation ob
                LEFT JOIN tbl_potest po ON po.id = ob.po_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN tblemployeeinfo sb ON sb.EMP_N = ob.submitted_by
                LEFT JOIN tblemployeeinfo rb ON rb.EMP_N = ob.received_by
                LEFT JOIN tblemployeeinfo obl ON obl.EMP_N = ob.obligated_by
                LEFT JOIN tblemployeeinfo rtb ON rtb.EMP_N = ob.returned_by
                LEFT JOIN tblemployeeinfo rlb ON rlb.EMP_N = ob.released_by"; 

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'type'              => strtoupper($row['type']),
                'serial_no'         => $row['serial_no'],
                'po_code'           => !empty($row['po_code']) ? 'PO-'.$row['po_code'] : '---',
                'supplier'          => $row['supplier'],
                'particular'        => $row['purpose'],
                'amount'            => '₱'.number_format($row['amount'], 2),
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
                'released_by'       => $row['released_by']
            ];
        }

        return $data;
    }

    public function getPurchaseOrders()
    {
        $sql = "SELECT id, ponum, payee, amount FROM `saroob` WHERE `IS_GSS` = 'FROM GSS' ORDER BY `id` DESC";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'        => $row['id'],
                'ponum'     => $row['ponum'],
                'payee'     => $row['payee'],
                'amount'    => '₱' .number_format($row['amount'], 2)
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

    public function getPurchaseOrderOpts()
    {
        $sql = "SELECT 
                po.id as po_id,
                po.code as po,
                po.amount as amount,
                s.id as supplier_id,
                s.supplier_title as supplier,
                s.supplier_address as supplier_address
                FROM tbl_potest po
                LEFT JOIN supplier s ON s.id = po.supplier";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['po_id']] = [
                'po_id'         => $row['po_id'],
                'po'            => 'PO-'.$row['po'],
                'po_amount'     => $row['amount'],
                'supp_id'       => $row['supplier_id'],
                'supp'          => $row['supplier'],
                'supp_address'  => $row['supplier_address']
            ];
        }

        return $data;
    }

    public function getFundSourceOpts()
    {
        $sql = "SELECT * FROM tbl_fundsource WHERE total_allotment_amount <= total_balance AND total_allotment_obligated >= 0";
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
                fs.source as code,
                fs.name as fund_name,
                fs.ppa as ppa,
                fs.legal_basis as legal_basis,
                fs.particulars as particulars,
                fs.total_allotment_amount,
                fs.total_allotment_obligated,
                fs.total_balance,
                e.UNAME as uname,
                CONCAT(e.FIRST_M, ' ', substring(e.MIDDLE_M, 1, 1), '. ', e.LAST_M) as created_by,
                DATE_FORMAT(fs.date_created, '%m/%d/%Y') as date_created
                FROM tbl_fundsource fs
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = fs.created_by
                WHERE fs.id = $id";

        $getQry = $this->db->query($sql);
        $data = ['code' => '', 'fund_name' => '', 'ppa' => '', 'legal_basis' => '', 'particulars' => '', 'created_by', 'date_created'];

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
                'created_by'                => $row['created_by'],
                'date_created'              => $row['date_created']
            ];
        }

        return $data;
    }

    public function getFSEntries($id)
    {
        $sql = "SELECT * FROM tbl_fundsource_entry fse
                LEFT JOIN tbl_fundsource fs ON fs.id = fse.source_id
                WHERE fs.id = $id";

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
                o.id as obligation_id,
                o.type as ob_type,
                o.serial_no as serial_no,
                po.id as pid,
                o.amount as total_amount,
                s.id as supplier,
                o.address,
                o.remarks,
                o.status,
                o.is_dfunds,
                DATE_FORMAT(o.date_created, '%m/%d/%Y') as date_created
                FROM tbl_obligation o
                LEFT JOIN tbl_potest po ON po.id = o.po_id
                LEFT JOIN supplier s ON s.id = o.supplier
                WHERE o.id = $id";
        
        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_assoc($getQry);

        return $result;
    }

    public function getFSUACS($id)
    {
        $sql = "SELECT * FROM tbl_fundsource_entry fse
                WHERE fse.source_id = $id";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'code'  => $row['uacs'],
                'amount' => $row['allotment_amount']
            ];
        }

        return $data;
    }

    public function getObligationEntries($id)
    {
        $sql = "SELECT * FROM tbl_obentries WHERE ob_id = '$id'";
        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[] = $result;
        }

        return $data;
    }

    public function getUACSOpts() {
        $sql = "SELECT * FROM tbl_fundsource_entry";
        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[$result['source_id']][] = $result;
        }

        return $data;
    }

}