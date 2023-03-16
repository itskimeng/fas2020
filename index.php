<link href="css/login_style.css" rel="stylesheet"/>
<?php
require_once "ActivityPlanner/manager/Notification.php";
$notif = new Notification();  

class UnsafeCrypto
{
    const METHOD = 'aes-256-ctr';
    
    /**
     * Encrypts (but does not authenticate) a message
     * 
     * @param string $message - plaintext message
     * @param string $key - encryption key (raw binary expected)
     * @param boolean $encode - set to TRUE to return a base64-encoded 
     * @return string (raw binary)
     */
    public static function encrypt($message, $key, $encode = false)
    {
        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = openssl_random_pseudo_bytes($nonceSize);
        
        $ciphertext = openssl_encrypt(
            $message,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );
        
        // Now let's pack the IV and the ciphertext together
        // Naively, we can just concatenate
        if ($encode) {
            return base64_encode($nonce.$ciphertext);
        }
        return $nonce.$ciphertext;
    }
    
   
}

$encrypted_name = '';
$key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');

$encrypted = UnsafeCrypto::encrypt($encrypted_name, $key, true);



error_reporting(0);
if(!isset($_SESSION['username'])){
// header('location:index.php');
}else{

  //  E N C R Y P T I O N
 





















  
    $username = $_SESSION['username'];
    $pas1 = $_SESSION['pass'];
    $sqlUsername = mysqli_query($conn,"SELECT CODE,EMP_N,isPlanningOfficer FROM tblemployeeinfo WHERE md5(UNAME) = '".md5($username)."' LIMIT 1");
    $row = mysqli_fetch_array($sqlUsername);
    $salt       = $row['CODE'];
    $_SESSION['currentuser'] = $row['EMP_N']; 
    $_SESSION['planningofficer'] = $row['isPlanningOfficer']; 

    // ===============================================
    $query = "SELECT * FROM tblemployeeinfo WHERE UNAME = '".$username."' AND PSWORD = '".$pas1."' AND BLOCK = 'N' LIMIT 1 ";
    $result = mysqli_query($conn, $query);
    $val = array();
  // $numrows= mysqli_num_rows($query);
  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result))
  {
    $OFFICE_STATION =$row['OFFICE_STATION'];
    $_SESSION['OFFICE_STATION'] = $OFFICE_STATION;
    $division =$row['DIVISION_C'];
    $TIN_N =$row['TIN_N'];
    $_SESSION['TIN_N'] = $TIN_N;
    $ORD =$row['ORD'];
    $_SESSION['ORD'] = $ORD;
    $DEPT_ID =$row['DEPT_ID'];
    $_SESSION['DEPT_ID'] = $DEPT_ID;
    $division2 = $row['DIVISION_C'];
    $_SESSION['division'] = $division;
    $_SESSION['province'] = $row['PROVINCE_C'];
    $middle = $row['MIDDLE_M'];
    $_SESSION['complete_name'] = ucwords(strtolower($row['FIRST_M'])).' '.$middle[0].'. '.ucwords(strtolower($row['LAST_M']));
    $_SESSION['complete_name2'] = $row['FIRST_M'].' '.$row['LAST_M'];
    $_SESSION['complete_name2'] = $row['FIRST_M'].' '.$row['LAST_M']; 
    $_SESSION['isPersonnel'] = $row['isPersonnel'];

      // if ($division == 14 || $division == 10 || $division == 11 || $division == 12 || $division == 13) {
      if ($username == 'itdummy1' || 
          $username == 'mmmonteiro' || 
          $username == 'jamonteiro' || 
          $username == 'masacluti' || 
          $username == 'cvferrer' || 
          $username == 'seolivar' || 
          $username == 'magonzales') {

      }else{
        if ($OFFICE_STATION == 1) {
           echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='home1.php?division=".$division."&username=".$username."';
        </SCRIPT>");
        }else{
           echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='home2.php?division=".$division."&username=".$username."';
        </SCRIPT>");
        }
      
       } 
    }

    }

}

?>
<body>
  <div class="session">
    <div class="left">
    </div>
    <form id="login-form"> 
      <img src="images/logoin.jpg" style="width: 100%; height: auto; border-radius: 5px;">
      <div class="floating-label">
      
        <input placeholder="Email" type="text" name="username" id="username" autocomplete="off">
        <label for="email">Username:</label>
        <div class="icon">
          <?xml version="1.0" encoding="UTF-8"?>
          <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <style type="text/css">
              .st0{fill:none;}
            </style>
            <g transform="translate(0 -952.36)">
              <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z"/>
            </g>
            <rect class="st0" width="100" height="100"/>
          </svg>
        </div>
      </div>
      <div class="floating-label">
        <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
        <label for="password">Password:</label>
        <div class="icon">
          
          <?xml version="1.0" encoding="UTF-8"?>
          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"              xmlns="http://www.w3.org/2000/svg">
            <style type="text/css">
              .st0{fill:none;}
              .st1{fill:#010101;}
            </style>
            <rect class="st0" width="24" height="24"/>
            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"/>
            <path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"/>
            <path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"/>
          </svg>
        </div>
        
      </div>
      <button type="submit" class="login-button" name="submit" style="border-radius:5px;"><i class="fa fa-sign-in"></i> Sign In</button>
      <a  class="discrete" target="_blank">      DILG IV-A Regional Information and Communications Technology Unit (RICTU) © 2019 All Right Reserved . </a>
    </form>
    
  </div>
  
</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="bower_components/toastr-2.1.4-7/toastr.js"></script>



<script>
  $(document).ready(function() {
  $('#login-form').validate({
    rules: {
      username: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 8
      }
    },
    messages: {
      username: {
        required: "Please enter a username",
        minlength: "Username must be at least 3 characters long"
      },
      password: {
        required: "Please provide a password",
        minlength: "Password must be at least 8 characters long"
      }
    },
    submitHandler: function(form) {
      $.ajax({
        url: "route/login.php",
        type: "POST",
        data: $(form).serialize(),
        success: function(data) {
        let json_data = $.parseJSON(data); 

          if (json_data[0].message === "success") {
          // display success message using Toast
          // alert("Login successful!");    
          window.location.href=''+json_data[0].location+'.php?role='+json_data[0].role+'&division='+json_data[0].division+'&username='+json_data[0].username+'';            
          } else {
          console.log(json_data);
          alert("Login Failed");     
          }
        }
      });
    }
  });
});


</script>