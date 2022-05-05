<?php
class ICTManager  extends Connection
{
    public $conn = '';
    public $default_table = 'tbltechnical_assistance';
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

    public function fetch()
    {
        $sql = "SELECT * from $this->default_table where REQ_DATE >= '2021-06-15'";
        $query = $this->db->query($sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {

            $data[] = [
                'id'=> $row['ID'],
                'control_no'        => $row['CONTROL_NO'],
                'start_date'        => date('M d, Y', strtotime($row['START_DATE'])),
                'start_time'        => date('g:i:A', strtotime($row['START_TIME'])),
                'completed_date'    => date('M d, Y',strtotime($row['COMPLETED_DATE'])),
                'complete_time'     => date('g:i:A', strtotime($row['COMPLETED_TIME'])),
                'req_by'            => $row['REQ_BY'],
                'office'            => $row['OFFICE'],
                'issue_problem'     => $row['ISSUE_PROBLEM'],
                'type_req'          => $row['TYPE_REQ'],
                'assist_by'         => $row['ASSIST_BY'],
                'status_request'    => $row['STATUS_REQUEST'],
            ];
        }
        return $data;
    }
}
