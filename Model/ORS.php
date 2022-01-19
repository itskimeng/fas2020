<?php

class ORS extends Connection
{ 
    public $default_table = 'saroobburs';


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
        $sql = "SELECT * FROM $this->default_table EMP_N = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result;
    }

}