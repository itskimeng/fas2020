<?php

class Obligation extends Connection
{ 
    public $default_table = 'tbl_obligation';
    public $default_table_entry = 'tbl_obentries';

    const TYPE_ORS              = "ors";
    const TYPE_BURS             = "burs";

    const STATUS_DRAFT          = "Draft";
    const STATUS_RELEASED       = "Released";
    const STATUS_RECEIVED       = "Received";
    const STATUS_OBLIGATED      = "Obligated";
    const STATUS_SUBMITTED      = "Submitted";


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

    public function post($data) {
        $sql = "INSERT INTO $this->default_table 
                SET type = '".strtolower($data['type'])."',
                is_dfunds = '".$data['is_dfund']."',
                serial_no = '".$data['serial_no']."',
                po_id = '".$data['po_id']."',
                supplier = '".$data['supplier']."',
                address = '".$data['address']."',
                amount = '".$data['amount']."',
                purpose = '".$data['purpose']."',
                created_by = '".$data['created_by']."',
                date_created = NOW()";
        
        $this->db->query($sql);
        
        return $data;
    }

}