    <?php
    session_start();

    $url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $url = $url_array[0];

    require_once 'google-api-php-client/src/Google_Client.php';
    require_once 'google-api-php-client/src/contrib/Google_DriveService.php';


    // ========== UPLOADING PDF FILE ======== //

    $file_name = $_FILES["file"]["name"];

    $target_directory = "webposting/gdrive/";
    $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $newfilename = $target_directory.$file_name;
    move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename);
    // ==========================================

    $client = new Google_Client();
    $client->setClientId('128238329142-1o46elc6jcrr365l53gvcetp1i8s0jnl.apps.googleusercontent.com'); //console.google
    $client->setClientSecret('7ShLz6LSCeluW_dhZfi0CUGj'); //credentials
    $client->setRedirectUri($url);




    $client->setScopes(array('https://www.googleapis.com/auth/drive'));
    if (isset($_GET['code'])) {
        $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
        header('location:'.$url);exit;
    } elseif (!isset($_SESSION['accessToken'])) {
        $client->authenticate();
    }
 
        $client->setAccessToken($_SESSION['accessToken']);
        $service = new Google_DriveService($client);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file = new Google_DriveFile();
        
        $parentFolder = new Google_ParentReference();
        $a = ["News","Procurement","Banner","Transparency","LGUs","Procurement","Vacancies","Photo","Video","Forms"];
        $chk = $_POST['chk_category'];  

        if (in_array($chk,$a))
        {
            setFolderID($chk,$parentFolder);     
        } 
        function setFolderID($category,$parent)
        {

            $arr_elements = 
            [
                "News" => "1ZOoYmjfB6adD-SGFaxo9f5hSssyVNAnb",
                "Banner" => "14aiy0JSwL5pfsWs1vDBc48FfWwazfSxu",
                "Transparency" => "1iU1N6shvkmITI6sbqWTobsbNuXUeZd93", 
                "LGUs" => "1H7zgHeYeQ6ihscoYOg0EGEQ1_XNhuHrq",
                "Procurement" => "1c1W4pH15PPp66RdsxdlLJaO_f9EzRcj7",
                "Vacancies" => "1ruvWw4sgTfoC4pbfcyFJC5hPVwwDVbo5",
                "Photo" => "1mrALlImXV0HkvATwxVv7H50rCC0D7t3j",
                "Video" => "12bHDlqSs5LNnQo0TBsxH6rcPGBSRk-kR",
                "Forms" => "1C3x-4lsMMgspRgSLm3ah0aZrMkXUYC-Q",
            ];
            if(array_key_exists($category,$arr_elements)){
                $parent->setid($arr_elements[$category]);
            }
        }
        
        

        // foreach ($files as $file_name) {
            $file_path = 'webposting/gdrive/'.$file_name;
            $mime_type = finfo_file($finfo, $file_path);
            $file->setTitle($file_name);
            $file->setDescription('This is a '.$mime_type.' document');
            $file->setMimeType($mime_type);
            $file->setParents(array($parentFolder));
            $service->files->insert(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type
                )
            );
        // }
        finfo_close($finfo);
    // }
    include 'index.phtml';


