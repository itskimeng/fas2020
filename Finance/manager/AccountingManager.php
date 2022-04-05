<?php

class AccountingManager extends Connection
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

        $total_pages_sql = "SELECT COUNT(*) FROM $this->default_table";
        // $result = mysqli_query($this->conn, $total_pages_sql);
        $getResult = $this->db->query($total_pages_sql);
        $total_rows = mysqli_fetch_array($getResult)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        // $sql = "SELECT * FROM saro LIMIT $offset, $no_of_records_per_page";
        $sql = "SELECT * FROM $this->default_table ORDER BY id DESC";

        // $res_data = mysqli_query($this->conn, $sql);
        $getResult = $this->db->query($sql);

        while($row = mysqli_fetch_array($getResult)){
            $data[] = $row;
        }
        
        return $data;
    }

    public function getAccountingData() {
        $sql = " SELECT `id`, DATE_FORMAT(`nta_date`, '%M %d, %Y') AS nta_date, DATE_FORMAT(`received_date`, '%M %d, %Y') AS received_date, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, DATE_FORMAT(`date_created`, '%M %d, %Y') AS date_created, `status`, `is_lock` FROM `tbl_nta` ORDER BY `id` DESC ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'nta_date'          => $row['nta_date'],
                'received_date'     => $row['received_date'],
                'nta_number'        => $row['nta_number'],
                'saro_number'       => $row['saro_number'],
                'account_number'    => $row['account_number'],
                'particular'        => $row['particular'],
                'quarter'           => $row['quarter'],
                'amount'            => "P ".number_format($row['amount'], 2),
                'obligated'         => "P ".number_format($row['obligated'], 2),
                'balance'           => "P ".number_format($row['balance'], 2),
                'created_by'        => $row['created_by'],
                'date_created'      => $row['date_created'],
                'status'            => $row['status'],
                'is_lock'           => $row['is_lock']
            ];
        }

        return $data;
    }


    public function getAccountingDisbursement($status='',$ors='') { 
        $qry1 = '';
        //new
        if ($status != '') 
        {
           $qry = ' AND ob.status = "'.$status.'"';
        }
        else
        {
           $qry = ' AND ob.status != "Submitted by PO"';
        }
        //--------------------
        if ($ors != '') 
        {
            $qry1 = ' AND ob.id = '.$ors;
        }

        $sql = "SELECT 
                    ob.id as id,
                    ob.type as type,
                    ob.serial_no as serial_no,
                    ob.po_id as po_id,
                    ob.supplier as po_supplier,
                    ob.address as address,
                    ob.purpose as purpose,
                    ob.amount as amount,
                    ob.remarks as remarks,
                    ob.status as status,
                    DATE_FORMAT(ob.date_created, '%m/%d/%Y') as date_created,
                    e.UNAME as created_by,
                    DATE_FORMAT(ob.date_updated, '%m/%d/%Y') as date_updated,
                    DATE_FORMAT(ob.date_submitted, '%m/%d/%Y') as date_submitted,
                    DATE_FORMAT(ob.date_received, '%m/%d/%Y') as date_received,
                    DATE_FORMAT(ob.date_obligated, '%m/%d/%Y') as date_obligated,
                    DATE_FORMAT(ob.date_returned, '%m/%d/%Y') as date_returned,
                    DATE_FORMAT(ob.date_released, '%m/%d/%Y') as date_released,
                    ob.designation as designation,
                    po.po_no as po_code,
                    s.supplier_title as supplier,
                    dv.id as dv_id,
                    dv.dv_number as dv_number,
                    dv.tax as tax,
                    dv.gsis as gsis,
                    dv.pagibig as pagibig,
                    dv.philhealth as philhealth,
                    dv.other as other,
                    dv.total as total,
                    dv.net_amount as net_amount,
                    dv.remarks as dv_remarks,
                    dv.status as dv_status,
                    DATE_FORMAT(dv.date_received, '%m/%d/%Y') as dv_date_received,
                    DATE_FORMAT(dv.date_process, '%m/%d/%Y') as dv_date_process,
                    DATE_FORMAT(dv.date_released, '%m/%d/%Y') as dv_date_released
                FROM tbl_obligation ob
                LEFT JOIN po po ON po.id = ob.po_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN tbl_dv_entries dv ON dv.obligation_id = ob.id
                WHERE ob.date_released IS NOT NULL ".$qry1." ".$qry." ORDER BY ob.id DESC";
                // WHERE ob.date_released IS NOT NULL ORDER BY dv.id DESC, ob.id DESC";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'dv_id'             => $row['dv_id'],
                'type'              => strtoupper($row['type']),
                'serial_no'         => $row['serial_no'],
                'po_code'           => !empty($row['po_code']) ? 'PO-'.$row['po_code'] : '---',
                'supplier'          => $row['supplier'],
                'particular'        => $row['purpose'],
                'amount'            => '₱'.number_format($row['amount'], 2),
                'amount1'            =>$row['amount'],
                'remarks'           => $row['remarks'],
                'status'            => $row['status'],
                'date_created'      => $row['date_created'],
                'created_by'        => $row['created_by'],
                'date_updated'      => $row['date_updated'],
                'date_submitted'    => $row['date_submitted'],
                'date_received'     => $row['date_received'],
                'date_obligated'    => $row['date_obligated'],
                'date_returned'     => $row['date_returned'],
                'date_released'     => $row['date_released'],
                'dv_number'         => $row['dv_number'],
                'tax'               => $row['tax'],
                'gsis'              => $row['gsis'],
                'pagibig'           => $row['pagibig'],
                'philhealth'        => $row['philhealth'],
                'other'             => $row['other'],
                'total'             => '₱'.number_format($row['total'], 2),
                'total1'             => $row['total'],
                'net_amount'        => '₱'.number_format($row['net_amount'], 2),
                'net_amount1'        => $row['net_amount'],
                'dv_remarks'        => $row['dv_remarks'],
                'dv_status'         => $row['dv_status'],
                'dv_date_received'  => $row['dv_date_received'],
                'dv_date_process'   => $row['dv_date_process'],
                'dv_date_released'  => $row['dv_date_released'],
                'po_supplier'       => $row['po_supplier']
            ];
        }

        return $data;
    }

    public function getTotalPending() {
        $sql = " SELECT COUNT(id) AS totalPending FROM tbl_obligation WHERE date_released IS NOT NULL AND designation = 1 ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalPending'  => $row['totalPending']
            ];
        }

        return $data;
    }

    public function getTotalReceived() {
        $sql = " SELECT COUNT(id) AS totalReceived FROM tbl_dv_entries WHERE `status` = 'Received' ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalReceived'  => $row['totalReceived']
            ];
        }

        return $data;
    }

    public function getTotalDisbursed() {
        $sql = " SELECT COUNT(id) AS totalDisbursed FROM tbl_dv_entries WHERE `status` = 'Disbursed' ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalDisbursed'  => $row['totalDisbursed']
            ];
        }

        return $data;
    }

    public function getTotalReleased() {
        $sql = " SELECT COUNT(ID) AS totalReleased FROM tbl_dv_entries WHERE `status` = 'Returned' ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalReleased'  => $row['totalReleased']
            ];
        }

        return $data;
    }

    // NTA/NCA Summary

    public function getTotalNta() {
        $sql = " SELECT SUM(`amount`) AS totalNta FROM tbl_nta";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalNta'  => "P ".number_format($row['totalNta'], 2)
            ];
        }

        return $data;
    }

    public function getTotalDisbursedNta() {
        $sql = " SELECT SUM(`obligated`) AS totalDisbursedNta FROM tbl_nta";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalDisbursedNta'  => "P ".number_format($row['totalDisbursedNta'], 2)
            ];
        }

        return $data;
    }

    public function getTotalBalance() {
        $sql = " SELECT (`amount` - `obligated`) AS totalBalance FROM tbl_nta";
        $getQry = $this->db->query($sql);
        
        $total = 0;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $total  = $total + $row['totalBalance'];
        }
        $total = "P ".number_format($total, 2);
        return $total;
    }


    public function fetchNtaUpdate($id)
    {
        $sql = " SELECT `id`, DATE_FORMAT(`nta_date`, '%M %d, %Y') AS nta_date, DATE_FORMAT(`received_date`, '%M %d, %Y') AS received_date, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, DATE_FORMAT(`date_created`, '%M %d, %Y') AS date_created, `status` FROM `tbl_nta` WHERE id = '$id' ";

        $getQry = $this->db->query($sql);
        $row = mysqli_fetch_assoc($getQry);


        return $row;
    }

    public function getNta()
    {   

        $sql = ' SELECT `id`, `nta_number`, `particular` FROM `tbl_nta` ';
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'     => $row['id'],
                'nta_item'  => $row['nta_number'].' - '.$row['particular']
            ];
        }

        return $data;
    }

    public function getLddap()
    {   
        if ($_SESSION['province'] == 10)//batangas
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank" AND province = 3';
        }
        else if  ($_SESSION['province'] == 21)//cavite
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank" AND province = 1';
        }
        else if  ($_SESSION['province'] == 34)//laguna
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank" AND province = 2';
        }
        else if  ($_SESSION['province'] == 56)//quezon
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank" AND ( province = 5 OR province = 6 ) ';
        }
        else if  ($_SESSION['province'] == 58)//rizal
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank" AND province = 4';
        }
        else
        {
            $qry = 'WHERE is_dfunds = true AND  status = "Delivered to Bank"';
        }

        $sql = ' SELECT `id`, `account_no`, `dv_no`, `status`, `date_created`, `lddap`, `remarks`, `lddap_date`, `link`, `disbursed_amount`, `balance`, `fundsource_amount`, `is_dfunds`, `province` FROM `tbl_payment` '.$qry.' ';
        
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'lddap'             => $row['lddap'],
                'lddap_date'        => $row['lddap_date'],
                'disbursed_amount'  => $row['disbursed_amount'],
                'balance'           => $row['balance'],
                'fundsource_amount' => $row['fundsource_amount']
            ];
        }

        return $data;
    }

    function getDvEntries($lddap_id)
    {
        $sql = ' SELECT 
            dv.id AS dv_id,
            dv.obligation_id AS dv_obligation_id,
            dv.dv_number AS dv_number,
            dv.net_amount AS net_amount,
            dv.status AS status,
            DATE_FORMAT(dv.dv_date, "%M %d, %Y") AS dv_date,
            dv.is_dfunds AS dv_is_dfunds,
            p.id AS p_id,
            p.lddap AS p_lddap,
            DATE_FORMAT(p.lddap_date, "%M %d, %Y") AS p_lddap_date,
            p.link AS p_link,
            p.disbursed_amount AS p_disbursed_amount,
            p.balance AS p_balance,
            p.fundsource_amount AS p_fundsource_amount,
            p.is_dfunds AS p_is_dfunds,
            p.province AS p_province 
        FROM tbl_dv_entries dv
        LEFT JOIN tbl_payment p ON p.id =  dv.lddap_id
        WHERE dv.lddap_id = '.$lddap_id.'
        ';

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'id'                    => $result['dv_id'],
                'p_id'                  => $result['p_id'],
                'dv_no'                 => $result['dv_number'],
                'dv_date'               => $result['dv_date'],
                'lddap'                 => $result['p_lddap'],
                'lddap_date'            => $result['p_lddap_date'],
                'disbursed_amount'      => '₱'.number_format($result['p_disbursed_amount'], 2),
                'balance'               => '₱'.number_format($result['p_balance'], 2),
                'fundsource_amount'     => '₱'.number_format($result['p_fundsource_amount'], 2),
                'net_amount'            => '₱'.number_format($result['net_amount'], 2),
                'po_supplier'           => $result['p_province'],
                'status'                => $result['status']
            ];
        }

        return $data;
    }




    public function getNtaSummary($nta_id)
    {
        $sql = "SELECT 
                nta.id AS nta_id,
                nta.dv_id AS nta_dv_id,
                nta.ors_id AS nta_ors_id,
                nta.nta_id AS nta_nta_id,
                nta.disbursed_amount AS nta_disbursed_amount,
                nta.status AS nta_status,
                DATE_FORMAT(nta.date_created, '%m/%d/%Y') AS nta_date_created,
                ob.id AS ob_id,
                ob.serial_no AS ob_serial_no,
                ob.supplier AS ob_supplier,
                ob.address AS ob_address,
                ob.purpose AS ob_purpose,
                ob.amount AS ob_amount,
                DATE_FORMAT(ob.date_created, '%m/%d/%Y') AS ob_date_created,
                dv.id AS dv_id, 
                dv.obligation_id AS dv_obligation_id, 
                dv.dv_number AS dv_number,  
                dv.total AS dv_total, 
                dv.net_amount AS dv_net_amount, 
                dv.remarks AS dv_remarks, 
                dv.status AS dv_status, 
                DATE_FORMAT(dv.date_process, '%m/%d/%Y') AS dv_date_process, 
                dv.dv_date AS dv_date,
                s.supplier_title AS supplier,
                n.id AS n_id,
                n.nta_number AS n_nta_number,
                n.particular AS n_particular,
                n.amount AS n_amount,
                n.obligated AS n_obligated,
                n.balance AS n_balance
                FROM tbl_nta_entries nta
                LEFT JOIN tbl_obligation ob ON ob.id = nta.ors_id
                LEFT JOIN tbl_dv_entries dv ON dv.id = nta.dv_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tbl_nta n ON n.id = nta.nta_id
                WHERE nta_id = ".$nta_id." ORDER BY nta_status ASC
            ";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                "nta_id"                =>$row['nta_id'],
                "nta_dv_id"             =>$row['nta_dv_id'],
                "nta_ors_id"            =>$row['nta_ors_id'],
                "nta_nta_id"            =>$row['nta_nta_id'],
                "nta_disbursed_amount"  =>'₱'.number_format($row['nta_disbursed_amount'], 2),
                "nta_disbursed_amount1" =>$row['nta_disbursed_amount'],
                "nta_status"            =>$row['nta_status'],
                // "nta_status1"           =>!empty($row['nta_status']) ? $row['nta_status'] : 'Processing',
                "nta_date_created"      =>$row['nta_date_created'],
                "ob_id"                 =>$row['ob_id'],
                "ob_serial_no"          =>$row['ob_serial_no'],
                "ob_supplier"           =>$row['ob_supplier'],
                "ob_address"            =>$row['ob_address'],
                "ob_purpose"            =>$row['ob_purpose'],
                "ob_amount"             =>'₱'.number_format($row['ob_amount'], 2),
                "ob_amount1"            =>$row['ob_amount'],
                "ob_date_created"       =>$row['ob_date_created'],
                "dv_id"                 =>$row['dv_id'], 
                "dv_obligation_id"      =>$row['dv_obligation_id'], 
                "dv_number"             =>$row['dv_number'],  
                "dv_total1"             =>$row['dv_total'],  
                "dv_net_amount1"        =>$row['dv_net_amount'], 
                "dv_total"              =>'₱'.number_format($row['dv_total'], 2), 
                "dv_net_amount"         =>'₱'.number_format($row['dv_net_amount'], 2), 
                "dv_remarks"            =>$row['dv_remarks'], 
                "dv_status"             =>$row['dv_status'], 
                "dv_date_process"       =>$row['dv_date_process'], 
                "dv_date"               =>$row['dv_date'],
                "supplier"              =>$row['supplier'],
                "n_id"                  =>$row['n_id'],
                "n_nta_number"          =>$row['n_nta_number'],
                "n_particular"          =>$row['n_particular'],
                "n_amount"              =>'₱'.number_format($row['n_amount'], 2),
                "n_obligated"           =>'₱'.number_format($row['n_obligated'], 2),
                "n_balance"             =>'₱'.number_format($row['n_balance'], 2)
            ];
        }

        return $data;
    }




    public function getNtaDetails($nta_id)
    {
        $sql = "SELECT `id`, `nta_date`, `received_date`, `nta_number`, `saro_number`, `account_number`, `particular`, `quarter`, `amount`, `obligated`, `balance`, `created_by`, `date_created`, `status` FROM `tbl_nta` WHERE id = ".$nta_id." ";
        $getQry = $this->db->query($sql);
        $row = mysqli_fetch_assoc($getQry);

        return $row;
    }

    public function getAccountingDisbursement2($id=null) { 
        $sql = "SELECT 
                    ob.id as id,
                    dv.id AS dv_id,
                    ob.serial_no as serial_no,
                    ob.amount as gross,
                    dv.dv_number as dv_number,
                    dv.total as total_deductions,
                    dv.net_amount as net_amount,
                    CASE 
                        WHEN po.id IS NOT NULL THEN CONCAT('PO-', po.po_no) ELSE '---'
                    END AS po_code
                FROM tbl_dv_entries dv
                LEFT JOIN tbl_obligation ob ON ob.id = dv.obligation_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN po po ON po.id = ob.po_id
                WHERE ob.id IS NOT NULL AND dv.status = 'Disbursed'";

        if (!empty($id)) {
            $sql .= " AND dv.id IN ($id)";
        }
        
        $sql .= " ORDER BY dv.id ASC, ob.id DESC";
                
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'serial_no'         => $row['serial_no'],
                'id'                => $row['id'],
                'dv_id'             => $row['dv_id'],
                'dv_number'         => $row['dv_number'],
                'net_amount'        => '₱'.number_format($row['net_amount'], 2),
                'gross'             => '₱'.number_format($row['gross'], 2),
                'total_deductions'  => '₱'.number_format($row['total_deductions'], 2),
                'p_net_amount'      => $row['net_amount'],
                'p_gross'           => $row['gross'],
                'p_total_deductions'=> $row['total_deductions'],
                'po_code'           => $row['po_code']
            ];
        }

        return $data;
    }

    public function getAccountingDisbursement3($id=null) {
        $sql = "SELECT
                    ob.id as id,
                    dv.id AS dv_id,
                    ob.serial_no as serial_no,
                    ob.amount as gross,
                    dv.dv_number as dv_number,
                    dv.total as total_deductions,
                    dv.net_amount as net_amount,
                    ne.id as ne_id,
                    CASE 
                        WHEN po.id IS NOT NULL THEN CONCAT('PO-', po.po_no) ELSE '---'
                    END AS po_code
                FROM tbl_dv_entries dv
                LEFT JOIN tbl_nta_entries ne ON ne.id = dv.id
                LEFT JOIN tbl_obligation ob ON ob.id = dv.obligation_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN po po ON po.id = ob.po_id
                WHERE ob.id IS NOT NULL";

        if (!empty($id)) {
            $sql .= " AND dv.id IN ($id)";
        }
        
        $sql .= " ORDER BY dv.id ASC, ob.id DESC";
                
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = [
                'serial_no'         => $row['serial_no'],
                'id'                => $row['id'],
                'dv_id'             => $row['dv_id'],
                'dv_number'         => $row['dv_number'],
                'net_amount'        => '₱'.number_format($row['net_amount'], 2),
                'gross'             => '₱'.number_format($row['gross'], 2),
                'total_deductions'  => '₱'.number_format($row['total_deductions'], 2),
                'p_net_amount'      => $row['net_amount'],
                'p_gross'           => $row['gross'],
                'p_total_deductions'=> $row['total_deductions'],
                'po_code'           => $row['po_code']
            ];
        }

        return $data;
    }

    public function getNTAEntries($id=null, $obid=null) { 
            $sql = "
            SELECT 
                ne.id AS ne_id,
                ne.dv_id AS ne_dv_id,
                ne.ors_id AS ne_ors_id,
                ne.nta_id AS ne_nta_id,
                ne.disbursed_amount AS ne_disbursed_amount,
                ne.status AS ne_status,
                ne.date_created AS ne_date_created,
                dv.id AS dv_id,
                dv.dv_number AS dv_number,
                dv.total AS dv_total,
                dv.net_amount AS dv_net_amount,
                ob.id AS ob_id,
                ob.is_dfunds AS ob_is_dfunds,
                ob.serial_no AS ob_serial_no,
                ob.po_id AS ob_po_id,
                ob.supplier AS ob_supplier,
                nta.nta_number AS nta_number,
                nta.particular AS nta_particular,
                nta.amount AS nta_amount,
                nta.balance AS nta_balance
            FROM tbl_nta_entries ne
            LEFT JOIN tbl_nta nta ON nta.id = ne.nta_id
            LEFT JOIN tbl_dv_entries dv ON dv.id = ne.dv_id
            LEFT JOIN tbl_obligation ob ON ob.id = ne.ors_id
           
            ";
            if ($id == null) 
            {
                $sql .= " WHERE ne.status = '' ";
            }
            else
            {
                $sql .= " WHERE ne.id = ".$id;
            }


            if ($obid != null) 
            {
                $sql .= " AND ne.ors_id = ".$obid;
            }
        // echo $sql;     
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'ne_id'                 => $row['ne_id'],
                'dv_id'                 => $row['dv_id'],
                'ob_id'                 => $row['ob_id'],
                'ne_nta_id'             => $row['ne_nta_id'],
                'dv_number'             => $row['dv_number'],
                'ob_is_dfunds'          => $row['ob_is_dfunds'],
                'ob_serial_no'          => $row['ob_serial_no'],
                'ob_supplier'           => $row['ob_supplier'],
                'nta_number'            => $row['nta_number'],
                'nta_particular'        => $row['nta_particular'],
                'nta_amount1'           => $row['ne_disbursed_amount'],
                'nta_amount'            => '₱'.number_format($row['nta_amount'], 2),
                'nta_balance'           => '₱'.number_format($row['nta_balance'], 2),
                'ne_disbursed_amount'   => '₱'.number_format($row['ne_disbursed_amount'], 2),
                'nta_amount2'           => $row['nta_amount'],
                'nta_balance1'          => $row['nta_balance'],
                'disbursed_amount'      => $row['ne_disbursed_amount']
            ];
        }

        return $data;
    }

    public function getDvNTA($ids)
    {
        $sql = "SELECT
                    ne.id AS ne_id,
                    dv.dv_number,
                    dv.obligation_id,
                    na.nta_number,
                    na.particular,
                    na.amount,
                    na.balance,
                    ne.dv_id,
                    ne.disbursed_amount
                FROM tbl_nta_entries ne
                LEFT JOIN tbl_nta na ON na.id = ne.nta_id
                LEFT JOIN tbl_dv_entries dv ON dv.id = ne.dv_id
                WHERE ne.dv_id IN ($ids)";

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[$result['ne_id']] = [
                'dv_id'                 => $result['dv_id'],
                'ne_id'                 => $result['ne_id'],
                'dv_number'             => $result['dv_number'],
                'obligation_id'         => $result['obligation_id'],
                'nta_number'            => $result['nta_number'],
                'amount'                => '₱'.number_format($result['amount'], 2),
                'particular'            => $result['particular'],
                'balance'               => '₱'.number_format($result['balance'], 2),
                'disbursed_amount'      => '₱'.number_format($result['disbursed_amount'], 2),
                'p_nta_amount'                => $result['amount'],
                'p_nta_balance'               => $result['balance'],
                'p_nta_disbursed_amount'      => $result['disbursed_amount']
            ];
        }

        return $data;
    }

    public function getOBPurchaseOrders($id) { 
        $sql = "SELECT 
                    po.id
                FROM tbl_payentries pe
                LEFT JOIN tbl_obligation ob ON ob.id = pe.ob_id
                LEFT JOIN po po ON po.id = ob.po_id
                WHERE pe.pay_id = $id";
                
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            if ($row['id'] != '') 
            {
                $data[] = $row['id'];
            }
        }

        $pos = implode(', ', $data);

        return $pos;
    }

    public function updatePO($ids, $status) { 
        $sql = "UPDATE po set status = $status WHERE id IN ($ids)";
                
        $getQry = $this->db->query($sql);

        return $ids;
    }

    public function createDv($data)
    {
        $sql = ' INSERT INTO `tbl_dv_entries`(`dv_number`, `net_amount`, `remarks`, `status`, `dv_date`, `is_dfunds`, `lddap_id`) VALUES ( "'.$data['dv_number'].'", "'.$data['lddap_amount'].'", "'.$data['remarks'].'", "'.$data['status'].'", "'.$data['dv_date'].'", true, "'.$data['lddap_number'].'") ';
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function updateDv($data)
    {
        $sql = ' UPDATE tbl_dv_entries SET dv_number = "'.$data['dv_number'].'", net_amount = "'.$data['lddap_amount'].'", remarks = "'.$data['remarks'].'", status = "'.$data['status'].'", dv_date = "'.$data['dv_date'].'" WHERE id = '.$data['id'].' ';
        $this->db->query($sql);
    }

    public function selectDV($id)
    {
        $sql = ' SELECT `id`, `obligation_id`, `dv_number`, `tax`, `gsis`, `pagibig`, `philhealth`, `other`, `total`, `net_amount`, `remarks`, `status`, `date_received`, `date_process`, `date_released`, `date_created`, `dv_date`, `lock_na`, `is_dfunds`, `lddap_id` FROM `tbl_dv_entries` WHERE id = '.$id.' ';
        $exec = $this->db->query($sql);
        $item = $exec->fetch_assoc();

        return $item;
    }

    public function lddapEntries($id,$dv_id)
    {
        $sql = ' SELECT 
                    p.id AS id,
                    p.account_no AS account_no,
                    p.dv_no AS dv_no,
                    p.status AS status,
                    p.date_created AS date_created,
                    p.lddap AS lddap,
                    p.remarks AS remarks,
                    DATE_FORMAT(p.lddap_date, "%M %d, %Y") AS lddap_date,
                    p.link AS link,
                    p.disbursed_amount AS disbursed_amount,
                    p.balance AS balance,
                    p.fundsource_amount AS fundsource_amount,
                    p.is_dfunds AS is_dfunds,
                    p.province AS province,
                    dv.net_amount AS dv_amount,
                    p.balance - dv.net_amount AS lddap_balance
                FROM tbl_payment p
                LEFT JOIN tbl_dv_entries dv ON dv.id = '.$dv_id.'
                WHERE p.id = '.$id.' 
                ';

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'id'                    => $result['id'],
                'account_no'            => $result['account_no'],
                'dv_no'                 => $result['dv_no'],
                'status'                => $result['status'],
                'lddap'                 => $result['lddap'],
                'remarks'               => $result['remarks'],
                'lddap_date'            => $result['lddap_date'],
                'disbursed_amount'      => $result['disbursed_amount'],
                'balance'               => $result['balance'],
                'fundsource_amount'     => $result['fundsource_amount'],
                'disbursed_amount1'     => '₱'.number_format($result['disbursed_amount'], 2),
                'balance1'              => '₱'.number_format($result['balance'], 2),
                'fundsource_amount1'    => '₱'.number_format($result['fundsource_amount'], 2),
                'dv_amount'             => '₱'.number_format($result['dv_amount'], 2),
                'lddap_balance'         => '₱'.number_format($result['lddap_balance'], 2)
            ];
        }

        return $data;
    }

    public function getEnduserDisbursement($lddap_id=null)
    {
        if ($_SESSION['province'] == 10)//batangas
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank" AND province = 3';
        }
        else if  ($_SESSION['province'] == 21)//cavite
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank" AND province = 1';
        }
        else if  ($_SESSION['province'] == 34)//laguna
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank" AND province = 2';
        }
        else if  ($_SESSION['province'] == 56)//quezon
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank" AND ( province = 5 OR province = 6 ) ';
        }
        else if  ($_SESSION['province'] == 58)//rizal
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank" AND province = 4';
        }
        else
        {
            $qry = 'WHERE p.is_dfunds = true AND  p.status = "Delivered to Bank"';
        }



        if ($lddap_id != null) 
        {
           $qry = 'WHERE p.id ='.$lddap_id;
        }

        $sql = ' SELECT
                    p.id AS p_id,
                    p.dv_no AS p_dv_no,
                    p.status AS p_status,
                    DATE_FORMAT(p.date_created, "%M %d, %Y") AS p_date_created,
                    p.lddap AS p_lddap,
                    p.remarks AS p_remarks,
                    DATE_FORMAT(p.lddap_date, "%M %d, %Y") AS p_lddap_date,
                    p.link AS p_link,
                    p.disbursed_amount AS p_disbursed_amount,
                    p.balance AS p_balance,
                    p.fundsource_amount AS p_fundsource_amount,
                    p.is_dfunds AS p_is_dfunds,
                    p.province AS p_province,
                    dv.dv_number AS dv_number,
                    ob.purpose AS particular
                FROM
                    tbl_payment p
                LEFT JOIN tbl_dv_entries dv ON 
                    dv.id = p.dv_no
                LEFT JOIN tbl_obligation ob ON
                    ob.id = dv.obligation_id
                '.$qry.'
        ';

        $getQry = $this->db->query($sql);
        $data = [];
        
        while($result = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'id'                    => $result['p_id'],
                'dv_no'                 => $result['dv_number'],
                'lddap'                 => $result['p_lddap'],
                'lddap_date'            => $result['p_lddap_date'],
                'disbursed_amount'      => '₱'.number_format($result['p_disbursed_amount'], 2),
                'balance'               => '₱'.number_format($result['p_balance'], 2),
                'fundsource_amount'     => '₱'.number_format($result['p_fundsource_amount'], 2),
                'po_supplier'           => $result['p_province'],
                'particular'            => $result['particular']
            ];
        }

        return $data;
    }





}
