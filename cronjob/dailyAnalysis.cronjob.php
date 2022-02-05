<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once '../controller/cronjob.controller.php';
$cronController = new CronController();
$yesterday = date('Y-m-d', strtotime("-1 days"));

$isYesterdaySchool = $cronController->isSchool($yesterday);

if ($isYesterdaySchool) {
    $cronController->editAnalysis($yesterday);
}
