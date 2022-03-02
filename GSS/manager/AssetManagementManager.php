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
    public function fetchIARNo($year)
    {
        $sql = "SELECT count(*) as count_r FROM pr WHERE YEAR(pr_date) = '$year' order by id desc; ";
        $query = $this->db->query($sql);
        $data = [];
        $current_month = date('m');
        while ($row = mysqli_fetch_assoc($query)) {
            $str = str_replace($year . "-" . $current_month . "-", "", $row['count_r']);
            if ($row['count_r'] == 1) {
                $idGet = (int)$str + 1;
                $pr_no = $year . '-' . $current_month . '-' . '0000' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $pr_no = $year . '-' . $current_month . '-' . '000' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $pr_no = $year . '-' . $current_month . '-' . '00' . $idGet;
            }
            $data = [
                'pr_no' => $pr_no
            ];
        }
        return $data;
    }

    
}
