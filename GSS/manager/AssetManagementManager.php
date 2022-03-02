<?php
class AssetManagementManager  extends Connection
{
    public $conn = '';
    public $default_table = 'app';
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

     public function setPONo()
    {
        $sql = "SELECT id,po_no from po where YEAR(po_date) = 2022 ";

        $getQry = $this->db->query($sql);
        $data = [];


        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['po_no'];
        }


        return $data;
    }
    
}
