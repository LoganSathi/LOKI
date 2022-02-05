<?php
include_once '../controller/cronjob.controller.php';
$cronController = new CronController();

$today = date('Y-m-d');

$isSchool = $cronController->isSchool($today);

if ($isSchool) {
    $cronController->todayAttendance($today);
}
