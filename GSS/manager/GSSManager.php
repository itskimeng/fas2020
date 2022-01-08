<?php

class GSSManagers
{
    public $conn = '';
    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    }   
  
    public function getPMO()
    {
        $sql = "SELECT id, pmo_title from pmo";
        $query = mysqli_query($this->conn, $sql);
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $office = $row['pmo_title'];

            $data[] = [
                'id' => $row['id'],
                'office' => $office,
                'pmo_contact_person' => $row['pmo_contact_person'],
                'position' => $row['position'],
            ];
        }
        return $data;
    }
 
  
}
