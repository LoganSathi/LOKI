<?php
include('../TCPDF-main/generate-warning.php');
include('../PHPMailer/mail.php');

include_once '../controller/cronjob.controller.php';
$cronController = new CronController();

$consArr = $cronController->fetchStudentAbsentCons();
if ($consArr) {
    foreach ($consArr as $row) {
        $id = $row['id'];
        $warningId = $cronController->addWarningLetter($id, 'Cons. Days');
        $cronController->resetConsDay($id);
        generate_pdf_cons($row['id'], $row['name'], $row['parent'], $warningId);
        if ($row['email']) {
            send_email($row['email'], "cons", $row['parent'], $row['name']);
        }
    }
}

$totalArr = $cronController->fetchStudentAbsentTotal();
if ($totalArr) {
    foreach ($totalArr as $row) {
        $id = $row['id'];
        $warningId = $cronController->addWarningLetter($id, 'Total Days');
        $cronController->resetTotalDay($id);
        generate_pdf_total($row['id'], $row['name'], $row['parent'], $warningId);
        if ($row['email']) {
            send_email($row['email'], "total", $row['parent'], $row['name']);
        }
    }
}
