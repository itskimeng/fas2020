<?php

class FiveSEmployee
{	

	function insert($conn, $data) {
        $sql = "INSERT INTO fives_employees (emp_id, status, date_created, seiri) 
                VALUES(".$data['emp_id'].", '".$data['status']."', '".$data['date_created']."', ".$data['subtotal'].")";
        
        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
       
        return $id;    
    }

    // for driver
    function insert2($conn, $data) {
        $sql = "INSERT INTO fives_employees (emp_id, status, date_created, total) 
                VALUES(".$data['emp_id'].", '".$data['status']."', '".$data['date_created']."', ".$data['subtotal'].")";
        
        $result = mysqli_query($conn, $sql);
        $id = mysqli_insert_id($conn);
       
        return $id;    
    }

    function update($conn, $data) {
        $types = ['seiri','seiton', 'seiso', 'total'];
        foreach ($types as $key => $type) {
            if (array_key_exists($type, $data)) {

                $sql = "UPDATE fives_employees SET ".$type." = ".$data[$type]." WHERE id = ".$data['id'].""; 
                
                $result = mysqli_query($conn, $sql);
            }
        }

        return $result;    
    }

    function submit($conn, $data) {
        $sql = "UPDATE fives_employees SET comments = '".$data['comments']."', date_submitted = '".$data['date_submitted']."', status = 'Completed' WHERE id = ".$data['id'].""; 

        $result = mysqli_query($conn, $sql);
        
        return $result;    
    }
	
	function insertEntry($conn, $data) {
        $sql = "INSERT INTO fives_employees_entry (fsp_id, fsid, score, comments, date_created) 
                VALUES(".$data['parent_id'].", ".$data['fsid'].", '".$data['score']."', '".$data['comments']."', '".$data['date_created']."')";  

        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function updateEntry($conn, $data) {
        $sql = "UPDATE fives_employees_entry SET score = '".$data['score']."', comments = '".$data['comments']."' WHERE id = '".$data['entid']."'";  

        $result = mysqli_query($conn, $sql);

        return $result;    
    }
}