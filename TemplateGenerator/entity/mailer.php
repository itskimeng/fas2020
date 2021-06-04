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


$sql = "SELECT id, certificate_type, attendee, position, office, activity_title, DATE_FORMAT(date_from, '%Y-%m-%d') as date_from, DATE_FORMAT(date_to, '%Y-%m-%d') as date_to, activity_venue, DATE_FORMAT(date_given, '%Y-%m-%d') as date_given, DATE_FORMAT(date_generated, '%Y-%m-%d') as date_generated, opr, email, issued_place, send_counter
	FROM template_generator WHERE id = $id";

$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

if (!empty($result['email'])) {
    $receiver_email = $result['email'];
    $current_counter = $result['send_counter'] + 1;
    $date_from = new DateTime($result['date_from']);
    $date_to = new DateTime($result['date_to']);
    $date_issued = new DateTime($result['date_given']);
    $date_generated = new DateTime($result['date_generated']);


    if ($date_from->format('Y-m-d') == $date_to->format('Y-m-d')) {
        $dates = $date_to->format('F d, Y'); 
    } elseif ($date_from->format('Y-m') === $date_to->format('Y-m')) {
        $dates = $date_from->format('F d ') .' and '. $date_to->format('d, Y'); 
    } else {
        $dates = $date_from->format('F d, Y') .' and '. $date_to->format('F d, Y');
    }

    $date_given_day = $date_issued->format('jS');
    $date_given_my = $date_issued->format('F Y');

    $details = [
        'certificate_type' => $result['certificate_type'],
        'activity_title' => $result['activity_title'],
        'issued_place' => $result['issued_place'],
        'date_range' => $dates,
        'activity_venue' => $result['activity_venue'],
        'date_given_day' => $date_given_day,
        'date_given_my' => $date_given_my,
        'opr' => $result['opr']
    ];

    $sql2 = "UPDATE template_generator set send_counter = $current_counter WHERE id = $id";
    $result2 = mysqli_query($conn, $sql2);


    if ($result['certificate_type'] == 'CERTIFICATE OF PARTICIPATION') {
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
    } elseif ($result['certificate_type'] == 'CERTIFICATE OF APPRECIATION') {    
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
                $img_file = '../../images/template/COA_with_esig.jpg';

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
                $img_file = '../../images/template/COC_with_esig.jpg';

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


    $participant = $result['attendee'];
    $position = $result['position'];
    $office = $result['office'];
    $email = $result['email'];
        
        
    $pdf->AddPage();

    $html = $template->generateContent($details, $participant);
    $pdf->writeHTML($html, true, false, true, false, ''); 

    $pdf->lastPage();
    $file = $pdf->Output('certificate.pdf', 'S');

            
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "dilg4awebmail64@gmail.com";
    $mail->Password = "]LJkA9qaH)tR^3eZ";
    $mail->Subject = "E-Certificate Issuance";
    $mail->setFrom('dilg4awebmail64@gmail.com', 'DILG IV-A Calabarzon');
    $mail->isHTML(true);
    $mail->addStringAttachment($file, 'certificate.pdf');
    $mail->msgHTML(file_get_contents('../views/contents.php'), __DIR__);
    $mail->AddEmbeddedImage('../../images/email_header.png', 'email_header');
    $mail->addAddress($receiver_email);

    if ($mail->send()) {
        $dd = ['msg' => "Email sent to " .$result['email'], 'counter' => $current_counter];
        echo json_encode($dd);
    } else {
        $dd = ['msg' => "Message could not be sent. Mailer Error: " .$mail->ErrorInfo, 'counter' => 0];
        echo json_encode($dd);
    }

    $mail->smtpClose();

} else {
    echo 'Email is empty';
}
