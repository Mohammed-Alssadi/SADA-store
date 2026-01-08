<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';    // سيرفر SMTP الخاص بـ Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'muhamadalssadi@gmail.com'; // ضع بريدك هنا
        $mail->Password   = 'jjde qlso uoqh erin';       // ضع App Password من Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('muhamadalssadi@gmail.com', 'SADA STORE');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Verification Code';
        $mail->Body    = "<h3>Use this code to verify your email:</h3><h1>$otp</h1>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>