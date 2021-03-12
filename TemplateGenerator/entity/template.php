<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once('../../tcpdfv02/tcpdf.php');
require_once "../../connection.php";
require_once '../manager/TemplateGenerator.php';


$certificate_type = $_POST['certificate_type'];
$attendees[] = $_POST['attendee'];
$activity_title = $_POST['activity_title'];
$activity_date = $_POST['activity_date'];
$activity_venue = $_POST['activity_venue'];
$date_given = $_POST['date_given'];

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

if ($date_from->format('Y-m') === $date_to->format('Y-m')) {
    $dates = $date_from->format('F d ') .' and '. $date_to->format('d, Y'); 
} else {
    $dates = $date_from->format('F d, Y') .' and '. $date_to->format('F d, Y');
}

$date_from = $date_from->format('F d, Y');
$date_to = $date_to->format('F d, Y');
$date_given_day = $date_given->format('jS');
$date_given_my = $date_given->format('F Y');
$template = new TemplateGenerator();



if ($_FILES['uploadfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['uploadfile']['tmp_name'])) { 
	$attendee = file_get_contents($_FILES['uploadfile']['tmp_name']); 
	$attendees = explode(',', $attendee);
}

// if ($certificate_type == 'cop') {
if ($certificate_type == 'cop') {
    $certificate_type = "CERTIFICATE OF PARTICIPATION";
} elseif ($certificate_type == 'coa') {
    $certificate_type = "CERTIFICATE OF APPRECIATION";
} else {
    $certificate_type = '';
}
    // Extend the TCPDF class to create custom Header and Footer
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
// }

// create new PDF document
$pdf = new MYPDF('Landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$pdf->SetMargins(50, 5, 50);
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

foreach ($attendees as $attendee) {
    $pdf->AddPage();

    $html = '<br><br><div style="text-align:center; font-size:10pt;">This<br>
    <b style="font-family:Trajan Pro Bold; font-weight:bold;font-size:29pt;">'.$certificate_type.'</b><br><br>
    is hereby awarded to<br><br><br><br><div style="font-family:helvetica;font-weight:bold;font-size:35pt; text-align:center;">'.$attendee.'</div><br><br><div style="font-family:Verdana Regular;font-size:12pt; text-align:center;">in recognition of his/her active paritcipation during the conduct of the <br><b>'.$activity_title.'</b><br>held on '.$dates.' via '.$activity_venue.'<br><br>Given this <b>'.$date_given_day.'</b> day of <b>'.$date_given_my.'</b></div>
    </div>';

    $pdf->writeHTML($html, true, false, true, false, ''); 

    $data = [
        'certificate_type' => $certificate_type,
        'attendee' => $attendee,
        'activity_title' => $activity_title,
        'date_from' => $db_datefrom->format('Y-m-d 00:00:00'),
        'date_to' => $db_dateto->format('Y-m-d 23:59:59'),
        'activity_venue' => $activity_venue,
        'date_given' => $db_dategiven->format('Y-m-d 00:00:00'),
        'date_generated' => $date_today->format('Y-m-d')
    ];
    
    $exist = $template->find($conn, $data);

    if (empty($exist)) {
        $template->insert($conn, $data); 
    }
}

// $pdf->lastPage();
$pdf->Output('certificate.pdf', 'I');


function getCertType($type)
{
    $cert = '';
    switch ($type) {
        case 'cop':
            $cert = 'base_template.jpg';
            break;
        
        default:
            # code...
            break;
    }

    return $cert;
}