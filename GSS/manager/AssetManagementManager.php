<?php
class AssetManagementManager  extends Connection
{
    public $conn = '';
    public $default_table = 'iar';
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
    public function fetchIAR()
    {
        $sql = "SELECT * from iar where YEAR(iar_date) = '2022' order by id desc";
        $query = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = [
                'id'    => $row['id'],
                'iar_no'    => $row['iar_no'],
                'iar_date'    => date('F d, Y', strtotime($row['iar_date'])),
                'po_no'    => $row['po_no'],
                'po_date'    => date('F d, Y', strtotime($row['po_date'])),
                'supplier'    => $row['supplier'],
            ];
        }
        return $data;
    }
    public function setPONo()
    {
        $sql = "SELECT id,po_no from po where YEAR(po_date) = 2022 group by po_no";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['po_no'];
        }
        return $data;
    }
    public function fetchRISNo($year)
    {
        $sql = "SELECT count(*) as count_r FROM ris WHERE YEAR(date_aded) = '$year' order by id desc";
        $query = $this->db->query($sql);
        $data = [];
        $current_month = date('m');
        while ($row = mysqli_fetch_assoc($query)) {
            $str = str_replace($year . "-" . $current_month . "-", "", $row['count_r']);
            if ($row['count_r'] == 1) {
                $idGet = (int)$str + 1;
                $ris_no = $year . '-' . $current_month . '-' . '000' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $ris_no = $year . '-' . $current_month . '-' . '00' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $ris_no = $year . '-' . $current_month . '-' . '00' . $idGet;
            }
            $data = [
                'count_r' => $ris_no
            ];
        }
        return $data;
    }
    public function fetchIARNo($year)
    {
        $sql = "SELECT count(*) as count_r FROM iar WHERE YEAR(iar_date) = '$year' order by id desc";
        $query = $this->db->query($sql);
        $data = [];
        $current_month = date('m');
        while ($row = mysqli_fetch_assoc($query)) {
            $str = str_replace($year . "-" . $current_month . "-", "", $row['count_r']);
            if ($row['count_r'] == 1) {
                $idGet = (int)$str + 1;
                $iar_no = $year . '-' . $current_month . '-' . '000' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $iar_no = $year . '-' . $current_month . '-' . '00' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $iar_no = $year . '-' . $current_month . '-' . '00' . $idGet;
            }
            $data = [
                'count_r' => $iar_no
            ];
        }
        return $data;
    }
    public function fetchPRNo($year)
    {
        $sql = "SELECT id,pr_no from pr where YEAR(pr_date) = 2022 and type=6";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['pr_no'];
        }
        return $data;
    }
    public function fetchPARDetails()
    {
        $sql = "SELECT 
        `id`, 
        `article`, 
        `description`, 
        `serial_no`, 
        `property_number`, 
        `date_acquired`, 
        `unit`, 
        `amount`, 
        `property_card`, 
        `physical_count`, 
        `shortage_Q`, 
        `shortage_V`, 
        `remarks`, 
        `status`, 
        `category`, 
        `office`
        FROM `rpcppe` ORDER BY id asc";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                "id" => $row['id'],
                "article" => $row['article'],
                "description" => $row['description'],
                "serial_no" => $row['serial_no'],
                "property_number" => $row['property_number'],
                "date_acquired" => date('F d, Y',strtotime($row['date_acquired'])),
                "unit" => $row['unit'],
                "amount" => $row['amount'],
                "property_card" => $row['property_card'],
                "physical_count" => $row['physical_count'],
                "shortage_Q" => $row['shortage_Q'],
                "shortage_V" => $row['shortage_V'],
                "remarks" => $row['remarks'],
                "status" => $row['status'],
                "category" => $row['category'],
                "office" => $row['office'],
            ];
        }
        return $data;
    }
    public function fetchEmployee()
    {
        $sql = "SELECT EMP_N,FIRST_M,LAST_M from tblemployeeinfo order by LAST_M";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['EMP_N']] = $row['FIRST_M'] . " " . $row['LAST_M'];
        }
        return $data;
    }
    public function fetchCurrentUser($par_id)
    {
        $sql = "SELECT emp.FIRST_M, emp.LAST_M,pos.POSITION_M,d.DIVISION_M from tblemployeeinfo emp 
                left join tbldilgposition pos on pos.POSITION_ID = emp.POSITION_C
                left join tblpersonneldivision d on d.DIVISION_N = emp.DIVISION_C
                left join par_assign pa on pa.emp_id = emp.EMP_N
                left join rpcppe r on r.id = pa.ppe_id
                where r.id = '$par_id'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'current_user' => $row['FIRST_M']." ".$row['LAST_M'],
                'position' => $row['POSITION_M'],
                'office' => $row['DIVISION_M']
            ];
        }
        return $data;
    }
    public function fetchPPEHistory($par_id)
    {
        $sql="SELECT CONCAT( te.FIRST_M, ' ', te.MIDDLE_M, ' ', te.LAST_M ) AS NAME, tp2.DIVISION_M,r.date_acquired, tp.POSITION_M, ph.par_date
            FROM
                par_history ph
            LEFT JOIN tblemployeeinfo te ON  te.EMP_N = ph.emp_id
            LEFT JOIN tbldilgposition tp ON tp.POSITION_ID = te.POSITION_C
            LEFT JOIN tblpersonneldivision tp2 ON  tp2.DIVISION_N = te.DIVISION_C
            LEFT JOIN rpcppe r on r.id = ph.ppe_id
            WHERE
                ph.ppe_id = '$par_id'
            ORDER BY
                ph.id
            DESC
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'end_user' => $row['NAME'],
                'date_acquired' => date('F d, Y',strtotime($row['date_acquired'])),
                'position' => $row['POSITION_M'],
                'office' => $row['DIVISION_M']
            ];
        }
        return $data;
    }
    public function fetchPPEDetails($id)
    {
        $sql = "SELECT r.property_number from rpcppe r where id = '$id'";
        $getQry = $this->db->query($sql);

        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'property_no' => $row['property_number'],
          
            ];
        }
        return $data;
    }
}
