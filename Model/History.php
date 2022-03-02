<?php 

class History extends Connection
{
    public $default_table = 'tbl_finance_history';


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

    public function post_history($user_id, $menu_id, $ob_id, $dv_id, $pay_id, $action, $message) {
        $sql = "INSERT INTO $this->default_table 
                SET user_id = '".$user_id."',
                menu_id = '".$menu_id."',
                ob_id = '".$ob_id."',
                dv_id = '".$dv_id."',
                pay_id = '".$pay_id."',
                action = '".$action."',
                message = '".$message."',
                date_created = NOW()";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }



}