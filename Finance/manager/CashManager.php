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
                    fs.ppa,
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
                'mfo_ppa'       => $row['ppa'],
                'amount'        => '₱'.number_format($row['amount'], 2),
                'uacs'          => $row['uacs']
            ];
        }

        return $data;   
    }

    //-----------------
    // public function getCash() {
    //     $sql = "SELECT
    //                 de.id AS dvid,
    //                 de.obligation_id AS dv_obligation_id,
    //                 de.dv_number AS dv_dv_number,
    //                 de.tax AS dv_tax,
    //                 de.gsis AS dv_gsis,
    //                 de.pagibig AS dv_pagibig,
    //                 de.philhealth AS dv_philhealth,
    //                 de.other AS dv_other,
    //                 de.total AS dv_total,
    //                 de.net_amount AS dv_net_amount,
    //                 de.remarks AS dv_remarks,
    //                 de.status AS dv_status,
    //                 ob.id AS ob_id,
    //                 ob.serial_no AS ob_serial_no,
    //                 ob.po_id AS ob_po_id,
    //                 ob.address AS ob_address,
    //                 ob.purpose AS ob_purpose,
    //                 ob.amount AS ob_amount,
    //                 s.supplier_title as supplier,
    //                 p.id AS p_id,
    //                 p.account_no AS p_account_no,
    //                 p.dv_no AS p_dv_no,
    //                 p.status AS p_status,
    //                 DATE_FORMAT(p.date_created, '%b %d, %Y %h:%i %p') AS p_date_created,
    //                 p.lddap AS p_lddap,
    //                 p.remarks AS p_remarks,
    //                 DATE_FORMAT(p.lddap_date, '%b %d, %Y %h:%i %p') AS p_lddap_date,
    //                 p.link AS p_link
    //             FROM tbl_dv_entries de
    //             LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
    //             LEFT JOIN supplier s ON s.id = ob.supplier
    //             LEFT JOIN tbl_payment p ON p.dv_no = de.id
    //             WHERE de.status = 'Received - Cash' OR de.status = 'Disbursed'
    //             ORDER BY de.id DESC
    //             ";
    //     $getQry = $this->db->query($sql);
    //     $data = [];

    //     while ($row = mysqli_fetch_assoc($getQry)) {
    //         // $data[$row['dvid']][$row['alias']] = [
    //         $data[] = [
    //             'id'              => $row['p_id'],
    //             'dvid'              => $row['dvid'],
    //             'ob_id'           => $row['dv_obligation_id'],
    //             'p_lddap'         => $row['p_lddap'],
    //             'p_lddap_date'    => $row['p_lddap_date'],
    //             'dv_dv_number'    => $row['dv_dv_number'],
    //             'supplier'        => $row['supplier'],
    //             'p_status'        => $row['p_status'],
    //             'dv_status'       => $row['dv_status'],
    //             'p_link'          => $row['p_link'],
    //             'ob_serial_no'    => $row['ob_serial_no'],
    //             'dv_total'        => '₱'.number_format($row['dv_total'], 2),
    //             'dv_net_amount'   => '₱'.number_format($row['dv_net_amount'], 2),
    //             'ob_purpose'      => $row['ob_purpose'],
    //             'ob_amount'       => '₱'.number_format($row['ob_amount'], 2),
    //             'flag'            => 1
    //         ];
    //     }
    //     return $data;
    // }


    //-----------------

    public function getCash() {

        $sql = "SELECT `id`, `account_no`, `dv_no`, `status`, `date_created`, `lddap`, `remarks`, DATE_FORMAT(`lddap_date`, '%M %d, %y') AS lddap_date, `link` FROM `tbl_payment`";
        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            // $data[$row['dvid']][$row['alias']] = [
            $data[] = [
                'id'              => $row['id'],
                'account_no'      => $row['account_no'],
                'dv_no'           => $row['dv_no'],
                'status'          => $row['status'],
                'date_created'    => $row['date_created'],
                'lddap'           => $row['lddap'],
                'remarks'         => $row['remarks'],
                'lddap_date'      => $row['lddap_date'],
                'link'            => $row['link'],
                'flag'            => 1
            ];
        }
        return $data;
    }
    //----------------

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

    public function getDVLIst() 
    {
        $sql = "SELECT
                    de.id as dvid,
                    ob.serial_no as ob_no,
                    s.supplier_title as supplier,
                    ob.purpose as particulars,
                    ob.amount as gross,
                    de.dv_number as dv_number,
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
                LEFT JOIN tbl_payment p ON p.dv_no = de.id";
        
        $getQry = $this->db->query($sql);
        $data = [];

        while($row = mysqli_fetch_assoc($getQry)){
            $data[] = [
                'code'          => $row['dv_no'],
                'ob_num'        => $row['ob_no'],
                'gross'         => $row['gross'],
                'deductions'    => $row['deductions'],
                'net_amount'    => $row['net_amount']
            ];
        }
        
        return $data;        
    }


    public function getLDDAPDetails($id) 
    {
        $sql = "SELECT
                    id,
                    account_no,
                    DATE_FORMAT(date_created, '%m/%d/%Y') AS date_created,
                    DATE_FORMAT(lddap_date, '%m/%d/%Y') AS lddap_date,
                    lddap,
                    remarks,
                    link
                FROM
                    tbl_payment
                WHERE
                    id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_assoc($getQry);
        
        return $result;
    }

    public function getLDDAPEntries($id) 
    {
        $sql = "SELECT
                    id, dv_id, ob_id
                FROM
                    tbl_payentries
                WHERE
                    pay_id = $id";
                    
        $getQry = $this->db->query($sql);
        $ids = [];
        while($row = mysqli_fetch_assoc($getQry)){
            $ids['dvs'][] = $row['dv_id'];
            $ids['obs'][] = $row['ob_id'];   
        }
        
        return $ids;
    }



    public function receiving()
    {
        $sql = ' SELECT COUNT(`id`) AS for_receiving FROM `tbl_dv_entries` WHERE status = "Disbursed" ';
        $exec = $this->db->query($sql);
        $row = $exec->fetch_assoc();

        return $row;
    }

    public function draft()
    {
        $sql = ' SELECT COUNT(`id`) AS draft FROM `tbl_payment` WHERE status = "Draft" ';
        $exec = $this->db->query($sql);
        $row = $exec->fetch_assoc();

        return $row;
    }

    public function paid()
    {
        $sql = ' SELECT COUNT(`id`) AS paid FROM `tbl_payment` WHERE status = "Paid" ';
        $exec = $this->db->query($sql);
        $row = $exec->fetch_assoc();

        return $row;
    }

    public function returned()
    {
        $sql = ' SELECT COUNT(`id`) AS returned FROM `tbl_payment` WHERE status = "Returned" ';
        $exec = $this->db->query($sql);
        $row = $exec->fetch_assoc();

        return $row;
    }


}
