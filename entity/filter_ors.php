<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");



$ors = $_GET['ors'];
$ponum = $_GET['ponum'];
$status = $_GET['status'];
$year = $_GET['year'];
$month = $_GET['month'];
$ors_date = date('Y-m-d',strtotime($_GET['ors_date']));


$data = [
    'ors' => $ors,
    'ponum'=>$ponum,
    'status' => $status,
    'year' => $year,
    'month' => $month,
    'ors_date' => $ors_date
];


$lists = filterApplicants($conn, $ors, $data);

echo $lists;

function filterApplicants($conn, $ors,$options)
{
   
   
        $sql = "SELECT id,received_by,date,datereceived, datereprocessed, datereturned, datereleased, ors, ponum, payee, particular, sum(amount) as amount  , remarks, reason, sarogroup, status, dvstatus FROM saroob WHERE  ";
    
        if (!empty($options['ors'])) {
            $sql.= " ors = '".$options['ors']."'"; 
            $sql.= " AND ponum = '".$options['ponum']."'"; 

        }else{
            $sql.= " YEAR(`date`) = '".$options['year']."'"; 
            $sql.= " AND MONTH(`date`) = '".$options['month']."'"; 
            $sql.= " AND datereprocessed = '".$options['ors_date']."'"; 
        }
        $sql .= " GROUP BY ponum ";

  



    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
        // ACTION BUTTONS
       $received =  btn_received($row['received_by'],$row['datereceived'],$row['id']);
       $processed = btn_processed($row["datereprocessed"],$row['datereceived'],$row['id']);
       $return = btn_return($row['datereturned'],$row['id'],$row['reason']);
       $released = btn_released($row['datereprocessed'],$row['datereleased'],$row['id']);
        $btn_actions = '
                <a  data-id = "' . $row['id'] . '" type="button"  data-toggle="modal" data-target="#viewPanel" class="btn btn-success btn-sm btn-view"  title = "View" > <i class="fa fa-eye"></i></a> 
                <a  data-id = "' . $row['id'] . '" type="button"  data-toggle="modal" data-target="#editPanel" class="btn btn-primary btn-sm btn-edit"  title = "Edit">  <i class="fa fa-edit"></i></a> 
                <a  data-id = "' . $row['id'] . '" type="button"  data-toggle="modal" data-target="#deletePanel" class="btn btn-danger btn-sm btn-delete"  title = "Delete"> <i class="fa fa-trash"></i></a> ';

      

        $data[$row['id']] = [
            'id' => $row['id'],
            'date_received' =>$received,
            'date_obligated' => $processed,
            'date_return' => $return,
            'date_released' => $released,
            'ors'=> $row['ors'],
            'ponum' => $row['ponum'],
            'payee' => $row['payee'],
            'particular' => $row['particular'],
            'amount' => number_format($row['amount'],2),
            'remarks' => $row['remarks'],
            'status'=> $row['status'],
            'actions' => $btn_actions

            
        ];
    }
    return json_encode($data);
}
function btn_received($rec_by,$date,$id)
{
    if($date == null || $date == '')
    {
        $btn_received = '<a class="btn btn-primary btn-xs" href="entity/post_received_burs.php?id=' . $id . '&stat=1">Received</a> </a>';
    }else{
        $btn_received = '<i><b>' . $rec_by . '</b></i><br>' . date('F d, Y',strtotime($date));
    }
    return $btn_received;
}
function btn_processed($date_processed,$date,$id)
{
    if ($date != '0000-00-00') {

        if ($date == '0000-00-00' || $date == null) {
            $btn_processed = '<a href="CreateObligationBURS.php?id=' . $id . '&stat=1"   class="btn btn-success btn-xs" >Proccess</a>';
        } else {
            $btn_processed = date('F d, Y',strtotime($date_processed));
        }
    }else{
        $btn_processed = '';
    }
    return $btn_processed;
}
function btn_return($date,$id,$reason)
{
    if ($date == '0000-00-00' || $date != null) {
        // $btn_return = '<a class="btn btn-danger btn-xs" href="ViewBURScomments.php?id=' . $id . 'stat=2">Return</a>';
        $btn_return = '
            
    <button  data-id = "' . $id . '" type="button" class="btn btn-xs btn-danger btn-return"  data-target="#exampleModal"> Return </button>';
    } else {
        $btn_return = '<b>' . $reason . '</b><br>' . date('F d, Y', strtotime($date));
    }
    return $btn_return;
}
function btn_released($date_processed,$date,$id)
{
    if ($date_processed != '0000-00-00') {
        if ($date == null || $date == '1970-01-01') {
            $btn_released = '<a class="btn btn-success btn-xs" href="entity/post_released_burs.php?id=' . $id . '&stat=1">Release</a>';
        } else {
            $btn_released = date('F d, Y',strtotime($date));
        }
    }else{
        $btn_released = '';
    }
    return $btn_released;
}



