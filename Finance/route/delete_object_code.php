<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "../../Model/Connection.php";
require_once "../../Model/ObjectCodes.php";
require_once "../../ActivityPlanner/manager/Notification.php";

$oc = new ObjectCodes();
$notif = new Notification();
$user = $_SESSION['currentuser'];
$division = $_SESSION['division'];
$id = $_GET['id'];

$oc->delete($id);

$_SESSION['toastr'] = $notif->addFlash('success', 'Object Code has been successfully deleted.', 'Delete');


header('location:../../budget_fundsource_objectcode.php?division='.$division);
