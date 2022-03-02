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

    public function insert($data) {

        $sql = "INSERT INTO $this->default_table
                SET account_no = '".$data['acct_no']."',
                date_created = '".$data['today']->format('Y-m-d h:i:s')."',
                lddap = '".$data['lddap']."',
                remarks = '".$data['remarks']."',
                lddap_date = '".$data['today']->format('Y-m-d h:i:s')."',
                link = '".$data['link']."',
                status = 'Draft'";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function update($id, $data) {

        echo $sql = "UPDATE $this->default_table
                SET account_no = '".$data['acct_no']."',
                date_created = '".$data['today']->format('Y-m-d h:i:s')."',
                lddap = '".$data['lddap']."',
                remarks = '".$data['remarks']."',
                lddap_date = '".$data['today']->format('Y-m-d h:i:s')."',
                link = '".$data['link']."',
                status = 'Draft'
                WHERE id = ".$id."
                ";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }



    public function setDVTrigger($id)
    {
        $sql = "UPDATE tbl_dv_entries SET lock_na = true WHERE id = $id";
        $this->db->query($sql);

        return $id;
    }

    public function pay_entry($id)
    {
        echo $sql = "UPDATE $this->default_table SET status = 'Paid' WHERE dv_no = $id";
        $this->db->query($sql);

        return $id;
    }

    public function insertEntry($parent, $dv, $ob=null)
    {
        echo $sql = "INSERT INTO $this->default_table_entry 
                SET pay_id = $parent,
                ob_id = $ob, 
                dv_id = $dv";
        $this->db->query($sql);

        $update_dv = 'UPDATE `tbl_dv_entries` SET `status` = "Received - Cash" WHERE id = '.$dv.' ';
        $this->db->query($update_dv);

    }

    public function deleteEntry($id)
    {

        $select = ' SELECT dv_id FROM tbl_payentries WHERE pay_id = '.$id.' ';
        $exec = $this->db->query($select);
        while ($row = $exec->fetch_assoc()) 
        {
            $update = ' UPDATE tbl_dv_entries SET status = "Disbursed" WHERE id = '.$row['dv_id'].' ';
            $this->db->query($update);
        }

        $sql = ' DELETE FROM `tbl_payentries` WHERE pay_id = '.$id.' ';
        $this->db->query($sql);
    }

    public function updateStatus($id, $status) 
    {
        $sql = "UPDATE $this->default_table SET status = '".$status."' WHERE id = $id";
        $this->db->query($sql);

        return $id;
    }
}