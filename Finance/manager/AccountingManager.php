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
        $sql = "SELECT ID,dv,ors,datereceived,date_proccess,datereleased,payee,particular,sum(amount) as amount, total, net, remarks, status,flag,orsdate  FROM disbursement group by ors order by datereceived desc";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'            => $row['ID'],
                'dv'            => $row['dv'],
                'ors'            => $row['ors'],
                'sr'            => $row['sr'],
                'ppa'            => $row['ppa'],
                'uacs'            => $row['uacs'],
                'datereceived'            => $row['datereceived'],
                'timereceived'            => $row['timereceived'],
                'payee'            => $row['payee'],
                'particular'            => $row['particular'],
                'amount'            => $row['amount'],
                'tax'            => $row['tax'],
                'gsis'            => $row['gsis'],
                'pagibig'            => $row['pagibig'],
                'philhealth'            => $row['philhealth'],
                'other'            => $row['other'],
                'total'            => $row['total'],
                'net'            => $row['net'],
                'remarks'            => $row['remarks'],
                'status'            => $row['status'],
                'flag'            => $row['flag'],
                'date_proccess'            => $row['date_proccess'],
                'datereleased'            => $row['datereleased'],
                'orsdate'            => $row['orsdate'],
            ];
        }

        return $data;
    }

    public function getTotalPaid() {
        $sql = " SELECT COUNT(ID) AS totalPaid FROM disbursement WHERE status = 'Paid' ";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'totalPaid'  => $row['totalPaid']
            ];
        }

        return $data;
    }

    public function getTotalReceived() {
        $sql = " SELECT COUNT(ID) AS totalReceived FROM disbursement WHERE `datereceived` != '0000-00-00' ";

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
        $sql = " SELECT COUNT(ID) AS totalDisbursed FROM disbursement WHERE `date_proccess` != '0000-00-00' ";

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
        $sql = " SELECT COUNT(ID) AS totalReleased FROM disbursement WHERE `datereleased` != '0000-00-00' ";

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
