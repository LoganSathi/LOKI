<?php
require 'PHPMailerAutoload.php';

function notify_parent($email, $status, $name, $date)
{

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'project.fyp.mail@gmail.com';                 // SMTP username
    $mail->Password = 'fyp12345';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom("project.fyp.mail@gmail.com", "SMK Ahmad Boestamam");
    $mail->addAddress($email);               // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Student Attendance Notification";
    $body = '';
    if ($status == 1) {
        $body = "$name is present to school on $date";
    } else {
        $body = "$name is absent to school on $date";
    }
    $mail->Body = $body;
    $mail->send();
}
