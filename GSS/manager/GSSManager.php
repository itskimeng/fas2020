<?php

class GSSManager  extends Connection
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
  
    public function getPMO()
    {
        $sql = "SELECT id, pmo_title from pmo";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $office = $row['pmo_title'];

            $data[] = [
                'id' => $row['id'],
                'office' => $office,
                'pmo_contact_person' => $row['pmo_contact_person'],
                'position' => $row['position'],
            ];
        }
        return $data;
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
    public function fetchAPP($admins)
    {
        if(in_array($_SESSION['username'],$admins))
        {
            $sql = "SELECT DISTINCT app.id,app.app_price,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,app.pmo_id,sof.source_of_funds_title 
            FROM $this->default_table  
            LEFT JOIN item_category ic on ic.id = app.category_id 
            LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
            LEFT JOIN pmo on pmo.id = app.pmo_id 
            LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
            where app_year in (2020,2021,2022)
            ORDER BY app.app_year desc"; 
        }else{
            $sql = "SELECT DISTINCT app.id,app.app_price,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,app.pmo_id,sof.source_of_funds_title 
            FROM $this->default_table  
            LEFT JOIN item_category ic on ic.id = app.category_id 
            LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
            LEFT JOIN pmo on pmo.id = app.pmo_id 
            LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
            where app_year in ($this->default_year)
            ORDER BY app.app_year desc";
        }
        
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $office = $row['pmo_id'];
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

            $data[] = [
                'id'  => $row['id'],
                'sn'  => $row['sn'],
                'code'      => $row['code'],
                'year'      => $row['app_year'],
                'code'      => $row['mode'],
                'category'      => $row['item_category_title'],
                'procurement'      => $row['procurement'],
                'pmo_title'      => $office,
                'mode'      => $row['mode_of_proc_title'],
                'source'      => $row['source_of_funds_title'],
                'app_price' => $row['app_price']
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
        GROUP BY category
        ORDER BY category_id
        ";
        $getQry = $this->db->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['category_id']] = $row['category'];
        }
        return $data;
    }

   
    public function setPMO()
    {
        $sql = "SELECT DIVISION_N, DIVISION_M FROM tblpersonneldivision where DIVISION_M in ('FAD','LGMED','LGCDD','ORD','CAVITE','LAGUNA','BATANGAS','RIZAL','QUEZON', 'LUCENA CITY')";
        
        $getQry = $this->db->query($sql);
        $data = [];
        
        
        while ($row = mysqli_fetch_assoc($getQry)) {
            $data[$row['DIVISION_N']] = $row['DIVISION_M'];
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
            $data[$row['id']] = $row['item_unit_title'];
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


    // pr
    
  
}
