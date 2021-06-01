<?php 

class Notification 
{
	function addNew2($conn,$table,$currentuser,$data, $status = '') {
	    $tasks = fetchLatestInsert($conn, 'event_subtasks', $data['id']);
	    $result = '';

	    // if ($tasks['posted_by'] != $currentuser) {
	   
	        $date = new DateTime();

	        $date = $date->format('Y-m-d H:i:s');
	        $receiver = $tasks['posted_by'];
	        $message = $tasks['message'];

	        if ($status == 'Disapprove') {
	            $message = 'Task has been Disapproved';
	        } elseif ($status == 'Done') {
	            $message = 'Task has been Approved'; 
	        } elseif ($tasks['status'] == 'For Checking') {
	            $receiver = $tasks['posted_by'];
	            $message = 'Needs your approval';
	        }

	        $sql = "INSERT INTO $table(planner_id, task_id, receiver, message, date_created, code, status, posted_by) 
	                VALUES(
	                ".$tasks['planner_id'].", 
	                '".$tasks['task_id']."', 
	                ".$receiver.", 
	                '".$message."', 
	                '".$date."', 
	                '".$tasks['code']."', 
	                '".$tasks['status']."',
	                ".$currentuser.")";    

	        $result = mysqli_query($conn, $sql);
	    // }

	    return $result;    
	}

	function addNew($conn,$table,$currentuser,$data, $status = '') {
	    $tasks = fetchLatestInsert($conn, 'event_subtasks', $data['id']);
	    $result = '';

	    if ($tasks['emp_id'] != $currentuser) {
	   
	        $date = new DateTime();

	        $date = $date->format('Y-m-d H:i:s');
	        $receiver = $tasks['emp_id'];
	        $message = $tasks['message'];

	        if ($status == 'Disapprove') {
	            $message = 'Task has been Disapproved';
	        } elseif ($status == 'Done') {
	            $message = 'Task has been Approved'; 
	        } elseif ($tasks['status'] == 'For Checking') {
	            $receiver = $tasks['posted_by'];
	            $message = 'Needs your approval';
	        }

	        $sql = "INSERT INTO $table(planner_id, task_id, receiver, message, date_created, code, status, posted_by) 
	                VALUES(
	                ".$tasks['planner_id'].", 
	                '".$tasks['task_id']."', 
	                ".$receiver.", 
	                '".$message."', 
	                '".$date."', 
	                '".$tasks['code']."', 
	                '".$tasks['status']."',
	                ".$currentuser.")";     

	        $result = mysqli_query($conn, $sql);
	    }

	    return $result;    
	}

	function addNewSettings($conn,$table,$data) {
	   
        $sql = "INSERT INTO $table(planner_id, receiver, message, date_created, status, posted_by, code) 
                VALUES(".$data['atv_id'].", ".$data['receiver'].", '".$data['message']."', '".$data['date_today']."', '".$data['status']."', ".$data['creator'].", '".$data['code']."')";        

        $result = mysqli_query($conn, $sql);
	   
	    return $result;    
	}

	function update($conn,$table,$task_id) {
	    $sql = "UPDATE $table SET is_read = TRUE WHERE task_id = $task_id ";

	    $result = mysqli_query($conn, $sql);

	    return $result;    
	}	

	function fetchLatestInsert($conn,$table, $id) {
        $sql = "SELECT id, event_id, emp_id, title, code, status, posted_by FROM $table WHERE id = $id";
        $data = [];

        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $data = [
                'planner_id' => $row['event_id'],
                'task_id' => $row['id'],
                'emp_id' => $row['emp_id'],
                'message' => $row['title'],
                'code' => $row['code'],
                'status' => $row['status'],
                'posted_by' => $row['posted_by']
            ];
        }  


        return $data;    
    } 

    public function addFlash($type, $message, $title) {
    	$data = [
            'type'		=> $type, // or 'success' or 'info' or 'warning'
            'title'     => $title,
            'message'	=> $message
        ];

        return $data;
    }

    public function markAsRead($conn, $id) {
    	$sql = "UPDATE event_notif SET is_read = true WHERE id = $id";
	    $result = mysqli_query($conn, $sql);

	    return $result;
    }
}
