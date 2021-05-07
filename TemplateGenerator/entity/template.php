<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once('../../tcpdfv02/tcpdf.php');
require_once "../../connection.php";
require_once '../manager/TemplateGenerator.php';

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$certificate_type = $_POST['certificate_type'];
$attendees[] = $_POST['attendee'];
$position = isset($_POST['position']) ? $_POST['position'] : '';
$office = isset($_POST['office']) ? $_POST['office'] : '';
$activity_title = $_POST['activity_title'];
$activity_date = $_POST['activity_date'];
$activity_venue = $_POST['activity_venue'];
$date_given = $_POST['date_given'];
$opr = $_POST['opr'];
$issued_place = $_POST['issued_place'];
$email = $_POST['email'];


$multi_upload = false;

$activity_date = explode('-', $activity_date);
$date_from = $activity_date[0];
$date_to = $activity_date[1];

$date_from = new DateTime($activity_date[0]);
$date_to = new DateTime($activity_date[1]);
$db_datefrom = $date_from;
$db_dateto = $date_to;
$date_given = new DateTime($date_given);
$db_dategiven = $date_given;
$date_today = new DateTime();


if ($date_from->format('Y-m-d') == $date_to->format('Y-m-d')) {
    $dates = $date_to->format('F d, Y'); 
} elseif ($date_from->format('Y-m') === $date_to->format('Y-m')) {
    $dates = $date_from->format('F d ') .' and '. $date_to->format('d, Y'); 
} else {
    $dates = $date_from->format('F d, Y') .' and '. $date_to->format('F d, Y');
}

$date_from = $date_from->format('F d, Y');
$date_to = $date_to->format('F d, Y');
$date_given_day = $date_given->format('jS');
$date_given_my = $date_given->format('F Y');
$template = new TemplateGenerator();
$type = 'a';

if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) { 
	// $file = $_FILES['uploadfile']['tmp_name']; 

    $file_type = IOFactory::identify($_FILES['uploadfile']['tmp_name']);
    $reader = IOFactory::createReader($file_type);

    $spreadsheet = $reader->load($_FILES['uploadfile']['tmp_name']);
    $worksheet = $spreadsheet->getSheetByName('Participants');
    $attendees = $worksheet->toArray();
    
    // $attendees = $template->getCSVData($file);
    $multi_upload = true;
}

if ($certificate_type == 'cop') {
    $certificate_type = "CERTIFICATE OF PARTICIPATION";
} elseif ($certificate_type == 'coa') {
    $type = 'b';
    $certificate_type = "CERTIFICATE OF APPRECIATION";
} else {
    $type = 'c';
    $certificate_type = "CERTIFICATE OF COMPLETION";    
}

$details = [
    'certificate_type' => $certificate_type,
    'activity_title' => $activity_title,
    'issued_place' => $issued_place,
    'date_range' => $dates,
    'activity_venue' => $activity_venue,
    'date_given_day' => $date_given_day,
    'date_given_my' => $date_given_my,
    'opr' => $opr
];

if ($type == 'a') {
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            // $img_file = K_PATH_IMAGES.'image_demo.jpg';
            $img_file = '../../images/template/base_template.jpg';

            // $this->Image(file, LEFT, RIGHT, WIDTH, HEIGHT, '', '', '', false, 300, '', false, false, 0);
            $this->Image($img_file, 5, 5, 280, 198, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
} elseif ($type == 'b') {    
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            // $img_file = K_PATH_IMAGES.'image_demo.jpg';
            $img_file = '../../images/template/COA.jpg';

            // $this->Image(file, LEFT, RIGHT, WIDTH, HEIGHT, '', '', '', false, 300, '', false, false, 0);
            $this->Image($img_file, 5, 5, 280, 198, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
} else {
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            // $img_file = K_PATH_IMAGES.'image_demo.jpg';
            $img_file = '../../images/template/COC.jpg';

            // $this->Image(file, LEFT, RIGHT, WIDTH, HEIGHT, '', '', '', false, 300, '', false, false, 0);
            $this->Image($img_file, 12, 1, 275, 198, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
    }
}

// create new PDF document
$pdf = new MYPDF('Landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// die();
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DILG IV-A RICTU');
$pdf->SetTitle('Certificate Template');
$pdf->SetSubject('Certificate Template');
$pdf->SetKeywords('TCPDF, PDF, example, certificate, template');
// $pdf->SetProtection(array('print', 'download'));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, 5, 10);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('times', '', 48);

foreach ($attendees as $key => $attendee) {
    if ($key >= 3) {
        $participant = $attendee;

        if ($multi_upload) {
            $participant = $attendee[0];
            $position = $attendee[1];
            $office = $attendee[2];
            $email = $attendee[3];
        }
        
        if (!empty($participant)) {

            $pdf->AddPage();

            $html = $template->generateContent($details, $participant);
            $pdf->writeHTML($html, true, false, true, false, ''); 

            $data = [
                'certificate_type' => $certificate_type,
                'attendee' => $participant,
                'attendee_position' => $position,
                'attendee_office' => $office,
                'attendee_email' => $email,
                'issued_place' => $issued_place,
                'activity_title' => $activity_title,
                'date_from' => $db_datefrom->format('Y-m-d 00:00:00'),
                'date_to' => $db_dateto->format('Y-m-d 23:59:59'),
                'activity_venue' => $activity_venue,
                'date_given' => $db_dategiven->format('Y-m-d 00:00:00'),
                'date_generated' => $date_today->format('Y-m-d'),
                'opr' => $opr
            ];
            
            $exist = $template->find($conn, $data);
            
            if (!$exist) {
                $template->insert($conn, $data); 
            }
        }
    }
}

// $pdf->lastPage();
$pdf->Output('certificate.pdf', 'I');
// $file = $pdf->Output('certificate.pdf', 'S');

// $file = $pdf->output();
// file_put_contents($file_name, $file);

// $mail = new PHPMailer();

// $mail->isSMTP();
// $mail->Host = "smtp.gmail.com";
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = "tls";
// $mail->Port = "587";
// $mail->Username = "dilg4awebmail64@gmail.com";
// $mail->Password = "]LJkA9qaH)tR^3eZ";
// $mail->Subject = "Test email using PHPMailer";
// $mail->setFrom('dilg4awebmail64@gmail.com');
// $mail->isHTML(true);
// $mail->addStringAttachment($file, 'certificate.pdf');
// $mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
// $mail->addAddress('janericcastillo32@gmail.com');

// if ($mail->send()) {
//     print_r("Email Sent..!");
//     die();
// } else {
//     print_r('qweqweqwe');
//     die();
//     echo "Message could not be sent. Mailer Error: " .$mail->ErrorInfo;
// }

// $mail->smtpClose();



function getCertType($type)
{
    $cert = '';
    switch ($type) {
        case 'cop':
            $cert = 'base_template.jpg';
            break;
        case 'coa':
            $cert = 'COA.jpg';
            break;    
        case 'coc':
            $cert = 'COC.jpg';
            break;    
        
        default:
            # code...
            break;
    }

    return $cert;
}

function generateTex($type) {

}