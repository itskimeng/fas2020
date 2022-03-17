<?php 

class History extends Connection
{
    public $default_table = 'tbl_finance_history';

    // public $user_id = 'users_id';
    // public $chair = NULL;

    function __construct() {
        // $this->table = TRUE;
        // $this->chair = FALSE;
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
        $sql = "SELECT 
                h.id,
                ob.serial_no AS ob_code,
                CONCAT(e.FIRST_M, ' ', LEFT(e.MIDDLE_M, 1), '. ', e.LAST_M) AS username,
                h.action,
                h.message AS remarks,
                DATE_FORMAT(h.date_created, '%Y-%m-%d %H:%i:%s') as action_date,
                DATE_FORMAT(h.date_created, '%b %d, %Y %h:%i %p') as date_created,
                CASE 
                    WHEN h.menu_id = 1 THEN 'Obligation'
                    WHEN h.menu_id = 2 THEN 'Disbursement'
                    WHEN h.menu_id = 3 THEN 'Payment'
                END AS menu_id 
                FROM $this->default_table h
                LEFT JOIN tbl_obligation ob ON ob.id = h.ob_id
                LEFT JOIN tbl_dv_entries dv ON dv.id = h.dv_id
                LEFT JOIN tbl_payment py ON py.id = h.pay_id
                LEFT JOIN tblemployeeinfo e ON e.EMP_N = h.user_id
                WHERE h.ob_id = $id
                ORDER BY h.id DESC";

        $getQry = $this->db->query($sql);

        $date_today = new DateTime();
        $date_today = date('Y-m-d H:i:s', strtotime($date_today->format('Y-m-d H:i:s')));

        // $result = mysqli_fetch_array($getQry);

        $data = [];

        while ($result = mysqli_fetch_assoc($getQry)) {
            $date1=date_create($date_today);
            $date2=date_create($result['action_date']);
            $interval = date_diff($date1, $date2);

            if ($interval->y > 0) {
                $interval = $interval->y .' year(s) ago';
            } elseif ($interval->m > 0) {
                $interval = $interval->m .' month(s) ago';
            } elseif ($interval->d > 0) {
                $interval = $interval->d .' day(s) ago';
            } elseif ($interval->h > 0) {
                $interval = $interval->h .' hour(s) ago';
            } elseif ($interval->i > 0) {
                $interval = $interval->s .' min(s) ago';
            } else {
                $interval = $interval->s .' sec(s) ago';
            }

            $data[] = [
                'name'          => ucwords(strtolower($result['username'])),
                'action'        => $result['action'],
                'interval'      => $interval,
                'action_date'   => $result['date_created'],
                'remarks'       => $result['remarks'],
                'menu'          => $result['menu_id']
            ];
        }
        
        return $data;
    }

    public function post_history($user_id, $menu_id, $ob_id, $dv_id, $pay_id, $action, $message) {
        $sql = "INSERT INTO $this->default_table 
                SET user_id  = '".$user_id."',
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