<?php
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require_once "../../Model/ICTTechnicalAssistance.php";
$ict = new ICT();
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

    $id     = $_POST['id'];
    $status = $_POST['status'];
switch ($status) {
    case 'ongoing':
        $ict->update('tbltechnical_assistance', [ 'start_date'=>date('y-m-d'),'start_time' => date('h:m:s'),'status' => $status, ], "control_no='$id'" );
        break;
    case 'completed':
        $ict->update('tbltechnical_assistance', [ 'completed_date'=>date('y-m-d'),'completed_time' => date('h:m:s'),'status' => $status, ], "control_no='$id'" );

    
    default:
        # code...
        break;
}
?>
