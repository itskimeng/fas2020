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
                i.`qty`,
                sum(i.qty * i.abc) as ABC
              
                FROM pr
                LEFT JOIN pr_items i on pr.pr_no = i.pr_no
                where  stat  = '$status' and YEAR(date_added) = '2022' 
                GROUP BY pr.pr_no
                order by pr.pr_no asc";
                
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
                'amount'        => '₱'.number_format($row['ABC'],2)

            ];
        }
        return $data;
    }
    public function fetchRFQ()
    {
            $sql = "SELECT
            rfq.`id` as 'rfq_id',
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
            rfq.`is_awarded`,
            pr.pr_date,
            pr.target_date,
            pr.stat as status,
            pr.is_urgent,
            s.REMARKS,
            i.items as 'rfq_items',
            aq.abstract_no,
            supp.supplier_title,
            po.po_no

        FROM
        `rfq`
        LEFT JOIN `pr` on rfq.pr_no = pr.pr_no
        LEFT JOIN `pr_items` i on pr.pr_no = i.pr_no
        LEFT JOIN tbl_pr_status s on pr.stat = s.id
        LEFT JOIN rfq r on pr.pr_no = r.pr_no
        LEFT JOIN abstract_of_quote aq on r.id = aq.rfq_id
        LEFT JOIN supplier supp on  supp.ID = aq.supplier_id
        LEFT JOIN po on r.rfq_no = po.rfq_no


        WHERE YEAR(r.rfq_date) =$this->default_year
        GROUP by r.rfq_no

        ORDER BY r.rfq_no desc";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'rfq'       => $row['rfq_no'],
                'abstract_no'       => $row['abstract_no'],
                'po_no'       => $row['po_no'],
                'winner_supplier'       => $row['supplier_title'],
                'rfq_id'       => $row['rfq_id'],
                'rfq_items'       => $row['rfq_items'],
                'pr_no'     => $row['pr_no'],
                'rfq_date'  => date('F d, Y', strtotime($row['rfq_date'])),
                'pr_date'   => date('F d, Y', strtotime($row['pr_date'])),
                'target_date' => date('F d, Y', strtotime($row['target_date'])),
                'status'      => $row['status'],
                'remarks'      => $row['REMARKS'],
                'urgent'      => $row['is_urgent'],
                'is_awarded'      => $row['is_awarded'],
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
            $str = str_replace("2022" . "-", "", $row['count']);

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
    public function fetchRFQID($rfq_no)
    {
        $sql = "SELECT
            rfq.`id` as 'rfq_id'
        FROM
        `rfq`
        WHERE rfq_no  ='$rfq_no'";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = [
                'id'       => $row['rfq_id'],
            ];
        }
        return $data;
    }
    public function generatePONo()
    {
        $sql = "SELECT count(*) as 'count' FROM `po` where YEAR(noa_date) = '$this->default_year'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $str = str_replace("2022" . "-", "", $row['count']);

            if ($row['count'] == 1) {
                $idGet = (int)$str + 1;
                $po = $year  . '-' .date('m').'-0000' . $idGet;
            } else if ($row['count_r'] <= 99) {
                $idGet = (int)$str + 1;

                $po = $year  . '-' .date('m'). '-000' . $idGet;
            } else {
                $idGet = (int)$str + 1;

                $po = $year  . '-' .date('m'). '-00' . $idGet;
            }

            $data = [
                'po_no' => $po
            ];
        }
        return $data;
    }
    public function generateAbstractNo()
    {
        $sql = "SELECT count(id) as 'abstract_no' FROM `abstract_of_quote` where YEAR(date_created) LIKE '%$this->default_year%'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $year = $this->default_year;
            $abstract_no = $row['abstract_no'];
            if ($abstract_no == 0) {
                $count = (int)$abstract_no + 1;
                $abstract_no = '2022' . '-000' . $count;
            } else if ($abstract_no <= 10) {
                $count = (int)$abstract_no + 1;

                $abstract_no = '2022' . '-000' . $count;
            } else {
                $count = (int)$abstract_no + 1;

                $abstract_no = '2022' . '-000' . $count;
            }

            $data = [
                'abstract_no' => $abstract_no
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
    public function fetchLatestRFQID()
    {
        $sql = "SELECT id FROM rfq order by id desc limit 1";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $rfq_id = $row['id'] + 1;
            $data = [
                'rfq_id' => $rfq_id
            ];
        }

        return $data;
    }
    public function checkRFQ($rfq_no)
    {
        $sql = "SELECT id,is_awarded FROM rfq where rfq_no = '$rfq_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $is_awarded = $row['is_awarded'];
            $data = [
                'rfq_awarded' => $is_awarded
            ];
        }
        return $data;
    }
    public function fetchRFQDetails($pr_no, $rfq_no)
    {
        $sql = "SELECT
                pr.id,
                item.item_unit_title,
                app.procurement,
                app.id as item_id,
                pr.unit,
                pr.qty,
                pr.abc,
                pr.description,
                rfq.rfq_date,
                rfq.rfq_no,
                rfq.purpose,
                i.pmo,
                rfq.pr_no,
                rfq.pr_received_date
            FROM
                pr_items pr
            LEFT JOIN app ON app.id = pr.items
            LEFT JOIN item_unit item ON
                item.id = pr.unit
            LEFT JOIN pr i ON
                i.pr_no = pr.pr_no
            LEFT JOIN rfq ON rfq.pr_no = i.pr_no
            WHERE
                    pr.pr_no = '" . $pr_no . "' and rfq.rfq_no  = '" . $rfq_no . "' ";
        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
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
            $data = [
                'id'  => $count . '.',
                'item_id'  => $row['item_id'],
                'rfq_no'  => $row['rfq_no'],
                'item'  => $row['procurement'],
                'desc'  => mb_strimwidth($row['description'], 0, 13, "..."),
                'unit'  => $row['unit'],
                'qty'  => $row['qty'],
                'cost'  => $row['abc'],
                'total'  => number_format($row['qty'] * $row['abc'], 2),
                'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
                'purpose'   => $row['purpose'],
                'office'    => $office,
                'pr_no'     => $pr_no,
                'status'    => ''

            ];
            $count++;
        }
        return $data;
    }
    public function fetchRFQItems($pr_no)
    {
        $sql = "SELECT
            pr.id,
            item.item_unit_title,
            app.procurement,
            app.id as item_id,
            pr.unit,
            pr.qty,
            pr.abc,
            pr.description,
            rfq.rfq_date,
            rfq.rfq_no,
            rfq.purpose,
            pr.pmo,
            rfq.pr_no,
            rfq.pr_received_date,
            rfq.id as 'rfq_id'
        FROM
            pr_items pr
        LEFT JOIN app ON app.id = pr.items
        LEFT JOIN item_unit item ON item.id = pr.unit
        LEFT JOIN pr i ON  i.pr_no = pr.pr_no
        LEFT JOIN rfq ON rfq.pr_no = i.pr_no
        
        WHERE
                pr.pr_no = '" . $pr_no . "'";



        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
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
            $data[] = [
                'id'  => $count . '.',
                'item_id'  => $row['item_id'],
                'rfq_id'  => $row['rfq_id'],
                'rfq_no'  => $row['rfq_no'],
                'item'  => $row['procurement'],
                'desc'  => mb_strimwidth($row['description'], 0, 13, "..."),
                'description'  => $row['description'],
                'unit'  => $row['unit'],
                'qty'  => $row['qty'],
                'cost'  => $row['abc'],
                'total'  => number_format($row['qty'] * $row['abc'], 2),
                'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
                'purpose'   => $row['purpose'],
                'office'    => $office,
                'pr_no'     => $pr_no,
                'status'    => ''

            ];
            $count++;
        }
        return $data;
    }
    public function fetchSupplierQuote($rfq_no)
    {
        $sql = " SELECT
                    sq.rfq_no,
                    a.procurement,
                    a.id AS item_id,
                    sq.ppu AS 'price_per_unit',
                    s.supplier_title
                FROM
                    `supplier_quote` sq
                LEFT JOIN supplier s ON
                    s.id = sq.supplier_id
                LEFT JOIN rfq_items ri ON
                    ri.app_id = sq.rfq_item_id
                                        LEFT JOIN app a on a.id = ri.app_id
                
                LEFT JOIN rfq r ON
                    r.id = ri.rfq_id
                LEFT JOIN rfq rr ON
                    rr.rfq_no = sq.rfq_no
                WHERE
                    sq.rfq_no = '$rfq_no'
                GROUP BY a.procurement";

        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'item' => $row['procurement'],
                'item_id' => $row['item_id'],
                'supplier' => $row['supplier_title'],
                'supp_price' => $row['price_per_unit']
            ];
        }

        return $data;
    }
    public function fetchSelectedSupplier($rfq_no)
    {
        $sql = "SELECT
                    s.supplier_title,
                    sq.ppu as 'price_per_unit'

                FROM
                    `supplier_quote` sq
                    LEFT JOIN supplier s on s.id = sq.supplier_id
                    LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
                    LEFT JOIN rfq r on r.id = ri.rfq_id
                    LEFT JOIN app a on a.id = ri.app_id
                    where r.rfq_no = '$rfq_no' ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'supplier' => $row['supplier_title'],
                'supp_price' => $row['price_per_unit']

            ];
        }

        return $data;
    }
    public function fetchSupplierItem($pr_no)
    {
        $sql = "SELECT
                    s.supplier_title,
                    a.procurement,
                    sq.ppu,
                    sq.is_winner
                    
                FROM
                    `supplier_quote` sq
                LEFT JOIN supplier s on sq.supplier_id = s.id
                LEFT JOIN app a on sq.rfq_item_id = a.id
                LEFT JOIN rfq_items ri on sq.rfq_item_id =ri.app_id
                LEFT JOIN rfq r on ri.rfq_id = r.id
                LEFT JOIN rfq rr on rr.rfq_no = sq.rfq_no
                WHERE rr.pr_no = '$pr_no'
                ORDER BY s.supplier_title";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {


            $data[] = [
                'supplier_title' => $row['supplier_title'],
                'procurement' => $row['procurement'],
                'price_per_unit' => $row['ppu'],
                'total' => $row['ppu'] + $row['ppu'],
                'is_winner' => $row['is_winner'],

            ];
        }

        return $data;
    }
    public function countItem($pr_no)
    {
        $sql = "SELECT count(*) as 'item_count' FROM `rfq_items` WHERE pr_no = '$pr_no'";
        $getQry = $this->db->query($sql);
        $data = '';
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data = $row['item_count'];
        }
        return $data;
    }
    public function fetchWinnerSupplier($rfq_no)
    {
        $sql = "SELECT
                    rr.rfq_no,
                    sq.supplier_id,
                    s.supplier_title as 'title',
                    sq.ppu as 'price_per_unit',
                    sq.is_winner as 'winner'

                FROM
                    `supplier_quote` sq
                    LEFT JOIN supplier s on s.id = sq.supplier_id
                    LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
                    LEFT JOIN rfq r on r.id = ri.rfq_id
                    LEFT JOIN rfq rr on rr.rfq_no = sq.rfq_no
                    LEFT JOIN app a on a.id = ri.app_id
                    where rr.rfq_no = '$rfq_no' 
                    GROUP BY title
                    ORDER BY winner desc";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['supplier_id']] = [
                'supplier' => $row['title'],
                'winner' => $row['winner'],
                'price_per_unit' => $row['price_per_unit'],

            ];
        }
        return $data;
    }
    public function fetchSupplierTotalABC($rfq_no)
    {
        // supplier header
        // -item1
        // -item1
        // -item1
        $sql = "SELECT
        rr.rfq_no,
        sq.supplier_id,
        s.supplier_title as 'title',
        sq.ppu as 'price_per_unit',
        sq.is_winner as 'winner'

        FROM
        `supplier_quote` sq
        LEFT JOIN supplier s on s.id = sq.supplier_id
        LEFT JOIN rfq_items ri on ri.app_id = sq.rfq_item_id
        LEFT JOIN rfq r on r.id = ri.rfq_id
        LEFT JOIN rfq rr on rr.rfq_no = sq.rfq_no
        LEFT JOIN app a on a.id = ri.app_id
        where rr.rfq_no = '$rfq_no' 
        ORDER BY winner desc";


        $getQry = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($getQry)) {

            $data[$row['supplier_id']][] =
                [
                    'price_per_unit' => $row['price_per_unit'],
                    'winner'         => $row['winner']
                ];
        }
        return $data;
    }
    public function fetchTotalABC($pr_no)
    {
        $sql = "SELECT
            pr.qty,
            pr.abc
            FROM
            pr_items pr
        WHERE
                pr.pr_no = '" . $pr_no . "'";
        $getQry = $this->db->query($sql);
        $data = [];
        $count = 1;
        while ($row = mysqli_fetch_assoc($getQry)) {
         
            $data = [
                'total_abc'  => number_format($row['qty'] * $row['abc'], 2),
            ];
            $count++;
        }
        return $data;
    }
    public function fetchPO($po_no)
    {
        $sql = "SELECT
                `id`,
                `po_no`,
                `rfq_no`,
                `po_date`,
                `noa_date`,
                `ntp_date`,
                `po_amount`,
                `remarks`
            FROM
                `po`
            WHERE
                po_no = '$po_no'";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
        
            $data = [
                'po_no'     => $row['po_no'],
                'rfq_no'    => $row['rfq_no'],
                'po_date'   => $row['po_date'],
                'noa_date'  => $row['noa_date'],
                'ntp_date'  => $row['ntp_date'],
                'po_amount' => $row['po_amount']
            ];
        }
        return $data;
    }
    public function fetchSupplierWinnerDetails($pr_no)
    {
        $sql = "SELECT
                    s.supplier_title,
                    s.supplier_address,
                    s.contact_details,
                    sq.is_winner
                    
                FROM
                    `supplier_quote` sq
                LEFT JOIN supplier s on sq.supplier_id = s.id
                LEFT JOIN app a on sq.rfq_item_id = a.id
                LEFT JOIN rfq_items ri on sq.rfq_item_id =ri.app_id
                LEFT JOIN rfq r on ri.rfq_id = r.id
                LEFT JOIN rfq rr on rr.rfq_no = sq.rfq_no

                WHERE rr.pr_no = '$pr_no' and sq.is_winner = 1
                GROUP BY sq.supplier_id
                ORDER BY s.supplier_title";
                $getQry = $this->db->query($sql);
                $data = [];
                while ($row = mysqli_fetch_assoc($getQry)) {
                
                    $data = [
                        'supplier_title'     => $row['supplier_title'],
                        'supplier_address'    => $row['supplier_address'],
                        'contact_details'   => $row['contact_details'],

                    ];
                }
                return $data;   
    }
    public function fetchSupplierHistory()
    {
        $sql = "SELECT
                    s.supplier_title,
                    sum(sw.count) as `count`
                FROM
                    `tbl_supplier_winners` sw
                LEFT JOIN supplier s on s.id = sw.supplier_id
                GROUP BY sw.supplier_id
                ORDER BY count desc";
            $getQry = $this->db->query($sql);
            $data = [];
            $count = 1;
            while ($row = mysqli_fetch_assoc($getQry)) {
            
                $data[] = [
                    'id'     => $count++,
                    'supplier_title'     => $row['supplier_title'],
                    'count'    => $row['count'],
                ];
            }
        return $data;  
    }

    public function purchaseOrderCreateDetails($rfq_no)
    {
        $sql = "SELECT
                sq.rfq_no as 'rfq_no',
                s.supplier_title as 'supplier',
                sum(`ppu`) as 'po_amount'
                
                FROM
                    `supplier_quote` as sq
                LEFT JOIN supplier as s on s.id = sq.supplier_id
                WHERE
                sq.rfq_no = '$rfq_no' and sq.is_winner = 1
                ";
                $getQry = $this->db->query($sql);
                $data=[];
                while ($row = mysqli_fetch_assoc($getQry)) {
            
            $data = [
                'rfq_no'     =>  $row['rfq_no'],
                'supplier'   =>  $row['supplier'],
                'po_amount'  =>  number_format($row['po_amount'],2)
            ];
        }
        return $data; 

    }

    public function fetchNOAandNTPData($po_no)
    {
        $sql = "SELECT
                    po.po_date,
                    s.supplier_title,
                    s.contact_person,
                    s.supplier_address,
                    p.type,
                    p.purpose,
                    sum(`ppu`) as 'po_amount'
                    
                FROM
                    `po` as po
                LEFT JOIN supplier_quote sq on sq.rfq_no = po.rfq_no
                LEFT JOIN supplier s on s.id = sq.supplier_id
                LEFT JOIN rfq r on r.rfq_no = sq.rfq_no
                LEFT JOIN pr p on p.pr_no = r.pr_no
                where po.po_no = '$po_no'";
                $getQry = $this->db->query($sql);
                $data=[];
                while ($row = mysqli_fetch_assoc($getQry)) {
                    $type = $row['type'];
                    if ($type == 1) {
                        $type = 'Catering Services';
                      }
                      if ($type == 2) {
                        $type = 'Meals, Venue and Accommodation';
                      }
                      if ($type == 3) {
                        $type = 'Repair and Maintenance';
                      }
                      if ($type == 4) {
                        $type = 'Supplies, Materials and Devices';
                      }
                      if ($type == 5) {
                        $type = 'Other Services';
                      }
                      if ($type == 6) {
                        $type = 'Reimbursement and Petty Cash';
                      }
            $data = [
                'po_date'           =>  $row['po_date'],
                'supplier_title'    =>  $row['supplier_title'],
                'contact_person'    =>  $row['contact_person'],
                'supplier_address'  =>  $row['supplier_address'],
                'type'              =>  $type,
                'purpose'           =>  $row['purpose'],
                'totalABC'           =>  $row['po_amount'],
            ];
        }
        return $data; 
    }

    public function fetchPendingPR($status)
    {
        $sql = "SELECT id,pr_no from pr where  stat  = '$status' and YEAR(date_added) = '2022' ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['pr_no'];
        }
        return $data;
    }
    public function fetchModeofProc()
    {
        $sql = "SELECT * from mode_of_proc ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['id']] = $row['mode_of_proc_title'];
        }
        return $data;
    }

  
}
