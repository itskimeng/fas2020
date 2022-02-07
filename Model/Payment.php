<?php

class Payment extends Connection
{ 
    public $default_table = 'tbl_payment';
    public $default_table_entry = 'tbl_payentries';

    const STATUS_RECEIVED   = "Received";
    const STATUS_PAID       = "Paid";
    const STATUS_RETURNED   = "Returned";

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

    public function fetch($id) {
        $sql = "SELECT * FROM $this->default_table WHERE id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result;
    }

    public function post($acct_no, $dvid, $today, $lddap, $lddap_date, $remarks, $link) {
        $sql = "INSERT INTO $this->default_table
                SET account_no = '".$acct_no."',
                dv_no = '".$dvid."',
                date_created = '".$today->format('Y-m-d h:i:s')."',
                lddap = '".$lddap."',
                remarks = '".$remarks."',
                lddap_date = '".$lddap_date->format('Y-m-d h:i:s')."',
                link = '".$link."',
                status = 'Draft'";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function postEntries($data) {
        $sql = "INSERT INTO $this->default_table_entry 
                SET ob_id = ".$data['ob_id'].",
                fund_source = ".$data['fund_source'].",
                mfo_ppa = '".$data['mfo_ppa']."',
                uacs = ".$data['uacs'].",
                amount = '".$data['amount']."'";

        $this->db->query($sql);
        
        return $data;
    }

    public function update($data, $id) {
        $sql = "UPDATE $this->default_table 
                SET type = '".strtolower($data['type'])."',
                is_dfunds = '".$data['is_dfund']."',
                serial_no = '".$data['serial_no']."',
                po_id = '".$data['po_id']."',
                supplier = '".$data['supplier']."',
                address = '".$data['address']."',
                amount = '".$data['amount']."',
                purpose = '".$data['purpose']."'
                WHERE id = $id";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function clearEntry($id) {
        $sql = "DELETE FROM $this->default_table_entry WHERE ob_id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->default_table WHERE id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function updateStatus($id, $user, $status) {
        $today = new DateTime();

        $sql = "UPDATE $this->default_table SET status = '".$status."'";

        if ($status == 'Submitted') {
            $sql .= ", submitted_by = '".$user."', date_submitted = '".$today->format('Y-m-d h:i:s')."'";    
        }

        if ($status == 'Received') {
            $sql .= ", received_by = '".$user."', date_received = '".$today->format('Y-m-d h:i:s')."'";    
        }

        if ($status == 'Obligated') {
            $sql .= ", obligated_by = '".$user."', date_obligated = '".$today->format('Y-m-d h:i:s')."'";    
        }

        if ($status == 'Released') {
            $sql .= ", released_by = '".$user."', date_released = '".$today->format('Y-m-d h:i:s')."'";    
        }

        if ($status == 'Returned') {
            $sql .= ", returned_by = '".$user."', date_returned = '".$today->format('Y-m-d h:i:s')."'";    
        }

        $sql .= " WHERE id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function setDVTrigger($id)
    {
        $sql = "UPDATE tbl_dv_entries SET lock_na = true WHERE id = $id";
        $this->db->query($sql);

        return $id;
    }

}