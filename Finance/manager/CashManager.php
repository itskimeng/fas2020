<?php

class CashManager extends Connection
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

    public function getDVData($id) 
    {
        $sql = "SELECT
                de.id as dvid,
                ob.serial_no as dv_no,
                s.supplier_title as supplier,
                ob.purpose as particulars,
                ob.amount as gross,
                de.dv_number as de_dv_number,
                de.total as total_deductions,
                de.net_amount as net_amount,
                de.obligation_id,
                p.account_no AS p_account_no,
                p.dv_no AS p_dv_no,
                p.status AS p_status,
                DATE_FORMAT(p.date_created, '%m/%d/%Y') AS p_date_created,
                p.lddap AS p_lddap,
                p.remarks AS p_remarks,
                DATE_FORMAT(p.lddap_date, '%m/%d/%Y') AS p_lddap_date,
                p.link AS p_link
                FROM tbl_dv_entries de
                LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tbl_payment p ON p.dv_no = de.id
                WHERE de.id = $id";
        
        $getQry = $this->db->query($sql);
        // $data = [];

        $result = mysqli_fetch_assoc($getQry);

        return $result;        
    }

    public function getDVFundsource($id) 
    {
        $sql = "SELECT
                oe.fund_source,
                oe.mfo_ppa,
                oe.amount,
                fe.uacs as uacs,
                oe.amount as amount,
                fs.source as fund_source
                FROM tbl_obentries oe
                LEFT JOIN tbl_obligation ob ON ob.id = oe.ob_id
                LEFT JOIN tbl_fundsource_entry fe ON fe.id = oe.uacs
                LEFT JOIN tbl_fundsource fs ON fs.id = fe.source_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                WHERE oe.ob_id = $id";
        
        $getQry = $this->db->query($sql);
        $data = [];

        while($row = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'fund_source'   => $row['fund_source'],
                'mfo_ppa'       => $row['mfo_ppa'],
                'amount'        => '₱'.number_format($row['amount'], 2),
                'uacs'          => $row['uacs']
            ];
        }

        return $data;   
    }

    // public function getCash() {
    //     $sql = "SELECT 
    //             p.id as payid,
    //             p.account_no,
    //             de.dv_number,
    //             de.tax AS de_tax,
    //             de.gsis AS de_gsis,
    //             de.pagibig AS de_pagibig,
    //             de.philhealth AS de_philhealth,
    //             de.other AS de_other,
    //             de.total AS de_total,
    //             de.net_amount AS de_net_amount,
    //             DATE_FORMAT(p.date_created, '%b %d, %Y %h:%i %p') as date_created,
    //             s.supplier_title as supplier,
    //             p.status,
    //             p.lddap,
    //             DATE_FORMAT(p.lddap_date, '%b %d, %Y %h:%i %p') as lddap_date,
    //             p.link,
    //             ob.serial_no AS ob_serial_no,
    //             ob.po_id AS ob_po_id,
    //             ob.supplier AS ob_supplier,
    //             ob.address AS ob_address,
    //             ob.purpose AS ob_purpose,
    //             ob.amount AS ob_amount
    //             FROM tbl_payment p 
    //             LEFT JOIN tbl_dv_entries de ON de.id = p.dv_no
    //             LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
    //             LEFT JOIN supplier s ON s.id = ob.supplier
    //             order by p.id desc";

    //     $getQry = $this->db->query($sql);
    //     $data = [];

    //     while ($row = mysqli_fetch_assoc($getQry)) {
    //         $data[] = [
    //             'payid'         => $row['payid'],
    //             'account_no'    => $row['account_no'],
    //             'date_created'  => $row['date_created'],
    //             'dv_id'         => '',
    //             'dv_number'     => $row['dv_number'],
    //             'payee'         => $row['supplier'],
    //             'status'        => $row['status'],
    //             'lddap'         => $row['lddap'],
    //             'lddap_date'    => $row['lddap_date'],
    //             'link'          => $row['link'],
    //             'ob_serial_no'  => $row['ob_serial_no'],
    //             'de_total'      => $row['de_total'],
    //             'de_net_amount' => $row['de_net_amount'],
    //             'flag'          => 1
                
    //         ];
    //     }

    //     return $data;
    // }

    // public function getDV() {
    //     $sql = "SELECT 
    //             de.id as dvid,
    //             de.dv_number,
    //             s.supplier_title as supplier,
    //             de.status
    //             FROM tbl_dv_entries de 
    //             LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
    //             LEFT JOIN supplier s ON s.id = ob.supplier
    //             WHERE de.status in ('Disbursed', 'Received - Cash') AND de.lock_na = false
    //             order by de.id desc";

    //     $getQry = $this->db->query($sql);
    //     $data = [];

    //     while ($row = mysqli_fetch_assoc($getQry)) {
    //         $data[] = [
    //             'payid'         => '',
    //             'account_no'    => '',
    //             'dvid'         => $row['dvid'],
    //             'dv_number'     => $row['dv_number'],
    //             'payee'         => $row['supplier'],
    //             'status'        => $row['status'],
    //             'flag'          => 0
    //         ];
    //     }

    //     return $data;
    // }


    //-----------------
    public function getCash() {
        $sql = "SELECT
        de.id AS dvid,
        de.obligation_id AS dv_obligation_id,
        de.dv_number AS dv_dv_number,
        de.tax AS dv_tax,
        de.gsis AS dv_gsis,
        de.pagibig AS dv_pagibig,
        de.philhealth AS dv_philhealth,
        de.other AS dv_other,
        de.total AS dv_total,
        de.net_amount AS dv_net_amount,
        de.remarks AS dv_remarks,
        de.status AS dv_status,
        ob.id AS ob_id,
        ob.serial_no AS ob_serial_no,
        ob.po_id AS ob_po_id,
        ob.address AS ob_address,
        ob.purpose AS ob_purpose,
        ob.amount AS ob_amount,
        s.supplier_title as supplier,
        p.id AS p_id,
        p.account_no AS p_account_no,
        p.dv_no AS p_dv_no,
        p.status AS p_status,
        DATE_FORMAT(p.date_created, '%b %d, %Y %h:%i %p') AS p_date_created,
        p.lddap AS p_lddap,
        p.remarks AS p_remarks,
        DATE_FORMAT(p.lddap_date, '%b %d, %Y %h:%i %p') AS p_lddap_date,
        p.link AS p_link
        -- ne.id AS ne_id,
        -- ne.dv_id AS ne_dv_id,
        -- ne.ors_id AS ne_ors_id,
        -- ne.nta_id AS ne_nta_id,
        -- ne.disbursed_amount AS ne_disbursed_amount,
        -- n.id AS n_id,
        -- n.nta_number AS n_nta_number,
        -- n.particular AS n_particular,
        -- n.amount AS n_amount,
        -- n.obligated AS n_obligated
        FROM tbl_dv_entries de
        LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
        LEFT JOIN supplier s ON s.id = ob.supplier
        LEFT JOIN tbl_payment p ON p.dv_no = de.id
        -- LEFT JOIN tbl_nta_entries ne ON ne.dv_id = de.id
        -- LEFT JOIN tbl_nta n ON n.id = ne.nta_id
        WHERE de.status = 'Received - Cash' OR de.status = 'Disbursed'
        ORDER BY de.id DESC
                ";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'              => $row['p_id'],
                'ob_id'           => $row['dv_obligation_id'],
                'dvid'            => $row['dvid'],
                'p_lddap'         => $row['p_lddap'],
                'p_lddap_date'    => $row['p_lddap_date'],
                'dv_dv_number'    => $row['dv_dv_number'],
                'supplier'        => $row['supplier'],
                'p_status'        => $row['p_status'],
                'dv_status'       => $row['dv_status'],
                'p_link'          => $row['p_link'],
                'ob_serial_no'    => $row['ob_serial_no'],
                'dv_total'        => '₱'.number_format($row['dv_total'], 2),
                'dv_net_amount'   => '₱'.number_format($row['dv_net_amount'], 2),
                'ob_purpose'      => $row['ob_purpose'],
                'ob_amount'       => '₱'.number_format($row['ob_amount'], 2),
                'flag'            => 1
            ];
        }

        return $data;
    }


    //-----------------


    public function updateDVStatus($id) 
    {
        $sql = "UPDATE tbl_dv_entries SET status = 'Received - Cash' WHERE id = $id";
        $this->db->query($sql);


        $insert_entry = ' INSERT INTO `tbl_payment`(`dv_no`, `status`) VALUES ('.$id.', "Draft") ';
        $this->db->query($insert_entry);

        return $id;
    }


    public function getNTAData($id) 
    {
        $sql = "SELECT
                ne.id AS ne_id,
                ne.dv_id AS ne_dv_id,
                ne.ors_id AS ne_ors_id,
                ne.nta_id AS ne_nta_id,
                n.nta_number AS n_nta_number,
                n.particular AS n_particular,
                n.amount AS n_amount,
                n.balance AS n_balance,
                ne.disbursed_amount AS ne_disbursed_amount
                FROM tbl_nta_entries ne
                LEFT JOIN tbl_nta n ON n.id = ne.nta_id
                WHERE ne.dv_id = $id";
        
        $getQry = $this->db->query($sql);
        $data = [];

        while($row = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'id'   => $row['ne_id'],
                'nta_number'       => $row['n_nta_number'],
                'particular'       => $row['n_particular'],
                'amount'        => '₱'.number_format($row['n_amount'], 2),
                'balance'        => '₱'.number_format($row['amount'], 2),
                'disbursed'          => $row['amount']
            ];
        }

        return $data;   
    }




}
