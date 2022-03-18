<?php

class ObjectCodes extends Connection
{ 
    public $default_table = 'tbl_object_codes';

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
        $sql = "SELECT * FROM $this->default_table";

        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_array($getQry)) {
            $data[] = $row; 
        }
        
        return $data;
    }

    public function find($id) {
        $sql = "SELECT * FROM $this->default_table WHERE id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result;
    }

    public function post($data) {
        $sql = "INSERT INTO $this->default_table 
                SET code = '".$data['code']."',
                uacs = '".$data['uacs']."',
                date_created = NOW()";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function update($data, $id) {
        $sql = "UPDATE $this->default_table 
                SET code = '".$data['code']."',
                uacs = '".$data['uacs']."'
                WHERE id = $id"; 
        
        $this->db->query($sql);

        return $data; 
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->default_table WHERE id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function findBy($code, $uacs) {
        $sql = "SELECT
                    id
                FROM
                    tbl_object_codes
                WHERE code
                    = '".$code."' AND uacs = '".$uacs."'
                ORDER BY
                    id
                DESC
                LIMIT 1"; 

        $getQry = $this->db->query($sql);
        $row = mysqli_fetch_assoc($getQry);

        return $row['id'];
    }

}