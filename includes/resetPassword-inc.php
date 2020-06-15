<?php

use PHPMailer\PHPMailer\PHPMailer;
$url = "http://$_SERVER[HTTP_HOST]";
date_default_timezone_set('Asia/Kuala_Lumpur');

if (isset($_POST['email-reset'])) {
    require 'config.inc.php';
    $data['Valid'] = true;
    $email = mysqli_real_escape_string($db, $_POST['email-reset']);

    $sql = $db->query("SELECT userID FROM users WHERE email = '$email'");
    if ($sql->num_rows > 0) {

        $bytes = 12;
        $token = bin2hex(openssl_random_pseudo_bytes($bytes));

        $db->query("UPDATE users SET token ='$token', tokenExpire=DATE_ADD(NOW(), INTERVAL 7 MINUTE ) WHERE email='$email'");
        $data['temp'] = true;
        $expire = date("Y-m-d H:i:s", strtotime("now +7 minutes"));
        require_once "phpmailer/PHPMailer.php";
        require_once "phpmailer/Exception.php";
        require_once "phpmailer/SMTP.php";
       $path = "$url/Online-Charity-Management-System/includes/password-recovery.inc.php?email=$email&token=$token";
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = "raisereason@gmail.com";
        // To save you time this password won't work if tried to login with it 
        $mail->Password = "otenxrmrlprpphsv";
        $mail->addAddress($email);
        $mail->setFrom('RaiseReason@gmail.com');
        $mail->Subject = "Reset Password";
        $mail->isHTML(true);
        $body =$mail->Body = "
            Hello, <br><br>

            Click  <strong><a href='$path' target='_Blank'>Here</a> </strong> to reset you password:
            <br> 
            <br>
             PLEASE NOTE THIS TOKEN WILL EXPIRE ON <strong>$expire</strong>
            <br>
            <br>

            RR Team.
        ";

        $data['sent'] = $mail->send();
    
    }   
} else {
    $data['Valid'] = false;
}





$db->close();
echo json_encode($data);
