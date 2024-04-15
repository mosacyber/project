<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Mailer/PHPMailer/PHPMailer/src/Exception.php';
require 'Mailer/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'Mailer/PHPMailer/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Username   = 'mosazzxxc@gmail.com';            // SMTP username
    $mail->Password   = 'drgbrswuqbnvobap';                       // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                              // TCP port to connect to

    // Recipients
    $mail->setFrom('mosazzxxc@gmail.com', '=?UTF-8?B?' . base64_encode('طلب اعادة رمز الحساب') . '?=');
    $mail->addAddress('421002998@stu.ut.edu.sa    ', 'Receiver Name');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '=?UTF-8?B?' . base64_encode('طلب إعادة رمز الحساب') . '?=';
    $mail->Body    = '
    <!DOCTYPE html>
    <html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>رسالة بريد إلكتروني</title>
    </head>
    <body style="font-family: Arial, sans-serif; direction: rtl; text-align: right;">
        <div style="margin: auto; max-width: 600px; padding: 20px;">
            <h1 style="color: #007bff;">مرحبًا،</h1>
            <p>شكرًا لاستخدام خدمتنا. يرجى العلم بأنه قد تم استلام طلب إعادة رمز الحساب الخاص بك.</p>
            <p>رمز الحساب الجديد هو: <strong>1234</strong></p>
            <p>إذا كانت لديك أي أسئلة أو استفسارات، فلا تتردد في الاتصال بنا.</p>
            <p>شكرًا لك،</p>
            <p>فريق الدعم</p>
        </div>
    </body>
    </html>
    ';
    $mail->AltBody = 'This is the plain text message body';

    $mail->send();
    echo 'تم إرسال الرسالة بنجاح';
} catch (Exception $e) {
    echo "لم يتمكن من إرسال الرسالة. خطأ في البريد الإلكتروني: {$mail->ErrorInfo}";
}
?>
