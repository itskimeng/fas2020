<?php

class QMSProcedure extends Connection
{ 
    public $default_table = 'tbl_qop';
    public $default_table_entry = 'tbl_qoe';

    const COVERAGE_1            = "Region";
    const COVERAGE_2            = "Region & Province";
    const COVERAGE_3            = "Region, Province & Field";
    const COVERAGE_4            = "Central, Region, Province & Field";

    const FREQUENCY_1           = "Montly";
    const FREQUENCY_2           = "Quarterly";
    // const FREQUENCY_3           = "Annualy";

    const RATE_MONTHLY          = '{"01":"", "02":"", "03":"", "04":"", "05":"", "06":"", "07":"", "08":"", "09":"", "10":"", "11":"", "12":""}';
    const RATE_QUARTERLY        = '{"01":"", "02":"", "03":"", "04":""}';
    // const RATE_ANNUALLY         = "";

    const STATUS_LOCK           = "Lock";
    const STATUS_UNLOCK         = "Unlock";    


    function __construct() {
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
        $sql = "SELECT * FROM $this->default_table WHERE id = $id";

        $getQry = $this->db->query($sql);
        $result = mysqli_fetch_array($getQry);
        
        return $result;
    }

    public function post($data) {
        $sql = "INSERT INTO $this->default_table 
                SET frequency_monitoring = '".$data['frequency']."',
                coverage = '".$data['coverage']."',
                office = '".$data['office']."',
                rev_no = '".$data['rev_no']."',
                EffDate = '".$data['EffDate']."',
                process_owner = '".$data['process_owner']."',
                qp_code = '".$data['qp_code']."',
                procedure_title = '".$data['procedure_title']."',
                created_by = '".$data['created_by']."',
                date_created = NOW()";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function postEntries($data) {
        $sql = "INSERT INTO $this->default_table_entry 
                SET qop_id = ".$data['qop_id'].",
                objective = '".$data['objective']."',
                target_percentage = '".$data['target_percentage']."',
                indicator_a = '".$data['indicator_a']."',
                indicator_b = '".$data['indicator_b']."',
                indicator_c = '".$data['indicator_c']."',
                indicator_d = '".$data['indicator_d']."',
                indicator_e = '".$data['indicator_e']."',
                formula = '".$data['formula']."',
                date_created = NOW()";
       
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function UpdateEntries($data,$parent) {
        $sql = "UPDATE $this->default_table_entry 
                SET qop_id = ".$data['qop_id'].",
                objective = '".$data['objective']."',
                target_percentage = '".$data['target_percentage']."',
                indicator_a = '".$data['indicator_a']."',
                indicator_b = '".$data['indicator_b']."',
                indicator_c = '".$data['indicator_c']."',
                indicator_d = '".$data['indicator_d']."',
                indicator_e = '".$data['indicator_e']."',
                formula = '".$data['formula']."',
                date_created = NOW()
                WHERE id = '".$data['id']."'
                AND qop_id = $parent";
       
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);
        return $last_id;
    }

    public function update($data, $id) {
        $sql = "UPDATE $this->default_table 
                SET frequency_monitoring = '".$data['frequency']."',
                coverage = '".$data['coverage']."',
                office = '".$data['office']."',
                rev_no = '".$data['rev_no']."',
                EffDate = '".$data['EffDate']."',
                process_owner = '".$data['process_owner']."',
                qp_code = '".$data['qp_code']."',
                procedure_title = '".$data['procedure_title']."',
                updated_by = '".$data['created_by']."',
                date_updated = NOW()
                WHERE id = $id";
        // print_r($sql);
        // die();
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function clearEntry($id) {
        $sql = "DELETE FROM $this->default_table_entry WHERE qop_id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->default_table WHERE id = $id";
        $this->db->query($sql);
        
        return $id;
    }

    public function postQOEFrequency($data) {
        if ($data['frequency_type'] == 1) {
            $rate_type = $this::RATE_MONTHLY;
        } elseif ($data['frequency_type'] == 2) {
            $rate_type = $this::RATE_QUARTERLY;
        } else {
            $rate_type = $this::RATE_ANNUALLY;
        }

        $sql = "INSERT INTO tbl_qoe_frequency 
                SET qoe_id = ".$data['qoe_id'].",
                indicator = '".$data['indicator']."',
                rate = '".$rate_type."',
                is_na = '".$rate_type."'";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function updateQME($data) {
        $sql = "UPDATE tbl_qoe_frequency_entry 
                SET rate = '".$data['rate']."',
                date_updated = NOW(),
                updated_by = '".$data['author']."'
                WHERE id = '".$data['id']."'";
        // print_r($sql."<br>");
        // die();
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function updateQMEByAdmin($data) {
        $sql = "UPDATE tbl_qoe_frequency_entry 
                SET is_na = '".$data['is_na']."'
                WHERE id = ".$data['id']."";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);
        // print_r($sql);
        return $last_id;
    }

    public function delete_owner($id)
    {
        $sql = "DELETE FROM `tbl_qms_process_owners` WHERE id = ".$id."";
        
        $this->db->query($sql);
    }

    public function updateCache($data) {
        $sql = "UPDATE tbl_qoe_frequency_entry_cache 
                SET rate = '".$data['rate']."',
                date_updated = NOW(),
                updated_by = '".$data['author']."'
                WHERE qoe_id = ".$data['qoe_id']." AND indicator = '".$data['indicator']."' AND year = ".$data['year']." ";
        // print_r($sql);
        // die();
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);

        return $last_id;
    }

    public function updateQMEByAdminCache($data) {
        $sql = "UPDATE tbl_qoe_frequency_entry_cache 
                SET is_na = '".$data['is_na']."'
                WHERE qoe_id = ".$data['qoe_id']." AND indicator = '".$data['indicator']."' AND year = ".$data['year']." ";
        
        $this->db->query($sql);
        $last_id = mysqli_insert_id($this->db);
        // print_r($sql);
        // die();
        return $last_id;
    }

}