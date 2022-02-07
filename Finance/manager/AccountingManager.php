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
        $sql = "SELECT * FROM nta order by id desc";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'            => $row['id'],
                'datenta'      => $row['datenta'],
                'datereceived' => $row['datereceived'],
                'accountno'     => $row['accountno'],
                'ntano'         => $row['ntano'],
                'saronumber'    => $row['saronumber'],
                'particular'    => $row['particular'],
                'amount'       => $row['amount'],
                'obligated'    => $row['obligated'],
                'balance'      => $row['balance']
            ];
        }

        return $data;
    }


    public function getAccountingDisbursement() {
        // $sql = "SELECT ID,dv,ors,datereceived,date_proccess,datereleased,payee,particular,sum(amount) as amount, total, net, remarks, status,flag,orsdate  FROM disbursement group by ors order by datereceived desc";

        // $getQry = $this->db->query($sql);
        // $data = [];

        // while ($row = mysqli_fetch_assoc($getQry)) {
        //     $data[] = [
        //         'id'            => $row['ID'],
        //         'dv'            => $row['dv'],
        //         'ors'            => $row['ors'],
        //         'sr'            => $row['sr'],
        //         'ppa'            => $row['ppa'],
        //         'uacs'            => $row['uacs'],
        //         'datereceived'            => $row['datereceived'],
        //         'timereceived'            => $row['timereceived'],
        //         'payee'            => $row['payee'],
        //         'particular'            => $row['particular'],
        //         'amount'            => $row['amount'],
        //         'tax'            => $row['tax'],
        //         'gsis'            => $row['gsis'],
        //         'pagibig'            => $row['pagibig'],
        //         'philhealth'            => $row['philhealth'],
        //         'other'            => $row['other'],
        //         'total'            => $row['total'],
        //         'net'            => $row['net'],
        //         'remarks'            => $row['remarks'],
        //         'status'            => $row['status'],
        //         'flag'            => $row['flag'],
        //         'date_proccess'            => $row['date_proccess'],
        //         'datereleased'            => $row['datereleased'],
        //         'orsdate'            => $row['orsdate'],
        //     ];
        // }

        // return $data;

        //new

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
                DATE_FORMAT(ob.date_updated, '%m/%d/%Y') as date_updated,
                DATE_FORMAT(ob.date_submitted, '%m/%d/%Y') as date_submitted,
                DATE_FORMAT(ob.date_received, '%m/%d/%Y') as date_received,
                DATE_FORMAT(ob.date_obligated, '%m/%d/%Y') as date_obligated,
                DATE_FORMAT(ob.date_returned, '%m/%d/%Y') as date_returned,
                DATE_FORMAT(ob.date_released, '%m/%d/%Y') as date_released,
                ob.designation as designation,
                po.code as po_code,
                s.supplier_title as supplier,
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
                LEFT JOIN tbl_potest po ON po.id = ob.po_id
                LEFT JOIN supplier s ON s.id = ob.supplier
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = ob.created_by
                LEFT JOIN tbl_dv_entries dv ON dv.obligation_id = ob.id
                WHERE ob.date_released IS NOT NULL
                ";

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
                'net_amount'        => '₱'.number_format($row['net_amount'], 2),
                'dv_remarks'        => $row['dv_remarks'],
                'dv_status'         => $row['dv_status'],
                'dv_date_received'  => $row['dv_date_received'],
                'dv_date_process'   => $row['dv_date_process'],
                'dv_date_released'  => $row['dv_date_released']
            ];
        }

        return $data;
    }

    public function getTotalPending() {
        $sql = " SELECT COUNT(id) AS totalPending FROM tbl_obligation WHERE date_released IS NOT NULL AND designation = 0 ";

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

}
