<?php

class AbstractofQuotationManager
{
    public $conn = '';

  
    function __construct() 
    {
        $this->conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

    }

    public function fetchdata($rfq_id)
    {
        $sql = "SELECT rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title 
        FROM rfq_items rq 
        LEFT JOIN app on app.id = rq.app_id 
        LEFT JOIN item_unit iu on iu.id = rq.unit_id 
        WHERE rfq_id = '$rfq_id' ";
        $query = mysqli_query($this->conn, $sql);
        if ($row = mysqli_fetch_assoc($query)) {
            $data = $row['id'];
        }
        return $data;
    }
    
    public function getSupplierTitle($rid)
    {
        $sql = "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks 
        FROM supplier s 
        LEFT JOIN supplier_quote sq on sq.supplier_id = s.id 
        LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid ";

        $query = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data = $row['supplier_title'];
        }


        return $data;
    }

    

  
}
?>