<?php
class APP extends Connection
{
    public $default_table = 'app';
    public $default_year = '2021';


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

    public function fetch()
    {
        $sql = "SELECT 
        app.sn as sn,
        app.code as code,
        mop.mode_of_proc_title as mode
        FROM $this->default_table  
        LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
        WHERE app_year = $this->default_year";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'stock_no'  => $row['sn'],
                'code'      => $row['code'],
                'mode'      => $row['mode']
            ];
        }
        return $data;
    }

    public function fetchAPP()
    {
        // $page = 1;
        // if(!empty($_GET['page'])) {
        //     $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        //     if(false === $page) {
        //         $page = 1;
        //     }
        // }
        // $items_per_page = 10;
        // $offset = ($page - 1) * $items_per_page;

        $sql = "SELECT DISTINCT app.id,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,pmo.pmo_title,sof.source_of_funds_title 
        FROM $this->default_table  
        LEFT JOIN item_category ic on ic.id = app.category_id 
        LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
        LEFT JOIN pmo on pmo.id = app.pmo_id 
        LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
        where app_year =  $this->default_year
        ORDER BY app.app_year desc";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'  => $row['id'],
                'sn'  => $row['sn'],
                'code'      => $row['code'],
                'year'      => $row['app_year'],
                'code'      => $row['mode'],
                'category'      => $row['item_category_title'],
                'procurement'      => $row['procurement'],
                'pmo_title'      => $row['pmo_title'],
                'mode'      => $row['mode_of_proc_title'],
                'source'      => $row['source_of_funds_title'],
            ];
        }
        return $data;
    }

    public function setCategory()
    {
        $sql = "SELECT 
        app.category_id,
        ic.item_category_title as category
        FROM $this->default_table  
        LEFT JOIN item_category ic on ic.id = app.category_id 
        WHERE app_year = $this->default_year
        GROUP BY category
        ORDER BY category_id
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'category'  => $row['category'],
            ];
        }
        return $data;
    }

   
    public function setPMO()
    {
        $sql = "SELECT DIVISION_N, DIVISION_M FROM tblpersonneldivision where DIVISION_M in ('FAD','LGMED','LGCDD','ORD','CAVITE','LAGUNA','BATANGAS','RIZAL','QUEZON', 'LUCENA CITY')";
        
        $getQry = $this->db->query($sql);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'  => $row['DIVISION_N'],
                'pmo' => $row['DIVISION_M']
            ];    
        }


        return $data;
    }

    public function setPages()
    {
        $pages = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return $pages;
    }
    public function setSFund()
    {
        $fund =
            [
                'Regular, Local and Trust Fund',
                'Local Fund',
                'Regular Fund'
            ];
        return $fund;
    }

    public function getItemUnit()
    {

        $sql = "SELECT id, item_unit_title from item_unit";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[] = [
                'id'  => $row['id'],
                'item_unit' => $row['item_unit_title']
            ];
        }
        return $data;
    }

    public function setStockNo(){
        $sql = "SELECT max(id)+1 as sn FROM app order by id desc limit 1";
        $getQry = $this->db->query($sql);
        $data = '';
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data =  $row['sn'];
        }
        return $data;

    }

    public function checkDuplicate($stock_val)
    {
        $sql = "SELECT sn FROM app where sn = '$stock_val' ";
        $getQry = $this->db->query($sql);
        $data = true;
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data =  true;
        }else{
            $data = false;
        }
        
        return $data;
    }
}
