<?php

class Collaborators
{
	
	function addNew($conn,$table,$id, $data) {
        $acl = ['opr'=>'', 'add'=>'', 'edit'=>'', 'delete'=>'', 'todo'=>'', 'post'=>'', 'approve'=>''];
        $acl = json_encode($acl);

        $sql = "INSERT INTO ".$table." (event_id, emp_id, emp_fname, emp_mname, emp_lname, acl) 
                VALUES(".$id.", ".$data['emp_n'].",'".$data['fname']."', '".$data['mname']."', '".$data['lname']."','".$acl."')";
                
        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    function find($conn,$table,$ev_id,$emp) {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE event_id =  $ev_id AND emp_id = $emp";
        $emp = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($emp);
        
        return $result['count'];    
    }

    function fetchAll($conn,$table,$ev_id) {
        $sql = "SELECT event_id, emp_id FROM $table WHERE event_id =  $ev_id";
        $data = [];
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row['emp_id'];
        }

        
        return $data;    
    }

	function clear($conn,$table,$ev_id, $id) {
        $sql = "DELETE FROM $table WHERE event_id = $ev_id AND emp_id = $id";
        $result = mysqli_query($conn, $sql);

        return $result;    
    }
}