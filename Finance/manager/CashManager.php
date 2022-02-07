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

    // public function getCashData() {
    //     $sql = "SELECT * FROM ntaob order by id desc";

    //     $getQry = $this->db->query($sql);
    //     $data = [];

    //     while ($row = mysqli_fetch_assoc($getQry)) {
    //         $data[] = [
    //             'id'            => $row['id'],
    //             'accountno'     => $row['accountno'],
    //             'date'          => $row['date'],
    //             'payee'         => $row['payee'],
    //             'particular'    => $row['particular'],
    //             'dvno'          => $row['dvno'],
    //             'lddap'         => $row['lddap'],
    //             'orsno'         => $row['orsno'],
    //             'ppa'           => $row['ppa'],
    //             'uacs'          => $row['uacs'],
    //             'gross'         => $row['gross'],
    //             'totaldeduc'    => $row['totaldeduc'],
    //             'net'           => $row['net'],
    //             'remarks'       => $row['remarks'],
    //             'status'        => $row['status']
    //         ];
    //     }

    //     return $data;
    // }

    public function getCash() {
        $sql = "SELECT 
                p.id as payid,
                p.account_no,
                de.dv_number,
                s.supplier_title as supplier,
                p.status
                FROM tbl_payment p 
                LEFT JOIN tbl_dv_entries de ON de.id = p.dv_no
                LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                order by p.id desc";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'payid'         => $row['payid'],
                'account_no'    => $row['account_no'],
                'dv_id'         => '',
                'dv_number'     => $row['dv_number'],
                'payee'      => $row['payee'],
                'status'        => $row['status'],
                'flag'          => 1
                
            ];
        }

        return $data;
    }

    public function getDV() {
        $sql = "SELECT 
                de.id as dvid,
                de.dv_number,
                s.supplier_title as supplier,
                de.status
                FROM tbl_dv_entries de 
                LEFT JOIN tbl_obligation ob ON ob.id = de.obligation_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                WHERE de.status = 'Disbursed'
                order by de.id desc";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'payid'         => '',
                'account_no'    => '',
                'dv_id'         => $row['dv_id'],
                'dv_number'     => $row['dv_number'],
                'payee'         => $row['supplier'],
                'status'        => $row['status'],
                'flag'          => 0
            ];
        }

        return $data;
    }






}
