<?php
require 'PHPMailerAutoload.php';

function send_email($email, $type, $parent, $name)
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

    $mail->Subject = "Warning Letter";
    $body = '';
    if ($type == "cons") {
        $body = "Mr/Mrs./Ms $parent,<br>
        <p>This email serves to provide an official warning to <b>$name</b> for his/her
        unfavourable attendance records.</p><p>This is to inform you that the aforementioned student was absent for <b>3 consecutive days</b>. If the student’s attendance in the upcoming days does not improve, you will have
        to meet the principle regarding the student’s absenteeism.</p>
<p> We remind you that the college regulations state that if a student is absent for
3 consecutive days or 10 total days per year irrespective of any reason, it will be
considered as violation of school attendance policy. Please be guided accordingly.</p>
<p>Do not reply to this Message! It's an auto generated message.</p><p>Regards,</p><br>School Administration";
    } else {
        $body = "Mr/Mrs./Ms $parent,<br>
        <p>This email serves to provide an official warning to <b>$name</b> for his/her
        unfavourable attendance records.</p><p>This is to inform you that the aforementioned student was absent for <b>10 total days for this year</b>. If the student’s attendance in the upcoming days does not improve, you will have
        to meet the principle regarding the student’s absenteeism.</p>
<p> We remind you that the college regulations state that if a student is absent for
3 consecutive days or 10 total days per year irrespective of any reason, it will be
considered as violation of school attendance policy. Please be guided accordingly.</p>
<p>Do not reply to this Message! It's an auto generated message.</p><p>Regards,</p><br>School Administration";
    }
    $mail->Body = $body;
    $mail->send();
}
