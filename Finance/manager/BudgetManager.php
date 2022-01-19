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
        $sql = "SELECT id, received_by, date, DATE_FORMAT(datereceived, '%m/%d/%Y') as datereceived, DATE_FORMAT(datereprocessed, '%m/%d/%Y') as datereprocessed, DATE_FORMAT(datereturned, '%m/%d/%Y') as datereturned, DATE_FORMAT(datereleased, '%m/%d/%Y') as datereleased, ors, ponum, payee, particular, sum(amount) as amount, remarks, reason, sarogroup, status, IS_GSS, dvstatus 
            FROM saroob  
            WHERE IS_GSS != 'FROM GSS' AND YEAR(datereceived) = '2021'
            GROUP BY ors DESC 
            ORDER BY `saroob`.`date` DESC"; 

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'                => $row['id'],
                'date_received'     => $row['datereceived'],
                'date_obligated'    => $row['datereprocessed'],
                'date_returned'     => $row['datereturned'],
                'date_released'     => $row['datereleased'],
                'ors'               => $row['ors'],
                'ponum'             => $row['ponum'],
                'payee'             => $row['payee'],
                'particular'        => $row['particular'],
                'amount'            => '₱ ' .number_format($row['amount'], 2),
                'remarks'           => $row['remarks'],
                'reason'            => $row['reason'],
                'style'             => '',
                'ors_gss'           => '',
                'status'            => $row['status'],
                'action'            => ''
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
                'amount'    => '₱ ' .number_format($row['amount'], 2)
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

}