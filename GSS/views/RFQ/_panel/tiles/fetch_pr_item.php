<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../../Model/Connection.php";
require_once "../../../../../Model/Procurement.php";
if(isset($_POST['supplier_id']))
{
    $supplier_id = $_POST['supplier_id'];

}else{
    $supplier_id = '';
}
    $id = $_POST['pr_id'];
    $rfq_id      = $_POST['rfq_id'];
    $rfq_no      = $_POST['rfq'];
    $suppliers   = count(explode(",",$supplier_id));
    $data_id     = explode(',',$supplier_id);
    
    $category = '';
    $pr = new Procurement();

    $pr->select("rfq",
    "rfq_no,COUNT(*) as multiple",
    "id = '$rfq_id'");
    $result1 = $pr->sql;
        
    while ($row = mysqli_fetch_assoc($result1)) {
        $is_multiple = ($row['rfq_no'] == '' || $row['rfq_no'] == null) ? true : 1;
    }
    if($is_multiple)
    {
        $pr->select(
            "pr_items i
            LEFT JOIN app a ON a.id = i.items
            LEFT JOIN pr p ON p.id = i.pr_id
            LEFT JOIN rfq r ON p.id = r.pr_id",
            "p.id, a.id as 'app_id', a.procurement, i.description,(i.qty * abc) AS 'total_abc'",
            "r.rfq_no='".$rfq_no."' "
        );
    }else{
        $pr->select(
            "pr_items i
            LEFT JOIN app a ON a.id = i.items
            LEFT JOIN pr p ON p.id = i.pr_id
            LEFT JOIN rfq r ON p.id = r.pr_id",
            "p.id, a.id as 'app_id', a.procurement, i.description,(i.qty * abc) AS 'total_abc'",
            "p.id = '".$id."'  ");
    }

   
    $result1 = $pr->sql;
    
    while ($row = mysqli_fetch_assoc($result1)) {
        $tr = '';
        $tr .= '<tr>';
        $tr .= '<td>'.wordwrap($row['procurement'],30).'</td>';
        $tr .= '<td hidden><input type="text" class="form-control supplier0" value="'.$row['app_id'].'" name="app_id[]"  ></td>';
        $tr .= '<td>'.$row['description'].'</td>';
        $tr .= '<td style="width:10%;"><b>₱ '.number_format($row['total_abc'],2).'</b></td>';

        
        switch ($suppliers) {
            case '1':
                $tr .= '<td><input type="number" class="form-control supplier0" data-id= "'.$data_id[0].'" id="" name="ppu[]"></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[0].'" id="" name="supplier_id[]"  ></td>';
                break;
            case '2':
                $tr .= '<td><input type="number" class="form-control supplier0" data-id= "'.$data_id[0].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[0].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier1" data-id= "'.$data_id[1].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[1].'" id="" name="supplier_id[]"  ></td>';

                break;
            case '3':
                $tr .= '<td><input type="number" class="form-control supplier0" data-id= "'.$data_id[0].'" id="" name="ppu[]"  ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[0].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier1" data-id= "'.$data_id[1].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[1].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier2" data-id= "'.$data_id[2].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[2].'" id="" name="supplier_id[]"  ></td>';

                break;
            case '4':
                $tr .= '<td><input type="number" class="form-control supplier0" data-id= "'.$data_id[0].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[0].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier1" data-id= "'.$data_id[1].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[1].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier2" data-id= "'.$data_id[2].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[2].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier3" data-id= "'.$data_id[3].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[3].'" id="" name="supplier_id[]"  ></td>';
                break;
            case '5':
                $tr .= '<td><input type="number" class="form-control supplier0" data-id= "'.$data_id[0].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[0].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier1" data-id= "'.$data_id[1].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[1].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier2" data-id= "'.$data_id[2].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[2].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier3" data-id= "'.$data_id[3].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[3].'" id="" name="supplier_id[]"  ></td>';
                $tr .= '<td><input type="number" class="form-control supplier4" data-id= "'.$data_id[4].'" id="" name="ppu[]" ></td>';
                $tr .= '<td hidden><input type="text" class="form-control supplier0" value= "'.$data_id[4].'" id="" name="supplier_id[]"  ></td>';
            
                break;
                         
            
            default:
                # code...
                break;
        }
        echo $tr;
    
    }


    


?>