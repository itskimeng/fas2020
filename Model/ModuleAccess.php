<?php

class ModuleAccess extends Connection
{ 
    public $default_table = 'tbl_module_access';


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
        $sql = "SELECT id, module_id, status, moderator_username, date_updated FROM $this->default_table WHERE user_id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result;
    }

}