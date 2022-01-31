<?php
class Procurement extends Connection
{
    public $default_table = 'pr';
    public $default_year = '2022';
    const STATUS_SUBMITTED_TO_BUDGET            = "1";
    const STATUS_RECEIVED_BY_BUDGET             = "2";
    const STATUS_SUBMITTED_TO_GSS               = "3";
    const STATUS_RECEIVED_BY_GSS                = "4";
    const STATUS_WITH_RFQ                       = "5";
    const STATUS_POSTED_IN_PHILGEPS             = "6";
    const STATUS_AWARDED                        = "7";
    const STATUS_OBLIGATED                      = "8";
    const STATUS_DELIVERED_BY_SUPPLIER          = "9";
    const STATUS_RECEIVED_BY_END_USER           = "10";
    const STATUS_DISBURSED                      = "11";
    const STATUS_MADE_PAYMENT_TO_SUPPLIER       = "12";

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
}
