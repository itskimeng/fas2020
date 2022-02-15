<?php

class RFQManager  extends Connection
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
    public function fetch($status)
    {
        $sql = "SELECT
                pr.`id`,
                pr.`pr_no`,
                pr.`pmo`,
                pr.`username`,
                pr.`purpose`,
                pr.`canceled`,
                pr.`canceled_date`,
                pr.`type`,
                pr.`pr_date`,
                pr.`target_date`,
                pr.`submitted_date`,
                pr.`submitted_date_gss`,
                pr.`submitted_by_gss`,
                pr.`submitted_by`,
                pr.`received_date`,
                pr.`received_by`,
                pr.`date_added`,
                pr.`stat`,
                pr.`sq`,
                pr.`aoq`,
                pr.`po`,
                pr.`budget_availability_status`,
                pr.`availability_code`,
                pr.`date_certify`,
                pr.`submitted_date_budget`,
                pr.`is_urgent`,
                i.`abc`,
                i.`qty`
              
                FROM pr
                LEFT JOIN pr_items i on pr.pr_no = i.pr_no
                where  stat  = '$status' and YEAR(date_added) = '2022' 
                GROUP BY pr.pr_no
                order by pr.pr_no desc";
                $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
            $type = $row['type'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18'];
            $lgcdd = ['8', '9', '17'];
            $cavite = ['20', '34', '35', '36', '45'];
            $laguna = ['21', '40', '41', '42', '47', '51', '52'];
            $batangas = ['19', '28', '29', '30', '44'];
            $rizal = ['23', '37', '38', '39', '46', '50'];
            $quezon = ['22', '31', '32', '33', '48', '49', '53'];
            $lucena_city = ['24'];
            if (in_array($office, $fad)) {
                $office = 'FAD';
            } else if (in_array($office, $lgmed)) {
                $office = 'LGMED';
            } else if (in_array($office, $lgcdd)) {
                $office = 'LGCDD';
            } else if (in_array($office, $cavite)) {
                $office = 'CAVITE';
            } else if (in_array($office, $laguna)) {
                $office = 'LAGUNA';
            } else if (in_array($office, $batangas)) {
                $office = 'BATANGAS';
            } else if (in_array($office, $rizal)) {
                $office = 'RIZAL';
            } else if (in_array($office, $quezon)) {
                $office = 'QUEZON';
            } else if (in_array($office, $lucena_city)) {
                $office = 'LUCENA CITY';
            } else if (in_array($office, $ord)) {
                $office = 'ORD';
            }
            if ($type == "1") {
                $type = "Catering Services";
            }
            if ($type == "2") {
                $type = "Meals, Venue and Accommodation";
            }
            if ($type == "3") {
                $type = "Repair and Maintenance";
            }
            if ($type == "4") {
                $type = "Supplies, Materials and Devices";
            }
            if ($type == "5") {
                $type = "Other Services";
            }
            if ($type == "6") {
                $type = "Reimbursement and Petty Cash";
            }
            $data[] = [
                'id'            => $row['id'],
                'pr_no'         => $row['pr_no'],
                'pr_date'       => date('F d, Y', strtotime($row['pr_date'])),
                'target_date'   => date('F d, Y', strtotime($row['target_date'])),
                'office'        => $office,
                'type'          => $type,
                'stat'          => $row['REMARKS'],
                'amount'        => $row['abc'] * $row['qty']

            ];
        }
        return $data;
    }

    public function fetchRFQ()
    {
        $sql ="SELECT
            rfq.`id`,
            rfq.`rfq_no`,
            rfq.`purpose`,
            rfq.`pmo_id`,
            rfq.`rfq_mode_id`,
            rfq.`rfq_date`,
            rfq.`quotation_date`,
            rfq.`warranty`,
            rfq.`price_validity`,
            rfq.`pr_no`,
            rfq.`pr_received_date`,
            rfq.`action_officer`,
            rfq.`other_instructions`,
            rfq.`stat`,
            pr.pr_date,
            pr.target_date,
            pr.stat as status,
            pr.is_urgent,
            s.REMARKS 
        FROM
        `rfq`
        LEFT JOIN `pr` on rfq.pr_no = pr.pr_no
        LEFT JOIN tbl_pr_status s on pr.stat = s.id

        WHERE YEAR(rfq_date) = $this->default_year
        ORDER BY rfq_date desc";
            $getQry = $this->db->query($sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($getQry)) {
                $data[] = [
                    'rfq'       => $row['rfq_no'],
                    'pr_no'     => $row['pr_no'],
                    'rfq_date'  => date('F d, Y',strtotime($row['rfq_date'])),
                    'pr_date'   => date('F d, Y',strtotime($row['pr_date'])),
                    'target_date' => date('F d, Y',strtotime($row['target_date'])),
                    'status'      => $row['status'],
                    'remarks'      => $row['REMARKS'],
                    'urgent'      => $row['is_urgent'],
                ];
            }
            return $data;
    }

    public function generateRFQNo()
    {

        $sql = "SELECT count(rfq_no) as 'count' FROM `rfq` where rfq_no LIKE '%$this->default_year%'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $str = str_replace("2022" ."-", "", $row['count']);

            if ($row['count'] == 1) {
                $idGet = (int)$str + 1;
                $rfq = $year  . '-' . '0000' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $rfq = $year  . '-' . '000' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $rfq = $year  . '-' . '00' . $idGet;
            }
           
            $data = [
                'rfq_no' => $rfq
            ];
        }
        return $data;
    }
    public function fetchSupplier()
    {
        $sql = "SELECT * FROM supplier ORDER BY supplier_title ASC";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['supplier_title'];
        }



        return $data;
    }
}
