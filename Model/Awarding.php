<?php
class Awarding extends Connection
{
    public $default_table = 'rfq';
    public $default_year = '2022';

    function __construct()
    {
        if (!isset($this->db)) {
            $conn = new mysqli($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Database is not connected: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }
    
    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";
        $this->db->query($sql);
    }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";
        $this->db->query($sql);
    }
    public function delete($table,$id){
        $sql="DELETE FROM $table";
        $sql .=" WHERE $id ";
        $this->db->query($sql);
    }
    public function select($table,$rows="*",$where = null){
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }
        echo $sql.'<br><br>';
        $this->sql = $result = $this->db->query($sql);
    }

    
}
