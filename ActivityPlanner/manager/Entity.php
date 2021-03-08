<?php

class Entity
{
	
	function clear($conn,$table,$column,$id) {
        $sql = "DELETE FROM $table WHERE $column = $id";

        $result = mysqli_query($conn, $sql);

        return $result;    
    }
}