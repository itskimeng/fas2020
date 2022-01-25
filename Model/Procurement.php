<?php

class Procurement extends Connection
{ 
    public $default_table = 'pr';
    public $default_year = '2022';


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


    public function post_received($data) {
      
        $sql = "UPDATE  $this->default_table 
                SET `received_date`=NOW(),
                    `received_by`='".$data['received_by']."',
                    `stat` = '2'
                WHERE `pr_no` = '".$data['pr_no']."' ";       
        $this->db->query($sql);
        return $data;
    }
}