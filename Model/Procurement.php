<?php
class Procurement extends Connection
{
    public $default_table = 'pr';
    public $default_year = '2022';
    const STATUS_DRAFT                          = "0";
    const STATUS_SUBMITTED_TO_BUDGET            = "1";
    const STATUS_RECEIVED_BY_BUDGET             = "2";
    const STATUS_SUBMITTED_TO_GSS               = "3";
    const STATUS_RECEIVED_BY_GSS                = "4";
    const STATUS_WITH_RFQ                       = "5";
    const STATUS_POSTED_IN_PHILGEPS             = "6";
    const STATUS_AWARDED                        = "7";
    const STATUS_OBLIGATED                      = "8"; //budget
    const STATUS_SIGNED_PO                      = "9"; //gss
    
    const STATUS_DELIVERED_BY_SUPPLIER          = "10"; //gss
    const STATUS_RECEIVED_BY_END_USER           = "11"; //gss
    const STATUS_DISBURSED                      = "12"; //accounting
    const STATUS_MADE_PAYMENT_TO_SUPPLIER       = "13"; //accounting - delivered to bank

    const STATUS_RETURN_PR                      = '14';

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
    public function checkDuplicate($stock_val)
    {
        $sql = "SELECT sn FROM app where sn = '$stock_val' ";
        $getQry = $this->db->query($sql);
        $data = true;
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data =  true;
        } else {
            $data = false;
        }

        return $data;
    }
    public function getRFQID($rfq_no)
    {
     
        $sql = "SELECT id FROM rfq WHERE rfq_no = '$rfq_no'";
        $getQry = $this->db->query($sql);
        $data='';
        if ($row = mysqli_fetch_assoc($getQry)) {
            $data = $row['id'];
        }

        return $data;
    }
    public function select($table,$rows="*",$where = null){
       
        if ($where != null) {
            $sql="SELECT $rows FROM $table WHERE $where";
        }else{
            $sql="SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->db->query($sql);


    }

    public function update($table, $para = array(), $id)
    {
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }

        $sql = "UPDATE  $table SET " . implode(',', $args);

        $sql .= " WHERE $id";
        echo $sql;


        $this->db->query($sql);
    }
    public function delete($table,$id){
        $sql="DELETE FROM $table";
        $sql .=" WHERE $id ";
        $this->db->query($sql);
    }

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";
        $this->db->query($sql);
        echo $sql.'<br>';
        
    }
}
