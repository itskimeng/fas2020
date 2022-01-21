<?php
class APP extends Connection
{
    public $default_table = 'app';
    public $default_year = '2020,2021';


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

    

  
}
