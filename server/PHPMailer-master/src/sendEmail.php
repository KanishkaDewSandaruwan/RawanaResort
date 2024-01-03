<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

// Fetch customer email from POST data
$customerEmail = $_POST['email'];
$name = $_POST['name'];
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$total = $_POST['total'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kanishkadewsandaruwan@gmail.com';                   // SMTP username
    $mail->Password = 'cvxlxwfujivetnbx';                    // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('kanishkadewsandaruwan@gmail.com', 'Rawana Resort');
    $mail->addAddress($customerEmail);                    // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Confirmation';
    $mail->Body = 'Thank you for booking! <br> Hi '.$name.'. <br> Your Booking was Confirmed. <br> Arrive Date : '.$arrival_date.' <br> Depature Date : '.$departure_date.' <br> Total Amount : '.$total.' ';

    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $e->getMessage();
}
?>