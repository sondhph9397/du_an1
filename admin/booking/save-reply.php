<?php
session_start();
require '../../config/utils.php';
checkAdminLoggedIn();
// Require libraries PHP Mailer
require '../contacts/lib/PHPMailer/src/Exception.php';
require '../contacts/lib/PHPMailer/src/PHPMailer.php';
require '../contacts/lib/PHPMailer/src/SMTP.php';
// Get infomation
$email = $_POST['email'];
$id = $_POST['id'];
$reply_by = $_POST['reply_by'];
$reply_message = $_POST['reply_message'];
$listname = explode(",", $email);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet = 'utf8';                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bi10hanhphuc@gmail.com';                     // SMTP username
    $mail->Password   = 'anhday11';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bi1hanhphuc@gmail.com', 'HOTEL KINHCLUB');
    foreach ($listname as $nameEmail) {
        $mail->addAddress($nameEmail);
    }
    $mail->addReplyTo('bi1hanhphuc@gmail.com', 'Son Hong');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Body    = $reply_message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    # Update database
    $updateBookingQuery = "update booking set
                                reply_by = '$reply_by',
                                reply_message = '$reply_message'
                            where id = '$id'";
    queryExecute($updateBookingQuery, false);
    // dd($updateBookingQuery);
    header("location: " . ADMIN_URL . "booking");
    die;
} catch (Exception $e) {
    echo "Không thể gửi tin. Mailer Error: {$mail->ErrorInfo}";
}
