<?php

class Configure
{
	
	function getCodeSeries($conn, $id) {
        $container = $data = [];

        $sql = "SELECT year, parent, child FROM conf_code_series where id = '".$id."'";

        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);

        $container['child'] = '0001' + $result['child'];
        $container['parent'] = $result['parent'];
        $container['year'] = $result['year'];

        if (strlen($container['parent']) == 1) {
            $container['parent'] = "000".$container['parent'];
        } else if (strlen($container['parent']) == 2) {
            $container['parent'] = "00".$container['parent'];
        } else if (strlen($container['parent']) == 3) {
            $container['parent'] = "0".$container['parent'];
        }

        if (strlen($container['child']) == 1) {
            $container['child'] = "000".$container['child'];
        } else if (strlen($container['child']) == 2) {
            $container['child'] = "00".$container['child'];
        } else if (strlen($container['child']) == 3) {
            $container['child'] = "0".$container['child'];
        }

        $data['code'] = $id.$container['year'].'-'.$container['parent'].'-'.$container['child'];
        $data['child'] = $container['child'];

        return $data;
    }  

    function setCodeSeries($conn, $id, $child) {
        $sql = "UPDATE conf_code_series SET child = ".$child." where id = '".$id."'";

        $result = mysqli_query($conn, $sql);
        
        return $result;
    } 
}