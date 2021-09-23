<?php 

$conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

$userId = $_GET['userId'];
$username = $_GET['username'];
$menuIdHolder = $_GET['menuIdHolder'];
$menuIdHolder = rtrim($menuIdHolder, ',');
$menuIdHolder = ltrim($menuIdHolder, ',');

$selectIfExisting = ' SELECT `id` FROM `tbl_module_access` WHERE `user_id` = '.$userId.' ';
$execIfExisting = $conn->query($selectIfExisting);
if ($execIfExisting->num_rows>0)
{
	$sql = ' UPDATE `tbl_module_access` SET `module_id` = "'.$menuIdHolder.'", `moderator_username` = "'.$username.'", `date_updated` = NOW() WHERE `user_id` = '.$userId.' ';
}
else
{
	$sql = ' INSERT INTO `tbl_module_access`(`user_id`, `module_id`, `moderator_username`, `date_updated`) VALUES ("'.$userId.'", "'.$menuIdHolder.'", "'.$username.'", NOW()) ';
}

$exec = $conn->query($sql);
echo "success";


 ?>