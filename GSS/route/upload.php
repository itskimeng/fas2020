<?php
session_start();

require '../../Model/Connection.php';
require '../../Model/Procurement.php';
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';

$url_array = explode('?', 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$url_array2 = explode('?', 'http://' . $_SERVER['HTTP_HOST']);

$url = $url_array[0];
$url2 = $url_array2[0];


$conn = new Connection();
$pr = new Procurement();
$today = new DateTime();


$client_id = $conn->googleClient;
$client_secret = $conn->googleSecret;

$client = getGoogleClient($client_id, $client_secret, $url);
$today = new DateTime();


if (isset($_GET['error'])) {
    $_SESSION['toastr'] = $am->addFlash('error', 'System needs an active google account.', 'Account Not Verified!');

    header('location:../../procurement_purchase_request_view.php?division=' . $_POST['division'] . '&id=' . $_POST['id'] . '&pr_no=' . $_POST['pr_no']);
    exit;
} elseif (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:' . $url);
    exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}

// if (!isset($_SESSION['ssid'])) {
//     $_SESSION['ssid'] = $_POST['token_id'];
// }

if (!empty($_POST)) {
    $order = '1Qgcu3IMEC39wmaUVAIIsgx_pZkddImgn'; //FOLDER ID IN GOOGLE DRIVE
    $files = $_FILES['files']['tmp_name'];
    $control_no = $_POST['pr_no'];
    $pr_id = $_POST['id'];
    $file_invalid = false;
    // $ssid = $_POST['token_id'];
    $table = 'tbl_app_checklist_entry'; //default table

    $client->setAccessToken($_SESSION['accessToken']);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    //Set the Parent Folder
    $parent = new Google_ParentReference(); //previously Google_ParentReference
    $parent->setId($order);

    $attachment_count = count($files);

    if (isset($_FILES)) {
        foreach ($_FILES['files']['name'] as $key => $name) {
            $fileTmpPath = $_FILES['files']['tmp_name'][$key];
            $fileName = $name;
            $fileSize = $_FILES['files']['size'][$key];
            $fileType = $_FILES['files']['type'][$key];

            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = $control_no  . '-' . md5(time() . $fileName) . '.' . $fileExtension;
            $mime_type = finfo_file($finfo, $fileTmpPath);

            $upFile = uploadFileToDrive($client, $fileTmpPath, $parent, $newFileName, $mime_type); // upload file to drive
            $pr->insert('tbl_pr_attendancesheet_attachments', [
                'pr_id'=> $pr_id,
                'file_id' => $upFile['id'], 
                'file_name' => $upFile['originalFilename'], 
                'location' => $upFile['alternateLink'], 
                'date_created' => $today->format('Y-m-d H:i:s'),
                'client_id' => $client->getClientId(),
                'client_secret' => $client->getClientSecret(),
                'file_type' => $mime_type]);


        }
    }

    finfo_close($finfo);
    header('location:../../procurement_purchase_request_view.php?division=' . $_POST['division'] . '&id=' . $_POST['id'] . '&pr_no=' . $_POST['pr_no']);
    exit;
} else {
    header('location:../../procurement_purchase_request_view.php?division=' . $_POST['division'] . '&id=' . $_POST['id'] . '&pr_no=' . $_POST['pr_no']);
}


function getGoogleClient($client_id, $client_secret, $url)
{
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($url);
    $client->setScopes(array('https://www.googleapis.com/auth/drive.file', 'https://www.googleapis.com/auth/drive.appdata'));

    return $client;
}

function uploadFileToDrive($client, $path, $parent, $filename, $mime_type)
{
    $service = new Google_DriveService($client);
    $file = new Google_DriveFile();

    $file->setTitle($filename);
    $file->setDescription('This is a ' . $mime_type . ' document');
    $file->setMimeType($mime_type);
    $file->setParents(array($parent));

    $file_content = array(
        'data' => file_get_contents($path),
        'mimeType' => $mime_type
    );

    $data = $service->files->insert($file, $file_content);

    return $data;
}
