<?php
include_once '../controller/attendance.controller.php';
$attendanceController = new AttendanceController();

$att_id = $_POST['id'];
$reason = $_POST['reason'];

$attendanceController->removeAbsent($att_id);
if ($reason) {
    $attendanceController->addAbsent($reason, $att_id);
}
