<?php

class Entity
{
	
	public function clear($conn,$table,$column,$id) {
        $sql = "DELETE FROM $table WHERE $column = $id";
        $result = mysqli_query($conn, $sql);

        return $result;    
    }

    public function countTask($conn, $id) {
        $sql = "SELECT count(*) as count FROM event_subtasks WHERE event_id = $id AND status = 'Ongoing' OR status = 'Created'";
        
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);

        return $result['count'];    
    }
}