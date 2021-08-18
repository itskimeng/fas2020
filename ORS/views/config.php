<?php
error_reporting(0);
define('DB_NAME', 'fascalab_2020');
define('DB_USER', 'fascalab_2020');
define('DB_PASSWORD', 'w]zYV6X9{*BN');
define('DB_HOST', 'localhost');

 
// Create connection
$db     =   new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>