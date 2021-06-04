<?php
require_once "../../connection.php";
require_once('../../tcpdfv02/tcpdf.php');

require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';
require '../../PHPMailer-master/src/Exception.php';
require_once '../manager/TemplateGenerator.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$template = new TemplateGenerator();

$id = $_POST['id'];

$sql = "SELECT id, certificate_type, attendee, position, office, activity_title, DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated, opr, email, issued_place, send_counter, generate_counter
	FROM template_generator WHERE id = $id";

$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

$receiver_email = $result['email'];
$current_counter = $result['generate_counter'] + 1;

$sql2 = "UPDATE template_generator set generate_counter = $current_counter WHERE id = $id";
$result2 = mysqli_query($conn, $sql2);

$dd = ['msg' => "Certificate has been generated successfully to <b>" .$result['attendee'].'</b>', 'counter' => $current_counter];

echo json_encode($dd);
