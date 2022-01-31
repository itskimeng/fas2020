<?php

class PR_Manager
{
  public $conn = '';
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
  }




  public function getItems($pmo, $pr_no)
  {
    $sql = "SELECT 
      id as ID";


    $query = mysqli_query($this->conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
      $data = [
        "items" => $row['items']
      ];
    }
    return $data;
  }



  // CRUD

 
 
}
